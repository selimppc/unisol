
<!-- Aprroval Modal -->
<div class="modal fade" id="approvalModal" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Approval</h4>
      </div>
      <div class="modal-body">
        Are you Gonna Approve this Question?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Approve</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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

<!-- Assign task to teachers Modal -->
<div class="modal fade" id="assintask" tabindex="-1" role="dialog" aria-labelledby="addResearchReview" aria-hidden="true">
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
                        <label for="degname">Teacher </label>
                        <select class="form-control">
                            <option>Select</option>
                            <option>Utpal Kanti Das</option> 
                            <option>Saidur Rahman</option> 
                            <option>Alamgir Bhuiyan</option> 
                            <option>Shormila Mozumdar</option>
                          
                        </select>
                    </div>
                 </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Assign</button>
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
                <h2>Question Information:</h2>
                <h4>Type:
                <p>MCQ</p>
                </h4><br>
                <h4>Question:
                <p>RAD stands for?</p>
                </h4><br>
                <h4>Options:
                <p>1.Relative Application Development
                <p>2.Rapid Application Development</p>
                <p>3.Rapid Application Document</p>
                <p>4.Rapid Apply Document</p>
                </h4><br>
                <h4>Answer:
                <p>2.Rapid Application Development</p>
                </h4><br>
               </div>
            <td></td>
                                           
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





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






