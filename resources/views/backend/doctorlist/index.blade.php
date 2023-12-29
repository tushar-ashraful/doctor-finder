@extends('layouts.backend')
@section('pageTitle', 'Doctor Information')
@section('content')
        
    
    
        <x-backend.datatable title="Doctor Information">
            <x-slot name="button">
                {{-- <div class="d-inline-block mt-3">
                <a href="{{ route('backend.project.index',['statusText' => 'all']) }}" class="btn btn-light {{ request()->has('statusText') ? (request('statusText')  == 'all' ? 'btn-dark' : 'btn-light') : 'btn-light' }} btn-sm">All <b>({{ $filter->count() }})</b></a>
                <a href="{{ route('backend.project.index',['status' => $orderStatusEnum::NEWORDER]) }}" class="btn {{ request()->has('status') ? (request('status')  == $orderStatusEnum::NEWORDER ? 'btn-dark' : 'btn-primary') : 'btn-primary' }} btn-sm ml-4">New <b>({{ $filter->where('status',$orderStatusEnum::NEWORDER)->count() }})</b></a>
                <a href="{{ route('backend.project.index',['status' => $orderStatusEnum::PROGRESS]) }}" class="btn  {{ request()->has('status') ? (request('status')  == $orderStatusEnum::PROGRESS ? 'btn-dark' : 'btn-purple') : 'btn-purple' }} btn-sm">Progress <b>({{ $filter->where('status',$orderStatusEnum::PROGRESS)->count() }})</b></a>
                <a href="{{ route('backend.project.index',['status' => $orderStatusEnum::REVIEW]) }}" class="btn {{ request()->has('status') ? (request('status')  == $orderStatusEnum::REVIEW ? 'btn-dark' : ' btn-secondary') : ' btn-secondary' }} btn-sm">Review <b>({{ $filter->where('status',$orderStatusEnum::REVIEW)->count() }})</b></a>
                <a href="{{ route('backend.project.index',['status' => $orderStatusEnum::CORRECTION_UPGRADE]) }}" class="btn  {{ request()->has('status') ? (request('status')  == $orderStatusEnum::CORRECTION_UPGRADE ? 'btn-dark' : 'btn-warning') : 'btn-warning' }} btn-sm">Currection/Upgrade <b>({{ $filter->where('status',$orderStatusEnum::CORRECTION_UPGRADE)->count() }})</b></a>
                <a href="{{ route('backend.project.index',['status' => $orderStatusEnum::COMPLETE]) }}" class="btn  {{ request()->has('status') ? (request('status')  == $orderStatusEnum::COMPLETE ? 'btn-dark' : 'btn-success') : 'btn-success' }} btn-sm">Complete <b>({{ $filter->where('status',$orderStatusEnum::COMPLETE)->count() }})</b></a>
                <a href="{{ route('backend.project.index',['status' => $orderStatusEnum::DELIVERED]) }}" class="btn  {{ request()->has('status') ? (request('status')  == $orderStatusEnum::DELIVERED ? 'btn-dark' : 'btn-secondary') : 'btn-secondary' }} btn-sm">Delivered <b>({{ $filter->where('status',$orderStatusEnum::DELIVERED)->count() }})</b></a>

                <a href="{{ route('backend.project.index',['statusText' => 'urgent']) }}" class="btn  {{ request()->has('statusText') ? (request('statusText')  == 'urgent' ? 'btn-dark' : 'btn-danger') : 'btn-danger' }} btn-sm ml-4">Urgent <b>({{ $filter->where('is_urgent',true)->where('status','!=',$orderStatusEnum::DELIVERED)->count() }})</b></a>
                <a href="{{ route('backend.project.index',['status' => $orderStatusEnum::CANCEL]) }}" class="btn  {{ request()->has('status') ? (request('status')  == $orderStatusEnum::CANCEL ? 'btn-dark' : 'btn-info') : 'btn-info' }} btn-sm">Cancel <b>({{ $filter->where('status',$orderStatusEnum::CANCEL)->count() }})</b></a>
                <a href="{{ route('backend.project.index',['statusText' => 'return']) }}" class="btn  {{ request()->has('statusText') ? (request('statusText')  == 'return' ? 'btn-dark' : 'btn-primary') : 'btn-primary' }} btn-sm ">Return <b>({{ $filter->whereNotNull('return_at')->count() }})</b></a>
                    
                <a href="{{ route('backend.project.index',['statusDate' => Carbon\Carbon::today()->toDateString() ]) }}" class="btn btn-danger {{ request()->has('statusDate') ? (request('statusDate')  == Carbon\Carbon::today()->toDateString() ? 'btn-dark' : 'btn-danger') : 'btn-danger' }} btn-sm ml-4">Today Delivery</a>
                <a href="{{ route('backend.project.index',['statusDate' => Carbon\Carbon::tomorrow()->toDateString() ]) }}" class="btn btn-warning {{ request()->has('statusDate') ? (request('statusDate')  == Carbon\Carbon::tomorrow()->toDateString() ? 'btn-dark' : 'btn-warning') : 'btn-warning' }} btn-sm">Tomorrow Delivery</a>
                <a href="{{ route('backend.project.create') }}" class="btn btn-info btn-sm ml-4">Create Project</a>
                 </div> --}}
            </x-slot>

            <x-slot name='th'>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
            </x-slot>
            <x-slot name='tableBody'>
                @foreach ($doctors as $key => $doctor)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td><img src="{{ $doctor->image() }}"  width="200" alt=""></td>
                    <td>{{ $doctor->email }}</td>
                    <td>{{ $doctor->phone }}</td>
                    <td>
                        <a href="{{ route('backend.doctor.view',$doctor->id) }}"><i class="far fa-eye text-info mr-1 mt-1 font-16" title="View"></i></a>
                        <a href="{{ route('backend.doctor.approved',$doctor->id) }}"><i class="fas {{ $doctor->approve_at == null ? 'fa-check' : 'fa-power-off' }} text-info mr-1 mt-1 font-16" title="Invoice Print"></i></a>
                        {{-- <a href=""><i class="far fa-edit text-info mr-1 mt-1 font-16" title="Edit"></i></a> --}}
                        {{-- <a href=""><i class="fas fa-tasks text-info mr-1 mt-1 font-16" title="Task"></i></a> --}}
                    </td>
                </tr>
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
                    });
                </script>
            </x-slot>
        </x-backend.datatable>
       
        
{{-- @include('backend.project.create') --}}
@endsection

@push('js')
   <script>
       $(function(){
       var total = $('.amount-total').data('amount');
       var paid = $('.amount-paid').data('amount');
       var due = $('.amount-due').data('amount');
       var discount = $('.amount-discount').data('amount');
       var return_amount = $('.amount-return').data('amount');
       var loss = $('.amount-loss').data('amount');
       $('.set-total').text(total);
       $('.set-paid').text(paid);
       $('.set-due').text(due);
       $('.set-discount').text(discount);
       $('.set-return').text(return_amount);
       $('.set-loss').text(loss);
       })
   </script>
@endpush
