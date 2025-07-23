@extends('admin.layouts.master')
@section('seo')
    <title>درباره ما</title>
@endsection
@section('styles')
    <!-- DataTables -->
    <link href="{{asset('assets/admin')}}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin')}}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/admin')}}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <link href="{{asset('assets/admin')}}/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css">

@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">درباره ما</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">داشبرد</a></li>
                        <li class="breadcrumb-item active">درباره ما</li>
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
                        <form method="post" action="{{route('admin.about.update',$edit_item->id)}}" enctype='multipart/form-data' role="form">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label class="control-label">زبان</label>
                                <select name="lang" class="form-control">
                                    @foreach($languages as $language)
                                        <option @if(old('lang',$edit_item->language_id) == $language->id) selected @endif value="{{$language->id}}">{{$language->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class=" control-label">عنوان</label>

                                <input name="title" type="text" class="form-control"
                                       required
                                       value="{{old('title',$edit_item->title)}}"
                                       placeholder="عنوان">

                            </div>

                            <div class="form-group">
                                <label class=" control-label">توضیح کوتاه</label>

                                <div class="input-group">

                                    <input name="description" type="text" class="form-control"
                                           value="{{old('description',$edit_item->description)}}"
                                           placeholder="توضیح کوتاه">
                                </div>

                            </div>

                            <div class="form-group">
                                <label class=" control-label">انتخاب عکس </label>
                                <div class="bgColor">
                                    <div style="width: 200px;height: 200px"
                                         class="targetOuter">
                                        <div id="target2" class="targetLayer">

                                            <img src="{{asset($edit_item->image)}}"
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
                                    <label class="col-sm-12 control-label text-left" style="direction: ltr;" > 100 x 200 </label>

                                    <div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label">انتخاب عکس </label>
                                <div class="bgColor">
                                    <div style="width: 200px;height: 200px"
                                         class="targetOuter">
                                        <div id="target3" class="targetLayer">

                                            <img src="{{asset($edit_item->image2)}}"
                                                 width="200px"
                                                 height="200px" class="upload-preview"/>

                                        </div>
                                        <img src="{{asset('assets/admin/images/easy.png')}}"
                                             class="icon-choose-image"/>
                                        <div class="icon-choose-image">
                                            <input name="image2" title="انتخاب عکس" type="file"
                                                   class="inputFile userImage"
                                                   onChange="showPreview(this,'#target3','200px','200px');"/>
                                        </div>
                                    </div>
                                    <label class="col-sm-12 control-label text-left" style="direction: ltr;" > 100 x 200 </label>

                                    <div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label">ویدئو</label>
                                <div class="d-flex">
                                    <input name="video" type="text" class="form-control" id="video" value="{{old('video',$edit_item->video)}}">
                                    <div class="input-group-append ">
                                        <button class="btn btn-outline-secondary" type="button" id="button_video">
                                            انتخاب
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group repeater">
                                <label class=" control-label"> آیتم ها </label>
                                <div data-repeater-list="about_items">
                                    @if(isset($edit_item->about_items))
                                        @foreach($edit_item->about_items as $item)

                                            <div data-repeater-item class="row">
                                                <div class="form-group col-lg-3">
                                                    <input type="text" id="icon" name="about_icon" class="form-control" value="{{$item['about_icon']}}">
                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <input type="text" id="title" name="about_title" class="form-control" value="{{@$item['about_title']}}">
                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <input type="text" id="description" name="about_description" class="form-control" value="{{@$item['about_description']}}">
                                                </div>

                                                <div class="col-lg-2 align-self-center">
                                                    <input data-repeater-delete type="button" class="btn btn-primary btn-block" value="حذف">
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div data-repeater-item class="row">
                                            <div class="form-group col-lg-3">
                                                <input type="text" id="icon" name="about_icon" class="form-control" value="">
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <input type="text" id="title" name="about_title" class="form-control" value="">
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <input type="text" id="description" name="about_description" class="form-control" value="">
                                            </div>

                                            <div class="col-lg-2 align-self-center">
                                                <input data-repeater-delete type="button" class="btn btn-primary btn-block" value="حذف">
                                            </div>
                                        </div>
                                    @endif

                                </div>
                                <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="افزودن">

                            </div>

                            <div class="form-group">
                                <label class=" control-label">متن</label>
                                <textarea class="tinymce" name="body">{{old('body',$edit_item->body)}}</textarea>
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
                        <form method="post" action="{{route('admin.about.store')}}" enctype='multipart/form-data'>
                            @csrf

                            <div class="form-group">
                                <label class="control-label">زبان</label>
                                <select name="lang" class="form-control">
                                    @foreach($languages as $language)
                                        <option @if(old('lang') == $language->id) selected @endif value="{{$language->id}}">{{$language->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class=" control-label">عنوان</label>

                                <input name="title" type="text" class="form-control"
                                       required
                                       value="{{old('title')}}"
                                       placeholder="عنوان">

                            </div>


                            <div class="form-group">
                                <label class=" control-label">توضیح کوتاه</label>

                                <div class="input-group">

                                    <input name="description" type="text" class="form-control"
                                           value="{{old('description')}}"
                                           placeholder="توضیح کوتاه">
                                </div>

                            </div>


                            <div class="form-group">
                                <label class=" control-label">انتخاب عکس </label>
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
                                    <label class="col-sm-12 control-label text-left" style="direction: ltr;" > 100 x 200 </label>

                                    <div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label">انتخاب عکس </label>
                                <div class="bgColor">
                                    <div style="width: 200px;height: 200px"
                                         class="targetOuter">
                                        <div id="target3" class="targetLayer">

                                            <img src="{{asset('assets/admin/images/default.jpg')}}"
                                                 width="200px"
                                                 height="200px" class="upload-preview"/>

                                        </div>
                                        <img src="{{asset('assets/admin/images/easy.png')}}"
                                             class="icon-choose-image"/>
                                        <div class="icon-choose-image">
                                            <input name="image2" title="انتخاب عکس" type="file"
                                                   class="inputFile userImage"
                                                   onChange="showPreview(this,'#target3','200px','200px');"/>
                                        </div>
                                    </div>
                                    <label class="col-sm-12 control-label text-left" style="direction: ltr;" > 100 x 200 </label>

                                    <div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label">ویدئو</label>
                                <div class="d-flex">
                                    <input name="video" type="text" class="form-control" id="video" value="{{old('video')}}">
                                    <div class="input-group-append ">
                                        <button class="btn btn-outline-secondary" type="button" id="button_video">
                                            انتخاب
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group repeater">
                                <label class=" control-label"> آیتم ها </label>
                                <div data-repeater-list="about_items">
                                    <div data-repeater-item class="row">
                                        <div class="form-group col-lg-3">
                                            <input type="text" id="icon" name="about_icon" class="form-control" value="">
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <input type="text" id="title" name="about_title" class="form-control" value="">
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <input type="text" id="description" name="about_description" class="form-control" value="">
                                        </div>

                                        <div class="col-lg-2 align-self-center">
                                            <input data-repeater-delete type="button" class="btn btn-primary btn-block" value="حذف">
                                        </div>
                                    </div>
                                </div>
                                <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="افزودن">

                            </div>

                            <div class="form-group">
                                <label class=" control-label">متن</label>
                                <textarea class="tinymce" name="body">{{old('body')}}</textarea>

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
                            <th>زبان</th>
                            <th>عنوان</th>
                            <th>توضیح</th>
                            <th>امکانات</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($module as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->language->name}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->description}}</td>


                                <td>


                                    <form class="form-horizontal deleteConfirm" method="POST"
                                          action="{{route('admin.about.destroy',$item)}}" role="form">

                                        <a href="{{route('admin.about.edit',$item)}}" class="">
                                            <i class="fa fa-edit font-size-16 align-middle mr-1"></i>
                                        </a>

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
    <script src="{{asset('assets/admin')}}/libs/jquery.repeater/jquery.repeater.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{asset('assets/admin')}}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('assets/admin')}}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>


    <!--tinymce js-->
    <script src="{{asset('assets/admin')}}/libs/tinymce/tinymce.min.js"></script>
    <script src="{{asset('assets/admin')}}/libs/tinymce/langs/fa_IR.js"></script>

    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script src="{{asset('assets/admin')}}/libs/dropzone/min/dropzone.min.js"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function () {

            document.getElementById('button_video').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'video';
                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });

        });
        let inputId = '';
        function fmSetLink($url) {
            document.getElementById(inputId).value = $url;
        }

        $(document).ready(function () {
            'use strict';

            $('.repeater').repeater({
                defaultValues: {
                    'textarea-input': 'foo',
                    'text-input': 'bar',
                    'select-input': 'B',
                    'checkbox-input': ['A', 'B'],
                    'radio-input': 'B'
                },
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    if(confirm('آیا از حذف این مورد اطمینان دارید؟')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                ready: function (setIndexes) {

                }
            });

            window.outerRepeater = $('.outer-repeater').repeater({
                defaultValues: { 'text-input': 'outer-default' },
                show: function () {
                    console.log('outer show');
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    console.log('outer delete');
                    $(this).slideUp(deleteElement);
                },
                repeaters: [{
                    selector: '.inner-repeater',
                    defaultValues: { 'inner-text-input': 'inner-default' },
                    show: function () {
                        console.log('inner show');
                        $(this).slideDown();
                    },
                    hide: function (deleteElement) {
                        console.log('inner delete');
                        $(this).slideUp(deleteElement);
                    }
                }]
            });
        });

    </script>
@endsection
