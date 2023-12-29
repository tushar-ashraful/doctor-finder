<?php

namespace App\Http\Controllers\Backend\Project;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderPay;
use App\Models\University;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /**
     * Magicmethod
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('author')->except('index','show','note');
    }   

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $universitys = University::all();
        $orders = Order::query();
        $filter =  $orders->get();
        $orders = $orders->latest('id')->with(['university','orderPay','orderItems']);

        if ($request->date_to || $request->date_on) {
            $orders = $orders->whereBetween($request->column ?? 'created_at',[$request->date_to,$request->date_on]);
        }
        
        if ($request->university) {
            $orders = $orders->where('university_id',$request->university);
        }
        
        if ($request->status != null && is_int( (int) $request->status)) {
           $orders = $orders->whereStatus($request->status);
        }
        if ($request->statusDate) {
            $orders = $orders->whereDate('delivery',$request->statusDate);
        }

        if ($request->statusText == 'urgent') {
           $orders = $orders->where('is_urgent',true)->where('status','!=',Order::DELIVERED);
        }elseif ($request->statusText == 'return') {
           $orders = $orders->whereNotNull('return_at');
        }else{
            $orders = $orders;
        }

        $orders = $orders->get();

        return view('backend.project.index',compact('orders','filter','universitys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newSku = Order::newSku();
        $universitys = University::all();
        $items = Item::all();
        $method = new OrderPay();
        return view('backend.project.create',compact('universitys','newSku','items','method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $this->validate($request,[
            'title' => 'required',
            'supervisor' => 'required',
            'supervisor_phone' => ['required','regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/'],
            'delivery' => 'required',
            'items.*.item' => 'required',
            'items.*.qty' => 'required',
            'items.*.price' => 'required',
            'name' => 'required',
            'phone' => ['required','regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/'],
            'email' => 'nullable|email',
            'university' => 'required',
            'batch' => 'required',
            'address' => 'required',
            'payble_amount' => 'required',
            'advanced' => 'required',
        ]);
        $data = [];
        $data['sku'] = Order::newSku();
        $data['university_id'] = $request->university;
        $data['title'] = $request->title;
        $data['reference'] = $request->reference;
        $data['description'] = $request->description;
        $data['supervisor'] = $request->supervisor;
        $data['supervisor_phone'] = $request->supervisor_phone;
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['batch'] = $request->batch;
        $data['address'] = $request->address;
        $data['members'] = $request->members;
        $data['additional_fees'] = $request->additional_fees;
        $data['discount'] = $request->discount;
        $data['is_urgent'] = (boolean) $request->is_urgent;
        $data['delivery'] = $request->delivery;
        
        $orderCreate = Order::create($data);
        $itemsCreate = Order::createItem($request->items,$orderCreate->id);
        $orderPay = Order::createPay($orderCreate->id,OrderPay::NEWORDER,$request->name,$request->phone,$request->advanced,$request->method,$request->note);
        return returnMassage($orderCreate,'Project Order Create Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $project)
    {
        $items = Item::all();
        $users = User::all();
        $method = new OrderPay();
        return view('backend.project.view',compact('project','items','method','users'));
    }

    public function invoice(Order $project)
    {
        return view('backend.project.invoice',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $project)
    {
        $universitys = University::all();
        $items = Item::all();
        return view('backend.project.edit',compact('project','universitys','items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $project)
    {
        $this->validate($request,[
            'title' => 'required',
            'supervisor' => 'required',
            'supervisor_phone' => ['required','regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/'],
            'delivery' => 'required',
            'items.*.item' => 'required',
            'items.*.qty' => 'required',
            'items.*.price' => 'required',
            'name' => 'required',
            'phone' => ['required','regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/'],
            'email' => 'nullable|email',
            'university' => 'required',
            'batch' => 'required',
            'address' => 'required',
        ]);

        $data = [];
        $data['university_id'] = $request->university;
        $data['title'] = $request->title;
        $data['reference'] = $request->reference;
        $data['description'] = $request->description;
        $data['supervisor'] = $request->supervisor;
        $data['supervisor_phone'] = $request->supervisor_phone;
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['batch'] = $request->batch;
        $data['address'] = $request->address;
        $data['members'] = $request->members;
        $data['is_urgent'] = (boolean) $request->is_urgent;
        $data['delivery'] = $request->delivery;

        $update = $project->update($data);
        return returnMassage($update,'Project Order Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Order $project)
    {
        if ($request->sku == $project->sku) {
            $delete = $project->forceDelete();
            return returnMassage($delete,'Project Delete Successful');
        }else{
            return returnMassage(null,'You did something wrong to permanently delete the project.');
        }
    }

    public function installment_pay(Request $request, Order $project)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone' => ['required','regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/'],
            'amount' => 'required',
            'method' => 'required',
        ]);

        $createPay = $project->createPay($project->id,OrderPay::INSTALMENT,$request->name,$request->phone,$request->amount,$request->method,$request->note);

        return returnMassage($createPay,'Project Order Update Successful');

    }

    public function project_upgrade(Request $request, Order $project)
    {
        $this->validate($request,[
            'items.*.item' => 'required',
            'items.*.qty' => 'required',
            'items.*.price' => 'required',
        ]);

        if ($request->type != 'new') {
            $project->update([
                'delivery' =>(boolean) $request->delivery_time_change == true ? $request->delivery : $project->delivery,
                'correction_at' => $request->type == 'correction' ? now() : $project->correction_at,
                'upgrade_at' => $request->type == 'upgrade' ? now() : $project->upgrade_at,
                'status' => $project::CORRECTION_UPGRADE,
            ]);
        }

        if ($request->type == 'new' && $project->status != $project::PROGRESS && $project->works->count() != 0) {
            $project->update([
                'status' => $project::PROGRESS,
                'progress_at' => now(),
            ]);
        }
        
        $data = [];
        $data['items'] = $request->all();
        $projectUpgrade = Order::createItem($data, $project->id, $request->type);

        return returnMassage($projectUpgrade,'Project Upgrade Successful');
    }

    public function orderItem_edit(Request $request, Order $project)
    {
        $this->validate($request,[
            'item' => 'required',
            'qty' => 'required',
            'price' => 'required',
        ]);
        $update = OrderItem::where('id',$request->id)->where('order_id',$project->id)->update([
            'item_id' => $request->item,
            'description' => $request->description,
            'is_urgent' => $request->is_urgent,
            'qty' => $request->qty,
            'price' => $request->price,
            'total' => $request->total,
        ]);
       return returnMassage($update,'Project item Update Successful');
    }

    public function orderItem_delete(OrderItem $orderItem)
    {
        $delete = $orderItem->delete();
        return returnMassage($delete,'Project Item Delete Successful');
    }

    public function payment_update(Request $request, Order $project)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone' => ['required','regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/'],
            'amount' => 'required',
            'method' => 'required',
        ]);
        $update = OrderPay::where('id',$request->id)->where('order_id',$project->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'amount' => $request->amount,
            'method' => $request->method,
            'note' => $request->note,
        ]);
       return returnMassage($update,'Project Pyment Update Successful');
    }

    public function payment_delete(OrderPay $orderPay)
    {

        if ($orderPay->type == OrderPay::NEWORDER) {
            return returnMassage(null,'Advance payment can not be deleted!');
        }

        $delete = $orderPay->delete();
        return returnMassage($delete,'Project Pyment Delete Successful');
    }

    public function status_change(Request $request, Order $project)
    {
        if ($request->status == $project::NEWORDER) {
             return returnMassage(null,'Project already exists in other status and You dont change New Status');
        }
        if ($request->status == $project->status) {
           return returnMassage(null,'Project already exists this status');
        }

        $data = [];
        $data['status'] = $request->status;

        if ($request->status == $project::PROGRESS) {
           $data['progress_at'] = now();
        }
        if ($request->status == $project::REVIEW) {
           $data['review_at'] = now();
        }
        if ($request->status == $project::COMPLETE) {
           $data['completed_at'] = now();
        }
        if ($request->status == $project::DELIVERED) {
           $data['delivery_at'] = now();
        }
        $update = $project->update($data);
       // return $request;
        return returnMassage($update,'Project Status Change Successful');
    }

    public function return_cancel(Request $request, Order $project)
    {
        if ($request->return_amount != 0) {
           if (!$request->type) {
                return returnMassage(null,'You forgot to select the type');
            }   
        }
        
        $data = [];
        
        if ($request->type == 'cancel') {
           $data['cancel_at'] = now();
           $data['status'] = $project::CANCEL;
        }

        if ( $request->type == 'return') {
            if ($project->status == $project::DELIVERED) {
                 $data['return_at'] = now();
            }else{
                return returnMassage(null, 'This Project Status not delivery');
            }
        }

        $data['return_amount'] = $request->return_amount ?? 0;
        $data['loss'] = $request->loss_amount ?? 0;
        $data['discount'] = $request->discount_amount ?? 0;

        $update = $project->update($data);

        return returnMassage($update,'Project Status Change Successful');
    }


    public function note(Request $request,Order $project)
    {
        
        if (auth()->user()->role_id > 1) {
           $update =  $project->update([
                'note' => $project->note.PHP_EOL."($request->note -> ".myDateTime(now())." - ".auth()->user()->name.")",
            ]);
            return returnMassage($update,'Project Note Update Successful');
        }
        // return $request;
        $update = $project->update([
            'note' => $request->note,
        ]);
        return returnMassage($update,'Project Note Update Successful');
    }


}
