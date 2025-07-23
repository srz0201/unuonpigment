<!-- rts blog area start -->
<div class="rts-blog-area rts-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-style-two-center">
                    <h2 class="title">{{trans('lang.latest news and articles')}}</h2>
                </div>
            </div>
        </div>
        <div class="row g-24 mt--40">
            @foreach($last_newss as $last_news)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="single-blog-three">
                        <a href="{{$last_news->path()}}" class="thumbnail">
                            <img src="{{asset($last_news->thumb_path)}}"  alt="{{$last_news->title}}" title="{{$last_news->title}}">
                        </a>
                        <div class="inner-content-area">

                            <a href="{{$last_news->path()}}">
                                <h3 class="title">
                                    {{$last_news->title}}
                                </h3>
                            </a>
                            <div class="bottom-area">
                                <div class="left">
                                    <div class="info">
                                        <h5 class="title">{{trans('lang.SEO team')}}</h5>
                                        <span>{{trans('lang.author')}}</span>
                                    </div>
                                </div>
                                <a href="{{$last_news->path()}}" class="rts-btn btn-primary">{{trans('lang.read detail')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- rts blog area end -->
