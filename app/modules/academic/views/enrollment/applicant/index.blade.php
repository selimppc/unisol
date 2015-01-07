@extends('layouts._master')

@section('sidebar')
    {{--@include('year.sidebar')--}}
@stop
@section('content')
           <div class="wrapper">
                 <div class="row">
                    <div class="col-md-12">
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab_1" data-toggle="tab">Courses </a></li>
                              <li><a href="#tab_2" data-toggle="tab">Main Charge</a></li>
                              <li><a href="#tab_3" data-toggle="tab">Others Charge</a></li>
                              <li><a href="#tab_4" data-toggle="tab">Invoice</a></li>

                            </ul>

                         <div class="tab-content">

                        <!--  tab_1 -->
                            <div class="tab-pane active" id="tab_1">
                              <div class="box">
                              <div class="box-header">
                               <h3 class="box-title">All courses </h3>

                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover table-striped dataTable no-footer">
                                    <thead>
                                        <tr>
                                            <th>Email Address</th>
                                            <th>User Name</th>
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

                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Delete</button>

                                             <button class="btn btn-success"  data-toggle="modal" data-target="#add" >
                                            Add New
                                           </button>
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
                                    Add New
                                </button>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                            <table id="example2" class="table table-bordered table-hover table-striped dataTable no-footer">
                                    <thead>
                                        <tr>
                                            <th>Applicant ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email Address</th>
                                            <th>Phone No</th>
                                            <th>Action </th>

                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Ratna</td>
                                            <td>Akter</td>
                                            <td>ratna@yahoo.com</td>
                                            <td> 01528888987</td>
                                            <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewApplicant">View</button>
                                            <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#add">Edit</button>
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
                                <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addPersonal" >
                                    Add New
                                </button>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                            <table id="example3" class="table table-bordered table-hover table-striped dataTable no-footer">
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
                                           <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#addPersonal">Edit</button>
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
                              <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addAcademic" >
                                    Add New
                                </button>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                            <table id="example4" class="table table-bordered table-hover table-striped dataTable no-footer">
                                    <thead>
                                        <tr>
                                            <th>Applicant Id</th>
                                            <th>Institute Name</th>
                                            <th>Degree</th>
                                            <th>Board</th>
                                            <th>Result</th>
                                            <th>Passing Year </th>
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

                                           <td>

                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewAcademic">View</button>

                                           <button class="btn btn-default btn-sm" data-toggle=" modal" data-target="#addAcademic">Edit</button>

                                           <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteAcademic">Delete</button>
                                            </td>
                                         </tr>

                                           <tr>
                                            <td>1</td>
                                            <td>Emarat Hossain High School</td>
                                            <td>SSC</td>
                                            <td>Dhaka</td>
                                            <td>GPA 4</td>
                                            <td>2006</td>

                                           <td>
                                           <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewAcademic">View</button>

                                           <button class="btn btn-default btn-sm" data-toggle=" modal" data-target="#addAcademic">Edit</button>

                                           <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteAcademic">Delete</button>
                                            </td>
                                         </tr>
                                           <tr>
                                            <td>1</td>
                                            <td>Milestone School</td>
                                            <td>JSC</td>
                                            <td>Dhaka</td>
                                            <td>GPA 4.90</td>
                                            <td>2004</td>

                                           <td>

                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewAcademic">View</button>

                                           <button class="btn btn-default btn-sm" data-toggle=" modal" data-target="#addAcademic">Edit</button>

                                           <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteAcademic">Delete</button>
                                            </td>
                                         </tr>
                                           <tr>
                                            <td>1</td>
                                            <td>Milestone School</td>
                                            <td>PSC</td>
                                            <td>Dhaka</td>
                                            <td>GPA 5</td>
                                            <td>2001</td>

                                           <td>

                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewAcademic">View</button>

                                           <button class="btn btn-default btn-sm" data-toggle=" modal" data-target="#addAcademic">Edit</button>

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

    </div><!-- ./wrapper -->





{{----------------------------------------------}}
{{--All modal for student index.blade.php--}}
{{------------------------------------------------}}


<!-- Aprroval Modal -->
<div class="modal fade" id="approvalModal" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Approval</h4>
      </div>
      <div class="modal-body">
        Are you gonna approve this publication ?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Approve</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Add new Applicant Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addResearchReview" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Review</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>
                     <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>
                      <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>
                       <div class="form-group">
                        <label for="phno">Phone No</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Add new Personal Modal -->
<div class="modal fade" id="addPersonal" tabindex="-1" role="dialog" aria-labelledby="addResearchReview" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Review</h4>
            </div>
            <div class="modal-body">
                <form>
                   <div class="form-group">
                        <label for="fathersname">FathersName</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="firstname">MothersName</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>
                     <div class="form-group">
                        <label for="lastname">PresentAddress</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>
                      <div class="form-group">
                        <label for="email">ParmentAddress</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>
                       <div class="form-group">
                        <label for="phno">Phone No</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Add new Academic Modal -->
<div class="modal fade" id="addAcademic" tabindex="-1" role="dialog" aria-labelledby="addResearchReview" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Review</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="insname">InstuteName </label>
                        <select class="form-control">
                            <option>Select</option>
                            <option>Milestone College</option>
                            <option>Rajuk College</option>
                            <option>Notordame College</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="degname">Degree </label>
                        <select class="form-control">
                            <option>Select</option>
                            <option>SSC</option>
                            <option>HSC</option>
                            <option>BSC</option>
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="degname">Board </label>
                        <select class="form-control">
                            <option>Select</option>
                            <option>Dhaka</option>
                            <option>Sylhet</option>
                            <option>Comilla</option>
                            <option>Khulna</option>
                            <option>Barisal</option>
                        </select>
                   </div>
                    <div class="form-group">
                        <label for="grade">Result</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Result">
                    </div>
                    <div class="form-group">
                        <label for="degname">Passing Year </label>
                        <select class="form-control">
                           <option>Select</option>
                            <option>2006</option>
                            <option>2007</option>
                            <option>2008</option>
                            <option>2009</option>
                            <option>2010</option>
                            <option>2011</option>
                        </select>
                   </div>
                     <div class="form-group">
                        <label for="exampleInputFile1">Certificate</label>
                        <input type="file" id="exampleInputFile">
                    </div>
                      <div class="form-group">
                        <label for="exampleInputFile2">Transcript</label>
                        <input type="file" id="exampleInputFile">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- View Academic Modal -->
<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">View Details</h4>
            </div>
            <div class="modal-body">

                <h2>Login Information:</h2>
                <h4>Name:
                <p>ratnaakter</p>
                </h4><br>
                <h4>Email Address:
                <p>ratna@gmail.com</p>
                </h4><br>
                <h4>Security Question:
                <p>What is your favourite color?</p>
                </h4><br>
                <h4>Question Answer:
                <p>Purple</p>
                </h4><br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Applicant View Details Modal -->
<div class="modal fade" id="viewApplicant" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">View Details</h4>
            </div>
            <div class="modal-body">

                <h2>Applicant Information:</h2>
                <h4>Applicant Id:
                <p>1</p>
                </h4><br>
                <h4>FirstName:
                <p>Ratna</p>
                </h4><br>
                <h4>LastName:
                <p>Akter</p>
                </h4><br>
                <h4>Email Address:
                <p>ratna@yahoo.com</p>
                </h4><br>
                <h4>Phone No:
                <p>01528888987</p>
                </h4><br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Persnal View Details Modal -->
<div class="modal fade" id="viewPersonal" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">View Details</h4>
            </div>
            <div class="modal-body">

                <h2>Personal Information:</h2>
                <h4>Applicant Id:
                <p>1</p>
                </h4><br>
                <h4>FathersName:
                <p>Shamsul Hoque</p>
                </h4><br>
                <h4>MothersName:
                <p>Jahanara Begum</p>
                </h4><br>
                <h4>Present Address:
                <p>Uttara,Dhaka</p>
                </h4><br>
                <h4>Parmanent Address:
                <p>Uttara,Dhaka</p>
                </h4><br>
                <h4>Phone No:
                <p>01528888987</p>
                </h4><br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!--Academic View HSC Details Modal -->
<div class="modal fade" id="viewAcademic" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">View Details</h4>
            </div>
            <div class="modal-body">
                <h2>Academic Information:</h2>
                <h4>Applicant Id:
                <p>1</p>
                </h4><br>
                <h4>Institute Name:
                <p>Milestone College</p>
                </h4><br>
                <h4>Degree:
                <p>HSC</p>
                </h4><br>
                <h4>Board:
                <p>Dhaka</p>
                </h4><br>
                <h4>Result:
                <p>GPA 5</p>
                </h4><br>
                <h4>Passing Year :
                <p>2008</p>
                </h4><br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!--Login Delete Modal -->

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Approval</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete ?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Approve</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Login Delete Modal -->

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Approval</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete ?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Approve</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Applicant Delete Modal -->

<div class="modal fade" id="deleteApplicant" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Approval</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete ?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Approve</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Personal Delete Modal -->

<div class="modal fade" id="deletePersonal" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Approval</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete ?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Approve</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Academic Delete Modal -->

<div class="modal fade" id="deleteAcademic" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Approval</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete ?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Approve</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


{{--------------------------------}}
{{--Ends All modal for student index.blade.php--}}
{{--------------------------------}}

@stop