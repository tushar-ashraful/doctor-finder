
<x-backend.modal.create modalTarget="modal-work-edit">
    <x-slot name="modalBody">
        <x-backend.from fromAction="{{ route('backend.work.update',$project->id) }}" formId='work_edit' fromMethod='PUT' media='true'  fromClass=''>
            <x-slot name='fromBody'>
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="mt-2 header-title text-dark float-left">Project Work Update assign in worker</h4>
                        {{-- <a class="btn btn-info btn-sm float-right" href=""><i class="mdi mdi-arrow-left-thick"></i> Back</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Item Name: <b></b></h5><br>
                                <input type="hidden" name="id">
                            </div>
                            <div class="col-md-12">
                                <x-backend.inputs.input inputName='user_id' inputLabel='Worker List' inputType='normal-select' inputRequired='true' >
                                <x-slot name='selectOption'>
                                    @foreach ($workers as $worker)
                                    <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                                    @endforeach
                                </x-slot>
                                </x-backend.inputs.input>
                            </div>
                            <div class="col-md-12">
                                <x-backend.inputs.input inputName='note' inputType='textarea' />
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='dateline_on' inputLabel='Work Start' inputType='date' inputRequired='true' />
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='dateline_to' inputLabel='Work End' inputType='date' inputRequired='true' />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"  onclick="return confirm('Are you sure you want to Update this Work?');">Update</button>
                        <button type="reset" class="btn btn-info">Reset</button>
                    </div>
                </div>
            </x-slot>
        </x-backend.from>
    </x-slot>
    
</x-backend.modal.create>