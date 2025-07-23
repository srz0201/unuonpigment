@extends('admin.layouts.master')
@section('seo')
    <title>صفحات</title>
@endsection
@section('styles')
    <!-- DataTables -->
    <link href="{{asset('assets/admin')}}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin')}}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/admin')}}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">

@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">صفحات</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">داشبرد</a></li>
                        <li class="breadcrumb-item active">صفحات</li>
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
                        <form method="post" action="{{route('admin.page.update',$edit_item->id)}}" enctype='multipart/form-data' role="form">
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
                                <label class=" control-label"> seo title</label>

                                <input name="seo_title" type="text" class="form-control"
                                       required
                                       value="{{old('seo_title',$edit_item->seo_title)}}"
                                       placeholder="seo title">

                            </div>
                            <div class="form-group">
                                <label class=" control-label">seo description</label>

                                <div class="input-group">

                                    <input name="seo_description" type="text" class="form-control"
                                           value="{{old('seo_description',$edit_item->seo_description)}}"
                                           placeholder="seo description">
                                </div>

                            </div>


                            <div class="form-group">
                                <label class=" control-label">slug</label>
                                <div class="input-group">
                                    <input name="slug" type="text" class="form-control"
                                           value="{{old('slug',$edit_item->slug)}}"
                                           placeholder="slug">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label">متن</label>
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
                                    <label class="col-sm-12 control-label text-left" style="direction: ltr;" > 100 x 200 </label>

                                    <div>
                                    </div>
                                </div>
                            </div>



                            <br>

                            <div class="form-group outer-repeater">
                                <label class="control-label">سوالات متداول</label>
                                <div data-repeater-list="faq" class="outer">
                                    @if(isset($edit_item->faq))
                                        @foreach($edit_item->faq as $faq)
                                            <div data-repeater-item class="row">
                                                <div class="form-group col-lg-5">
                                                    <input name="question" value="{{$faq['question']}}" type="text" class="inner form-control"
                                                           placeholder="سوال" required>
                                                </div>
                                                <div class="form-group col-lg-5">
                                                    <input name="answer" value="{{$faq['answer']}}" type="text" class="inner form-control"
                                                           placeholder="جواب" required>
                                                </div>
                                                <div class="col-lg-2 align-self-center">
                                                    <input data-repeater-delete type="button" class="btn btn-primary btn-block"
                                                           value="حذف">
                                                </div>
                                            </div>
                                        @endforeach

                                    @else
                                        <div data-repeater-item class="row">
                                            <div class="form-group col-lg-5">
                                                <input name="question" value="" type="text" class="inner form-control"
                                                       placeholder="سوال" >
                                            </div>
                                            <div class="form-group col-lg-5">
                                                <input name="answer" value="" type="text" class="inner form-control"
                                                       placeholder="جواب" >
                                            </div>
                                            <div class="col-lg-2 align-self-center">
                                                <input data-repeater-delete type="button" class="btn btn-primary btn-block"
                                                       value="حذف">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <input data-repeater-create type="button" class="btn btn-success inner"
                                       value="افزودن جدید">

                            </div>


                            <textarea id="tinymce1" name="body">{{old('body',$edit_item->body)}}</textarea>




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
                        <form method="post" action="{{route('admin.page.store')}}" enctype='multipart/form-data'>
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
                                <label class=" control-label"> seo title</label>

                                <input name="seo_title" type="text" class="form-control"
                                       required
                                       value="{{old('seo_title')}}"
                                       placeholder="seo title">

                            </div>
                            <div class="form-group">
                                <label class=" control-label">seo description</label>

                                <div class="input-group">

                                    <input name="seo_description" type="text" class="form-control"
                                           value="{{old('seo_description')}}"
                                           placeholder="seo description">
                                </div>

                            </div>



                            <div class="form-group">
                                <label class=" control-label">slug</label>
                                <div class="input-group">
                                    <input name="slug" type="text" class="form-control"
                                           value="{{old('slug')}}"
                                           placeholder="slug">
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
                                    <label class="col-sm-12 control-label text-left" style="direction: ltr;" > 100 x 200 </label>

                                    <div>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="form-group outer-repeater">
                                <label class="control-label">سوالات متداول</label>
                                <div data-repeater-list="faq" class="outer">
                                    <div data-repeater-item class="row">
                                        <div class="form-group col-lg-5">
                                            <input name="question" type="text" class="inner form-control"
                                                   placeholder="سوال" >
                                        </div>
                                        <div class="form-group col-lg-5">
                                            <input name="answer" type="text" class="inner form-control"
                                                   placeholder="جواب" >
                                        </div>
                                        <div class="col-lg-2 align-self-center">
                                            <input data-repeater-delete type="button" class="btn btn-primary btn-block"
                                                   value="حذف">
                                        </div>
                                    </div>
                                </div>
                                <input data-repeater-create type="button" class="btn btn-success inner"
                                       value="افزودن جدید">

                            </div>



                            <div class="form-group">
                                <label class=" control-label">متن</label>
                                <textarea id="tinymce1" name="body">{{old('body')}}</textarea>

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

                    <table id="b_datatable" class="table table-striped table-bordered dt-responsive base_datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>شماره</th>
                            <th>زبان</th>
                            <th>عنوان</th>
                            <th>توضیح</th>
                            <th>slug</th>
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
                                <td style="direction: ltr">{{$item->path()}}</td>


                                <td>


                                    <form class="form-horizontal deleteConfirm" method="POST"
                                          action="{{route('admin.page.destroy',$item->id)}}" role="form">

                                        <a href="{{route('admin.page.show',$item->id)}}" class="">
                                            <i class="fa fa-eye font-size-16 align-middle mr-1"></i>  </a>
                                        <a href="{{route('admin.page.edit',$item->id)}}" class="">
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


    <!--tinymce js-->
    <script src="{{asset('assets/admin')}}/libs/tinymce/tinymce.min.js"></script>
    <script src="{{asset('assets/admin')}}/libs/tinymce/langs/fa_IR.js"></script>

    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

    <!-- form repeater js -->
    <script src="{{asset('assets/admin')}}/libs/jquery.repeater/jquery.repeater.min.js"></script>
    <!-- form repeater init -->
    <script src="{{asset('assets/admin')}}/js/pages/form-repeater.init.js"></script>


    <script>

        $(document).ready(function() {


            if($("#tinymce1").length > 0){
                tinymce.init({
                    language: "fa_IR",
                    selector: "textarea#tinymce1",
                    height:600,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table directionality emoticons template paste"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ],
                    file_picker_callback (callback, value, meta) {
                        let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth
                        let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight

                        tinymce.activeEditor.windowManager.openUrl({
                            url : '/file-manager/tinymce5',
                            title : 'Laravel File manager',
                            width : x * 0.8,
                            height : y * 0.8,
                            onMessage: (api, message) => {
                                callback(message.content, { text: message.text })
                            }
                        })
                    }
                });







            }

        } );

    </script>
@endsection
