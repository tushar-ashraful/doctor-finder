@extends('layouts.backend') 
@section('pageTitle', 'Project Information') 
@section('content') 
@push('css-link')
<link href="{{ asset('contents/backend') }}/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endpush
<!-- end page title end breadcrumb -->
{{-- 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Tasks Reports</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center">
                            <h3>1200 <i class="fas fa-tasks text-secondary ml-1"></i></h3>
                            <p class="text-muted">Total Tasks</p>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-4">
                        <div class="text-center">
                            <h3>108 <i class="fas fa-spinner text-success ml-1"></i></h3>
                            <p class="text-muted">Tasks Active</p>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-4">
                        <div class="text-center">
                            <h3>855 <i class="fas fa-check-double text-danger ml-1"></i></h3>
                            <p class="text-muted">Tasks Complete</p>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
                <div class="apexchart-wrapper chart-demo m-0">
                    <div id="task_report" class="chart-gutters"></div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row--> --}}
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
    <div class="col-lg-6">
        <ul class="list-inline">
            <li class="list-inline-item">
                <h4>Project Title: <span class="font-weight-bold"> {{ $project->title }} ( {{ $project->sku }})</span> </h4>
            </li>
            {{--  
            <li class="list-inline-item">
                <img src="{{ asset('contents/backend') }}/assets/images/users/user-10.jpg" alt="user" class="rounded-circle thumb-xs">
            </li>
            <li class="list-inline-item">
                <img src="{{ asset('contents/backend') }}/assets/images/users/user-9.jpg" alt="user" class="rounded-circle thumb-xs">
            </li>
            <li class="list-inline-item">
                <img src="{{ asset('contents/backend') }}/assets/images/users/user-8.jpg" alt="user" class="rounded-circle thumb-xs">
            </li>
            <li class="list-inline-item">
                <img src="{{ asset('contents/backend') }}/assets/images/users/user-5.jpg" alt="user" class="rounded-circle thumb-xs">
            </li>
            <li class="list-inline-item">
                <img src="{{ asset('contents/backend') }}/assets/images/users/user-4.jpg" alt="user" class="rounded-circle thumb-xs">
            </li>
            <li class="list-inline-item">
                <a href="" class="avatar-box thumb-xs align-self-center">
                <span class="avatar-title bg-soft-secondary rounded-circle font-13">+4</span>
                </a>
            </li>
            --}}
        </ul>
    </div>
    <!--end col-->
    <div class="col-lg-6 text-right">
        <div class="text-right">
            <ul class="list-inline">
                {{-- <li class="list-inline-item">
                    <button type="button" class="btn btn-primary"><i class="dripicons-gear"></i></button>
                </li> --}}
                <li class="list-inline-item">
                    <a href='' class="btn btn-primary" data-toggle="modal" data-animation="bounce" data-target=".modal-work-create">Add New Task</a>
                </li>
            </ul>
        </div>
    </div>
    <!--end col-->
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Total Items</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="font-weight-bold">{{ $project->orderItems()->count() }}</h3>
                    <i class="dripicons-user-group card-eco-icon text-pink align-self-center"></i>
                </div>                                     
                {{-- <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>8.5%</span>Up From Yesterday</p> --}}
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
    <div class="col-lg-3">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Total item assign in worker</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="font-weight-bold">{{ $project->orderItems()->whereNotNull('assign_at')->count() }}</h3>
                    <i class="dripicons-cart card-eco-icon text-secondary  align-self-center"></i>
                </div>                                     
                {{-- <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>1.5%</span> Up From Last Week</p> --}}
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
    <div class="col-lg-3">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Total Work Complete</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="font-weight-bold">{{ $project->works()->whereNotNull('completed_at')->count() }}</h3>
                    <i class="dripicons-jewel card-eco-icon text-warning  align-self-center"></i>
                </div>                                   
                {{-- <p class="mb-0 text-muted text-truncate"><span class="text-danger"><i class="mdi mdi-trending-down"></i>3%</span> Down From Last Month</p> --}}
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
    <div class="col-lg-3">
        <div class="card card-eco">
            <div class="card-body">
                <h4 class="title-text mt-0">Work Not Assign in worker</h4>
                <div class="d-flex justify-content-between">
                    <h3 class="font-weight-bold">{{ $project->orderItems()->whereNull('assign_at')->count() }}</h3>
                    <i class="dripicons-wallet card-eco-icon text-success  align-self-center"></i>
                </div>                                    
                {{-- <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>10.5%</span> Up From Yesterday</p> --}}
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->

</div><!--end row-->
 @include('backend.work.include.work_create')
 @include('backend.work.include.work_edit')
<!--end row-->
<div class="row">

    @foreach ($project->works as $work)
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="task-box">
                    <div class="task-priority-icon"><i class="fas  {{ $work->completed_at ? 'fa-check text-success' : ( timeIsOver($work->dateline_to) ? 'fa-circle text-danger' : 'fa-circle text-success' ) }}"></i></div>
                    <p class="text-muted float-right" style="cursor: pointer;">
                        <span class="text-dark" title='Dateline on'>{{ myDateTime($work->dateline_on) }}</span> / 
                        <span class="{{-- text-dark  --}}{{ $work->completed_at ? 'text-success' : ( timeIsOver($work->dateline_to) ? 'text-danger' : 'text-dark' ) }}" title='Dateline to'>{{ myDateTime($work->dateline_to) }}</span> 
                        <span class="mx-1">·</span> 
                        <span class="text-dark" title="Work Create Date"><i class="far fa-fw fa-clock"></i> {{ myDateTime($work->created_at) }}</span>
                        @if ($work->completed_at)
                       / <span class="text-dark" title="Work Complete Date"><i class="far fa-fw fa-clock"></i> {{ myDateTime($work->completed_at) }}</span>
                        @endif
                    </p>
                    <h5 class="mt-0">{{ $work->orderItem->item->name }}
                        @if ($work->orderItem->upgrade_at)
                        ( Upgrade: <span title="Upgrade Create Date">{{ myDateTime($work->orderItem->upgrade_at) }}</span>  <span title="Upgrade Delivery Date">{{ $work->orderItem->is_urgent ? "- ".myDateTime($work->orderItem->is_urgent) : '' }}</span> )
                        <br>
                        @elseif ($work->orderItem->correction_at)
                        ( Correction: <span title="Correction Create Date">{{ myDateTime($work->orderItem->correction_at) }}</span>  <span title="Correction Delivery Date">{{ $work->orderItem->is_urgent ? "- ".myDateTime($work->orderItem->is_urgent) : '' }}</span> )
                        @elseif($work->orderItem->is_urgent)
                        ( Urgent: <span title="Urgent Delivery Date">{{ myDateTime($work->orderItem->is_urgent) }}</span>)
                        @endif
                    </h5>
                    <p class="text-muted mb-1">
                        <details>
                            <summary>Details</summary>
                            {{ $work->orderItem->description  }}
                        </details>
                    </p>
                    {{-- 
                    <p class="text-muted text-right mb-1">15% Complete</p>
                    <div class="progress mb-4" style="height: 2px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    --}}
                    <div class="d-flex justify-content-between">
                        <a href="" data-toggle="tooltip"  data-placement="left" data-html="true" title='Assing Date: {{ myDateTime($work->orderItem->assign_at) }} ' >
                        <h5>{{ $work->user->name }}</h5>
                        </a>
                        {{--  
                        <div class="img-group">
                            <a class="user-avatar user-avatar-group" href="#">
                            <img src="{{ asset('contents/backend') }}/assets/images/users/user-3.jpg" alt="user" class="rounded-circle thumb-xs">
                            </a>
                            <a class="user-avatar user-avatar-group" href="#">
                            <img src="{{ asset('contents/backend') }}/assets/images/users/user-5.jpg" alt="user" class="rounded-circle thumb-xs">
                            </a>
                            <a class="user-avatar user-avatar-group" href="#">
                            <img src="{{ asset('contents/backend') }}/assets/images/users/user-7.jpg" alt="user" class="rounded-circle thumb-xs">
                            </a>    
                        </div>
                        --}}<!--end img-group--> 
                        <ul class="list-inline mb-0 align-self-center">
                            {{-- <li class="list-item d-inline-block mr-2">
                                <a class="" href="#">
                                <i class="mdi mdi-format-list-bulleted text-success font-15"></i>
                                <span class="text-muted font-weight-bold">15/100</span>
                                </a>
                            </li> --}}
                            @if ($work->note)
                            <li class="list-item d-inline-block">
                                <a href="#" class="" data-toggle="tooltip"  data-placement="left" title='Admin Note: {{ $work->note }}' >
                                    <i class="mdi mdi-comment-outline text-primary font-18"></i>
                                    {{-- <span class="text-muted font-weight-bold">3</span> --}}
                                </a>                                                                               
                            </li>
                            @endif
                            <li class="list-item d-inline-block">
                                @if ($work->completed_at)
                                <a href='{{ route('backend.work.uncomplete',$work->id) }}' class="ml-2" title='Work UnComplete' onclick="return confirm('Are you sure you want to UnComplete this Work?');" >
                                    <i class="mdi mdi-close text-danger font-18 font-weight-bold"></i>
                                    {{-- <span class="text-muted font-weight-bold">3</span> --}}
                                </a>    

                                @else
                                <a href='{{ route('backend.work.complete',$work->id) }}' class="ml-2" title='Work Complete' onclick="return confirm('Are you sure you want to Complete this Work?');" >
                                    <i class="mdi mdi-check text-success font-18 font-weight-bold"></i>
                                    {{-- <span class="text-muted font-weight-bold">3</span> --}}
                                </a>                                                                               
                                @endif
                            </li>
                            <li class="list-item d-inline-block">
                                <a class="ml-2 work-edit" href="#" data-work='{{ $work }}' title="Work Edit" data-toggle="modal" data-animation="bounce" data-target=".modal-work-edit">
                                    <i class="mdi mdi-pencil-outline text-muted font-18"></i>
                                </a>                                                                               
                            </li>
                            <li class="list-item d-inline-block">
                                {{-- <a class="" href="#">
                                <i class="mdi mdi-trash-can-outline text-muted font-18"></i>
                                </a>    --}}
                                <form action="{{ route('backend.work.destroy',$work->id) }}" method="post" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class=""><i class="mdi mdi-trash-can-outline text-danger ml-2 font-18"  onclick="return confirm('Are you sure you want to Delete this Work?');" title="Work Delete"></i></button>
                                </form>                                                                            
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end task-box-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    @endforeach
    <!--end col-->
</div>
<!--end row-->
@endsection
@push('js-link')
{{-- jquery date format libary  --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script> --}}
{{-- end --}}
<script src="{{ asset('contents/backend') }}/assets/plugins/select2/select2.min.js"></script>
<script src="{{ asset('contents/backend') }}/assets/plugins/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('contents/backend') }}/assets/pages/jquery.projects_task.init.js"></script>
@endpush
@push('js') 
<script>

    $(".select").select2({
        // placeholder: "Select a state",
        width: "100%",
        // allowClear: true,
    });
</script>
{{-- work item edit script --}}
<script>
    $(document).ready(function(){
         
        $('.work-edit').on('click',function(){
            var value = $(this).data('work');

            $('#work_edit').find('input[name="id"]').val(value.id);
            $('#work_edit').find('h5 b').text(value.order_item.item.name);
            $('#work_edit').find('textarea[name="note"]').val(value.note);
            $('#work_edit').find('input[name="dateline_on"]').val(moment(value.dateline_on).format('YYYY-MM-DD'));
            $('#work_edit').find('input[name="dateline_to"]').val(moment(value.dateline_to).format('YYYY-MM-DD'));

            $('#work_edit').find('select[name="user_id"] option').each(function(){
    
                var selectValue = $(this).val();
                $(this).removeAttr("selected");

                if (selectValue == value.user_id) {
                    $('#work_edit').find('select [value="' + value.user_id + '"]').attr("selected", "selected");
                }
    
            })

        });
    });
</script>
{{-- payment update script --}}
{{-- <script>
    $(document).ready(function(){
        $('.payment-update').on('click',function(){
            var value = $(this).data('payment');
            
            console.log(value);
            $('#payment-update').find('input[name="id"]').val(value.id);
            $('#payment-update').find('input[name="name"]').val(value.name);
            $('#payment-update').find('input[name="phone"]').val(value.phone);
            $('#payment-update').find('input[name="amount"]').val(value.amount);
        });
    });
</script> --}}
@endpush