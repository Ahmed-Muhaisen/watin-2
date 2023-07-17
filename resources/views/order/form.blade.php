@extends('header')
@section('header_contint')

<div class="container card my-5 py-4">

    <div class="d-flex justify-content-between align-items-center" >

    @if($page=='Create')
        <h2> إضافة طلب جديد</h2>
    @else
        <h2> تعديل بيانات الطلب</h2>
    @endif
        <a class="btn btn-outline-info" onclick="window.history.back()" >الرجوع للخلف</a>
    </div>



    <form enctype="multipart/form-data" class="text-right" action="@if($page=='Create')
                {{ route('admin.order.store') }}
            @else
                {{ route('admin.order.update',$product->id) }}
            @endif
            " method="post">
        @if($page=='Edit')
            @method('put')
        @endif

        @csrf

                <x-select title="إختر الزبون" name="user_id" :array="$users" value="{{$user_id}}"/>

                    <x-select title="إختر الوجبة" name="product_id" :array="$products" value="{{$product->id}}"/>




        <button type="submit" class="btn btn-info w-100">حفظ</button>
</form>

</div>





@endsection
