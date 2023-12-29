@extends('layouts.website')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                <!-- Profile Widget -->
                <div class="card widget-profile pat-widget-profile">
                    <div class="card-body">
                        <div class="pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    @if ($booking->patient->image != null)
                                    <img src="{{ $booking->patient->image() }}" alt="User Image">
                                    @else
                                    <img src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                                    @endif
                                </a>
                                <div class="profile-det-info">
                                    <h3><a href="patient-profile.html">{{ $booking->patient->name }}</a></h3>
                                    <div class="patient-details">
                                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{ $booking->patient->email }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="patient-info">
                            <ul>
                                <li>Phone <span>{{ $booking->patient->phone }}</span></li>
                                <li>Age <span>{{ $booking->patient->age() }}</span></li>
                                <li>Gender <span>{{ $booking->patient->gender }}</span></li>
                                <li>Blood Group <span>{{ $booking->patient->blood_group }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Profile Widget -->
            </div>
            <div class="col-md-7 col-lg-8 col-xl-9">
               <form action="{{ route('website.doctor.appointment.prescription_submit',$booking->id) }}" method="post">
                @csrf
                    <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Add Prescription</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="biller-info">
                                    <h4 class="d-block">{{  $booking->doctor->name }}</h4>
                                    <span class="d-block text-sm text-muted">{{ $booking->doctor->sub_title }}</span>
                                    <span class="d-block text-sm text-muted">Specialist: {{  $booking->doctor->specialist }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 text-sm-right">
                                <div class="billing-info">
                                    <h4 class="d-block">{{ date('d F Y  h:i a', strtotime($booking->date_on)) }}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Add Item -->
                       
                        <!-- Add Item -->
                        <!-- Prescription Item -->
                        <div class="card card-table border-0">
                            <div class="card-body ">
                                <h4>Problems</h4>
                                <hr>
                               <input class="form-control" name="problem" required value="{{ $booking->problem }}" type="text">  
                            </div>
                        </div> 
                        <div class="card card-table border-0">
                            <div class="card-body repeater-custom-show-hide">
                                <h4>Medicine</h4>
                                <hr>
                                <div class="table-responsive ">
                                    <table class="table table-hover table-center">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 200px">Name</th>
                                                <th style="min-width: 100px">Qty</th>
                                                <th style="min-width: 100px">Days</th>
                                                <th style="min-width: 100px;">Time</th>
                                                <th style="min-width: 100px;">Frequency</th>
                                                <th style="min-width: 80px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="" data-repeater-list="items">
                                            @if (isset($booking->medicines) || $booking->medicines != Null)
                                            @foreach ($booking->medicines as $item)
                                            <tr data-repeater-item>
                                                <td>
                                                    <input class="form-control" name="name"  required type="text" value="{{ $item['name'] }}">
                                                </td>
                                                <td>
                                                    <input class="form-control" name="qty" required type="text" value="{{ $item['qty'] }}">
                                                </td>
                                                <td>
                                                    <input class="form-control" name="day" required type="text" value="{{ $item['day'] }}">
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" name="time" @if (isset($item['time'])) @foreach ((array) $item['time'] as $time)  {{ $time == 'Morning' ? 'checked' : ''}}  @endforeach  @endif value="Morning" type="checkbox">Morning
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" name="time" @if(isset($item['time']))  @foreach ((array) $item['time'] as $time)  {{ $time == 'Afternoon' ? 'checked' : ''}}  @endforeach @endif value="Afternoon" type="checkbox"> Afternoon
                                                        </label>
                                                    </div>
                                                    <br>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" name="time" @if(isset($item['time']))  @foreach ((array) $item['time'] as $time)  {{ $time == 'Evening' ? 'checked' : ''}}  @endforeach @endif value="Evening" type="checkbox"> Evening
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" name="time" @if(isset($item['time']))  @foreach ((array) $item['time'] as $time)  {{ $time == 'Night' ? 'checked' : ''}}  @endforeach @endif value="Night" type="checkbox"> Night
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <select name="frequency" id="" class="form-control">
                                                        <option value="After Food" {{ $item['frequency'] == 'After Food' ? 'selected' : null }}>After Food</option>
                                                        <option value="Before Food" {{ $item['frequency'] == 'Before Food' ? 'selected' : null }}>Before  Food</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <a data-repeater-delete="" href="#" class="btn bg-danger-light trash"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr data-repeater-item>
                                                <td>
                                                    <input class="form-control" name="name" required type="text">
                                                </td>
                                                <td>
                                                    <input class="form-control" name="qty" required type="text">
                                                </td>
                                                <td>
                                                    <input class="form-control" name="day" required type="text">
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" name="time" value="Morning" type="checkbox">Morning
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" name="time" value="Afternoon" type="checkbox"> Afternoon
                                                        </label>
                                                    </div>
                                                    <br>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" name="time" value="Evening" type="checkbox"> Evening
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" name="time" value="Night" type="checkbox"> Night
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <select name="frequency" id="" class="form-control">
                                                        <option value="After Food">After Food</option>
                                                        <option value="Bfore Food">Bfore Food</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <a data-repeater-delete="" href="#" class="btn bg-danger-light trash"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                    <div class="add-more-item text-right mt-4">
                                        <a href="javascript:void(0);" data-repeater-create="" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Item</a>
                                    </div>
                            </div>
                        </div> 
                        <div class="card card-table border-0">
                            <div class="card-body repeater-custom-show-hide">
                                <h4>Test</h4>
                                <hr>
                                <div class="table-responsive ">
                                    <table class="table table-hover table-center">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 200px">Name</th>
                                                <th style="min-width: 100px">Note</th>
                                                <th style="min-width: 80px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="" data-repeater-list="tests">
                                            @if (isset($booking->tests) || $booking->tests != Null)
                                            @foreach ($booking->tests as $test)
                                            @if ($test['name'] != null)
                                            <tr data-repeater-item>
                                                <td>
                                                    <input class="form-control" name="name" type="text" value="{{ $test['name'] }}">
                                                </td>
                                                <td>
                                                    <input class="form-control" name="note" type="text" value="{{ $test['note'] }}">
                                                </td>
                                                <td>
                                                    <select name="collect" id="" class="form-control">
                                                        <option value="Diagnostic Centre" {{ $test['collect'] == 'Diagnostic Centre' ? 'selected' : null }}   >Diagnostic Centre</option>
                                                        <option value="Home" {{ $test['collect'] == 'Home' ? 'selected' : null }} >Home</option>
                                                    </select>
                                                </td>
                                                
                                                <td>
                                                    <a data-repeater-delete="" href="#" class="btn bg-danger-light trash"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @else
                                            <tr  data-repeater-item>
                                                <td>
                                                    <input class="form-control" name="name" type="text">
                                                </td>
                                                <td>
                                                    <input class="form-control" name="note" type="text">
                                                </td>
                                                <td>
                                                    <select name="collect" id="" class="form-control">
                                                        <option value="Diagnostic Centre">Diagnostic Centre</option>
                                                        <option value="Home">Home</option>
                                                    </select>
                                                </td>
                                                
                                                <td>
                                                    <a data-repeater-delete="" href="#" class="btn bg-danger-light trash"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                    <div class="add-more-item text-right mt-4">
                                        <a href="javascript:void(0);" data-repeater-create="" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Item</a>
                                    </div>
                            </div>
                        </div>
                        <!-- /Prescription Item -->
                        <!-- Signature -->
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <div class="signature-wrap">
                                    <div class="signature border-0">
                                        <img width='100' src="{{ asset('uploads') }}/{{ $booking->doctor->signechar }}" alt="">
                                    </div>
                                    <div class="sign-name">
                                        <p class="mb-0">( {{  $booking->doctor->name }} )</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Signature -->
                        <!-- Submit Section -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Save</button>
                                    {{-- <button type="reset" class="btn btn-secondary submit-btn">Clear</button> --}}
                                </div>
                            </div>
                        </div>
                        <!-- /Submit Section -->
                    </div>
                </div>
               </form>
            </div>
        </div>
    </div>
</div>      

@endsection
@push('js')
<script src="{{ asset('contents/backend') }}/assets/plugins/repeater/jquery.repeater.min.js"></script>
<script src="{{ asset('contents/backend') }}/assets/pages/jquery.form-repeater.js"></script>

@endpush