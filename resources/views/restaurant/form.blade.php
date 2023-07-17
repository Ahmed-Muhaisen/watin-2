@extends('header')
@section('header_contint')

<div class="container card my-5 py-4">

    <div class="d-flex justify-content-between align-items-center" >

    @if($page=='Create')
        <h2> إضافة مطعم جديد</h2>
    @else
        <h2> تعديل بيانات المطعم</h2>
    @endif
        <a class="btn btn-outline-info" onclick="window.history.back()" >الرجوع للخلف</a>
    </div>



    <form enctype="multipart/form-data" class="text-right" action="@if($page=='Create')
                {{ route('admin.Restaurant.store') }}
            @else
                {{ route('admin.Restaurant.update',$restaurant->id) }}
            @endif
            " method="post">
        @if($page=='Edit')
            @method('put')
        @endif

        @csrf

        <x-input title="إسم المطعم" type="text" name="name" value="{{$restaurant->name}}"/>

       <x-select title="الأدمن" name="user_id" :array="$users" value="{{$restaurant->user2->id}}"/>

        <x-input title="رقم الهاتف" type="number" name="phone" value="{{$restaurant->phone}}"/>

        <x-input title="إضافة صورة" type="file" name="image" value="{{$restaurant->image}}" folder="restaurant_image"/>

        <x-input title="العنوان" type="text" name="address" value="{{$restaurant->address}}"/>




        <button type="submit" class="btn btn-info w-100">حفظ</button>
</form>

</div>





@endsection
