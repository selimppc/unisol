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
                <h2 class="page-header">Scholarship Management :: AAW</h2>
                <div class="row">
                <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Manage scholarship  </a></li>
                    <li><a href="#tab_2" data-toggle="tab">Notice / Ads </a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Settings  <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>
                            <li role="presentation" data-toggle="modal" data-target="#addScholarship"><a role="menuitem" tabindex="-1" href="#"> Add Scholarship </a></li>
                        </ul>
                    </li>
                    <li class="pull-right" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>
                            <li role="presentation" data-toggle="modal" data-target="#addScholarship"><a role="menuitem" tabindex="-1" href="#"> Add Scholarship </a></li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addScholar" >
                            Add New Scholar
                        </button><br>
                        <b>&nbsp;</b>
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Level of Education</th>
                                    <th>Amount</th>
                                    <th>Disperse Method</th>
                                    <th>Collection Details</th>
                                    <th>Minimum Qualification</th>

                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                              
                                    <tr>
                                        <td> Scholarship : Awarded </td>
                                        <td> Department of CSE </td>
                                        <td> Under Grad  </td>
                                        <td> 50 K </td>
                                        <td> Monthly </td>
                                        <td> Bank </td>
                                        <td> BSC </td>
                                        <td> Open </td>
                                        <td width="120">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                View
                                            </button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addScholar">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Electrical : Award </td>
                                        <td> Department of EEE </td>
                                        <td> Post Grad  </td>
                                        <td> 30 K </td>
                                        <td> One Time </td>
                                        <td> Cheque </td>
                                        <td> MSC </td>
                                        <td> Open </td>
                                        <td width="120">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                View
                                            </button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addScholar">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Stiffen : Award </td>
                                        <td> All Department </td>
                                        <td> Graduation   </td>
                                        <td> 20 K </td>
                                        <td> Half Yearly </td>
                                        <td> Bank </td>
                                        <td> BSC </td>
                                        <td> Open </td>
                                        <td width="120">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                View
                                            </button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addScholar">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                          

                                </tbody>

                            </table>
                        </div><!-- /.box -->
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addNotice" >
                            Open New Notice
                        </button><br>

                        <b>&nbsp;</b>

                        <div class="box-body table-responsive">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th> Scholarship </th>
                                    <th> Who are applicable </th>
                                    <th> Deadline </th>
                                    <th> Documents Required </th>
                                    <th> Status </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                               
                                    <tr>
                                        <td> Academic Scholarship </td>
                                        <td> CSE </td>
                                        <td> 12/12/2015  </td>

                                        <td> Transcript sheet </td>
                                        <td> Open </td>
                                        <td>
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewNotice">
                                                View
                                            </button>
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addNotice">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Departmental Scholarship </td>
                                        <td> EEE </td>
                                        <td> 12/11/2015  </td>

                                        <td> Certificate </td>
                                        <td> Open </td>
                                        <td>
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewNotice">
                                                View
                                            </button>
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addNotice">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> University Transfer Scholarship </td>
                                        <td> Departments </td>
                                        <td> 2/2/2015  </td>

                                        <td> Transcript sheet </td>
                                        <td> Open </td>
                                        <td>
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewNotice">
                                                View
                                            </button>
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addNotice">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>


                             


                                </tbody>

                            </table>
                        </div><!-- /.box -->
                    </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
                </div><!-- nav-tabs-custom -->
                </div><!-- /.col -->


                </div> <!-- /.row -->
                <!-- END CUSTOM TABS -->





        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<?php include('modals/_modal_scholarship.php'); ?>

<?php include('../_footer.php'); ?>
