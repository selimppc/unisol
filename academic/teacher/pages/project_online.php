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
            <h2 class="page-header">Project Management Online: Teacher </h2>

            <div class="row">
                <div class="col-md-12">
                    <!-- Custom Tabs -->

                    <div class="tab-content">
                        <div class="bs-example tab-pane active" id="tab_1">


                            <div class="btn-group">
                                <button type="button" class=" btn-default" data-toggle="modal"
                                        data-target="#evaluationProjectMarks">Evaluation
                                </button>
                            </div>

                            <div class="btn-group">
                                <button type="button" class=" btn-info" data-toggle="modal"
                                        data-target="#projectproposal">Project Proposal
                                </button>

                            </div>
                            <div class="btn-group">
                                <button type="button" class=" btn-danger" data-toggle="modal"
                                        data-target="#projectpresentation">Proposal Presentation</button>

                            </div>

                            <div class="btn-group">
                                <button type="button" class=" btn-warning" data-toggle="modal"
                                        data-target="#projectFieldWork">Fieldwork</button>

                            </div>

                            <div class="btn-group">
                                <button type="button" class=" btn-default" data-toggle="modal"
                                        data-target="#projectPresentation">Project Presentation</button>
                            </div>

                            <div class="btn-group">
                                <button type="button" class=" btn-info" data-toggle="modal"
                                        data-target="#reportPresentation">Report Presentation</button>

                            </div>
                            <div class="btn-group">
                                <button type="button" class=" btn-danger" data-toggle="modal"
                                        data-target="#manageProjet">Manage Project</button>

                            </div>
                            <div class="btn-group">
                                <button type="button" class=" btn-success" data-toggle="modal"
                                        data-target="#distributeProjet">Distribute To Student</button>

                            </div>
                            <div class="btn-group">
                                <button type="button" class=" btn-warning" data-toggle="modal"
                                        data-target="#evaluateProjects">Evaluate Project</button>

                            </div>

                            <br><br>

                            <b>Projects:</b>

                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Project Title</th>
                                        <th>Deadline</th>
                                        <th>Details</th>
                                        <th>File</th>
                                        <th>Marks</th>
                                        <th>Assign To</th>
                                        <th>Proposed By</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <tr>
                                        <td> Online Taxi Cab Management in Java</td>
                                        <td> 12/12/12 </td>
                                        <td> A teacher's "value-added" is defined as the average test-score gain for
                                            his or her students</td>
                                        <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                                        </td>
                                        <td> 10 </td>
                                        <td> Aslam </td>
                                        <td>  </td>
                                        <td width="130">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#viewDetails">
                                                View
                                            </button>

                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#evaluationProjectMarks">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                    data-target="#delete">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Library Management</td>
                                        <td> 12/3/15 </td>
                                        <td> Library Management</td>
                                        <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                                        </td>
                                        <td> 10 </td>
                                        <td> Aslam </td>
                                        <td>  </td>
                                        <td width="130">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#viewDetails">
                                                View
                                            </button>

                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#evaluationProjectMarks">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                    data-target="#delete">
                                                Delete
                                            </button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal"
                                                    data-target="#submitConfirmation">
                                                Approve
                                            </button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal"
                                                    data-target="#denyConfirmation">
                                                Deny
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> e-governance and e-government</td>
                                        <td> 7/3/15 </td>
                                        <td> e-governance and e-government</td>
                                        <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                                        </td>
                                        <td> 10 </td>
                                        <td>  </td>
                                        <td> Madehi Hasan </td>
                                        <td width="130">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#viewDetails">
                                                View
                                            </button>


                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#evaluationProjectMarks">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                    data-target="#delete">
                                                Delete
                                            </button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal"
                                                    data-target="#submitConfirmation">
                                                Approve
                                            </button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal"
                                                    data-target="#denyConfirmation">
                                                Deny
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Unicode, Box2D</td>
                                        <td> 6/2/15 </td>
                                        <td> Microprocessor :Unicode, Box2D</td>
                                        <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                                        </td>
                                        <td> 10 </td>
                                        <td>  </td>
                                        <td> Sazzad Hossain</td>
                                        <td width="130">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#viewDetails">
                                                View
                                            </button>
                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#evaluationProjectMarks">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                    data-target="#delete">
                                                Delete
                                            </button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal"
                                                    data-target="#submitConfirmation">
                                                Approve
                                            </button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal"
                                                    data-target="#denyConfirmation">
                                                Deny
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> mixed-signal integrated circuit</td>
                                        <td> 5/1/15 </td>
                                        <td>  mixed-signal integrated circuit</td>
                                        <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                                        </td>
                                        <td> 10 </td>
                                        <td>  </td>
                                        <td>Riva Hossain</td>
                                        <td width="130">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#viewDetails">
                                                View
                                            </button>
                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#evaluationProjectMarks">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                    data-target="#delete">
                                                Delete
                                            </button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal"
                                                    data-target="#submitConfirmation">
                                                Approve
                                            </button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal"
                                                    data-target="#denyConfirmation">
                                                Deny
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Particle Image Velocimetry</td>
                                        <td> 12/12/12 </td>
                                        <td> Particle Image Velocimetry</td>
                                        <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                                        </td>
                                        <td> 10 </td>
                                        <td> Aslam </td>
                                        <td>  </td>
                                        <td width="130">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#viewDetails">
                                                View
                                            </button>

                                            <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                    data-target="#evaluationProjectMarks">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                    data-target="#delete">
                                                Delete
                                            </button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal"
                                                    data-target="#submitConfirmation">
                                                Approve
                                            </button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal"
                                                    data-target="#denyConfirmation">
                                                Deny
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

<?php include('modals/_modal_project_online.php') ?>
<?php include('../_footer.php'); ?>
