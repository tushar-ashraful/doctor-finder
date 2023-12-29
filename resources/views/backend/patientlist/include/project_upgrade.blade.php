
<x-backend.modal.create modalTarget="modal-project-upgrade" modalSize='modal-xl'>
    <x-slot name="modalBody">
        <x-backend.from fromAction="{{ route('backend.project.project_upgrade',$project->id) }}" fromMethod='POST' media='true'  fromClass=''>
            <x-slot name='fromBody'>
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="mt-2 header-title text-dark float-left">Project Item Upgrade</h4>
                        {{-- <a class="btn btn-info btn-sm float-right" href=""><i class="mdi mdi-arrow-left-thick"></i> Back</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                             <div class="{{-- repeater-custom-show-hide --}} col-md-12 mb-3">
                                <div {{-- data-repeater-list="items" --}}>
                                    <div {{-- data-repeater-item="" --}} class="row">
                                        <div class="col-md-12 mb-4">
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="new_item" name="type" value="new" checked class="custom-control-input">
                                                    <label class="custom-control-label" for="new_item">New</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="upgrade" name="type" value="upgrade" class="custom-control-input">
                                                    <label class="custom-control-label" for="upgrade">Upgrade</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="correction" name="type" value="correction" class="custom-control-input">
                                                    <label class="custom-control-label" for="correction">Correction</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <x-backend.inputs.input inputName='item' inputType='normal-select' inputRequired='true' >
                                                <x-slot name='selectOption'>
                                                    @foreach ($items as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </x-slot>
                                            </x-backend.inputs.input>
                                        </div>
                                        <div class="col-md-3">
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
                                        {{-- <div class="col-md-1">
                                            <span data-repeater-delete="" class="btn btn-danger btn-sm mt-4">
                                                <span class="fas fa-times"></span>
                                            </span>
                                        </div><!--end col--> --}}
                                    </div><!--end /div-->
                                </div><!--end repet-list-->
                                {{-- <div class="form-group mb-0 row">
                                    <div class="col-sm-12">
                                        <span data-repeater-create="" class="btn btn-secondary">
                                            <span class="fas fa-plus"></span> Add
                                        </span>
                                    </div><!--end col-->
                                </div><!--end row-->     --}}

                            </div>
                            {{-- <div class="col-md-12 mb-4 align-self-center">
                                <div class="custom-control custom-switch switch-secondary">
                                    <input type="checkbox" class="custom-control-input"  name='' id="workSwitch">
                                    <label class="custom-control-label" for="workSwitch">Do you want to assign work from here?</label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="form-check-inline my-1">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="upgrade" name="type" value="upgrade" checked class="custom-control-input">
                                        <label class="custom-control-label" for="upgrade">Upgrade</label>
                                    </div>
                                </div>
                                <div class="form-check-inline my-1">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="correction" name="type" value="correction" class="custom-control-input">
                                        <label class="custom-control-label" for="correction">Correction</label>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-md-6">
                                <x-backend.inputs.input inputName='total' inputValue='0' inputId='total_amount' inputType='number' readonly="readonly" />
                            </div>  
                            <div class="col-md-6 align-self-center">
                                <div class="custom-control custom-switch switch-danger ">
                                    <input type="checkbox" class="custom-control-input"  name='delivery_time_change' id="customSwitchDanger">
                                    <label class="custom-control-label" for="customSwitchDanger">Want to change the delivery time ??</label>
                                </div>
                            </div>
                            <div class="col-md-3" id="delivery_calender">
                                <x-backend.inputs.input inputName='delivery' inputType='date' inputRequired='true' inputValue='{{ inputCalander($project->delivery) }}'/>
                            </div>
                            <div class="col-md-12">
                                <h4>This Work Assign in Worker</h4>
                                <hr>
                            </div>
                            <div class="col-md-4">
                                <x-backend.inputs.input inputName='worker' inputLabel='Worker Lists' inputType='normal-select'  >
                                    <x-slot name='selectOption'>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </x-slot>
                                </x-backend.inputs.input>
                            </div>
                            <div class="col-md-4">
                                <x-backend.inputs.input inputName='dateline_on' inputLabel='Work Start' inputType='date'  />
                            </div>
                            <div class="col-md-4">
                                <x-backend.inputs.input inputName='dateline_to' inputLabel='Work End' inputType='date'  />
                            </div>
                            <div class="col-md-12">
                                <x-backend.inputs.input inputName='note' inputType='textarea' />
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
    <script>

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
</script>

{{-- delivary change script  --}}
<script>
    $(document).ready(function () {
        $('#delivery_calender').hide("slow");
        $('input[name="delivery"]').attr('disabled','disabled');

        $('input[name="delivery_time_change"]').on('click',function() {

            if ($('input[name="delivery_time_change"]').is(":checked"))
            {
                $('#delivery_calender').show("slow");
                $('input[name="delivery"]').removeAttr('disabled');
            }else{
                $('#delivery_calender').hide("slow");
                $('input[name="delivery"]').attr('disabled','disabled');
            }

        });

    })
</script>

<script>
     $(document).ready(function () {

        $('#correction').on('change',function(){
            $('select[name="item"]').html('<option value="">-- Select Item --</option>@foreach ($project->orderItems as $item)<option value="{{ $item->item->id }}" data-user="{{ $item->work->user_id ?? ''}}">{{ $item->item->name }} {{ $item->correction_at != null ? "-- correction" : ""  }} {{ $item->upgrade_at != null ? "-- upgrade" : "" }} </option>@endforeach')
            $('select[name="worker"] option').each(function(){
                $(this).removeAttr("selected");
            })
            $('input[name="dateline_on"]').removeAttr('required');
            $('input[name="dateline_to"]').removeAttr('required');
        })
        $('#upgrade, #new_item').on('change',function(){
           $('select[name="item"]').html('<option value="">-- Select Item --</option>@foreach ($items as $item)<option value="{{ $item->id }}">{{ $item->name }}</option>@endforeach')
            $('select[name="worker"] option').each(function(){
                $(this).removeAttr("selected");
            })
            $('input[name="dateline_on"]').removeAttr('required');
            $('input[name="dateline_to"]').removeAttr('required');
        })

        $('select[name="item"]').on('change',function() {

            $('input[name="dateline_on"]').removeAttr('required');
            $('input[name="dateline_to"]').removeAttr('required');

            var user_id = $(this).find(':selected').data('user')

            $('select[name="worker"] option').each(function(){
                var selectValue = $(this).val();
                $(this).removeAttr("selected");
                if (selectValue == user_id) {
                    $('select[name="worker"] [value="' + user_id + '"]').attr("selected", "selected");
                    if (selectValue != '') {
                       $('input[name="dateline_on"]').attr('required','required');
                       $('input[name="dateline_to"]').attr('required','required');
                    }
                   
                }
            })  

        })

        $('select[name="worker"]').on('change',function() {
            if($(this).val() != ''){
                $('input[name="dateline_on"]').attr('required','required');
                $('input[name="dateline_to"]').attr('required','required');
            }else{
                $('input[name="dateline_on"]').removeAttr('required');
                $('input[name="dateline_to"]').removeAttr('required');
            }
        })

     })
</script>
    @endpush
</x-backend.modal.create>