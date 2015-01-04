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
<h2 class="page-header">Lab Management Online: Teacher </h2>

<div class="row">
<div class="col-md-12">
<!-- Custom Tabs -->

<div class="tab-content">
<div class="bs-example tab-pane active" id="tab_1">

<div class="btn-group">
    <button type="button" class=" btn-danger" data-toggle="modal"
            data-target="#manageLab">Manage Lab tasks</button>
</div>
<div class="btn-group">
    <button type="button" class=" btn-success" data-toggle="modal"
            data-target="#distributeLab">Distribute To Student</button>
</div>
<div class="btn-group">
    <button type="button" class=" btn-warning" data-toggle="modal"
            data-target="#evaluateLab">Evaluate Lab tasks</button>
</div>


<br><br>

<b>Lab:</b>

<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
    <th>Lab Title</th>
    <th>Deadline</th>
    <th>Details</th>
    <th>File</th>
    <th>Marks</th>
    <th>Assign To</th>
    <th>Proposed By</th>
    <th>Action</th>
</tr>
</thead>
<tbody>


<tr>
    <td> Online Taxi Cab Management in Java</td>
    <td> 12/3/15 </td>
    <td> A teacher's "value-added" is defined as the average test-score gain for
        his or her students</td>
    <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
    </td>
    <td> 10 </td>
    <td> Aslam </td>
    <td>  </td>
    <td width="130">
        <button class="btn btn-primary btn-xs" data-toggle="modal"
                data-target="#viewDetails">
            View
        </button>

        <button class="btn btn-primary btn-xs" data-toggle="modal"
                data-target="#evaluationLabMarks">
            Edit
        </button>
        <button class="btn btn-danger btn-xs" data-toggle="modal"
                data-target="#delete">
            Delete
        </button>
    </td>
</tr>

<tr>
    <td>Synthesis of Alum from Scrap Aluminum</td>
    <td>7/2/2015 </td>
    <td> Design and architecture  Synthesis of Alum from Scrap Aluminum</td>
    <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
    </td>
    <td> 10 </td>
    <td> Aslam </td>
    <td>  </td>
    <td width="130">
        <button class="btn btn-primary btn-xs" data-toggle="modal"
                data-target="#viewDetails">
            View
        </button>

        <button class="btn btn-primary btn-xs" data-toggle="modal"
                data-target="#evaluationLabMarks">
            Edit
        </button>
        <button class="btn btn-danger btn-xs" data-toggle="modal"
                data-target="#delete">
            Delete
        </button>
        <button class="btn btn-success btn-xs" data-toggle="modal"
                data-target="#submitConfirmation">
            Approve
        </button>
        <button class="btn btn-success btn-xs" data-toggle="modal"
                data-target="#denyConfirmation">
            Deny
        </button>
    </td>
</tr>

<tr>
    <td> Particle Image Velocimetry</td>
    <td> 12/1/15 </td>
    <td> New Developments and Recent Applications on Particle Image Velocimetry</td>
    <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
    </td>
    <td> 10 </td>
    <td>  </td>
    <td>Md Rafiq Islam</td>
    <td width="130">
        <button class="btn btn-primary btn-xs" data-toggle="modal"
                data-target="#viewDetails">
            View
        </button>


        <button class="btn btn-primary btn-xs" data-toggle="modal"
                data-target="#evaluationLabMarks">
            Edit
        </button>
        <button class="btn btn-danger btn-xs" data-toggle="modal"
                data-target="#delete">
            Delete
        </button>
        <button class="btn btn-success btn-xs" data-toggle="modal"
                data-target="#submitConfirmation">
            Approve
        </button>
        <button class="btn btn-success btn-xs" data-toggle="modal"
                data-target="#denyConfirmation">
            Deny
        </button>
    </td>
</tr>
<tr>
    <td>Unicode, Box2D</td>
    <td> 19/1/15 </td>
    <td> Microprocessor :Unicode, Box2D</td>
    <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
    </td>
    <td> 10 </td>
    <td>  </td>
    <td>Md. Monim Islam</td>
    <td width="130">
        <button class="btn btn-primary btn-xs" data-toggle="modal"
                data-target="#viewDetails">
            View
        </button>


        <button class="btn btn-primary btn-xs" data-toggle="modal"
                data-target="#evaluationLabMarks">
            Edit
        </button>
        <button class="btn btn-danger btn-xs" data-toggle="modal"
                data-target="#delete">
            Delete
        </button>
        <button class="btn btn-success btn-xs" data-toggle="modal"
                data-target="#submitConfirmation">
            Approve
        </button>
        <button class="btn btn-success btn-xs" data-toggle="modal"
                data-target="#denyConfirmation">
            Deny
        </button>
    </td>
</tr>

<tr>
    <td> Boot process, X-window concepts, Bash scripts, Linux world</td>
    <td> 12/12/12 </td>
    <td> Boot process, X-window concepts, Bash scripts, Linux world</td>
    <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
    </td>
    <td> 10 </td>
    <td>  </td>
    <td> Jaman Khan </td>
    <td width="130">
        <button class="btn btn-primary btn-xs" data-toggle="modal"
                data-target="#viewDetails">
            View
        </button>
        <button class="btn btn-primary btn-xs" data-toggle="modal"
                data-target="#evaluationLabMarks">
            Edit
        </button>
        <button class="btn btn-danger btn-xs" data-toggle="modal"
                data-target="#delete">
            Delete
        </button>
        <button class="btn btn-success btn-xs" data-toggle="modal"
                data-target="#submitConfirmation">
            Approve
        </button>
        <button class="btn btn-success btn-xs" data-toggle="modal"
                data-target="#denyConfirmation">
            Deny
        </button>
    </td>
</tr>

<tr>
    <td> Java Programming</td>
    <td> 9/2/15 </td>
    <td> Introduction and syntex of Java</td>
    <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
    </td>
    <td> 10 </td>
    <td> Ahmed Raton</td>
    <td>  </td>
    <td width="130">
        <button class="btn btn-primary btn-xs" data-toggle="modal"
                data-target="#viewDetails">
            View
        </button>

        <button class="btn btn-primary btn-xs" data-toggle="modal"
                data-target="#evaluationLabMarks">
            Edit
        </button>
        <button class="btn btn-danger btn-xs" data-toggle="modal"
                data-target="#delete">
            Delete
        </button>
        <button class="btn btn-success btn-xs" data-toggle="modal"
                data-target="#submitConfirmation">
            Approve
        </button>
        <button class="btn btn-success btn-xs" data-toggle="modal"
                data-target="#denyConfirmation">
            Deny
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
</div>


</section>
<!-- /.content -->
</aside>
<!-- /.right-side -->
</div><!-- ./wrapper -->

<?php include('modals/_modal_lab_online.php') ?>
<?php include('../_footer.php'); ?>
