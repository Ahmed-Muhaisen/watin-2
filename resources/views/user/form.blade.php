@extends('header')
@section('header_contint')

<div class="container card my-5 py-4">

    <div class="d-flex justify-content-between align-items-center">

        @if($page=='Create')
        <h2> إضافة مستخدم جديد</h2>
        @else
        <h2> تعديل بيانات المستخدم</h2>
        @endif
        <a class="btn btn-outline-info" onclick="window.history.back()">الرجوع للخلف</a>
    </div>



    <form enctype="multipart/form-data" class="text-right" action="@if($page=='Create')
                {{ route('admin.user.store') }}
            @else
                {{ route('admin.user.update',$user->id) }}
            @endif
            " method="post">
        @if($page=='Edit')
        @method('put')
        @endif

        @csrf
        <x-input title="الإسم" type="text" name="name" value="{{$user->name}}" />

        <x-input title="الإيميل" type="email" name="email" value="{{$user->email}}" />

        <x-input title="الهاتف" type="number" name="phone" value="{{$user->phone}}" />

        <x-input title="المنطقة" type="text" name="address" value="{{$user->address}}" />

        <x-input title="كلمة المرور" type="password" name="password" value="" />


        <x-select title="الصلاحية" name="role_id" :array="json_decode(json_encode(
            [['id'=>1,'name'=>'مستخدم'],
            ['id'=>2,'name' =>'أدمن']]))" value="{{$user->type}}" />

        <label for="email_verified">
            <input type="checkbox" name="email_verified_at" id="email_verified"
                @if(old('email_verified_at',$user->email_verified_at)) checked @endif class="@error('email_verified_at')
            is-invaled @enderror">
            توثيق الإيميل
        </label>
        @error('email_verified_at')
        <p class="text-danger">{{$message}}</p>
        @enderror



        <button type="submit" class="btn btn-info w-100">حفظ</button>
    </form>

</div>





@endsection
