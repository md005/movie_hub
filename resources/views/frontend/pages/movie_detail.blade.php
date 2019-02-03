@extends('frontend.home_master')
@section('home_content')

<aside id="colorlib-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12 breadcrumbs text-center">
                <h2>Movie detail</h2>
                <p><span><a href="{{URL::to('/')}}">Home</a></span> / <span>Movie Single</span></p>
            </div>
        </div>
    </div>
</aside>

<div id="colorlib-container">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12 content">
                <div class="row row-pb-lg">
                    <div class="col-md-12">
                        <div class="blog-entry">
                            <div class="blog-img blog-detail">
                                <img src="{{asset('public/movie_images/'.$view_single_movie->movie_image)}}" class="img-responsive" alt="" style="height: 420px;">
                            </div>
                            <div class="desc">
                                <p class="meta">
                                    <span class="cat"><a href="#">Movie Release Date</a></span>
                                    <span class="date">{{$view_single_movie->movie_release_date}}</span>
                                    <span class="pos">Movie Genre <a href="#">{{$view_single_movie->movie_genre}}</a></span>
                                </p>
                                <h2><a href="">{{$view_single_movie->movie_title}}</a></h2>
                                <p><?php echo $view_single_movie->movie_long_description; ?></p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-pb-lg">
                    <div class="col-md-12">
                        <!--<h2 class="heading-2">23 Comments</h2>-->
                        <?php $get_all_comment = DB::table('tbl_comment')->get(); ?>
                        @if(isset($get_all_comment))
                        @foreach($get_all_comment as $v_get_all_comment)
                        <div class="review">
                            <div class="user-img" style="background-image: url({{asset('public/frontent_resource/images/blog-5.jpg')}})"></div>
                            <div class="desc">
                                <h4>
                                    <span class="text-left">{{$v_get_all_comment->comment_person_name}}</span>
                                    <!--<span class="text-right">24 March 2018</span>-->
                                </h4>
                                <p><?php echo $v_get_all_comment->comment_person_comment; ?></p>
<!--                                <p class="star">
                                    <span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                </p>-->
                            </div>
                        </div>
                        @endforeach
                        @endif
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="heading-2">Say something</h2>
                        <!--<form action="#">-->
                        <!-- @@@@@@@@@@ Start Messages @@@@@@@@@@@@ -->
                        @if(Session::has('success'))
                        <div class="alert alert-success alert-icon-left" role="alert">

                            <div class="float-xs-left">
                                <i class="fa fa-check"></i>   <strong>Success !</strong> {{Session::get('success')}}.
                            </div>
                        </div>
                        @elseif(Session::has('error'))
                        <div class="alert alert-danger alert-icon-left" role="alert">

                            <div class="float-xs-left">
                                <i class="fa fa-times-circle"></i>   <strong>Opps !</strong> {{Session::get('error')}}.
                            </div>
                        </div>
                        @endif
                        <!-- @@@@@@@@@@ End Messages @@@@@@@@@@@@ -->
                        {!! Form::open(['url' => '/save-comment','method'=>'post' ]) !!}
                        <input type="hidden" name="movie_id" value="{{$view_single_movie->movie_id}}"/>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <!-- <label for="fname">First Name</label> -->
                                    <input type="text" id="fname" class="form-control" placeholder="Your Name" name="comment_person_name" required>
                                </div>
                                <div class="col-md-6">
                                    <!-- <label for="lname">Last Name</label> -->
                                    <input type="text" id="lname" class="form-control" placeholder="Your E-mail" name="comment_person_email" required>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <!-- <label for="message">Message</label> -->
                                    <textarea name="comment_person_comment" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn btn-primary">
                            </div>
                        <!--</form>-->	
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection