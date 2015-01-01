
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



<!-- Deny Modal -->
<div class="modal fade" id="deny" tabindex="-1" role="dialog" aria-labelledby="deny" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Deny </h4>
            </div>
            <div class="modal-body">
                Are you sure to deny this item ?
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
        Are you sure to approve this item ?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Approve</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
                <h4 class="modal-title">Mid / Fianl Exam Details</h4>
            </div>
            <div class="modal-body">
                <h2> Mid Term Exam </h2>
                <p> Examiner </p>
                <p> Mid term examination for CSE </p>
                <p> ..... </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- View Details Modal -->
<div class="modal fade" id="viewNotice" tabindex="-1" role="dialog" aria-labelledby="viewNotice" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Notice / Ads</h4>
            </div>
            <div class="modal-body">
                <h2> Academic Scholarship </h2>
                <p> CSE </p>
                <p>Deadline: <b>12/12/2015</b></p>
                <p>Document Required: <b>Transcript sheet</b></p>
                <p>Status: <b>Open</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Add adExamTerm Review Modal -->
<div class="modal fade" id="adExamTerm" tabindex="-1" role="dialog" aria-labelledby="adExamTerm" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Mid Term / Final Exam</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title"> Name of Examination </label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>

                    <div class="form-group">
                        <label for="status">Role Propose </label>
                        <select class="form-control" id="status">
                            <option> Examiner </option>
                            <option> Head examiner </option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" placeholder="Description goes here"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="comments">Comments</label>
                        <textarea class="form-control" id="comments" placeholder="comments goes here"></textarea>
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




<!-- Add Instruction Modal -->
<div class="modal fade" id="addInstruction" tabindex="-1" role="dialog" aria-labelledby="addInstruction" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add  Instruction</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title"> Name of Examination </label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>


                    <div class="form-group">
                        <label for="description">Instruction</label>
                        <textarea class="form-control" id="description" placeholder="Description goes here"></textarea>
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



<!-- Add Publications Modal -->
<div class="modal fade" id="addNotice" tabindex="-1" role="dialog" aria-labelledby="addNotice" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Open New Notice for Scholarship</h4>
            </div>
            <div class="modal-body">
                <form>

                    <div class="form-group">
                        <label for="topics"> Scholarship </label>
                        <select class="form-control">
                            <option> Academic Scholarship </option>
                            <option> Departmental Scholarships </option>
                            <option> Community College Transfer Scholarships </option>
                            <option> First Scholars Program </option>
                            <option> Private Scholarship </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="topics"> Who are applicable </label>
                        <select class="form-control">
                            <option> Fall - CSE </option>
                            <option> Fall - EEE </option>
                            <option> Summer - Math </option>
                            <option> Winter - Physics </option>
                            <option> Fall - Chemistry </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Deadline </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" id="datemask" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="title">Documents required</label>
                        <input type="text" class="form-control" id="title" placeholder="Documents required">
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




<!-- Add Category Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategory" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Category</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Category Title</label>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<!-- Add Journal Modal -->
<div class="modal fade" id="addJournal" tabindex="-1" role="dialog" aria-labelledby="addJournal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Journal</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Journal Name</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" placeholder="Description goes here"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="topics"> Category </label>
                        <input type="text" class="form-control" id="topics" placeholder="Enter Topics">
                    </div>

                    <div class="form-group">
                        <label for="resources">Resource </label>
                        <input type="text" class="form-control" id="resources" placeholder="Enter Resources">
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