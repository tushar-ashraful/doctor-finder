@extends('layouts.backend')
@section('pageTitle', 'Doctor Information View')
@section('content')
    <div class="container-fluid">
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body  met-pro-bg">
                        <div class="met-profile">
                            <div class="row">
                                <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                    <div class="met-profile-main">
                                        <div class="met-profile-main-pic">
                                             @if ($doctor->image != null)
                                            <img src="{{ $doctor->image() }}" width="114" alt="" class="rounded-circle">
                                             @else
                                            <img src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-02.jpg" width="114" alt="" class="rounded-circle">
                                             @endif
                                            <span class="fro-profile_main-pic-change">
                                                <i class="fas fa-camera"></i>
                                            </span>
                                        </div>
                                        <div class="met-profile_user-detail">
                                            <h6 class="met-user-name text-dark">{{ $doctor->name }} </br>{{ $doctor->sub_title }}(Specialist: {{ $doctor->specialist }})</h6>
                                            {{-- <p class="mb-0 met-user-name-post">UI/UX Designer</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4 ml-auto">
                                    <ul class="list-unstyled personal-detail">
                                        <li class=" text-dark"><b> Phone </b> : {{ $doctor->phone }}</li>
                                        <li class="mt-2 text-dark"><b> Email </b> : {{ $doctor->email }}</li>
                                        <li class="mt-2 text-dark"><b> Education </b> : {{ $doctor->education }}</li>
                                        <li class="mt-2 text-dark"><b> Experience </b> : {{ $doctor->experience }}</li>
                                        <li class="mt-2 text-dark"><b> Gender </b> : {{ $doctor->gender }}</li>
                                        <li class="mt-2 text-dark"><b> Date Of Birth </b> : {{ $doctor->dateOfBirth }}</li>
                                        <li class="mt-2 text-dark"><b> Price </b> : {{ $doctor->price }}</li>
                                        <li class="mt-2 text-dark"> 
                                            @if ($doctor->documents != null)
                                            @foreach ($doctor->documents as $document)
                                            <a href="{{ asset("uploads/{$document}") }}" target="_blank"><img width='100' src="{{ asset("uploads/{$document}") }}" alt=""></a>
                                            @endforeach
                                            @endif
                                        </li>
                                        {{-- <li class="mt-2 text-dark"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i> <b>Location</b> : USA</li> --}}
                                    </ul>
                                    {{-- <div class="button-list btn-social-icon">
                                        <button type="button" class="btn btn-blue btn-round">
                                            <i class="fab fa-facebook-f"></i>
                                        </button>

                                        <button type="button" class="btn btn-secondary btn-round ml-2">
                                            <i class="fab fa-twitter"></i>
                                        </button>

                                        <button type="button" class="btn btn-pink btn-round  ml-2">
                                            <i class="fab fa-dribbble"></i>
                                        </button>
                                    </div> --}}
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end f_profile-->
                    </div>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
    
    </div>
@endsection
