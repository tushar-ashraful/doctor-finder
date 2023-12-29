@extends('layouts.website')
@section('content')
 <div class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="doctor-widget">
                                <div class="doc-info-left">
                                    <div class="doctor-img">
                                        <img src="{{ $doctor->image() }}" class="img-fluid" alt="User Image">
                                    </div>
                                    <div class="doc-info-cont">
                                        <h4 class="doc-name">{{ $doctor->name }} <i title='Verified' class="feather-check-circle verified"></i></h4>
                                        <p class="doc-speciality">{{ $doctor->sub_title }}</p>
                                        <p class="doc-department">Specialist: {{ $doctor->specialist }}</p>
                                        <p class="doc-department">Education: {{ $doctor->education }}</p>
                                        <p class="doc-department">Experience: {{ $doctor->experience }}</p>
                                        <p class="doc-department">Gender: {{ $doctor->gender }}</p>
                                        <p class="doc-department">Phone: {{ $doctor->phone }}</p>                                       
                                    </div>
                                </div>
                                <div class="doc-info-right">
                                    <div class="clini-infos">
                                        <ul>
                                            <li><i class="far fa-thumbs-up"></i> 99%</li>
                                            <li><i class="far fa-money-bill-alt"></i> {{ $doctor->price }} Tk. {{-- <i class="feather-info" data-bs-toggle="tooltip" title=""></i> --}} </li>
                                        </ul>
                                    </div>
                                    <div class="clinic-booking">
                                        <a class="apt-btn" href="{{ route('website.checkout',$doctor->id) }}">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <nav class="user-tabs mb-4">
                                <ul class="nav nav-tabs nav-tabs-bottom">
                                   {{--  <li class="nav-item">
                                        <a class="nav-link active" href="#doc_overview" data-bs-toggle="tab">Overview</a>
                                    </li> --}}
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="#doc_locations" data-bs-toggle="tab">Locations</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#doc_reviews" data-bs-toggle="tab">Reviews</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#doc_business_hours" data-bs-toggle="tab">Business Hours</a>
                                    </li> --}}
                                </ul>
                            </nav>
                            <div class="tab-content pt-0">
                                <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="widget about-widget">
                                                <h4 class="widget-title">About Me</h4>
                                                <p>{{ $doctor->about_me }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" id="doc_locations" class="tab-pane fade">
                                    <div class="location-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="clinic-content">
                                                    <h4 class="clinic-name"><a href="#">Smile Cute Dental Care Center</a></h4>
                                                    <p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>
                                                    <div class="rating">
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span class="d-inline-block average-rating">(4)</span>
                                                    </div>
                                                    <div class="clinic-details mb-0">
                                                        <h5 class="clinic-direction"> <i class="feather-map-pin"></i> 2286 Sundown Lane, Austin, Texas 78749, USA <br><a href="javascript:void(0);">Get Directions</a></h5>
                                                        <ul>
                                                            <li>
                                                                <a href="{{ asset('contents/fontend') }}/assets/img/features/feature-01.jpg" data-fancybox="gallery2">
                                                                <img src="{{ asset('contents/fontend') }}/assets/img/features/feature-01.jpg" alt="Feature Image">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ asset('contents/fontend') }}/assets/img/features/feature-02.jpg" data-fancybox="gallery2">
                                                                <img src="{{ asset('contents/fontend') }}/assets/img/features/feature-02.jpg" alt="Feature Image">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ asset('contents/fontend') }}/assets/img/features/feature-03.jpg" data-fancybox="gallery2">
                                                                <img src="{{ asset('contents/fontend') }}/assets/img/features/feature-03.jpg" alt="Feature Image">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ asset('contents/fontend') }}/assets/img/features/feature-04.jpg" data-fancybox="gallery2">
                                                                <img src="{{ asset('contents/fontend') }}/assets/img/features/feature-04.jpg" alt="Feature Image">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="clinic-timing">
                                                    <div>
                                                        <p class="timings-days">
                                                            <span> Mon - Sat </span>
                                                        </p>
                                                        <p class="timings-times">
                                                            <span>10:00 AM - 2:00 PM</span>
                                                            <span>4:00 PM - 9:00 PM</span>
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <p class="timings-days">
                                                            <span>Sun</span>
                                                        </p>
                                                        <p class="timings-times">
                                                            <span>10:00 AM - 2:00 PM</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="consult-price">
                                                    $250
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="location-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="clinic-content">
                                                    <h4 class="clinic-name"><a href="#">The Family Dentistry Clinic</a></h4>
                                                    <p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>
                                                    <div class="rating">
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star filled"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span class="d-inline-block average-rating">(4)</span>
                                                    </div>
                                                    <div class="clinic-details mb-0">
                                                        <p class="clinic-direction"> <i class="feather-map-pin"></i> 2883 University Street, Seattle, Texas Washington, 98155 <br><a href="javascript:void(0);">Get Directions</a></p>
                                                        <ul>
                                                            <li>
                                                                <a href="{{ asset('contents/fontend') }}/assets/img/features/feature-01.jpg" data-fancybox="gallery2">
                                                                <img src="{{ asset('contents/fontend') }}/assets/img/features/feature-01.jpg" alt="Feature Image">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ asset('contents/fontend') }}/assets/img/features/feature-02.jpg" data-fancybox="gallery2">
                                                                <img src="{{ asset('contents/fontend') }}/assets/img/features/feature-02.jpg" alt="Feature Image">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ asset('contents/fontend') }}/assets/img/features/feature-03.jpg" data-fancybox="gallery2">
                                                                <img src="{{ asset('contents/fontend') }}/assets/img/features/feature-03.jpg" alt="Feature Image">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ asset('contents/fontend') }}/assets/img/features/feature-04.jpg" data-fancybox="gallery2">
                                                                <img src="{{ asset('contents/fontend') }}/assets/img/features/feature-04.jpg" alt="Feature Image">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="clinic-timing">
                                                    <div>
                                                        <p class="timings-days">
                                                            <span> Tue - Fri </span>
                                                        </p>
                                                        <p class="timings-times">
                                                            <span>11:00 AM - 1:00 PM</span>
                                                            <span>6:00 PM - 11:00 PM</span>
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <p class="timings-days">
                                                            <span>Sat - Sun</span>
                                                        </p>
                                                        <p class="timings-times">
                                                            <span>8:00 AM - 10:00 AM</span>
                                                            <span>3:00 PM - 7:00 PM</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="consult-price">
                                                    $350
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" id="doc_reviews" class="tab-pane fade">
                                    <div class="widget review-listing">
                                        <ul class="comments-list">
                                            <li>
                                                <div class="comment">
                                                    <img class="avatar avatar-sm rounded-circle" alt="User Image" src="{{ asset('contents/fontend') }}/assets/img/patients/patient.jpg">
                                                    <div class="comment-body">
                                                        <div class="meta-data">
                                                            <span class="comment-author">Richard Wilson</span>
                                                            <span class="comment-date">Reviewed 2 Days ago</span>
                                                            <div class="review-count rating">
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the doctor</p>
                                                        <p class="comment-content">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                            Ut enim ad minim veniam, quis nostrud exercitation.
                                                            Curabitur non nulla sit amet nisl tempus
                                                        </p>
                                                        <div class="comment-reply">
                                                            <a class="comment-btn" href="#">
                                                            <i class="fas fa-reply"></i> Reply
                                                            </a>
                                                            <p class="recommend-btn">
                                                                <span>Recommend?</span>
                                                                <a href="#" class="like-btn">
                                                                <i class="far fa-thumbs-up"></i> Yes
                                                                </a>
                                                                <a href="#" class="dislike-btn">
                                                                <i class="far fa-thumbs-down"></i> No
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="comments-reply">
                                                    <li>
                                                        <div class="comment">
                                                            <img class="avatar avatar-sm rounded-circle" alt="User Image" src="{{ asset('contents/fontend') }}/assets/img/patients/patient1.jpg">
                                                            <div class="comment-body">
                                                                <div class="meta-data">
                                                                    <span class="comment-author">Charlene Reed</span>
                                                                    <span class="comment-date">Reviewed 3 Days ago</span>
                                                                    <div class="review-count rating">
                                                                        <i class="fas fa-star filled"></i>
                                                                        <i class="fas fa-star filled"></i>
                                                                        <i class="fas fa-star filled"></i>
                                                                        <i class="fas fa-star filled"></i>
                                                                        <i class="fas fa-star"></i>
                                                                    </div>
                                                                </div>
                                                                <p class="comment-content">
                                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                                    Ut enim ad minim veniam.
                                                                    Curabitur non nulla sit amet nisl tempus
                                                                </p>
                                                                <div class="comment-reply">
                                                                    <a class="comment-btn" href="#">
                                                                    <i class="fas fa-reply"></i> Reply
                                                                    </a>
                                                                    <p class="recommend-btn">
                                                                        <span>Recommend?</span>
                                                                        <a href="#" class="like-btn">
                                                                        <i class="far fa-thumbs-up"></i> Yes
                                                                        </a>
                                                                        <a href="#" class="dislike-btn">
                                                                        <i class="far fa-thumbs-down"></i> No
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="comment">
                                                    <img class="avatar avatar-sm rounded-circle" alt="User Image" src="{{ asset('contents/fontend') }}/assets/img/patients/patient2.jpg">
                                                    <div class="comment-body">
                                                        <div class="meta-data">
                                                            <span class="comment-author">Travis Trimble</span>
                                                            <span class="comment-date">Reviewed 4 Days ago</span>
                                                            <div class="review-count rating">
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star filled"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <p class="comment-content">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                            Ut enim ad minim veniam, quis nostrud exercitation.
                                                            Curabitur non nulla sit amet nisl tempus
                                                        </p>
                                                        <div class="comment-reply">
                                                            <a class="comment-btn" href="#">
                                                            <i class="fas fa-reply"></i> Reply
                                                            </a>
                                                            <p class="recommend-btn">
                                                                <span>Recommend?</span>
                                                                <a href="#" class="like-btn">
                                                                <i class="far fa-thumbs-up"></i> Yes
                                                                </a>
                                                                <a href="#" class="dislike-btn">
                                                                <i class="far fa-thumbs-down"></i> No
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="all-feedback load-more mb-0">
                                            <a href="#" class="btn btn-primary btn-sm">
                                            Show all feedback
                                            </a>
                                        </div>
                                    </div>
                                    <div class="write-review">
                                        <h4>Write a review for <span class="text-info"><strong>Dr. Darren Elder</strong></span></h4>
                                        <form>
                                            <div class="form-group">
                                                <label>Review</label>
                                                <div class="star-rating">
                                                    <input id="star-5" type="radio" name="rating" value="star-5">
                                                    <label for="star-5" title="5 stars">
                                                    <i class="active fa fa-star"></i>
                                                    </label>
                                                    <input id="star-4" type="radio" name="rating" value="star-4">
                                                    <label for="star-4" title="4 stars">
                                                    <i class="active fa fa-star"></i>
                                                    </label>
                                                    <input id="star-3" type="radio" name="rating" value="star-3">
                                                    <label for="star-3" title="3 stars">
                                                    <i class="active fa fa-star"></i>
                                                    </label>
                                                    <input id="star-2" type="radio" name="rating" value="star-2">
                                                    <label for="star-2" title="2 stars">
                                                    <i class="active fa fa-star"></i>
                                                    </label>
                                                    <input id="star-1" type="radio" name="rating" value="star-1">
                                                    <label for="star-1" title="1 star">
                                                    <i class="active fa fa-star"></i>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Title of your review</label>
                                                <input class="form-control" type="text" placeholder="If you could say it in one sentence, what would you say?">
                                            </div>
                                            <div class="form-group">
                                                <label>Your review</label>
                                                <textarea id="review_desc" maxlength="100" class="form-control"></textarea>
                                                <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">100</span> characters remaining</small></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="terms-accept">
                                                    <div class="custom-checkbox">
                                                        <input type="checkbox" id="terms_accept">
                                                        <label for="terms_accept">I have read and accept <a href="#">Terms &amp; Conditions</a></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="submit-section">
                                                <button type="submit" class="btn btn-primary submit-btn">Add Review</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            <div class="widget business-widget">
                                                <div class="widget-content">
                                                    <div class="listing-hours">
                                                        <div class="card-header">
                                                            <div class="listing-day current mb-0 pb-0">
                                                                <div class="day">Today <span class="mt-2">5 Nov 2019</span></div>
                                                                <div class="time-items">
                                                                    <span class="open-status"><span class="badge success-status mb-1">Open Now</span></span>
                                                                    <span class="time">07:00 AM - 09:00 PM</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="listing-day">
                                                                <div class="day">Monday</div>
                                                                <div class="time-items">
                                                                    <span class="time">07:00 AM - 09:00 PM</span>
                                                                </div>
                                                            </div>
                                                            <div class="listing-day">
                                                                <div class="day">Tuesday</div>
                                                                <div class="time-items">
                                                                    <span class="time">07:00 AM - 09:00 PM</span>
                                                                </div>
                                                            </div>
                                                            <div class="listing-day">
                                                                <div class="day">Wednesday</div>
                                                                <div class="time-items">
                                                                    <span class="time">07:00 AM - 09:00 PM</span>
                                                                </div>
                                                            </div>
                                                            <div class="listing-day">
                                                                <div class="day">Thursday</div>
                                                                <div class="time-items">
                                                                    <span class="time">07:00 AM - 09:00 PM</span>
                                                                </div>
                                                            </div>
                                                            <div class="listing-day">
                                                                <div class="day">Friday</div>
                                                                <div class="time-items">
                                                                    <span class="time">07:00 AM - 09:00 PM</span>
                                                                </div>
                                                            </div>
                                                            <div class="listing-day">
                                                                <div class="day">Saturday</div>
                                                                <div class="time-items">
                                                                    <span class="time">07:00 AM - 09:00 PM</span>
                                                                </div>
                                                            </div>
                                                            <div class="listing-day closed">
                                                                <div class="day">Sunday</div>
                                                                <div class="time-items">
                                                                    <span class="time"><span class="badge danger-status">Closed</span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection