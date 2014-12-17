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
    {{ HTML::style('assets/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/bootstrap-responsive.min.css') }}
    {{ HTML::style('assets/css/styles.css')}}


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
                            <li><a tabindex="-1" href=""> Course Management </a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href=""> Degree Level </a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href=""> Degree / Program Name </a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href=""> Subject Management </a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href=""> Term / Semester </a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href=""> Year </a></li>
                        </ul>
                    </li>

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

    {{ HTML::script('assets/js/scripts.js')}}
    {{ HTML::script('assets/js/jquery.dataTables.min.js')}}

    </script>

 <script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable();
			} );
 </script>

</body>
</html>


