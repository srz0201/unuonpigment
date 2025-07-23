@extends('admin.layouts.master')
@section('styles')
    <!-- DataTables -->
    <link href="{{asset('assets/admin')}}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin')}}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/admin')}}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">کاربران</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">داشبرد</a></li>
                        <li class="breadcrumb-item active">کاربرانه</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->



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
                            <th>ایمیل</th>
                            <th>تاریخ ثبت نام</th>
                            <th>امکانات</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($models as $model)
                            <tr>
                                <td>{{$model->name}}</td>
                                <td>{{$model->mobile}}</td>
                                <td>{{$model->email}}</td>
                                <td>{{\Morilog\Jalali\Jalalian::forge($model->created_at)->format('Y/m/d')}}</td>
                                <td>
                                    @role('super_admin')
                                    <form class="form-horizontal deleteConfirm" method="POST"
                                          action="{{route('admin.users.destroy',$model->id)}}" role="form">
                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}


                                        @role('admin')
                                        <a href="{{route('admin.users.edit',$model->id)}}" class="">
                                            <i class="fa fa-edit font-size-16 align-middle mr-1"></i>  </a>

                                        @endrole

                                        <button type="submit" class="btn btn-link btn-rounded waves-effect text-danger">
                                            <i class="fa fa-trash font-size-16 align-middle mr-1"></i>
                                        </button>
                                    </form>
                                    @endrole


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
    <div class="row">
        <div class="col-lg-12">
            <div class="card" data-select2-id="10">
                <div class="card-body" data-select2-id="9">

                    <h4 class="card-title">ثبت کاربر</h4>
                    <form method="post" action="{{route('admin.users.store')}}">
                        @csrf
                        <div class="form-group">
                            <label class=" control-label">نام*</label>
                            <input name="name" type="text" class="form-control"
                                   required
                                   value="{{old('name')}}">
                        </div>

                        <div class="form-group">
                            <label class=" control-label">شماره موبایل (نام کاربری)*</label>
                            <input name="mobile" type="text" class="form-control"
                                   required
                                   value="{{old('mobile')}}">
                        </div>
                        <div class="form-group">
                            <label class=" control-label">رمز عبور (حد اقل 8)*</label>
                            <input name="password" type="text" class="form-control"
                                   required
                                   value="{{old('password')}}">
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


    </script>
@endsection
