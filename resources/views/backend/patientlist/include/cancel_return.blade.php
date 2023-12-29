<x-backend.modal.create modalTarget="modal-project-return" modalSize=''>
    <x-slot name="modalBody">
        <x-backend.from fromAction="{{ route('backend.project.return_cancel',$project->id) }}" fromMethod='POST' media='true'  fromClass=''>
            <x-slot name='fromBody'>
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="mt-2 header-title text-dark float-left">Project Cancel or Return </h4>
                        {{-- <a class="btn btn-info btn-sm float-right" href=""><i class="mdi mdi-arrow-left-thick"></i> Back</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                             <div class="{{-- repeater-custom-show-hide --}} col-md-12 mb-3">
                                <div {{-- data-repeater-list="items" --}}>
                                    <div {{-- data-repeater-item="" --}} class="row">
                                        <div class="col-md-12 mb-4">
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="cancel" name="type" value="cancel" {{ $project->status == $project::CANCEL ? 'checked' : '' }} class="custom-control-input">
                                                    <label class="custom-control-label" for="cancel">Cancel</label>
                                                </div>
                                            </div>
                                            @if ($project->status == $project::DELIVERED)
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="return" name="type" value="return" {{ $project->return_at != null ? 'checked' : '' }} class="custom-control-input">
                                                    <label class="custom-control-label" for="return">Return</label>
                                                </div>
                                            </div>
                                            @endif

                                        </div>

                                        <div class="col-md-12">
                                            <x-backend.inputs.input inputName='return_amount' inputLabel='Return Amount' inputType='number' inputValue='{{ $project->return_amount }}' min='0' inputPlaceholder='Amount' inputRequired='true'/>
                                        </div>
                                        <div class="col-md-12">
                                            <x-backend.inputs.input inputName='discount_amount' inputLabel='Discount Amount' inputType='number' inputValue='{{ $project->discount }}' min='0' inputPlaceholder='Amount' inputRequired='true'/>
                                        </div>
                                        <div class="col-md-12">
                                            <x-backend.inputs.input inputName='loss_amount' inputLabel='Loss Amount' inputType='number' inputValue='{{ $project->loss }}' min='0' inputPlaceholder='Amount' inputRequired='true'/>
                                        </div>
                                    </div><!--end /div-->
                                </div><!--end repet-list-->
                            </div>                           
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to Update this Order?');" >Submit</button>
                         <button type="reset" class="btn btn-info">Reset</button>
                    </div>
                </div>
            </x-slot>
        </x-backend.from>
    </x-slot>
</x-backend.modal.create>