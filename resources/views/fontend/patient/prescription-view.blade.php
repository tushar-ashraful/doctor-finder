@extends('layouts.website')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="invoice-content" id="printableArea">
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-logo">
                                    <img src="{{ asset('contents/fontend') }}/assets/img/logo.png" alt="logo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="invoice-details">
                                    <strong>Issued:</strong> {{ date('d F Y  h:i a', strtotime($booking->date_on)) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-info">
                                    <p class="invoice-details invoice-details-two">
                                       {{ $booking->doctor->name }} <br>
                                       {{ $booking->doctor->sub_title }},<br>
                                        Specialist: {{ $booking->doctor->specialist }}<br>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="invoice-info invoice-info2">
                                    <strong class="customer-text">Patient Info</strong>
                                    <p class="invoice-details">
                                        {{ $booking->patient->name }}  <br>
                                         <span>{{ $booking->patient->age() }}</span><br>
                                         <span>{{ $booking->patient->gender }}</span>,
                                         <span>{{ $booking->patient->blood_group }}</span><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->
                    <!-- Invoice Item -->
                    {{-- <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="invoice-info">
                                    <strong class="customer-text">Payment Method</strong>
                                    <p class="invoice-details invoice-details-two">
                                        Debit Card <br>
                                        XXXXXXXXXXXX-2541 <br>
                                        HDFC Bank<br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- /Invoice Item -->
                    <!-- Invoice Item -->
                    @if (isset($booking->medicines))
                    <div class="invoice-item invoice-table-wrap">
                         <h4>Medicines</h4>
                         <hr>
                        <div class="row">
                            <div class="col-md-12">
                                {{-- <div class="table-responsive">
                                    <table class="invoice-table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">VAT</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>General Consultation</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">$0</td>
                                                <td class="text-right">$100</td>
                                            </tr>
                                            <tr>
                                                <td>Video Call Booking</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">$0</td>
                                                <td class="text-right">$250</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> --}}
                                <ul class="list-unstyled text-dark font-weight-bold">
                                    @foreach ($booking->medicines as $key => $item)
                                    <li>
                                        <h5>{{ ++$key }}) {{ $item['name'] }} <br> 
                                            @if (isset($item['time']))@foreach ($item['time'] as $time) {{ $time }} / @endforeach @endif 
                                            ({{ $item['frequency'] }}) Qty:{{ $item['qty'] }}
                                        </h5>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- <div class="col-md-6 col-xl-4 ml-auto">
                                <div class="table-responsive">
                                    <table class="invoice-table-two table">
                                        <tbody>
                                            <tr>
                                                <th>Subtotal:</th>
                                                <td><span>$350</span></td>
                                            </tr>
                                            <tr>
                                                <th>Discount:</th>
                                                <td><span>-10%</span></td>
                                            </tr>
                                            <tr>
                                                <th>Total Amount:</th>
                                                <td><span>$315</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    @endif
                    @if (isset($booking->tests))
                    <div class="invoice-item invoice-table-wrap">
                         <h4>Tests</h4>
                         <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-unstyled text-dark font-weight-bold">
                                    @foreach ($booking->tests as $key => $test)
                                    <li>
                                        <h5>{{ ++$key }}) {{ $test['name'] }} (Collect: {{ $test['collect'] }})<br> 
                                           {{ $test['note'] }}
                                        </h5>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    @endif
                    <div class="row mt-5">
                        <div class="col-md-12 text-right">
                            <div class="signature-wrap">
                                <div class="signature border-0">
                                    <img width='100' src="{{ asset('uploads') }}/{{ $booking->doctor->signechar }}" alt="">
                                </div>
                                <div class="sign-name">
                                    <hr>
                                    <p class="mb-0"> {{  $booking->doctor->name }} </p>
                                    <p class="mb-0"> {{  $booking->doctor->sub_title }} </p>
                                    <p class="mb-0"> {{  $booking->doctor->specialist }} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->
                    <!-- Invoice Information -->
                   {{--  <div class="other-info">
                        <h4>Other information</h4>
                        <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
                    </div> --}}
                    <!-- /Invoice Information -->
                </div>
                <div class="row mb-5 ">
                    <div class="col-md-12">
                        <a href="#" class="btn btn-success" onclick="printDiv('printableArea')">Print</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
@endpush     