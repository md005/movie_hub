@extends('frontend.home_master')
@section('home_content')

<!-- main slider -->
@include('frontend.main_slider')
<!-- //main slider -->

<div id="colorlib-container">
    <div class="container">

        <div class="row row-pb-md">
            <div class="col-md-8">
                <div class="blog-entry">
                    <div class="blog-img">
                        <div class="video colorlib-video" ><!--style="background-image: url({{asset('public/frontent_resource/images/blog-8.jpg')}});"-->
                            <!--<a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-play"></i></a>-->
                            <iframe width="901" height="507" src="https://www.youtube.com/embed/lK3-NkkHiXc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <!--<div class="overlay"></div>-->
                        </div>
                    </div>
                    <div class="desc">
<!--                        <p class="meta">
                            <span class="cat"><a href="#">Watch</a></span>
                            <span class="date">20 March 2018</span>
                            <span class="pos">By <a href="#">Rich</a></span>
                        </p>-->
                        <h2><a href="{{URL::to('/')}}">Watch our video on 2019 upcoming movies</a></h2>
                        <!--<p>A small river named Duden flows by their place and supplies it with the necessary </p>-->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-entry">
                    <div class="blog-img">
                        <a href="{{URL::to('/')}}"><img src="{{asset('public/frontent_resource/images/blog-7.jpg')}}" class="img-responsive" alt="html5 bootstrap template"></a>
                    </div>
                    <div class="desc">
<!--                        <p class="meta">
                            <span class="cat"><a href="#">Events</a></span>
                            <span class="date">20 March 2018</span>
                            <span class="pos">By <a href="#">Rich</a></span>
                        </p>-->
                        <h2><a href="{{URL::to('/')}}">2019 Upcoming Videos.</a></h2>
                        <p>A small river named Duden flows by their place and supplies it with the necessary </p>
                        <p>A small river named Duden flows by their place and supplies it with the necessary </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-pb-md">
            <?php $all_movie_list = DB::table('tbl_movie')->where('status',1)->get(); ?>
            @foreach($all_movie_list as $v_all_movie_list)
            <div class="col-md-4">
                <div class="blog-entry">
                    <div class="blog-img">
                        <a href="{{URL::to('movie-details/'.$v_all_movie_list->movie_id)}}"><img src="{{asset('public/movie_images/'.$v_all_movie_list->movie_image)}}" class="img-responsive" alt="" style="height: 240px;"></a>
                    </div>
                    <div class="desc">
                        <p class="meta">
                            <span class="cat"><a href="#">Release Date</a></span>
                            <span class="date">{{$v_all_movie_list->movie_release_date}}</span>
                            <span class="pos">Genre <a href="#">{{$v_all_movie_list->movie_genre}}</a></span>
                        </p>
                        <h2><a href="{{URL::to('movie-details/'.$v_all_movie_list->movie_id)}}">{{$v_all_movie_list->movie_title}}</a></h2>
                        <p><?php echo substr($v_all_movie_list->movie_long_description, 0,65); ?>...</p>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>

<!--        <div class="row">
            <div class="col-md-12 text-center">
                <ul class="pagination">
                    <li class="disabled"><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>-->
    </div>
</div>

@endsection