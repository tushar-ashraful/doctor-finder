@extends('layouts.website')
@push('css')
    <link rel="stylesheet" href="{{ asset('contents/fontend') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('contents/fontend') }}/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('contents/fontend') }}/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('contents/fontend') }}/assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="{{ asset('contents/fontend') }}/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('contents/fontend') }}/assets/css/feather.css">
    <link rel="stylesheet" href="{{ asset('contents/fontend') }}/assets/css/style.css">
    <script src="{{ asset('contents/fontend') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('contents/fontend') }}/assets/plugins/select2/js/select2.min.js"></script>
    <script src="{{ asset('contents/fontend') }}/assets/js/moment.min.js"></script>
    <script src="{{ asset('contents/fontend') }}/assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{ asset('contents/fontend') }}/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="{{ asset('contents/fontend') }}/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
    <script src="{{ asset('contents/fontend') }}/assets/js/script.js"></script>
@endpush
@section('content')
@php
     $patientLoginInfo = App\Models\Patient::where('id',session()->get('patient')['id'])->first();
@endphp
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">Dashboard</h2>
                {{-- <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Doctor Dashboard</li>
                    </ol>
                </nav> --}}
            </div>
        </div>
    </div>
</div>
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                            <div class="profile-sidebar">
                                <div class="widget-profile pro-widget-content">
                                    <div class="profile-info-widget">
                                        <a href="patient-profile.html" class="booking-doc-img">
                                         @if ($patientLoginInfo->image != null)
                                         <img src="{{ $patientLoginInfo->image() }}" alt="User Image">
                                         @else
                                         <img src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                                         @endif
                                        </a>
                                        <div class="profile-det-info">
                                            <h3>{{ $patientLoginInfo->name }}</h3>
                                            <div class="patient-details info-loc">
                                                <h5>{{ $patientLoginInfo->email }}</h5>
                                                <h5>{{ $patientLoginInfo->gender }}</h5>
                                                <h5>{{ $patientLoginInfo->phone }}</h5>
                                                <h5>{{ $patientLoginInfo->blood_group }}</h5>
                                                <h5>{{ $patientLoginInfo->dateOfBirth }}</h5>
                                                <h5>{{ $patientLoginInfo->address }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard-widget">
                                    <nav class="dashboard-menu">
                                        <ul>
                                            <li class="active">
                                                <a href="{{ route('website.patient.dashboard') }}">
                                                <span>Dashboard</span>
                                                <i class="feather-airplay"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('website.patient.profile') }}">
                                                <span>Profile Settings</span>
                                                <i class="feather-user"></i>
                                                </a>
                                            </li>
                                            {{-- <li>
                                                <a href="change-password.html">
                                                <span>Change Password</span>
                                                <i class="feather-lock"></i>
                                                </a>
                                            </li> --}}
                                            <li>
                                                <a href="{{ route('website.logout') }}">
                                                <span>Logout</span>
                                                <i class="feather-log-out"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        @yield('patient')
                    </div>
                </div>
            </div>
@endsection