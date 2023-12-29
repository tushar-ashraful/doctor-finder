<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Deshboard</a></li> --}}
                    {{$prepend ?? ''}} {{-- // page list in slot --}}

                    @if($titleGenerate == "true")
                    @foreach($titelItems as $item)
                    <li class="breadcrumb-item {{$item['action']!='#' ?'active' : ''}}"><a href="{{ $item['action']!='#' ? $item['url'] : '#' }}">{{$item['name']}}</a></li>
                    @endforeach 
                    @endif

                    {{$slot}} 

                    {{$append ?? ''}} {{-- // page list slot --}}
                </ol>
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
        <!--end page-title-box-->
    </div>
    <!--end col-->
</div>
<!--end row-->
