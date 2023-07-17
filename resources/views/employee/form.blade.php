@extends('header')
@section('header_contint')

<div class="container card my-5 py-4">

    <div class="d-flex justify-content-between align-items-center">

        @if($page=='Create')
        <h2> إضافة موظف جديد</h2>
        @else
        <h2> تعديل بيانات الموظف</h2>
        @endif
        <a class="btn btn-outline-info" onclick="window.history.back()">الرجوع للخلف</a>
    </div>



    <form enctype="multipart/form-data" class="text-right" action="@if($page=='Create')
                {{ route('admin.employee.store') }}
            @else
                {{ route('admin.employee.update',$employee->id) }}
            @endif
            " method="post">
        @if($page=='Edit')
        @method('put')
        @endif

        @csrf

            <x-select title="الأدمن" name="user" :array="$employees" value="{{$employee->id}}"/>

                <x-select title="المطعم" name="restaurant_id" :array="$restaurants" value="{{$employee->restaurant_id}}"/>

        <button type="submit" class="btn btn-info w-100">حفظ</button>
    </form>

</div>





@endsection
