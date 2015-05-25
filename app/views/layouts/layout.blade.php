<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ isset($pageTitle) ? $pageTitle : 'Edu Tech Solutions' }}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

        {{ HTML::style('assets/etsb/etsb_css/bootstrap/bootstrap.min.css') }}
        <link rel="stylesheet" href="{{ URL::asset('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css') }}">
        {{ HTML::style('assets/etsb/etsb_css/ioicons/ionicons.min.css') }}
        {{ HTML::style('assets/etsb/etsb_css/morris/morris.css') }}
        {{ HTML::style('assets/etsb/etsb_css/jvectormap/jquery-jvectormap-1.2.2.css') }}
        {{ HTML::style('assets/etsb/etsb_css/datepicker/datepicker.css') }}
        {{--{{ HTML::style('assets/etsb/etsb_css/datepicker/bootstrap-datetimepicker.css') }}--}}
        {{--{{ HTML::style('assets/etsb/etsb_css/daterangepicker/daterangepicker-bs3.css') }}--}}
        {{ HTML::style('assets/etsb/etsb_css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}
        {{ HTML::style('assets/etsb/etsb_css/style.css') }}
        {{ HTML::script('assets/etsb/etsb_js/jquery/jquery-2.1.1.min.js')}}
        {{ HTML::script('assets/etsb/etsb_js/icheck/icheck.js')}}
        {{ HTML::script('assets/etsb/etsb_js/etsb_scripts.js')}}

        {{--<!--[if lt IE 9]>--}}
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Edu Tech Solutions
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    @section('top_menu')
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            {{ HTML::image('/img/avatar3.png', 'User Image', ['class'=>'img-circle']) }}
                        </div>
                        <div class="pull-left info">
                            <p>Hello,
                                <b> {{ isset(Auth::user()->get()->username) ? ucwords(Auth::user()->get()->username) : ( Auth::applicant()->check() ? ucwords(Auth::applicant()->get()->username) : "Guest !" ) }} </b>
                            </p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    @section('sidebar')
                    @show
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>--}}
                        You are here:  {{ Helpers::breadcrumbs() }}
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    {{--Error handling--}}
                    @if ( isset($errors) and isset($errors->count) and $errors->count() > 0 )
                        <div class="alert alert-danger alert-dismissable">
                            <ul>
                                @foreach($errors->all() as $message )
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{--set some message after action--}}
                      @if (Session::has('message'))
                            <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Success! </b> {{Session::get("message")}}</div>
                      @endif
                      @if(Session::has('error'))
                           <div class="alert alert-error alert-dismissable">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                           <b>Error! </b> {{Session::get("error")}}</div>
                      @endif
                      @if(Session::has('info'))
                          <div class="alert alert-info alert-dismissable">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <b>Info! </b> {{Session::get("info")}}</div>
                      @endif
                      @if(Session::has('danger'))
                           <div class="alert alert-danger alert-dismissable">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                           <b>Alert! </b> {{Session::get("danger")}}</div>

                     @endif
                     @if(Session::has('warning'))
                            <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Warning! </b> {{Session::get("warning")}}</div>

                      @endif

                    @yield('content')

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->





        <!-- add new calendar event modal -->
        {{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
        {{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}
        {{ HTML::script('assets/etsb/etsb_js/bootstrap/bootstrap.min.js')}}



        {{ HTML::script('assets/etsb/etsb_js/raphael/raphael-min.js')}}
        {{ HTML::script('assets/etsb/etsb_js/morris/morris.min.js')}}
        {{ HTML::script('assets/etsb/etsb_js/sparkline/jquery.sparkline.min.js')}}
        {{ HTML::script('assets/etsb/etsb_js/jvectormap/jquery-jvectormap-1.2.2.min.js')}}
        {{ HTML::script('assets/etsb/etsb_js/jvectormap/jquery-jvectormap-world-mill-en.js')}}

        {{-- {{ HTML::script('assets/etsb/etsb_js/jqueryKnob/jquery.knob.js')}}--}}
        {{--{{ HTML::script('assets/etsb/etsb_js/daterangepicker/daterangepicker.js')}}--}}
        {{-- {{ HTML::script('assets/etsb/etsb_js/datepicker/bootstrap-datepicker.js')}}--}}
        {{ HTML::script('assets/etsb/etsb_js/datepicker/bootstrap-datepicker.min.js')}}
        {{--{{ HTML::script('assets/etsb/etsb_js/datepicker/moment-with-locales.js')}}--}}
        {{ HTML::script('assets/etsb/etsb_js/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}
        {{ HTML::script('assets/etsb/etsb_js/icheck/icheck.min.js')}}

        {{ HTML::script('assets/etsb/etsb_js/datatables/jquery.dataTables.js')}}
        {{ HTML::script('assets/etsb/etsb_js/datatables/dataTables.bootstrap.js')}}
        {{ HTML::script('assets/etsb/etsb_js/etsb_custom.js')}}
        {{ HTML::script('assets/etsb/etsb_js/shafi_scripts.js')}}
        {{ HTML::script('assets/js/ratna_script.js')}}

        {{ HTML::script('assets/etsb/etsb_js/admin/app.js')}}
        {{--{{ HTML::script('assets/etsb/etsb_js/admin/dashboard.js')}}--}}
        {{ HTML::script('assets/etsb/etsb_js/admin/demo.js')}}

        {{ HTML::script('assets/etsb/etsb_js/validator/validator.js')}}



        @yield('script_section')

    </body>
</html>