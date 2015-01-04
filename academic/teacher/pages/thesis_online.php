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
        <h2 class="page-header">Thesis Management Online: Teacher </h2>

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
                    data-target="#projectproposal">Thesis Proposal
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
                    data-target="#projectPresentation">Thesis Presentation</button>
        </div>

        <div class="btn-group">
            <button type="button" class=" btn-info" data-toggle="modal"
                    data-target="#reportPresentation">Report Presentation</button>

        </div>
        <div class="btn-group">
            <button type="button" class=" btn-danger" data-toggle="modal"
                    data-target="#manageProjet">Manage Thesis</button>

        </div>
        <div class="btn-group">
            <button type="button" class=" btn-success" data-toggle="modal"
                    data-target="#distributeProjet">Distribute To Student</button>

        </div>
        <div class="btn-group">
            <button type="button" class=" btn-warning" data-toggle="modal"
                    data-target="#evaluateThesis">Evaluate Thesis</button>

        </div>

        <br><br>

        <b>Thesis:</b>

        <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Thesis Title</th>
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
            <td> Character Recognition</td>
            <td> 12/12/15 </td>
            <td>Character Recognition on Image Processing</td>
            <td>
                <span data-toggle="modal" data-target="#viewDetails">
                    <img src="../img/doc.png" width="100px" style="cursor: pointer"
                         class="img-thumbnail">
                </span>
            </td>
            <td> 10 </td>
            <td> Medahi Hasan </td>
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
            <td> Embedded System Touchscreen and WIFI</td>
            <td> 7/12/15 </td>
            <td> Embedded System Touchscreen and WIFI</td>
            <td>
                <span data-toggle="modal" data-target="#viewDetails">
                    <img src="../img/doc.png" width="100px" style="cursor: pointer"
                         class="img-thumbnail">
                </span>
            </td>
            <td> 10 </td>
            <td>  </td>
            <td>Azaj Rasal</td>
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
            <td>Sensitivity Analysis of Agent Based Models</td>
            <td> 12/12/15 </td>
            <td> Sensitivity Analysis of Agent Based Models</td>
            <td>
                <span data-toggle="modal" data-target="#viewDetails">
                    <img src="../img/doc.png" width="100px" style="cursor: pointer"
                         class="img-thumbnail">
                </span>
            </td>
            <td> 10 </td>
            <td>  </td>
            <td> Aslam </td>
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
            <td> Implement and run a scenario in an existing Agent-Based Model</td>
            <td> 12/7/15</td>
            <td>Implement and run a scenario in an existing Agent-Based Model</td>
            <td>
                <span data-toggle="modal" data-target="#viewDetails">
                    <img src="../img/doc.png" width="100px" style="cursor: pointer"
                         class="img-thumbnail">
                </span>
            </td>
            <td> 10 </td>
            <td>Zakir Ahmed </td>
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
            <td> Expressing emotions through vibration for perception and control</td>
            <td> 12/12/15</td>
            <td>Expressing emotions through vibration for perception and control</td>
            <td>
                    <span data-toggle="modal" data-target="#viewDetails">
                        <img src="../img/doc.png" width="100px" style="cursor: pointer"
                             class="img-thumbnail">
                    </span>
            </td>
            <td> 10 </td>
            <td> Md. Raihan</td>
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
            <td>Face detection and tracking in thermal videos</td>
            <td> 12/9/15</td>
            <td>Face detection and tracking in thermal videos</td>
            <td>
                <span data-toggle="modal" data-target="#viewDetails">
                    <img src="../img/doc.png" width="100px" style="cursor: pointer"
                         class="img-thumbnail">
                </span>
            </td>
            <td> 10 </td>
            <td> Md. Mamun</td>
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
            <td>Evaluation of Interpolation Methods</td>
            <td> 7/10/15</td>
            <td>Evaluation of Interpolation Methods</td>
            <td>
            <span data-toggle="modal" data-target="#viewDetails">
                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                     class="img-thumbnail">
            </span>
            </td>
            <td> 10 </td>
            <td>Sazzad Hossain</td>
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
            <td>Evaluation of Laser Beam Melted Surfaces using Texture Classification</td>
            <td> 12/9/15</td>
            <td>Evaluation of Laser Beam Melted Surfaces using Texture Classification</td>
            <td>
                <span data-toggle="modal" data-target="#viewDetails">
                    <img src="../img/doc.png" width="100px" style="cursor: pointer"
                         class="img-thumbnail">
                </span>
            </td>
            <td> 10 </td>
            <td> Md. Kamal</td>
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

<?php include('modals/_modal_thesis_online.php') ?>
<?php include('../_footer.php'); ?>