@extends('header')
@section('header_contint')

<div class="container card my-5 py-4">

    <div class="d-flex justify-content-between align-items-center">

        @if($page=='Create')
        <h2> إضافة أدمن جديد</h2>
        @else
        <h2> تعديل بيانات الأدمن</h2>
        @endif
        <a class="btn btn-outline-info" onclick="window.history.back()">الرجوع للخلف</a>
    </div>



    <form enctype="multipart/form-data" class="text-right" action="@if($page=='Create')
                {{ route('admin.setting.role.store') }}
            @else
                {{ route('admin.setting.role.update',$role->id) }}
            @endif
            " method="post">
        @if($page=='Edit')
        @method('put')
        @endif

        @csrf

        <x-input title="إسم الأدمن" type="text" name="name" value="{{$role->name}}" />


            <button type="submit" class="btn btn-info w-100">حفظ</button>

         </form>

</div>





@endsection
