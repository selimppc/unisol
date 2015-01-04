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
        <small>/AAW panel</small>
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
        <button class="pull-right btn btn-primary btn-sm"  data-toggle="modal" data-target="#add">Add New </button>
    </p>

</div>
<div class="row">
<div class="col-xs-12">

<div class="box">
<div class="box-header">
    <h3 class="box-title">Tabulation Sheet</h3>
</div><!-- /.box-header -->
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>

    <th>Student Name</th>
    <th>Roll </th>
    <th>Department</th>
    <th>Semester</th>
    <th>Year</th>
    <th>GPA</th>
    <th>Action</th>

</tr>
</thead>
<tbody>

<tr>

    <td>Md. Jamal</td>


    <td>CE-01001</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2011</td>
    <th>3.78</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>

<tr>

    <td>Md. Tarak</td>


    <td>MBA-02006</td>
    <td>MBA</td>
    <td>Fall</td>
    <td>2013</td>
    <th>3.70</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>

<tr>

    <td>Md. Khalid</td>


    <td>BBA-01009</td>
    <td>BBA</td>
    <td>Summer</td>
    <td>2010</td>
    <th>2.78</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td>Md. Sami</td>


    <td>CE-01001</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2012</td>
    <th>2.14</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td>Md. Raju</td>


    <td>MBA-01001</td>
    <td>MBA</td>
    <td>Spring</td>
    <td>2013</td>
    <th>3.08</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td> Samia </td>


    <td>MBA-09001</td>
    <td>MBA</td>
    <td>Spring</td>
    <td>2014</td>
    <th>2.22</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td>Rafiq Ahmed</td>


    <td>Phy-01008</td>
    <td>Physics</td>
    <td>Spring</td>
    <td>2015</td>
    <th>3.00</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td>Sumia Jaman</td>


    <td>M-01001</td>
    <td>Math</td>
    <td>Fall</td>
    <td>2012</td>
    <th>3.14</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td>Md. Mukul</td>


    <td>ICT-01001</td>
    <td>ICT</td>
    <td>Fall</td>
    <td>2014</td>
    <th>3.78</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td>Md. Raihan</td>


    <td>CE-01005</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2011</td>
    <th>3.14</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td>A.K.M Rafi</td>


    <td>Eng-01001</td>
    <td>English</td>
    <td>Fall</td>
    <td>2012</td>
    <th>3.25</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td>Md. Zakir Ahmed</td>


    <td>CE-01001</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2010</td>
    <th>3.78</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td>Munni Akter</td>


    <td>CE-01001</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2014</td>
    <th>3.78</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td>Md. Rashad</td>


    <td>CE-01001</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2012</td>
    <th>3.78</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td>Tamanna Khanam</td>


    <td>ENG-01001</td>
    <td>English</td>
    <td>Fall</td>
    <td>2013</td>
    <th>3.78</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td>Md. Raihan</td>


    <td>Phy-01001</td>
    <td>Physics</td>
    <td>Spring</td>
    <td>2011</td>
    <th>3.78</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td>Zafor Ahmed</td>


    <td>CE-01008</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2013</td>
    <th>3.78</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td>Md. Malak</td>


    <td>CE-01001</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2011</td>
    <th>3.78</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td>Zarin Akter</td>


    <td>CE-01001</td>
    <td>CSE</td>
    <td>Fall</td>
    <td>2012</td>
    <th>3.78</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td>Jannatul Ferdous</td>


    <td>EEE-01001</td>
    <td>EEE</td>
    <td>Spring</td>
    <td>2010</td>
    <th>3.18</th>
    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-dropbox btn-sm" data-toggle="modal" data-target="#delete">Delete</button></th>
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

<!-- Modal :: add-->


<div class="modal fade " id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Result</h4>
            </div>
            <div class="modal-body">


                <form role="form">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="name">Student Name</label>
                            <input type="name" class="form-control" id="name" >
                        </div>

                        <div class="form-group">
                            <label for="roll">Student Roll</label>
                            <input type="roll" class="form-control" id="roll" >
                        </div>

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
                            <label for="cgpa">GPA</label>
                            <input type="cgpa" class="form-control" id="cgpa" >
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



<!-- Modal :: view  -->

<div class="modal fade " id="view" tabindex="-1" role="dialog" aria-labelledby="confirm-delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><b>View Of Tabulation</b></h4>
            </div>
            <div class="modal-body">
                <div style="padding: 20px;">
                    <table>
                        <h4><b>Student Information</b></h4>
                        <tr

                        <td>Student Name:Samia Jahan</td>

                        </tr>

                        <td>Roll:01001</td></tr>
                        <td>Department:CSE</td></tr>
                        <td>Semester:Spring</td></tr>

                        <td>Year:2010</td></tr>
                        <td>CGPA:3.05</td></tr>



                        </tr>
                    </table>


                </div>
                <div class="span well" >
                    <table class="table table-bordered table-striped">
                        <h4><b>Details</b></h4>
                        <thead>
                        <tr>

                            <th>Course Code</th>
                            <th>Course Title</th>
                            <th>credit Hours(s)</th>
                            <th>LG</th>
                            <th>GP</th>
                            <th>GPA</th>



                        </tr>
                        </thead>
                        <tbody>

                        <tr>

                            <td>CSE-2201</td>


                            <td>Algorithms</td>
                            <td>3.00</td>
                            <td>B</td>
                            <td>3.00</td>
                            <th rowspan="8" style="vertical-align: middle"> <b> 3.05 </b> </th>


                        </tr>

                        <tr>

                            <td>CSE-2202</td>


                            <td>Algorithms Lab</td>
                            <td>1.00</td>
                            <td>C</td>
                            <td>2.25</td>



                        </tr>
                        <tr>

                            <td>CSE-2203</td>


                            <td>Computer Architecture</td>
                            <td>3.00</td>
                            <td>B</td>
                            <td>3.00</td>



                        </tr>
                        <tr>

                            <td>CSE-2205</td>


                            <td>Numerical Methods</td>
                            <td>2.00</td>
                            <td>B</td>
                            <td>3.00</td>



                        </tr>
                        <tr>

                            <td>CSE-2206</td>


                            <td>Numerical Methods Lab</td>
                            <td>1.00</td>
                            <td>C</td>
                            <td>2.25</td>



                        </tr>
                        <tr>

                            <td>CSE-2207</td>


                            <td>Digital System</td>
                            <td>3.00</td>
                            <td>a</td>
                            <td>3.25</td>


                        </tr>
                        <tr>

                            <td>CSE-2208</td>


                            <td>Digital System Lab</td>
                            <td>1.00</td>
                            <td>C</td>
                            <td>2.25</td>



                        </tr>



                        </tbody>

                    </table>


                </div>
            </div>
            <div class="modal-footer">


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
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <strong>Are you sure to delete?</strong>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-danger" data-dismiss="modal">delete</button>
                <button type="submit" class="btn btn-info" data-dismiss="modal">Cancel</button>



            </div>
        </div>
    </div>
</div>

<!--modal:edit-->

<div class="modal fade " id="edit" tabindex="-1" role="dialog" aria-labelledby="confirm-delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="Name">Student Name</label>
                    <input type="Name" class="form-control" id="Dapartment" value="Samia Jahan">
                </div>

                <div class="form-group">
                    <label for="Name">Student ID</label>
                    <input type="Name" class="form-control" id="Dapartment" value="CE-09003">
                </div>
                <div class="form-group">
                    <label for="Dapartment">Dapartment</label>
                    <input type="Dapartment" class="form-control" id="Dapartment" value="CSE">
                </div>
                <div class="form-group">
                    <label for="Semester">Semester</label>
                    <input type="Semester" class="form-control" id="Semester" value="Spring">
                </div>
                <div class="form-group">
                    <label for="Year">Year</label>
                    <input type="Year" class="form-control" id="Year" value="2011">
                </div>
                <div class="form-group">
                    <label for="Data">GPA</label>
                    <input type="Data" class="form-control" id="Data" value="3.69">
                </div>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-danger" data-dismiss="modal">Update</button>
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
