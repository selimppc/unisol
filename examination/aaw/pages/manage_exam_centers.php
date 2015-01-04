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
    <p>
        <button class="pull-right btn btn-primary btn-sm"  data-toggle="modal" data-target="#add">Add Examination Center</button>
    </p>

</div>
<div class="row">
<div class="col-xs-12">

<div class="box">
<div class="box-header">
    <h3 class="box-title">Examination Center List</h3>
</div><!-- /.box-header -->
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
    <col width="150">
    <col width="200">
    <col width="180">
    <col width="150">
<thead>
<tr>

    <th>Name of Examination Center</th>

    <th>Address </th>

    <th>Category</th>
    <th>Action</th>


</tr>
</thead>
<tbody>

<tr>

    <td>Dhaka (51276)</td>
    <td>American Alumni Association,
        Prometric Testing Center,
        House 145, Street 13B,
        Banani 1216,
        Dhaka, Bangladesh</td>

    <td>General Training & Academic</td>

    <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">View</button>
    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit">Edit</button>
    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>

<tr>

    <td>Chittagong (21275)</td>
    <td>Ctg Traning Association,
        Prometric Testing Center,
        House 1, Street 13B,
        Shughanda 1216,
        Ctg, Bangladesh</td>

    <td>General Training & Academic</td>

    <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>

<tr>

    <td>Dhaka (21200)</td>
    <td>
        Prometric Testing Center,
        House 10, Street 13B,
        Dhaka, Bangladesh</td>

    <td> Academic</td>

    <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>

<tr>

    <td>Dhaka (21200)</td>
    <td>
        Prometric Traning Center,
        House 10, Street 13B,
        Dhaka, Bangladesh</td>

    <td> General Training & Academic</td>

    <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>

<tr>

    <td>Old Dhaka (51200)</td>
    <td>
        Prometric Traning Center ,
        House 10, Street 13B,
        Dhaka, Bangladesh</td>

    <td> Academic</td>

    <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>

<tr>

    <td>Old Dhaka (51200)</td>
    <td>
        ChildSchool ,
        House 10, Street 13B,
        Dhaka, Bangladesh</td>

    <td>General Training & Academic</td>

    <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>
<tr>

    <td>Old Dhaka (51200)</td>
    <td>
        ChildSchool ,
        House 10, Street 13B,
        Dhaka, Bangladesh</td>

    <td> Academic</td>

    <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>

<tr>

    <td>X Dhaka (51200)</td>
    <td>
        ChildSchool ,
        House 10, Street 13B,
        Dhaka, Bangladesh</td>

    <td> Academic</td>

    <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>

<tr>

    <td>X Dhaka (51200)</td>
    <td>
        ChildSchool ,
        House 10, Street 13B,
        Dhaka, Bangladesh</td>

    <td> Academic</td>

    <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">View</button>
        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit">Edit</button>
        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#delete">Delete</button></th>
</tr>

</tbody>
                <tfoot>
                <tr>

                    <th>Name of Examination Center</th>

                    <th>Address </th>

                    <th>Category</th>
                    <th>Action</th>
                </tr>
                </tfoot>
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
                <h4 class="modal-title" id="myModalLabel">Fill up This Form To Enlist Exam center</h4>
            </div>
            <div class="modal-body">


                <form role="form">
                    <div class="box-body">



                        <div class="form-group">
                            <label for="date">Name Of Examination Center</label>
                            <input type="d" class="form-control" id="date" >
                        </div>
                        <div class="form-group">
                            <label for="date">Address</label>
                            <input type="d" class="form-control" id="date" >
                        </div>




                        <div class="form-group">
                            <label for="year">Category</label>
                            <select class="form-control input-sm" id="year">
                                <option>Select a Category</option>
                                <option value="CSE">General Training & Academic</option>
                                <option value="ICT">Academic</option>


                            </select>
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



<!-- Modal :: view  -->

<div class="modal fade " id="view" tabindex="-1" role="dialog" aria-labelledby="confirm-delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Details Information Of Exam Center</h3>
            </div>
            <div class="modal-body">
                <div class="span well" style="padding: 20px;">
                    <table>
                        
                        <tr>

                        <td style="font-size: 140%"><b>Name of Exam center  :</b>  Dhaka (21200)</td>

                        </tr>

                        <td style="font-size: 140%"><b>Address  :</b> American Alumni Association,
                            Prometric Testing Center,
                            House 145, Street 13B,
                            Banani 1216,
                            Dhaka, Bangladesh </td></tr>

                        <td style="font-size: 140%"><b>Category  : </b>General Training & Academic</td></tr>


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
                    <label for="Dapartment">Name of Examination Center</label>
                    <input type="Dapartment" class="form-control" id="Dapartment" value="Dhaka (21200)">
                </div>
                <div class="form-group">
                    <label for="Semester">Address</label>
                    <input type="Semester" class="form-control" id="Semester" value=" House 10, Street 13B,
        Dhaka, Bangladesh">
                </div>
                <div class="form-group">
                    <label for="semester">Category</label>
                    <select class="form-control input-sm" id="semester">
                        <option>Select Category</option>
                        <option value="CSE">General Training & Academic</option>
                        <option value="ICT">Academic</option>

                    </select>
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
