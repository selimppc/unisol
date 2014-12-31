
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



<!-- View Details Modal -->
<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Scholarship Details</h4>
            </div>
            <div class="modal-body">
                <h2> Scholarship : Awarded </h2>
                <p> Department of CSE</p>
                <p> Level of Education: <b>Under Grad</b> </p>
                <p> Amount: <b>50,000 BDT</b> </p>
                <p> Disperse Method: <b>Monhtly</b> </p>
                <p> Collection Details: <b>Bank/ Cheque</b> </p>
                <p> Minimum Qualification: <b>BSC</b> </p>
                <p> Status: <b>Open </b> </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->






<!-- Add Apply  Modal -->
<div class="modal fade" id="addApply" tabindex="-1" role="dialog" aria-labelledby="addApply" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Application for the Scholarship </h4>
            </div>
            <div class="modal-body">
                <form>

                    <div class="form-group">
                        <label for="scholarship">Scholarship List </label>
                        <select class="form-control" id="scholarship">
                            <option>Academic Scholarship </option>
                            <option>Merit Scholarship </option>
                            <option>University Scholarship </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="reason">Reason / Why you deserve it?</label>
                        <textarea class="form-control" id="reason" placeholder="Reason / Why you deserve it?"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                    </div>


                    <div class="form-group">
                        <label for="comments">Comments </label>
                        <textarea class="form-control" id="comments" placeholder="comments"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="applied">Do you get any other scholarship already? </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="applied1" value="Yes" selected> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="applied2" value="No"> No
                        </label>

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

