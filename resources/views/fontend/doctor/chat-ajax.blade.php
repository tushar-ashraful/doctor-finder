@foreach($booking->chats as $chat)
<li class="media {{ $chat->doctor != null ? 'sent' : ''}} {{ $chat->patient != null ? 'received' : ''}}  {{-- received --}} d-flex">
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
@endforeach