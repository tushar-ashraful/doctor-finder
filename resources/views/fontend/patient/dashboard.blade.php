@extends('fontend.patient.layouts.patient')
@section('patient')
<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="card">
        <div class="card-body p-0">
            <div class="tab-content pt-0">
                <div id="pat_appointments" class="tab-pane fade show active">
                    <div class="card-table mb-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Doctor</th>
                                            <th>Appt Date</th>
                                            <th>Booking Date</th>
                                            <th>Amount</th>
                                            <th>Payment Verify</th>
                                            <th>Status</th>
                                            {{-- <th>Actions</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookings as $booking)
                                      
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ $booking->doctor->image() }}" alt="User Image">
                                                    </a>
                                                    <a href="{{ route('website.doctorview',$booking->doctor_id) }}">{{ $booking->doctor->name }}<span>{{ $booking->doctor->specialist }}</span></a>
                                                </h2>
                                            </td>
                                            <td>{{ date('d F Y  h:i a', strtotime($booking->date_on))}}</td>
                                            <td>{{ date('d F Y  h:i a', strtotime($booking->created_at))}}</td>
                                            <td>{{ $booking->amount }} Tk.</td>
                                            <td>
                                               @if($booking->payment_verify == 0)
                                               <span class="badge rounded-pill danger-status">Not Verify</span><br>
                                               @endif
                                               @if($booking->payment_verify == 1)
                                               <span class="badge rounded-pill success-status">Verify</span><br>
                                               @endif
                                            </td>
                                            <td>
                                                @if ($booking->is_accept == 1)
                                                <span class="badge rounded-pill success-status">Confirm</span><br>
                                                {{-- @if() --}}
                                                @php
                                                $time = Carbon\Carbon::parse($booking->date_on);
                                                @endphp
                                                @if($time <= now() && $booking->payment_verify == 1 && $booking->is_accept == 1)
                                                <a href="{{ route('website.patient.chat',$booking->id) }}" class="btn btn-danger mt-2"><i class="feather-message-circle " style="margin-right: 4px;"></i>Massage</a>
                                                @if (isset($booking->medicines))
                                                <a href="{{ route('website.patient.prescription',$booking->id) }}" class="btn btn-success mt-2"><i class="feather-message-circle " style="margin-right: 4px;"></i>Prescription</a>
                                                @endif
                                                @endif
                                                @endif
                                                @if ($booking->is_accept == 2)
                                                <span class="badge rounded-pill danger-status">Cancelled</span>
                                                @endif
                                                @if ($booking->is_accept == 0)
                                                <span class="badge rounded-pill warning-status">Pending</span>
                                                @endif
                                            </td>
                                            {{-- <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                </div>
                                            </td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pat_prescriptions">
                    <div class="card-table mb-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Date </th>
                                            <th>Name</th>
                                            <th>Created by </th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>14 Nov 2021</td>
                                            <td>Prescription 1</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Ruby Perrin <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>13 Nov 2021</td>
                                            <td>Prescription 2</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>12 Nov 2021</td>
                                            <td>Prescription 3</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Deborah Angel <span>Cardiology</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>11 Nov 2021</td>
                                            <td>Prescription 4</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-04.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Sofia Brient <span>Urology</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>10 Nov 2021</td>
                                            <td>Prescription 5</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-05.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Marvin Campbell <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>9 Nov 2021</td>
                                            <td>Prescription 6</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-06.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Katharine Berthold <span>Orthopaedics</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8 Nov 2021</td>
                                            <td>Prescription 7</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-07.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Linda Tobin <span>Neurology</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7 Nov 2021</td>
                                            <td>Prescription 8</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-08.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Paul Richard <span>Dermatology</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6 Nov 2021</td>
                                            <td>Prescription 9</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-09.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. John Gibbs <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5 Nov 2021</td>
                                            <td>Prescription 10</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-10.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Olga Barlow <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="pat_medical_records" class="tab-pane fade">
                    <div class="card-table mb-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date </th>
                                            <th>Description</th>
                                            <th>Attachment</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0010</a></td>
                                            <td>14 Nov 2021</td>
                                            <td>Dental Filling</td>
                                            <td><a href="#">dental-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Ruby Perrin <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0009</a></td>
                                            <td>13 Nov 2021</td>
                                            <td>Teeth Cleaning</td>
                                            <td><a href="#">dental-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0008</a></td>
                                            <td>12 Nov 2021</td>
                                            <td>General Checkup</td>
                                            <td><a href="#">cardio-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Deborah Angel <span>Cardiology</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0007</a></td>
                                            <td>11 Nov 2021</td>
                                            <td>General Test</td>
                                            <td><a href="#">general-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-04.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Sofia Brient <span>Urology</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0006</a></td>
                                            <td>10 Nov 2021</td>
                                            <td>Eye Test</td>
                                            <td><a href="#">eye-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-05.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Marvin Campbell <span>Ophthalmology</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0005</a></td>
                                            <td>9 Nov 2021</td>
                                            <td>Leg Pain</td>
                                            <td><a href="#">ortho-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-06.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Katharine Berthold <span>Orthopaedics</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0004</a></td>
                                            <td>8 Nov 2021</td>
                                            <td>Head pain</td>
                                            <td><a href="#">neuro-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-07.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Linda Tobin <span>Neurology</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0003</a></td>
                                            <td>7 Nov 2021</td>
                                            <td>Skin Alergy</td>
                                            <td><a href="#">alergy-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-08.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Paul Richard <span>Dermatology</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0002</a></td>
                                            <td>6 Nov 2021</td>
                                            <td>Dental Removing</td>
                                            <td><a href="#">dental-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-09.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. John Gibbs <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0);">#MR-0001</a></td>
                                            <td>5 Nov 2021</td>
                                            <td>Dental Filling</td>
                                            <td><a href="#">dental-test.pdf</a></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-10.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Olga Barlow <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="pat_billing" class="tab-pane fade">
                    <div class="card-table mb-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Invoice No</th>
                                            <th>Doctor</th>
                                            <th>Amount</th>
                                            <th>Paid On</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="invoice-view.html">#INV-0010</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Ruby Perrin <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td>450 Tk</td>
                                            <td>14 Nov 2021</td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="invoice-view.html">#INV-0009</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td>300 Tk</td>
                                            <td>13 Nov 2021</td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="invoice-view.html">#INV-0008</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Deborah Angel <span>Cardiology</span></a>
                                                </h2>
                                            </td>
                                            <td>150 Tk</td>
                                            <td>12 Nov 2021</td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="invoice-view.html">#INV-0007</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-04.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Sofia Brient <span>Urology</span></a>
                                                </h2>
                                            </td>
                                            <td>50 Tk</td>
                                            <td>11 Nov 2021</td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="invoice-view.html">#INV-0006</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-05.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Marvin Campbell <span>Ophthalmology</span></a>
                                                </h2>
                                            </td>
                                            <td>600 Tk</td>
                                            <td>10 Nov 2021</td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="invoice-view.html">#INV-0005</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-06.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Katharine Berthold <span>Orthopaedics</span></a>
                                                </h2>
                                            </td>
                                            <td>200 Tk</td>
                                            <td>9 Nov 2021</td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="invoice-view.html">#INV-0004</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-07.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Linda Tobin <span>Neurology</span></a>
                                                </h2>
                                            </td>
                                            <td>100 Tk</td>
                                            <td>8 Nov 2021</td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="invoice-view.html">#INV-0003</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-08.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Paul Richard <span>Dermatology</span></a>
                                                </h2>
                                            </td>
                                            <td>250 Tk</td>
                                            <td>7 Nov 2021</td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="invoice-view.html">#INV-0002</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-09.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. John Gibbs <span>Dental</span></a>
                                                </h2>
                                            </td>
                                            <td>175 Tk</td>
                                            <td>6 Nov 2021</td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="invoice-view.html">#INV-0001</a>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-10.jpg" alt="User Image">
                                                    </a>
                                                    <a href="doctor-profile.html">Dr. Olga Barlow <span>#0010</span></a>
                                                </h2>
                                            </td>
                                            <td>550 Tk</td>
                                            <td>5 Nov 2021</td>
                                            <td>
                                                <div class="table-action">
                                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                        <i class="feather-printer"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection