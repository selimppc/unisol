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
        <small>/Teacher panel</small>
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
    <p>
        <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#add">Add New</button>
    </p>

</div>
<div class="row">
<div class="col-xs-12">

<div class="box">
<div class="box-header">
    <h3 class="box-title"> List Of Organization For Internship</h3>
</div><!-- /.box-header -->
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<col width="200">
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
    <th>Intern Policy</th>
    <th>Status</th>
    <th>Action</th>


</tr>
</thead>
<tbody>

<tr>

    <td>edu TechSolutions</td>


    <td>Software</td>
    <td>With a small team of developers, designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
    <td>6 month</td>
    <th>
        <h5 style="color: #b11b64"><b>approved</b></h5>
    </th>
    <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view1">view</button></th>


</tr>

<tr>

    <td>Belight Software</td>
    <td>Software</td>
    <td>With a small team of developers, designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
    <td>4 month</td>
    <th>
        <h5 style="color: #b11b64"><b>approved</b></h5>
    </th>
    <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view1">view</button></th>


</tr>

<tr>

    <td>Qlik</td>
    <td>Telecom</td>
    <td>QlikView, is the leading Business Discovery Platform, providing user-driven business intelligence (BI) to a variety of organizations worldwide</td>
    <td>6 month</td>
    <th>
        <h5 style="color: #b11b64"><b>approved</b></h5>
    </th>
    <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view1">view</button></th>


</tr>

<tr>
    <td>edu TechSolutions</td>
    <td>Telecom</td>
    <td>With a small team of developers, designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
    <td>6 month</td>
    <th>
        <h5 style="color: #b11b64"><b>approved</b></h5>
    </th>
    <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view1">view</button></th>


</tr>

<tr>

    <td>Grameen Solutions</td>


    <td>Software</td>
    <td>With a small team of developers, designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
    <td>6 month</td>

    <th>
        <h5 style="color: #b11b64"><b>approved</b></h5>
    </th>
    <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view1">view</button></th>


</tr>
<tr>

    <td>TechSolutions</td>


    <td>Software</td>
    <td>With a small team of developers, designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
    <td>6 month</td>
    <th>
        <h5 style="color:#0089db"><b>open</b></h5>
    </th>
    <th><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#assign">assign</button>
        <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#view2">view</button>
        <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit">edit</button>
        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">delete</button></th>
    </th>


</tr>
<tr>

    <td>TechSolutions</td>


    <td>Software</td>
    <td>With a small team of developers, designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
    <td>6 month</td>
    <th>
        <h5 style="color:#0089db"><b>open</b></h5>
    </th>
    <th><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#assign">assign</button>
        <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#view2">view</button>
        <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit">edit</button>
        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">delete</button></th>
    </th>


</tr>
<tr>

    <td>VB-Solutions</td>


    <td>Telecom</td>
    <td>designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
    <td>6 month</td>
    <th>
        <h5 style="color: #b11b64"><b>approved</b></h5>
    </th>
    <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view1">view</button></th>


</tr>

<tr>

    <td>GP-IT</td>


    <td>Software</td>
    <td>designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
    <td>6 month</td>
    <th>
        <h5 style="color:#0089db"><b>open</b></h5>
    </th>
    <th><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#assign">assign</button>
        <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#view2">view</button>
        <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit">edit</button>
        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">delete</button></th>
    </th>


</tr>
<tr>

    <td>GP-IT</td>


    <td>Software</td>
    <td>designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
    <td>6 month</td>
    <th>
        <h5 style="color:#0089db"><b>open</b></h5>
    </th>
    <th><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#assign">assign</button>
        <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#view2">view</button>
        <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit">edit</button>
        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">delete</button></th>
    </th>


</tr>
<tr>

    <td>GP-IT</td>


    <td>Telecom</td>
    <td>designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
    <td>6 month</td>
    <th>
        <h5 style="color:#0089db"><b>open</b></h5>
    </th>
    <th><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#assign">assign</button>
        <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#view2">view</button>
        <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit">edit</button>
        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">delete</button></th>
    </th>


</tr>
<tr>

    <td>Concord Group</td>

    <td>Software</td>
    <td>designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
    <td>6 month</td>
    <th>
        <h5 style="color:#0089db"><b>open</b></h5>
    </th>
    <th><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#assign">assign</button>
        <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#view2">view</button>
        <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit">edit</button>
        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">delete</button></th>
    </th>


</tr>
<tr>

    <td>GP-IT</td>


    <td>Software</td>
    <td>designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
    <td>6 month</td>
    <th>
        <h5 style="color:#0089db"><b>open</b></h5>
    </th>
    <th><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#assign">assign</button>
        <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#view2">view</button>
        <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit">edit</button>
        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">delete</button></th>
    </th>


</tr>
<tr>

    <td>GP-IT</td>


    <td>Telecom</td>
    <td>designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
    <td>6 month</td>
    <th>
        <h5 style="color:#0089db"><b>open</b></h5>
    </th>
    <th><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#assign">assign</button>
        <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view2">view</button>
        <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit">edit</button>
        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">delete</button></th>



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

<!-- Modal :: approve  -->

<div class="modal fade " id="assign" tabindex="-1" role="dialog" aria-labelledby="confirm-delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><b>Approval</b></h4>
            </div>
            <div class="modal-body">
                <p><b>Are you sure to assign this item?</b></p>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-success" data-dismiss="modal">Assign</button>
                <button type="submit" class="btn btn-info" data-dismiss="modal">Cancel</button>



            </div>
        </div>
    </div>
</div>

<!-- Modal :: view1  -->

<div class="modal fade " id="view1" tabindex="-1" role="dialog" aria-labelledby="confirm-delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Information</h4>
            </div>

            <div class="modal-body">
                <div class="span well">



                    <table>

                        <tr>

                            <td style="font-size: 140%"><b>Name of Organization:</b>edu TechSolutions</td>

                        </tr>

                        <td style="font-size: 140%"><b>Type:</b>Software</td></tr>
                        <td style="font-size: 140%"><b>Intern Duration:</b>6 month</td></tr>
                        <td style="font-size: 140%"><b>Status:</b>Approved</td></tr>

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
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Information</h4>
            </div>

            <div class="modal-body">
                <div class="span well">



                    <table>

                        <tr>

                            <td style="font-size: 140%"><b>Name of Organization:</b>edu TechSolutions</td>

                        </tr>

                        <td style="font-size: 140%"><b >Type:</b>Software</td></tr>
                        <td style="font-size: 140%"><b>Intern Duration:</b>6 month</td></tr>
                        <td style="font-size: 140%"><b>Status:</b>open</td></tr>

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
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Organization Information</h4>
            </div>
            <div class="modal-body">


                <form role="form">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="name">Name of Organization</label>
                            <input type="name" class="form-control" id="name" >
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
                            <input type="name" class="form-control" id="name" >
                        </div>
                        <div class="form-group">
                            <label for="year">Intern Duration</label>
                            <select class="form-control input-sm" id="year">
                                <option>Select One</option>
                                <option value="CSE">6 month</option>
                                <option value="ICT">4 month</option>
                                <option value="ENGLISH">5 month</option>

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
                    <label for="Dapartment">Name Of Organization</label>
                    <input type="Dapartment" class="form-control" id="Dapartment" value="EduTechSolutions">
                </div>
                <div class="form-group">
                    <label for="Semester">Type</label>
                    <input type="Semester" class="form-control" id="Semester" value="Software">
                </div>
                <div class="form-group">
                    <label for="Year">Business Description</label>
                    <input type="Year" class="form-control" id="Year" value="With a small team of developers, designers works day in and day out on developing beautiful, powerful, and user-friendly apps">
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
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
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






<?php include('../_footer.php'); ?>
