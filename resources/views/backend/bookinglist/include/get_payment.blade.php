
<x-backend.modal.create modalTarget="modal-get-payment">
    <x-slot name="modalBody">
        <x-backend.from fromAction="{{ route('backend.project.installment_pay',$project->id) }}" fromMethod='POST' media='true'  fromClass=''>
            <x-slot name='fromBody'>
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="mt-2 header-title text-dark float-left">Get Payment</h4>
                        {{-- <a class="btn btn-info btn-sm float-right" href=""><i class="mdi mdi-arrow-left-thick"></i> Back</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='name' inputRequired='true'/>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='phone' inputRequired='true' inputType='tel'/>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='amount' inputType='number' inputRequired='true'/>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='method' inputType='normal-select' inputRequired='true'>
                                    <x-slot name='selectOption'>
                                        <option value="{{ $method::CASH }}">Cash</option>
                                        <option value="{{ $method::BKASH }}">Bkash</option>
                                        <option value="{{ $method::NAGAD }}">Nagad</option>
                                        <option value="{{ $method::ROCKET }}">Rocket</option>
                                        <option value="{{ $method::BANK }}">Bank</option>
                                        <option value="{{ $method::OTHERS }}">Others</option>
                                    </x-slot>
                                </x-backend.inputs.input>
                            </div> 
                            <div class="col-md-12">
                                <x-backend.inputs.input inputName='note' inputLabel='Payment Note'/>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </x-slot>
        </x-backend.from>
    </x-slot>
    
</x-backend.modal.create>