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
            <th><button class="btn btn-success btn-xs">approved</button></th>
            <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">view</button></th>


        </tr>

        <tr>

            <td>Belight Software</td>
            <td>Software</td>
            <td>With a small team of developers, designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
            <td>4 month</td>
            <th><button class="btn btn-success btn-xs">approved</button></th>
            <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">view</button></th>


        </tr>

        <tr>

            <td>Qlik</td>
            <td>Telecom</td>
            <td>QlikView, is the leading Business Discovery Platform, providing user-driven business intelligence (BI) to a variety of organizations worldwide</td>
            <td>6 month</td>
            <th><button class="btn btn-success btn-xs">approved</button></th>
            <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">view</button></th>


        </tr>

        <tr>
            <td>edu TechSolutions</td>
            <td>Telecom</td>
            <td>With a small team of developers, designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
            <td>6 month</td>
            <th><button class="btn btn-success btn-xs">approved</button></th>
            <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">view</button></th>


        </tr>

        <tr>

            <td>Grameen Solutions</td>


            <td>Software</td>
            <td>With a small team of developers, designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
            <td>6 month</td>

            <th><button class="btn btn-success btn-xs">approved</button></th>
            <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">view</button></th>


        </tr>
        <tr>

            <td>TechSolutions</td>


            <td>Software</td>
            <td>With a small team of developers, designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
            <td>6 month</td>
            <th><button class="btn btn-primary btn-xs">open</button></th>
            <th><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#approve">approve</button>
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">view</button></th>


        </tr>
        <tr>

            <td>TechSolutions</td>


            <td>Software</td>
            <td>With a small team of developers, designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
            <td>6 month</td>
            <th><button class="btn btn-primary btn-xs">open</button></th>
            <th><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#assign">assign</button>
                <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#view">view</button>
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit">edit</button>
                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">delete</button></th>
            </th>


        </tr>
        <tr>

            <td>VB-Solutions</td>


            <td>Telecom</td>
            <td>designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
            <td>6 month</td>
            <th><button class="btn btn-success btn-xs">approved</button></th>
            <th><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">view</button></th>


        </tr>

        <tr>

            <td>GP-IT</td>


            <td>Software</td>
            <td>designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
            <td>6 month</td>
            <th><button class="btn btn-primary btn-xs">open</button></th>
            <th><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#assign">assign</button>
                <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#view">view</button>
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit">edit</button>
                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">delete</button></th>
            </th>


        </tr>
        <tr>

            <td>GP-IT</td>


            <td>Software</td>
            <td>designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
            <td>6 month</td>
            <th><button class="btn btn-primary btn-xs">open</button></th>
            <th><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#approve">approve</button>
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">view</button></th>


        </tr>
        <tr>

            <td>GP-IT</td>


            <td>Telecom</td>
            <td>designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
            <td>6 month</td>
            <th><button class="btn btn-primary btn-xs">open</button></th>
            <th><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#approve">approve</button>
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">view</button></th>


        </tr>
        <tr>

            <td>Concord Group</td>

            <td>Software</td>
            <td>designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
            <td>6 month</td>
            <th><button class="btn btn-primary btn-xs">open</button></th>
            <th><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#assign">assign</button>
                <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#view">view</button>
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit">edit</button>
                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">delete</button></th>
            </th>


        </tr>
        <tr>

            <td>GP-IT</td>


            <td>Software</td>
            <td>designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
            <td>6 month</td>
            <th><button class="btn btn-primary btn-xs">open</button></th>
            <th><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#assign">assign</button>
                <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#view">view</button>
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit">edit</button>
                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">delete</button></th>
            </th>


        </tr>
        <tr>

            <td>GP-IT</td>


            <td>Telecom</td>
            <td>designers works day in and day out on developing beautiful, powerful, and user-friendly apps</td>
            <td>6 month</td>
            <th><button class="btn btn-primary btn-xs">open</button></th>
            <th><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#approve">approve</button>
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">view</button></th>


        </tr>



        </tbody>
        <tfoot>
        <tr>

            <th>Name of Organization</th>

            <th>Type</th>
            <th width>Business Description</th>
            <th>Intern Policy</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </tfoot>
        </table>
        </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div>
        </div>

        </section>
        <!-- /.content -->
    </aside>
    <!-- /.right-side -->
</div><!-- ./wrapper -->

<?php include('../_footer.php'); ?>
