@extends('admin.layouts.master')
@section('seo')
    <title>مقام</title>
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
                <h4 class="page-title mb-0 font-size-18">مقام</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">داشبرد</a></li>
                        <li class="breadcrumb-item active">مقام</li>
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

                    <h4 class="card-title">ثبت مقام برای کاربر</h4>
                    <form method="post" action="{{route('admin.attach.role')}}">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">انتخاب کاربر</label>
                            <select name="user_id" class="form-control select2">
                                <option>انتخاب</option>
                                @foreach($models as $model)
                                    <option value="{{$model->id}}">{{$model->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group ">
                            <label class="control-label">انتخاب گر چندگانه</label>

                            <select name="role_id[]" class="select2 form-control select2-multiple" multiple data-placeholder="انتخاب کنید ...">

                                @foreach($roles as $role)

                                    <option value="{{$role->id}}">{{$role->display_name}}</option>

                                @endforeach

                            </select>

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


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">لیست</h4>

                    <table id="b_datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>نام</th>
                            <th>موبایل</th>
                            <th>مقام</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($models as $model)
                        <tr>
                            <td>{{$model->name}}</td>
                            <td>{{$model->mobile}}</td>
                            <td>
                                @foreach($model->roles as $role)
                                    <form method="post" action="{{route('admin.detach.role',[$model,$role])}}" class="deleteConfirm">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$model->id}}">
                                    <button class="btn btn-secondary btn-sm waves-effect waves-light">
                                            <i class="bx bx-trash font-size-16 align-middle mr-2"></i>
                                        {{$role->name}}
                                    </button>
                                    </form>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->


@endsection


@section('scripts')

    <!-- Required datatable js -->
    <script src="{{asset('assets/admin')}}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets/admin')}}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{asset('assets/admin')}}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('assets/admin')}}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="{{asset('assets/admin')}}/libs/select2/js/select2.min.js"></script>

    <script>

        $(document).ready(function() {

            //Buttons examples
            var table = $('#b_datatable').DataTable({
                lengthChange: false,
                buttons: ['excel', 'pdf'],
                language: {
                    "sEmptyTable":     "هیچ داده ای در جدول وجود ندارد",
                    "sInfo":           "نمایش _START_ تا _END_ از _TOTAL_ رکورد",
                    "sInfoEmpty":      "نمایش 0 تا 0 از 0 رکورد",
                    "sInfoFiltered":   "(فیلتر شده از _MAX_ رکورد)",
                    "sInfoPostFix":    "",
                    "sInfoThousands":  ",",
                    "sLengthMenu":     "نمایش _MENU_ رکورد",
                    "sLoadingRecords": "در حال بارگزاری...",
                    "sProcessing":     "در حال پردازش...",
                    "sSearch":         "جستجو:",
                    "sZeroRecords":    "رکوردی با این مشخصات پیدا نشد",
                    "oPaginate": {
                        "sFirst":    "ابتدا",
                        "sLast":     "انتها",
                        "sNext":     "بعدی",
                        "sPrevious": "قبلی"
                    },
                    "oAria": {
                        "sSortAscending":  ": فعال سازی نمایش به صورت صعودی",
                        "sSortDescending": ": فعال سازی نمایش به صورت نزولی"
                    },
                    "buttons": {
                        "excel": "اکسل",
                        "pdf": "PDF",
                        "copyTitle": "کپی به حافظه",
                        "copySuccess":{
                            1:"1 سطر به حافظه کپی شد",
                            _:"%d سطر به حافظه کپی شد"
                        }
                    }
                }
            });

            // table.buttons().container().appendTo('#b_datatable_wrapper .col-md-6:eq(0)');
        } );

        $(".select2").select2();

    </script>
@endsection
