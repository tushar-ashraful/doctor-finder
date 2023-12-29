
<x-backend.modal.create modalTarget="modal-item-edit" modalSize='modal-xl'>
    <x-slot name="modalBody">
        <x-backend.from fromAction="{{ route('backend.project.orderItem_edit',$project->id) }}" formId='item_edit'  fromMethod='POST'  fromClass='' >
            <x-slot name='fromBody'>
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="mt-2 header-title text-dark float-left">Project Item Edit</h4>
                        {{-- <a class="btn btn-info btn-sm float-right" href=""><i class="mdi mdi-arrow-left-thick"></i> Back</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                             <div class="repeater-custom-show-hide col-md-12 mb-3">
                                <div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <x-backend.inputs.input inputName='item' inputType='normal-select' inputRequired='true' >
                                                <x-slot name='selectOption'>
                                                    @foreach ($items as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </x-slot>
                                            </x-backend.inputs.input>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="hidden" name="id">
                                            <x-backend.inputs.input inputName='description'/>
                                        </div>
                                        <div class="col-md-2">
                                            <x-backend.inputs.input inputName='is_urgent' inputType='date' inputLabel='Urgent Date'/>
                                        </div>
                                        <div class="col-md-1">
                                            <x-backend.inputs.input inputName='qty' inputType='number' inputValue='1' min='1' inputPlaceholder='QTY'  inputRequired='true'   />
                                        </div>
                                        <div class="col-md-2">
                                            <x-backend.inputs.input inputName='price' inputType='number' inputValue='0' min='0' inputPlaceholder='Price' inputRequired='true'  />
                                        </div>
                                        <div class="col-md-2">
                                            <x-backend.inputs.input inputName='total' inputType='number' inputValue='0' min='0' inputClass='item_total' inputPlaceholder='Total Price'  readonly="readonly" />
                                        </div>
                                    </div><!--end /div-->
                                </div><!--end repet-list-->
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
    {{-- <script>

      $(document).ready(function () {
        // project item jquery  
        $(document).on("blur click change", ".price, .qty", function () {

            // item total ( qty * price)
            var row = $(this).closest(".row");
            var item_total =  row.find(".qty").val() * row.find(".price").val();
            row.find('.item_total').val(item_total)
           
            // total
            var item_total_amount = 0 
            $(".item_total").each(function() {  
                item_total_amount += +$(this).val();
            });
            $('#total_amount').val(item_total_amount);

        });

        $(document).on("blur click change", "#total_amount", function () {
            // total
            var item_total_amount = 0 

            $(".item_total").each(function() {  
                item_total_amount += +$(this).val();
            });

            $('#total_amount').val(item_total_amount);            
        });
    })
</script> --}}


@endpush
</x-backend.modal.create>