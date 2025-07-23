@extends('admin.layouts.master')
@section('seo')
    <title>مدیریت محصولات</title>
@endsection
@section('styles')
    <!-- DataTables -->
    <link href="{{asset('assets/admin')}}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin')}}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/admin')}}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin')}}/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">


    <link href="{{asset('assets/admin')}}/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css">

@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">محصولات</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">داشبرد</a></li>
                        <li class="breadcrumb-item active">محصولات</li>
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
                        <form method="post" action="{{route('admin.product.update',$edit_item->id)}}" enctype='multipart/form-data' role="form">
                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <div class="form-group">
                                <label class="control-label">دسته بندی</label>
                                <select name="category" class="form-control" required>
                                    <option>انتخاب</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if(old('category',$edit_item->category_id) == $category->id) selected @endif>{{$category->name}}</option>
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
                                <input name="description" type="text" class="form-control"
                                       required
                                       value="{{old('description',$edit_item->description)}}"
                                       placeholder="توضیح کوتاه">

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
                                <label class=" control-label">وضعیت</label>
                                <div class="md-checkbox-inline">
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="checkbox2_4"
                                               name="status" value="1"
                                               @if(old('status',$edit_item->status) == 1) checked @endif
                                               class="md-check">
                                        <label for="checkbox2_4">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span> فعال </label>
                                    </div>
                                </div>
                            </div>




                            <div class="form-group">
                                <label class=" control-label"> انتخاب عکس اصلی</label>
                                <div class="bgColor">
                                    <div style="width: 200px;height: 200px"
                                         class="targetOuter">
                                        <div id="target1" class="targetLayer">

                                            <img src="{{asset($edit_item->image)}}"
                                                 width="200px"
                                                 height="200px" class="upload-preview"/>

                                        </div>
                                        <img src="{{asset('assets/admin/images/easy.png')}}"
                                             class="icon-choose-image"/>
                                        <div class="icon-choose-image">
                                            <input name="image" title="انتخاب عکس" type="file"
                                                   class="inputFile userImage"
                                                   onChange="showPreview(this,'#target1','200px','200px');"/>
                                        </div>
                                    </div>
                                    <label class="col-sm-12 control-label text-left" style="direction: ltr;" > - </label>

                                    <div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label">عکس مجوز</label>
                                <div class="bgColor">
                                    <div style="width: 200px;height: 200px"
                                         class="targetOuter">
                                        <div id="target2" class="targetLayer">

                                            <img src="{{asset($edit_item->banner)}}"
                                                 width="200px"
                                                 height="200px" class="upload-preview"/>

                                        </div>
                                        <img src="{{asset('assets/admin/images/easy.png')}}"
                                             class="icon-choose-image"/>
                                        <div class="icon-choose-image">
                                            <input name="banner" title="انتخاب عکس" type="file"
                                                   class="inputFile userImage"
                                                   onChange="showPreview(this,'#target2','200px','200px');"/>
                                        </div>
                                    </div>
                                    <label class="col-sm-12 control-label text-left" style="direction: ltr;" > - </label>

                                    <div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class=" control-label">ویدئو معرفی</label>
                                <br>
                                <video width="320" height="200" controls>
                                    <source src="{{asset($edit_item->video)}}" type="video/mp4">

                                </video>
                                <div class="md-checkbox-inline">
                                    <div class="md-checkbox">
                                        <input type="checkbox" id="delete_video" name="delete_video" value="1" class="md-check">
                                        <label for="delete_video"> حذف ویدئو </label>
                                    </div>
                                </div>

                                <input name="video" type="file" accept="video/mp4,video/mpeg" class="form-control">

                            </div>


                            <div class="form-group">
                                <label class=" control-label">کاتالوگ</label>
                                <br>
                                @if($edit_item->catalog != null)
                                <a href="{{asset($edit_item->catalog)}}" target="_blank" >"مشاهده فایل کاتالوگ"</a>
                                <br>
                                @endif
                                <input name="catalog" type="file" accept="application/pdf" class="form-control">

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
                                                           placeholder="سوال" >
                                                </div>
                                                <div class="form-group col-lg-5">
                                                    <input name="answer" value="{{$faq['answer']}}" type="text" class="inner form-control"
                                                           placeholder="جواب" >
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


                            <div class="form-group">
                                <label class=" control-label">توضیح کامل</label>
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

        <div class="row" id="gallery">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">گالری تصاویر</h4>
{{--                        <p class="card-title-desc">DropzoneJS یک کتابخانه متن باز برای آپلود فایل به وسیله کشیدن و رها کردن با پیش نمایش تصاویر است.--}}
{{--                        </p>--}}

                        <div>
                            <form action="{{route('admin.product_gallery.store')}}" class="dropzone">
                                @csrf
                                <input name="product_id" type="hidden" value="{{$edit_item->id}}">

                                <div class="fallback">
                                    <input name="file" type="file" multiple>
                                </div>
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted mdi mdi-upload-network-outline"></i>
                                    </div>

                                    <h4 class="primary-font">فایل ها را اینجا بکشید و یا کلیک کنید.</h4>
                                </div>
                            </form>
                        </div>

                        <div class="col-12 mt-4">
                            @foreach($edit_item->gallery as $gallery)
                                <div class="col-2 float-right text-center">
                                    <div>
                                        <img src="{{asset($gallery->thumb)}}" alt="" class="rounded avatar-md">
                                        <form method="post" action="{{route('admin.product_gallery.destroy',$gallery)}}" class="mt-1">
                                            {{method_field('DELETE')}}
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>

    @else
        <div class="row">
            <div class="col-lg-12">
                <div class="card" data-select2-id="10">
                    <div class="card-body" data-select2-id="9">

                        <h4 class="card-title">ثبت جدید</h4>
                        <form method="post" action="{{route('admin.product.store')}}" enctype='multipart/form-data' role="form">
                            {{csrf_field()}}



                            <div class="form-group">
                                <label class="control-label">دسته بندی</label>
                                <select name="category" class="form-control" required>
                                    <option>انتخاب</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if(old('category') == $category->id) selected @endif>{{$category->name}}</option>
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
                                <input name="description" type="text" class="form-control"
                                       required
                                       value="{{old('description')}}"
                                       placeholder="توضیح کوتاه">

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
                                <label class=" control-label"> انتخاب عکس اصلی</label>
                                <div class="bgColor">
                                    <div style="width: 200px;height: 200px"
                                         class="targetOuter">
                                        <div id="target1" class="targetLayer">

                                            <img src="{{asset('assets/admin/images/default.jpg')}}"
                                                 width="200px"
                                                 height="200px" class="upload-preview"/>

                                        </div>
                                        <img src="{{asset('assets/admin/images/easy.png')}}"
                                             class="icon-choose-image"/>
                                        <div class="icon-choose-image">
                                            <input name="image" title="انتخاب عکس" type="file"
                                                   class="inputFile userImage"
                                                   onChange="showPreview(this,'#target1','200px','200px');"/>
                                        </div>
                                    </div>
                                    <label class="col-sm-12 control-label text-left" style="direction: ltr;" > - </label>

                                    <div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" control-label">عکس مجوز</label>
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
                                            <input name="banner" title="انتخاب عکس" type="file"
                                                   class="inputFile userImage"
                                                   onChange="showPreview(this,'#target2','200px','200px');"/>
                                        </div>
                                    </div>
                                    <label class="col-sm-12 control-label text-left" style="direction: ltr;" > - </label>

                                    <div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class=" control-label">ویدئو معرفی</label>
                                <input name="video" type="file" accept="video/mp4,video/mpeg" class="form-control">

                            </div>


                            <div class="form-group">
                                <label class=" control-label">کاتالوگ</label>
                                <input name="catalog" type="file" accept="application/pdf" class="form-control">

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
                                <label class=" control-label">توضیح کامل</label>
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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">لیست</h4>

                        <table id="dtajax" class="table table-striped table-bordered dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>شماره</th>
                                <th>دسته بندی</th>
                                <th>عنوان</th>
                                <th>وضعیت</th>
                                <th>امکانات</th>

                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    @endif



@endsection


@section('scripts')
    <!-- Required datatable js -->
    <script src="{{asset('assets/admin')}}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets/admin')}}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{asset('assets/admin')}}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('assets/admin')}}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('assets/admin')}}/libs/select2/js/select2.min.js"></script>

    <!--tinymce js-->
    <script src="{{asset('assets/admin')}}/libs/tinymce/tinymce.min.js"></script>
    <script src="{{asset('assets/admin')}}/libs/tinymce/langs/fa_IR.js"></script>

    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

    <!-- Plugins js -->
    <script src="{{asset('assets/admin')}}/libs/dropzone/min/dropzone.min.js"></script>

    <!-- form repeater js -->
    <script src="{{asset('assets/admin')}}/libs/jquery.repeater/jquery.repeater.min.js"></script>
    <!-- form repeater init -->
    <script src="{{asset('assets/admin')}}/js/pages/form-repeater.init.js"></script>

    <script>

        $(".select2").select2();



        $(document).ready(function() {
            //Buttons examples

            var table = $('#dtajax').DataTable({
                lengthChange: true,
                processing: true,
                serverSide: true,
                ajax: '{{route('admin.product.dtajax')}}',

                columns: [

                    { data: 'id', name: 'id' },
                    { data: 'category', name: 'category' },
                    { data: 'title', name: 'title' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action' },

                ],
                pageLength:50,
                ordering:true,
                // order: [[0, 'desc']],
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

        } );


    </script>




@endsection
