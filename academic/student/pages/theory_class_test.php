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
            <h2 class="page-header">Online Class Test :: Student</h2>

            <div class="row">
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Class Test (Online) </a></li>

                            <li class="pull-right" class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;
                                </a>
                                <ul class="dropdown-menu">
                                    <li role="presentation" data-toggle="modal" data-target="#pause"><a role="menuitem"
                                                                                                        tabindex="-1"
                                                                                                        href="#"> Pause
                                            Test </a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">

                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th> Test Name</th>
                                            <th> Topics</th>
                                            <th> Description</th>
                                            <th> Number of Questions</th>
                                            <th> Marks</th>
                                            <th> Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td> Operating System CT-1</td>
                                            <td> Processes and system calls, Processes and threads, Scheduling</td>
                                            <td> From Book page 53 - 95</td>
                                            <td> 10</td>
                                            <td> 50</td>

                                            <td width="120">
                                                <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                        data-target="#confirmTest">
                                                    Start Now
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td> Algorithm CT-2</td>
                                            <td> Graph Algorithm, Sequence Algorithms, Search</td>
                                            <td> From Book page 23 to 90</td>
                                            <td> 10</td>
                                            <td> 50</td>

                                            <td width="120">
                                                <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                        data-target="#confirmTest">
                                                    Start Now
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td> Algorithm CT-1</td>
                                            <td> Cryptography, Distributed systems algorithms</td>
                                            <td> From Book page 23 - 45</td>
                                            <td> 10</td>
                                            <td> 50</td>

                                            <td width="120">
                                                <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                        data-target="#confirmTest">
                                                    Start Now
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Structural Programing Language CT-1</td>
                                            <td> Array, String, Pointer, List, If/Else, Flow Chart, Swiss Case</td>
                                            <td> From Book page 13 - 75</td>
                                            <td> 10</td>
                                            <td> 50</td>

                                            <td width="120">
                                                <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                        data-target="#confirmTest">
                                                    Start Now
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


<?php include('modals/_modal_theory_class_test.php'); ?>
<?php include('../_footer.php'); ?>
