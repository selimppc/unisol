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
            <h2 class="page-header">Scholarship Management :: Student</h2>
            <div class="row">
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Manage Scholarship  </a></li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addApply" >
                                    New Request
                                </button><br>
                                <b>&nbsp;</b>

                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th> Scholarship </th>
                                            <th> Department </th>
                                            <th> Level of Education </th>
                                            <th> Amount </th>
                                            <th> Disperse Method </th>
                                            <th> Status</th>
                                            <th> Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php for($i = 0; $i < 5; $i++){ ?>
                                            <tr>
                                                <td> Academic Scholarship </td>
                                                <td> CSE </td>
                                                <td> Under Graduate  </td>
                                                <td> 20 K </td>
                                                <td> Half Yearly </td>
                                                <td> Open </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addApply">
                                                        Apply
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Merit Scholarship </td>
                                                <td> EEE </td>
                                                <td> Graduate </td>
                                                <td> 10 K </td>
                                                <td> Yearly </td>
                                                <td> Open </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addApply">
                                                        Apply
                                                    </button>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td> University Scholarship </td>
                                                <td> CSE </td>
                                                <td> Post Graduate  </td>
                                                <td> 3 K </td>
                                                <td> Monthly </td>
                                                <td> Requested </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>

                                                </td>
                                            </tr>

                                        <?php } ?>




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

<?php include('modals/_modal_scholarship.php'); ?>
<?php include('../_footer.php'); ?>
