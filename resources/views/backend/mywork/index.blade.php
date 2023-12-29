@extends('layouts.backend')
@section('pageTitle', 'Project Information')
@section('content')
        <x-backend.datatable title="Project Information">
            <x-slot name="button">
                <a href="{{ route('backend.project.create') }}" class="btn btn-info btn-sm float-right">Create Project</a>
                <a href="" class="btn btn-light btn-sm">All (10)</a>
                <a href="" class="btn btn-primary btn-sm">New (10)</a>
                <a href="" class="btn btn-purple btn-sm">Progress (10)</a>
                <a href="" class="btn btn-success btn-sm">Complete (10)</a>
                <a href="" class="btn btn-warning btn-sm">Currection/upgrade (10)</a>
                <a href="" class="btn btn-danger btn-sm">Urgent (10)</a>
                <a href="" class="btn btn-secondary btn-sm">Delivered (10)</a>
            </x-slot>
            <x-slot name='th'>
                    <th>SL</th>
                    <th>Project Details</th>
                    <th>Belling Details</th>
                    <th>phone</th>
                    <th>Status</th>
                    <th>Payment Info</th>
                    <th>Remarks/Note By ZerOne Projects</th>
                    <th>
                        Action
                        {{-- <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="check-all custom-control-input" id="horizontalCheckbox">
                            <label class="custom-control-label" for="horizontalCheckbox">Action</label>
                        </div> --}}
                    </th>
            </x-slot>
            <x-slot name='tableBody'>
                @foreach ($orders as $key => $order)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{  $order->sku }} 
                            <br>{{ $order->title }}
                            {{-- <br>Feature: Lorem ipsum dolor sit amet. --}}
                            <br>{{ myDateTime($order->created_at,true) }}
                        </td>
                        <td>{{ $order->name }}
                        <br>{{ $order->email }}
                        <br>{{ $order->university->name}}
                        </td>
                        <td>{{ $order->phone }}</td>
                        <td>
                            Design: <span class="text-success">complete</span>
                            <br>Hardwar:  <span class="text-warning">Panding</span>
                            <br>DeliveryInfo: Not Delivered/Delivered
                        </td>
                        <td>
                            Sub Total: {{ tkFormat($order->subTotal()) }}
                            @if ($order->additional_fees)
                             <br>Fee: {{ tkFormat($order->additional_fees) }}
                            @endif
                            @if ($order->discount)
                            <br>Discount: {{ tkFormat($order->discount) }}
                            @endif
                            <br>Total: {{ tkFormat($order->total()) }}
                            <br>Paid: {{ tkFormat($order->paid()) }}
                            @if ($order->due())
                            <br>Due: {{ tkFormat($order->due()) }}
                            @endif
                            @if ($order->loss)
                            <br>Loss: {{ tkFormat($order->loss) }}
                            @endif
                        </td>
                        <td>
                            {{ $order->note }}
                        </td>
                        <td>
                            <a href="{{ route('backend.project.show',$order->id) }}"><i class="far fa-eye text-info mr-1 mt-1 font-16" title="View"></i></a>
                            <a href="{{ route('backend.project.invoice',$order->id) }}"><i class="fas fa-print text-info mr-1 mt-1 font-16" title="Invoice Print"></i></a>
                            <a href="{{ route('backend.project.edit',$order->id) }}"><i class="far fa-edit text-info mr-1 mt-1 font-16" title="Edit"></i></a>
                            <a href="{{ route('backend.project.edit',$order->id) }}"><i class="fas fa-tasks text-info mr-1 mt-1 font-16" title="Task"></i></a>
                            <a href="#" class="btn-delete"><i class="far fa-trash-alt text-danger mt-1 font-16" title="Delete"></i></a>
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
{{-- @include('backend.project.create') --}}
@endsection
