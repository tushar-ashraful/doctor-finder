
<x-backend.modal.create modalTarget="modal-project-notice">
    <x-slot name="modalBody">
        <x-backend.from fromAction="" fromMethod='POST' media='true'  formId='projectNote'>
            <x-slot name='fromBody'>
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="mt-2 header-title text-dark float-left">Project Note</h4>
                        {{-- <a class="btn btn-info btn-sm float-right" href=""><i class="mdi mdi-arrow-left-thick"></i> Back</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <x-backend.inputs.input inputName='note' inputType='textarea' inputLabel='Project Note'/>
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
@push('js')
    <script>
    $(document).ready(function(){
        $('.order_note').on('click', function(){
            var url = $(this).data('url');
            var note = $(this).data('note');
            $('#projectNote').attr('action',url)
            $('#projectNote').find('textarea[name="note"]').val(note);
            console.log(note)
        })
    });
</script>
@endpush