@extends('backend.admin_master') @section('admin_main_content')

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
            <li><a href="{{URL::to('/manage-movie')}}">Manage Movie</a></li>
        </ul>
    </div>
</section>
<!-- page section -->

<div class="container-fluid">
    <div class="row">
        <!-- Data tables -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-table fa-lg"></i>
                    <h2>Manage Movie</h2>
                    <br/>
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

                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Movie Title</th>
                                    <th>Movie Genre</th>
                                    <th>Movie Rating</th>
                                    <th>Movie Description</th>
                                    <th>Movie Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @foreach($movie as $bb)
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td>{{$bb->movie_title}}</td>
                                    <td>{{$bb->movie_genre}}</td>
                                    <td>{{$bb->movie_rating}}&nbsp;star</td>
                                    <td><?php echo substr($bb->movie_long_description, 0,50); ?></td>
                                    <td><img class="thumbnail" width="50" height="50" src="{{asset('public/movie_images/'.$bb->movie_image)}}"></td>
                                    <td>
                                        @if($bb->status=='1')
                                        <a href="{{URL::to('unpublish-movie/'.$bb->movie_id)}}" class="btn btn-sm btn-success">Active</a>
                                        @else
                                        <a href="{{URL::to('publish-movie/'.$bb->movie_id)}}" class="btn btn-sm btn-danger">Inactive</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{URL::to('edit-movie/'.$bb->movie_id)}}" class="btn btn-sm btn-success">Edit</a>
                                        <a onclick="return confirm('Are you sure?')" href="{{URL::to('delete-movie/'.$bb->movie_id)}}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./cotainer -->

@endsection