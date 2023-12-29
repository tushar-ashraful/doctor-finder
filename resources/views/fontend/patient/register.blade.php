@extends('layouts.website')
@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row mb-5 mt-5">
                        <div class="col-md-8 offset-md-2">
                            <div class="account-content">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-md-7 col-lg-6 login-left">
                                        <img src="{{ asset('contents/fontend') }}/assets/img/login-banner.png" class="img-fluid" alt="Login Banner">
                                    </div>
                                    <div class="col-md-12 col-lg-6 login-right">
                                        <div class="login-header">
                                            <h3>Patient Registration <a href="{{ route('website.doctor.register') }}">Doctor Registration</a></h3>
                                        </div>
                                        <form action="{{ route('website.patient.register.submit') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label class="focus-label">Name</label>
                                                <input type="text" class="form-control" name="name">
                                                @if($errors->has('name'))
                                                <div class="mt-1 text-danger">{{$errors->first('name')}}</div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="focus-label">Email</label>
                                                <input type="text" class="form-control" name="email">
                                                @if($errors->has('email'))
                                                <div class="mt-1 text-danger">{{$errors->first('email')}}</div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="focus-label">Mobile Number</label>
                                                <input type="text" class="form-control" name="phone">
                                                @if($errors->has('phone'))
                                                <div class="mt-1 text-danger">{{$errors->first('phone')}}</div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="focus-label">Create Password</label>
                                                <input type="password" class="form-control" name="password">
                                                @if($errors->has('password'))
                                                <div class="mt-1 text-danger">{{$errors->first('password')}}</div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="focus-label">Confirm Password</label>
                                                <input type="password" class="form-control" name="password_confirmation">
                                            </div>
                                            <div class="text-start">
                                                <a class="forgot-link" href="{{ route('website.patient.login') }}">Already have an account?</a>
                                            </div>
                                            <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Sign up</button>
                                            {{-- <div class="login-or">
                                                <span class="or-line"></span>
                                                <span class="span-or">or</span>
                                            </div> --}}
                                            {{-- <div class="row form-row social-login">
                                                <div class="col-6">
                                                    <a href="#" class="btn btn-facebook w-100"><img src="assets/img/fb.png" class="img-fluid" alt="fb"> Login</a>
                                                </div>
                                                <div class="col-6">
                                                    <a href="#" class="btn btn-google w-100"><img src="assets/img/google.png" class="img-fluid" alt="Logo"> Login</a>
                                                </div>
                                            </div> --}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
@endsection
           