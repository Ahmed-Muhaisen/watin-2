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


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary  text-right ">إدارة صلاحيات المستخدم</h6>
                @if($page=='trash')
                <a href="{{route('admin.setting.role_user.index')}}"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-trash"></i> عرض
                    صلاحيات المستخدم </a>
                @else
                <a href="{{route('admin.setting.role_user.trash')}}"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-trash-alt"></i>
                    سلة المحذوفات </a>
                @endif

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered  text-right" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>إسم المستخدم</th>
                                <th>نوع الأدمن</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($user as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>@if(isset($item->role->name)){{$item->role->name}}
                                    @endif
                                </td>
                                <td>
                                    @include('setting.role_user.'.$page.'_craid')
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
