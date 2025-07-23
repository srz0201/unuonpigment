@extends('admin.layouts.master')
@section('pageStylePlugins')
    <link href="{{url('')}}/admin/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css"
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
                            <span>مدیریت خدمات</span>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE BAR -->
                <!-- BEGIN PAGE TITLE-->

                <!-- END PAGE TITLE-->
                <!-- END PAGE HEADER-->

                <div class="row">
                    <div class="col-md-12">


                        @if(isset($service))
                            <div class="portlet box blue ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-pencil"></i> اضافه کردن ویژگی جدید
                                    </div>
                                    <div class="tools">
                                        <a href="" class="collapse"> </a>

                                    </div>
                                </div>
                                <div class="portlet-body form">

                                    <form method="post" action="{{route('service.update',$service)}}" enctype='multipart/form-data' role="form">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class=" control-label">عنوان</label>

                                                        <input name="title" type="text" class="form-control"
                                                               required
                                                               value="{{old('title',$service->title)}}"
                                                               placeholder="عنوان">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class=" control-label">ترتیب</label>

                                                            <input name="order" type="number" min="1"
                                                                   class="form-control" required
                                                                   @if(old('order')) value="{{old('order')}}"
                                                                   @else value="{{$service->order}}" @endif
                                                                   placeholder="1">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class=" control-label">slug</label>

                                                            <input name="slug" type="text"
                                                                   class="form-control" required value="{{$service->slug}}" >

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class=" control-label">توضیح کوتاه</label>

                                                        <input name="description" type="text" class="form-control"
                                                               required
                                                               value="{{old('description',$service->description)}}"
                                                               placeholder="توضیح">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                @php($width=166)
                                                @php($heigt=230)
                                                <div class="bgColor">
                                                    <div style="width: {{$width}}px;height: {{$heigt}}px"
                                                         class="targetOuter">
                                                        <div id="target2" class="targetLayer">

                                                            <img src="{{asset($service->image_path)}}"
                                                                 width="{{$width}}px"
                                                                 height="{{$heigt}}px" class="upload-preview"/>

                                                        </div>
                                                        <img src="{{asset('admin/assets/imgs/easy.png')}}"
                                                             class="icon-choose-image"/>
                                                        <div class="icon-choose-image">
                                                            <input name="image" title="انتخاب عکس" type="file"
                                                                   class="inputFile userImage"
                                                                   onChange="showPreview(this,'#target2','{{$width}}px','{{$heigt}}px');"/>
                                                        </div>
                                                    </div>
                                                    <label class="col-sm-12 control-label">سایز مناسب عکس {{$width}}
                                                        x{{$heigt}} پیکسل</label>

                                                    <div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class=" control-label">متن</label>

                                                        <textarea id="my-editor" class="ckeditor form-control" rows="6" name="body">{!! old('body',$service->body) !!}</textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn green-meadow">ثبت</button>
                                        </div>
                                    </form>
                                </div>
                            </div>




                        @else
                            <div class="portlet box blue ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-pencil"></i> اضافه کردن ویژگی جدید
                                    </div>
                                    <div class="tools">
                                        <a href="" class="collapse"> </a>

                                    </div>
                                </div>
                                <div class="portlet-body form">

                                    <form method="post" action="{{route('service.store')}}" enctype='multipart/form-data' role="form">
                                        {{csrf_field()}}
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class=" control-label">عنوان</label>

                                                        <input name="title" type="text" class="form-control"
                                                               required
                                                               value="{{old('title')}}"
                                                               placeholder="عنوان">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class=" control-label">ترتیب</label>

                                                            <input name="order" type="number" min="1"
                                                                   class="form-control" required
                                                                   @if(old('order')) value="{{old('order')}}"
                                                                   @else value="1" @endif
                                                                   placeholder="1">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class=" control-label">slug</label>

                                                            <input name="slug" type="text"
                                                                   class="form-control" required value="{{old('slug')}}" >

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class=" control-label">توضیح کوتاه</label>

                                                        <input name="description" type="text" class="form-control"
                                                               required
                                                               value="{{old('description')}}"
                                                               placeholder="توضیح">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                @php($width=166)
                                                @php($heigt=230)

                                                <div class="bgColor">
                                                    <div style="width: {{$width}}px;height: {{$heigt}}px"
                                                         class="targetOuter">
                                                        <div id="target2" class="targetLayer">

                                                            <img src="{{asset('admin/assets/imgs/default.jpg')}}"
                                                                 width="{{$width}}px"
                                                                 height="{{$heigt}}px" class="upload-preview"/>

                                                        </div>
                                                        <img src="{{asset('admin/assets/imgs/easy.png')}}"
                                                             class="icon-choose-image"/>
                                                        <div class="icon-choose-image">
                                                            <input name="image" title="انتخاب عکس" type="file"
                                                                   class="inputFile userImage"
                                                                   onChange="showPreview(this,'#target2','{{$width}}px','{{$heigt}}px');"/>
                                                        </div>
                                                    </div>
                                                    <label class="col-sm-12 control-label">سایز مناسب عکس {{$width}}
                                                        x{{$heigt}} پیکسل</label>

                                                    <div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class=" control-label">متن</label>

                                                        <textarea id="my-editor" class="ckeditor form-control" rows="15" name="body">{{old('body')}}</textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn green-meadow">ثبت</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    @endif

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
                                        <th>شماره</th>
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
                                            <td>{{$key+1}}</td>
                                            @foreach($listing_cols as $cols)
                                                <td> {{$item->$cols}}</td>
                                            @endforeach

                                            <td>
                                                <a href="{{route('service.edit',$item->id)}}" class="btn btn-xs blue">
                                                    <i class="fa fa-edit"></i> ویرایش </a>
                                            </td>
                                            <td>

                                                <form class="form-horizontal deleteConfirm" method="POST"
                                                      action="{{route('service.destroy',$item->id)}}" role="form">
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

    </script>
@endsection