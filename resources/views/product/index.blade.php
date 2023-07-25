@extends('app')
@section('title', 'Dashboard page')
@section('contint')

<div id="content">


    <!-- Begin Page Content -->
    <div class="container-fluid">

        @if(session('msg'))
        <div class="alert alert-{{@session('type')}} alert-dismissible fade show p-3" role="alert">
            <div class="text-right">{{ session('msg') }}</div>
            <button type="button" class="close p-3" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
    @endif

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
             @can('Product.create', Auth::user())
            <a href="{{ route('admin.product.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">إضافة وجبة جديدة</a>
            @endcan
        </div>
        <!-- DataTales Example -->
     <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary  text-right ">إدارة الوجبات</h6>
            @if($page=='trash')
            <a href="{{route('admin.product.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-trash"></i>  عرض الوجبات </a>
            @else
            <a href="{{route('admin.product.trash')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-trash-alt"></i>   سلة المحذوفات  </a>
            @endif

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered  text-right" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>إسم الوجبة</th>
                            <th>السعر</th>
                            <th>الصورة</th>
                            <th>القسم</th>
                            <th>المطعم</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>

                    <tbody>
                   @foreach ($product as $item)


                        <tr>
                            <td>{{ $item->name}}</td>
                            <td>{{ $item->price}}</td>
                            <td><img width="100" src="{{asset($item->image)}}"></td>
                            <td>{{ $item->category->name}}</td>
                            <td>{{ $item->restaurant->name}}</td>

                            <td>
                                @include('product.'.$page.'_craid')

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>


        <!-- End of Main Content -->

@endsection
            <!-- Main Content -->
