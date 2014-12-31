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
                      <li class="active"><a href="#tab_1" data-toggle="tab">Testing</a></li>

                      <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                  </ul>

                  <div class="tab-content">
                   <!--  tab_1 -->
                   <div class="tab-pane active" id="tab_1">
                      <div class="box">
                          <div class="box-header">
                            <h3 class="box-title">Information and Docs Eligibility Test</h3>
                            
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Degree Offer</th>
                                    <th>Year</th>
                                    <th>Student Name</th>
                                    <th>Docs</th>
                                    <th>Action </th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                    <td>CSE</td>
                                    <td>2016</td>
                                    <td>Ratna Akter</td>
                                     <td>
                                     <img src="../img/doc.png" width="70px" style="cursor: pointer"class="img-thumbnail">
                                    <button class="btn btn-dafault btn-sm" data-toggle="modal" data-target="#viewDetails">View Docs  </button>
                                    </td>
                                    <td>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approvalModal">Approve</button>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#assintask">Comments</button>
                                    
                                    </td>

                                </tr>
                                <tr>
                                   <td>CSE</td>
                                    <td>2016</td>
                                    <td>Ratna Akter</td>
                                     <td>
                                     <img src="../img/doc.png" width="70px" style="cursor: pointer"class="img-thumbnail">
                                    <button class="btn btn-dafault btn-sm" data-toggle="modal" data-target="#viewDetails">View Docs  </button>
                                    </td>
                                    <td>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approvalModal">Approve</button>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#assintask">Comments</button>
                                    
                                    </td>

                                </tr>
                                <tr>
                                    <td>CSE</td>
                                    <td>2016</td>
                                    <td>Ratna Akter</td>
                                     <td>
                                     <img src="../img/doc.png" width="70px" style="cursor: pointer"class="img-thumbnail">
                                    <button class="btn btn-dafault btn-sm" data-toggle="modal" data-target="#viewDetails">View Docs  </button>
                                    </td>
                                    <td>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approvalModal">Approve</button>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#assintask">Comments</button>
                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td>CSE</td>
                                    <td>2016</td>
                                    <td>Ratna Akter</td>
                                     <td>
                                     <img src="../img/doc.png" width="70px" style="cursor: pointer"class="img-thumbnail">
                                    <button class="btn btn-dafault btn-sm" data-toggle="modal" data-target="#viewDetails">View Docs  </button>
                                    </td>
                                    <td>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approvalModal">Approve</button>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#assintask">Comments</button>
                                    
                                    </td>                             
                                </tr>
                                <tr>
                                   <td>CSE</td>
                                    <td>2016</td>
                                    <td>Ratna Akter</td>
                                     <td>
                                     <img src="../img/doc.png" width="70px" style="cursor: pointer"class="img-thumbnail">
                                    <button class="btn btn-dafault btn-sm" data-toggle="modal" data-target="#viewDetails">View Docs  </button>
                                    </td>
                                    <td>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approvalModal">Approve</button>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#assintask">Comments</button>
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
<?php include('modal/_modal_applicant_selection.php'); ?>
<?php include('../_footer.php'); ?>