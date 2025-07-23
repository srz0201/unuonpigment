@extends('admin.layouts.master')
@section('pageStylePlugins')
    <link href="{{url('')}}/admin/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css"
          rel="stylesheet" type="text/css"/>

    <link href="{{url('')}}/admin/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('')}}/admin/assets/global/plugins/dropzone/basic.min.css" rel="stylesheet"
          type="text/css"/>

    <link href="{{url('')}}/admin/assets/pages/css/portfolio-rtl.min.css" rel="stylesheet" type="text/css"/>

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
                            <a href="{{route('sample.index')}}">شرکتها</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span>{{$sample->title}}</span>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span>گالری</span>
                        </li>

                    </ul>
                </div>

                @include('admin.sample.sampleMenu')

                <div class="row">
                    <div class="col-md-12">
                        <div class="m-heading-1 border-green m-bordered">
{{--                            <p> سایز مناسب عکس 320x320 </p>--}}
                        </div>
                        <form action="{{route('sample_gallery.store')}}" method="post" enctype="multipart/form-data"
                              class="dropzone dropzone-file-area" id="my-dropzone"
                              style="width: 500px; margin-top: 50px;">
                            @csrf
                            <input type="hidden" value="{{$sample->id}}" name="sample_id">
                            <h3 class="sbold">برای اپلود عکس کلیک کنید</h3>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-share font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp bold uppercase">گالری</span>
                            </div>
                        </div>
                        <div class="portlet-body">


                            <h4 class="block">گالری محصول</h4>
                            <div class="row">
                                @foreach($sample->galleries as $image)
                                    <div class="col-sm-12 col-md-3">
                                        <div class="thumbnail">
                                            <img src="{{asset($image->thumb_image)}}" alt="100%x200"
                                                 style="width: 320px; height: auto; display: block;"
                                                 data-src="{{asset($image->thumb_image)}}">

                                            <div class="caption">


                                                <form action="{{route('sample_gallery.destroy',$image)}}" class=" "
                                                      method="post">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                    <button type="submit" class="btn red"><i class="fa fa-trash"></i>
                                                    </button>
                                                </form>


                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
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
    <script src="{{url('')}}/admin/assets/global/plugins/datatables/datatables.min.js"
            type="text/javascript"></script>
    <script src="{{url('')}}/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
            type="text/javascript"></script>

    <script src="{{url('')}}/admin/assets/global/plugins/dropzone/dropzone.min.js"
            type="text/javascript"></script>

    <script src="{{url('')}}/admin/assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>

    <script src="{{url('')}}/admin/assets/pages/scripts/portfolio-1.min.js" type="text/javascript"></script>


@endsection
@section('pageScripts')
    <script src="{{url('')}}/admin/assets/pages/scripts/table-datatables-fixedheader.min.js"
            type="text/javascript"></script>

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
