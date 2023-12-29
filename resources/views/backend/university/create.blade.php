@push('css')
<link href="{{ asset('contents/backend') }}/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endpush
<x-backend.modal.create modalTarget="modal-create">
    <x-slot name="modalBody">
        <x-backend.from fromAction="{{ route('backend.university.store') }}" fromMethod='POST' media='true'  fromClass=''>
            <x-slot name='fromBody'>
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="mt-2 header-title text-dark float-left">Create University</h4>
                        {{-- <a class="btn btn-info btn-sm float-right" href=""><i class="mdi mdi-arrow-left-thick"></i> Back</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='name' inputRequired='true'/>
                            </div>
                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='phone' inputRequired='true'/>
                            </div>
                            <div class="col-md-12">
                                <x-backend.inputs.input inputName='location' inputRequired='true'/>
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
    @push('js')
    {{-- <script src="{{ asset('contents/backend') }}/assets/plugins/select2/select2.min.js"></script>
    <script>
        $(".select").select2({
                // placeholder: "Select a state",
                width: "100%",
                // allowClear: true,
            });
    </script> --}}
    @endpush
</x-backend.modal.create>