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

            <h1>Welcome to our Student Thesis Control Panel</h1>

            <div class="box-header">
                <h3 class="box-title">Manual Thesis Evaluation</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

                <div class="jumbotron text-center">
                    <h2> Thesis Name : Thesis Name</h2>

                </div>

                <div class="button-centre">
                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#approvalModal">
                        View Marks
                    </button>
                </div>
            </div>



        </section>
        <!-- /.content -->
    </aside>
    <!-- /.right-side -->
</div><!-- ./wrapper -->

<?php include('modal/_modal_page.php'); ?>
<?php include('../_footer.php'); ?>

