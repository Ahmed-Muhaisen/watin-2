@extends('header')
@section('header_contint')

<div class="container card my-5 py-4">

    <div class="d-flex justify-content-between align-items-center" >

    @if($page=='Create')
        <h2> إضافة قسم جديد</h2>
    @else
        <h2> تعديل بيانات القسم</h2>
    @endif
        <a class="btn btn-outline-info" onclick="window.history.back()" >الرجوع للخلف</a>
    </div>



    <form enctype="multipart/form-data" class="text-right" action="@if($page=='Create')
                {{ route('admin.category.store') }}
            @else
                {{ route('admin.category.update',$category->id) }}
            @endif
            " method="post">
        @if($page=='Edit')
            @method('put')
        @endif

        @csrf

        <x-input title="إسم القسم" type="text" name="name" value="{{$category->name}}"/>





        <button type="submit" class="btn btn-info w-100">حفظ</button>
</form>

</div>





@endsection
