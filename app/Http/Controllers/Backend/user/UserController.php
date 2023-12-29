<?php

namespace App\Http\Controllers\backend\user;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class UserController extends Controller {

    /**
     * Magicmethod
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('admin');
    }

    public function dataTableUser() {
        return Laratables::recordsOf( User::class, function ( $query ) {
            return $query->latest( 'id' );
        } );

        // return "alamin";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $roles = Role::all();
        return view( 'backend.user.index',compact('roles') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return redierct()->back();
        // return view( 'backend.user.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $this->validate($request,[
            'name' => 'bail|required',
            'username' => 'required|unique:users',
            'email' => 'required|email',
            'phone' => 'required|digits:11',
            'role' => 'required|integer|between:1,3',
            'password' => 'required|confirmed|min:9',
        ]);

        $create = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => $request->role,
            'slug' => str_slug($request->username),
            'password' => bcrypt($request->password),
        ]);

        if ($create) {
            return redirect()->back()->with('success','User Create Successful');
        }else{
            return redirect()->back()->with('error','Try Again.');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user ) {
        // $myWorks = $user->works();
        // $myWorksCount = $myWorks->get();

        // if ($request->date_to || $request->date_on) {
        //     $myWorks = $myWorks->whereBetween($request->column,[$request->date_to,$request->date_on]);
        // }

        // if ($request->statusDate) {
        //     $myWorks = $myWorks->whereDate('dateline_to',$request->statusDate);
        // }

        // if (request('status') == 'complete') {
        //     $myWorks = $myWorks->whereNotNull('completed_at')->orderBy('completed_at','desc')->paginate(10);
        // }elseif (request('status') == 'pending'){
        //     $myWorks = $myWorks->whereNull('completed_at')->orderBy('dateline_to','asc')->paginate(10);
        // }else{
        //     $myWorks = $myWorks->paginate(10);
        // }

        return view( "backend.user.view",compact('user') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit( User $user ) {
        $roles = Role::all();
        return view( 'backend.user.edit',compact('user','roles') );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, User $user ) {
        $this->validate($request,[
            'name' => 'bail|required',
            'username' => 'required|unique:users,username,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required|digits:11',
            'role' => 'required|integer|between:1,3',
            'password' => 'nullable|confirmed|min:9',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->username = $request->username;
        $user->slug = str_slug($request->username);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role_id = $request->role;
        if ($request->password != null) {
            $user->password = $request->password; 
        }
        $user->save();
        return redirect()->back()->with('success','User Update successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( User $user ) {
        $user->delete();
        return redirect()->back()->with('success','User Delete successfull');
    }
}
