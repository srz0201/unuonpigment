@extends('admin.layouts.master')
@section('seo')
    <title>ویرایش</title>
@endsection
@section('styles')
    <!-- DataTables -->
    <link href="{{asset('assets/admin')}}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin')}}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/admin')}}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin')}}/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">

@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">ویرایش</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">داشبرد</a></li>
                        <li class="breadcrumb-item active">ویرایش</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->



    <div class="row">
        <div class="col-lg-12">
            <div class="card" data-select2-id="10">
                <div class="card-body" data-select2-id="9">

                    <h4 class="card-title">ویرایش</h4>
                    <form method="post" action="{{route('admin.users.update',$user)}}">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class=" control-label">نام </label>

                                    <input name="name" type="text" class="form-control"
                                           required
                                           value="{{old('name',$user->name)}}">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class=" control-label">شماره موبایل</label>

                                    <input name="mobile" type="text" class="form-control"
                                           required
                                           value="{{old('mobile',$user->mobile)}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class=" control-label">تغییر رمز عبور</label>

                                    <input name="password" type="text" class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="form-group mb-0">
                            <button  class="btn btn-primary waves-effect waves-light">ثبت</button>

                        </div>



                    </form>

                </div>
            </div>
            <!-- end select2 -->

        </div>
    </div>



@endsection


@section('scripts')

    <!-- Required datatable js -->
    <script src="{{asset('assets/admin')}}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets/admin')}}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{asset('assets/admin')}}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('assets/admin')}}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="{{asset('assets/admin')}}/libs/select2/js/select2.min.js"></script>


@endsection
