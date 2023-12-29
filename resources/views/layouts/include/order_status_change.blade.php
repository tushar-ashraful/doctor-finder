
<x-backend.modal.create modalTarget="modal-status-change">
    <x-slot name="modalBody">
        <x-backend.from fromAction="" formId='order_status_change_modal' fromMethod='POST' media='true'  >
            <x-slot name='fromBody'>
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="mt-2 header-title text-dark float-left">Project Status Change</h4>
                        @php
                            $orderStatusEnum =  new App\Models\Order();
                        @endphp
                        {{-- <a class="btn btn-info btn-sm float-right" href=""><i class="mdi mdi-arrow-left-thick"></i> Back</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="form-check-inline my-1">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="new" name="status" value="{{ $orderStatusEnum::NEWORDER }}" class="custom-control-input">
                                        <label class="custom-control-label" for="new">New</label>
                                    </div>
                                </div>
                                <div class="form-check-inline my-1">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="progress" name="status" value="{{ $orderStatusEnum::PROGRESS }}" class="custom-control-input">
                                        <label class="custom-control-label" for="progress">Progress</label>
                                    </div>
                                </div>
                                <div class="form-check-inline my-1">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="review" name="status" value="{{ $orderStatusEnum::REVIEW }}" class="custom-control-input">
                                        <label class="custom-control-label" for="review">Review</label>
                                    </div>
                                </div>
                                <div class="form-check-inline my-1">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="complete" name="status" value="{{ $orderStatusEnum::COMPLETE }}" class="custom-control-input">
                                        <label class="custom-control-label" for="complete">Complete</label>
                                    </div>
                                </div>
                                {{-- <div class="form-check-inline my-1">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="correction_upgrade" name="status" value="{{ $orderStatusEnum::CORRECTION_UPGRADE }}" class="custom-control-input">
                                        <label class="custom-control-label" for="correction_upgrade">Correction/Upgrade</label>
                                    </div>
                                </div> --}}
                                <div class="form-check-inline my-1">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="delivered" name="status" value="{{ $orderStatusEnum::DELIVERED }}" class="custom-control-input">
                                        <label class="custom-control-label" for="delivered">Delivered</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to Update this Order?');" >Update</button>
                    </div>
                </div>
            </x-slot>
        </x-backend.from>
    </x-slot>
</x-backend.modal.create>

@push('js')
   <script>
       $(document).ready(function () {
            $('.order_status_change').on('click',function(){
                var url = $(this).data('url')
                var statusValue = $(this).data('status')
                $("#order_status_change_modal").attr('action',url);
                $("#order_status_change_modal input[name='status']").each(function () {
                    if($(this).val() == statusValue){
                        $(this).attr("checked", "checked");
                    }
                })
                $('#order_status_change_modal').attr('action',url);
            })
       })
   </script>
@endpush