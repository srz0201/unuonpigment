@extends('admin.layouts.master')
@section('pageStylePlugins')
    <link href="{{url('')}}/admin/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css"
          rel="stylesheet" type="text/css"/>
    <link href="{{url('')}}/admin/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"
          rel="stylesheet" type="text/css"/>
@endsection
@section('pageStyles')

@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <!-- BEGIN PAGE BAR -->
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <a href="{{route('dashboard')}}">داشبرد</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span>مدیریت مقاله ها</span>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE BAR -->
                <!-- BEGIN PAGE TITLE-->

                <!-- END PAGE TITLE-->
                <!-- END PAGE HEADER-->

                <div class="row">
                    <div class="col-md-12">


                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase">لیست </span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        {{--<a href="" class="btn green-meadow">اضافه کردن مقدار جدید</a>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-header-fixed"
                                       id="sample_1">
                                    <thead>
                                    <tr class="">
                                        <th>کاربر</th>
                                        <th>دپارتمان</th>
                                        @foreach($tableHeads as $tableHead)
                                            <th> {{$tableHead}}</th>
                                        @endforeach
                                        <th>ویرایش</th>
                                        <th> حذف</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($module as $key=>$item)
                                        <tr>
                                            @if($item->user_id)
                                                <td>{{$item->user->name()}}</td>
                                            @else
                                                <td>-</td>
                                            @endif
                                                <td>{{$item->department}}</td>

                                            @foreach($listing_cols as $cols)
                                                <td> {{$item->$cols}}</td>
                                            @endforeach
                                                @if($item->status == 0)
                                                    @if (strpos($item->title, 'استعلام') !== false)
                                                        <td class="bg-red">برسی نشده</td>

                                                    @else
                                                        <td class="bg-warning ">برسی نشده</td>

                                                    @endif
                                                @else
                                                    <td class="bg-green">برسی شده</td>
                                                @endif

                                            <td>
                                                <form class="form-horizontal deleteConfirm" method="POST"
                                                      action="{{route('message.change.status',$item)}}" role="form">
                                                    {{csrf_field()}}
                                                    <button type="submit" class="btn btn-xs blue">
                                                        <i class="fa fa-edit"></i> برسی کردم
                                                    </button>
                                                </form>

                                            </td>
                                            <td>

                                                <form class="form-horizontal deleteConfirm" method="POST"
                                                      action="{{route('message.destroy',$item)}}" role="form">
                                                    {{method_field('DELETE')}}
                                                    {{csrf_field()}}
                                                    <button type="submit" class="btn btn-xs red">
                                                        <i class="fa fa-trash"></i> حذف
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">


                    </div>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
    </div>

@endsection
@section('pagePlugins')
    <script src="{{url('')}}/admin/assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="{{url('')}}/admin/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
            type="text/javascript"></script>
@endsection
@section('pageScripts')
    <script src="{{url('')}}/admin/assets/pages/scripts/table-datatables-fixedheader.min.js"
            type="text/javascript"></script>
    <script src="{{url('')}}/admin/assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

    <script src="{{url('')}}/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/admin/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/admin/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/admin/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

    <script src="{{url('')}}/admin/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>


    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('my-editor', options);
    </script>


    <script>
        function showPreview(objFileInput, id, w, h) {
            if (objFileInput.files[0]) {
                var fileReader = new FileReader();
                fileReader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                    $(id).html('<img src="' + e.target.result + '" width=" ' + w + ' "; height="' + h + '" class="upload-preview" />');
                    $(".targetLayer").css('opacity', '0.7');
                    $(".icon-choose-image").css('opacity', '0.5');
                };
                fileReader.readAsDataURL(objFileInput.files[0]);
            }
        }

        $('#criticisms').dataTable();
    </script>
@endsection