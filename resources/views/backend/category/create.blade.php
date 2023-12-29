@extends('layouts.backend')
@section('pageTitle', 'Project Information')
@section('content')
@push('css-link')
<link href="{{ asset('contents/backend') }}/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
{{-- <link href="{{ asset('contents/backend') }}/assets/plugins/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css"> --}}
@endpush
<div class="row justify-content-center">
    <div class="col-10">
        <x-backend.from fromAction="{{ route('backend.category.store') }}" fromMethod='POST' fromClass=''>
            <x-slot name='fromBody'>
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="mt-2 header-title text-dark float-left">Create Category </h4>
                        {{-- <a class="btn btn-info btn-sm float-right" href=""><i class="mdi mdi-arrow-left-thick"></i> Back</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='code'  inputRequired='true' />
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='name'  inputRequired='true' />
                            </div>

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