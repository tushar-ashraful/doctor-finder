
<x-backend.modal.create modalTarget="modal-work-create">
    <x-slot name="modalBody">
        <x-backend.from fromAction="{{ route('backend.work.store',['order' => encrypt($project->id) ]) }}" fromMethod='POST' media='true'  fromClass=''>
            <x-slot name='fromBody'>
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="mt-2 header-title text-dark float-left">Project Work assign in worker</h4>
                        {{-- <a class="btn btn-info btn-sm float-right" href=""><i class="mdi mdi-arrow-left-thick"></i> Back</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='item' inputLabel='Items List' inputType='normal-select' inputRequired='true' >
                                <x-slot name='selectOption'>
                                   @foreach ($project->orderItems->whereNull('assign_at') as $item)
                                    <option value="{{ $item->id }}">{{ $item->item->name }}</option>
                                    @endforeach
                                </x-slot>
                                </x-backend.inputs.input>
                            </div>
                            <div class="col-md-6">
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-info">Reset</button>
                    </div>
                </div>
            </x-slot>
        </x-backend.from>
    </x-slot>
    
</x-backend.modal.create>