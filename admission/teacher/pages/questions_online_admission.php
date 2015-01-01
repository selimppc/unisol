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
                              <li class="active"><a href="#tab_1" data-toggle="tab">Question </a></li>
                             
                            </ul>

                    <!--  tab_1 -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_2">
                              <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">Prepare Question for Admission Examination</h3>
                                <button class="pull-right btn-success btn-xs"  data-toggle="modal" data-target="#addTitle" >
                                Add New
                              </button>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                            <table id="example" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Auto Evaluated</th>
                                            <th>Questions</th>
                                            <th>Options</th>
                                            <th>Answer</th>
                                            <th>Action </th>
                                            
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Question for CSE Department</td>
                                            <td>MCQ</td>
                                            <td>yes</td>
                                            <td>RAD stands for?</td>
                                            <td>1.Relative Application Development,2.Rapid Application Development,3.Rapid Application Document,4.Rapid Apply Document</td>
                                            <td>2.Rapid Application Development</td>
                                            <td>
                                             <button class="btn btn-success btn-xs"  data-toggle="modal" data-target="#addQuestion" >
                                              Add New
                                            </button>
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">View</button>
                                            <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#addQuestion">Edit</button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">Delete</button>
                                             </td>
                                           
                                        </tr>
                                         <tr>
                                            <td>Question for BBA Department</td>
                                            <td>MCQ</td>
                                            <td>Yes</td>
                                            <td>Communication with superiors involves?</td>
                                            <td>1.Problem solving,2.Disciplinary matters,3.Welfare aspects,4.Public relations</td>
                                            <td>1.Problem solving</td>
                                             <td>
                                             <button class="btn btn-success btn-xs"  data-toggle="modal" data-target="#addQuestion" >
                                              Add New
                                            </button>
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetailstb">View</button>
                                            <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#addQuestion">Edit</button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">Delete</button>
                                             </td>
                                            
                                        </tr>
                                         <tr>
                                            <td>Question for CSE Department</td>
                                            <td>MCQ</td>
                                            <td>yes</td>
                                            <td>RAD stands for?</td>
                                            <td>1.Relative Application Development,2.Rapid Application Development,3.Rapid Application Document,4.Rapid Apply Document</td>
                                            <td>2.Rapid Application Development</td>
                                              <td>
                                           <button class="btn btn-success btn-xs"  data-toggle="modal" data-target="#addQuestion" >
                                              Add New
                                            </button>
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">View</button>
                                            <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#addQuestion">Edit</button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">Delete</button>
                                             </td>
                                            
                                        </tr>
                                         <tr>
                                            <td>Question for CSE Department</td>
                                            <td>MCQ</td>
                                            <td>yes</td>
                                            <td>RAD stands for?</td>
                                            <td>1.Relative Application Development,2.Rapid Application Development,3.Rapid Application Document,4.Rapid Apply Document</td>
                                            <td>2.Rapid Application Development</td>
                                              <td>
                                            <button class="btn btn-success btn-xs"  data-toggle="modal" data-target="#addQuestion" >
                                              Add New
                                            </button>
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">View</button>
                                            <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#addQuestion">Edit</button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">Delete</button>
                                             </td>
                                           
                                        </tr>
                                         <tr>
                                             <td>Question for CSE Department</td>
                                            <td>MCQ</td>
                                            <td>yes</td>
                                            <td>RAD stands for?</td>
                                            <td>1.Relative Application Development,2.Rapid Application Development,3.Rapid Application Document,4.Rapid Apply Document</td>
                                            <td>2.Rapid Application Development</td>
                                               <td>
                                             <button class="btn btn-success btn-xs"  data-toggle="modal" data-target="#addQuestion" >
                                              Add New
                                            </button>
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">View</button>
                                            <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#addQuestion">Edit</button>
                                            <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">Delete</button>
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
<?php include('modal/_modal_teacher_question.php'); ?>
<?php include('../_footer.php'); ?>