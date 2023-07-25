@extends('app')
@section('title', 'Dashboard page')
@section('contint')


<div class="container card my-5 py-4">

    <div class="d-flex justify-content-between align-items-center" >


        <h2>  صلاحيات ال{{$role->name}}</h2>

        <a class="btn btn-outline-info" onclick="window.history.back()" >الرجوع للخلف</a>
    </div>



    <form enctype="multipart/form-data" class="text-right" action="
                {{ route('admin.setting.role_permission.update',$role->id) }}

            " method="post">
            @method('put')


        @csrf

                <div class="mb-4 p-4 d-flex flex-wrap">



                    @foreach ($permission as $item)
                            <div class="p-3 m-1 d-flex" style="border: 1px solid rgb(235, 167, 167) ; width: 24%;">
                                <p class="w-100 mb-0">{{ $item->name}}</p>

                                    <div class=" form-check d-flex flex-row-reverse" style="">
                                        <input type="checkbox"
                                        class="form-check-input"
                                        name="permissions[]"
                                        value="{{$item->id}}"
                                        @checked(in_array($item->id,$role->permission->pluck('id')->toArray()))
                                        >

                                    </div>

                            </div>



                @endforeach
                            </div>


        <button type="submit" class="btn btn-info w-100">حفظ</button>
</form>

</div>





@endsection
