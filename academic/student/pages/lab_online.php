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
                                        <td> Online Taxi Cab Management in Java</td>
                                        <td> Computer Architecture</td>
                                        <td> 12/12/12 </td>
                                        <td> A teacher's "value-added" is defined as the average test-score gain for
                                            his or her students</td>
                                        <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                                        </td>

                                        <td> professor Rahman </td>
                                        <td> Not Done  </td>
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
                                        <td> Online Taxi Cab Management in Java</td>
                                        <td> English</td>
                                        <td> 12/12/12 </td>
                                        <td> A teacher's "value-added" is defined as the average test-score gain for
                                            his or her students</td>
                                        <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                                        </td>

                                        <td> professor Huda </td>
                                        <td> Done  </td>
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
                                        <td> Online Taxi Cab Management in Java</td>
                                        <td> Electronics</td>
                                        <td> 12/12/12 </td>
                                        <td> A teacher's "value-added" is defined as the average test-score gain for
                                            his or her students</td>
                                        <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                                        </td>

                                        <td> professor Feroz </td>
                                        <td> Done  </td>
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
