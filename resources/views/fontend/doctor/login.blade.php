@extends('layouts.website')
@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row mt-5 mb-5">
                        <div class="col-md-8 offset-md-2">
                            <div class="account-content">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-md-7 col-lg-6 login-left">
                                        <img src="{{ asset('contents/fontend') }}/assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">
                                    </div>
                                    <div class="col-md-12 col-lg-6 login-right">
                                     <div class="login-header">
                                        <h3>Doctor Login <a href="{{ route('website.doctor.login') }}">Patient Login</a></h3>
                                    </div>
                                        <form action="{{ route('website.doctor.login.submit') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email">
                                                @if($errors->has('email'))
                                                <div class="mt-1 text-danger">{{$errors->first('email')}}</div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password">
                                                @if($errors->has('password'))
                                                <div class="mt-1 text-danger">{{$errors->first('password')}}</div>
                                                @endif
                                            </div>
                                            <div class="text-start">
                                                {{-- <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a> --}}
                                            </div>
                                            <button class="btn btn-primary btn-lg login-btn" type="submit">Login</button>
                                            <div class="text-center dont-have">Don’t have an account? <a href="{{ route('website.doctor.register') }}">Register</a></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
@endsection
           