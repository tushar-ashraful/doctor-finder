@extends('fontend.patient.layouts.patient')
@push('css')
<style>
    .chat-scroll {
    min-height: 300px;
    max-height: calc(100vh - 274px);
    overflow-y: auto;
}
</style>
@section('patient')
<div class="col-lg-8 chat-cont-right">
    <div class="chat-header">
        <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
            <i class="material-icons">chevron_left</i>
        </a>
        <div class="media d-flex">
            <div class="media-img-wrap flex-shrink-0">
                <div class="avatar avatar-online">
                    <img src="{{ $booking->doctor->image() }}" alt="User Image" class="avatar-img rounded-circle" />
                </div>
            </div>
            <div class="media-body flex-grow-1">
                <div class="user-name">{{ $booking->doctor->name }}</div>
                {{-- <div class="user-status">online</div> --}}
            </div>
        </div>
        {{-- <div class="chat-options">
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#voice_call">
                <i class="material-icons">local_phone</i>
            </a>
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#video_call">
                <i class="material-icons">videocam</i>
            </a>
            <a href="javascript:void(0)">
                <i class="material-icons">more_vert</i>
            </a>
        </div> --}}
    </div>
    <div class="chat-body" id="chat-body-ajax">
        <div class="chat-scroll">
            <ul class="list-unstyled">
                @foreach($booking->chats as $chat)
                <li class="media {{ $chat->patient != null ? 'sent' : ''}} {{ $chat->doctor != null ? 'received' : ''}}  {{-- received --}} d-flex">
                    <div class="media-body flex-grow-1">
                        <div class="msg-box">
                            <div>
                                <p>{{$chat->patient ?? $chat->doctor}}</p>
                                <ul class="chat-msg-info">
                                    <li>
                                        <div class="chat-time">
                                            <span>{{ date('d F Y  h:i a', strtotime($chat->created_at))}}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                
                {{-- <li class="media received d-flex">
                    <div class="media-body flex-grow-1">
                        <div class="msg-box">
                            <div>
                                <p>You wait for notice.</p>
                                <p>Consectetuorem ipsum dolor sit?</p>
                                <p>Ok?</p>
                                <ul class="chat-msg-info">
                                    <li>
                                        <div class="chat-time">
                                            <span>8:55 PM</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li> --}}
                @endforeach
                
            </ul>
        </div>
    </div>
    <div class="chat-footer">
        <form id="chat-form" action="{{ route('website.patient.chat.submit',$booking->id) }}" method="post">
            @csrf
            <div class="input-group">
                <input  type="text" id="chat_input" class="input-msg-send form-control" name="chat" placeholder="Type something" />
                {{-- <button type="button" class="btn msg-send-btn ms-2"><i class="fa fa-paperclip"></i></button> --}}
                <button type="submit" class="btn msg-send-btn ms-2"><i class="fab fa-telegram-plane"></i></button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
      setInterval(function(){ 
            chat_ajax();
        }, 1000);
  //home page add to cart
  $("#chat-form").on("submit", function(e){
          e.preventDefault();
        var form=$(this);
        var url=form.attr('action');
        var type=form.attr('method');
        var fromdata=form.serializeArray();
        
        $.ajax({
          url:url,
          data:fromdata,
          type:type,
          dataType:'json',
          beforeSend:function(){
          },
          success:function(data){
            $('#chat_input').val('');
            chat_ajax();
            }
          
        });

    });


   function chat_ajax(){
        var url='{{ route('website.patient.chat.ajax',$booking->id) }}';
        $.ajax({
          url:url,
          type:'GET',
          dataType:'html',
          success:function(data){
            $('.list-unstyled').html(data);
          }
        });
      }


    })
</script>
@endpush