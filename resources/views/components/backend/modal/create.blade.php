<div class="modal fade {{$modalTarget}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog {{$modalSize ?? 'modal-lg'}}">
        <div class="modal-content">
            {{ $modalBody }}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@push('js')
	<script type="text/javascript">
        @if ($errors->all()) 
        $('.{{$modalTarget}}').modal('show'); 
        @endif
    </script>
@endpush