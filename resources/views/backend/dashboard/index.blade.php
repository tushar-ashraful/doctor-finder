@extends('layouts.backend')
@section('content')
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-eco">
                    <div class="card-body">
                        <h4 class="title-text mt-0">Total Doctors</h4>
                        <div class="d-flex justify-content-between">
                            <h3 class="font-weight-bold">{{ $doctors }}</h3><i class="dripicons-user-group card-eco-icon text-pink align-self-center"></i>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-lg-6">
                <div class="card card-eco">
                    <div class="card-body">
                        <h4 class="title-text mt-0">Total Patient</h4>
                        <div class="d-flex justify-content-between">
                            <h3 class="font-weight-bold">{{ $patient }}</h3><i class="dripicons-cart card-eco-icon text-secondary align-self-center"></i>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
          
            <!--end col-->
        </div>
@endsection
@push('js')
    <script src="{{ asset('contents/backend') }}/assets/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('contents/backend') }}/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{ asset('contents/backend') }}/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
@endpush