<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class WebsiteController extends Controller
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
        $doctors = Doctor::whereNotNull('approve_at')->get();
        $categorys = Category::all();
        return view('fontend.index',compact('doctors','categorys'));
    }

    public function doctors()
    {
        $doctors = Doctor::whereNotNull('approve_at')->get();
        return view('fontend.doctors',compact('doctors'));
    }

    public function doctorview($id)
    {
         $doctor = Doctor::where('id',$id)->first();
         return view('fontend.doctor-view',compact('doctor'));
    }

    public function checkout($id)
    {
         $doctor = Doctor::where('id',$id)->first();
         return view('fontend.checkout',compact('doctor'));
    }

    public function checkout_submit(Request $request, $id)
    {
        if (!session()->has('patient')) {
            return redirect()->route('website.patient.login');
        }

         $doctor = Doctor::where('id',$id)->first();
         $patient = Patient::where('id',session()->get('patient')['id'])->first();
         $booking = Booking::create([
            'doctor_id' => $doctor->id,
            'patient_id' => $patient->id,
            'date_on' => $request->date_on,
            'amount' => $doctor->price,
            'payment_number' => $request->payment_number,
            'payment_transiton_number' => $request->payment_transiton_number,
         ]);

        if ($booking) {
            return redirect('/')->with('success','Appointment Success');
        } else {
            return redirect()->back()->with('error','Try Again');
        }

    }

    public function contact()
    {
        return view('fontend.contact');
    }

    public function contact_submit(Request $request)
    {
        $create = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'text' => $request->text,
        ]);

        if ($create) {
            return redirect('/')->with('success','Submit Success');
        } else {
            return redirect()->back()->with('error','Try Again');
        }
    }


}
