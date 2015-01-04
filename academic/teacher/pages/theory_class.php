<?php include('../_header.php'); ?>

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->

    <?php include('../_sidebar.php'); ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">


            <!-- START CUSTOM TABS -->
            <h2 class="page-header">Class :: Teacher</h2>
            <div class="row">
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Class  </a></li>


                            <li class="pull-right" class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                                <ul class="dropdown-menu">
                                    <li role="presentation" data-toggle="modal" data-target="#addClass"><a role="menuitem" tabindex="-1" href="#"> Add Class </a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#newClassVideo" >
                                    New Sesion Video
                                </button><br>
                                <b>&nbsp;</b>

                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th> Session Name </th>
                                            <th> Day </th>
                                            <th> Session Video </th>
                                            <th> Description </th>
                                            <th> Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td> Algorithm </td>
                                                <td> 2 </td>
                                                <td>
                                                    <span data-toggle="modal" data-target="#viewDetails">
                                                        <img src="../video/video.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                    </span>
                                                </td>
                                                <td> Published  </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#newClassVideo">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        <tr>
                                            <td> Digital System And Design </td>
                                            <td> 2 </td>
                                            <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../video/video.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                            </span>
                                            </td>
                                            <td> Description  </td>
                                            <td width="120">
                                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                    View
                                                </button>
                                                <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#newClassVideo">
                                                    Edit
                                                </button>
                                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>

                                            <tr>
                                                <td> Algorithm Lab </td>
                                                <td> 1 </td>
                                                <td>
                                                    <span data-toggle="modal" data-target="#viewDetails">
                                                        <img src="../video/video.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                    </span>
                                                </td>
                                                <td> Published  </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#newClassVideo">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Data Structure </td>
                                                <td> 2 </td>
                                                <td>
                                                    <span data-toggle="modal" data-target="#viewDetails">
                                                        <img src="../video/video.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                    </span>
                                                </td>
                                                <td> Published </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#newClassVideo">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Data Structure Lab </td>
                                                <td> 1 </td>
                                                <td>
                                                    <span data-toggle="modal" data-target="#viewDetails">
                                                        <img src="../video/video.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                    </span>
                                                </td>
                                                <td> Published </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#newClassVideo">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                    <tr>
                                        <td>Graphics Design</td>
                                        <td> 2 </td>
                                        <td>
                                                <span data-toggle="modal" data-target="#viewDetails">
                                                    <img src="../video/video.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                </span>
                                        </td>
                                        <td> Description </td>
                                        <td width="120">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                View
                                            </button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#newClassVideo">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                <tr>
                                    <td>Fundamental Programming </td>
                                    <td> 4 </td>
                                    <td>
                                        <span data-toggle="modal" data-target="#viewDetails">
                                            <img src="../video/video.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                        </span>
                                    </td>
                                    <td> Description </td>
                                    <td width="120">
                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                            View
                                        </button>
                                        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#newClassVideo">
                                            Edit
                                        </button>
                                        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                            Delete
                                        </button>
                                    </td>
                                </tr>



                                    <tr>
                                        <td>Digital Image Processing </td>
                                        <td> 3 </td>
                                        <td>
                                                <span data-toggle="modal" data-target="#viewDetails">
                                                    <img src="../video/video.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                </span>
                                        </td>
                                        <td> Description </td>
                                        <td width="120">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                View
                                            </button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#newClassVideo">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                            <tr>
                                                <td> System Analysis and Design </td>
                                                <td> 2 </td>
                                                <td>
                                                    <span data-toggle="modal" data-target="#viewDetails">
                                                        <img src="../video/video.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                    </span>
                                                </td>
                                                <td> Published </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#newClassVideo">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> System Analysis and Design Lab </td>
                                                <td> 1 </td>
                                                <td>
                                                    <span data-toggle="modal" data-target="#viewDetails">
                                                        <img src="../video/video.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                    </span>
                                                </td>
                                                <td> Published </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#newClassVideo">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- /.box -->
                            </div><!-- /.tab-pane -->
                        </div><!-- /.tab-content -->
                    </div><!-- nav-tabs-custom -->
                </div><!-- /.col -->
            </div> <!-- /.row -->
            <!-- END CUSTOM TABS -->

        </section>
        <!-- /.content -->
    </aside>
    <!-- /.right-side -->
</div><!-- ./wrapper -->

<?php include('modals/_modal_theory_class.php') ?>
<?php include('../_footer.php'); ?>
