@extends('layouts.backend')
@section('pageTitle', 'Users Information')
@push('css')
@endpush
@section('content')
<!-- end page title end breadcrumb -->
<div class="row justify-content-center">
    <div class="col-6">
        <x-backend.from fromAction="{{ route('backend.university.update',$university->id) }}" fromMethod='PUT' media='true'  fromClass=''>
            <x-slot name='fromBody'>
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="mt-2 header-title text-dark float-left">Create University</h4>
                        {{-- <a class="btn btn-info btn-sm float-right" href=""><i class="mdi mdi-arrow-left-thick"></i> Back</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='name' inputRequired='true' inputValue='{{$university->name}}'/>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='phone' inputRequired='true' inputValue='{{$university->phone}}'/>
                            </div>
                            <div class="col-md-12">
                                <x-backend.inputs.input inputName='location' inputRequired='true' inputValue='{{$university->location}}'/>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">update</button>
                        <a href="" class="btn btn-info">Cancel</a>
                    </div>
                </div>
            </x-slot>
        </x-backend.from>
    </div>
    <!-- end col -->
</div>
@endsection
@push('js')
@endpush