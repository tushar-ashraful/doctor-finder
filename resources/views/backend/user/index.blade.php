@extends('layouts.backend')
@section('pageTitle', 'Users Information')
@section('content')

        <x-backend.datatable title="Users Information">
            <x-slot name="button">
                <a class="btn btn-info btn-sm float-right" data-toggle="modal" data-animation="bounce" data-target=".modal-create" href="{{ route('backend.user.create') }}"><i class="mdi mdi-plus-circle-outline"></i> Create User</a>
                {{-- <button class="btn-delete btn btn-danger btn-sm float-right mr-2" data-url="http://rightbazar_new.test/admin/user/destroy" disabled=""><i class="mdi mdi-delete"></i> Delete</button> --}}
            </x-slot>
            <x-slot name='th'>
                <tr>
                    {{-- <th>SL.</th> --}}
                    <th>Name</th>
                    <th>Role</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Image</th>
                    {{-- <th>Status</th> --}}
                    <th>
                        <div class="custom-control custom-checkbox">
                            {{-- <input type="checkbox" class="check-all custom-control-input" id="horizontalCheckbox"> --}}
                            <label class="{{-- custom-control-label --}}" {{-- for="horizontalCheckbox" --}}>Action</label>
                        </div>
                    </th>
                </tr>
            </x-slot>
            <x-slot name="script">
                <script>
                    $("#datatable").DataTable({
                        serverSide: true,
                        ajax: "{{ route('backend.user.dataTable') }}",
                        columns: [
                            // {
                            //     name: 'alamin'
                            // },
                            {
                                name: 'name'
                            },
                            {
                              name: 'role.name'
                            },
                            {
                                name: 'username'
                            },
                            {
                                name: 'email'
                            },
                            {
                                name: 'phone'
                            },
                            {
                                name: 'image'
                            },

                            // // { name: 'status', orderable: false },
                            {
                                name: 'action',
                                orderable: false,
                                searchable: false
                            },
                        ],
                        "lengthMenu": [
                            [10, 25, 50, -1],
                            [10, 25, 50, "All"]
                        ],
                        buttons: ["excel", "pdf", /*"colvis",*/ "print", ],
                        dom: 'Blfrtip',
                    }); 
                </script>
            </x-slot>
        </x-backend.datatable>
        @include('backend.user.create')

@endsection
@push('js')
    <script>
        $( document ).ready(function() {
             $(document).on('click','.view',function(){
                console.log($(this).data('info'))
             })
        })
    </script>
@endpush
