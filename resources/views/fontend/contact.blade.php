@extends('layouts.website')
@section('content')
<section class="contact-section">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-12 text-center">
                            <h3 class="mb-4">Contact Us</h3>
                            <p>Great doctor if you need your family member to get effective immediate assistance, emergency treatment or a simple consultation.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 d-flex">
                            <div class="contact-box w-100 d-flex flex-wrap">
                                <div class="infor-img">
                                    <div class="image-circle">
                                        <i class="feather-phone"></i>
                                    </div>
                                </div>
                                <div class="infor-details text-center">
                                    <label>Phone Number</label>
                                    <p>+88 01843635461</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="contact-box w-100 d-flex flex-wrap">
                                <div class="infor-img">
                                    <div class="image-circle bg-primary">
                                        <i class="feather-mail"></i>
                                    </div>
                                </div>
                                <div class="infor-details text-center">
                                    <label>Email</label>
                                    <p><a href="">sayemakther78446@gmnail.com </a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="contact-box w-100 d-flex flex-wrap">
                                <div class="infor-img">
                                    <div class="image-circle">
                                        <i class="feather-map-pin"></i>
                                    </div>
                                </div>
                                <div class="infor-details text-center">
                                    <label>Location</label>
                                    <p>4/1 Block a Lalmatia Dhaka</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="contact-form">
                <div class="container">
                    <div class="section-header text-center">
                        <h2>Get in touch!</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="#" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Your Name <span>*</span></label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Your Email <span>*</span></label>
                                            <input type="text" class="form-control" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input type="text" class="form-control" name="subject" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Comments <span>*</span></label>
                                            <textarea class="form-control" name="text" required>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn bg-primary">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

@endsection