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
                              <li class="active"><a href="#tab_1" data-toggle="tab">AssignWork</a></li>
                              <li><a href="#tab_2" data-toggle="tab">Question</a></li>
                              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                            </ul>

                       <div class="tab-content">
                       <!--  tab_1 -->
                        <div class="tab-pane active" id="tab_1">
                              <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">Assign Work to Teacher to Prepare Questions</h3>
                             <button class="pull-right btn btn-success"  data-toggle="modal" data-target="#addtask" >
                                    Add New
                                </button>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                          <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Department</th>
                                            <th>Subject</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Action </th>
                                            
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>CSE</td>
                                            <td>Programming C</td>
                                            <td>Programming C question</td>
                                            <td>Programming C 10 question</td>
                                            <td>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#assintask">Assign</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Revoke</button>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                            <td>CSE</td>
                                            <td>Programming C</td>
                                            <td>Programming C question</td>
                                            <td>Programming C 10 question</td>
                                            <td>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#assintask">Assign</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Revoke</button>
                                            </td>
                                            
                                        </tr>
                                         <tr>
                                            <td>CSE</td>
                                            <td>Programming C</td>
                                            <td>Programming C question</td>
                                            <td>Programming C 10 question</td>
                                            <td>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#assintask">Assign</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Revoke</button>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>CSE</td>
                                            <td>Programming C</td>
                                            <td>Programming C question</td>
                                            <td>Programming C 10 question</td>
                                            <td>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#assintask">Assign</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Revoke</button>
                                            </td>                                   
                                              </tr>
                                         <tr>
                                           <td>CSE</td>
                                            <td>Programming C</td>
                                            <td>Programming C question</td>
                                            <td>Programming C 10 question</td>
                                            <td>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#assintask">Assign</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Revoke</button>
                                            </td>
                                        </tr>
                                        
                                        
                                    </tbody>
                                 
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                       </div><!-- /.tab-pane -->

                         <!--  tab_2 -->
                            <div class="tab-pane" id="tab_2">
                              <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">All Question for Admission Examination</h3>
                                
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                            <table id="example" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Questions</th>
                                            <th>Options</th>
                                            <th>Answer</th>
                                            <th>Action </th>
                                            
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>MCQ</td>
                                            <td>RAD stands for?</td>
                                            <td>1.Relative Application Development,2.Rapid Application Development,3.Rapid Application Document,4.Rapid Apply Document</td>
                                            <td>2.Rapid Application Development</td>
                                            <td><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">View</button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#approvalModal">Approve</button>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                             <td>MCQ</td>
                                            <td>RAD stands for?</td>
                                            <td>1.Relative Application Development,2.Rapid Application Development,3.Rapid Application Document,4.Rapid Apply Document</td>
                                            <td>2.Rapid Application Development</td>
                                            <td><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">View</button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#approvalModal">Approve</button>
                                            </td>
                                            
                                        </tr>
                                         <tr>
                                             <td>MCQ</td>
                                            <td>RAD stands for?</td>
                                            <td>1.Relative Application Development,2.Rapid Application Development,3.Rapid Application Document,4.Rapid Apply Document</td>
                                            <td>2.Rapid Application Development</td>
                                            <td><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">View</button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#approvalModal">Approve</button>
                                            </td>
                                            
                                        </tr>
                                         <tr>
                                              <td>MCQ</td>
                                            <td>RAD stands for?</td>
                                            <td>1.Relative Application Development,2.Rapid Application Development,3.Rapid Application Document,4.Rapid Apply Document</td>
                                            <td>2.Rapid Application Development</td>
                                            <td><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">View</button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#approvalModal">Approve</button>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                             <td>MCQ</td>
                                            <td>RAD stands for?</td>
                                            <td>1.Relative Application Development,2.Rapid Application Development,3.Rapid Application Document,4.Rapid Apply Document</td>
                                            <td>2.Rapid Application Development</td>
                                            <td><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">View</button>
                                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#approvalModal">Approve</button>
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
<?php include('modal/_modal_admin_question.php'); ?>
<?php include('../_footer.php'); ?>