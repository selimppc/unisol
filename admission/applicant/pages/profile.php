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
                              <li class="active"><a href="#tab_1" data-toggle="tab">Login </a></li>
                              <li><a href="#tab_2" data-toggle="tab">Applicant</a></li>
                              <li><a href="#tab_3" data-toggle="tab">Personal</a></li>
                              <li><a href="#tab_4" data-toggle="tab">Academic</a></li>
                              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                            </ul>

                    <!--  tab_1 -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                              <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">Login Information</h3>
                           
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                             <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Email Address</th>
                                            <th>User name</th>
                                            <th>Security Questions</th>
                                            <th>Security Answer </th>
                                            <th>Action </th>
                                            
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ratna@gmail.com</td>
                                            <td>ratnaakter</td>
                                            <td>What is your favourite color?</td>
                                            <td>Purple</td>
                                            <td>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDetails">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Delete</button>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                             <td>ratna@gmail.com</td>
                                            <td>ratnaakter</td>
                                            <td>What is your favourite color?</td>
                                            <td>Purple</td>
                                            <td>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDetails">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Delete</button>
                                            </td>
                                            
                                        </tr>
                                         <tr>
                                             <td>ratna@gmail.com</td>
                                            <td>ratnaakter</td>
                                            <td>What is your favourite color?</td>
                                            <td>Purple</td>
                                            <td>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDetails">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Delete</button>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>ratna@gmail.com</td>
                                            <td>ratnaakter</td>
                                            <td>What is your favourite color?</td>
                                            <td>Purple</td>
                                            <td>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDetails">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Delete</button>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>ratna@gmail.com</td>
                                            <td>ratnaakter</td>
                                            <td>What is your favourite color?</td>
                                            <td>Purple</td>
                                            <td>
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDetails">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Delete</button>
                                            </td>
                                        </tr>
                                        
                                        
                                    </tbody>
                                 
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                       </div><!-- /.tab-pane -->

                <!--  Tab_2 -->
                           <div class="tab-pane" id="tab_2">
                              <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">Applicant Information</h3>
                                 <button class="pull-right btn btn-success"  data-toggle="modal" data-target="#add" >
                                    Add Review
                                </button>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                            <table id="example" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email Address</th>
                                            <th>Phone No</th>
                                            <th>Action </th>
                                            
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ratna</td>
                                            <td>Akter</td>
                                            <td>ratna@yahoo.com</td>
                                            <td> 01528888987</td>
                                            <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewApplicant">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteApplicant">Delete</button>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                            <td>Trident</td>
                                            <td>Internet
                                                Explorer 4.0</td>
                                            <td>Win 95+</td>
                                            <td> 4</td>
                                          
                                            <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewApplicant">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteApplicant">Delete</button>
                                            </td>
                                            
                                        </tr>
                                         <tr>
                                            <td>Trident</td>
                                            <td>Internet
                                                Explorer 4.0</td>
                                            <td>Win 95+</td>
                                            <td> 4</td>
                                           
                                             <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewApplicant">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteApplicant">Delete</button>
                                            </td>
                                            
                                        </tr>
                                         <tr>
                                            <td>Trident</td>
                                            <td>Internet
                                                Explorer 4.0</td>
                                            <td>Win 95+</td>
                                            <td> 4</td>
                                         
                                             <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewApplicant">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteApplicant">Delete</button>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                            <td>Trident</td>
                                            <td>Internet
                                                Explorer 4.0</td>
                                            <td>Win 95+</td>
                                            <td> 4</td>
                                      
                                            <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewApplicant">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteApplicant">Delete</button>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                 
                                </table>
                                </div><!-- /.box-body -->
                               </div><!-- /.box -->
                             </div><!-- /.tab-pane -->

                        <!-- Tab_3 -->
                            <div class="tab-pane" id="tab_3">
                              <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">Personal Information</h3>
                                <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addResearchReview" >
                                    Add Review
                                </button>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                            <table id="example3" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Applicant Id</th>
                                            <th>Fathers Name</th>
                                            <th>Mothers Name</th>
                                            <th>Present Address</th>
                                            <th>Parmanent Address</th>
                                            <th>Phone No</th>
                                            <th>Action </th>
                                            
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Shamsul Hoque</td>
                                            <td>Jahanara Begum</td>
                                            <td>Uttara,Dhaka</td>
                                            <td>Uttara,Dhaka</td>
                                            <td> 01723456678</td>
                                            <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewPersonal">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                           <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletePersonal">Delete</button>
                                          </td>
                                           
                                        </tr>
                                         <tr>
                                            <td>2</td>
                                            <td>Shamsul Hoque</td>
                                            <td>Jahanara Begum</td>
                                            <td>Uttara,Dhaka</td>
                                            <td>Uttara,Dhaka</td>
                                            <td> 01723456678</td>
                                              <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewPersonal">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                           <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletePersonal">Delete</button>
                                          </td>
                                            
                                        </tr>
                                         <tr>
                                            <td>3</td>
                                            <td>Shamsul Hoque</td>
                                            <td>Jahanara Begum</td>
                                            <td>Uttara,Dhaka</td>
                                            <td>Uttara,Dhaka</td>
                                            <td> 01723456678</td>
                                              <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewPersonal">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                           <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletePersonal">Delete</button>
                                          </td>
                                        </tr>
                                         <tr>
                                            <td>4</td>
                                            <td>Shamsul Hoque</td>
                                            <td>Jahanara Begum</td>
                                            <td>Uttara,Dhaka</td>
                                            <td>Uttara,Dhaka</td>
                                            <td> 01723456678</td>
                                            <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewPersonal">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                           <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletePersonal">Delete</button>
                                          </td>
                                        </tr>
                                         <tr>
                                            <td>5</td>
                                            <td>Rahim Uddin</td>
                                            <td>Maleka</td>
                                            <td>Uttara,Dhaka</td>
                                            <td>Uttara,Dhaka</td>
                                            <td> 01723456678</td>
                                            <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewPersonal">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                           <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletePersonal">Delete</button>
                                          </td>
                                        </tr>
                                        
                                        
                                    </tbody>
                               
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                       </div><!-- /.tab-pane -->

                 <!--    Tab_4 -->


                    <div class="tab-pane" id="tab_4">
                              <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">Academic Information</h3>
                              <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addResearchReview" >
                                    Add Review
                                </button>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                            <table id="example4" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Applicant Id</th>
                                            <th>Institute Name</th>
                                            <th>Degree</th>
                                            <th>Board</th>
                                            <th>Result</th>
                                            <th>Passing Year </th>
                                            <th>Certificate</th>
                                            <th>Transcript</th>
                                            <th>Action </th>
                                            
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Milestone College</td>
                                            <td>HSC</td>
                                            <td>Dhaka</td>
                                            <td>GPA 5</td>
                                            <td>2008</td>
                                            <td>xyz</td>
                                            <td>ABCD</td>
                                             <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewAcademic">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                           <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteAcademic">Delete</button>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                           <td>1</td>
                                            <td>Milestone College</td>
                                            <td>HSC</td>
                                            <td>Dhaka</td>
                                            <td>GPA 5</td>
                                            <td>2007</td>
                                            <td>xyz</td>
                                            <td>ABCD</td>
                                              <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewAcademic">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                           <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteAcademic">Delete</button>
                                            </td>
                                           
                                           
                                        </tr>
                                         <tr>
                                            <td>1</td>
                                            <td>Notordame College</td>
                                            <td>HSC</td>
                                            <td>Dhaka</td>
                                            <td>GPA 5</td>
                                            <td>2009</td>
                                            <td>xyz</td>
                                            <td>ABCD</td>
                                               <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewAcademic">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                           <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteAcademic">Delete</button>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                            <td>1</td>
                                            <td>Rajuk College</td>
                                            <td>HSC</td>
                                            <td>Dhaka</td>
                                            <td>GPA 4</td>
                                            <td>2008</td>
                                            <td>xyz</td>
                                            <td>ABCD</td>
                                               <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewAcademic">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                           <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteAcademic">Delete</button>
                                            </td>
                                           
                                        </tr>
                                         <tr>
                                           <td>1</td>
                                            <td>Commerce College</td>
                                            <td>HSC</td>
                                            <td>Dhaka</td>
                                            <td>GPA 4.50</td>
                                            <td>2008</td>
                                            <td>xyz</td>
                                            <td>ABCD</td>
                                               <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewAcademic">View</button>
                                            <button type="edit" class="btn btn-default btn-sm">Edit</button>
                                           <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteAcademic">Delete</button>
                                            </td>
                                           
                                        </tr>
                                        
                                        
                                    </tbody>
                                
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                       </div><!-- /.tab-pane -->

                 <!-- Tab_3 end -->


                        
                          </div><!-- /.tab-content -->
                        </div><!-- nav-tabs-custom -->
                    </div><!-- /.col -->
					
                </div>
            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->
 <?php include('modal/_modal_student_profile.php'); ?>
<?php include('../_footer.php'); ?>