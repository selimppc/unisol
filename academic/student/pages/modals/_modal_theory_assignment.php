<!-- View Details Modal -->
<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title"> Assignment of Dat Analysis </h4>
            </div>
            <div class="modal-body">
                <h2> Data Analysis </h2>

                <p> Topics <b>Data Structure</b></p>

                <p> Department: <b>CSE</b></p>

                <p> Student Name: <b>Selim Reza</b></p>

                <p> Marks <b>23</b></p>

                <p> Comments: good</p>

                <p>
                    <img src="../img/doc.png">
                </p>

                <p><b> </b></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Add New Assignment Modal -->
<div class="modal fade" id="addAssignment" tabindex="-1" role="dialog" aria-labelledby="addAssignment"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">New Assignment</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Assignment Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Assignment Title">
                    </div>

                    <div class="form-group">
                        <label for="day">Topics</label>
                        <input type="text" class="form-control" id="day" placeholder="Topics">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile" multiple="multiple">
                    </div>

                    <div class="form-group">
                        <label for="status">Department </label>
                        <select class="form-control" id="status">
                            <option>CSE</option>
                            <option>EEE</option>
                            <option>MATH</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="status">Student ID </label>
                        <select class="form-control" id="status">
                            <option>Selim Reza / 20141212</option>
                            <option>Shafiul Haque / 20141213</option>
                            <option>Tanin Islam / 20141214</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Marks </label>
                        <input type="text" class="form-control" id="title" placeholder="marks ">
                    </div>

                    <div class="form-group">
                        <label for="description">Comments</label>
                        <textarea class="form-control" id="description" placeholder="note"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Submit online Assignment Modal -->
<div class="modal fade" id="submitAssignment" tabindex="-1" role="dialog" aria-labelledby="submitAssignment"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Submit Assignment</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Assignment Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Assignment Title">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile" multiple="multiple">
                    </div>

                    <div class="form-group">
                        <label for="description">Comments</label>
                        <textarea class="form-control" id="description" placeholder="note"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Add Marks Modal -->
<div class="modal fade" id="addMarks" tabindex="-1" role="dialog" aria-labelledby="addMarks" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Marks</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Marks </label>
                        <input type="text" class="form-control" id="title" placeholder="marks ">
                    </div>
                    <div class="form-group">
                        <label for="description">Comments</label>
                        <textarea class="form-control" id="description" placeholder="note"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Delete Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Delete </h4>
            </div>
            <div class="modal-body">
                Are you sure to delete this item ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Confirm</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Aprroval Modal -->
<div class="modal fade" id="approvalModal" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Approval</h4>
            </div>
            <div class="modal-body">
                Are you gonna approve this publication ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Approve</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- View Details for Online -->
<div class="modal fade" id="viewOnlineAssignment" tabindex="-1" role="dialog" aria-labelledby="viewOnlineAssignment"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title"> Assignment of Dat Analysis </h4>
            </div>
            <div class="modal-body">
                <h2> Data Analysis </h2>

                <p> Description <b>Data Structure</b></p>

                <p> Deadline: <b>12/12/2014</b></p>

                <p> Assigned to: <b>Selim Reza</b></p>

                <p> Comments: good</p>

                <p>
                    <img src="../img/doc.png">
                </p>

                <p><b> </b></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->



