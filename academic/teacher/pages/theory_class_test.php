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
            <h2 class="page-header">Class Test :: Teacher</h2>
            <div class="row">
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Class Test(Manual)  </a></li>
                            <li><a href="#tab_2" data-toggle="tab">Class Test (Online)</a></li>

                            <li class="pull-right" class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                                <ul class="dropdown-menu">
                                    <li role="presentation" data-toggle="modal" data-target="#addClass"><a role="menuitem" tabindex="-1" href="#"> Add Class Test </a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addClassTest" >
                                    Add New Result
                                </button><br>
                                <b>&nbsp;</b>

                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th> Class Test </th>
                                            <th> Topics </th>
                                            <th> Student Name </th>
                                            <th> Student ID </th>
                                            <th> Marks/ Score </th>
                                            <th> Average Mark </th>
                                            <th> Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>
<!--                                        --><?php //for($i = 0; $i < 5; $i++){ ?>
                                            <tr>
                                                <td> Calculus Part 1 </td>
                                                <td> Limitations </td>
                                                <td> Selim Reza </td>
                                                <td> SR009 </td>
                                                <td> 18 </td>
                                                <td> 18 </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Numerical Methods </td>
                                                <td>Basic Numerical Concepts </td>
                                                <td> Shofiq Reza </td>
                                                <td> NM004</td>
                                                <td> 14 </td>
                                                <td> 10 </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Digital Signal Processing </td>
                                                <td>Signal Processing </td>
                                                <td> Samia Jahan </td>
                                                <td> DG004</td>
                                                <td> 15</td>
                                                <td> 13</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Image Processing </td>
                                                <td>Basic Signal Processing </td>
                                                <td>  Shajahan Kabir</td>
                                                <td> DI004</td>
                                                <td> 15</td>
                                                <td> 12</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Data Structure </td>
                                                <td>Data Analysis </td>
                                                <td> Kabir Ahmed</td>
                                                <td> DS004</td>
                                                <td> 15</td>
                                                <td> 10</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Algorithms </td>
                                                <td> Algorithms theory</td>
                                                <td>Rafiq Ahmed</td>
                                                <td> AI004</td>
                                                <td> 16</td>
                                                <td> 16</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Numerical Analysis</td>
                                                <td> Numerical Rules</td>
                                                <td> Samia Jahan </td>
                                                <td> NM004</td>
                                                <td> 14</td>
                                                <td> 11</td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addClassTest">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>



<!--                                        --><?php //} ?>




                                        </tbody>

                                    </table>
                                </div><!-- /.box -->
                            </div><!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_2">
                                <!-- START CUSTOM TABS -->
                                <h2 class="page-header">&nbsp;</h2>
                                <div class="row">
                                <div class="col-md-12">
                                <!-- Custom Tabs -->
                                <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li><a href="#tab_3" data-toggle="tab"> Question Papers  </a></li>
                                    <li><a href="#tab_4" data-toggle="tab">Evaluation</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_3">
                                        <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addQuestionPaper" >
                                            Add Question Paper
                                        </button><br>

                                        <b>Question:</b>

                                        <div class="box-body table-responsive">
                                            <table id="example3" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Questions</th>
                                                    <th>Options</th>
                                                    <th>Answer</th>
                                                    <th>Comments</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php for($i = 0; $i < 5; $i++){ ?>
                                                    <tr>
                                                        <td> MCQ </td>
                                                        <td> RAD stands for? </td>
                                                        <td> 1.Relative Application Development,2.Rapid Application Development,3.Rapid Application Document,4.Rapid Apply Document  </td>
                                                        <td> 2.Rapid Application Development </td>
                                                        <td> comments </td>
                                                        <td> open </td>
                                                        <td>
                                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                                View
                                                            </button>
                                                        </td>
                                                    </tr>


                                                <?php } ?>


                                                </tbody>

                                            </table>
                                        </div><!-- /.box -->
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_4">

                                        <div class="box-body table-responsive">
                                            <table id="example4" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th> Type </th>
                                                    <th> Questions </th>
                                                    <th> Options </th>
                                                    <th> Answer </th>
                                                    <th> Number </th>
                                                    <th> Action </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php for($i = 0; $i < 5; $i++){ ?>
                                                    <tr>
                                                        <td> MCQ </td>
                                                        <td> RAD stands for? </td>
                                                        <td> 1.Relative Application Development,2.Rapid Application Development,3.Rapid Application Document,4.Rapid Apply Document  </td>
                                                        <td> 2.Rapid Application Development </td>
                                                        <td> 23 </td>
                                                        <td>
                                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addEvoNo">
                                                                Add Number
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

<?php include('modals/_modal_theory_class_test.php') ?>
<?php include('../_footer.php'); ?>
