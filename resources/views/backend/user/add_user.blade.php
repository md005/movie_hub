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
            <li><a href="{{URL::to('/add-user')}}">Add User</a></li>
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
                    @if(Session::has('error'))
                    <div class="alert alert-danger alert-icon-left" role="alert">

                        <div class="float-xs-left">
                            <i class="fa fa-times-circle"></i> <strong>Opps !</strong> {{Session::get('error')}}.
                        </div>
                    </div>
                    @endif
                </div>
                <div class="card-content">
                    <!--<form class="form-horizontal" method="post">-->
                    {!! Form::open(['url' => '/save-user','method'=>'post','role'=>'form','files' => true, 'enctype' => 'multipart/form-data', 'class'=> 'form-horizontal' ]) !!}
                    <h2 class="text-center">Add New User</h2>
                    <fieldset>
                        <!-- Text input-->
                        <input type="hidden" value="{{Session::get('admin_id')}}" name="admin_id">

                        <div class="form-group">
                            <label class="col-md-4 control-label">User Name:</label>
                            <div class="col-md-4">
                                <div class="input-field">
                                    <input class="form-control" name="user_name" type="text"  placeholder="User Name" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">User Email(must be unique):</label>
                            <div class="col-md-4">
                                <div class="input-field">
                                    <input class="form-control" name="user_email" type="email"  placeholder="User Email" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">User Password:</label>
                            <div class="col-md-4">
                                <div class="input-field">
                                    <input class="form-control" name="user_password" type="password"  placeholder="User Password" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Access Level:</label>
                            <div class="col-md-4">
                                <div class="input-field form-input">
                                    <select class="form-control" name="access_label">
                                        <option value="" disabled selected>Select Level</option>
                                        <option value="1">Super</option>
                                        <option value="2">Manager</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">User Status:</label>
                            <div class="col-md-4">
                                <div class="input-field form-input">
                                    <select class="form-control" name="status">
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
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
                                <button type="submit" class="btn btn-success">Save <span class="glyphicon glyphicon-send"></span></button>
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