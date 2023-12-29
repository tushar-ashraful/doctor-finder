@extends('layouts.backend')
@section('pageTitle', 'Users Information View')
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
                                            <img src="{{$user->image}}" width="114" alt="" class="rounded-circle">
                                            <span class="fro-profile_main-pic-change">
                                                <i class="fas fa-camera"></i>
                                            </span>
                                        </div>
                                        <div class="met-profile_user-detail">
                                            <h5 class="met-user-name text-dark">{{ $user->name }} </br>({{ $user->username }})</h5>
                                            {{-- <p class="mb-0 met-user-name-post">UI/UX Designer</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4 ml-auto">
                                    <ul class="list-unstyled personal-detail">
                                        <li class=" text-dark"><i class="dripicons-phone mr-2 text-info font-18"></i> <b> phone </b> : {{ $user->phone }}</li>
                                        <li class="mt-2 text-dark"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : {{ $user->email }}</li>
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
