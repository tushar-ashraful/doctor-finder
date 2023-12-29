<?php

namespace App\Http\Controllers\Backend\Project;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Work;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class WorkController extends Controller
{

    /**
     * Magicmethod
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('author')->except('show','complete');
    }

    // /**
    //  * dataTable Method
    //  */
    // public function dataTableWork() {
    //     return Laratables::recordsOf( Work::class, function ( $query ) {
    //         return $query->latest( 'id' );
    //     } );
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = Order::latest()->with(['university'])->get();
        // return view('backend.project.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $project = Order::whereId(decrypt($request->order))->first();

        $this->validate($request,[
            'item' => 'required',
            'user_id' => 'required',
            'dateline_on' => 'required',
            'dateline_to' => 'required',
        ]);
        
        $workCreate = $project->works()->create([
            'user_id' => $request->user_id,
            'order_item_id' => $request->item,
            'note' => $request->note,
            'note' => $request->note,
            'dateline_on' => $request->dateline_on,
            'dateline_to' => $request->dateline_to,
        ]);

        $workCreate->orderItem()->update([
            'assign_at' => now(),
        ]);

        if ($project->works()->first() && $project->status == $project::NEWORDER) {
            $project->update([
                'status' => 1,
                'progress_at' => now(),
            ]);
        }
        
        return returnMassage($workCreate,'Project item assign in worker Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Order $work)
    {
        $project = $work;
        $workers = User::all();
        return view('backend.work.view',compact('project','workers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        return view('');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $work)
    {
        $project = $work;
        $this->validate($request,[
            'user_id' => 'required',
            'dateline_on' => 'required',
            'dateline_to' => 'required',
        ]);

        $itemWork = Work::whereId($request->id)->first();
        if ($itemWork->user_id != $request->user_id) {
            $itemWork->orderItem()->update([
                'assign_at' => now(),
            ]);
        }
        $workUpdate =  $itemWork->update([
            'user_id' => $request->user_id,
            'note' => $request->note,
            'dateline_on' => $request->dateline_on,
            'dateline_to' => $request->dateline_to,
        ]);
        
        return returnMassage($workUpdate,'Project item Update assign in worker Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        $work->orderItem()->update([
            'assign_at' => null,
        ]);
        $delete =  $work->delete();
        return returnMassage($delete,'Worker assign work delete Successful');
    }

    public function complete(Work $work)
    {
        $order = new Order;

        $work->orderItem()->update([
            'completed_at' => now(),
        ]);
       
        if ($work->order->orderItems->count() == $work->order->orderItems->whereNotNull('completed_at')->count()) {
            $work->order->update([
                'status' => $order::REVIEW,
                'review_at' => now(),
            ]);
        }
        
         $work = $work->update([
            'completed_at' => now(),
        ]);

        return returnMassage($work,'Work Complete Successful');
    }

    public function uncomplete(Work $work)
    {
        $work->orderItem()->update([
            'completed_at' => null,
        ]);
        $work = $work->update([
            'completed_at' => null,
        ]);
        return returnMassage($work,'Work UnComplete Successful');
    }
}
