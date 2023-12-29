@extends('layouts.backend')
@section('pageTitle', 'Project Information')
@section('content')
        @include('backend.project.include.project_delete')
        @include('backend.project.include.project_note')
        @php
        $orderStatusEnum =  new App\Models\Order();
        $total = 0;
        $paid = 0;
        $due = 0;
        $discount = 0;
        $return = 0;
        $loss = 0;
        @endphp
    <div class="row">
        <div class="col-lg-10">
            <ul class="list-inline">
                <form action="">
                    <li class="list-inline-item">
                        <select name="university" id="" class='form-control' style="width:200px;">
                            <option value="">All</option>
                            @foreach ($universitys as $university)
                            <option value="{{ $university->id }}" {{ request('university') == $university->id ? 'selected' : '' }}>{{ $university->name }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li class="list-inline-item">
                        <select name="paymentStatus" id="" class='form-control'>
                            <option value="">-- Select Option --</option>
                            <option value="paid" {{ request('paymentStatus') == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="due" {{ request('paymentStatus') == 'due' ? 'selected' : '' }}>Due</option>
                        </select>
                    </li> 
                    <li class="list-inline-item">
                        <select name="column" id="" class='form-control'>
                            <option value="">-- Select Option --</option>
                            <option value="created_at" {{ request('column') == 'created_at' ? 'selected' : '' }}>Create</option>
                            <option value="delivery" {{ request('column') == 'delivery' ? 'selected' : '' }}>Delivery</option>
                        </select>
                    </li> 
                    {{-- <li class="list-inline-item">
                        <select name="status" id="" class='form-control'>
                            <option value="">All</option>
                            <option value="{{ $orderStatusEnum::NEWORDER }}" {{ request()->has('status') ? (request('status') == $orderStatusEnum::NEWORDER ? 'selected' : '') : '' }}>New</option>
                            <option value="{{ $orderStatusEnum::PROGRESS }}" {{ request('status') == $orderStatusEnum::PROGRESS ? 'selected' : '' }}>Progress</option>
                            <option value="{{ $orderStatusEnum::REVIEW }}" {{ request('status') == $orderStatusEnum::REVIEW ? 'selected' : '' }}>Review</option>
                            <option value="{{ $orderStatusEnum::CORRECTION_UPGRADE }}" {{ request('status') == $orderStatusEnum::CORRECTION_UPGRADE ? 'selected' : '' }}>Currection/Upgrade</option>
                            <option value="{{ $orderStatusEnum::COMPLETE }}" {{ request('status') == $orderStatusEnum::COMPLETE ? 'selected' : '' }}>Complete</option>
                            <option value="{{ $orderStatusEnum::DELIVERED }}" {{ request('status') == $orderStatusEnum::DELIVERED ? 'selected' : '' }}>Delivered</option>
                        </select>
                    </li>  --}}
                    
                    <li class="list-inline-item">
                        <input name='date_to' type="date" class='form-control' value="{{ request('date_to') }}">
                    </li> 
                    <li class="list-inline-item">
                        <input name='date_on' type="date" class='form-control' value="{{ request('date_on') }}">
                    </li>
                    <li class="list-inline-item">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ route('backend.project.index') }}" class="btn btn-primary">Clear</a>
                    </li>
                </form>
                 
                {{-- <li class="list-inline-item">
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
                </li> --}}
               
            </ul>
        </div>
    </div>
    <div class="row row-cols-6">
        <div class="col">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">Total Project Amount</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold set-total" title="SubTotal + Additional Fee"></h3><i class="{{-- dripicons-user-group --}} fas fa-wallet card-eco-icon text-pink align-self-center"></i>
                    </div>
                    {{-- <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>8.5%</span>Up From Yesterday</p> --}}
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">Total Paid</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold set-paid" title="Total Pay Amount"></h3><i class="fab fa-amazon-pay card-eco-icon text-secondary align-self-center"></i>
                    </div>
                    {{-- <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>1.5%</span> Up From Last Week</p> --}}
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">Total Due</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold set-due" title="Total Due - Total Unsettled"></h3><i class="fas fa-donate card-eco-icon text-warning align-self-center"></i>
                    </div>
                    {{-- <p class="mb-0 text-muted text-truncate"><span class="text-danger"><i class="mdi mdi-trending-down"></i>3%</span> Down From Last Month</p> --}}
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <div class="col">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">Total Discount</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold set-discount" title="Total Order Discount"></h3><i class="fab fa-opencart card-eco-icon text-danger align-self-center"></i>
                    </div>
                    {{-- <p class="mb-0 text-muted text-truncate"><span class="text-danger"><i class="mdi mdi-trending-down"></i>3%</span> Down From Last Month</p> --}}
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">Return Amount</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold set-return" title="Total Order Return Amount"></h3><i class="fas fa-recycle card-eco-icon text-success align-self-center"></i>
                    </div>
                    {{-- <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>10.5%</span> Up From Yesterday</p> --}}
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col">
            <div class="card card-eco">
                <div class="card-body">
                    <h4 class="title-text mt-0">Unsettled Amount</h4>
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold set-loss" title="Total Order Unsettled"></h3><i class="fab fa-btc card-eco-icon text-success align-self-center"></i>
                    </div>
                    {{-- <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>10.5%</span> Up From Yesterday</p> --}}
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
        <x-backend.datatable title="Project Information">
            <x-slot name="button">
                <div class="d-inline-block mt-3">
                <a href="{{ route('backend.project.index',['statusText' => 'all']) }}" class="btn btn-light {{ request()->has('statusText') ? (request('statusText')  == 'all' ? 'btn-dark' : 'btn-light') : 'btn-light' }} btn-sm">All <b>({{ $filter->count() }})</b></a>
                <a href="{{ route('backend.project.index',['status' => $orderStatusEnum::NEWORDER]) }}" class="btn {{ request()->has('status') ? (request('status')  == $orderStatusEnum::NEWORDER ? 'btn-dark' : 'btn-primary') : 'btn-primary' }} btn-sm ml-4">New <b>({{ $filter->where('status',$orderStatusEnum::NEWORDER)->count() }})</b></a>
                <a href="{{ route('backend.project.index',['status' => $orderStatusEnum::PROGRESS]) }}" class="btn  {{ request()->has('status') ? (request('status')  == $orderStatusEnum::PROGRESS ? 'btn-dark' : 'btn-purple') : 'btn-purple' }} btn-sm">Progress <b>({{ $filter->where('status',$orderStatusEnum::PROGRESS)->count() }})</b></a>
                <a href="{{ route('backend.project.index',['status' => $orderStatusEnum::REVIEW]) }}" class="btn {{ request()->has('status') ? (request('status')  == $orderStatusEnum::REVIEW ? 'btn-dark' : ' btn-secondary') : ' btn-secondary' }} btn-sm">Review <b>({{ $filter->where('status',$orderStatusEnum::REVIEW)->count() }})</b></a>
                <a href="{{ route('backend.project.index',['status' => $orderStatusEnum::CORRECTION_UPGRADE]) }}" class="btn  {{ request()->has('status') ? (request('status')  == $orderStatusEnum::CORRECTION_UPGRADE ? 'btn-dark' : 'btn-warning') : 'btn-warning' }} btn-sm">Currection/Upgrade <b>({{ $filter->where('status',$orderStatusEnum::CORRECTION_UPGRADE)->count() }})</b></a>
                <a href="{{ route('backend.project.index',['status' => $orderStatusEnum::COMPLETE]) }}" class="btn  {{ request()->has('status') ? (request('status')  == $orderStatusEnum::COMPLETE ? 'btn-dark' : 'btn-success') : 'btn-success' }} btn-sm">Complete <b>({{ $filter->where('status',$orderStatusEnum::COMPLETE)->count() }})</b></a>
                <a href="{{ route('backend.project.index',['status' => $orderStatusEnum::DELIVERED]) }}" class="btn  {{ request()->has('status') ? (request('status')  == $orderStatusEnum::DELIVERED ? 'btn-dark' : 'btn-secondary') : 'btn-secondary' }} btn-sm">Delivered <b>({{ $filter->where('status',$orderStatusEnum::DELIVERED)->count() }})</b></a>

                <a href="{{ route('backend.project.index',['statusText' => 'urgent']) }}" class="btn  {{ request()->has('statusText') ? (request('statusText')  == 'urgent' ? 'btn-dark' : 'btn-danger') : 'btn-danger' }} btn-sm ml-4">Urgent <b>({{ $filter->where('is_urgent',true)->where('status','!=',$orderStatusEnum::DELIVERED)->count() }})</b></a>
                <a href="{{ route('backend.project.index',['status' => $orderStatusEnum::CANCEL]) }}" class="btn  {{ request()->has('status') ? (request('status')  == $orderStatusEnum::CANCEL ? 'btn-dark' : 'btn-info') : 'btn-info' }} btn-sm">Cancel <b>({{ $filter->where('status',$orderStatusEnum::CANCEL)->count() }})</b></a>
                <a href="{{ route('backend.project.index',['statusText' => 'return']) }}" class="btn  {{ request()->has('statusText') ? (request('statusText')  == 'return' ? 'btn-dark' : 'btn-primary') : 'btn-primary' }} btn-sm ">Return <b>({{ $filter->whereNotNull('return_at')->count() }})</b></a>
                    
                <a href="{{ route('backend.project.index',['statusDate' => Carbon\Carbon::today()->toDateString() ]) }}" class="btn btn-danger {{ request()->has('statusDate') ? (request('statusDate')  == Carbon\Carbon::today()->toDateString() ? 'btn-dark' : 'btn-danger') : 'btn-danger' }} btn-sm ml-4">Today Delivery</a>
                <a href="{{ route('backend.project.index',['statusDate' => Carbon\Carbon::tomorrow()->toDateString() ]) }}" class="btn btn-warning {{ request()->has('statusDate') ? (request('statusDate')  == Carbon\Carbon::tomorrow()->toDateString() ? 'btn-dark' : 'btn-warning') : 'btn-warning' }} btn-sm">Tomorrow Delivery</a>
                <a href="{{ route('backend.project.create') }}" class="btn btn-info btn-sm ml-4">Create Project</a>
                 </div>
            </x-slot>

            <x-slot name='th'>
                    <th>SL</th>
                    <th>Project Details</th>
                    <th>Belling Details</th>
                    <th>Phone</th>
                    <th>Status</th>
                    @if (auth()->user()->role_id <= 2)
                    <th>Payment Info</th>
                    @endif
                    <th>Remarks</th>
                    <th>
                        Action
                       {{--  <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="check-all custom-control-input" id="horizontalCheckbox">
                            <label class="custom-control-label" for="horizontalCheckbox">Action</label>
                        </div> --}}
                    </th>
            </x-slot>
            <x-slot name='tableBody'>
                @foreach ($orders as $key => $order)
                    @php
                    $progress = $order->orderProgress();

                    $total += $order->subTotal() + $order->additional_fees;
                    $paid += $order->paid();
                    $due += $order->due() - $order->loss;
                    $discount += $order->discount;
                    $return += $order->return_amount;
                    $loss += $order->loss;
                    @endphp
                   
                    @if (request('paymentStatus') == 'due' && $order->due() != 0 )
                    @include('backend.project.include.table_tr_index')
                    @endif

                    @if(request('paymentStatus') == 'paid' && $order->paid() == $order->total())
                    @include('backend.project.include.table_tr_index')
                    @endif

                    @if(!request()->has('paymentStatus')  || request('paymentStatus') == '')
                    @include('backend.project.include.table_tr_index')
                    @endif
                    

                @endforeach
                    
            </x-slot>

            <x-slot name="script">
                <script>
                    $(document).ready(function(){
                        $("#datatable").DataTable({
                            serverSide: false,
                        // ajax: "",
                        // columns: [{
                        //         name: 'name'
                        //     },
                        //     {
                        //         name: 'phone'
                        //     },
                        //     {
                        //         name: 'email'
                        //     },
                        //     {
                        //         name: 'address'
                        //     },
                        //     {
                        //         name: 'reference'
                        //     },
                        //     {
                        //         name: 'project_name'
                        //     },
                        //     {
                        //         name: 'note'
                        //     },

                        //     // // { name: 'status', orderable: false },
                        //     {
                        //         name: 'action',
                        //         orderable: false,
                        //         searchable: false
                        //     }
                        // ],
                        "lengthMenu": [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                        ],
                        buttons: ["excel", "pdf", "colvis", "print", ],
                        dom: 'Blfrtip',
                        ordering: false,
                    })
                    });
                </script>
            </x-slot>
        </x-backend.datatable>
        @if (auth()->user()->role_id <= 2)
        <span class="amount-total" data-amount='{{ $total }}'></span>
        <span class="amount-paid" data-amount='{{ $paid }}'></span>
        <span class="amount-due" data-amount='{{ $due }}'></span>
        <span class="amount-discount" data-amount='{{ $discount }}'></span>
        <span class="amount-return" data-amount='{{ $return }}'></span>
        <span class="amount-loss" data-amount='{{ $loss }}'></span>
        @endif
        
{{-- @include('backend.project.create') --}}
@endsection

@push('js')
   <script>
       $(function(){
       var total = $('.amount-total').data('amount');
       var paid = $('.amount-paid').data('amount');
       var due = $('.amount-due').data('amount');
       var discount = $('.amount-discount').data('amount');
       var return_amount = $('.amount-return').data('amount');
       var loss = $('.amount-loss').data('amount');
       $('.set-total').text(total);
       $('.set-paid').text(paid);
       $('.set-due').text(due);
       $('.set-discount').text(discount);
       $('.set-return').text(return_amount);
       $('.set-loss').text(loss);
       })
   </script>
@endpush
