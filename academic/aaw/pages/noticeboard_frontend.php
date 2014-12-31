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



            <h3>Notice Board</h3>


            <div class="box-body">
                <p>
                    <button class="pull-right btn btn-primary btn-sm"  data-toggle="modal" data-target="#massage">Send Notification </button>
                </p>
                <p>
                    <button class="pull-left btn btn-primary btn-sm"  data-toggle="modal" data-target="#add">Add New </button>
                </p>

            </div>
            <div class="row">
            <div class="col-xs-12">

            <div class="box">
            <div class="box-header">

            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>

                <th>Title</th>
                <th>Description</th>
                <th>File</th>
                <th>Target Role</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Notification</th>


            </tr>
            </thead>
            <tbody>

            <tr>

                <td>Holiday</td>
                <td> A Winter Vacation</td>
                <th>
            <span data-toggle="modal" data-target="#view">
                <img src="../img/doc.png" width="50px" style="cursor: pointer">
            </span>
                </th>
                <td>All</td>
                <td>10/1/2015</td>
                <td>20/1/2015</td>
                <th>
                    <button class="btn btn-success btn-xs" >new</button>


                </th>
                <th>
                    <button class="btn btn-success btn-xs" >send</button>
                    <button class="btn btn-info btn-xs" >approved</button>

                </th>


            </tr>

            <tr>

                <td>class test</td>
                <td>Department:cse,semester:fall,year:2015</td>
                <th>
            <span data-toggle="modal" data-target="#view">
                <img src="../img/doc.png" width="50px" style="cursor: pointer">
            </span>
                </th>
                <td>Teacher,Student</td>
                <td>20/1/2015</td>
                <td>20/1/2015</td>
                <th>
                    <button class="btn btn-success btn-xs" >new</button>

                    </span>
                </th>
                <td></td>

            </tr>
            <tr>

                <td>Holiday</td>
                <td>ChrismasDay</td>
                <th>
            <span data-toggle="modal" data-target="#view">
                <img src="../img/doc.png" width="50px" style="cursor: pointer">
            </span>
                </th>
                <td>All</td>
                <td>25/12/2014</td>
                <td>25/12/2014</td>
                <th>
                    <button class="btn btn-primary btn-xs" >closed</button>


                </th>
                <th>
                    <button class="btn btn-success btn-xs" >send</button>
                    <button class="btn btn-info btn-xs" >approved</button>

                </th>


            </tr>
            <tr>

                <td>class test</td>
                <td>Department:ict,semester:fall,year:2013</td>
                <th>
            <span data-toggle="modal" data-target="#view">
                <img src="../img/doc.png" width="50px" style="cursor: pointer">
            </span>
                </th>
                <td>Teacher,Student</td>
                <td>31/1/2014</td>
                <td>31/1/2014</td>
                <th>
                    <button class="btn btn-primary btn-xs" >closed</button>


                </th>
                <th>
                    <button class="btn btn-success btn-xs" >send</button>
                    <button class="btn btn-danger btn-xs" >discard</button>

                </th>


            </tr>

            <tr>

                <td>class test</td>
                <td>Department:cse,semester:fall,year:2015</td>
                <th>
            <span data-toggle="modal" data-target="#view">
                <img src="../img/doc.png" width="50px" style="cursor: pointer">
            </span>
                </th>
                <td>Teacher,Student</td>
                <td>2/1/2015</td>
                <td>2/1/2015</td>
                <th>
                    <button class="btn btn-success btn-xs" >new</button>

                    </span>
                </th>
                <td></td>

            </tr>

            <tr>

                <td>class test</td>
                <td>Department:cse,semester:fall,year:2015</td>
                <th>
            <span data-toggle="modal" data-target="#view">
                <img src="../img/doc.png" width="50px" style="cursor: pointer">
            </span>
                </th>
                <td>Teacher,Student</td>
                <td>3/1/2015</td>
                <td>3/1/2015</td>
                <th>
                    <button class="btn btn-success btn-xs" >new</button>

                    </span>
                </th>
                <td></td>

            </tr>

            </tbody>
            <tfoot>
            <tr>

                <th>Title</th>
                <th>Description</th>
                <th>File</th>
                <th>Target Role</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Notification</th>

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

<?php include('../_footer.php'); ?>
