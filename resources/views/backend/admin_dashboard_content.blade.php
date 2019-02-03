@extends('backend.admin_master')
@section('admin_main_content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="header-icon">
        <i class="fa fa-tachometer"></i>
    </div>
    <div class="header-title">
        <h1> Dashboard</h1>
        <small> Dashboard features</small>
        <ul class="link hidden-xs">
            <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <!--<li><a href="index.html">Dashboard</a></li>-->
        </ul>
    </div>
</section>
<!-- page section -->
<div class="container-fluid">
    <div class="row">
        <!-- Calender -->
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-calendar-check-o fa-lg"></i>
                    <h2>Calender</h2>
                </div>
                <div class="card-content">
                    <!-- monthly calender -->
                    <div class="monthly_calender">
                        <div class="monthly" id="m_calendar"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Calender -->

        <!-- Google Map -->
        <!--<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
        <!--    <div class="card">-->
        <!--        <div class="card-header">-->
        <!--            <i class="fa fa-map fa-lg"></i>-->
        <!--            <h2>Google Map</h2>-->
        <!--        </div>-->
        <!--        <div class="card-content">-->
                    <!-- Google map -->
        <!--            <div class="embed-container">-->
        <!--                <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387144.0075834208!2d-73.97800349999999!3d40.7056308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY!5e0!3m2!1sen!2sus!4v1394298866288' height='340' style='border:0'></iframe>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- ./Google Map -->



    </div>
    <!-- ./row -->
</div>
<!-- ./cotainer -->

@endsection