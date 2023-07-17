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
                {{ route('admin.product.store') }}
            @else
                {{ route('admin.product.update',$product->id) }}
            @endif
            " method="post">
        @if($page=='Edit')
            @method('put')
        @endif

        @csrf


        <x-input title="إسم الوجبة" type="text" name="name" value="{{$product->name}}"/>


            <x-input title="السعر" type="number" name="price" value="{{$product->price}}"/>

            <x-input title="إضافة صورة" type="file" name="image" value="{{$product->image}}" folder="product_image"/>

                <x-select title="إختر القسم" name="category_id" :array="$category" value="{{$product->category->id}}"/>

                    <x-select title="إختر المطعم" name="restaurant_id" :array="$restaurant" value="{{$product->restaurant->id}}"/>




        <button type="submit" class="btn btn-info w-100">حفظ</button>
</form>

</div>





@endsection
