<?php

namespace App\Http\Controllers\Backend\University;

use App\Http\Controllers\Controller;
use App\Models\University;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class UniversityController extends Controller
{

    /**
     * Magicmethod
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('author')->except('index');
    }  

    /**
     * dataTable Method
     */
    // public function dataTableUniversity() {
    //     return Laratables::recordsOf( University::class, function ( $query ) {
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
         $universitys = University::all();
        return view( 'backend.university.index',compact('universitys') );
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
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'location' => 'required',
        ]);

        $create = University::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'location' => $request->location,
        ]);

        return returnMassage($create,'University Create Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        return view('');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit(University $university)
    {
        return view( 'backend.university.edit',compact('university') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, University $university)
    {
        // return $request;
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'location' => 'required',
        ]);

        $update = $university->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'location' => $request->location,
        ]);

        return returnMassage($update,'University Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $university)
    {
        $delete = $university->delete();
        return returnMassage($delete,'University Update Successful');
    }
}
