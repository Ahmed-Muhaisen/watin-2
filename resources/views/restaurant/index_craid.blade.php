@can('Restaurant.Update', Auth::user())
<a href="{{ route('admin.Restaurant.edit',$item->id) }}" class="btn btn-info "><i class="fa-solid fa-pen edit-i"></i></a>
@endcan
@can('Restaurant.delete', Auth::user())
<form action="{{ route('admin.Restaurant.destroy',$item->id) }}" method="post" class="d-inline-block">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
</form>
@endcan
