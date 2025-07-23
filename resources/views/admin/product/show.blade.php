@extends('admin.layouts.master')
@section('seo')
    <title> محصولات</title>
@endsection
@section('styles')
    <!-- DataTables -->
    <link href="{{asset('assets/admin')}}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin')}}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/admin')}}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/admin')}}/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">

    <link rel="stylesheet" href="{{asset('assets/admin')}}/libs/leaflet_1.5.1/leaflet.css" />

    <link href="{{asset('assets/admin')}}/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css">

@endsection
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">{{$product->title}}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">داشبرد</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">محصولات</a></li>
                        <li class="breadcrumb-item active">{{$product->title}}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->



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
                            <input name="product_id" type="hidden" value="{{$product->id}}">

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
                        @foreach($product->gallery as $gallery)
                            <div class="col-2 float-right text-center">
                                <div>
                                    <img src="{{asset($gallery->thumb)}}" alt="" class="rounded avatar-md">
                                    <form method="post" action="{{route('admin.galleries.destroy',$gallery)}}" class="mt-1">
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



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">نظرات</h4>

                    <table id="b_datatable"
                           class="table table-striped table-bordered dt-responsive nowrap base_datatable"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>تاریخ</th>
                            <th>نام</th>
                            <th>شماره تماس</th>
                            <th>نظر</th>
                            <th>امکانات</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($product->comments()->latest()->get() as $item)
                            <tr>
                                <td>{{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('Y/m/d')}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->contact_id}}</td>
                                <td>{{$item->body}}</td>


                                <td>


                                    <form class="form-horizontal deleteConfirm" method="POST"
                                          action="{{route('admin.comment.update',$item->id)}}" role="form">

                                        {{method_field('PUT')}}
                                        {{csrf_field()}}
                                        @if($item->status == 1)
                                            <button type="submit" class="btn btn-success btn-sm">
                                                منتشر نکن
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-warning btn-sm">
                                                منتشر کن
                                            </button>
                                        @endif
                                    </form>

                                    <button class="btn btn-primary btn-sm mt-1" data-toggle="modal"
                                            data-target=".comment-modal-{{$item->id}}">
                                        ثبت پاسخ
                                    </button>

                                    <form class="form-horizontal deleteConfirm" method="POST"
                                          action="{{route('admin.comment.destroy',$item->id)}}" role="form">

                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-link btn-rounded waves-effect text-danger">
                                            <i class="fa fa-trash font-size-16 align-middle mr-1"></i>
                                        </button>
                                    </form>

                                </td>


                                <!--  Modal content for the above example -->
                                <div class="modal fade comment-modal-{{$item->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="comment-modal-{{$item->id}}" aria-hidden="true"
                                     style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0" id="comment-modal-{{$item->id}}">ثبت
                                                    پاسخ</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>{{$item->body}}</p>
                                                <form class="form-horizontal " method="POST"
                                                      action="{{route('admin.comment.store')}}" role="form">
                                                    {{csrf_field()}}
                                                    <input name="comment_id" value="{{$item->id}}" type="hidden">
                                                    <textarea class="form-control" name="body" required></textarea>
                                                    <button type="submit" class="btn btn-primary mt-2">
                                                        ثبت
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                            </tr>
                            @if(!$item->response->isEmpty())
                                @foreach($item->response as $response)
                                    <tr class="bg-light">
                                        <td>پاسخ</td>
                                        <td>{{\Morilog\Jalali\Jalalian::forge($response->created_at)->format('Y/m/d')}}</td>
                                        <td colspan="2">{{$response->body}}</td>
                                        <td>
                                            <form class="form-horizontal deleteConfirm" method="POST"
                                                  action="{{route('admin.comment.destroy',$response->id)}}" role="form">

                                                {{method_field('DELETE')}}
                                                {{csrf_field()}}
                                                <button type="submit" class="btn btn-link btn-rounded waves-effect text-danger">
                                                    <i class="fa fa-trash font-size-16 align-middle mr-1"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            @endif

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
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title"> جدول لیست</h4>
                    @if(count($product->tableLists) > 0)
                    <table id="b_datatable"
                           class="table table-striped table-bordered "
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            @foreach($product->tableLists()->first()->items as $item)

                            <th>{{$item['item']}}</th>
                            @endforeach
                                <th>
                                    <form class="form-horizontal deleteConfirm" method="POST"
                                          action="{{route('admin.product_table_list.destroy',$product->tableLists()->first()->id)}}" role="form">

                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-link btn-rounded waves-effect text-danger">
                                            <i class="fa fa-trash font-size-16 align-middle mr-1"></i>
                                        </button>

                                        <a href="#" data-toggle="modal"
                                           data-target=".table-modal-{{$product->tableLists()->first()->id}}">
                                            <i class="fa fa-edit font-size-16 align-middle mr-1"></i>  </a>

                                    </form>


                                    <!--  Modal content for the above example -->
                                    <div class="modal fade table-modal-{{$product->tableLists()->first()->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="table-modal-create" aria-hidden="true"
                                         style="display: none;">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0" id="table-modal-create">ثبت
                                                        ایتم جدید</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form class="form-horizontal " method="POST"
                                                          action="{{route('admin.product_table_list.update',$product->tableLists()->first()->id)}}" role="form">
                                                        {{csrf_field()}}
                                                        {{method_field('PUT')}}

                                                        <div class="form-group outer-repeater">
                                                            <label class="control-label">آیتم</label>
                                                            <div data-repeater-list="items" class="outer">
                                                                @foreach($product->tableLists()->first()->items as $item)

                                                                <div data-repeater-item class="row">
                                                                    <div class="form-group col-lg-10">
                                                                        <input value="{{$item['item']}}" name="item" type="text" class="inner form-control"
                                                                               placeholder="آیتم" >
                                                                    </div>

                                                                    <div class="col-lg-2 align-self-center">
                                                                        <input data-repeater-delete type="button" class="btn btn-primary btn-block"
                                                                               value="حذف">
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                            <input data-repeater-create type="button" class="btn btn-success inner"
                                                                   value="افزودن جدید">

                                                        </div>


                                                        <button type="submit" class="btn btn-primary mt-2">
                                                            ثبت
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->



                                </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($product->tableLists as $tableList)
                            @if(!$loop->first)
                            <tr>
                                @foreach($tableList->items as $item)
                                <td>{{$item['item']}}</td>
                                @endforeach

                                <td>

                                    <form class="form-horizontal deleteConfirm" method="POST"
                                          action="{{route('admin.product_table_list.destroy',$tableList->id)}}" role="form">

                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-link btn-rounded waves-effect text-danger">
                                            <i class="fa fa-trash font-size-16 align-middle mr-1"></i>
                                        </button>

                                        <a href="#" data-toggle="modal"
                                           data-target=".table-modal-{{$tableList->id}}">
                                            <i class="fa fa-edit font-size-16 align-middle mr-1"></i>  </a>

                                    </form>
                                    <!--  Modal content for the above example -->
                                    <div class="modal fade table-modal-{{$tableList->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="table-modal-create" aria-hidden="true"
                                         style="display: none;">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0" id="table-modal-create">ثبت
                                                        ایتم جدید</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form class="form-horizontal " method="POST"
                                                          action="{{route('admin.product_table_list.update',$tableList->id)}}" role="form">
                                                        {{csrf_field()}}
                                                        {{method_field('PUT')}}

                                                        <div class="form-group outer-repeater">
                                                            <label class="control-label">آیتم</label>
                                                            <div data-repeater-list="items" class="outer">
                                                                @foreach($tableList->items as $item)

                                                                    <div data-repeater-item class="row">
                                                                        <div class="form-group col-lg-10">
                                                                            <input value="{{$item['item']}}" name="item" type="text" class="inner form-control"
                                                                                   placeholder="آیتم" >
                                                                        </div>

                                                                        <div class="col-lg-2 align-self-center">
                                                                            <input data-repeater-delete type="button" class="btn btn-primary btn-block"
                                                                                   value="حذف">
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <input data-repeater-create type="button" class="btn btn-success inner"
                                                                   value="افزودن جدید">

                                                        </div>


                                                        <button type="submit" class="btn btn-primary mt-2">
                                                            ثبت
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->


                                </td>


                            </tr>
                            @endif

                        @endforeach

                        </tbody>
                    </table>
                        @endif
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm mt-1" data-toggle="modal"
                            data-target=".table-modal-create">
                        ثبت جدید
                    </button>

                    <!--  Modal content for the above example -->
                    <div class="modal fade table-modal-create" tabindex="-1" role="dialog"
                         aria-labelledby="table-modal-create" aria-hidden="true"
                         style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="table-modal-create">ثبت
                                        ایتم جدید</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form class="form-horizontal " method="POST"
                                          action="{{route('admin.product_table_list.store')}}" role="form">
                                        {{csrf_field()}}
                                        <input name="product_id" value="{{$product->id}}" type="hidden">

                                        <div class="form-group outer-repeater">
                                            <label class="control-label">آیتم</label>
                                            <div data-repeater-list="items" class="outer">
                                                <div data-repeater-item class="row">
                                                    <div class="form-group col-lg-10">
                                                        <input name="item" type="text" class="inner form-control"
                                                               placeholder="آیتم" >
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


                                        <button type="submit" class="btn btn-primary mt-2">
                                            ثبت
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->


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




    </script>




@endsection
