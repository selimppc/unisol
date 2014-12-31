
<!-- Aprroval Modal -->
<div class="modal fade" id="approvalModal" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Approval</h4>
    </div>
    <div class="modal-body">
        Are you sure you want to Approve this Applicant?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Approve</button>
        <button class="btn btn-danger" data-toggle="modal" data-target="#assintask">Not Approved</button>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Add new task Modal -->
<div class="modal fade" id="addtask" tabindex="-1" role="dialog" aria-labelledby="addResearchReview" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Assign Work</h4>
            </div>
            <div class="modal-body">
                <form>

                    <div class="form-group">
                        <label for="degname">Department </label>
                        <select class="form-control">
                            <option>Select</option>
                            <option>CSE</option>
                            <option>BBA</option> 
                            <option>EEE</option> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="degname">Subject </label>
                        <select class="form-control">
                            <option>Select</option>
                            <option>Programming C</option> 
                            <option>Programming C++</option> 
                            <option>Data Structure</option>
                            <option>Discrete Mathmatics</option> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="question">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="question">Description</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Description">
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

<!-- comments Modal -->
<div class="modal fade" id="assintask" tabindex="-1" role="dialog" aria-labelledby="addResearchReview" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Give Comments</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                    <label for="description">Comment</label>
                    <textarea class="form-control" id="description" placeholder="Your Comment Please"></textarea>
                   </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- View details Modal -->
<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">View Details</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                  <thead>
                     <tr>Applicant Information:
                        <th>Applicant Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email Address</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ratna</td>
                        <td>Akter</td>
                        <td>ratna@yahoo.com</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered table-striped">
              <thead>
                 <tr>Personal Information:
                    <th>Applicant Id</th>
                    <th>Fathers Name</th>
                    <th>Mothers Name</th>
                    <th>Present Address</th>
                    <th>Parmanent Address</th>
                    <th>Phone No</th>
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
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>Academic Information:
                    <th>Applicant Id</th>
                    <th>Institute Name</th>
                    <th>Degree</th>
                    <th>Board</th>
                    <th>Result</th>
                    <th>Passing Year </th>
                    <th>Certificate</th>
                    <th>Transcript</th>
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
                </tr>
            </tbody>
        </table>

        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>





<!--Login revoke Modal -->

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Approval</h4>
    </div>
    <div class="modal-body">
        Are you sure you want to Revoke ?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->






