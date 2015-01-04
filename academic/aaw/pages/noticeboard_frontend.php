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



            <h3>Notice Board</h3>


            <div class="box-body">

                <p>
                    <button class="pull-right btn btn-primary btn-sm"  data-toggle="modal" data-target="#add">Add New Notice</button>
                </p>

            </div>
            <div class="row">
            <div class="col-xs-12">

            <div class="box">
            <div class="box-header">

            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>

                <th>Title</th>
                <th>Description</th>
                <th>File</th>
                <th>Target Role</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Action</th>


            </tr>
            </thead>
            <tbody>

            <tr>

                <td>Holiday</td>
                <td> A Winter Vacation</td>
                <th>
            <span data-toggle="modal" data-target="#view">
                <img src="../img/doc.png" width="50px" style="cursor: pointer">
            </span>
                </th>
                <td>All</td>
                <td>10/1/2015</td>
                <td>20/1/2015</td>
                <th>new</th>

                <th>
                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#send">send</button>
                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">view</button>

                </th>


            </tr>

            <tr>

                <td>Mid Term</td>
                <td>Department:cse,semester:fall,year:2015</td>
                <th>
            <span data-toggle="modal" data-target="#view">
                <img src="../img/doc.png" width="50px" style="cursor: pointer">
            </span>
                </th>
                <td>Student</td>
                <td>20/1/2015</td>
                <td>29/1/2015</td>
                <th>new</th>
                <th>
                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#send">send</button>
                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">view</button>

                </th>

            </tr>
            <tr>

                <td>Holiday</td>
                <td>ChrismasDay</td>
                <th>
            <span data-toggle="modal" data-target="#view">
                <img src="../img/doc.png" width="50px" style="cursor: pointer">
            </span>
                </th>
                <td>All</td>
                <td>15/12/2014</td>
                <td>25/12/2014</td>
                <th>
                    closed
                </th>
                <th>
                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view" >view</button>

                </th>


            </tr>
            <tr>

                <td>Term final</td>
                <td>Department:ict,semester:fall,year:2013</td>
                <th>
            <span data-toggle="modal" data-target="#view">
                <img src="../img/doc.png" width="50px" style="cursor: pointer">
            </span>
                </th>
                <td>Teacher</td>
                <td>16/1/2014</td>
                <td>31/1/2014</td>
                <th>
                    closed
                </th>
                <th>
                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">view</button>

                </th>


            </tr>

            <tr>

                <td>Govement Holiday</td>
                <td>Department:cse,semester:fall,year:2015</td>
                <th>
            <span data-toggle="modal" data-target="#view">
                <img src="../img/doc.png" width="50px" style="cursor: pointer">
            </span>
                </th>
                <td>Teacher,Student</td>
                <td>2/1/2015</td>
                <td>21/1/2015</td>
                <th>new</th>
                <th>
                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#send">send</button>
                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">view</button>

                </th>

            </tr>

            <tr>

                <td>Meeting</td>
                <td>Department:cse,semester:fall,year:2015</td>
                <th>
            <span data-toggle="modal" data-target="#view">
                <img src="../img/doc.png" width="50px" style="cursor: pointer">
            </span>
                </th>
                <td>Teacher</td>
                <td>13/1/2015</td>
                <td>30/1/2015</td>
                <th>new</th>
                <th>
                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#send">send</button>
                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">view</button>

                </th>

            </tr>

            <tr>

                <td>class test</td>
                <td>Department:ict,semester:fall,year:2013</td>
                <th>
            <span data-toggle="modal" data-target="#view">
                <img src="../img/doc.png" width="50px" style="cursor: pointer">
            </span>
                </th>
                <td>Teacher</td>
                <td>16/1/2014</td>
                <td>31/1/2014</td>
                <th>closed</th>
                <th>
                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">view</button>


                </th>


            </tr>
            <tr>

                <td>Study Tour</td>
                <td>Department:ict,semester:fall,year:2013</td>
                <th>
            <span data-toggle="modal" data-target="#view">
                <img src="../img/doc.png" width="50px" style="cursor: pointer">
            </span>
                </th>
                <td>Teacher,Student</td>
                <td>13/12/2014</td>
                <td>18/12/2014</td>
                <th>closed</th>


                <th>
                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#view">view</button>


                </th>


            </tr>
            <tr>

                <td>Lab Test</td>
                <td>Department:ict,semester:fall,year:2013</td>
                <th>
            <span data-toggle="modal" data-target="#view">
                <img src="../img/doc.png" width="50px" style="cursor: pointer">
            </span>
                </th>
                <td>Student</td>
                <td>19/1/2014</td>
                <td>31/1/2014</td>
                <th>
                   closed
                </th>
                <th>
                    <button class="btn btn-info btn-xs"  data-toggle="modal" data-target="#view">view</button>

                </th>


            </tr>
            <tr>

                <td>Extra Class</td>
                <td>Department:ict,semester:fall,year:2013</td>
                <th>
            <span data-toggle="modal" data-target="#view">
                <img src="../img/doc.png" width="50px" style="cursor: pointer">
            </span>
                </th>
                <td>Teacher,Student</td>
                <td>19/1/2014</td>
                <td>30/1/2014</td>
                <th>
                    closed</th>
                <th>
                    <button class="btn btn-info btn-xs"  data-toggle="modal" data-target="#view">view</button>


                </th>


            </tr>

            </tbody>
            <tfoot>
            <tr>

                <th>Title</th>
                <th>Description</th>
                <th>File</th>
                <th>Target Role</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Notification</th>

            </tr>
            </tfoot>
            </table>
            </div><!-- /.box-body -->
            </div><!-- /.box -->
            </div>
            </div>






        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- All models -->
<div class="modal fade " id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Notice</h4>
            </div>
            <div class="modal-body">


                <form role="form">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="title" class="form-control" id="title" value="">
                        </div>
                        <div class="form-group">
                            <label for="Description">Description</label>
                            <input type="Description" class="form-control" id="Description" >
                        </div>
                        <div class="form-group">
                            <label for="upload">Upload Notice</label>
                            <input type="file" class="form-control" id="upload" >
                        </div>
                        <div class="form-group">
                            <label for="Target">Target Role</label>
                            <select class="form-control input-sm" id="Target">
                                <option>Select a Target Role</option>
                                <option value="CSE">Teacher</option>
                                <option value="ICT">Student</option>
                                <option value="ENGLISH">staff</option>
                                <option value="PHYSICS">Teacher,Student</option>
                                <option value="CSE">Teacher,staff</option>
                                <option value="CSE">All</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="date">Start Date</label>
                            <input type="date" class="form-control" id="date" >
                        </div>
                        <div class="form-group">
                            <label for="date">End Date</label>
                            <input type="date" class="form-control" id="date" >
                        </div>
                        <div class="form-group">
                            <label for="Status">Status</label>
                            <select class="form-control input-sm" id="Status">
                                <option>Select Status</option>
                                <option value="CSE">New</option>
                                <option value="CSE">closed</option>

                            </select>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info" data-dismiss="modal"  data-toggle="modal" data-target="#notification">Send</button>


            </div>
        </div>
    </div>
</div>

<!--send notice:modal-->

<div class="modal fade" id="send" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Send Notice</h4>
            </div>
            <div class="modal-body">

                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="Target">Target Role</label>
                            <select class="form-control input-sm" id="Target">
                                <option>Select a Target Role</option>
                                <option value="CSE">Teacher</option>
                                <option value="ICT">Student</option>
                                <option value="ENGLISH">staff</option>
                                <option value="PHYSICS">Teacher,Student</option>
                                <option value="CSE">Teacher,staff</option>
                                <option value="CSE">All</option>

                            </select>
                        </div>

                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Send</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--view:modal-->

<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">View Notice</h4>
            </div>
            <div class="modal-body">

                <form role="form">
                    <div class="box-body">
                        <div class="span well" >
                            <table class="table table-bordered table-striped">
                           
                                <tr><td>Title : Govement Holiday</td></tr>
                                <tr><td>Description : ChrismasDay</td></tr>
                                <tr><td>Target Role : Teacher ,Student</td></tr>
                                <tr><td>Start Date :12/12/2014</td></tr>
                                <tr><td>Start Date :31/12/2014</td></tr>
                                <tr><td>Status : closed </td> </tr>
                             </table>


                        </div>

                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php include('../_footer.php'); ?>
