@extends('admin.layouts.master')
@section('seo')
    <title>مدیریت بنر</title>
@endsection
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
                <h4 class="page-title mb-0 font-size-18">مدیریت بنر</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">داشبرد</a></li>
                        <li class="breadcrumb-item active">مدیریت بنر</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->



    @if(isset($edit_item))
        <div class="row">
            <div class="col-lg-12">
                <div class="card" data-select2-id="10">
                    <div class="card-body" data-select2-id="9">

                        <h4 class="card-title">ویرایش</h4>
                        <form method="post" action="{{route('admin.banners.update',$edit_item->id)}}" enctype='multipart/form-data' role="form">
                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <div class="form-group">
                                <label class="control-label">نام بنر</label>
                                <label class="control-label">(a-z 0-9 and _)</label>

                                <input name="name" type="text" class="form-control" required
                                       placeholder="نام"
                                       value="{{old('name',$edit_item->name)}}" pattern="[A-Za-z0-9-_]+">
                            </div>

                            <div class="form-group">
                                <label class=" control-label">عنوان</label>

                                <input name="title" type="text" class="form-control"
                                       required
                                       value="{{old('title',$edit_item->title)}}"
                                       placeholder="عنوان">

                            </div>


                            <div class="form-group">
                                <label class=" control-label">Url</label>

                                <div class="input-group">

                                    <input name="url" type="text" class="form-control"
                                           value="{{old('url',$edit_item->url)}}"
                                           placeholder="Url Address">
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="md-checkbox-inline">
                                        <div class="md-checkbox">
                                            <input type="checkbox" id="checkbox2_4"
                                                   name="status" value="1"
                                                   @if($edit_item->status == 1) checked @endif
                                                   class="md-check">
                                            <label for="checkbox2_4">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> فعال </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label">انتخاب عکس</label>
                                <div class="bgColor">
                                    <div style="width: 200px;height: 200px"
                                         class="targetOuter">
                                        <div id="target2" class="targetLayer">

                                            <img src="{{asset($edit_item->image_path)}}"
                                                 width="200px"
                                                 height="200px" class="upload-preview"/>

                                        </div>
                                        <img src="{{asset('assets/admin/images/easy.png')}}"
                                             class="icon-choose-image"/>
                                        <div class="icon-choose-image">
                                            <input name="image" title="انتخاب عکس" type="file"
                                                   class="inputFile userImage"
                                                   onChange="showPreview(this,'#target2','200px','200px');"/>
                                        </div>
                                    </div>
                                    <label class="col-sm-12 control-label text-left" style="direction: ltr;" > - </label>

                                    <div>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group mb-0">
                                <button  class="btn btn-primary waves-effect waves-light">ویرایش</button>

                            </div>



                        </form>

                    </div>
                </div>
                <!-- end select2 -->

            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-12">
                <div class="card" data-select2-id="10">
                    <div class="card-body" data-select2-id="9">

                        <h4 class="card-title">ثبت جدید</h4>
                        <form method="post" action="{{route('admin.banners.store')}}" enctype='multipart/form-data' role="form">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label">نام بنر</label>
                                <label class="control-label">(a-z 0-9 and _)</label>

                                <input name="name" type="text" class="form-control" required
                                       placeholder="نام"
                                       value="{{old('name')}}" pattern="[A-Za-z0-9-_]+">
                            </div>

                            <div class="form-group">
                                <label class=" control-label">عنوان</label>

                                <input name="title" type="text" class="form-control"
                                       required
                                       value="{{old('title')}}"
                                       placeholder="عنوان">

                            </div>



                            <div class="form-group">
                                <label class=" control-label">Url</label>

                                <div class="input-group">

                                    <input name="url" type="text" class="form-control"
                                           value="{{old('url')}}"
                                           placeholder="Url Address">
                                </div>

                            </div>

                            <div class="form-group">
                                <label class=" control-label">وضعیت</label>
                                <div class="md-checkbox-inline">
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkbox2_4"
                                               name="status" value="1"
                                               @if(old('status') == 1) checked @endif
                                               class="md-check">
                                        <label for="checkbox2_4">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> فعال </label>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class=" control-label">انتخاب عکس</label>
                                <div class="bgColor">
                                    <div style="width: 200px;height: 200px"
                                         class="targetOuter">
                                        <div id="target2" class="targetLayer">

                                            <img src="{{asset('assets/admin/images/default.jpg')}}"
                                                 width="200px"
                                                 height="200px" class="upload-preview"/>

                                        </div>
                                        <img src="{{asset('assets/admin/images/easy.png')}}"
                                             class="icon-choose-image"/>
                                        <div class="icon-choose-image">
                                            <input name="image" title="انتخاب عکس" type="file"
                                                   class="inputFile userImage"
                                                   onChange="showPreview(this,'#target2','200px','200px');"/>
                                        </div>
                                    </div>
                                    <label class="col-sm-12 control-label text-left" style="direction: ltr;" > - </label>

                                    <div>
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
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">لیست</h4>

                    <table id="b_datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>شماره</th>
                            <th>عنوان</th>
                            <th>وضعیت</th>
                            <th>عکس</th>
                            <th>امکانات</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($module as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{url($item->image_path)}}</td>

                                <td>


                                    <form class="form-horizontal deleteConfirm" method="POST"
                                          action="{{route('admin.banners.destroy',$item->id)}}" role="form">

                                        <a href="{{route('admin.banners.edit',$item->id)}}" class="">
                                            <i class="fa fa-edit font-size-16 align-middle mr-1"></i>  </a>

                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-link btn-rounded waves-effect text-danger">
                                            <i class="fa fa-trash font-size-16 align-middle mr-1"></i>
                                        </button>
                                    </form>

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

    <script>

        $(".select2").select2();
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
