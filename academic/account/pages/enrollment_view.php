<?php include('../_header.php'); ?>

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->

    <?php include('../_sidebar.php'); ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->


        <!-- Main content -->
        <section class="content invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Welcome to our Enrollment Page
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">

                    <address>
                        <strong>Student Details</strong><br>
                        Id :<strong> 011091022</strong><br>
                        Year :<strong> 2013</strong><br>
                        Semester : <strong>Fall</strong>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">

                    <address>
                        <strong>Payment Details</strong><br>
                        Scholarship Type:<strong> Scholarship-25%</strong> <br>
                        Payment Account Type : <strong>Online Bank Payment</strong> <br>
                        Total Amount :<strong> 49,000 </strong><br>
                    </address>
                </div>
                <!-- /.col -->


                <!-- Table row -->
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>Course Code</th>
                                <th>Credit</th>
                                <th>Per Credit Fee</th>
                                <th>Total Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Computer Architecture</td>
                                <td>CSE-101</td>
                                <td>3</td>
                                <td>4500</td>
                                <td>13500</td>

                            </tr>
                            <tr>
                                <td>Computer Network</td>
                                <td>CSE-003</td>
                                <td>3</td>
                                <td>4500</td>
                                <td>13500</td>

                            </tr>
                            <tr>
                                <td>Economics 2</td>
                                <td>ECO-02</td>
                                <td>3</td>
                                <td>4500</td>
                                <td>13500</td>

                            </tr>
                            <tr>
                                <td>Physics 2</td>
                                <td>PHY-02</td>
                                <td>3</td>
                                <td>4500</td>
                                <td>13500</td>
                            </tr>

                            <tr>
                                <td class="highrow"></td>
                                <td class="highrow"></td>
                                <td class="highrow"></td>
                                <td class="highrow"><strong>Subtotal</strong></td>
                                <td class="highrow">54000</td>
                                <td class="highrow"></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </section>
        <!-- /.content -->
        <div class="majhkahne">
            <button class="btn btn-primary"><i class="fa"></i> Accept</button>
            <button class="btn btn-success"><i class="fa"></i> Decline</button>
            <a href="enrollment.php" class="btn btn-info""><i class="fa"></i> Back</a>
        </div>


    </aside>
    <!-- /.right-side -->
</div><!-- ./wrapper -->

<?php include('../_footer.php'); ?>

<style>
    .height {
        min-height: 200px;
    }

    .icon {
        font-size: 47px;
        color: #5CB85C;
    }

    .iconbig {
        font-size: 77px;
        color: #5CB85C;
    }

    .table > tbody > tr > .emptyrow {
        border-top: none;
    }

    .table > thead > tr > .emptyrow {
        border-bottom: none;
    }

    .table > tbody > tr > .highrow {
        border-top: 3px solid;
    }
</style>
