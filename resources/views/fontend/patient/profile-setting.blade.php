@extends('fontend.patient.layouts.patient')
@section('patient')
<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('website.patient.profile.update') }}" method="post"  enctype='multipart/form-data'>
                @csrf
                <div class="row form-row">
                    <div class="col-12 col-lg-8 col-xl-6">
                        <div class="form-group">
                            <div class="change-avatar pro-setting">
                                <div class="profile-img">
                                   @if ($patient->image != null)
                                   <img src="{{ $patient->image() }}" alt="User Image">
                                   @else
                                   <img src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                                   @endif
                               </div>
                                <div class="custom-file" id="customFile1">
                                    <label class="custom-file-upload">
                                        <input name="image" type="file">
                                        <span class="change-user">
                                            <i class="feather-upload"></i> choose-file
                                        </span>
                                    </label>
                                    <p class="mb-0">Recommended image size is 35px x 35px</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" required value='{{ $patient->name }}' type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" required readonly="" value='{{ $patient->email }}' type="text" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Gender</label>
                        <select name='gender' required class="form-select form-control">
                            <option value="">Select Gender</option>
                            <option value='Male' {{ $patient->gender == 'Male' ? 'selected' : '' }} >Male</option> 
                            <option value='Female' {{ $patient->gender == 'Female' ? 'selected' : '' }}  >Female</option>
                        </select>
                    </div>
                </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <div class="cal-icon">
                                <input name="dateOfBirth" type="text" class="form-control datetimepicker" value="{{ $patient->dateOfBirth }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Blood Group</label>
                            <input name="blood_group" required type="text" class="form-control" value="{{ $patient->blood_group }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Mobile</label>
                            <input name="phone" required  value='{{ $patient->phone }}' type="text"  class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Address</label>
                            <input name="address" required value="{{ $patient->address }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
