@extends('layouts.backend')
@section('pageTitle', 'Project Information Update')
@section('content')
@push('css-link')
<link href="{{ asset('contents/backend') }}/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
{{-- <link href="{{ asset('contents/backend') }}/assets/plugins/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css"> --}}
@endpush
<div class="row justify-content-center">
    <div class="col-10">
        <x-backend.from fromAction="{{ route('backend.project.update',$project->id) }}" fromMethod='PUT' fromClass='form-parsley'>
            <x-slot name='fromBody'>
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="mt-2 header-title text-dark float-left">Project Update ( <b>{{ $project->sku }}</b> )</h4>
                        {{-- <a class="btn btn-info btn-sm float-right" href=""><i class="mdi mdi-arrow-left-thick"></i> Back</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Project Info</h4>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='title'  inputRequired='true' inputValue='{{ $project->title }}' />
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='reference' inputValue='{{ $project->reference }}'/>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='supervisor' inputRequired='true' inputValue='{{ $project->supervisor }}'/>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='supervisor_phone' inputType='tel' inputRequired='true' inputValue='{{ $project->supervisor_phone }}'/>
                            </div>
                            <div class="col-md-12">
                                <x-backend.inputs.input inputName='description' inputType='textarea' inputValue='{{ $project->description }}'/>
                            </div>
                            <div class="col-md-3">
                                <x-backend.inputs.input inputName='delivery' inputType='date' inputRequired='true' inputValue='{{ inputCalander($project->delivery) }}'/>
                            </div>
                            <div class="col-md-2 align-self-center">
                                <div class="custom-control custom-switch switch-danger ">
                                    <input type="checkbox" class="custom-control-input" name='is_urgent' id="customSwitchDanger" {{ $project->is_urgent ? 'checked' : ''  }}>
                                    <label class="custom-control-label" for="customSwitchDanger">Urgent</label>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <h4>Project Members</h4>
                                <hr>
                            </div>
                            <div class="repeater-custom-show-hide col-md-12 mb-3">
                                <div data-repeater-list="members">
                                	@foreach ($project->members as $member)
                                		<div data-repeater-item="" class="row">
                                        <div class="col-md-4">
                                            <x-backend.inputs.input inputName='member_name' inputValue='{{ $member->member_name }}'/>
                                        </div>
                                        <div class="col-md-4">
                                            <x-backend.inputs.input inputName='member_id' inputValue='{{ $member->member_id }}'/>
                                        </div>
                                        <div class="col-md-3">
                                            <x-backend.inputs.input inputName='member_phone' inputType='tel' inputValue='{{ $member->member_phone }}'/>
                                        </div>
                                        <div class="col-md-1">
                                            <span data-repeater-delete="" class="btn btn-danger btn-sm mt-4">
                                                <span class="fas fa-times"></span>
                                            </span>
                                        </div><!--end col-->
                                    </div><!--end /div-->
                                	@endforeach
                                    
                                </div><!--end repet-list-->
                                <div class="form-group mb-0 row">
                                    <div class="col-sm-12">
                                        <span data-repeater-create="" class="btn btn-secondary">
                                            <span class="fas fa-plus"></span> Add
                                        </span>
                                    </div><!--end col-->
                                </div><!--end row-->                                         
                            </div>
                            {{-- <div class="col-md-12">
                                <h4>Project Items</h4>
                                <hr>
                            </div> --}}
                            {{-- <div class="repeater-custom-show-hide col-md-12 mb-3">
                                <div data-repeater-list="items">
                                    <div data-repeater-item="" class="row">
                                        <div class="col-md-2">
                                            <x-backend.inputs.input inputName='item' inputType='normal-select' inputRequired='true' >
                                                <x-slot name='selectOption'>
                                                    @foreach ($items as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </x-slot>
                                            </x-backend.inputs.input>
                                        </div>
                                        <div class="col-md-2">
                                            <x-backend.inputs.input inputName='description'/>
                                        </div>
                                        <div class="col-md-2">
                                            <x-backend.inputs.input inputName='is_urgent' inputType='date' inputLabel='Urgent Date'/>
                                        </div>
                                        <div class="col-md-1">
                                            <x-backend.inputs.input inputName='qty' inputType='number' inputValue='1' min='1' inputPlaceholder='QTY'  inputRequired='true'   />
                                        </div>
                                        <div class="col-md-2">
                                            <x-backend.inputs.input inputName='price' inputType='number' inputValue='0' min='0' inputPlaceholder='Price' inputRequired='true'  />
                                        </div>
                                        <div class="col-md-2">
                                            <x-backend.inputs.input inputName='total' inputType='number' inputValue='0' min='0' inputClass='item_total' inputPlaceholder='Total Price'  readonly="readonly" />
                                        </div>                                        
                                        <div class="col-md-1">
                                            <span data-repeater-delete="" class="btn btn-danger btn-sm mt-4">
                                                <span class="fas fa-times"></span>
                                            </span>
                                        </div><!--end col-->
                                    </div><!--end /div-->
                                </div><!--end repet-list-->
                                <div class="form-group mb-0 row">
                                    <div class="col-sm-12">
                                        <span data-repeater-create="" class="btn btn-secondary">
                                            <span class="fas fa-plus"></span> Add
                                        </span>
                                    </div><!--end col-->
                                </div><!--end row-->                                         
                            </div> --}}
                            <div class="col-md-12">
                                <h4>Billing Info</h4>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='name' inputRequired='true' inputValue='{{ $project->name }}'/>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='phone' inputType='tel' inputRequired='true' inputValue='{{ $project->phone }}'/>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='email' inputValue='{{ $project->email }}'/>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='university' inputType='select' inputRequired='true'>
                                    <x-slot name='selectOption'>
                                        @foreach ($universitys as $university)
                                        <option value="{{$university->id}}" {{ selected($university->id,$project->university_id) }}>{{$university->name}}</option>
                                        @endforeach
                                    </x-slot>
                                </x-backend.inputs.input>
                            </div> 
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='batch' inputRequired='true' inputValue='{{ $project->batch }}'/>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='address' inputRequired='true' inputValue='{{ $project->address }}'/>
                            </div>
                            {{-- <div class="col-md-12">
                                <h4>Payment Info</h4>
                                <hr>
                            </div> --}}
                            {{-- <div class="col-md-2">
                                <x-backend.inputs.input inputName='additional_fees' inputValue='0' min='0' inputType='number'/>
                            </div> 
                            <div class="col-md-2">
                                <x-backend.inputs.input inputName='total' inputValue='0' inputId='total_amount' inputType='number' readonly="readonly" />
                            </div>
                            <div class="col-md-2">
                                <x-backend.inputs.input inputName='discount' inputValue='0' min='0' inputType='number'/>
                            </div>
                            <div class="col-md-2">
                                <x-backend.inputs.input inputName='payble_amount' inputValue='0'  inputType='number'  readonly="readonly" />
                            </div>
                            <div class="col-md-2">
                                <x-backend.inputs.input inputName='advanced'  inputValue='0' min='1' inputType='number' inputLabel='Advanced amount'/>
                            </div>
                            <div class="col-md-2">
                                <x-backend.inputs.input inputName='due' inputValue='0' min='0' inputType='number' readonly="readonly"/>
                            </div> --}}
                            
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </x-slot>
        </x-backend.from>

    </div>
    <!-- end col -->
</div>
@push('js-link')
<script src="{{ asset('contents/backend') }}/assets/plugins/select2/select2.min.js"></script>
<script src="{{ asset('contents/backend') }}/assets/plugins/repeater/jquery.repeater.min.js"></script>
<script src="{{ asset('contents/backend') }}/assets/pages/jquery.form-repeater.js"></script>

<!-- Parsley js -->
<script src="{{ asset('contents/backend') }}/assets/plugins/parsleyjs/parsley.min.js"></script>
<script src="{{ asset('contents/backend') }}/assets/pages/jquery.validation.init.js"></script> 
{{-- 
<script src="{{ asset('contents/backend') }}/assets/plugins/flatpickr/flatpickr.js"></script>
<script src="{{ asset('contents/backend') }}/assets/js/flatpickr.init.js"></script> --}}
@endpush
@push('js')
    <script>
        $(".select").select2({
                // placeholder: "Select a state",
                width: "100%",
                // allowClear: true,
            });
    </script>
{{-- <script>

      $(document).ready(function () {
        // project item jquery  
        $(document).on("blur click change", ".price, .qty", function () {
            
            var row = $(this).closest(".row");
            var item_total =  row.find(".qty").val() * row.find(".price").val();
            row.find('.item_total').val(item_total)
            // total
            var item_total_amount = 0 + parseInt($('#additional_fees').val())
            $(".item_total").each(function() {  
                item_total_amount += +$(this).val();
            });
            $('#total_amount').val(item_total_amount);

            // Payble amount
            var payble_amount = item_total_amount - parseInt($('#discount').val());
            $('#payble_amount').val(payble_amount);

            // Due
            var due = payble_amount - parseInt($('#advanced').val());
            $('#due').val(due);
        });

        $(document).on("blur click change", "#additional_fees, #total_amount, #discount , #advanced", function () {
            
            // total
            var item_total_amount = 0 + parseInt($('#additional_fees').val())
            $(".item_total").each(function() {  
                item_total_amount += +$(this).val();
            });
            $('#total_amount').val(item_total_amount);

            // Payble amount
            var payble_amount = item_total_amount - parseInt($('#discount').val());
            $('#payble_amount').val(payble_amount);

            // Due
            var due = payble_amount - parseInt($('#advanced').val());
            $('#due').val(due);
        });

        // $(document).on("blur", "#additional_fees, #total_amount, #discount , #advanced", function () {

        //     var additional_fees = parseInt($('#additional_fees').val());
        //     var total = parseInt($('#total_amount').val());
        //     var discount = parseInt($('#discount').val());
        //     var advanced = parseInt($('#advanced').val());

        //     $('#total_amount').val(total + additional_fees)

        // })

    })
</script> --}}
@endpush
@endsection