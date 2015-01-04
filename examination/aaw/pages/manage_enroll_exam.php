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
<div class="box-body">
    <!--<p>
        <button class="pull-right btn btn-primary btn-sm"  data-toggle="modal" data-target="#add">Add New </button>
    </p>-->

</div>
<div class="row">
<div class="col-xs-12">

<div class="box">
<div class="box-header">
    <h3 class="box-title">Enrolled Student List For Exam</h3>
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

    <th>Action</th>

</tr>
</thead>
<tbody>

<tr>

    <td>Md. Jamal</td>


    <td>010101</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>


</tr>

<tr>

    <td>Md. Tarak</td>


    <td>010202</td>
    <td>MBA</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>

</tr>

<tr>

    <td>Md. Mahin</td>


    <td>010102</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>

</tr>
<tr>

    <td>Sami Haider</td>


    <td>010103</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>

</tr>
<tr>

    <td>Md. Tofael Rana</td>


    <td>010201</td>
    <td>MBA</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>

</tr>
<tr>

    <td>Manish Hotra</td>


    <td>010210</td>
    <td>MBA</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>


</tr>
<tr>

    <td>Md. Jamal Kaiser</td>


    <td>010121</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>

</tr>
<tr>

    <td>Md. Sami hasan</td>


    <td>010131</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>

</tr>
<tr>

    <td>Md. Jamal Khan</td>


    <td>010111</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>

</tr>
<tr>

    <td>Md. Kausar Hamid</td>


    <td>010123</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>

</tr>
<tr>

    <td>Md. Samiul Bashar</td>


    <td>010122</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>

</tr>
<tr>

    <td>Khan Jamal</td>


    <td>010134</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>

</tr>
<tr>

    <td>Jeni Hasan</td>


    <td>010117</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>

</tr>
<tr>

    <td>Taifa Khalil</td>


    <td>010133</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>

</tr>
<tr>

    <td>Shumi Hasnat</td>


    <td>010134</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>

</tr>
<tr>

    <td>Talha Ahmed</td>


    <td>010132</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>

</tr>
<tr>

    <td>Kahn Shafi Rahman</td>


    <td>010125</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>

</tr>
<tr>

    <td>Janal Rahman</td>


    <td>010143</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>

</tr>

<tr>

    <td>Mobasser Ahmed</td>


    <td>010154</td>
    <td>CSE</td>
    <td>Spring</td>
    <td>2014</td>

    <th><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>

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
                <h4 class="modal-title" id="myModalLabel">Add </h4>
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
                <h4 class="modal-title" id="myModalLabel"><b>Information</b></h4>
            </div>
            <div class="modal-body">
                <div style="padding: 20px;">
                    <table>

                        <tr>

                        <td style="font-size: 140%"><b>Student Name:</b>Samia Jahan</td>

                        </tr>

                        <td style="font-size: 140%"><b>Roll:</b>0101</td></tr>
                        <td style="font-size: 140%"><b>Department:</b>CSE</td></tr>
                        <td style="font-size: 140%"><b>Semester:</b>Spring</td></tr>

                        <td style="font-size: 140%"><b>Year:</b>2010</td></tr>




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
