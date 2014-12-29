<?php include('../_header.php'); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('../_sidebar.php'); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       User Signup
                        <small>Applicants</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">User Signup</li>
                    </ol>
                </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                          <!--   <h3 class="box-title">Quick Example</h3> -->
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="box-body" >
                             <div class="form-group">
                                    <label for="exampleInputEmail1">First Name</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter FirstName">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Middle Name </label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter MiddleName">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Last Name </label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Last Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">UserName</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter UserName">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email Address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                
                                <div class="form-group">
                                    <label>Target Role </label>
                                    <select class="form-control">
                                        <option>Applicant</option>
                                        <option>Teacher</option>
                                        <option>Staff</option>
                                        <option>Alumni</option>
                                        <option>Employer</option>
                                    </select>
                                </div>
                                        
                               </div>
                                 <div class="form-group">
                                     <div class="g-recaptcha" data-sitekey="6LeYvf4SAAAAAE72M_jBFJdzfx7mglsnK_0C4cr6"></div>  
                                </div>
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="cancel" class="btn btn-default">Cancel</button>
                            </div>
                        </form>
                    
                 </div><!-- /.box -->
               </div>
              </div><!--/.row-->
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->

<?php include('../_footer.php'); ?>