<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Chat;
use App\Models\Patient;
use Hash;
use Illuminate\Http\Request;

class PatientController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('fontend.patient.register');
    }

    public function register_submit(Request $request)
    {
        $this->validate( $request, [
            'name'     => 'required',
            'email'    => 'required|unique:patients,email',
            'phone'    => 'required|digits:11|unique:patients,phone',
            'password' => 'required|min:6|confirmed',
        ]);

         $insert = Patient::insert( [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make( $request->password ),
        ] );


        if ( $insert ) {
           return redirect()->route('website.patient.login')->with('success','Registration Success');
        } else {
            return redirect()->back()->with('error', 'Registration Error');
        }

    }

    public function login()
    {
        return view('fontend.patient.login');
    }

    public function login_submit(Request $request)
    {
        $validate = $this->validate( $request, [
            'email'    => 'required|email||exists:patients,email',
            'password' => 'required',
        ]);

        $patient = Patient::where('email', $request->email)->first();

        if ( Hash::check( $request->password, $patient->password ) ) {
            session()->put( 'patient', $patient);
            return redirect('/')->with('success','login Success');
        } else {
            return redirect()->back()->with('error','Password Wrong');
        }
   }

   public function dashboard()
   {
        if (session()->has('patient')) {
            $bookings = Booking::where('patient_id',session()->get('patient')['id'])->get();
           return view('fontend.patient.dashboard',compact('bookings'));
        }
         return redirect('/');
   }


   public function profile()
   {
    if (session()->has('patient')) {
        $patient = Patient::where('id',session()->get('patient')['id'])->first();
        return view('fontend.patient.profile-setting',compact('patient'));
    }
    return redirect('/');
   }

   public function profile_update(Request $request)
   {
       $patient = Patient::where('id',session()->get('patient')['id'])->update([
        'name' => $request->name,
        'email' => $request->email,
        'dateOfBirth' => $request->dateOfBirth,
        'blood_group' => $request->blood_group,
        'phone' => $request->phone,
        'gender' => $request->gender,
        'address' => $request->address,
       ]);

       if ($request->hasFile('image')) {
            $image=$request->file('image');
            $imageName='patient_profile_'.$patient.time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/'), $imageName);
            Patient::where('id',session()->get('patient')['id'])->update([
                'image'=>$imageName,
            ]);
        }

        if ($patient) {
            return redirect()->back()->with('success','Profile update Success');
        } else {
            return redirect()->back()->with('error','Try Again');
        }
   }



   public function chat(Booking $chat)
   {
        $booking = $chat;
        return view('fontend.patient.chat',compact('booking'));
   }

   public function chat_submit(Booking $chat, Request $request)
   {
        if ($request->chat != null) {
            $chatCreate = Chat::create([
                'booking_id' => $chat->id,
                'patient' => $request->chat,
            ]);
             return response()->json($chatCreate);
        }
        // return redirect()->back();
   }

   public function chat_ajax(Booking $chat)
   {
        $booking = $chat;
        return view('fontend.patient.chat-ajax',compact('booking'));
   }

   public function prescription(Booking $booking)
   {
        return view('fontend.patient.prescription-view',compact('booking'));
   }


}
