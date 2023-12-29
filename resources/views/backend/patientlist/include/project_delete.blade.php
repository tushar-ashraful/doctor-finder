
<x-backend.modal.create modalTarget="modal-project-delete">
    <x-slot name="modalBody">
        <x-backend.from fromAction="" fromMethod='DELETE' media='true'  formId='projectDeleteModal'>
            <x-slot name='fromBody'>
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="mt-2 header-title text-dark float-left">Project Delete Permanently</h4>
                        {{-- <a class="btn btn-info btn-sm float-right" href=""><i class="mdi mdi-arrow-left-thick"></i> Back</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div>
                                <p>Do you want to permanently delete this <b id="delete_sku">  </b> project? Then enter the number of the project and proceed.</p>
                            </div>
                            <div class="col-md-12">
                                <x-backend.inputs.input inputName='sku' inputLabel='Project Number' inputRequired='true'/>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to permanently this Order ?')">Submit</button>
                    </div>
                </div>
            </x-slot>
        </x-backend.from>
    </x-slot>
</x-backend.modal.create>
@push('js')
    <script>
       $(document).ready(function () {
            $('.order_delete').on('click',function(){
                var url = $(this).data('url')
                var sku = $(this).data('sku')
                $("#projectDeleteModal").attr('action',url);
                $("#delete_sku").text(sku)
            })
       })
   </script>
@endpush