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
                <small>/AAW</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="box-body">
                 <p>
                    <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#add">Add Examination </button>
                </p>

            </div>
            <div class="row">
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Examination List</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>

                                    <th>Department</th>

                                    <th>Semester </th>
                                    <th>Year</th>
                                    <th>Subject</th>
                                    <th>Examination Date</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr>

                                    <td>Environment Science</td>


                                    <td>Fall</td>
                                    <td>2015</td>
                                    <td>Environment Science</td>
                                    <td>1/1/2015</td>
                                    <th></th>
                                    <th><a class="btn btn-sm btn-info" href="" data-toggle="modal" data-target="#request" >Add Examiner</a></th>
                                </tr>
                                <tr>

                                    <td>Math</td>


                                    <td>Fall</td>
                                    <td>2015</td>
                                    <td>Fundamental</td>
                                    <td>10/1/2015</td>
                                    <th>approved</th>
                                    <th><a class="btn btn-success btn-xs" href="" data-toggle="modal" data-target="#view" >view</a></th>
                                </tr>
                                <tr>

                                    <td>BBA</td>


                                    <td>Spring</td>
                                    <td>2015</td>
                                    <td>Business Strategy</td>
                                    <td>19/2/2015</td>
                                    <th>approved</th>
                                    <th><a class="btn btn-success btn-xs" href="" data-toggle="modal" data-target="#view" >view</a></th>
                                </tr>
                                <tr>

                                    <td>MBA</td>


                                    <td>Fall</td>
                                    <td>2015</td>
                                    <td>Fundamental C</td>
                                    <td>13/4/2015</td>
                                    <th></th>
                                    <th><a class="btn btn-sm btn-info" href="" data-toggle="modal" data-target="#request" >Add Examiner</a></th>
                                </tr>
                                <tr>

                                    <td>English</td>


                                    <td>Summer</td>
                                    <td>2015</td>
                                    <td>Literature1</td>
                                    <td>7/1/2015</td>
                                    <th>approved</th>
                                    <th><a class="btn btn-success btn-xs" href="" data-toggle="modal" data-target="#view" >view</a></th>
                                </tr>
                                <tr>

                                    <td>ICT</td>


                                    <td>Spring</td>
                                    <td>2015</td>
                                    <td>Fundamental C</td>
                                    <td>2/3/2015</td>
                                    <th></th>
                                    <th><a class="btn btn-sm btn-info" href="" data-toggle="modal" data-target="#request" >Add Examiner</a></th>
                                </tr>
                                <tr>

                                    <td>CSE</td>


                                    <td>Summer</td>
                                    <td>2015</td>
                                    <td> C++</td>
                                    <td>8/1/2015</td>
                                    <th>approved</th>
                                    <th><a class="btn btn-success btn-xs" href="" data-toggle="modal" data-target="#view" >view</a></th>
                                </tr>
                                <tr>

                                    <td>Physics</td>


                                    <td>Spring</td>
                                    <td>2015</td>
                                    <td>Physics-Part:I</td>
                                    <td>16/1/2015</td>
                                    <th></th>
                                    <th><a class="btn btn-sm btn-info" href="" data-toggle="modal" data-target="#request" >Add Examiner</a></th>
                                </tr>

                                <tr>

                                    <td>Computer Science & engineering</td>


                                    <td>Summer</td>
                                    <td>2015</td>
                                    <td>Fundamental C</td>
                                    <td>14/2/2015</td>
                                    <th></th>
                                    <th><a class="btn btn-sm btn-info" href="" data-toggle="modal" data-target="#request" >Add Examiner</a></th>
                                </tr>




                                </tbody>

                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>




        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- Modal :: -->


<div class="modal fade " id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Fill up This Form To Enlist Exam</h4>
            </div>
            <div class="modal-body">


                <form role="form">
                    <div class="box-body">



                        <div class="form-group">
                            <label for="department">Department</label>
                            <select class="form-control input-sm" id="department">
                                <option>Select a Department</option>
                                <option value="CSE">CSE</option>
                                <option value="ICT">ICT</option>
                                <option value="ENGLISH">ENGLISH</option>
                                <option value="PHYSICS">PHYSICS</option>
                                <option value="CSE">MATH</option>
                                <option value="CSE">BBA</option>
                                <option value="CSE">MBA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <select class="form-control input-sm" id="semester">
                                <option>Select Semester</option>
                                <option value="CSE">Spring</option>
                                <option value="ICT">Summer</option>
                                <option value="ENGLISH">Fall</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select class="form-control input-sm" id="subject">
                                <option>Select Year</option>
                                <option value="CSE">Fundamental C</option>
                                <option value="ICT">Fundamental C</option>
                                <option value="ENGLISH">Fundamental C</option>
                                <option value="ENGLISH">Fundamental C</option>
                                <option value="ENGLISH">Fundamental C</option>
                                <option value="ENGLISH">Fundamental C</option>
                                <option value="ENGLISH">Fundamental C</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="year">Year</label>
                            <select class="form-control input-sm" id="year">
                                <option>Select Year</option>
                                <option value="CSE">2010</option>
                                <option value="ICT">2011</option>
                                <option value="ENGLISH">2012</option>
                                <option value="ENGLISH">2013</option>
                                <option value="ENGLISH">2014</option>
                                <option value="ENGLISH">2015</option>
                                <option value="ENGLISH">2016</option>

                            </select>
                        </div>



                        <div class="form-group">
                            <label for="date">Examination Date</label>
                            <input type="date" class="form-control" id="date" >
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">



            </div>
        </div>
    </div>
</div>



<!-- Modal :: Add New -->

<div class="modal fade " id="request" tabindex="-1" role="dialog" aria-labelledby="confirm-delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><b>Request Send To Teacher</b></h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="box-body">



                        <div class="form-group">
                            <label for="department">Department</label>
                            <select class="form-control input-sm" id="department">
                                <option>Select a Department</option>
                                <option value="CSE">CSE</option>
                                <option value="ICT">ICT</option>
                                <option value="ENGLISH">ENGLISH</option>
                                <option value="PHYSICS">PHYSICS</option>
                                <option value="CSE">MATH</option>
                                <option value="CSE">BBA</option>
                                <option value="CSE">MBA</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select class="form-control input-sm" id="subject">
                                <option>Select Year</option>
                                <option value="CSE">Fundamental C</option>
                                <option value="ICT">Fundamental C</option>
                                <option value="ENGLISH">Fundamental C</option>
                                <option value="ENGLISH">Fundamental C</option>
                                <option value="ENGLISH">Fundamental C</option>
                                <option value="ENGLISH">Fundamental C</option>
                                <option value="ENGLISH">Fundamental C</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="teacher">Teacher</label>
                            <select class="form-control input-sm" id="teacher">
                                <option>Select Teacher</option>
                                <option value="teacher">Md. Kamal</option>
                                <option value="teacher">A.K.M Rashed</option>
                                <option value="teacher">Mamun Ahmed</option>

                                <option value="teacher">Md. Kamal</option>
                                <option value="teacher">A.K.M Rashed</option>
                                <option value="teacher">Mamun Ahmed</option>
                            </select>
                        </div>


                        </div>
                    </form>
            </div>
            <div class="modal-footer">

                    <button type="submit" class="btn btn-success" data-dismiss="modal">Send Request</button>
                    <button type="submit" class="btn btn-info" data-dismiss="modal">Cancel</button>



            </div>
        </div>
    </div>
</div>


<!--Modal:view-->

<div class="modal fade " id="view" tabindex="-1" role="dialog" aria-labelledby="confirm-delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><b>View Information</b></h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="box-body">



                        <div style="padding: 20px;">
                            <table>
                                <h4> </h4>
                                <tr>

                                <td style="font-size: 140%">Department : CSE</td>

                                </tr>
                                <td style="font-size: 140%">Semester: Spring</td></tr>
                                <td style="font-size: 140%">Year:    2010</td></tr>

                                <td style="font-size: 140%">Subject:  Fundamental C</td></tr>
                                <td style="font-size: 140%">Teacher:  Md Rashad</td></tr>

                                </tr>
                            </table>


                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-info" data-dismiss="modal">Cancel</button>



            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(function() {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>

<?php include('../_footer.php'); ?>
