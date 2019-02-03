<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Movie Hub Admin Login</title>
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/img/ico/favicon.html">
        <!-- Start Global Mandatory Style
             =====================================================================-->
        <!-- Material Icons CSS -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('public/backend_resource/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Animation Css -->
        <link href="{{asset('public/backend_resource/assets/plugins/animate/animate.css')}}" rel="stylesheet" />
        <!-- materialize css -->
        <link href="{{asset('public/backend_resource/assets/plugins/materialize/css/materialize.min.css')}}" rel="stylesheet">
        <!-- custom CSS -->
        <link href="{{asset('public/backend_resource/assets/dist/css/stylematerial.css')}}" rel="stylesheet">
        <style>
            input[type=text], input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }
            span.password {
                float: right;
                /*padding-top: 16px;*/
            }
        </style>
    </head>

    <body class="sign-section">
        <div class="container sign-cont animated zoomIn">
            <div class="row sign-row">
                <div class="sign-title">
                    <h2 class="teal-text">Movie Hub Admin Login</h2>
                    <h4 align="center" style="color: red">
                        <?php
                        $exception = Session::get('exception');
                        if (isset($exception)) {
//                            echo '<h4 align="center" style="color: red">'.$exception.'</h4>';
                            echo $exception;
                            Session::put('exception', '');
                        }
                        ?>
                    </h4>
                    <h4 align="center" style="color: green">
                        <?php
                        $message = Session::get('message');
                        if (isset($message)) {
//                            echo '<h4 align="center" style="color: green" class="text-light">'.$message.'</h4>';
                            echo $message;
                            Session::put('message', '');
                        }
                        ?>
                    </h4>
                </div>
                <!--<form class="col s12" id="reg-form">-->
                {!! Form::open(['url' => '/admin-login', 'method' => 'post', 'class'=> 'col s12', 'id'=> 'reg-form']) !!}

                <div class="row form-control"> <!--container-->
                    <div class="col-md-4 form-group">
                        <label class="teal-text" for="uname"><b>Email</b></label>
                    </div>

                    <div class="col-md-6 form-group">
                        <input class="form-control col-md-6" type="text" placeholder="Email" name="email" required>
                    </div>

                    <br/>
                    <div class="col-md-4 form-group">
                        <label class="teal-text" for="password"><b>Password</b></label>
                    </div>

                    <div class="col-md-6 form-group">
                        <input class="form-control col-md-6" type="password" placeholder="Password" name="password" required>
                    </div>

                </div>

                <div class="row sign-row">
                    <div class="input-field col s6 ">
                        <button class="btn btn-large btn-register waves-effect waves-light green" type="submit" name="action">Login
                            <i class="material-icons right">done_all</i>
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
                <!--</form>-->

            </div>
            <a title="Login" class="sign-btn btn-floating btn-large waves-effect waves-light green">
                <i class="material-icons">perm_identity</i></a>
        </div>

        <!-- Start Core Plugins
             =====================================================================-->
        <!-- jQuery -->
        <script src="{{asset('public/backend_resource/assets/plugins/jQuery/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
        <!-- materialize  -->
        <script src="{{asset('public/backend_resource/assets/plugins/materialize/js/materialize.min.js')}}" type="text/javascript"></script>
        <!-- End Core Plugins
             =====================================================================-->
        <script>
$(document).ready(function () {
    $('select').material_select();
});
        </script>
    </body>
</html>