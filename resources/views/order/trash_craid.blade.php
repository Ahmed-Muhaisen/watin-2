@can('Order.restore', Auth::user())
<a href="{{ route('admin.order.restore',[$item->id,$user->id]) }}" class="btn btn-info "><i class="fa-solid fa-trash-restore edit-i"></i></a>
@endcan
@can('Order.forceDelete', Auth::user())
<form action="{{ route('admin.order.forceDelete',[$item->id,$user->id]) }}" method="post" class="d-inline-block">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-close"></i></button>
</form>
@endcan
