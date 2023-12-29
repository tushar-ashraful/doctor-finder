<?php

namespace App\Http\Controllers\Backend\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Magicmethod
     *
     * @return \Illuminate\Http\Response
     */
    public function __consturct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('backend.doctorlist.index',compact('doctors'));
    }
    
    public function approved(Doctor $doctor)
    {
        if ($doctor->approve_at == null) {
            $doctor  = Doctor::where('id',$doctor->id)->update([
                'approve_at' => now(),
            ]);
        }else{
            $doctor  = Doctor::where('id',$doctor->id)->update([
                'approve_at' => null,
            ]);
        }

        if ($doctor) {
            return redirect()->back()->with('success','Doctor Approve Success');
        } else {
            return redirect()->back()->with('error','Try Again');
        }
    }

    public function view(Doctor $doctor)
    {
        return view('backend.doctorlist.view',compact('doctor'));
    }

}
