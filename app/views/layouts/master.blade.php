<!DOCTYPE html>
<html class="no-js">

<head>
    <title>Edu Tech Solutions </title>
    <!-- Bootstrap -->
    {{ HTML::style('assets/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/bootstrap-theme.min.css') }}
    {{--{{HTML::style('assets/css/styles.css')}}--}}
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Control Panel</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="container-fluid">
<div class="row">

    <div class="col-sm-3 col-md-3">
        <div class="panel-group" id="accordion">
            @section('sidebar')
            @show
        </div>
    </div>


    <!--/span-->
    <div class="col-md-9" id="content">
        <div class="row-fluid">
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
                  <div>{{ Session::get('message') }}</div>
                @endif

            <div class="navbar">
                <div class="navbar-inner">
                    <ul class="breadcrumb">
                        <i class="icon-list hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                        <i class="icon-list show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
                        <li>
                            <a href="#">Dashboard</a> <span class="divider">/</span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>


        @yield('content')



    </div>
</div>
<hr>
<footer>
    <p>&copy; Edu Tech Solutions</p>
</footer>
</div>

<!--/.fluid-container-->
{{ HTML::script('assets/js/jquery-1.9.1.min.js') }}
{{ HTML::script('assets/js/bootstrap.min.js') }}
{{HTML::script('assets/js/scripts.js')}}

{{--{{ HTML::script('assets/js/jquery.jscroll.min.js') }}--}}
{{--{{HTML::script('assets/js/jquery.dataTables.min.js')}}--}}


</body>

</html>