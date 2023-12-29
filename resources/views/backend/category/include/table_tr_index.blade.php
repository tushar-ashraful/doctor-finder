<tr>
    <td>{{ $category->code }}</td>
   
    <td>{{ $category->name }}</td>
    <td>
        {{-- <a href="{{ route('backend.project.show',$order->id) }}"><i class="far fa-eye text-info mr-1 mt-1 font-16" title="View"></i></a> --}}
        {{-- <a href="{{ route('backend.project.invoice',$order->id) }}"><i class="fas fa-print text-info mr-1 mt-1 font-16" title="Invoice Print"></i></a> --}}
        <a href="{{ route('backend.category.edit',$category->id) }}"><i class="far fa-edit text-info mr-1 mt-1 font-16" title="Edit"></i></a>
        {{-- <a href="{{ route('backend.work.show',$order->id) }}"><i class="fas fa-tasks text-info mr-1 mt-1 font-16" title="Task"></i></a> --}}
        <a href="{{ route('backend.category.delete',$category->id) }}" class="order_delete" title="Delete" {{-- data-sku="{{ $order->sku }}" data-url="{{ route('backend.project.destroy',$order->id) }}" --}} {{-- data-toggle="modal" data-animation="bounce" data-target=".modal-project-delete"  --}} onclick="return confirm('Do you want to permanently delete this project ?');"><i class="far fa-trash-alt text-danger mt-1 font-16"></i></a>
    </td>
</tr>