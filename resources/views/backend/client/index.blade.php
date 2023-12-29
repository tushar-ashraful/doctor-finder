@extends('layouts.backend')
@section('pageTitle', 'Client Information')
@section('content')
        <x-backend.datatable title="Client Information">
            <x-slot name="button">
                <a href="{{ route('backend.clientlist.create') }}" class="btn btn-info btn-sm float-right"><i class="mdi mdi-plus-circle-outline"></i> Create Client</a>
                    <form class="align-content-center">
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <select class="form-control" name="type">
                                    <option value="">-- Select Value --</option>
                                    @foreach ($clientTypes as $type)
                                    <option value="{{$type->id}}" {{request('type') == $type->id ? 'selected' : ''}}>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8">
                                <a href='{{ route('backend.clientlist.index') }}' class="btn btn-success btn-sm mr-2">All ( {{$count}} ) </a>
                                @foreach ($clientStatuses as $status)
                                <button type="submit" name="status" value='{{$status->id}}' class="btn btn-success btn-sm mr-2 {{request('status') == $status->id ? 'btn-info' : ''}}" ><b>{{$status->name}}</b> ( {{$status->client->count()}} )</button>
                                @endforeach
                                
                            </div>
                        </div>
                    </form>
                {{-- <button class="btn-delete btn btn-danger btn-sm float-right mr-2" data-url="http://rightbazar_new.test/admin/user/destroy" disabled=""><i class="mdi mdi-delete"></i> Delete</button> --}}
            </x-slot>
            <x-slot name='th'>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Reference</th>
                    <th>Project Name</th>
                    <th>Note</th>
                    {{-- <th>Status</th> --}}
                    <th>
                        Action
                        {{-- <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="check-all custom-control-input" id="horizontalCheckbox">
                            <label class="custom-control-label" for="horizontalCheckbox">Action</label>
                        </div> --}}
                    </th>
            </x-slot>
            <x-slot name='tableBody'>
                @foreach ($clientLists as $list)
                    <tr>
                        <td> <b>{{$list->name}}</b> <br> {{$list->email}} <br> {{$list->address}} <br> <span class="bg-warning">{{$list->created_at->format('d M Y')}}</span></td>
                        {{-- <td> {{$list->phone}} </td> --}}
                        {{-- <td> {{$list->email}} </td> --}}
                        <td> {{$list->phone}} </td>
                        <td> {{$list->reference}} </td>
                        <td> {{$list->project_name}} </td>
                        <td> 
                            {{ $list->note}} <br>
                            <span class='bg-warning'>{{$list->short_note}}</span> 
                            <span class='bg-success'>{{$list->updated_at->format('d M Y')}}</span>
                        </td>
                        <td>
                            <a href="{{ route('backend.clientlist.edit',$list->id) }}"><i class="far fa-edit text-info mr-1 mt-1 font-16"></i></a>
                            <a href="{{ route('backend.clientlist.delete',$list->id) }}" class="btn-delete"><i class="far fa-trash-alt text-danger mt-1 font-16"></i></a>
                        </td>
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
@endsection
