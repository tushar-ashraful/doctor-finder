@extends('layouts.backend')
@section('pageTitle', 'Category Information')
@section('content')
        

        <x-backend.datatable title="Category Information">
            <x-slot name="button">
                <div class="float-right">
                
                <a href="{{ route('backend.category.create') }}" class="btn btn-info btn-sm ml-4">Create category</a>
                 </div>
            </x-slot>

            <x-slot name='th'>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Action</th>
            </x-slot>
            <x-slot name='tableBody'>
                @foreach ($categorys as $key => $category)
                    @include('backend.category.include.table_tr_index')
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
                        //         name: 'category_name'
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
        
        
{{-- @include('backend.category.create') --}}
@endsection


