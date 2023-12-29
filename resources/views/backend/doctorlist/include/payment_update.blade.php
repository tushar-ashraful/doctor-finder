@push('css')
    <style>
        .opacity_1{
            opacity: 0;
        }
        .hover-column-paymentInstallment:hover .opacity_1{
            opacity: 1;
        }
    </style>
@endpush
<x-backend.modal.create modalTarget="modal-payment-update">
    <x-slot name="modalBody">
        <x-backend.from fromAction="{{ route('backend.project.payment_update',$project->id) }}" formId='payment-update' fromMethod='POST' media='true'  fromClass=''>
            <x-slot name='fromBody'>
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="mt-2 header-title text-dark float-left">Payment Update</h4>
                        {{-- <a class="btn btn-info btn-sm float-right" href=""><i class="mdi mdi-arrow-left-thick"></i> Back</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="id">
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
                        <button type="submit" onclick="return confirm('Are you sure you want to Update this Payment?');"  class="btn btn-primary">Update</button>
                    </div>
                </div>
            </x-slot>
        </x-backend.from>
    </x-slot>
    
</x-backend.modal.create>
@push('js')
<script>
    $(document).ready(function(){
        $('.payment-update').on('click',function(){
            var value = $(this).data('payment');

            $('#payment-update').find('input[name="id"]').val(value.id);
            $('#payment-update').find('input[name="name"]').val(value.name);
            $('#payment-update').find('input[name="phone"]').val(value.phone);
            $('#payment-update').find('input[name="amount"]').val(value.amount);
            $('#payment-update').find('input[name="note"]').val(value.note);

            $('#payment-update').find('select[name="method"] option').each(function(){

                var selectValue = $(this).val();
                $(this).removeAttr("selected");
                console.log(value.method)
                if (selectValue == value.method) {
                    $('#payment-update').find('select [value="' + value.method + '"]').attr("selected", "selected");
                }

            })

        });
    });
</script>
@endpush