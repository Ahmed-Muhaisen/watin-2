@can('Product.restore', Auth::user())
<a href="{{ route('admin.role_user.restore',$item->id) }}" class="btn btn-info "><i class="fa-solid fa-trash-restore edit-i"></i></a>
@endcan
@can('Product.forceDelete', Auth::user())
<form action="{{ route('admin.role_user.forceDelete',$item->id) }}" method="post" class="d-inline-block">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-close"></i></button>
</form>
@endcan
