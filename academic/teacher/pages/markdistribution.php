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
            <h2 class="page-header">Marks Distribution :: Teacher</h2>
            <div class="row">
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Distribute Marks  </a></li>


                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">

                                <b>&nbsp;</b>

                                <div class="box-body table-responsive">
                                    <table id="" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Course type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td> Theory  </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#theoryMarksDistribution">
                                                        Mark Distribution
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

        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<?php include('modals/_modal_marks_distribution.php'); ?>

<?php include('../_footer.php'); ?>