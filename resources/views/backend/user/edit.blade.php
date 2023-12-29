@extends('layouts.backend')
@section('pageTitle', 'Users Information')
@push('css')
@endpush
@section('content')
<!-- end page title end breadcrumb -->
<div class="row justify-content-center">
    <div class="col-10">
        <x-backend.from fromAction="{{ route('backend.user.update',$user->slug) }}" fromMethod='PUT' media='true'  fromClass=''>
            <x-slot name='fromBody'>
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="mt-2 header-title text-dark float-left">Create User</h4>
                        {{-- <a class="btn btn-info btn-sm float-right" href=""><i class="mdi mdi-arrow-left-thick"></i> Back</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='name' inputValue='{{$user->name}}'/>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='username' inputValue='{{$user->username}}'/>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='email' inputValue='{{$user->email}}'/>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='phone' inputValue='{{$user->phone}}'/>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputType='select' inputName='role' inputClass='select'>
                                    <x-slot name='selectOption'>
                                        @foreach ($roles as $role)
                                        <option value="{{$role->id}}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{$role->name}}</option>
                                        @endforeach
                                    </x-slot>
                                </x-backend.inputs.input>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputType='password' inputName='password'/>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputType='password' inputName='password_confirmation'/>
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