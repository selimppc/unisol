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
                <h2 class="page-header">Mid Term / Final Exam :: AAW</h2>
                <div class="row">
                <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab"> Mid/Final Term (Manual)  </a></li>
                    <li><a href="#tab_2" data-toggle="tab">Mid/Final Term (Online) </a></li>

                    <li class="pull-right" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>

                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#adExamTerm" >
                            Add Exam / Term
                        </button><br>
                        <b>&nbsp;</b>
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th> Name of the Exam</th>
                                    <th> Role Propose</th>
                                    <th> Description </th>
                                    <th> Comments </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php for($i = 0; $i < 5; $i++){ ?>
                                    <tr>
                                        <td> Mid Term Exam </td>
                                        <td> Examiner </td>
                                        <td> Mid term examination for CSE  </td>
                                        <td> ... </td>
                                        <td width="120">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                View
                                            </button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#adExamTerm">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>



                                <?php } ?>




                                </tbody>

                            </table>
                        </div><!-- /.box -->
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#adExamTerm" >
                            Add Exam / Term
                        </button><br>
                        <b>&nbsp;</b>
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th> Name of the Exam</th>
                                    <th> Role Propose</th>
                                    <th> Description </th>
                                    <th> Comments </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php for($i = 0; $i < 5; $i++){ ?>
                                    <tr>
                                        <td> Mid Term Exam </td>
                                        <td> Examiner </td>
                                        <td> Mid term examination for CSE  </td>
                                        <td> ... </td>
                                        <td width="150">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                View
                                            </button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#adExamTerm">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>



                                <?php } ?>




                                </tbody>

                            </table>

                            <h4>&nbsp;</h4>
                            <h3>Instruction for exam</h3>
                            <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addInstruction" >
                                Add Instruction
                            </button><br>
                            <b>&nbsp;</b>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th> Name of the Exam</th>
                                    <th> Instruction</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php for($i = 0; $i < 2; $i++){ ?>
                                    <tr>
                                        <td> Mid Term Exam </td>
                                        <td> Instruction goes here </td>
                                    </tr>

                                <?php } ?>




                                </tbody>

                            </table>
                        </div><!-- /.box -->
                </div><!-- /.tab-content -->
                </div><!-- nav-tabs-custom -->
                </div><!-- /.col -->


                </div> <!-- /.row -->
                <!-- END CUSTOM TABS -->







        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<?php include('modals/_modal_mid_final_exam.php'); ?>
<?php include('../_footer.php'); ?>
