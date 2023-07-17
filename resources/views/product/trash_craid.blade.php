<a href="{{ route('admin.product.restore',$item->id) }}" class="btn btn-info "><i class="fa-solid fa-trash-restore edit-i"></i></a>
<form action="{{ route('admin.product.forceDelete',$item->id) }}" method="post" class="d-inline-block">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-close"></i></button>
</form>
