@extends('fontend.doctor.layouts.doctor')
@section('doctor')
<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="row">
        <div class="col-md-12">
            <div class="dash-card">
                <div class="">
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                            <div class="dash-widget">
                                <div class="dash-widget-info">
                                    <h6 class="text-danger">Total Patient</h6>
                                    <div class="dash-widget-count">
                                        <h3>1500</h3>
                                        <p>Till Today</p>
                                    </div>
                                </div>
                                <div class="graph">
                                    <img src="{{ asset('contents/fontend') }}/assets/img/icons/icon-01.png" class="img-fluid" alt="patient">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="dash-widget dct-border-rht">
                                <div class="dash-widget-info">
                                    <h6 class="text-success">Total Patient</h6>
                                    <div class="dash-widget-count">
                                        <h3>180</h3>
                                        <p>26, Aug 2021</p>
                                    </div>
                                </div>
                                <div class="graph">
                                    <img src="{{ asset('contents/fontend') }}/assets/img/icons/icon-02.png" class="img-fluid" alt="patient">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="dash-widget">
                                <div class="dash-widget-info">
                                    <h6 class="text-info">Appoinments</h6>
                                    <div class="dash-widget-count">
                                        <h3>95</h3>
                                        <p>26, Aug 2021</p>
                                    </div>
                                </div>
                                <div class="graph">
                                    <img src="{{ asset('contents/fontend') }}/assets/img/icons/icon-03.png" class="img-fluid" alt="patient">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4 class="sub-heading">Patient Appoinment</h4>
            <div class="appointment-tab">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" href="#upcoming-appointments" data-bs-toggle="tab">Upcoming</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#today-appointments" data-bs-toggle="tab">Today</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="upcoming-appointments">
                        <div class="card card-table mb-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>Appt Date</th>
                                                <th>Purpose</th>
                                                <th>Type</th>
                                                <th>Paid Amount</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/patients/patient.jpg" alt="User Image"></a>
                                                        <a href="patient-profile.html">Richard Wilson <span>#PT0016</span></a>
                                                    </h2>
                                                </td>
                                                <td>11 Nov 2021 <span class="d-block text-info apt-time">10.00 AM</span></td>
                                                <td>General</td>
                                                <td>New Patient</td>
                                                <td>$150</td>
                                                <td class="text-start">
                                                    <div class="table-action">
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                            <i class="feather-check-circle"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-x-circle"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/patients/patient1.jpg" alt="User Image"></a>
                                                        <a href="patient-profile.html">Charlene Reed <span>#PT0001</span></a>
                                                    </h2>
                                                </td>
                                                <td>3 Nov 2021 <span class="d-block text-info apt-time">11.00 AM</span></td>
                                                <td>General</td>
                                                <td>Old Patient</td>
                                                <td>$200</td>
                                                <td class="text-start">
                                                    <div class="table-action">
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                            <i class="feather-check-circle"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-x-circle"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/patients/patient2.jpg" alt="User Image"></a>
                                                        <a href="patient-profile.html">Travis Trimble <span>#PT0002</span></a>
                                                    </h2>
                                                </td>
                                                <td>1 Nov 2021 <span class="d-block text-info apt-time">1.00 PM</span></td>
                                                <td>General</td>
                                                <td>New Patient</td>
                                                <td>$75</td>
                                                <td class="text-start">
                                                    <div class="table-action">
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                            <i class="feather-check-circle"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-x-circle"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/patients/patient3.jpg" alt="User Image"></a>
                                                        <a href="patient-profile.html">Carl Kelly <span>#PT0003</span></a>
                                                    </h2>
                                                </td>
                                                <td>30 Oct 2021 <span class="d-block text-info apt-time">9.00 AM</span></td>
                                                <td>General</td>
                                                <td>Old Patient</td>
                                                <td>$100</td>
                                                <td class="text-start">
                                                    <div class="table-action">
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                            <i class="feather-check-circle"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-x-circle"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/patients/patient4.jpg" alt="User Image"></a>
                                                        <a href="patient-profile.html">Michelle Fairfax <span>#PT0004</span></a>
                                                    </h2>
                                                </td>
                                                <td>28 Oct 2021 <span class="d-block text-info apt-time">6.00 PM</span></td>
                                                <td>General</td>
                                                <td>New Patient</td>
                                                <td>$350</td>
                                                <td class="text-start">
                                                    <div class="table-action">
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                            <i class="feather-check-circle"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-x-circle"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/patients/patient5.jpg" alt="User Image"></a>
                                                        <a href="patient-profile.html">Gina Moore <span>#PT0005</span></a>
                                                    </h2>
                                                </td>
                                                <td>27 Oct 2021 <span class="d-block text-info apt-time">8.00 AM</span></td>
                                                <td>General</td>
                                                <td>Old Patient</td>
                                                <td>$250</td>
                                                <td class="text-start">
                                                    <div class="table-action">
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                            <i class="feather-check-circle"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-x-circle"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/patients/patient.jpg" alt="User Image"></a>
                                                        <a href="patient-profile.html">Richard Wilson <span>#PT0016</span></a>
                                                    </h2>
                                                </td>
                                                <td>11 Nov 2021 <span class="d-block text-info apt-time">10.00 AM</span></td>
                                                <td>General</td>
                                                <td>New Patient</td>
                                                <td>$150</td>
                                                <td class="text-start">
                                                    <div class="table-action">
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                            <i class="feather-check-circle"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-x-circle"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/patients/patient1.jpg" alt="User Image"></a>
                                                        <a href="patient-profile.html">Charlene Reed <span>#PT0001</span></a>
                                                    </h2>
                                                </td>
                                                <td>3 Nov 2021 <span class="d-block text-info apt-time">11.00 AM</span></td>
                                                <td>General</td>
                                                <td>Old Patient</td>
                                                <td>$200</td>
                                                <td class="text-start">
                                                    <div class="table-action">
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                            <i class="feather-check-circle"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-x-circle"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/patients/patient2.jpg" alt="User Image"></a>
                                                        <a href="patient-profile.html">Travis Trimble <span>#PT0002</span></a>
                                                    </h2>
                                                </td>
                                                <td>1 Nov 2021 <span class="d-block text-info apt-time">1.00 PM</span></td>
                                                <td>General</td>
                                                <td>New Patient</td>
                                                <td>$75</td>
                                                <td class="text-start">
                                                    <div class="table-action">
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                            <i class="feather-check-circle"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-x-circle"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="today-appointments">
                        <div class="card card-table mb-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>Appt Date</th>
                                                <th>Purpose</th>
                                                <th>Type</th>
                                                <th>Paid Amount</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/patients/patient6.jpg" alt="User Image"></a>
                                                        <a href="patient-profile.html">Elsie Gilley <span>#PT0006</span></a>
                                                    </h2>
                                                </td>
                                                <td>14 Nov 2021 <span class="d-block text-info apt-time">6.00 PM</span></td>
                                                <td>Fever</td>
                                                <td>Old Patient</td>
                                                <td>$300</td>
                                                <td class="text-start">
                                                    <div class="table-action">
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                            <i class="feather-check-circle"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-x-circle"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/patients/patient7.jpg" alt="User Image"></a>
                                                        <a href="patient-profile.html">Joan Gardner <span>#PT0006</span></a>
                                                    </h2>
                                                </td>
                                                <td>14 Nov 2021 <span class="d-block text-info apt-time">5.00 PM</span></td>
                                                <td>General</td>
                                                <td>Old Patient</td>
                                                <td>$100</td>
                                                <td class="text-start">
                                                    <div class="table-action">
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                            <i class="feather-check-circle"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-x-circle"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/patients/patient8.jpg" alt="User Image"></a>
                                                        <a href="patient-profile.html">Daniel Griffing <span>#PT0007</span></a>
                                                    </h2>
                                                </td>
                                                <td>14 Nov 2021 <span class="d-block text-info apt-time">3.00 PM</span></td>
                                                <td>General</td>
                                                <td>New Patient</td>
                                                <td>$75</td>
                                                <td class="text-start">
                                                    <div class="table-action">
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                            <i class="feather-check-circle"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-x-circle"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/patients/patient9.jpg" alt="User Image"></a>
                                                        <a href="patient-profile.html">Walter Roberson <span>#PT0008</span></a>
                                                    </h2>
                                                </td>
                                                <td>14 Nov 2021 <span class="d-block text-info apt-time">1.00 PM</span></td>
                                                <td>General</td>
                                                <td>Old Patient</td>
                                                <td>$350</td>
                                                <td class="text-start">
                                                    <div class="table-action">
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                            <i class="feather-check-circle"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-x-circle"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/patients/patient10.jpg" alt="User Image"></a>
                                                        <a href="patient-profile.html">Robert Rhodes <span>#PT0010</span></a>
                                                    </h2>
                                                </td>
                                                <td>14 Nov 2021 <span class="d-block text-info apt-time">10.00 AM</span></td>
                                                <td>General</td>
                                                <td>New Patient</td>
                                                <td>$175</td>
                                                <td class="text-start">
                                                    <div class="table-action">
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                            <i class="feather-check-circle"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-x-circle"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{ asset('contents/fontend') }}/assets/img/patients/patient11.jpg" alt="User Image"></a>
                                                        <a href="patient-profile.html">Harry Williams <span>#PT0011</span></a>
                                                    </h2>
                                                </td>
                                                <td>14 Nov 2021 <span class="d-block text-info apt-time">11.00 AM</span></td>
                                                <td>General</td>
                                                <td>New Patient</td>
                                                <td>$450</td>
                                                <td class="text-start">
                                                    <div class="table-action">
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                            <i class="feather-eye"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                            <i class="feather-check-circle"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-x-circle"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
