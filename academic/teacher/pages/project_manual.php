<?php include('../_header.php'); ?>

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->

    <?php include('../_sidebar.php'); ?>

    <style type="text/css">

        .button-centre {
            text-align: center;
        }
    </style>


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


            <h1>Welcome to our Teacher Project Control Panel</h1>

            <div class="box-header">
                <h3 class="box-title">Manual Project Evaluation</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

                <div class="jumbotron text-center">
                    <h2> Project Name : Project 1</h2>

                    <div class="">
                        <label for="title">Obtain Marks</label>
                        <input class="" id="title" placeholder="Marks">
                    </div>
                </div>

                <div class="button-centre">
                    <button type="button" class="btn btn-success">Submit</button>
                </div>
            </div>


        </section>
        <!-- /.content -->
    </aside>
    <!-- /.right-side -->
</div><!-- ./wrapper -->

<?php include('../_footer.php'); ?>
