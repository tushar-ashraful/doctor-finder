@extends('layouts.website')
@section('content')
<div class="breadcrumb-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-12">
                            <h2 class="breadcrumb-title">All Doctors Us</h2>
                        </div>
                    </div>
                </div>
            </div>
            <section class="section section-featurebox">
                <div class="container">
                    <div class="row">
                        @foreach ($doctors as $doctor)
                        <div class="col-md-3">
                           <div class="profile-widget">
                            <div class="doc-img">
                                <a href="doctor-profile.html">
                                    <img class="img-fluid" alt="User Image" src="{{ $doctor->image() }}">
                                </a>
                                <a href="javascript:void(0)" class="fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                            </div>
                            <div class="pro-content">
                                <h3 class="title">
                                    <a href="doctor-profile.html">{{ $doctor->name }}</a>
                                    <i class="feather-check-circle verified"></i>
                                </h3>
                                <p class="speciality">{{ $doctor->sub_title }}</p>
                                <p class="speciality">{{ $doctor->specialist }}</p>
                                <p class="speciality">Gender: {{ $doctor->gender }}</p>
                                <ul class="available-info">
                                    <li>
                                        <i class="far fa-money-bill-alt"></i> {{ $doctor->price }} Tk.
                                        {{-- <i class="feather-info" data-bs-toggle="tooltip" title="Lorem Ipsum"></i> --}}
                                    </li>
                                </ul>
                                <div class="profile-btn-list">
                                    <a href="{{ route('website.doctorview',$doctor->id) }}" class="btn btn-primary view-btn">View Profile</a>
                                    <a href="{{ route('website.doctorview',$doctor->id) }}" class="btn book-btn">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                </div>
            </section>

@endsection