<?php include('../_header.php'); ?>

<div class="wrapper row-offcanvas row-offcanvas-left">
<!-- Left side column. contains the logo and sidebar -->

<?php include('../_sidebar.php'); ?>


<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Enrollment
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

<h1>Welcome to our Student Enrollment Page</h1>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>


            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th> ID</th>
                            <th>Year</th>
                            <th>Semester</th>
                            <th>Courses</th>
                            <th>Discount Type</th>
                            <th>Payment Type</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Md. Shafiqul Haque</td>
                            <td>011091022</td>
                            <td>2013</td>
                            <td>Fall</td>
                            <td>CSE-101,CSE-003,PHY-01,ECO-02,IPE-1</td>
                            <td>Scholarship-25% , Waiver-25%</td>
                            <td>Online Bank Payment</td>
                            <td>49,000</td>
                            <td><span class="label label-primary">New</span></td>
                            <td>
                                <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                    View
                                </button>
                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#approvalModal">
                                    Approve
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <td>Monjur Morshed Bappy</td>
                            <td>011091013</td>
                            <td>2013</td>
                            <td>Fall</td>
                            <td>CSE-003,CSE-101,CSE-102,PHY-02,ECO-01,MATH-005</td>
                            <td>Scholarship-50% , Waiver-25%</td>
                            <td>Bank Payment</td>
                            <td>54,000</td>
                            <td><span class="label label-primary">New</span></td>
                            <td>
                                <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                    View
                                </button>
                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#approvalModal">
                                    Approve
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <td>Ayon Alfaz</td>
                            <td>011091032</td>
                            <td>2013</td>
                            <td>Fall</td>
                            <td>CSE-333,CSE-334,PHY-01,ECO-02,IPE-1</td>
                            <td>Waiver-25%</td>
                            <td>Bank Payment</td>
                            <td>49,000</td>
                            <td><span class="label label-warning">Checked</span></td>
                            <td>
                                <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                    View
                                </button>
                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#approvalModal">
                                    Approve
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <td>Md. Shafiqul Haque</td>
                            <td>011091022</td>
                            <td>2013</td>
                            <td>Fall</td>
                            <td>CSE-101,CSE-003,PHY-01,ECO-02,IPE-1</td>
                            <td>Scholarship-25% , Waiver-25%</td>
                            <td>Online Bank Payment</td>
                            <td>49,000</td>
                            <td><span class="label label-warning">Checked</span></td>
                            <td>
                                <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                    View
                                </button>
                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#approvalModal">
                                    Approve
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <td>Md. Shafiqul Haque</td>
                            <td>011091022</td>
                            <td>2013</td>
                            <td>Fall</td>
                            <td>CSE-101,CSE-003,PHY-01,ECO-02,IPE-1</td>
                            <td>Scholarship-25% , Waiver-25%</td>
                            <td>Online Bank Payment</td>
                            <td>49,000</td>
                            <td><span class="label label-danger">Declined</span></td>
                            <td>
                                <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                    View
                                </button>
                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#approvalModal">
                                    Approve
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <td>Md. Shafiqul Haque</td>
                            <td>011091022</td>
                            <td>2013</td>
                            <td>Fall</td>
                            <td>CSE-101,CSE-003,PHY-01,ECO-02,IPE-1</td>
                            <td>Scholarship-25% , Waiver-25%</td>
                            <td>Online Bank Payment</td>
                            <td>49,000</td>
                            <td><span class="label label-success">Approved</span></td>
                            <td>
                                <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                    View
                                </button>
                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#approvalModal">
                                    Approve
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <td>Md. Shafiqul Haque</td>
                            <td>011091022</td>
                            <td>2013</td>
                            <td>Fall</td>
                            <td>CSE-101,CSE-003,PHY-01,ECO-02,IPE-1</td>
                            <td>Scholarship-25% , Waiver-25%</td>
                            <td>Online Bank Payment</td>
                            <td>49,000</td>
                            <td><span class="label label-success">Approved</span></td>
                            <td>
                                <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                    View
                                </button>
                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#approvalModal">
                                    Approve
                                </button>

                            </td>
                        </tr>

                        <tr>
                            <td>Md. Shafiqul Haque</td>
                            <td>011091022</td>
                            <td>2013</td>
                            <td>Fall</td>
                            <td>CSE-101,CSE-003,PHY-01,ECO-02,IPE-1</td>
                            <td>Scholarship-25% , Waiver-25%</td>
                            <td>Online Bank Payment</td>
                            <td>49,000</td>
                            <td><span class="label label-success">Approved</span></td>
                            <td>
                                <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                    View
                                </button>
                                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#approvalModal">
                                    Approve
                                </button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
</section>
<!-- /.content -->
</aside>
<!-- /.right-side -->
</div><!-- ./wrapper -->

</section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<?php include('modals/_modal_enrollment.php'); ?>
<?php include('../_footer.php'); ?>
