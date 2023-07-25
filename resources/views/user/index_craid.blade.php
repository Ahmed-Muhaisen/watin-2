@can('User.Update', Auth::user())
<a href="{{ route('admin.user.edit',$item->id) }}" class="btn btn-info "><i class="fa-solid fa-pen edit-i"></i></a>
@endcan
@can('User.delete', Auth::user())
<form action="{{ route('admin.user.destroy',$item->id) }}" method="post" class="d-inline-block">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
</form>
@endcan
