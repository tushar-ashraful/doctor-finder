@extends('layouts.backend')
@section('pageTitle', 'Project Information')
@section('content')
     
        <x-backend.datatable title="University Information">
            <x-slot name="button">
                <a class="btn btn-info btn-sm float-right" data-toggle="modal" data-animation="bounce" data-target=".modal-create" href="{{ route('backend.user.create') }}"><i class="mdi mdi-plus-circle-outline"></i>Create University</a>
            </x-slot>
            <x-slot name='th'>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Phone</th>
                    @if (auth()->user()->role_id <= 2)
                    <th>Action</th>
                    @endif
            </x-slot>
            <x-slot name='tableBody'>
                @foreach ($universitys as $key => $university)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $university->name }}</td>
                        <td>{{ $university->location }}</td>
                        <td>{{ $university->phone }}</td>
                       @if (auth()->user()->role_id <= 2) 
                        <td>
                            <a href="{{ route('backend.university.edit',$university->id) }}"><i class="far fa-edit text-info mr-1 mt-1 font-16" title="Edit"></i></a>
                            <form action="{{ route('backend.university.destroy',$university->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class=""><i class="mdi mdi-trash-can-outline text-danger ml-2 font-18"  onclick="return confirm('Are you sure you want to Delete this university?');" title="Work Delete"></i></button>
                            </form>      
                        </td>
                        @endif
                    </tr>
                @endforeach
                    
            </x-slot>

            <x-slot name="script">
                <script>
                    $("#datatable").DataTable({
                        // serverSide: true,
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
                    
                </script>
            </x-slot>
        </x-backend.datatable>
@include('backend.university.create')
@endsection
