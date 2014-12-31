
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
        <h4 class="modal-title">Approval</h4>
      </div>
      <div class="modal-body">
        Are you gonna approve this publication ?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Approve</button>
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
                <h4 class="modal-title">Test Class Result </h4>
            </div>
            <div class="modal-body">
                <h2> Test Class : Limitation / Series </h2>
                <p>Topics: <b>Limitations</b></p>
                <p>Student Name: <b> Selim Reza</b></p>
                <p>Student ID: <b>SR009</b></p>
                <p>Marks/ Score: <b>18</b></p>
                <p>Average Mark: <b>18</b></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<!-- Add Class Test Modal -->
<div class="modal fade" id="addClassTest" tabindex="-1" role="dialog" aria-labelledby="addClassTest" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Class Test Result</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="classTest">Class Test Name </label>
                        <select class="form-control" id="classTest">
                            <option>Calculus</option>
                            <option>Algebra</option>
                            <option>Computing</option>
                            <option>Data Structure</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title"> Topics </label>
                        <input type="text" class="form-control" id="title" placeholder="Topics">
                    </div>

                    <div class="form-group">
                        <label for="student">Student Name </label>
                        <select class="form-control" id="student">
                            <option>Selim Reza</option>
                            <option>Shafiul Haque</option>
                            <option>Tanin Islam</option>
                            <option>Ratna Akbar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="studentid"> student ID </label>
                        <input type="text" class="form-control" id="studentid" placeholder="student ID">
                    </div>

                    <div class="form-group">
                        <label for="marks1"> Mark (1st) </label>
                        <input type="text" class="form-control" id="marks1" placeholder="Mark">
                    </div>
                    <div class="form-group">
                        <label for="marks2"> Mark (2nd) </label>
                        <input type="text" class="form-control" id="marks2" placeholder="Mark">
                    </div>
                    <div class="form-group">
                        <label for="marks3"> Mark (3rd) </label>
                        <input type="text" class="form-control" id="marks3" placeholder="Mark">
                    </div>
                    <div class="form-group">
                        <label for="average"> Average Mark </label>
                        <input type="text" class="form-control" id="average" placeholder="Mark">
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->







<!-- Add Category Modal -->
<div class="modal fade" id="addClass" tabindex="-1" role="dialog" aria-labelledby="addClass" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Class Test</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Class Test Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" placeholder="Description goes here"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Add Scholarship Modal -->
<div class="modal fade" id="addScholarship" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Scholarship Item</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Scholarship Title</label>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


