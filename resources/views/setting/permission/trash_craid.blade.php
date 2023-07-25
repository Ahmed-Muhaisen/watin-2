@can('Restaurant.restore', Auth::user())
<a href="{{ route('admin.setting.permission.restore',$item->id) }}" class="btn btn-info "><i class="fa-solid fa-trash-restore edit-i"></i></a>
@endcan
@can('Restaurant.forceDelete', Auth::user())
<form action="{{ route('admin.setting.permission.forceDelete',$item->id) }}" method="post" class="d-inline-block">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-close"></i></button>
</form>
@endcan
