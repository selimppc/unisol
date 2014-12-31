
<!-- Delete Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Delete </h4>
            </div>
            <div class="modal-body">
                Are you sure to delete this item ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Confirm</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Aprroval Modal -->
<div class="modal fade" id="approvalModal" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Confirm Request </h4>
      </div>
      <div class="modal-body">
        Are you sure to request this issue item ?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Request</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- View Details Modal -->
<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">View Details</h4>
            </div>
            <div class="modal-body">
                <h2> Graduate Certificate </h2>
                <p> Department: <b>CSE</b> </p>
                <p> Student ID: <b>20152323454</b> </p>
                <p> Status: <b>Open</b> </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<!-- Add Category Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategory" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">New Certificate</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Certificate Name</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" placeholder="Description goes here"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status </label>
                        <select class="form-control" id="status">
                            <option>Open</option>
                            <option>Close</option>
                        </select>
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




<!-- Add Issue Request Modal -->
<div class="modal fade" id="addIssueRequest" tabindex="-1" role="dialog" aria-labelledby="addIssueRequest" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">New Issue of Certificate</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="certificate">Name of Certificate  </label>
                        <select class="form-control" id="certificate">
                            <option>Under Graduation </option>
                            <option>Graduation </option>
                            <option>Post Graduation </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="department">Department  </label>
                        <select class="form-control" id="department">
                            <option>CSE </option>
                            <option>EEE </option>
                            <option>MATH </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="stid">Student ID</label>
                        <input type="text" class="form-control" id="stid" placeholder="Enter your ID">
                    </div>

                    <div class="form-group">
                        <label for="description">Message</label>
                        <textarea class="form-control" id="description" placeholder="Message goes here"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status </label>
                        <select class="form-control" id="status">
                            <option>Open</option>
                            <option>Close</option>
                        </select>
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