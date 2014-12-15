<!DOCTYPE html>
<html class="no-js">

<head>
    <title>Edu Tech Solutions Bd</title>
    <!-- Bootstrap -->
    {{ HTML::style('assets/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/bootstrap-responsive.min.css') }}
    {{HTML::style('assets/js/jquery.dataTables.min.css')}}
    {{HTML::style('assets/css/styles.css')}}

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            {{--<a class="brand" href="" >{{ $title}}</a>--}}
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i>Ratna<i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="">Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav">
                    <li class="active">
                        <a href="">Dashboard</a>
                    </li>

                    <li class="dropdown">
                        <a href="" data-toggle="dropdown" class="dropdown-toggle">Settings <b class="caret"></b>

                        </a>
                        <ul class="dropdown-menu" id="menu1">
                            <li>
                                <a href="">Tools <i class="icon-arrow-right"></i></a>
                                <ul class="dropdown-menu sub-menu">
                                    <li><a href="">Reports</a></li>
                                    <li><a href="">Logs</a></li>
                                    <li><a href="">Errors</a></li>
                                </ul>
                            </li>
                            <li><a href="">SEO Settings</a></li>
                            <li><a href="">Other Link</a></li>
                            <li class="divider"></li>
                            <li><a href="">Other Link</a></li>
                            <li><a href="">Other Link</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Content <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="">Blog</a></li>
                            <li><a tabindex="-1" href="">News</a></li>
                            <li><a tabindex="-1" href="">Custom Pages</a></li>
                            <li><a tabindex="-1" href="">Calendar</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="">FAQ</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Users <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="">User List</a></li>
                            <li><a tabindex="-1" href="">Search</a></li>
                            <li><a tabindex="-1" href="">Permissions</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
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
                  <div class="alert alert-info">{{Session::get("message")}}</div>
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
{{HTML::script('assets/js/jquery.dataTables.min.js')}}
{{ HTML::script('assets/js/jquery.tablesorter.min.js') }}

{{--{{ HTML::script('assets/js/jquery.jscroll.min.js') }}--}}
{{--{{HTML::script('assets/js/jquery.dataTables.min.js')}}--}}
  <script>
       $( document ).ready(function()
        {
                  
                 $('#confirm-delete').on('show.bs.modal', function(e) {
                      $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
                      $('.debug-url').html('Delete URL: <strong>' + $(this).find('.danger').attr('href') + '</strong>');
                  });

              $('#myTable').tablesorter(); //for table sorting
              
                 // for table filter
                  $('#dataTableId').DataTable();
        
                //to refresh button in modal
                // $('.dropclose').on('click', function(event) {
                //   event.preventDefault();
                //   window.location.reload();
                // });
                
               $('.close').on('click', function(event) {
                event.preventDefault();
                window.location.reload();
              });
    
     // select All records for batch delete

          $("#hide-button").hide();

          $(".checkbox").change(function() {
              if(this.checked) {
                  $('.myCheckbox').prop('checked', true);
                   $("#hide-button").show();
              }
              if(!this.checked) {
                  $('.myCheckbox').prop('checked', false);
                   $("#hide-button").hide();
              }
          });

          $('.myCheckbox').on('change', function(event) {
            event.preventDefault();
            if ($('.myCheckbox:checked').length > 0) {
                $("#hide-button").show();
            } else {
                $("#hide-button").hide();
            }
          });
  
      // batch delte ends
  //paginations search
  $('#searchStr').keyup(function() {
      var that = this;
      $.each($('.searchBody tr'),
      function(i, val) {
          if ($(val).text().toLowerCase().indexOf($(that).val().toLowerCase()) == -1) 
          {
              $('.searchBody tr').eq(i).hide();
          } else {
              $('.searchBody tr').eq(i).show();
          }
      });
   });

  
    });

</script>

</body>

</html>