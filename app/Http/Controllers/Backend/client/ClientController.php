<?php

namespace App\Http\Controllers\Backend\client;

use App\Http\Controllers\Controller;
use App\Models\ClientList;
use App\Models\ClientStatus;
use App\Models\ClientType;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    /**
     * Magicmethod
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('author');
    }    

  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientTypes = ClientType::all();
        $clientStatuses = ClientStatus::with('client')->get();

        $query = ClientList::query();
        $count = $query->count();
        if ($request->type != null) {
           $query->where('client_type_id',$request->type);
        }
        if ($request->status != null) {
            $query->where('client_status_id',$request->status);
        }
        $clientLists = $query->orderBy('id','desc')->get();
         
        // return $clientLists;
        return view('backend.client.index',compact('clientLists','clientTypes','clientStatuses','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientTypes = ClientType::all();
        $clientStatuses = ClientStatus::all();
        return view('backend.client.create',compact('clientTypes','clientStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);

        $store = ClientList::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'reference' => $request->reference,
            'client_type_id' => $request->type,
            'client_status_id' => $request->status,
            'project_name' => $request->project,
            'note' => $request->note,
            'short_note' => $request->short_note,
        ]);

        if ($store) {
            return redirect()->back()->with('success','Client Create Successful');
        }else{
            return redirect()->back()->with('error','Try agin!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientList  $clientList
     * @return \Illuminate\Http\Response
     */
    public function show(ClientList $clientList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientList  $clientList
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientList $clientlist)
    {

        $clientTypes = ClientType::all();
        $clientStatuses = ClientStatus::all();
        return view('backend.client.edit',compact('clientTypes','clientStatuses','clientlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientList  $clientList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientList $clientlist)
    {
       
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);

        $Update =$clientlist->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'reference' => $request->reference,
            'client_type_id' => $request->type,
            'client_status_id' => $request->status,
            'project_name' => $request->project,
            'note' => $request->note,
            'short_note' => $request->short_note,
        ]);

        if ($Update) {
            return redirect()->back()->with('success','Client Update Successful');
        }else{
            return redirect()->back()->with('error','Try agin!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientList  $clientList
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientList $clientlist)
    {
        $delete = $clientlist->delete();
        if ($delete) {
            return redirect()->back()->with('success','Client Update Successful');
        }else{
            return redirect()->back()->with('error','Try agin!');
        }
    }
}
