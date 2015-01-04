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
            <h2 class="page-header">Issue Certificate :: Student</h2>

            <div class="row">
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Issue Certificate </a></li>

                            <li class="pull-right" class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;
                                </a>
                                <ul class="dropdown-menu">
                                    <li role="presentation" data-toggle="modal" data-target="#addCategory"><a
                                            role="menuitem" tabindex="-1" href="#"> Add Certificate </a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <button class="pull-right btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#addIssueRequest">
                                    Ask for certificates
                                </button>
                                <br>

                                <b>&nbsp;</b>

                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Name of Certificate</th>
                                            <th>Department</th>
                                            <th>Student ID</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td> Under Graduate Program</td>
                                                <td> CSE</td>
                                                <td> 011014054</td>
                                                <td> Open</td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                            data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-default btn-xs" data-toggle="modal"
                                                            data-target="#addIssueRequest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal"
                                                            data-target="#approvalModal">
                                                        Request
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Under Graduate Program</td>
                                                <td> BBA</td>
                                                <td> 111091054</td>
                                                <td> Open</td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                            data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-default btn-xs" data-toggle="modal"
                                                            data-target="#addIssueRequest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal"
                                                            data-target="#approvalModal">
                                                        Request
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Graduate Program</td>
                                                <td> EEE</td>
                                                <td> 021015002</td>
                                                <td> Open</td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                            data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-default btn-xs" data-toggle="modal"
                                                            data-target="#addIssueRequest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal"
                                                            data-target="#approvalModal">
                                                        Request
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Post Graduate Program</td>
                                                <td> CSE</td>
                                                <td> 021015056</td>
                                                <td> Open</td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                            data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-default btn-xs" data-toggle="modal"
                                                            data-target="#addIssueRequest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal"
                                                            data-target="#approvalModal">
                                                        Request
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
                        <!-- /.tab-content -->
                    </div>
                    <!-- nav-tabs-custom -->
                </div>
                <!-- /.col -->


            </div>
            <!-- /.row -->
            <!-- END CUSTOM TABS -->

        </section>
        <!-- /.content -->
    </aside>
    <!-- /.right-side -->
</div><!-- ./wrapper -->

<?php include('modals/_modal_issue_certificate.php'); ?>
<?php include('../_footer.php'); ?>
