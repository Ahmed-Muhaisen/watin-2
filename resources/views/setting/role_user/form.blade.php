@extends('app')
@section('title', 'Dashboard page')
@section('contint')


<div class="container card my-5 py-4">

    <div class="d-flex justify-content-between align-items-center" >


        <h2>  صلاحيات ال{{$user->name}}</h2>

        <a class="btn btn-outline-info" onclick="window.history.back()" >الرجوع للخلف</a>
    </div>



    <form enctype="multipart/form-data" class="text-right" action="
                {{ route('admin.setting.role_user.update',$user->id) }}

            " method="post">
            @method('put')


        @csrf

        <x-select title="نوع الأدمن" name="role_id" :array="$role" value="{{$role_id}}"/>


        <button type="submit" class="btn btn-info w-100">حفظ</button>
</form>

</div>





@endsection
