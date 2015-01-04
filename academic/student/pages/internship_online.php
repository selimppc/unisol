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
                <small>/Student panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">


            <h3>Welcome to Internship Management</h3>

            <div class="box-body">


            </div>
            <div class="row">
                <div class="col-xs-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">InternShip </a></li>

                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    Settings <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li role="presentation" data-toggle="modal" data-target="#report"><a role="menuitem"
                                                                                                         tabindex="-1"
                                                                                                         href="#">Submit
                                            Report</a></li>
                                </ul>
                            </li>
                        </ul>

                        <br>

                        <button class="pull-right btn btn-success btn-sm" data-toggle="modal" data-target="#add">
                            Add InternShip Organization
                        </button>
                        <br>
                        <br>

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title"> List Of Organization For Internship</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <col width="150">
                                    <col width="80">
                                    <col width="350">
                                    <col width="80">
                                    <col width="90">
                                    <col width="100">
                                    <thead>
                                    <tr>
                                        <th>Name of Organization</th>
                                        <th>Type</th>
                                        <th>Business Description</th>
                                        <th>InternShip Policy</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>Nano-Tech Software</td>
                                        <td>Software Company</td>
                                        <td>One of the best Software Team of Bangladesh to create Web Solutions and
                                            Applications for next generations people
                                        </td>
                                        <th>
                                <span data-toggle="modal" data-target="#view_policy">
                                    <img src="../img/doc.png" width="50px" style="cursor: pointer">
                                </span>
                                        </th>
                                        <th>
                                            <h5 style="color: #b11b64"><b>accepted</b></h5>
                                        </th>
                                        <th>
                                            <button class="btn btn-info btn-xs" data-toggle="modal"
                                                    data-target="#view1">View
                                            </button>
                                        </th>
                                    </tr>

                                    <tr>
                                        <td>Qubee</td>
                                        <td>Telecom</td>
                                        <td>Qubee is the leading Business Discovery Platform, providing user-driven
                                            business
                                            intelligence (BI) to a variety of organizations worldwide
                                        </td>
                                        <th>
                                <span data-toggle="modal" data-target="#view_policy">
                                    <img src="../img/doc.png" width="50px" style="cursor: pointer">
                                </span>
                                        </th>
                                        <th>
                                            <h5 style="color: #b11b64"><b>accepted</b></h5>
                                        </th>
                                        <th>
                                            <button class="btn btn-info btn-xs" data-toggle="modal"
                                                    data-target="#view1">View
                                            </button>
                                        </th>
                                    </tr>

                                    <tr>
                                        <td>Grameen Web Solutions</td>
                                        <td>Software</td>
                                        <td>With a small team of developers, designers works day in and day out on
                                            developing
                                            beautiful, powerful, and user-friendly apps
                                        </td>
                                        <th>
                                <span data-toggle="modal" data-target="#view_policy">
                                    <img src="../img/doc.png" width="50px" style="cursor: pointer">
                                </span>
                                        </th>

                                        <th>
                                            <h5 style="color: #b11b64"><b>accepted</b></h5>
                                        </th>
                                        <th>
                                            <button class="btn btn-info btn-xs" data-toggle="modal"
                                                    data-target="#view1">View
                                            </button>
                                        </th>
                                    </tr>


                                    <tr>
                                        <td>GP-IT</td>
                                        <td>Software</td>
                                        <td>GP-IT is the one and only multinational software company who deals with the
                                            Grameen Phone customer of Bangladesh
                                        </td>
                                        <th>
                                <span data-toggle="modal" data-target="#view_policy">
                                    <img src="../img/doc.png" width="50px" style="cursor: pointer">
                                </span>
                                        </th>
                                        <th>
                                            <h5 style="color:#0089db"><b>open</b></h5>
                                        </th>
                                        <th>
                                            <button class="btn btn-success btn-xs" data-toggle="modal"
                                                    data-target="#offer">Offer
                                            </button>
                                            <button class="btn btn-default btn-xs" data-toggle="modal"
                                                    data-target="#view2">View
                                            </button>
                                            <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                    data-target="#delete">Delete
                                            </button>
                                        </th>
                                        </th>


                                    </tr>


                                    </tbody>

                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </aside>
    <!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- Modal :: view1  -->

<div class="modal fade " id="view1" tabindex="-1" role="dialog" aria-labelledby="confirm-delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Information</h4>
            </div>

            <div class="modal-body">
                <div class="span well">


                    <table>

                        <tr>

                            <td style="font-size: 140%"><b>Name of Organization:</b>edu TechSolutions</td>

                        </tr>

                        <td style="font-size: 140%"><b>Type:</b>Software</td>
                        </tr>
                        <td style="font-size: 140%"><b>Intern Duration:</b>6 month</td>
                        </tr>
                        <td style="font-size: 140%"><b>Status:</b>Accepted</td>
                        </tr>

                        </tr>
                    </table>


                </div>
            </div>
            <div class="modal-footer">


                <button type="submit" class="btn btn-info" data-dismiss="modal">Cancel</button>


            </div>
        </div>
    </div>
</div>


<!-- Modal :: view2  -->

<div class="modal fade " id="view2" tabindex="-1" role="dialog" aria-labelledby="confirm-delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Information</h4>
            </div>

            <div class="modal-body">
                <div class="span well">


                    <table>

                        <tr>

                            <td style="font-size: 140%"><b>Name of Organization:</b>edu TechSolutions</td>

                        </tr>

                        <td style="font-size: 140%"><b>Type:</b>Software</td>
                        </tr>
                        <td style="font-size: 140%"><b>Intern Duration:</b>6 month</td>
                        </tr>
                        <td style="font-size: 140%"><b>Status:</b>open</td>
                        </tr>

                        </tr>
                    </table>


                </div>
            </div>
            <div class="modal-footer">


                <button type="submit" class="btn btn-info" data-dismiss="modal">Cancel</button>


            </div>
        </div>
    </div>
</div>


<!-- Modal :: add-->


<div class="modal fade " id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Organization Information</h4>
            </div>
            <div class="modal-body">


                <form role="form">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="name">Name of Organization</label>
                            <input type="name" class="form-control" id="name">
                        </div>

                        <div class="form-group">
                            <label for="year">Type</label>
                            <select class="form-control input-sm" id="year">
                                <option>Select One</option>
                                <option value="CSE">Software</option>
                                <option value="ICT">Telecom</option>


                            </select>
                        </div>
                        <div class="form-group">
                            <label for="roll">Business Description</label>
                            <textarea class="form-control" id="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="roll">InternShip Policy</label>

                            <textarea class="form-control" id="Policy"></textarea>
                        </div>


                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">


            </div>
        </div>
    </div>
</div>

<!--modal:edit-->

<div class="modal fade " id="edit" tabindex="-1" role="dialog" aria-labelledby="confirm-delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="Dapartment">Name Of Organization</label>
                    <input type="Dapartment" class="form-control" id="Dapartment" value="EduTechSolutions">
                </div>
                <div class="form-group">
                    <label for="Semester">Type</label>
                    <input type="Semester" class="form-control" id="Semester" value="Software">
                </div>
                <div class="form-group">
                    <label for="Year">Business Description</label>
                    <input type="Year" class="form-control" id="Year"
                           value="With a small team of developers, designers works day in and day out on developing beautiful, powerful, and user-friendly apps">
                </div>
                <div class="form-group">
                    <label for="text">Intern Duration</label>
                    <input type="text" class="form-control" id="Data" value="6 month">
                </div>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-danger" data-dismiss="modal">Update</button>
                <button type="submit" class="btn btn-info" data-dismiss="modal">Cancel</button>


            </div>
        </div>
    </div>
</div>

<!--modal:delete-->

<div class="modal fade " id="delete" tabindex="-1" role="dialog" aria-labelledby="confirm-delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><b>Delete Confirmation</b></h4>
            </div>
            <div class="modal-body">
                <strong><b>Are you sure to delete?</b></strong>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-danger" data-dismiss="modal">delete</button>
                <button type="submit" class="btn btn-info" data-dismiss="modal">Cancel</button>


            </div>
        </div>
    </div>
</div>

<!--submit:modal-->

<div class="modal fade " id="offer" tabindex="-1" role="dialog" aria-labelledby="confirm-delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Offer Organization</h4>
            </div>
            <div class="modal-body">
                <p><b>Are you sure to offer this organization for internship?</b></p>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-success" data-dismiss="modal">Offer</button>
                <button type="submit" class="btn btn-info" data-dismiss="modal">Cancel</button>


            </div>
        </div>
    </div>
</div>

<!--view_policy:modal-->

<div class="modal fade" id="view_policy" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h3 class="modal-title">View InternShip Policy</h3>
            </div>
            <div class="modal-body">
                <div class="span well">
                    <h4><u>Internship Policy Statement</u></h4>


                    <p>Internships are educational programs that allow interns to gain practical work experience and
                        develop skills in the areas of their career interests under the guidance of experts or those
                        working in the field. Internships are appropriate for graduate students or persons who have had
                        prior experience working in fields that relate directly to their career or the
                        eduTechSolutions’s interests.</p>

                    <p> Internships must be of benefit to both the intern and the eduTechSolutions. The intern benefits
                        from the opportunity to learn about the system, conduct research through guidance from a staff
                        member allocated by the Secretariat, while the Company benefits from the outcome of the intern’s
                        research and contribution to other activities.</p>

                    <p> The eduTechSolutions welcomes interns from all over the world particularly with a view for
                        diverse inputs in its work, but accords preference to African interns who are researching or
                        working on human rights in general and the African human rights system in particular.</p>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="pull-left btn btn-info" data-dismiss="modal" data-toggle="modal"
                        data-target="#view_policy_docs">View InternshipPolicy Docs
                </button>

                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!--view_policy_docs:modal-->

<div class="modal fade" id="view_policy_docs" tabindex="-1" role="dialog" aria-labelledby="viewDetails"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h3 class="modal-title">View InternShip Policy</h3>
            </div>
            <div class="modal-body">
                <div class="span well">
                    <h4><u>Internship Policy Document</u></h4>

                    <p>
                        <img src="../img/doc.png">
                    </p>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--submit report:modal-->

<div class="modal fade " id="report" tabindex="-1" role="dialog" aria-labelledby="confirm-delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="myModalLabel" style="text-align: center"><b>InternShip Report</b></h3>
                <h5 style="text-align: center"><p style="font-size: 140%">July-December,2014</p></h5>
            </div>
            <div class="modal-body">
                <div class="span well">
                    <table>

                        <tr>

                            <td style="font-size: large"><b>Name of Student : </b>Tamanna Khanam</td>

                        </tr>
                        <td style="font-size: large"><b>Student ID: </b>ICT-09002</td>
                        </tr>

                        <td style="font-size: large"><b>Department: </b>ICT</td>
                        </tr>
                        <td style="font-size: large"><b>Semester: </b>Spring</td>
                        </tr>
                        <td style="font-size: large"><b>Year: </b>2010</td>
                        </tr><br>
                        <td style="font-size: large"><b>InternShip Company: </b>Toronto CityEvents</td>
                        </tr>
                        <td style="font-size: large"><b>Job Coach: </b>David Lewis</td>
                        </tr>
                        <td style="font-size: large"><b>InternShip Coach : </b>Melissa Duchak</td>
                        </tr>
                        <th style="text-align:right">
            <span data-toggle="modal" data-target="#view_report">
                <img src="../img/doc.png" width="200px" style="cursor: pointer">
            </span>
                        </th>


                        </tr>
                        <th>
                            <button type="submit" class="pull-right btn btn-info" data-dismiss="modal"
                                    data-toggle="modal" data-target="#view_report">View Report
                            </button>
                        </th>
                    </table>

                </div>

            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-success" data-dismiss="modal">submit</button>
                <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancel</button>


            </div>
        </div>
    </div>
</div>

<!--View_report:modal-->

<div class="modal fade" id="view_report" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h3 class="modal-title">View InternShip Report</h3>
            </div>
            <div class="modal-body">
                <div class="span well">
                    <h4 style="text-align: center"><b>Internship Report</b></h4>

                    <p style="text-align: center"><b style="font-size: large">On</b></p>

                    <p style="text-align: center"><b style="font-size: larger">Embedded System Touchscreen and WIFI</b>
                    </p>

                    <p>
                        <img src="../img/doc.png">
                    </p>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->




<?php include('../_footer.php'); ?>
