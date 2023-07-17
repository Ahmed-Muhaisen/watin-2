<a href="{{ route('admin.order.edit_order',[$item->id,$user->id]) }}" class="btn btn-info "><i class="fa-solid fa-pen edit-i"></i></a>
<form action="{{ route('admin.order.destroy_order',[$item->id,$user->id]) }}" method="post" class="d-inline-block">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
</form>
