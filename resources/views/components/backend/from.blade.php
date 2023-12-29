<form class="{{$fromClass}} form-parsley" id="{{ $formId }}" action="{{$fromAction}}" method="{{$fromMethod}}" @if($media) enctype='multipart/form-data' @endif  {{ $attributes }}>
	@csrf
	@if ($bladeMethod !=null)
		@method($bladeMethod)
	@endif

	{{ $fromBody }}	
	
</form>
@push('js-link') 
<script src="{{ asset('contents/backend') }}/assets/plugins/parsleyjs/parsley.min.js"></script>
<script src="{{ asset('contents/backend') }}/assets/pages/jquery.validation.init.js"></script> 
@endpush 