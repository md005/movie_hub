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
            <li><a href="{{URL::to('/manage-category')}}">Manage User</a></li>
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
                    <h2>Manage User</h2>
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
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admin as $aa)
                                <tr>
                                    <td>{{$aa->admin_name}}</td>
                                    <td>
                                        @if($aa->access_label=='1')
                                        <p>Super</p>
                                        @elseif($aa->access_label=='2') 
                                        <p>Manager</p>
                                        @else
                                        <p>Frontend User</p>
                                        @endif
                                    </td>
                                    <td>{{$aa->email_address}}</td>
                                    <td>
                                        @if($aa->activation_status=='1')
                                        <a <?php if ($aa->access_label == '2' || $aa->access_label == '3') { ?> href="{{URL::to('unpublish-user-status/'.$aa->admin_id)}}" <?php } ?> href='' class="btn btn-sm btn-success">Active</a>
                                        @else
                                        <a <?php if ($aa->access_label == '2' || $aa->access_label == '3') { ?> href="{{URL::to('publish-user-status/'.$aa->admin_id)}}" <?php } ?>  class="btn btn-sm btn-danger">Inactive</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if(($aa->access_label=='2'||$aa->access_label == '3') && $aa->admin_id!=Session::get('admin_id') )
                                        <a href="{{URL::to('edit-user/'.$aa->admin_id)}}" class="btn btn-sm btn-success">Edit</a>
                                        <a onclick="return confirm('Are you sure?')" href="{{URL::to('delete-user/'.$aa->admin_id)}}" class="btn btn-sm btn-danger">Delete</a>
                                        @endif
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