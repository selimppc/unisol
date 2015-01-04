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
            <h2 class="page-header">Lab Management Online: Student </h2>

            <div class="row">
                <div class="col-md-12">
                    <!-- Custom Tabs -->

                    <div class="tab-content">
                        <div class="bs-example tab-pane active" id="tab_1">


                            <div class="btn-group">
                                <button type="button" class=" btn-info" data-toggle="modal"
                                        data-target="#labProposal">Submit Lab Task
                                </button>

                                <button type="button" class=" btn-success" data-toggle="modal"
                                        data-target="#marksDistribution">View Marks
                                </button>

                            </div>

                            <br><br>

                            <b>Lab:</b>

                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Lab Title</th>
                                        <th>Subject</th>
                                        <th>Deadline</th>
                                        <th>Details</th>
                                        <th>File</th>
                                        <th>Teacher name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <tr>
                                        <td> Library System Management</td>
                                        <td> Structure Programming Language</td>
                                        <td> 12/02/15</td>
                                        <td> UI not mandatory but Library System management Program should be running
                                            error free.
                                        </td>
                                        <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                                        </td>

                                        <td> Professor hasan Sarwar</td>
                                        <td> Not Done</td>
                                        <td width="130">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#viewDetails">
                                                View
                                            </button>

                                            <button class="btn btn-success btn-xs" data-toggle="modal"
                                                    data-target="#submitConfirmation">
                                                Accept
                                            </button>

                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#Edit">
                                                Edit
                                            </button>


                                        </td>
                                    </tr>


                                    <tr>
                                        <td> School Management System</td>
                                        <td> Structure Programming Language</td>
                                        <td> 02/02/15</td>
                                        <td> School Management System application should be run in the server so that
                                            local student can access that.
                                        </td>
                                        <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                                        </td>

                                        <td> Professor Salekur Rahman</td>
                                        <td> Done</td>
                                        <td width="130">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#viewDetails">
                                                View
                                            </button>

                                            <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                    data-target="#deleteConfirmation">
                                                Delete
                                            </button>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Scientific Calculator with nice UI</td>
                                        <td> Java</td>
                                        <td> 12/12/12</td>
                                        <td> Most of the scientific calculator option have to be included in this
                                            apps.
                                        </td>
                                        <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                                        </td>

                                        <td> Professor Manzurur Rahman</td>
                                        <td> Done</td>
                                        <td width="130">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#viewDetails">
                                                View
                                            </button>

                                            <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                    data-target="#deleteConfirmation">
                                                Delete
                                            </button>


                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                </div>


        </section>
        <!-- /.content -->
    </aside>
    <!-- /.right-side -->
</div><!-- ./wrapper -->

<?php include('modal/_modal_lab_online.php') ?>
<?php include('../_footer.php'); ?>
