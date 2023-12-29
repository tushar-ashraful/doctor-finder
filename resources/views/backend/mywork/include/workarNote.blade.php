<x-backend.modal.create modalTarget="modal-worker-note">
    <x-slot name="modalBody">
        <x-backend.from fromAction="" formId='worker_note_form' fromMethod='PUT'  fromClass=''>
            <x-slot name='fromBody'>
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="mt-2 header-title text-dark float-left">Project Work Update assign in worker</h4>
                        {{-- <a class="btn btn-info btn-sm float-right" href=""><i class="mdi mdi-arrow-left-thick"></i> Back</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="project_code">Project Code: <b></b></h5><br>
                                <h5 class="itme_name">Item Name: <b></b></h5><br>
                            </div>
                            <div class="col-md-12">
                                <x-backend.inputs.input inputName='note' inputType='textarea' />
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
@push('js')
{{-- work item edit script --}}
<script>
    $(document).ready(function(){
         
        $('.worker-note').on('click',function(){
            var value = $(this).data('work');
            var url = $(this).data('workernoteformurl');
            console.log(url)
            $('#worker_note_form').attr('action',url);
            $('#worker_note_form').find('.project_code b').text(value.order.sku);
            $('#worker_note_form').find('.itme_name b').text(value.order_item.item.name);
            $('#worker_note_form').find('textarea[name="note"]').val(value.worker_note);

        });
    });
</script>
@endpush