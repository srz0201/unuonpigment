<!--Videos Start-->
<section class="project-two project-three ">
    <div class="project-two__bottom">
        <div class="project-two__container">
            <!--                    <div class="section-title text-center">-->
            <!--                        <h2 class="section-title__title">latest videos</h2>-->
            <!--                    </div>-->
            <div class="owl-carousel owl-theme thm-owl__carousel project-two__carousel" data-owl-options='{
                        "loop": true,
                        "autoplay": true,
                        "margin": 30,
                        "nav": false,
                        "dots": true,
                        "smartSpeed": 500,
                        "autoplayTimeout": 10000,
                        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                        "responsive": {
                            "0": {
                                "items": 1
                            },
                            "768": {
                                "items": 2
                            },
                            "992": {
                                "items": 3
                            }
                        }
                    }'>
                @foreach($medias as $media)
                <div class="project-two__single">
                    <div class="project-two__img">
                        <img src="{{asset($media->image)}}" alt="{{$media->title}}" title="{{$media->title}}">

                        <a href="#" class="play-bottom" data-bs-toggle="modal" data-bs-target="#video{{$media->id}}">
                            <div class="main-slider__video-icon">
                                <span class="fa fa-play"></span>
                                <i class="ripple"></i>
                            </div>
                        </a>

                    </div>
                </div>
                @endforeach


            </div>



        </div>
    </div>
</section>

@foreach($medias as $media)
<!-- Modal -->
<div class="modal fade" id="video{{$media->id}}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <video class="player" width="100%" height="auto" controls>
                    <source src="{{asset($media->video)}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

        </div>
    </div>
</div>
<!--Videos  End-->
@endforeach
