<?php include('../_header.php'); ?>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <?php include('../_sidebar.php'); ?>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Admission Module
                <small>/teacher</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

         <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Selection</a></li>

                      <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                  </ul>

                  <div class="tab-content">
                     <!--  tab_1 -->
                     <div class="tab-pane active" id="tab_1">
                      <div class="box">
                          <div class="box-header">
                            <h3 class="box-title">Final Selection For Admission</h3>
                            
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Applicant Id</th>
                                    <th>Applicant Name</th>
                                    <th>Degree Offer</th>
                                    <th>Semester</th>
                                    <th>Admission Test</th>
                                    <th>Score</th>
                                    <th>Status</th>
                                    <th>Action </th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Ratna Akter</td>
                                    <td>BCSE</td>
                                    <td>Spring2016</td>
                                    <td>Yes</td>
                                    <td>65 out of 100</td>
                                    <td>open</td>
                                   <td>
                                   <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approvalModal">Approve</button>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDetails">View</button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Delete</button>
                                   </td>

                               </tr>
                               <tr>
                                  <td>1</td>
                                    <td>Ratna Akter</td>
                                    <td>BCSE</td>
                                    <td>Spring2016</td>
                                    <td>Yes</td>
                                    <td>65 out of 100</td>
                                    <td>open</td>
                                   <td>
                                   <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approvalModal">Approve</button>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDetails">View</button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Delete</button>
                                   </td>
                             </tr>
                              <tr>
                                   <td>1</td>
                                    <td>Ratna Akter</td>
                                    <td>BCSE</td>
                                    <td>Spring2016</td>
                                    <td>Yes</td>
                                    <td>65 out of 100</td>
                                    <td>approved</td>
                                   <td>
                                   <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approvalModal">Approve</button>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDetails">View</button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Delete</button>
                                   </td>
                            </tr>
                            <tr>
                                  <td>1</td>
                                    <td>Ratna Akter</td>
                                    <td>BCSE</td>
                                    <td>Spring2016</td>
                                    <td>Yes</td>
                                    <td>65 out of 100</td>
                                    <td>open</td>
                                   <td>
                                   <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approvalModal">Approve</button>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDetails">View</button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Delete</button>
                                   </td>
                                </tr>
                                <tr>
                                  <td>1</td>
                                    <td>Ratna Akter</td>
                                    <td>BCSE</td>
                                    <td>Spring2016</td>
                                    <td>Yes</td>
                                    <td>65 out of 100</td>
                                    <td>new</td>
                                   <td>
                                   <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approvalModal">Approve</button>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDetails">View</button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Delete</button>
                                   </td>
                                 </tr>


                            </tbody>

                        </table>
                        </div><!-- /.box-body -->
                        </div><!-- /.box -->
                        </div><!-- /.tab-pane -->
                        </div><!-- /.tab-content -->
                        </div><!-- nav-tabs-custom -->
                    </div><!-- /.col -->
                </div>
          </section><!-- /.content -->
     </aside><!-- /.right-side -->
 </div><!-- ./wrapper -->
<?php include('modal/_modal_select_admission.php'); ?>
<?php include('../_footer.php'); ?>