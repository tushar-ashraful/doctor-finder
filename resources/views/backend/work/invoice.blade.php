@extends('layouts.backend')
@section('pageTitle', 'Project Information')
@section('content')
@push('css-link')

@endpush
{{-- <div class="row justify-content-center">
    <div class="col-10">

    </div>
</div> --}}

<div class="row justify-content-center">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-body invoice-head"> 
                <div class="row">
                    <div class="col-md-4 align-self-center">                                                
                        <img src="{{ asset('contents/backend') }}/assets/images/logo-png.png" alt="logo-small" width="300" class="logo-sm mr-2">
                        {{-- <br>Email: projects.zeonebd@gmail.com                                       --}}
                        {{-- <img src="{{ asset('contents/backend') }}/assets/images/logo-dark.png" alt="logo-large" class="logo-lg" height="16">                                                --}}
                    </div>
                    <div class="col-md-8">

                        <ul class="list-inline mb-0 contact-detail float-right">                                                   
                            <li class="list-inline-item">
                                <div class="pl-3">
                                    <i class="mdi mdi-web"></i>
                                    <p class="text-muted mb-0">www.zeronebd.com</p>
                                    <p class="text-muted mb-0">www.zeronetechbd.com</p>
                                    <p class="text-muted mb-0">www.projects.zeronebd.com</p>
                                </div>                                                
                            </li>
                            <li class="list-inline-item">
                                <div class="pl-3">
                                    <i class="mdi mdi-phone"></i>
                                    <p class="text-muted mb-0">Hotline: +88 01886 18 01 01 (bkash)</p>
                                    <p class="text-muted mb-0">Office: +88 01894 80 11 50</p>
                                    <p class="text-muted mb-0">Email: projects.zeonebd@gmail.com</p>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="pl-3">
                                    <i class="mdi mdi-map-marker"></i>
                                    <p class="text-muted mb-0">House#03, Road#04, Sec#6/ka,<br>(Opposite Side of Stadium 4no Gate) <br>Mirpur-2, Dhaka-1216</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> 
                {{-- <div class="row">
                    <div class="col-md-4 text-right"></div>
                    <div class="col-md-8 text-center">
                        Email: projects.zeonebd@gmail.com
                    </div>
                </div> --}}
            </div><!--end card-body-->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="">
                            <h6 class="mb-0"><b>Order No: {{ $project->sku }}</b></h6>
                            <h6><b>Order Date:</b> {{ myDateTime($project->created_at,true) }}</h6>
                            <h6><b>Delivery Date:</b> {{ myDateTime($project->delivery) }}</h6>
                            <h6><b>Ref:</b>{{ $project->reference }}</h6>
                            <h6><b>University:</b>{{ $project->university->name }}</h6>
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
                            <strong class="font-14"><b>Supervisor: {{ $project->supervisor }} ({{ $project->supervisor_phone }})</b></strong><br>
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
                                        <th>Unit Cost</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($project->orderItems as $key => $item)
                                    <tr>
                                        <th>{{ ++$key }}</th>
                                        <td>{{ $item->item->name }}</td>
                                        <td style="max-width: 400px;">{{ $item->description }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{  tkFormat($item->price) }}</td>
                                        <td class="text-right">{{  tkFormat($item->total) }}</td>
                                    </tr>
                                    @endforeach
                                    
                                    
                                    <tr>                                                        
                                        <td colspan="4" class="border-0"style="border:none !important;padding:4px 12px;"></td>
                                        <td class="border-0 font-14"style="border:none !important;padding:4px 12px;" ><b>Sub Total</b></td>
                                        <td class="border-0 font-14 text-right"style="border:none !important;padding:4px 12px;"><b> {{ tkFormat($project->subTotal()) }} </b></td>
                                    </tr>
                                    <tr>                                                        
                                        <td colspan="4" class="border-0"style="border:none !important;padding:4px 12px;"></td>
                                        <td class="border-0 font-14"style="border:none !important;padding:4px 12px;"><b>Additional Fee</b></td>
                                        <td class="border-0 font-14 text-right"style="border:none !important;padding:4px 12px;"><b>+ {{ tkFormat($project->additional_fees) }}</b></td>
                                    </tr>
                                    <tr>                                                        
                                        <td colspan="4" class="border-0"style="border:none !important;padding:4px 12px;"></td>
                                        <td class="border-0 font-14"style="border:none !important;padding:4px 12px; border-bottom:1px solid !important"><b>Discount</b></td>
                                        <td class="border-0 font-14 text-right"style="border:none !important;padding:4px 12px; border-bottom:1px solid !important"><b>- {{ tkFormat($project->discount) }}</b></td>
                                    </tr>
                                    <tr>                                                        
                                        <td colspan="4" class="border-0"style="border:none !important;padding:4px 12px;"></td>
                                        <td class="border-0 font-14"style="border:none !important;padding:4px 12px;"><b>Total</b></td>
                                        <td class="border-0 font-14 text-right"style="border:none !important;padding:4px 12px;"><b> {{ tkFormat($project->total()) }}</b></td>
                                    </tr>
                                    @foreach ($project->orderPay as $pay)
                                    <tr>                                                        
                                        <td colspan="4" class="border-0"style="border:none !important;padding:4px 12px;"></td>
                                        <td class="border-0 font-14"style="border:none !important;padding:4px 12px;"><b>{{ $pay->type == App\Models\OrderPay::NEWORDER ? 'Advance' : 'Pay' }} ({{ myDateTime($pay->created_at) }})</b></td>
                                        <td class="border-0 font-14 text-right"style="border:none !important;padding:4px 12px;"><b>- {{ tkFormat($pay->amount) }}</b></td>
                                    </tr>
                                    @endforeach
                                    
                                    <tr>                                                        
                                        <td colspan="4" class="border-0"style="border:none !important;padding:4px 12px;"></td>
                                        <td class="border-0 font-14"style="border:none !important;padding:4px 12px; border-top:1px solid !important"><b>Due</b></td>
                                        <td class="border-0 font-14 text-right"style="border:none !important;padding:4px 12px; border-top:1px solid !important"><b>{{ tkFormat($project->due()) }}</b></td>
                                    </tr>
                                    @if ($project->return_at)
                                        <tr>                                                        
                                            <td colspan="4" class="border-0"style="border:none !important;padding:4px 12px;"></td>
                                            <td class="border-0 font-14"style=" !important;padding:4px 12px;"><b>Project Return ({{ myDateTime($project->return_at) }})</b></td>
                                            <td class="border-0 font-14 text-right"style=" !important;padding:4px 12px;"><b>{{ tkFormat($project->return_amount) }}</b></td>
                                        </tr>
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

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <h5 class="mt-4">Terms And Condition :</h5>
                        <ul class="pl-3">
                            <li><small>1) 50% Payment will be advance with wordk order rest 50% amount after delivered tha job.</small></li>
                            <li><small>2) If you have to attach any fature outside tha project specification mentioned during the order, you will have to pay extra</small></li>
                            <li><small>3) All service of tha project will be valid for four months</small></li>                                            
                            <li><small>4) After taking the project, we will not be responsible for any physical damage,</small></li>                                            
                        </ul>
                    </div> 

                    {{-- <div class="col-lg-6 align-self-end">
                        
                    </div> --}}
                    <div class="col-lg-12 align-self-end mt-5">
                        <div class="w-25 float-left text-center">
                            {{-- <small>Account Manager</small> --}}
                            {{-- <img src="{{ asset('contents/backend') }}/assets/images/signature.png" alt="" class="" height="48"> --}}
                            <p class="border-top ">Customer</p>
                        </div>
                        <div class="w-25 float-right text-center">
                            {{-- <small>Account Manager</small> --}}
                            {{-- <img src="{{ asset('contents/backend') }}/assets/images/signature.png" alt="" class="" height="48"> --}}
                            <p class="border-top">Authority</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-12 col-xl-4 ml-auto align-self-center">
                        <div class="text-center text-muted"><small>Thank you very much for doing business with us. Thanks ! <br> <h6 class="mb-0">A Concern Of</h6> <img src="{{ asset('contents/backend') }}/assets/images/logo2.png" alt="logo-small" width="200" class="logo-sm mr-2"></small></div>
                    </div>
                    <div class="col-lg-12 col-xl-4">
                        <div class="float-right d-print-none">
                            <a href="javascript:window.print()" class="btn btn-danger"><i class="fa fa-print"></i></a>
                            {{-- <a href="#" class="btn btn-primary">Submit</a>
                            <a href="#" class="btn btn-danger">Cancel</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
@push('js-link')

@endpush
@push('js')

@endpush
@endsection