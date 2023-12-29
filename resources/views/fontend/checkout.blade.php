@extends('layouts.website')
@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-lg-4 theiaStickySidebar">
                <div class="card booking-card">
                    <div class="card-header">
                        <h4 class="card-title">Booking Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="booking-doc-info">
                            <a href="doctor-profile.html" class="booking-doc-img">
                                <img src="{{ $doctor->image() }}" alt="User Image">
                            </a>
                            <div class="booking-info">
                                <h4><a href="#">{{ $doctor->name }}</a></h4>
                                
                                <div class="clinic-details">
                                    <p class="">{{ $doctor->sub_title }}</p>
                                    <p class="">{{ $doctor->specialist }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="booking-summary border-0">
                            <div class="booking-item-wrap">
                                <ul class="booking-fee">
                                    <li>Consulting Fee <span>{{ $doctor->price }} Tk.</span></li>
                                    {{-- <li>Booking Fee <span>$10</span></li> --}}
                                    {{-- <li class="mb-0">Video Call <span>$50</span></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="booking-total">
                            <ul class="booking-total-list">
                                <li>
                                    <span>Total</span>
                                    <span class="total-cost">{{ $doctor->price }} Tk.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-lg-8">
                <div class="card book-info">
                    <form action="{{ route('website.checkout.submit',$doctor->id) }}" method="post">
                        @csrf
                        <div class="info-widget">
                            <div class="card-header">
                                <h4 class="card-title">Appointment Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Appointment Date/time</label>
                                            <input name="date_on" required class="form-control" type="datetime-local">
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Payment Number</label>
                                            <input name="payment_number" required class="form-control" type="number">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Payment Transiton Number</label>
                                            <input name="payment_transiton_number" required class="form-control" type="text">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6 col-sm-12">
                                       <img src="{{ asset('contents') }}/payment.jpg" alt=""> 
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="card-body inf-widget">
                                <div class="payment-widget">
                                    {{-- <h4 class="card-title">Payment Method</h4> --}}
                                    <div class="terms-accept">
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="terms_accept" required>
                                            <label for="terms_accept"> I have read and accept <a href="term-condition.html">Terms &amp; Conditions</a></label>
                                        </div>
                                    </div>
                                    <div class="submit-section mt-4">
                                        <button type="submit" class="btn btn-primary submit-btn">Confirm Appointment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection