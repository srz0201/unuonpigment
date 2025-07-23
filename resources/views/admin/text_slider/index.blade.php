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
                            <span>مدیریت اسلایدر متن</span>
                        </li>
                    </ul>
                </div>
                <!-- END PAGE BAR -->
                <!-- BEGIN PAGE TITLE-->
            {{--<h1 class="page-title"> FixedHeader Extension--}}
            {{--<small>rowreorder extension demos</small>--}}
            {{--</h1>--}}
            <!-- END PAGE TITLE-->
                <!-- END PAGE HEADER-->
                <div class="m-heading-1 border-green m-bordered">


                </div>
                <div class="row">
                    <div class="col-md-12">



                        @if(isset($textSlider))
                        <div class="portlet box blue ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-pencil"></i> ویرایش
                                </div>
                                <div class="tools">
                                    <a href="" class="collapse"> </a>

                                </div>
                            </div>
                            <div class="portlet-body form">
                                <form method="post" action="{{route('text_slider.update',$textSlider->id)}}" role="form">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label">زبان</label>
                                            <select name="lang" class="form-control">
                                                @foreach($languages as $language)
                                                    <option @if(old('lang',$textSlider->language_id) == $language->id) selected @endif value="{{$language->id}}">{{$language->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="form-group has-success">
                                            <label class="control-label">عنون</label>
                                            <input type="text" name="title" class="form-control" value="{{old('title',$textSlider->title)}}">
                                        </div>
                                        <div class="form-group has-success">
                                            <label class="control-label">description</label>
                                            <input type="text" name="description" class="form-control" value="{{old('description',$textSlider->description)}}">
                                        </div>


                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn green-meadow">ویرایش</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @else
                        <div class="portlet box blue ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-pencil"></i> اضافه کردن مقدار جدید
                                </div>
                                <div class="tools">
                                    <a href="" class="collapse"> </a>

                                </div>
                            </div>
                            <div class="portlet-body form">
                                <form method="post" action="{{route('text_slider.store')}}" role="form">
                                    {{csrf_field()}}
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label">زبان</label>
                                            <select name="lang" class="form-control">
                                                @foreach($languages as $language)
                                                    <option value="{{$language->id}}">{{$language->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group has-success">
                                            <label class="control-label">عنون</label>
                                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                        </div>
                                        <div class="form-group has-success">
                                            <label class="control-label">description</label>
                                            <input type="text" name="description" class="form-control" value="{{old('description')}}">
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
                                    <span class="caption-subject bold uppercase">لیست نوع محصولات</span>
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
                                        <th>زبان</th>
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
                                            <td>{{$item->language->name}}</td>

                                            @foreach($listing_cols as $cols)
                                                <td> {{$item->$cols}}</td>
                                            @endforeach
                                            <td>
                                                <a href="{{route('text_slider.edit',$item->id)}}" class="btn btn-xs blue">
                                                    <i class="fa fa-edit"></i> ویرایش </a>
                                            </td>
                                            <td>

                                                <form  class="form-horizontal deleteConfirm" method="POST"
                                                      action="{{route('text_slider.destroy',$item->id)}}" role="form">
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



@endsection