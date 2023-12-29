@extends('fontend.doctor.layouts.doctor')

@section('doctor')
<div class="col-md-7 col-lg-8 col-xl-9 basic-info">
<form action="{{ route('website.doctor.profile.update') }}" method="post" enctype='multipart/form-data'>
    @csrf
    
    <h4 class="sub-heading">Basic Information</h4>
    <div class="card">
        <div class="card-body">
            <div class="row form-row">
                <div class="col-lg-8 col-xl-6">
                    <div class="form-group">
                        <div class="change-avatar pro-setting">
                            <div class="profile-img">
                               @if ($doctor->image != null)
                               <img src="{{ $doctor->image() }}" alt="User Image">
                               @else
                               <img src="{{ asset('contents/fontend') }}/assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                               @endif
                            </div>
                            <div class="custom-file" id="customFile1">
                                <label class="custom-file-upload">
                                    <input type="file" name="image">
                                    <span class="change-user">
                                        <i class="feather-upload"></i> Profile Image
                                    </span>
                                </label>
                                <p class="mb-0">Recommended image size is 35px x 35px</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input name="email" type="email" class="form-control" readonly value="{{ $doctor->email }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input name="name" required type="text" class="form-control"  value="{{ $doctor->name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Sub Title <span class="text-danger">*</span></label>
                        <input name="sub_title" required type="text" class="form-control"  value="{{ $doctor->sub_title }}">
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input name="phone" required type="text" class="form-control"  value="{{ $doctor->phone }}">
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label>Specialist</label>
                        <select name="specialist" required class="form-select form-control">
                            <option value="">Select Option</option>
                            @foreach ($categorys as $category) 
                            <option value='{{ $category->name }}'  {{ $doctor->specialist == $category->name ? 'selected' : '' }}  >{{ $category->name }}</option> 
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Education</label>
                        <input name="education" required type="text" class="form-control"  value="{{ $doctor->education }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Experience</label>
                        <input name="experience" required type="text" class="form-control"  value="{{ $doctor->experience }}">
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label>Gender</label>
                        <select name='gender' required class="form-select form-control">
                            <option value="">Select Gender</option>
                            <option value='Male' {{ $doctor->gender == 'Male' ? 'selected' : '' }} >Male</option> 
                            <option value='Female' {{ $doctor->gender == 'Female' ? 'selected' : '' }}  >Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input name="dateOfBirth" required type="date" class="form-control"  value="{{ $doctor->dateOfBirth }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Price <span class="text-danger">*</span></label>
                        <input name="price" type="number" required class="form-control"  value="{{ $doctor->price }}" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="custom-file" id="customFile1">
                        <label class="custom-file-upload">
                            <input type="file" name="documents[]" {{ $doctor->documents == null ? 'required' : '' }} multiple>
                            <span class="change-user">
                                <i class="feather-upload"></i> Choose Your Documents file
                            </span>
                        </label>
                    </div>
                    <div>
                        @if ($doctor->documents != null)
                        @foreach ($doctor->documents as $document)
                        <a href="{{ asset("uploads/{$document}") }}" target="_blank"><img width='100' src="{{ asset("uploads/{$document}") }}" alt=""></a>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="custom-file" id="customFile1">
                        <label class="custom-file-upload">
                            <input type="file" name="signechar" {{ $doctor->signechar == null ? 'required' : '' }}>
                            <span class="change-user">
                                <i class="feather-upload"></i>Choose Your Signechar Image
                            </span>
                        </label>
                        <p class="mb-0">Recommended image size is 35px x 35px</p>
                    </div>
                    <div>
                        <a href="{{ asset("uploads/{$doctor->signechar}") }}" target="_blank"><img width='100' src="{{ asset("uploads/{$doctor->signechar}") }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h4 class="sub-heading">About Me</h4>
    <div class="card">
        <div class="card-body">
            <div class="form-group mb-0">
                <label>Biography</label>
                <textarea name='about_me' class="form-control" rows="5">{{ $doctor->about_me }}</textarea>
            </div>
        </div>
    </div>
    <div class="submit-section submit-btn-bottom">
        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
    </div>
</form>
</div>
@endsection
