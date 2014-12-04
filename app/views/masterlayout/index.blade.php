<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin Panel</title>

        {{ HTML::style('mainassets/css/style.default.css') }}
        {{ HTML::style('mainassets/css/morris.css') }}
        {{ HTML::style('mainassets/css/select2.css') }}
        {{ HTML::style('mainassets/css/datepicker3.css') }}

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        
        <header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="index-2.html" class="logo">
                        <img src="images/logo.png" alt="" /> 
                    </a>
                    <div class="pull-right">
                        <a href="#" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div><!-- header-left -->
                
                <div class="header-right">
                    
<div class="pull-right">

<form class="form form-search" action="http://themepixels.com/demo/webpage/chain/search-results.html">
    <input type="search" class="form-control" placeholder="Search" />
</form>

<div class="btn-group btn-group-list btn-group-notification">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
      <i class="fa fa-bell-o"></i>
      <span class="badge">5</span>
    </button>
    <div class="dropdown-menu pull-right">
        <a href="#" class="link-right"><i class="fa fa-search"></i></a>
        <h5>Notification</h5>
        <ul class="media-list dropdown-list">
            <li class="media">
                <img class="img-circle pull-left noti-thumb" src="images/photos/user1.png" alt="">
                <div class="media-body">
                  <strong>Nusja Nawancali</strong> likes a photo of you
                  <small class="date"><i class="fa fa-thumbs-up"></i> 15 minutes ago</small>
                </div>
            </li>
            <li class="media">
                <img class="img-circle pull-left noti-thumb" src="images/photos/user2.png" alt="">
                <div class="media-body">
                  <strong>Weno Carasbong</strong> shared a photo of you in your <strong>Mobile Uploads</strong> album.
                  <small class="date"><i class="fa fa-calendar"></i> July 04, 2014</small>
                </div>
            </li>
            <li class="media">
                <img class="img-circle pull-left noti-thumb" src="images/photos/user3.png" alt="">
                <div class="media-body">
                  <strong>Venro Leonga</strong> likes a photo of you
                  <small class="date"><i class="fa fa-thumbs-up"></i> July 03, 2014</small>
                </div>
            </li>
            <li class="media">
                <img class="img-circle pull-left noti-thumb" src="images/photos/user4.png" alt="">
                <div class="media-body">
                  <strong>Nanterey Reslaba</strong> shared a photo of you in your <strong>Mobile Uploads</strong> album.
                  <small class="date"><i class="fa fa-calendar"></i> July 03, 2014</small>
                </div>
            </li>
            <li class="media">
                <img class="img-circle pull-left noti-thumb" src="images/photos/user1.png" alt="">
                <div class="media-body">
                  <strong>Nusja Nawancali</strong> shared a photo of you in your <strong>Mobile Uploads</strong> album.
                  <small class="date"><i class="fa fa-calendar"></i> July 02, 2014</small>
                </div>
            </li>
        </ul>
        <div class="dropdown-footer text-center">
            <a href="#" class="link">See All Notifications</a>
        </div>
    </div><!-- dropdown-menu -->
</div><!-- btn-group -->

<div class="btn-group btn-group-list btn-group-messages">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-envelope-o"></i>
        <span class="badge">2</span>
    </button>
    <div class="dropdown-menu pull-right">
        <a href="#" class="link-right"><i class="fa fa-plus"></i></a>
        <h5>New Messages</h5>
        <ul class="media-list dropdown-list">
            <li class="media">
                <span class="badge badge-success">New</span>
                <img class="img-circle pull-left noti-thumb" src="images/photos/user1.png" alt="">
                <div class="media-body">
                  <strong>Nusja Nawancali</strong>
                  <p>Hi! How are you?...</p>
                  <small class="date"><i class="fa fa-clock-o"></i> 15 minutes ago</small>
                </div>
            </li>
            <li class="media">
                <span class="badge badge-success">New</span>
                <img class="img-circle pull-left noti-thumb" src="images/photos/user2.png" alt="">
                <div class="media-body">
                  <strong>Weno Carasbong</strong>
                  <p>Lorem ipsum dolor sit amet...</p>
                  <small class="date"><i class="fa fa-clock-o"></i> July 04, 2014</small>
                </div>
            </li>
            <li class="media">
                <img class="img-circle pull-left noti-thumb" src="images/photos/user3.png" alt="">
                <div class="media-body">
                  <strong>Venro Leonga</strong>
                  <p>Do you have the time to listen to me...</p>
                  <small class="date"><i class="fa fa-clock-o"></i> July 03, 2014</small>
                </div>
            </li>
            <li class="media">
                <img class="img-circle pull-left noti-thumb" src="images/photos/user4.png" alt="">
                <div class="media-body">
                  <strong>Nanterey Reslaba</strong>
                  <p>It might seem crazy what I'm about to say...</p>
                  <small class="date"><i class="fa fa-clock-o"></i> July 03, 2014</small>
                </div>
            </li>
            <li class="media">
                <img class="img-circle pull-left noti-thumb" src="images/photos/user1.png" alt="">
                <div class="media-body">
                  <strong>Nusja Nawancali</strong>
                  <p>Hey I just met you and this is crazy...</p>
                  <small class="date"><i class="fa fa-clock-o"></i> July 02, 2014</small>
                </div>
            </li>
        </ul>
        <div class="dropdown-footer text-center">
            <a href="#" class="link">See All Messages</a>
        </div>
    </div><!-- dropdown-menu -->
</div><!-- btn-group -->

            <div class="btn-group btn-group-option">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-caret-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="#"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                  <li><a href="#"><i class="glyphicon glyphicon-star"></i> Activity Log</a></li>
                  <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                  <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a></li>
                </ul>
            </div><!-- btn-group -->

            </div><!-- pull-right -->

            </div><!-- header-right -->

            </div><!-- headerwrapper -->
            </header>
    <section>
            <div class="mainwrapper">
                <div class="leftpanel">
                    <div class="media profile-left">
                     
                        <div class="media-body">
                            <h4 class="media-heading"></h4>
                            <small class="text-muted"></small>
                        </div>
                    </div><!-- media -->
                    
                    <h5 class="leftpanel-title">Navigation</h5>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="<?php echo URL::to('dashboard'); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="<?php echo URL::to('neworder/new-order-form');?>"><i class="fa fa-envelope-o"></i> <span>User</span></a></li>
                        <li class="parent"><a href="#"><i class="fa fa-suitcase"></i> <span>Addmission</span></a>
                            <ul class="children">
                                <li><a href="<?php echo URL::to('neworder/new-order-form');?>">Create profile</a></li>
                                <li><a href="<?php echo URL::to('neworder/show-all-orders');?>">Upload Certificates</a></li>
                                <li><a href="<?php echo URL::to('neworder/show-all-orders/1');?>" class="todayOrders">Upload photo</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-edit"></i> <span>Payment</span></a></li>
                   
                    </ul>
                    
                </div><!-- leftpanel -->
                
        <div class="mainpanel">
            <div class="pageheader">
                <div class="media">
                    <div class="pageicon pull-left">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="media-body">
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                            <li>Dashboard</li>
                        </ul>
                        <h4>{{ $title}}</h4>                               
                    </div>
                </div><!-- media -->


            </div><!-- pageheader -->
                               

                <div class="contentpanel">
                
             @if($title == 'Dashboard')
                <div class="row row-stat">
                    <div class="col-md-4">
                        <div class="panel panel-success-alt noborder">
                            <div class="panel-heading noborder">
                                <div class="panel-btns">
                                    <a href="#" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                                </div><!-- panel-btns -->
                                <div class="panel-icon"><i class="fa fa-dollar"></i></div>
                                <div class="media-body">
                                    <h5 class="md-title nomargin">Today's Earnings</h5>
                                    <h1 class="mt5">$8,102.32</h1>
                                </div><!-- media-body -->
                                <hr>
                                <div class="clearfix mt20">
                                    <div class="pull-left">
                                        <h5 class="md-title nomargin">Yesterday</h5>
                                        <h4 class="nomargin">$29,009.17</h4>
                                    </div>
                                    <div class="pull-right">
                                        <h5 class="md-title nomargin">This Week</h5>
                                        <h4 class="nomargin">$99,103.67</h4>
                                    </div>
                                </div>
                                
                            </div><!-- panel-body -->
                        </div><!-- panel -->
                    </div><!-- col-md-4 -->
                    
                    <div class="col-md-4">
                        <div class="panel panel-primary noborder">
                            <div class="panel-heading noborder">
                                <div class="panel-btns">
                                    <a href="#" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                                </div><!-- panel-btns -->
                                <div class="panel-icon"><i class="fa fa-users"></i></div>
                                <div class="media-body">
                                    <h5 class="md-title nomargin">New User Accounts</h5>
                                    <h1 class="mt5">138,102</h1>
                                </div><!-- media-body -->
                                <hr>
                                <div class="clearfix mt20">
                                    <div class="pull-left">
                                        <h5 class="md-title nomargin">Yesterday</h5>
                                        <h4 class="nomargin">10,009</h4>
                                    </div>
                                    <div class="pull-right">
                                        <h5 class="md-title nomargin">This Week</h5>
                                        <h4 class="nomargin">178,222</h4>
                                    </div>
                                </div>
                                
                            </div><!-- panel-body -->
                        </div><!-- panel -->
                    </div><!-- col-md-4 -->
                    
                    <div class="col-md-4">
                        <div class="panel panel-dark noborder">
                            <div class="panel-heading noborder">
                                <div class="panel-btns">
                                    <a href="#" class="panel-close tooltips" data-toggle="tooltip" data-placement="left" title="Close Panel"><i class="fa fa-times"></i></a>
                                </div><!-- panel-btns -->
                                <div class="panel-icon"><i class="fa fa-pencil"></i></div>
                                <div class="media-body">
                                    <h5 class="md-title nomargin">New User Posts</h5>
                                    <h1 class="mt5">153,900</h1>
                                </div><!-- media-body -->
                                <hr>
                                <div class="clearfix mt20">
                                    <div class="pull-left">
                                        <h5 class="md-title nomargin">Yesterday</h5>
                                        <h4 class="nomargin">144,009</h4>
                                    </div>
                                    <div class="pull-right">
                                        <h5 class="md-title nomargin">This Week</h5>
                                        <h4 class="nomargin">987,212</h4>
                                    </div>
                                </div>
                                
                            </div><!-- panel-body -->
                        </div><!-- panel -->
                    </div><!-- col-md-4 -->
                </div><!-- row -->
                @endif
                       

                        <div class="row">
                        
                            @yield('content')                    
                            
                        </div><!-- row -->
                        
                        <div class="row">
                            <div class="col-md-12">
                                <p class="pull-right" style="margin-top: 150px">Designed and Developed by: Ratna Akter</p>
                            </div>
                        </div><!-- row -->

                     </div><!-- contentpanel -->
                    
                </div><!-- mainpanel -->

            </div><!-- mainwrapper -->
        </section>


        {{ HTML::script('mainassets/js/jquery-1.11.1.min.js') }}
        {{ HTML::script('mainassets/js/bootstrap.min.js') }}
        {{ HTML::script('mainassets/js/bootstrap-timepicker.min.js') }}
        {{ HTML::script('mainassets/js/bootstrap-datepicker.js') }}
        {{ HTML::script('mainassets/js/modernizr.min.js') }}
        {{ HTML::script('mainassets/js/pace.min.js') }}
        {{ HTML::script('mainassets/js/retina.min.js') }}
        {{ HTML::script('mainassets/js/jquery.cookies.js') }}

        

        {{ HTML::script('mainassets/js/custom.js') }}
        {{ HTML::script('mainassets/js/dashboard.js') }}     


    </body>
</html>
