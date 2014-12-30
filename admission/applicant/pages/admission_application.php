<?php include('../_header.php'); ?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <?php include('../_sidebar.php'); ?>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Profile
                    <small>Applicant</small>
                    
                    
                </h1>

                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Profile</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
       
                <div class="row">
                    <div class="col-md-12">
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab_1" data-toggle="tab">Admission</a></li>
                             
                            </ul>

                    <!--  tab_1 -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                               <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">Application for Admission</h3>
                                 
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                            <table id="example" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Action </th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                          <td>Bechelor of Computer Science and Engineering</td>
                                            <td>This is 4 years course for every student who want to apply for this couse.Total credit hours is 138</td>
                                            <td>5 December 2014</td>
                                            <td>30 December 2014 </td>
                                            <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDetails">View
                                            </button>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approvalModal">Apply</button>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>Bechelor of Computer Science and Engineering</td>
                                            <td>This is 4 years course for every student who want to apply for this couse.Total credit hours is 138</td>
                                            <td>5 December 2014</td>
                                            <td>30 December 2014 </td>
                                            <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDetails">View
                                            </button>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approvalModal">Apply</button>
                                            </td>
                                        </tr>
                                         
                                         <tr>
                                            <td>Bechelor of Computer Science and Engineering</td>
                                            <td>This is 4 years course for every student who want to apply for this couse.Total credit hours is 138</td>
                                            <td>5 December 2014</td>
                                            <td>30 December 2014 </td>
                                            <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDetails">View
                                            </button>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approvalModal">Apply</button>
                                            </td>
                                        </tr>
                                         <tr>
                                             <td>Bechelor of Computer Science and Engineering</td>
                                            <td>This is 4 years course for every student who want to apply for this couse.Total credit hours is 138</td>
                                            <td>5 December 2014</td>
                                            <td>30 December 2014 </td>
                                            <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDetails">View
                                            </button>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approvalModal">Apply</button>
                                            </td>
                                        </tr>
                                           <tr>
                                             <td>Bechelor of Computer Science and Engineering</td>
                                            <td>This is 4 years course for every student who want to apply for this couse.Total credit hours is 138</td>
                                            <td>5 December 2014</td>
                                            <td>30 December 2014 </td>
                                            <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDetails">View
                                            </button>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approvalModal">Apply</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                 
                                </table>
                                </div><!-- /.box-body -->
                               </div><!-- /.box -->
                        </div><!-- /.box -->
                       </div><!-- /.tab-pane -->

                          </div><!-- /.tab-content -->
                        </div><!-- nav-tabs-custom -->
                    </div><!-- /.col -->
                </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->
 <?php include('modal/_modal_admission_application.php'); ?>
<?php include('../_footer.php'); ?>