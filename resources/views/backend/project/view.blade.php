@extends('layouts.backend') 

@section('pageTitle', 'Project Information') 

@section('content') 

@push('css-link')
<link href="{{ asset('contents/backend') }}/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endpush

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">                                        
                <ol class="c-progress-steps">
                    <li class="c-progress-steps__step  done"><span>New</span></li>
                    <li class="c-progress-steps__step  {{ $project->progress_at !=null ? ($project->status == $project::PROGRESS ? 'current' : 'done' ) : '' }}" title="{{  myDateTime($project->progress_at) }}"><span>Progress</span></li>
                    <li class="c-progress-steps__step  {{ $project->review_at !=null ? ($project->status == $project::REVIEW ? 'current' : 'done' ) : '' }}" title="{{  myDateTime($project->review_at) }}"><span>Review</span></li>
                    <li class="c-progress-steps__step  {{ $project->completed_at !=null ? ($project->status == $project::COMPLETE ? 'current' : 'done' ) : '' }}" title="{{  myDateTime($project->completed_at) }}"><span>Complete</span></li>
                    <li class="c-progress-steps__step  {{ $project->delivery_at !=null ? ($project->status == $project::DELIVERED ? 'current' : 'done' ) : '' }}" title="{{  myDateTime($project->delivery_at) }}"><span>Delivered</span></li>
                </ol>
            </div> <!--end card-body-->                                                                                                     
        </div><!--end card-->
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-body">                                        
                <ol class="c-progress-steps">
                    <li class="c-progress-steps__step  {{ $project->correction_at !=null ? ($project->status == $project::CORRECTION_UPGRADE ? 'current' : 'done' ) : '' }} " title="{{  myDateTime($project->correction_at) }}"><span>Correction</span></li>
                    <li class="c-progress-steps__step  {{ $project->upgrade_at !=null ? ($project->status == $project::CORRECTION_UPGRADE ? 'current' : 'done' ) : '' }}" title="{{  myDateTime($project->upgrade_at) }}"><span>Upgrade</span></li>
                </ol>
            </div> <!--end card-body-->                                                                                                     
        </div><!--end card-->
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-body">                                        
                <ol class="c-progress-steps">
                    <li class="c-progress-steps__step  {{ $project->cancel_at !=null ? ($project->status == $project::CANCEL ? 'current' : 'done' ) : '' }} " title="{{  myDateTime($project->cancel_at) }}"><span>Cancel</span></li>
                    <li class="c-progress-steps__step  {{ $project->return_at !=null ? ($project->status == $project::DELIVERED ? 'current' : 'done' ) : '' }}" title="{{  myDateTime($project->return_at) }}"><span>Return</span></li>
                </ol>
            </div> <!--end card-body-->                                                                                                     
        </div><!--end card-->
    </div>
</div>
<div class="row">
    
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="#" class='btn btn-primary waves-effect waves-light mr-1' data-toggle="modal" data-animation="bounce" data-target=".modal-get-payment"> <i class="fab fa-amazon-pay mr-2"></i>Get Payment</a> 
                <a href="#" class='btn btn-success waves-effect waves-light mr-1' data-toggle="modal" data-animation="bounce" data-target=".modal-project-upgrade"> <i class="fas fa-plus mr-2"></i>New / Upgrade / Correction</a> 
                <a href="#" class='btn btn-info waves-effect waves-light mr-1' data-toggle="modal" data-animation="bounce" data-target=".modal-project-return"> <i class="fas fa-plus mr-2"></i>Cancel / Return / Discount / Unsettled</a> 
                <a href="#"  class='btn btn-secondary waves-effect waves-light mr-1 order_status_change' data-status='{{ $project->status }}'  data-url="{{ route('backend.project.status_change',$project->id) }}" data-toggle="modal" data-animation="bounce" data-target=".modal-status-change"><i class="fas fa-sync-alt mr-2 font-16" title="Status"></i>Status</a>
                {{-- <a href="#" class='btn btn-secondary waves-effect waves-light mr-1' data-toggle="modal" data-animation="bounce" data-target=".modal-item-edit"> <i class="far fa-edit mr-2"></i>Item Edit</a>  --}}
            </div>
        </div>
        @include('backend.project.include.get_payment')
        @include('backend.project.include.project_upgrade')
        @include('backend.project.include.item_edit')
        @include('backend.project.include.payment_update')
        @include('backend.project.include.cancel_return')
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Project Information</h4>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <div class="">
                            <h6 class="mb-0"><b>Order No: {{ $project->sku }}</b></h6>
                            <h6><b>Order Date:</b> {{ myDateTime($project->created_at,true) }}</h6>
                            <h6><b>Delivery Date:</b> <span class="{{ !$project->is_urgent ? 'bg-danger text-white font-weight-bold' : '' }}">{{ myDateTime($project->delivery) }}</span></h6>
                            
                            <h6><b>Ref:</b>{{ $project->reference }}</h6>
                            <h6><b>University:</b>{{ $project->university->name  ?? 'Unknown'}}</h6>
                            <h6><b>Batch:</b>{{ $project->batch }}</h6>
                            {{-- <h6><b>Title: 1.5 v , 3.7, 12v Voltage Automatic Rechercheable Battery Charger </b></h6> --}}
                            
                        </div>
                    </div>
                    <div class="col-md-3">                                            
                        <div class="float-left">
                            <address class="font-13">
                                <strong class="font-14"><b>Billed To:</b></strong><br>
                                {{ $project->name }}<br>
                                {{ $project->phone }}<br>
                                {{ $project->email }}<br>
                                {{ $project->address }}<br>
                                {{-- <abbr title="Phone">P:</abbr> (123) 456-7890 --}}
                            </address>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="">
                            <strong class="font-14 mb-5"><b>Supervisor: {{ $project->supervisor }} ({{ $project->supervisor_phone }})</b></strong><br>
                            <strong class="font-14"><b>Members List:</b></strong>
                            <div class="row">
                                @foreach ($project->members as $key => $member)
                                <div class="col-md-6">
                                    <h6 class="mt-0 mb-1">{{ ++$key }}. <b>{{ $member->member_name }}</b><br>(ID:{{ $member->member_id }} / M:{{ $member->member_phone }})</h6>
                                </div>
                                @endforeach
                                
                               
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-3">
                        <div class="">
                            <address class="font-13">
                                <strong class="font-14">Shipped To:</strong><br>
                                Joe Smith<br>
                                795 Folsom Ave<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                        </div>
                    </div>     --}}                                       

                    {{-- <div class="col-md-3">
                        <div class="text-center bg-light p-3 mb-3">
                            <h5 class="bg-info mt-0 p-2 text-white d-sm-inline-block">Payment Methods</h5>
                            <h6 class="font-13">Paypal & Cards Payments :</h6>
                            <p class="mb-0 text-muted">CompanyA/c.paypal@gmai.com</p>
                            <p class="mb-0 text-muted">Visa, Master Card, Chaque</p>
                        </div>                                              
                    </div>  --}}                                           
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h6><b>Title: {{ $project->title }}</b></h6>
                        <p>Description: {{ $project->description }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive" {{-- style="background-image: url({{ asset('contents/backend') }}/assets/images/due.png); background-position: bottom;background-repeat:no-repeat;background-size: 208px;" --}}>
                            <table class="table table-bordered mb-0" >
                                <thead >
                                    <tr>
                                        <th>SL</th>
                                        <th>Item</th>
                                        <th>Description</th>                                                    
                                        <th>Unit</th>
                                        @if (auth()->user()->role_id <= 2)
                                        <th>Unit Cost</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($project->orderItems as $key => $item)
                                    <tr>
                                        <th>{{ ++$key }}</th>
                                        <td title="Create: {{ myDateTime($item->created_at) }}">{{ $item->item->name }} <br>
                                            @if ($item->upgrade_at)
                                            ( Upgrade: <span title="Upgrade Create Date">{{ myDateTime($item->upgrade_at) }}</span>  <span title="Upgrade Delivery Date">{{ $item->is_urgent ? "- ".myDateTime($item->is_urgent) : '' }}</span> )
                                            <br>
                                            @elseif ($item->correction_at)
                                             ( Correction: <span title="Correction Create Date">{{ myDateTime($item->correction_at) }}</span>  <span title="Correction Delivery Date">{{ $item->is_urgent ? "- ".myDateTime($item->is_urgent) : '' }}</span> )
                                            @elseif($item->is_urgent)
                                            ( Urgent: <span title="Urgent Delivery Date">{{ myDateTime($item->is_urgent) }}</span>)
                                            @endif
                                        </td>
                                        <td style="max-width: 400px;">{{ $item->description }}</td>
                                        <td>{{ $item->qty }}</td>
                                        @if (auth()->user()->role_id <= 2)
                                        <td>{{  tkFormat($item->price) }}</td>
                                        <td class="text-right">{{  tkFormat($item->total) }}</td>
                                        <td class="text-center">
                                            <a href="#" class='item-edit' data-toggle="modal" data-animation="bounce" data-target=".modal-item-edit" data-item="{{ $item }}" ><i class="far fa-edit text-info mr-1 mt-1 font-16" title="Edit"></i></a>
                                            @if (!$loop->first)
                                            <form action="{{ route('backend.project.orderItem_delete',$item->id) }}" method="post" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                            <button class=""><i class="far fa-trash-alt mr-1 text-danger font-16"  onclick="return confirm('Are you sure you want to Delete this Payment?');" title="Delete"></i></button>
                                            </form>
                                            @endif
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    
                                    @if (auth()->user()->role_id <= 2)
                                    
                                    <tr>                                                        
                                        <td colspan="4" class="border-0"style="border:none !important;padding:4px 12px;"></td>
                                        <td class="border-0 font-14"style="border:none !important;padding:4px 12px;" ><b>Sub Total</b></td>
                                        <td class="border-0 font-14 text-right"style="border:none !important;padding:4px 12px;"><b> {{ tkFormat($project->subTotal()) }} </b></td>
                                    </tr>
                                    @if ($project->additional_fees)
                                    <tr>                                                        
                                        <td colspan="4" class="border-0"style="border:none !important;padding:4px 12px;"></td>
                                        <td class="border-0 font-14"style="border:none !important;padding:4px 12px;"><b>Additional Fee</b></td>
                                        <td class="border-0 font-14 text-right"style="border:none !important;padding:4px 12px;"><b>+ {{ tkFormat($project->additional_fees) }}</b></td>
                                    </tr>
                                    @endif
                                    @if ($project->discount)
                                    <tr>                                                        
                                        <td colspan="4" class="border-0"style="border:none !important;padding:4px 12px;"></td>
                                        <td class="border-0 font-14"style="border:none !important;padding:4px 12px; "><b>Discount</b></td>
                                        <td class="border-0 font-14 text-right"style="border:none !important;padding:4px 12px;"><b>- {{ tkFormat($project->discount) }}</b></td>
                                    </tr>
                                    @endif
                                    <tr>                                                        
                                        <td colspan="4" class="border-0"style="border:none !important;padding:4px 12px;"></td>
                                        <td class="border-0 font-14"style="border:none !important; padding:4px 12px; border-top:1px solid !important"><b>Total</b></td>
                                        <td class="border-0 font-14 text-right"style="border:none !important;padding:4px 12px;  border-top:1px solid !important"><b> {{ tkFormat($project->total()) }}</b></td>
                                    </tr>
                                    @foreach ($project->orderPay as $pay)
                                    <tr class='hover-column-paymentInstallment'>                                                        
                                        <td colspan="4" class="border-0"style="border:none !important;padding:4px 12px;"></td>
                                        <td class="border-0 font-14 "style="border:none !important;padding:4px 12px;"><b>{{ $pay->type == App\Models\OrderPay::NEWORDER ? 'Advance' : 'Pay' }} ({{ myDateTime($pay->created_at) }})</b></td>
                                        <td class="border-0 font-14 text-right "style="border:none !important;padding:4px 12px;"><b>- {{ tkFormat($pay->amount) }}</b></td>
                                        <td class="border-0 font-14 text-left opacity_1"style="border:none !important; padding:4px 12px;">
                                            <a href="#" class='payment-update' data-toggle="modal" data-animation="bounce" data-target=".modal-payment-update" data-payment="{{ $pay }}" ><i class="far fa-edit text-info mr-1 font-16" title="Edit"></i></a>
                                            @if ($pay->type != App\Models\OrderPay::NEWORDER )
                                            <form action="{{ route('backend.project.payment_delete',$pay->id) }}" method="post" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                            <button class=""><i class="far fa-trash-alt mr-1 text-danger font-16"  onclick="return confirm('Are you sure you want to Delete this Payment?');" title="Delete"></i></button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                    <tr>                                                        
                                        <td colspan="4" class="border-0"style="border:none !important;padding:4px 12px;"></td>
                                        <td class="border-0 font-14"style="border:none !important;padding:4px 12px; border-top:1px solid !important"><b>Due</b></td>
                                        <td class="border-0 font-14 text-right"style="border:none !important;padding:4px 12px; border-top:1px solid !important"><b>{{ tkFormat($project->due()) }}</b></td>
                                    </tr>
                                    @if ($project->return_amount !=0)
                                        <tr>
                                            <td colspan="4" class="border-0"style="border:none !important;padding:4px 12px;"></td>
                                            <td class="border-0 font-14"style=" !important;padding:4px 12px;"><b>Return Amount ({{ myDateTime($project->return_at) }})</b></td>
                                            <td class="border-0 font-14 text-right"style=" !important;padding:4px 12px;"><b>{{ tkFormat($project->return_amount) }}</b></td>
                                        </tr>
                                    @endif
                                    @if ($project->loss !=0)
                                        <tr>
                                            <td colspan="4" class="border-0"style="border:none !important;padding:4px 12px;"></td>
                                            <td class="border-0 font-14"style=" !important;padding:4px 12px;"><b>Unsettled Amount</b></td>
                                            <td class="border-0 font-14 text-right"style=" !important;padding:4px 12px;"><b>{{ tkFormat($project->loss) }}</b></td>
                                        </tr>
                                    @endif
                                    @endif
                                    {{-- <tr class="bg-dark text-white">
                                        <th colspan="3" class="border-0" style="border:none !important;"></th>                                                        
                                        <td class="border-0 font-14" style="border:none !important;"><b>Total</b></td>
                                        <td class="border-0 font-14" style="border:none !important;"><b>$2359.00</b></td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>                                            
                    </div>                                        
                </div>
            </div>
            <!--end card-body-->
          {{--   <div class="card-body">
                <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="general_detail_tab" data-toggle="pill" href="#general_detail">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="education_detail_tab" data-toggle="pill" href="#education_detail">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="portfolio_detail_tab" data-toggle="pill" href="#portfolio_detail">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="settings_detail_tab" data-toggle="pill" href="#settings_detail">Settings</a>
                    </li>
                </ul>
            </div> --}}
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row-->
{{-- <div class="row">
    <div class="col-12">
        <div class="tab-content detail-list" id="pills-tabContent">
            <div class="tab-pane fade show active" id="general_detail">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="{{ asset('contents/backend') }}/assets/images/small/user-pro.jpg" alt="" class="img-fluid" />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="met-basic-detail">
                                            <h3>Harry McCall</h3>
                                            <p class="text-uppercase font-14">Graphic & Web Designer</p>
                                            <p class="text-muted font-14">
                                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly
                                                believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet
                                                tend to repeat predefined chunks as necessary.
                                            </p>

                                            <div class="my-3">
                                                <button class="btn btn-primary px-3">Hire Me</button>
                                                <button class="btn btn-outline-primary px-3">My Portfolio</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6 mx-auto">
                                                <div class="own-detail bg-blue">
                                                    <h1>8+</h1>
                                                    <h5>Year Experience</h5>
                                                </div>
                                                <div class="own-detail own-detail-project bg-secondary">
                                                    <h1>50</h1>
                                                    <h5>Copmlete Projects</h5>
                                                </div>
                                                <div class="own-detail own-detail-happy bg-success">
                                                    <h1>37</h1>
                                                    <h5>Happy Clients</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end general detail-->

            <div class="tab-pane fade" id="education_detail">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">Education</h4>
                                <div class="slimscroll education-activity">
                                    <div class="activity">
                                        <i class="mdi mdi-school icon-success"></i>
                                        <div class="time-item">
                                            <div class="item-info">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="m-0">University</h6>
                                                    <span class="text-muted">Oct-2009 to Oct-2011</span>
                                                </div>
                                                <p class="text-muted mt-3">
                                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.
                                                    <a href="#" class="text-info">[more info]</a>
                                                </p>
                                                <div>
                                                    <span class="badge badge-soft-secondary">Design</span>
                                                    <span class="badge badge-soft-secondary">HTML</span>
                                                    <span class="badge badge-soft-secondary">Css</span>
                                                </div>
                                            </div>
                                        </div>
                                        <i class="mdi mdi-medal icon-pink"></i>
                                        <div class="time-item">
                                            <div class="item-info">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="m-0">Bachelor of Arts</h6>
                                                    <span class="text-muted">Oct-2006 to Oct-209</span>
                                                </div>
                                                <p class="text-muted mt-3">
                                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.
                                                    <a href="#" class="text-info">[more info]</a>
                                                </p>
                                                <div>
                                                    <span class="badge badge-soft-secondary">Python</span>
                                                    <span class="badge badge-soft-secondary">Django</span>
                                                </div>
                                            </div>
                                        </div>
                                        <i class="mdi mdi-book-open-page-variant icon-purple"></i>
                                        <div class="time-item">
                                            <div class="item-info">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="m-0">Secondary</h6>
                                                    <span class="text-muted">Oct-2003 to Oct-2006</span>
                                                </div>
                                                <p class="text-muted mt-3">
                                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.
                                                    <a href="#" class="text-info">[more info]</a>
                                                </p>
                                            </div>
                                        </div>
                                        <i class="mdi mdi-lead-pencil icon-warning"></i>
                                        <div class="time-item">
                                            <div class="item-info">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="m-0">Primary</h6>
                                                    <span class="text-muted">Oct-1996 to Oct-2003</span>
                                                </div>
                                                <p class="text-muted mt-3">
                                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.
                                                    <a href="#" class="text-info">[more info]</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end activity-->
                                </div>
                                <!--end education-activity-->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3">My Skills</h4>
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{ asset('contents/backend') }}/assets/images/widgets/education.svg" alt="" class="img-fluid" />
                                    </div>
                                    <div class="col-8 align-self-center">
                                        <p class="skill-detail">
                                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin
                                            professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words.
                                        </p>
                                    </div>
                                </div>
                                <div class="skills mt-4">
                                    <div class="skill-box">
                                        <h4 class="skill-title">HTML5 &amp; CSS3</h4>
                                        <div class="progress-line">
                                            <span data-percent="78" style="width: 78%;">
                                                <span class="percent-tooltip">78%</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="skill-box">
                                        <h4 class="skill-title">Web Design</h4>
                                        <div class="progress-line">
                                            <span data-percent="90" style="width: 90%;">
                                                <span class="percent-tooltip">90%</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="skill-box">
                                        <h4 class="skill-title">UI/UX Design</h4>
                                        <div class="progress-line">
                                            <span data-percent="80" style="width: 80%;">
                                                <span class="percent-tooltip">80%</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="skill-box">
                                        <h4 class="skill-title">Photoshop &amp; Ilistletor</h4>
                                        <div class="progress-line">
                                            <span data-percent="95" style="width: 95%;">
                                                <span class="percent-tooltip">95%</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end education detail-->

            <div class="tab-pane fade" id="portfolio_detail">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <ul class="col container-filter categories-filter mb-0" id="filter">
                                        <li><a class="categories active" data-filter="*">All</a></li>
                                        <li><a class="categories" data-filter=".branding">Branding</a></li>
                                        <li><a class="categories" data-filter=".design">Design</a></li>
                                        <li><a class="categories" data-filter=".photo">Photo</a></li>
                                        <li><a class="categories" data-filter=".coffee">coffee</a></li>
                                    </ul>
                                </div>
                                <!-- End portfolio  -->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->

                        <div class="card">
                            <div class="card-body">
                                <div class="row container-grid nf-col-3 projects-wrapper">
                                    <div class="col-lg-4 col-md-6 p-0 nf-item branding design coffee spacing">
                                        <div class="item-box">
                                            <a class="cbox-gallary1 mfp-image" href="{{ asset('contents/backend') }}/assets/images/small/img-1.jpg" title="Consequat massa quis">
                                                <img class="item-container" src="{{ asset('contents/backend') }}/assets/images/small/img-1.jpg" alt="7" />
                                                <div class="item-mask">
                                                    <div class="item-caption">
                                                        <h5 class="text-white">Consequat massa quis</h5>
                                                        <p class="text-white">Branding, Design, Coffee</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!--end item-box-->
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-4 col-md-6 p-0 nf-item photo spacing">
                                        <div class="item-box">
                                            <a class="cbox-gallary1 mfp-image" href="{{ asset('contents/backend') }}/assets/images/small/img-2.jpg" title="Vivamus elementum semper">
                                                <img class="item-container mfp-fade" src="{{ asset('contents/backend') }}/assets/images/small/img-2.jpg" alt="2" />
                                                <div class="item-mask">
                                                    <div class="item-caption">
                                                        <h5 class="text-light">Vivamus elementum semper</h5>
                                                        <p class="text-light">Photo</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!--end item-box-->
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-4 col-md-6 p-0 nf-item branding coffee spacing">
                                        <div class="item-box">
                                            <a class="cbox-gallary1 mfp-image" href="{{ asset('contents/backend') }}/assets/images/small/img-3.jpg" title="Quisque rutrum">
                                                <img class="item-container" src="{{ asset('contents/backend') }}/assets/images/small/img-3.jpg" alt="4" />
                                                <div class="item-mask">
                                                    <div class="item-caption">
                                                        <h5 class="text-light">Quisque rutrum</h5>
                                                        <p class="text-light">Branding, Design, Coffee</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!--end item-box-->
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-4 col-md-6 p-0 nf-item branding design spacing">
                                        <div class="item-box">
                                            <a class="cbox-gallary1 mfp-image" href="{{ asset('contents/backend') }}/assets/images/small/img-4.jpg" title="Tellus eget condimentum">
                                                <img class="item-container" src="{{ asset('contents/backend') }}/assets/images/small/img-4.jpg" alt="5" />
                                                <div class="item-mask">
                                                    <div class="item-caption">
                                                        <h5 class="text-light">Tellus eget condimentum</h5>
                                                        <p class="text-light">Design</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!--end item-box-->
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-4 col-md-6 p-0 nf-item branding design spacing">
                                        <div class="item-box">
                                            <a class="cbox-gallary1 mfp-image" href="{{ asset('contents/backend') }}/assets/images/small/img-5.jpg" title="Nullam quis ant">
                                                <img class="item-container" src="{{ asset('contents/backend') }}/assets/images/small/img-5.jpg" alt="6" />
                                                <div class="item-mask">
                                                    <div class="item-caption">
                                                        <h5 class="text-light">Nullam quis ant</h5>
                                                        <p class="text-light">Branding, Design</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!--end item-box-->
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-4 col-md-6 p-0 nf-item photo spacing">
                                        <div class="item-box">
                                            <a class="cbox-gallary1 mfp-image" href="{{ asset('contents/backend') }}/assets/images/small/img-6.jpg" title="Sed fringilla mauris">
                                                <img class="item-container" src="{{ asset('contents/backend') }}/assets/images/small/img-6.jpg" alt="1" />
                                                <div class="item-mask">
                                                    <div class="item-caption">
                                                        <h5 class="text-light">Sed fringilla mauris</h5>
                                                        <p class="text-light">Photo</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!--end item-box-->
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <h4><i class="fas fa-quote-left text-primary"></i></h4>
                                </div>
                                <div id="carouselExampleFade2" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item">
                                            <div class="text-center">
                                                <p class="text-muted px-4">
                                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                                                    normal distribution of letters, as opposed to using.
                                                </p>
                                                <div class="">
                                                    <img src="{{ asset('contents/backend') }}/assets/images/users/user-10.jpg" alt="" class="rounded-circle thumb-lg mb-2" />
                                                    <p class="mb-0 text-primary"><b>- Mary K. Myers</b></p>
                                                    <small class="text-muted">CEO Facebook</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item active">
                                            <div class="text-center">
                                                <p class="text-muted px-4">
                                                    Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years
                                                    popular belief,old.
                                                </p>
                                                <div class="">
                                                    <img src="{{ asset('contents/backend') }}/assets/images/users/user-4.jpg" alt="" class="rounded-circle thumb-lg mb-2" />
                                                    <p class="mb-0 text-primary"><b>- Michael C. Rios</b></p>
                                                    <small class="text-muted">CEO Facebook</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="text-center">
                                                <p class="text-muted px-4">
                                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even
                                                    slightly believable. If you are going to use a passage of Lorem Ipsum.
                                                </p>
                                                <div class="">
                                                    <img src="{{ asset('contents/backend') }}/assets/images/users/user-5.jpg" alt="" class="rounded-circle thumb-lg mb-2" />
                                                    <p class="mb-0 text-primary"><b>- Lisa D. Pullen</b></p>
                                                    <small class="text-muted">CEO Facebook</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
            <!--end portfolio detail-->

            <div class="tab-pane fade" id="settings_detail">
                <div class="row">
                    <div class="col-lg-12 col-xl-9 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" class="card-box">
                                    <input type="file" id="input-file-now-custom-1" class="dropify" data-default-file="{{ asset('contents/backend') }}/assets/images/users/user-4.jpg" />
                                    <span class="input-icon icon-right">
                                        <textarea rows="4" class="form-control" placeholder="Post a new message"></textarea>
                                    </span>
                                    <div class="float-right my-3">
                                        <a class="btn btn-sm btn-primary text-light px-4 mb-0">Send</a>
                                    </div>
                                    <ul class="nav nav-pills profile-pills mt-1">
                                        <li>
                                            <a href="#"><i class="fas fa-video font-18 mr-2 mt-2 text-primary"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-camera font-18 mx-2 mt-2 text-primary"></i></a>
                                        </li>
                                    </ul>
                                </form>

                                <div class="">
                                    <form class="form-horizontal form-material mb-0">
                                        <div class="form-group">
                                            <input type="text" placeholder="Full Name" class="form-control" />
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <input type="email" placeholder="Email" class="form-control" name="example-email" id="example-email" />
                                            </div>
                                            <div class="col-md-4">
                                                <input type="password" placeholder="password" class="form-control" />
                                            </div>
                                            <div class="col-md-4">
                                                <input type="password" placeholder="Re-password" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <input type="text" placeholder="Phone No" class="form-control" />
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control">
                                                    <option>London</option>
                                                    <option>India</option>
                                                    <option>Usa</option>
                                                    <option>Canada</option>
                                                    <option>Thailand</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="5" placeholder="Message" class="form-control"></textarea>
                                            <button class="btn btn-primary btn-sm text-light px-4 mt-3 float-right mb-0">Update Profile</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end settings detail-->
        </div>
        <!--end tab-content-->
    </div>
    <!--end col-->
</div> --}}
<!--end row-->

@endsection
@push('js-link')
{{-- jquery date format libary  --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script> --}}
{{-- end --}}
<script src="{{ asset('contents/backend') }}/assets/plugins/select2/select2.min.js"></script>
<script src="{{ asset('contents/backend') }}/assets/plugins/repeater/jquery.repeater.min.js"></script>
<script src="{{ asset('contents/backend') }}/assets/pages/jquery.form-repeater.js"></script>
@endpush
@push('js') 
<script>
    $(".select").select2({
        // placeholder: "Select a state",
        width: "100%",
        // allowClear: true,
    });
</script>
{{-- order item edit script --}}
<script>
    $(document).ready(function(){
         
        $('.item-edit').on('click',function(){
            var value = $(this).data('item');

            $('#item_edit').find('input[name="id"]').val(value.id);
            $('#item_edit').find('input[name="description"]').val(value.description);
            $('#item_edit').find('input[name="is_urgent"]').val(moment(value.is_urgent).format('YYYY-MM-DD'));
            $('#item_edit').find('input[name="qty"]').val(value.qty);
            $('#item_edit').find('input[name="price"]').val(value.price);
            $('#item_edit').find('input[name="total"]').val(value.total);

            $('#item_edit').find('select[name="item"] option').each(function(){

                var selectValue = $(this).val();
                $(this).removeAttr("selected");
                if (selectValue == value.item_id) {
                    $('#item_edit').find('select [value="' + value.item_id + '"]').attr("selected", "selected");
                }

            })
        });
    });
</script>
@endpush 
