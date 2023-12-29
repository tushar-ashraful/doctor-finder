<?php

namespace App\Http\Controllers\Backend\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
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
        $bookings = Booking::orderBy('id','desc')->get();
        return view('backend.bookinglist.index',compact('bookings'));
    }

    public function approved(Booking $booking)
    {
        $booking = $booking->update([
            'payment_verify' => 1,
        ]);

        if ($booking) {
            return redirect()->back()->with('success','Booking Payment Approve Success');
        } else {
            return redirect()->back()->with('error','Try Again');
        }
    }

    // public function view(Booking $booking)
    // {
    //     return view('backend.bookinglist.invoice',compact('booking'));
    // }
}
