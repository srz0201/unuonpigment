@extends('admin.layouts.master')
@section('seo')
    <title>{{$page->title}}</title>
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
                <h4 class="page-title mb-0 font-size-18">{{$page->title}}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">داشبرد</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.page.index')}}">صفحات</a></li>
                        <li class="breadcrumb-item active">{{$page->title}}</li>
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
                        <form action="{{route('admin.page.gallery.store')}}" class="dropzone">
                            @csrf
                            <input name="model_id" type="hidden" value="{{$page->id}}">

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
                        @foreach($page->gallery as $gallery)
                            <div class="col-2 float-right text-center">
                                <div>
                                    <img src="{{asset($gallery->thumb)}}" alt="" class="rounded avatar-md">
                                    <form method="post" action="{{route('admin.gallery.destroy',$gallery)}}"
                                          class="mt-1">
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

                    <table id="b_datatable" class="table table-striped table-bordered dt-responsive nowrap base_datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                        @foreach($page->comments()->latest()->get() as $item)
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


@endsection


@section('scripts')
    <!-- Required datatable js -->
    <script src="{{asset('assets/admin')}}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets/admin')}}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{asset('assets/admin')}}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('assets/admin')}}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Plugins js -->
    <script src="{{asset('assets/admin')}}/libs/dropzone/min/dropzone.min.js"></script>


@endsection
