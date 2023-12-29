<div class="form-group @if($errors->has($inputName)) 'has-warning' @endif ">
	<label for="{{ $inputName }}">{{ $inputLabel }}</label>
	{{-- select --}}
	@if ($inputType == 'select')

		<select class="form-control select {{ $inputName }} {{$inputClass}}" {{$selectType=='multiple' ? "multiple='multiple'" : ''}} id="{{$inputId ?? $inputName}}" name="{{$inputName}}" placeholder="{{$inputPlaceholder}}" {{ $attributes }} @if($inputRequired == 'true') required oninvalid="this.setCustomValidity('This fild is Required')" oninput="this.setCustomValidity('')" @endif>
			
			<option value="">-- Select {{ $inputLabel }} --</option>

			{{ $selectOption }}

		</select>
	@elseif($inputType == 'normal-select')
	<select class="form-control {{ $inputName }} {{$inputClass}}" {{$selectType=='multiple' ? "multiple='multiple'" : ''}} id="{{$inputId ?? $inputName}}" name="{{$inputName}}" placeholder="{{$inputPlaceholder}}" {{ $attributes }} @if($inputRequired == 'true') required oninvalid="this.setCustomValidity('This fild is Required')" oninput="this.setCustomValidity('')" @endif>
			
			<option value="">-- Select {{ $inputLabel }} --</option>

			{{ $selectOption }}

		</select>
		{{-- normal textarea --}}
	@elseif($inputType == 'textarea')

	<textarea class="form-control {{$inputClass}} " id="{{$inputId ?? $inputName}}" name="{{$inputName}}" rows="5" placeholder="{{$inputPlaceholder}}" @if($inputRequired == 'true') required oninvalid="this.setCustomValidity('This fild is Required')" oninput="this.setCustomValidity('')" @endif>{{ $inputValue ?? old($inputName) }}</textarea>
	{{-- advance textarea --}}
	@elseif($inputType == 'textarea-advance')

	<textarea class="form-control {{$inputClass}} " id="elm1" name="{{$inputName}}" @if($inputRequired == 'true') required oninvalid="this.setCustomValidity('This fild is Required')" oninput="this.setCustomValidity('')" @endif>{!! $inputValue ?? old($inputName) !!}</textarea>	

	{{-- normal inpout --}}
	@else
		<input type="{{ $inputType }}" class="form-control {{$inputName}} {{$inputClass}}" id="{{$inputId ?? $inputName}}" name="{{$inputName}}" placeholder="{{$inputPlaceholder}}" @if($inputType != 'file') value='{{ $inputValue ?? old($inputName) }}' @endif {{ $attributes }} @if($inputRequired == 'true') required oninvalid="this.setCustomValidity('This fild is Required')" oninput="this.setCustomValidity('')" @endif @if($inputType == 'tel')  pattern='(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$' @endif>
	@endif
	
	{{-- validation error --}}
	@if ($errors->has($inputName))
	<small id="emailHelp" class="form-text text-red-700 invalid-feedback">{{$errors->first($inputName)}}</small>
	@endif
</div>

