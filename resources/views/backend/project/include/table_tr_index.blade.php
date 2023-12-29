<tr>
    <td >{{ ++$key }}</td>
    <td>
        <span title="Description: {{ $order->description}}">{{  $order->sku }} </span>
        <br><span title="{{  $order->title }}">{{ str_limit( $order->title, 30 ) }}</span>
        <br><span title="Create Date">{{ myDateTime($order->created_at,true) }}</span>
        <br><span title="Delivery Date">{{ myDateTime($order->delivery,true) }}</span>
    </td>
    <td>{{ $order->name }}
        <br>{{ $order->email }}
        <br>{{ $order->university->name  ?? 'Unknown'}}
    </td>
    <td>{{ $order->phone }}</td>
    <td>
        <small class="float-right ml-2 pt-1 font-10">{{ $progress }}%</small>
        <div class="progress mt-2" style="height:5px;">
            <div class="progress-bar {{ $progress == 100 ? 'bg-success' : 'bg-danger' }}" role="progressbar" style="width: {{$progress}}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="{{ $progress }}"></div>
        </div>

        <details class='mt-2 mb-2'>
            <summary>Order Item status</summary>
            @foreach ($order->orderItems as $item)
            {{ $item->item->name }}: <span class="badge  {{ $item->completed_at ? 'bg-success' : 'bg-warning' }}">{{ $item->completed_at ? 'Complete' : 'Processing' }}</span><br>
            @endforeach
        </details>
        
        <span title="Order Status: {{ $order->statusType(true) }}">Order Status: {{ $order->statusType() }}</span>
    </td>
    
    
    @if (auth()->user()->role_id <= 2)
    <td>
        <details>
            <summary>Payment Info</summary>
            Sub Total: {{ tkFormat($order->subTotal()) }}
            @if ($order->additional_fees)
            <br>Fee: {{ tkFormat($order->additional_fees) }}
            @endif
            @if ($order->discount)
            <br>Discount: {{ tkFormat($order->discount) }}
            @endif
            <br>Total: {{ tkFormat($order->total()) }}
            <br>Paid: {{ tkFormat($order->paid()) }}
            @if ($order->due())
            <br>Due: {{ tkFormat($order->due()) }}
            @endif
            @if ($order->return_amount)
            <br>Return: {{ tkFormat($order->return_amount) }}
            @endif
            @if ($order->loss)
            <br>Unsettled: {{ tkFormat($order->loss) }}
            @endif
        </details>
    </td>
    @endif
    <td>
        <details>
            <summary>Note</summary>
            {!! str_replace(PHP_EOL,'<br/>', $order->note)  !!}
        </details>
    </td>
    <td>
        <a href="{{ route('backend.project.show',$order->id) }}"><i class="far fa-eye text-info mr-1 mt-1 font-16" title="View"></i></a>
        <a href="{{ route('backend.project.invoice',$order->id) }}"><i class="fas fa-print text-info mr-1 mt-1 font-16" title="Invoice Print"></i></a>
        <a href="{{ route('backend.project.edit',$order->id) }}"><i class="far fa-edit text-info mr-1 mt-1 font-16" title="Edit"></i></a>
        <a href="{{ route('backend.work.show',$order->id) }}"><i class="fas fa-tasks text-info mr-1 mt-1 font-16" title="Task"></i></a>
        <a href="#" class='order_note' @if (auth()->user()->role_id == 1) data-note='{{ $order->note }}' @endif data-url="{{ route('backend.project.note',$order->id) }}" data-toggle="modal" data-animation="bounce" data-target=".modal-project-notice"><i class="far fa-clipboard mr-1 mt-1 font-16" title="Note"></i></a>
        <a href="#"  class='order_status_change' data-status='{{ $order->status }}'  data-url="{{ route('backend.project.status_change',$order->id) }}" data-toggle="modal" data-animation="bounce" data-target=".modal-status-change"><i class="fas fa-sync-alt text-info mr-1 mt-1 font-16" title="Status"></i></a>
        <a href="#" class="order_delete" title="Delete" data-sku="{{ $order->sku }}" data-url="{{ route('backend.project.destroy',$order->id) }}" data-toggle="modal" data-animation="bounce" data-target=".modal-project-delete" onclick="return confirm('Do you want to permanently delete this project ?');"><i class="far fa-trash-alt text-danger mt-1 font-16"></i></a>
    </td>
</tr>