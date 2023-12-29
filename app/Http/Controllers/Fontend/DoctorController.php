<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Chat;
use App\Models\Doctor;
use Hash;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('fontend.doctor.register');
    }

    public function register_submit(Request $request)
    {
        $this->validate( $request, [
            'name'     => 'required',
            'email'    => 'required|unique:doctors,email',
            'phone'    => 'required|digits:11|unique:doctors,phone',
            'password' => 'required|min:6|confirmed',
        ]);

         $insert = Doctor::create( [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make( $request->password ),
        ] );


        if ( $insert ) {
           return redirect()->route('website.doctor.login')->with('success','Registration Success');
        } else {
            return redirect()->back()->with('error', 'Registration Error');
        }

    }

    public function login()
    {
        return view('fontend.doctor.login');
    }

    public function login_submit(Request $request)
    {
        $validate = $this->validate( $request, [
            'email'    => 'required|email||exists:doctors,email',
            'password' => 'required',
        ]);

        $doctor = Doctor::where('email', $request->email)->first();

        if ( Hash::check( $request->password, $doctor->password ) ) {
            session()->put( 'doctor', $doctor);
            return redirect('/')->with('success','login Success');
        } else {
            return redirect()->back()->with('error','Password Wrong');
        }
   }

   public function dashboard()
   {
       return view('fontend.doctor.dashboard');
   }

   public function profile()
   {
    if (session()->has('doctor')) {
        $categorys = Category::all();
        $doctor = Doctor::where('id',session()->get('doctor')['id'])->first();
        return view('fontend.doctor.profile',compact('doctor','categorys'));
    }
    return redirect('/');
   }

   public function profile_update(Request $request)
   {
       $doctor = Doctor::where('id',session()->get('doctor')['id'])->update([
        'email' => $request->email,
        'name' => $request->name,
        'sub_title' => $request->sub_title,
        'phone' => $request->phone,
        'specialist' => $request->specialist,
        'education' => $request->education,
        'experience' => $request->experience,
        'gender' => $request->gender,
        'dateOfBirth' => $request->dateOfBirth,
        'price' => $request->price,
        'about_me' => $request->about_me,
       ]);

       if ($request->hasFile('image')) {
            $image=$request->file('image');
            $imageName='doctor_profile_'.$doctor.time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/'), $imageName);
            Doctor::where('id',session()->get('doctor')['id'])->update([
                'image'=>$imageName,
            ]);
        }
        
        if ($request->hasFile('signechar')) {
            $image=$request->file('signechar');
            $imageName='doctor_signechar_'.$doctor.time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/'), $imageName);
            Doctor::where('id',session()->get('doctor')['id'])->update([
                'signechar'=>$imageName,
            ]);
        }

        $documents = [];
        if (isset($request->documents)) {
            foreach ($request->documents as $key => $document) {
                $imageName='doctor_document_'.$doctor.time().'.'.$document->getClientOriginalExtension();
                $document->move(public_path('uploads/'), $imageName);
                array_push($documents,$imageName);
           }
       }

       $doctor =  Doctor::where('id',session()->get('doctor')['id'])->update([
        'documents' => $documents,
       ]);

        if ($doctor) {
            return redirect()->back()->with('success','Profile update Success');
        } else {
            return redirect()->back()->with('error','Try Again');
        }
   }

    public function appointment($value='')
    {
        $bookings = Booking::where('doctor_id',session()->get('doctor')['id'])->where('payment_verify',1)->orderBy('id','desc')->get();
        return view('fontend.doctor.appoinment',compact('bookings'));
    }

    public function appointment_accept($id)
    {
        $booking  = Booking::where('id',$id)->first();
        $accept = $booking->update([
            'is_accept' => 1,
        ]);

         if ($accept) {
            return redirect()->back()->with('success','Aappointment Accept Success');
        } else {
            return redirect()->back()->with('error','Try Again');
        }
    }

    public function appointment_cancel($id)
    {
        $booking  = Booking::where('id',$id)->first();
        $accept = $booking->update([
            'is_accept' => 2,
        ]);

        if ($accept) {
            return redirect()->back()->with('success','Aappointment Accept Success');
        } else {
            return redirect()->back()->with('error','Try Again');
        }
    }

    public function chat(Booking $chat)
   {
        $booking = $chat;
        return view('fontend.doctor.chat',compact('booking'));
   }

   public function chat_submit(Booking $chat, Request $request)
   {
        if ($request->chat != null) {
            $chatCreate = Chat::create([
                'booking_id' => $chat->id,
                'doctor' => $request->chat,
            ]);
             return response()->json($chatCreate);
        }
        // return redirect()->back();
   }

   public function chat_ajax(Booking $chat)
   {
        $booking = $chat;
        return view('fontend.doctor.chat-ajax',compact('booking'));
   }

   public function prescription(Booking $booking)
   {
        return view('fontend.doctor.prescription-create',compact('booking'));
   }

   public function prescription_submit(Request $request,Booking $booking)
   {
        $update = $booking->update([
            'problem' => $request->problem,
            'medicines' => $request->items,
            'tests' => $request->tests,
        ]);

        return redirect()->back()->with('success','Prescription Update Success');
   }
  
}
