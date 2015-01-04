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
<h2 class="page-header"> Theory Assignment :: Student </h2>

<div class="row">
<div class="col-md-12">
<!-- Custom Tabs -->
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab_1" data-toggle="tab">My Assignment </a></li>

    <li><a href="#tab_2" data-toggle="tab"> Assignment Online </a></li>

</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab_1">


    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th> Assignment Title</th>
                <th> Topics</th>
                <th> Doc</th>
                <th> Department</th>
                <th> Student Name/ID</th>
                <th> Marks</th>
                <th> Comments</th>
                <th> Action</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td> Data Types Conversion</td>
                <td> Data Structure</td>
                <td>
                                                        <span data-toggle="modal" data-target="#viewDetails">
                                                            <img src="../img/doc.png" width="40" style="cursor: pointer"
                                                                 class="img-thumbnail">
                                                        </span>
                </td>
                <td> CSE</td>
                <td> Selim Reza / 011014012</td>
                <td> 24</td>
                <td> Take help from Book and TA</td>
                <td>
                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                        View Detail
                    </button>
                </td>
            </tr>

            <tr>
                <td> Graph Algorithms</td>
                <td> Algorithm</td>
                <td>
                                                        <span data-toggle="modal" data-target="#viewDetails">
                                                            <img src="../img/doc.png" width="40" style="cursor: pointer"
                                                                 class="img-thumbnail">
                                                        </span>
                </td>
                <td> CSE</td>
                <td> Shafiqul Haque / 011013112</td>
                <td> 23</td>
                <td> ..</td>
                <td>
                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                        View Detail
                    </button>
                </td>
            </tr>

            <tr>
                <td> COCOMO Model</td>
                <td> Software Enginnering</td>
                <td>
                                                        <span data-toggle="modal" data-target="#viewDetails">
                                                            <img src="../img/doc.png" width="40" style="cursor: pointer"
                                                                 class="img-thumbnail">
                                                        </span>
                </td>
                <td> CSE</td>
                <td> Almas Hossain / 011091013</td>
                <td> 25</td>
                <td> R&D</td>
                <td>
                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                        View Detail
                    </button>
                </td>
            </tr>

            <tr>
                <td> SDLC Process Analysis</td>
                <td> System Analysis and Design</td>
                <td>
                                                        <span data-toggle="modal" data-target="#viewDetails">
                                                            <img src="../img/doc.png" width="40" style="cursor: pointer"
                                                                 class="img-thumbnail">
                                                        </span>
                </td>
                <td> CSE</td>
                <td> Ratna Akter / 011091008</td>
                <td> 22</td>
                <td> Use google</td>
                <td>
                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                        View Detail
                    </button>
                </td>
            </tr>


            </tbody>

        </table>
    </div>
    <!-- /.box -->
</div>
<!-- /.tab-pane -->

<div class="tab-pane" id="tab_2">
    <button class="pull-right btn btn-success btn-sm" data-toggle="modal" data-target="#submitAssignment">
        Submit New Assignment ( Online )
    </button>
    <br>
    <b> Online Assignment </b>

    <div class="box-body table-responsive">
        <table id="example3" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th> Title</th>
                <th> Description</th>
                <th> File</th>
                <th> Deadline</th>
                <th> Assigned to</th>
                <th> Comments</th>
                <th> Action</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td> Data Types Conversion</td>
                <td> Make the conversion from Binary to Decimal, Octal to Decimal, Decimal to Binary</td>
                <td>
                                                        <span data-toggle="modal" data-target="#viewDetails">
                                                            <img src="../img/doc.png" width="40" style="cursor: pointer"
                                                                 class="img-thumbnail">
                                                        </span>
                </td>
                <td> 20/01/2015</td>
                <td> Selim Reza</td>
                <td> If needed take help from Google</td>
                <td width="120">
                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#submitAssignment">
                        Edit
                    </button>
                    <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewOnlineAssignment">
                        View
                    </button>

                </td>
            </tr>


            <tr>
                <td> COCOMO Model</td>
                <td> An empirical study using task assignment patterns to improve the accuracy of software effort
                    estimation with COCOMO Model
                </td>
                <td>
                                                        <span data-toggle="modal" data-target="#viewDetails">
                                                            <img src="../img/doc.png" width="40" style="cursor: pointer"
                                                                 class="img-thumbnail">
                                                        </span>
                </td>
                <td> 28/01/2015</td>
                <td> Shafiqul Haque</td>
                <td> If needed take help from Me</td>
                <td width="120">
                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#submitAssignment">
                        Edit
                    </button>
                    <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewOnlineAssignment">
                        View
                    </button>

                </td>
            </tr>


            <tr>
                <td> Multiple Graph Matching</td>
                <td> Parallel Graduated Assignment Algorithm for Multiple Graph Matching Based on a Common Labelling
                </td>
                <td>
                                                        <span data-toggle="modal" data-target="#viewDetails">
                                                            <img src="../img/doc.png" width="40" style="cursor: pointer"
                                                                 class="img-thumbnail">
                                                        </span>
                </td>
                <td> 22/01/2015</td>
                <td> Ratna Akter</td>
                <td> If needed take help from TA</td>
                <td width="120">
                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#submitAssignment">
                        Edit
                    </button>
                    <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewOnlineAssignment">
                        View
                    </button>

                </td>
            </tr>


            <tr>
                <td> Data Analysis</td>
                <td> Structure</td>
                <td>
                                                        <span data-toggle="modal" data-target="#viewDetails">
                                                            <img src="../img/doc.png" width="40" style="cursor: pointer"
                                                                 class="img-thumbnail">
                                                        </span>
                </td>
                <td> 12/12/2014</td>
                <td> Selim Reza / Gourp</td>
                <td> ..</td>
                <td width="120">
                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#submitAssignment">
                        Edit
                    </button>
                    <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewOnlineAssignment">
                        View
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

<?php include('modals/_modal_theory_assignment.php'); ?>
<?php include('../_footer.php'); ?>
