@push('css')
    <link href="{{ asset('contents/backend') }}/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('contents/backend') }}/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <style>
        .dt-buttons {
            margin-right: 160px !important;
        }

        .dataTables_length {
            display: inline-block !important;
            margin-right: 112px !important;
        }

        .dataTables_filter {
            display: inline-block !important;
        }

        .page-content {
            overflow-x: auto;
        }

    </style>
@endpush
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="mt-2 float-left mr-3">{{ $title }}</h4>
                {{ $button ?? '' }}
            </div>
            <div class="card-body order-list">
                {{-- <h4 class="header-title mt-0 mb-3">Order List</h4> --}}
                <div class="table-responsive ">
                    <table id="datatable" class="table table-hover {{-- dt-responsive --}} nowrap mb-0 table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                {{ $th }}
                            </tr>
                            <!--end tr-->
                        </thead>
                        <tbody>
                            {{ $tableBody ?? '' }}
                        </tbody>
                    </table>
                    <!--end table-->
                </div>
                <!--end /div-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
@push('js')

    <script src="{{ asset('contents/backend') }}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('contents/backend') }}/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    {{-- button use --}}
    <script src="{{ asset('contents/backend') }}/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ asset('contents/backend') }}/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>

    <script src="{{ asset('contents/backend') }}/assets/plugins/datatables/jszip.min.js"></script>
    <script src="{{ asset('contents/backend') }}/assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="{{ asset('contents/backend') }}/assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="{{ asset('contents/backend') }}/assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="{{ asset('contents/backend') }}/assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="{{ asset('contents/backend') }}/assets/plugins/datatables/buttons.colVis.min.js"></script>

    <script src="{{ asset('contents/backend') }}/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="{{ asset('contents/backend') }}/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

    {{ $script }}
@endpush
