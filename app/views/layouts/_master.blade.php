<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Edu Tech Solutions' }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Edu Tech Solutions">
    <meta name="author" content="Edu Tech Solutions">

    <!-- Bootstrap -->
    {{ HTML::style('assets/css/bootstrap.css') }}
    {{ HTML::style('assets/css/bootstrap.3.2.min.css') }}
    {{ HTML::style('assets/css/bootstrap-responsive.min.css') }}
    {{ HTML::style('assets/css/styles.css')}}
    {{ HTML::style('assets/css/datepicker.css')}}
    {{ HTML::style('assets/css/jquery.dataTables.min.css')}}


    <style>
    .datepicker{z-index:1151 !important;}
    </style>

    {{ HTML::script('assets/js/jquery-2.1.1.min.js') }}
    {{HTML::script('assets/js/jquery-1.11.1.min.js')}}
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" >
    <div class="navbar-inner">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Control Panel</a>
            </div>
            <!-- /.navbar-header -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> Common Module <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu">

                            <li><a tabindex="-1" href="{{ action('CourseController@index') }}"> Course Management </a></li>
                            <li class="divider"></li>

                            <li><a tabindex="-1" href="{{ action('CourseTypeController@index') }}"> Course Type </a></li>
                            <li class="divider"></li>

                            <li><a tabindex="-1" href="{{ action('DegreeLevelController@index') }}"> Degree Level </a></li>
                            <li class="divider"></li>

                            <li><a tabindex="-1" href="{{ action('DegreeProgController@index') }}"> Degree / Program Name </a></li>
                            <li class="divider"></li>

                            <li><a tabindex="-1" href="{{ action('DepartmentController@index') }}"> Department Management </a></li>
                            <li class="divider"></li>

                            <li><a tabindex="-1" href="{{ action('SemesterController@index') }}"> Semester </a></li>
                            <li class="divider"></li>

                            <li><a tabindex="-1" href="{{ action('TargetRoleController@index') }}"> Target Role </a></li>
                            <li class="divider"></li>

                            <li><a tabindex="-1" href="{{ action('TaskListRoleController@index') }}"> Task List </a></li>
                            <li class="divider"></li>

                            <li><a tabindex="-1" href="{{ action('RoleTaskController@index') }}"> Role Task </a></li>
                            <li class="divider"></li>

                            <li><a tabindex="-1" href="{{ action('RoleTaskUserController@index') }}"> Role Task User </a></li>

                            <li class="divider"></li>
                            <li><a tabindex="-1" a href="{{URL::to('subject/list') }}"> Subject Management </a></li>
                            <li class="divider"></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" a href="{{URL::to('year/show') }}"> Year Management </a></li>
                            <li class="divider"></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" a href="{{URL::to('term/show') }}"> All Course Management </a></li>
                            <li class="divider"></li>


                        </ul>
                    </li>

        {{--Start Academic Module--}}

         <li class="dropdown">
                 <a href="" role="button" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-user"></i> Academic Module <i class="caret"></i>
                 </a>
                  <ul class="dropdown-menu">
                       <li><a tabindex="-1" a href="{{URL::to('/index') }}"> Enrollment </a></li>
                       <li class="divider"></li>
                       <li><a tabindex="-1" a href="{{URL::to('academic/amw/') }}">Mark Distribution Courses</a></li>
                       <li class="divider"></li>
                       <li><a tabindex="-1" a href="{{URL::to('class/index') }}">Theory Class</a></li>
                      
                       <li class="divider"></li>
                       <li><a tabindex="-1" a href="{{URL::to('') }}"> </a></li>
                       <li class="divider"></li>
                       <li><a tabindex="-1" a href="{{URL::to('') }}"> </a></li>
                       <li class="divider"></li>
                       <li><a tabindex="-1" a href="{{URL::to('') }}"> </a></li>
                       <li class="divider"></li>
                       <li><a tabindex="-1" a href="{{URL::to('') }}"> </a></li>
                       <li class="divider"></li>
                       <li><a tabindex="-1" a href="{{URL::to('') }}"> </a></li>
                       <li class="divider"></li>
                       <li><a tabindex="-1" a href="{{URL::to('') }}"> </a></li>
                       <li class="divider"></li>

                  </ul>
         </li>
        {{-- Ends Academic Module--}}


                    {{--Examination Manageemnt Modules--}}


                    <li class="dropdown">
                             <a href="" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-user"></i> Examination Management Module <i class="caret"></i>
                             </a>
                             <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="{{ action('ExaminationController@index') }}"> Home </a></li>
                                    <li class="divider"></li>
                            </ul>
                    </li>



                     {{-- End of Examination Module--}}



                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Dropdown
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">Action</a>
                            </li>
                            <li>
                                <a href="#">Another action</a>
                            </li>
                            <li>
                                <a href="#">Something else here</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">Separated link</a>
                            </li>
                            <li>
                                <a href="#">One more separated link</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i>Admin<i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="">Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </div>
    </nav>
    <div style="clear: both"></div>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
                @section('sidebar')
                @show
            </div>

            <div class="col-md-9">
                    {{--Error handling--}}
                    @if ( $errors->count() > 0 )
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $message )
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{--set some message after action--}}
                      @if (Session::has('message'))
                            <div class="alert alert-success">{{Session::get("message")}}</div>

                      @elseif(Session::has('error'))
                           <div class="alert alert-warning">{{Session::get("error")}}</div>

                      @elseif(Session::has('info'))
                          <div class="alert alert-info">{{Session::get("info")}}</div>

                      @elseif(Session::has('danger'))
                           <div class="alert alert-danger">{{Session::get("danger")}}</div>

                     @endif

                <div class="navbar">
                    <div class="navbar-inner">


                        <ul class="breadcrumb">
                            <i class="glyphicon glyphicon-align-justify hide-sidebar"><a href='' title="Hide Sidebar" rel='tooltip'></a></i>
                            <i class="glyphicon glyphicon-align-justify show-sidebar" style="display:none;"><a href='' title="Show Sidebar" rel='tooltip'></a></i>
                            <li>
                                <a href="">Dashboard</a> <span class="divider">/</span>
                            </li>
                        </ul>

                    </div>
                </div>

                @yield('content')
            </div>
        </div>
    </div>
    <!-- /.container -->


     <div class="container">
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12 footer-fixed">
                    <p class="text-muted">Copyright &copy; Edu Tech Solutions</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->

</div>
<!-- /#wrapper -->



<!--/.fluid-container-->


{{ HTML::script('assets/js/bootstrap.3.2.min.js') }}
{{HTML::script('assets/js/jquery.dataTables.min.js')}}
{{ HTML::script('assets/js/jquery.tablesorter.min.js') }}
{{ HTML::script('assets/js/bootstrap-datepicker.js') }}
{{HTML::script('assets/js/ratna_script.js')}}





</body>
</html>

