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
        <small>/Student</small>
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
            <button class="btn bg-olive btn-flat margin" data-toggle="modal" data-target="#modal-form">Go To Enrollment Form</button>
        </p>

    </div>
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><b>Examination List</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th>Department</th>

                                <th>Examination Starting Date</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>

                                <td>Computer Science & engineering</td>

                                <td> 1/1/2015</td>

                            </tr>
                            <tr>

                                <td>Information & Communication Technology</td>

                                <td>3/1/2015</td>

                            </tr>
                            <tr>

                                <td>MBA</td>

                                <td>5/1/2015</td>

                            </tr>
                            <tr>

                                <td>Business Management</td>

                                <td>7/2/2015</td>

                            </tr>
                            <tr>

                                <td>English</td>

                                <td>9/1/2015</td>

                            </tr>
                            <tr>

                                <td>Mathematics</td>

                                <td>9/3/2015</td>

                            </tr>
                            <tr>

                                <td>Applied Physics</td>

                                <td>4/2/2015</td>

                            </tr>
                            <tr>

                                <td>Environment Science</td>

                                <td>9/2/2015</td>

                            </tr>
                            <tr>

                                <td>Zoology</td>

                                <td>4/1/2015</td>

                            </tr>
                            <tr>

                                <td>Civil Engineering</td>

                                <td>3/1/2015</td>

                            </tr>
                            <tr>

                                <td>Mechanical Engineering</td>

                                <td>17/2/2015</td>

                            </tr>


                        </tbody>

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

<!---->

    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><b>Credits Outline</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Year</th>
                            <th>Semester</th>

                            <th>Total Credit</th>

                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>First Year</td>
                            <td>First Semester</td>

                            <td>19</td>

                        </tr>
                        <tr>
                            <td>First Year</td>
                            <td>Second Semester</td>

                            <td>19</td>

                        </tr>
                        <tr>
                            <td>Second Year</td>
                            <td>First Semester</td>

                            <td>20</td>

                        </tr>
                        <tr>
                            <td>Second Year</td>
                            <td>Second Semester</td>

                            <td>19</td>

                        </tr>
                        <tr>
                            <td>Third Year</td>
                            <td>First Semester</td>

                            <td>22</td>

                        </tr>
                        <tr>
                            <td>Third Year</td>
                            <td>Second Semester</td>

                            <td>21</td>

                        </tr>
                        <tr>
                            <td>Fourth Year</td>
                            <td>First Semester</td>

                            <td>18</td>

                        </tr>
                        <tr>
                            <td>Fourth Year</td>
                            <td>Second Semester</td>

                            <td>22</td>

                        </tr>





                        </tbody>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th></th>

                            <th>Total Credit=160</th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
<!--    -->


    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><b>Fees</b></h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Exam Fee(per credit)</th>
                            <th>Lab Charge</th>

                            <th>Delay Charge</th>

                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>500</td>
                            <td>500</td>

                            <th>0.00</th>

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

<!-- Modal ::  Confirmation -->


<div class="modal fade " id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Enrollment Form</h4>
            </div>
            <div class="modal-body">


                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Student Name</label>
                            <input type="name" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="std_id">ID</label>
                            <input type="std_id" class="form-control" id="std_id" placeholder="Enter your id">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email address">
                        </div>
                        <div class="form-group">
                            <label for="department">Department</label>
                            <select name='department'>
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
                            <select name='semester'>
                                <option>Select Semester</option>
                                <option value="CSE">Spring</option>
                                <option value="ICT">Summer</option>
                                <option value="ENGLISH">Fall</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="year">Year</label>
                            <select name='year'>
                                <option>Select Year</option>
                                <option value="CSE">2010</option>
                                <option value="CSE">2011</option>
                                <option value="CSE">2012</option>
                                <option value="CSE">2013</option>
                                <option value="CSE">2014</option>
                                <option value="CSE">2015</option>
                                <option value="CSE">2016</option>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Payment">Payment Option</label>
                            <label class="radio-inline">
                                <input type="radio" name="optradio">Bank
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="optradio">B-Kash
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="optradio">Online
                            </label>

                        </div>



                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info" data-dismiss="modal"  data-toggle="modal" data-target="#notification">Send</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<!--get msg:modal-->

<div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Send Notification</h4>
            </div>
            <div class="modal-body">

                <form role="form">
                    <div class="box-body">
                        <p>The Form has been submitted to AAW........</p>

                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


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
