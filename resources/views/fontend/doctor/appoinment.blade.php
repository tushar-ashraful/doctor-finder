@extends('fontend.doctor.layouts.doctor')
@section('doctor')
<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="appointments-detail">
        <div class="row">
            @foreach ($bookings as $booking)
            <div class="col-md-12 col-sm-6 col-lg-4 ">
                <div class="card widget-profile pat-widget-profile">
                    <div class="card-body">
                        <div class="pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="patient-profile.html" class="booking-doc-img">
                                 @if ($booking->patient->image != null)
                                 <img src="{{ $booking->patient->image() }}" alt="User Image">
                                 @else
                                 <img src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                                 @endif
                                </a>
                                <div class="profile-det-info">
                                    <h3><a href="patient-profile.html">{{ $booking->patient->name }}</a></h3>
                                    <div class="appointment-action">
                                        {{-- <a href="#" class="btn btn-sm bg-info-light" data-bs-toggle="modal" data-bs-target="#appt_details">
                                            <i class="feather-eye"></i>
                                        </a> --}}
                                        @if ($booking->is_accept == 0)
                                        <a href="{{ route('website.doctor.appointment.accept',$booking->id) }}" class="btn btn-sm bg-success-light">
                                            <i class="feather-check-circle"></i>
                                        </a>
                                        <a href="{{ route('website.doctor.appointment.cancel',$booking->id) }}" class="btn btn-sm bg-danger-light">
                                            <i class="feather-x-circle"></i>
                                        </a>
                                        @endif
                                        @if ($booking->is_accept == 1)
                                         <span class="badge rounded-pill success-status">Confirm</span> <br>
                                         @php
                                         $time = Carbon\Carbon::parse($booking->date_on);
                                         @endphp
                                         @if($time <= now() && $booking->payment_verify == 1 && $booking->is_accept == 1)
                                            <a href="{{ route('website.doctor.chat',$booking->id) }}" class="btn btn-danger mt-2 " style="width: 150px;"><i class="feather-message-circle " style="margin-right: 4px;"></i>Massage</a>
                                            <a href="{{ route('website.doctor.appointment.prescription',$booking->id) }}" class="btn btn-success mt-2 " style="width: 150px;"><i class="feather-message-circle " style="margin-right: 4px;"></i>prescription</a>
                                            @endif
                                        @endif
                                        @if ($booking->is_accept == 2)
                                        <span class="badge rounded-pill danger-status">Cancelled</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="patient-info">
                            <div class="patient-details">
                                <h5><i class="fas fa-user-clock"></i> Appointment Date: {{ date('d F Y  h:i a', strtotime($booking->date_on))}}</h5>
                                <h5><i class="fas fa-user-clock"></i> Booking Date: {{ date('d F Y  h:i a', strtotime($booking->created_at))}}</h5>
                                <h5><i class="fas fa-map-marker-alt"></i> {{ $booking->patient->address }}</h5>
                                <h5><i class="fas fa-envelope"></i>{{ $booking->patient->email }}</a></h5>
                                <h5 class="mb-0"><i class="fas fa-phone"></i> {{ $booking->patient->phone }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             @endforeach
        </div>
    </div>
</div>

@endsection

