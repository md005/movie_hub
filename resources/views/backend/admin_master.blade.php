<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Movie Hub Admin Dashboard</title>
        <!-- Favicon and touch icons -->
        <!--<link rel="shortcut icon" href="{{asset('public/backend_resource/assets/dist/img/ico/fav.png')}}">-->
        <!-- Start Global Mandatory Style
             =====================================================================-->
        <!-- jquery-ui css -->
        <link href="{{asset('public/backend_resource/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- materialize css -->
        <link href="{{asset('public/backend_resource/assets/plugins/materialize/css/materialize.min.css')}}" rel="stylesheet">
        <!-- Bootstrap css-->
        <link href="{{asset('public/backend_resource/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Animation Css -->
        <link href="{{asset('public/backend_resource/assets/plugins/animate/animate.css')}}" rel="stylesheet" />
        <!-- Material Icons CSS -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('public/backend_resource/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Monthly css -->
        <link href="{{asset('public/backend_resource/assets/plugins/monthly/monthly.css')}}" rel="stylesheet" type="text/css" />
        <!-- simplebar scroll css -->
        <link href="{{asset('public/backend_resource/assets/plugins/simplebar/dist/simplebar.css')}}" rel="stylesheet" type="text/css" />
        <!-- mCustomScrollbar css -->
        <link href="{{asset('public/backend_resource/assets/plugins/malihu-custom-scrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" type="text/css" />
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css">
        
        <!-- custom CSS -->
        <link href="{{asset('public/backend_resource/assets/dist/css/stylematerial.css')}}" rel="stylesheet">
        <style>
            .navbar-brand > img {
                width: 80px;
    height: 65px;
    display: block;
    margin: 0 auto;
            }
            @media (max-width: 767px) {

    .navbar-brand > img {
    width: 70px;
    height: 55px;
    display: block;
    margin: 0 auto;
}
}
        </style>

    </head>

    <body>
        <div id="wrapper">
            <!--navbar top-->
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <!-- Logo -->
<!--                <a class="navbar-brand pull-left" href="{{URL::to('dashboard')}}">
                    <img src="{{asset('public/frontent_resource/images/logo2.png')}}" alt="logo" width="150" height="150">
                </a>-->
                <a id="menu-toggle">
                    <i class="material-icons">apps</i>
                </a>
                <div class="navbar-custom-menu hidden-xs">

                    <ul class="navbar navbar-right">
                        <!--user profile-->
                        <li class="dropdown">
                            <a class='dropdown-button user-pro' href='javascript:void(0)' data-activates='dropdown-user'>
                                <img style="visibility:hidden;" src="{{asset('public/backend_resource/assets/dist/img/avatar5.png')}}" class="img-circle" height="45" width="50" alt="User Image">
                                <span style="color: black; margin-right: 15px;">{{Session::get('admin_name')}}</span>
                            </a>
                            <ul id='dropdown-user' class='dropdown-content'>

                                <li>
                                    <a href="{{URL::to('/logout')}}"><i class="material-icons">lock</i> Logout</a>
                                </li>
                            </ul>
                        </li>
                        <!-- /.user profile -->
                    </ul>
                </div>
            </nav>
            <!-- Sidebar -->
            <div id="sidebar-wrapper" class="waves-effect" data-simplebar>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="active-link"><a href="{{URL::to('/dashboard')}}"><i class="material-icons">dashboard</i>Dashboard</a></li>
                            <li class="active-link"><a href="{{URL::to('/')}}" target="_blank"><i class="material-icons">home</i>Movie Hub</a></li>
                            
                            <li>
                                <a><i class="material-icons">menu</i>Movie<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li><a href="{{URL::to('/add-movie')}}">Add Movie</a></li>
                                    <li><a href="{{URL::to('/manage-movie')}}">Manage Movie</a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <a><i class="material-icons">menu</i>Comment<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li><a href="{{URL::to('/manage-comment')}}">Manage Comment's</a></li>
                                </ul>
                            </li>
                            
                                                        
                            @if(Session::get('access_label')=='1')
                            <li>
                                <a><i class="material-icons">perm_identity</i>Admin<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li><a href="{{URL::to('/add-user')}}">Add Admin</a></li>
                                    <li><a href="{{URL::to('/manage-user')}}">Manage Admin</a></li>
                                </ul>
                            </li>
                            @endif
                            <li>
                                <a href="{{URL::to('/logout')}}"><i class="material-icons">lock</i> Logout</a>
                            </li>
                        </ul>
                        <!-- ./sidebar-nav -->
                    </div>
                    <!-- ./sidebar -->
                </div>
                <!-- ./sidebar-nav -->
            </div>
            <!-- ./sidebar-wrapper -->
            <!-- Page content -->
            <div id="page-content-wrapper">
                <div class="page-content">
                    @yield('admin_main_content')
                </div>
                <!-- ./page-content -->
            </div>
            <!-- ./page-content-wrapper -->
        </div>
        <!-- ./page-wrapper -->
        <!-- Preloader -->
        <div id="preloader">
            <div class="preloader-position">
                <div class="preloader-wrapper big active">
                    <div class="spinner-layer spinner-teal">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Preloader -->

        <!-- Start Core Plugins
             =====================================================================-->
        <!-- jQuery -->
        <script src="{{asset('public/backend_resource/assets/plugins/jQuery/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
        <!-- jquery-ui -->
        <script src="{{asset('public/backend_resource/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="{{asset('public/backend_resource/assets/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <!-- materialize  -->
        <script src="{{asset('public/backend_resource/assets/plugins/materialize/js/materialize.min.js')}}" type="text/javascript"></script>
        <!-- metismenu-master -->
        <script src="{{asset('public/backend_resource/assets/plugins/metismenu-master/dist/metisMenu.min.js')}}" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="{{asset('public/backend_resource/assets/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <!-- m-custom-scrollbar -->
        <script src="{{asset('public/backend_resource/assets/plugins/malihu-custom-scrollbar/jquery.mCustomScrollbar.concat.min.js')}}" type="text/javascript"></script>
        <!-- scroll -->
        <script src="{{asset('public/backend_resource/assets/plugins/simplebar/dist/simplebar.js')}}" type="text/javascript"></script>
        <!-- custom js -->
        <script src="{{asset('public/backend_resource/assets/dist/js/custom.js')}}" type="text/javascript"></script>
        <!-- End Core Plugins
             =====================================================================-->
        <!-- Start Page Lavel Plugins
             =====================================================================-->
        <!-- Sparkline js -->
        <script src="{{asset('public/backend_resource/assets/plugins/sparkline/sparkline.min.js')}}" type="text/javascript"></script>
        <!-- Counter js -->
        <script src="{{asset('public/backend_resource/assets/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
        <!-- ChartJs JavaScript -->
        <script src="{{asset('public/backend_resource/assets/plugins/chartJs/Chart.min.js')}}" type="text/javascript"></script>
        <!-- Monthly js -->
        <script src="{{asset('public/backend_resource/assets/plugins/monthly/monthly.js')}}" type="text/javascript"></script>
        <!-- ckeditor js -->
        <script src="{{asset('public/backend_resource/assets/plugins/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
        <!--<script src="//cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>-->
        <!-- End Page Lavel Plugins
             =====================================================================-->
        <!-- Start Theme label Script
             =====================================================================-->
        <!-- main js-->
        <script src="{{asset('public/backend_resource/assets/dist/js/main.js')}}" type="text/javascript"></script>
        <!-- End Theme label Script
             =====================================================================-->
        <script>
            $(document).ready(function () {
                "use strict";
                // Message
                function slscroll() {
                    $('.chat_list , .activity-list , .message_inner').slimScroll({
                        size: '3px',
                        height: '320px',
                        allowPageScroll: true,
                        railVisible: true
                    });
                }
                slscroll();
                function chatscroll() {
                    $('.chat_list').slimScroll({
                        size: '3px',
                        height: '290px'
                    });
                }
                chatscroll();

                //monthly calender
                $('#m_calendar').monthly({
                    mode: 'event',
                    //jsonUrl: 'events.json',
                    //dataType: 'json'
                    xmlUrl: 'events.xml'
                });

                //panel refresh
                $.fn.refreshMe = function (opts) {
                    var $this = this,
                            defaults = {
                                ms: 1500,
                                started: function () {},
                                completed: function () {}
                            },
                            settings = $.extend(defaults, opts);

                    var panelToRefresh = $this.parents('.panel').find('.refresh-container');
                    var dataToRefresh = $this.parents('.panel').find('.refresh-data');
                    var ms = settings.ms;
                    var started = settings.started;		//function before timeout
                    var completed = settings.completed;	//function after timeout

                    $this.click(function () {
                        $this.addClass("fa-spin");
                        panelToRefresh.show();
                        started(dataToRefresh);
                        setTimeout(function () {
                            completed(dataToRefresh);
                            panelToRefresh.fadeOut(800);
                            $this.removeClass("fa-spin");
                        }, ms);
                        return false;
                    });
                };

                $(document).ready(function () {
                    $('.refresh, .refresh2').refreshMe({
                        started: function (ele) {
                            ele.html("Getting new data..");
                        },
                        completed: function (ele) {
                            ele.html("This is the new data after refresh..");
                        }
                    });
                });

            });
        </script>
                <script>
            "use strict";
            $(function () {
//                $('select').material_select();
                Materialize.updateTextFields();
                // autocomplete
//                $('input.autocomplete').autocomplete({
//                    data: {
//                        "Apple": null,
//                        "Microsoft": null,
//                        "Google": 'https://placehold.it/250x250'
//                    },
//                    limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
//                    onAutocomplete: function (val) {
//                        // Callback function when value is autcompleted.
//                    },
//                    minLength: 1 // The minimum length of the input for the autocomplete to start. Default: 1.
//                });

                //datepicker
                $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15 // Creates a dropdown of 15 years to control year
                });
            });
        </script>
                <!-- dataTables js -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
        <script>
        $(document).ready(function() {
    var table = $('#example').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
        
        </script>
        
        <script>
            $(function () {
                "use strict";
                CKEDITOR.replace('ckEdit1');
            });
            $(function () {
//                "use strict"; // Start of use strict
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('ckEdit');
            });
        </script>
        
        
    </body>

</html>