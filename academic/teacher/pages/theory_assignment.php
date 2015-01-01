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
                <h2 class="page-header"> Theory Assignment :: Teacher </h2>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Assignment  </a></li>

                                <li class="pull-right" class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation" data-toggle="modal" data-target="#addAssignment"><a role="menuitem" tabindex="-1" href="#"> Add Assignment </a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addAssignment" >
                                        Add Assignment
                                    </button><br>
                                    <b>&nbsp;</b>

                                    <div class="box-body table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th> Assignment Title </th>
                                                <th> Topics </th>
                                                <th> Doc </th>
                                                <th> Department </th>
                                                <th> Student Name/ID </th>
                                                <th> Marks </th>
                                                <th> Comments </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php for($i = 0; $i < 5; $i++){ ?>
                                                <tr>
                                                    <td> Data Analysis </td>
                                                    <td> Structure </td>
                                                    <td>
                                                        <span data-toggle="modal" data-target="#viewDetails">
                                                            <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                        </span>
                                                    </td>
                                                    <td> CSE </td>
                                                    <td> Selim Reza / 20141212 </td>
                                                    <td> 24 </td>
                                                    <td> .. </td>
                                                    <td width="120">
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addMarks">
                                                            Add Mark
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

<?php include('modals/_modal_theory_assignment.php'); ?>
<?php include('../_footer.php'); ?>
