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
                                <li class="active"><a href="#tab_1" data-toggle="tab">Assignment (Manual)  </a></li>
                                <li><a href="#tab_2" data-toggle="tab">Assignment (Online)  </a></li>

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
                                        Add Assignment (Manual)
                                    </button><br>
                                    <b> Manual Assignment </b>

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
                                                <th> Action </th>
                                            </tr>
                                            </thead>
                                            <tbody>





                                                <tr>
                                                    <td>Business Analysis</td>
                                                    <td>Business Policy and Analysis </td>
                                                    <td>
                                                            <span data-toggle="modal" data-target="#viewDetails">
                                                                <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                            </span>
                                                    </td>
                                                    <td> BBA</td>
                                                    <td>Tashrif Tabassum/ 60188254 </td>
                                                    <td> 23 </td>
                                                    <td> .. </td>
                                                    <td width="120">
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addMarks">
                                                            Add Mark
                                                        </button>

                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>Distributed Operating System Concepts</td>
                                                    <td> History of DOS</td>
                                                    <td>
                                                            <span data-toggle="modal" data-target="#viewDetails">
                                                                <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                            </span>
                                                    </td>
                                                    <td> CSE</td>
                                                    <td> Monowar Islam / 70181234 </td>
                                                    <td> 21 </td>
                                                    <td> .. </td>
                                                    <td width="120">
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addMarks">
                                                            Add Mark
                                                        </button>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Organic Chemistry concepts</td>
                                                    <td>Organic Synthesis</td>
                                                    <td>
                                                            <span data-toggle="modal" data-target="#viewDetails">
                                                                <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                            </span>
                                                    </td>
                                                    <td>Chemistry</td>
                                                    <td>Mamun Islam / 44141734 </td>
                                                    <td> 24 </td>
                                                    <td> .. </td>
                                                    <td width="120">
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addMarks">
                                                            Add Mark
                                                        </button>

                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td>Operating System Concepts</td>
                                                    <td> OS concepts and history </td>
                                                    <td>
                                                            <span data-toggle="modal" data-target="#viewDetails">
                                                                <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                            </span>
                                                    </td>
                                                    <td> ICT </td>
                                                    <td> Tanzila Tashrif / 60181214 </td>
                                                    <td> 23 </td>
                                                    <td> .. </td>
                                                    <td width="120">
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addMarks">
                                                            Add Mark
                                                        </button>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Business Analysis</td>
                                                    <td>Business Policy and Analysis </td>
                                                    <td>
                                                            <span data-toggle="modal" data-target="#viewDetails">
                                                                <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                            </span>
                                                    </td>
                                                    <td> BBA</td>
                                                    <td>Tashrif Tabassum/ 60188254 </td>
                                                    <td> 23 </td>
                                                    <td> .. </td>
                                                    <td width="120">
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addMarks">
                                                            Add Mark
                                                        </button>

                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>Distributed Operating System Concepts</td>
                                                    <td> History of DOS</td>
                                                    <td>
                                                            <span data-toggle="modal" data-target="#viewDetails">
                                                                <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                            </span>
                                                    </td>
                                                    <td> CSE</td>
                                                    <td> Monowar Islam / 70181234 </td>
                                                    <td> 21 </td>
                                                    <td> .. </td>
                                                    <td width="120">
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addMarks">
                                                            Add Mark
                                                        </button>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Organic Chemistry concepts</td>
                                                    <td>Organic Synthesis</td>
                                                    <td>
                                                            <span data-toggle="modal" data-target="#viewDetails">
                                                                <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                            </span>
                                                    </td>
                                                    <td>Chemistry</td>
                                                    <td>Mamun Islam / 44141734 </td>
                                                    <td> 24 </td>
                                                    <td> .. </td>
                                                    <td width="120">
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addMarks">
                                                            Add Mark
                                                        </button>

                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td>Operating System Concepts</td>
                                                    <td> OS concepts and history </td>
                                                    <td>
                                                            <span data-toggle="modal" data-target="#viewDetails">
                                                                <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                            </span>
                                                    </td>
                                                    <td> ICT </td>
                                                    <td> Tanzila Tashrif / 60181214 </td>
                                                    <td> 23 </td>
                                                    <td> .. </td>
                                                    <td width="120">
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addMarks">
                                                            Add Mark
                                                        </button>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Business Analysis</td>
                                                    <td>Business Policy and Analysis </td>
                                                    <td>
                                                            <span data-toggle="modal" data-target="#viewDetails">
                                                                <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                            </span>
                                                    </td>
                                                    <td> BBA</td>
                                                    <td>Tashrif Tabassum/ 60188254 </td>
                                                    <td> 23 </td>
                                                    <td> .. </td>
                                                    <td width="120">
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addMarks">
                                                            Add Mark
                                                        </button>

                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>Distributed Operating System Concepts</td>
                                                    <td> History of DOS</td>
                                                    <td>
                                                            <span data-toggle="modal" data-target="#viewDetails">
                                                                <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                            </span>
                                                    </td>
                                                    <td> CSE</td>
                                                    <td> Monowar Islam / 70181234 </td>
                                                    <td> 21 </td>
                                                    <td> .. </td>
                                                    <td width="120">
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addMarks">
                                                            Add Mark
                                                        </button>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Organic Chemistry concepts</td>
                                                    <td>Organic Synthesis</td>
                                                    <td>
                                                            <span data-toggle="modal" data-target="#viewDetails">
                                                                <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                            </span>
                                                    </td>
                                                    <td>Chemistry</td>
                                                    <td>Mamun Islam / 44141734 </td>
                                                    <td> 24 </td>
                                                    <td> .. </td>
                                                    <td width="120">
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addMarks">
                                                            Add Mark
                                                        </button>

                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td>Applied Physics Photonics</td>
                                                    <td>Current Trends of Optics and Photonics</td>
                                                    <td>
                                                            <span data-toggle="modal" data-target="#viewDetails">
                                                                <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                            </span>
                                                    </td>
                                                    <td>Applied Physics</td>
                                                    <td>Rashad Islam / 22141234 </td>
                                                    <td> 25</td>
                                                    <td> .. </td>
                                                    <td width="120">
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addMarks">
                                                            Add Mark
                                                        </button>

                                                    </td>
                                                </tr>


                                            </tbody>

                                        </table>
                                    </div><!-- /.box -->
                                </div><!-- /.tab-pane -->




                                <div class="tab-pane" id="tab_2">
                                    <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addAssignmentOnline" >
                                        New Assignment ( Online )
                                    </button><br>
                                    <b> Manage Assignment </b>

                                    <div class="box-body table-responsive">
                                        <table id="example4" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th> Title </th>
                                                <th> Description </th>
                                                <th> File </th>
                                                <th> Deadline </th>
                                                <th> Assign to </th>
                                                <th> Comments </th>
                                                <th> Action </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td> Data Types Conversion </td>
                                                    <td> Make the conversion from Binary to Decimal, Octal to Decimal, Decimal to Binary </td>
                                                    <td>
                                                        <span data-toggle="modal" data-target="#viewDetails">
                                                            <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                        </span>
                                                    </td>

                                                    <td> 20/01/2015 </td>
                                                    <td> Selim Reza </td>
                                                    <td> If needed take help from Google </td>

                                                    <td> 12/12/2014 </td>
                                                    <td> Selim Reza / 22141234 </td>
                                                    <td> .. </td>

                                                    <td width="120">
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addAssignmentOnline">
                                                            Edit
                                                        </button>
                                                        <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewOnlineAssignment">
                                                            View
                                                        </button>
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assignToSt">
                                                            Assign
                                                        </button>
                                                        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                            Delete
                                                        </button>

                                                    </td>
                                                </tr>




                                                <tr>
                                                    <td> COCOMO Model </td>
                                                    <td> An empirical study using task assignment patterns to improve the accuracy of software effort estimation with COCOMO Model </td>
                                                    <td>
                                                        <span data-toggle="modal" data-target="#viewDetails">
                                                            <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                        </span>
                                                    </td>
                                                    <td> 28/01/2015 </td>
                                                    <td> Shafiqul Haque </td>
                                                    <td> If needed take help from Me </td>
                                                    <td width="120">
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addAssignmentOnline">
                                                            Edit
                                                        </button>
                                                        <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewOnlineAssignment">
                                                            View
                                                        </button>
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assignToSt">
                                                            Assign
                                                        </button>
                                                        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                            Delete
                                                        </button>

                                                    <tr>
                                                        <td> Applied Physics Photonics</td>
                                                        <td> Current Trends of Optics and Photonics </td>
                                                        <td>
                                                                <span data-toggle="modal" data-target="#viewDetails">
                                                                    <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                                </span>
                                                        </td>
                                                        <td> 5/1/20145</td>
                                                        <td> Tamanna Khanam / 89741234 </td>
                                                        <td> .. </td>
                                                        <td width="120">
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addAssignmentOnline">
                                                                Edit
                                                            </button>
                                                            <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewOnlineAssignment">
                                                                View
                                                            </button>
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assignToSt">
                                                                Assign
                                                            </button>
                                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                                Delete
                                                            </button>

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Organic Chemistry and Organic Synthesis</td>
                                                        <td>Organic Synthesis</td>
                                                        <td>
                                                    <span data-toggle="modal" data-target="#viewDetails">
                                                        <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                    </span>
                                                        </td>
                                                        <td> 12/1/2015</td>
                                                        <td> Rafi Rahman / 09144634 </td>
                                                        <td> .. </td>
                                                        <td width="120">
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addAssignmentOnline">
                                                                Edit
                                                            </button>
                                                            <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewOnlineAssignment">
                                                                View
                                                            </button>
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assignToSt">
                                                                Assign
                                                            </button>
                                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                                Delete
                                                            </button>

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Operating System Concepts</td>
                                                        <td>OS concepts and history</td>
                                                        <td>
                                                            <span data-toggle="modal" data-target="#viewDetails">
                                                                <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                            </span>
                                                        </td>
                                                        <td> 15/1/2015</td>
                                                        <td> Akhi Rahman / 01159634 </td>
                                                        <td> .. </td>
                                                        <td width="120">
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addAssignmentOnline">
                                                                Edit
                                                            </button>
                                                            <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewOnlineAssignment">
                                                                View
                                                            </button>
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assignToSt">
                                                                Assign
                                                            </button>
                                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                                Delete
                                                            </button>

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Digital  System Concepts</td>
                                                        <td>Digital Structure</td>
                                                        <td>
                                                            <span data-toggle="modal" data-target="#viewDetails">
                                                                <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                            </span>
                                                        </td>
                                                        <td> 6/2/2015</td>
                                                        <td>Poly Sarker / 10159638 </td>
                                                        <td> .. </td>
                                                        <td width="120">
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addAssignmentOnline">
                                                                Edit
                                                            </button>
                                                            <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewOnlineAssignment">
                                                                View
                                                            </button>
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assignToSt">
                                                                Assign
                                                            </button>
                                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                                Delete
                                                            </button>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Architecture concepts</td>
                                                        <td>Architecture analysis and design</td>
                                                        <td>
                                                                <span data-toggle="modal" data-target="#viewDetails">
                                                                    <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                                </span>
                                                        </td>
                                                        <td> 9/2/2015</td>
                                                        <td>Rakhi Sarker / 19199938 </td>
                                                        <td> .. </td>
                                                        <td width="120">
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addAssignmentOnline">
                                                                Edit
                                                            </button>
                                                            <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewOnlineAssignment">
                                                                View
                                                            </button>
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assignToSt">
                                                                Assign
                                                            </button>
                                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                                Delete
                                                            </button>

                                                        </td>
                                                    </tr>





                                                    </td>
                                                </tr>


                                                    <tr>
                                                        <td> Applied Physics Photonics</td>
                                                        <td> Current Trends of Optics and Photonics </td>
                                                        <td>
                                                                <span data-toggle="modal" data-target="#viewDetails">
                                                                    <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                                </span>
                                                        </td>
                                                        <td> 5/1/20145</td>
                                                        <td> Tamanna Khanam / 89741234 </td>
                                                        <td> .. </td>
                                                        <td width="120">
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addAssignmentOnline">
                                                                Edit
                                                            </button>
                                                            <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewOnlineAssignment">
                                                                View
                                                            </button>
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assignToSt">
                                                                Assign
                                                            </button>
                                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                                Delete
                                                            </button>

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Organic Chemistry and Organic Synthesis</td>
                                                        <td>Organic Synthesis</td>
                                                        <td>
                                                    <span data-toggle="modal" data-target="#viewDetails">
                                                        <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                    </span>
                                                        </td>
                                                        <td> 12/1/2015</td>
                                                        <td> Rafi Rahman / 09144634 </td>
                                                        <td> .. </td>
                                                        <td width="120">
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addAssignmentOnline">
                                                                Edit
                                                            </button>
                                                            <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewOnlineAssignment">
                                                                View
                                                            </button>
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assignToSt">
                                                                Assign
                                                            </button>
                                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                                Delete
                                                            </button>

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Operating System Concepts</td>
                                                        <td>OS concepts and history</td>
                                                        <td>
                                                            <span data-toggle="modal" data-target="#viewDetails">
                                                                <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                            </span>
                                                        </td>
                                                        <td> 15/1/2015</td>
                                                        <td> Akhi Rahman / 01159634 </td>
                                                        <td> .. </td>
                                                        <td width="120">
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addAssignmentOnline">
                                                                Edit
                                                            </button>
                                                            <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewOnlineAssignment">
                                                                View
                                                            </button>
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assignToSt">
                                                                Assign
                                                            </button>
                                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                                Delete
                                                            </button>

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Digital  System Concepts</td>
                                                        <td>Digital Structure</td>
                                                        <td>
                                                            <span data-toggle="modal" data-target="#viewDetails">
                                                                <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                            </span>
                                                        </td>
                                                        <td> 6/2/2015</td>
                                                        <td>Poly Sarker / 10159638 </td>
                                                        <td> .. </td>
                                                        <td width="120">
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addAssignmentOnline">
                                                                Edit
                                                            </button>
                                                            <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewOnlineAssignment">
                                                                View
                                                            </button>
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assignToSt">
                                                                Assign
                                                            </button>
                                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                                Delete
                                                            </button>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Architecture concepts</td>
                                                        <td>Architecture analysis and design</td>
                                                        <td>
                                                                <span data-toggle="modal" data-target="#viewDetails">
                                                                    <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                                </span>
                                                        </td>
                                                        <td> 9/2/2015</td>
                                                        <td>Rakhi Sarker / 19199938 </td>
                                                        <td> .. </td>
                                                        <td width="120">
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addAssignmentOnline">
                                                                Edit
                                                            </button>
                                                            <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewOnlineAssignment">
                                                                View
                                                            </button>
                                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assignToSt">
                                                                Assign
                                                            </button>
                                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                                Delete
                                                            </button>

                                                        </td>
                                                    </tr>


                                                <tr>
                                                    <td> Multiple Graph Matching </td>
                                                    <td> Parallel Graduated Assignment Algorithm for Multiple Graph Matching Based on a Common Labelling </td>
                                                    <td>
                                                        <span data-toggle="modal" data-target="#viewDetails">
                                                            <img src="../img/doc.png" width="40" style="cursor: pointer" class="img-thumbnail">
                                                        </span>
                                                    </td>
                                                    <td> 22/01/2015 </td>
                                                    <td> Ratna Akter </td>
                                                    <td> If needed take help from TA </td>
                                                    <td width="120">
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addAssignmentOnline">
                                                            Edit
                                                        </button>
                                                        <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#viewOnlineAssignment">
                                                            View
                                                        </button>
                                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#assignToSt">
                                                            Assign
                                                        </button>
                                                        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                            Delete
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



        </section>
        <!-- /.content -->
    </aside>
    <!-- /.right-side -->
</div><!-- ./wrapper -->

<?php include('modals/_modal_theory_assignment.php'); ?>
<?php include('../_footer.php'); ?>
