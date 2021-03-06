@extends('backend.admin_master')
@section('admin_main_content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="header-icon">
        <i class="fa fa-tachometer"></i>
    </div>
    <div class="header-title">
        <h1> Dashboard</h1>
        <small> Dashboard content</small>
        <ul class="link hidden-xs">
            <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{URL::to('')}}">Edit Movie</a></li>
        </ul>
    </div>
</section>
<!-- page section -->
<!-- page section -->
<div class="container-fluid">
    <div class="row">
        <!-- forms cntrol -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
<!--                    <i class="fa fa-file-o fa-lg"></i>
                    <h2>Bootstrap Froms</h2>-->
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
                </div>
                <div class="card-content">
                    <!--<form class="form-horizontal" method="post">-->
                    {!! Form::open(['url' => '/update-movie','method'=>'post','role'=>'form','files' => true, 'enctype' => 'multipart/form-data', 'class'=> 'form-horizontal' ]) !!}
                    <h2 class="text-center">Edit Movie</h2>
                    <fieldset>
                        <!-- Text input-->
                        <input type="hidden" value="{{Session::get('admin_id')}}" name="admin_id">
                        <input type="hidden" value="{{$result->movie_id}}" name="movie_id">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Movie Title:</label>
                            <div class="col-md-4">
                                <div class="input-field">
                                    <input class="form-control" name="movie_title" type="text"  value="{{$result->movie_title}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Movie Description:</label>
                            <div class="col-md-6" >
                                <div class="input-field" >
                                    <textarea id="ckEdit" rows="4" cols="50" name="movie_long_description" style="height: 300px">{{$result->movie_long_description}}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Movie Release Date:</label>
                            <div class="col-md-4">
                                <div class="input-field">
                                    <input class="form-control datepicker" style="background-color: #fff;" type="text" name="movie_release_date" type="text"  value="{{$result->movie_release_date}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Movie Rating:</label>
                            <div class="col-md-4">
                                <div class="input-field form-input">
                                    <select class="form-control movie_selected_rating" name="movie_rating">
                                        <option value="1" <?php if($result->movie_rating==1){ echo 'selected'; } ?>>1</option>
                                        <option value="2" <?php if($result->movie_rating==2){ echo 'selected'; } ?>>2</option>
                                        <option value="3" <?php if($result->movie_rating==3){ echo 'selected'; } ?>>3</option>
                                        <option value="4" <?php if($result->movie_rating==4){ echo 'selected'; } ?>>4</option>
                                        <option value="5" <?php if($result->movie_rating==5){ echo 'selected'; } ?>>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Movie Ticket Price:</label>
                            <div class="col-md-4">
                                <div class="input-field">
                                    <input class="form-control" name="movie_ticket_price" type="text"  value="{{$result->movie_ticket_price}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Movie Country:</label>
                            <div class="col-md-4">
                                <div class="input-field">
                                    <input class="form-control" name="movie_country" type="text"  value="{{$result->movie_country}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Movie Genre:</label>
                            <div class="col-md-4">
                                <div class="input-field">
                                    <input class="form-control" name="movie_genre" type="text"  value="{{$result->movie_genre}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Previous Image:</label>
                            <div class="col-md-4">
                                <label class="col-md-4 control-label">
                                    <img width="250" height="150" src="{{asset('public/movie_images/'.$result->movie_image)}}">
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="{{$result->movie_image}}" name="last_image_path">
                            <label class="col-md-4 control-label">Movie Image (optional):</label>
                            <div class="col-md-4">
                                <div class="input-field">
                                    <input class="form-control"  type="file" name="movie_image">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Movie Status:</label>
                            <div class="col-md-4">
                                <div class="input-field form-input">
                                    <select class="form-control" name="status">
                                        @if($result->status=='1')
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                        @else
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- ./Text input-->

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <!--<input type="submit" value="Save" />-->
                                <button type="submit" class="btn btn-success">Update <span class="glyphicon glyphicon-send"></span></button>
                            </div>
                        </div>

                    </fieldset>
                    {!! Form::close() !!}
                    <!--</form>-->
                </div>
            </div>
        </div>

    </div>
    <!-- ./row -->
</div>
<!-- ./cotainer -->

@endsection