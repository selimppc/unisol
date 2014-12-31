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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- submitConfirmation Modal -->
<div class="modal fade" id="submitConfirmation" tabindex="-1" role="dialog" aria-labelledby="submitConfirmation"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Submit Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure to submit this item ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- View Details Modal -->
<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">View Details</h4>
            </div>
            <div class="modal-body">
                <h2> Renewal: The Ultimate Gift </h2>

                <p>Consistently ranked the most highly-cited and pertinent publications in the field</p>

                <p>
                    <img src="../img/doc.png">
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- View Details Modal -->
<div class="modal fade" id="viewPublications" tabindex="-1" role="dialog" aria-labelledby="viewPublications"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">View Publication</h4>
            </div>
            <div class="modal-body">
                <h2> Drug Abuse and Addiction </h2>

                <p>What is drug addiction?</p>

                <p>
                    Addiction is defined as a chronic, relapsing brain disease that is characterized by compulsive drug
                    seeking and use, despite harmful consequences.† It is considered a brain disease because drugs
                    change the brain—they change its structure and how it works. These brain changes can be
                    long-lasting, and can lead to the harmful behaviors seen in people who abuse drugs.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Add Research Review Modal -->
<div class="modal fade" id="addResearchReview" tabindex="-1" role="dialog" aria-labelledby="addResearchReview"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Research Item</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>

                    <div class="form-group">
                        <label for="abstract">Abstract </label>
                        <input type="text" class="form-control" id="abstract" placeholder="Enter Abstract">
                    </div>


                    <div class="form-group">
                        <label for="publshed">Where published? </label>
                        <select class="form-control" id="publshed">
                            <option>IEEE</option>
                            <option>ICCIT</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="description">Details</label>
                        <textarea class="form-control" id="description" placeholder="Description goes here"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                    </div>
                    <div class="form-group">
                        <label for="freetype">Free Type </label>
                        <select class="form-control" id="freetype">
                            <option>Free</option>
                            <option>Paid</option>
                            <option>Free for Teacher</option>
                            <option>Free for Student</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Searching">Searching</label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> No
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="resources">Benefit share with University (%) </label>
                        <input type="text" class="form-control" id="resources" value="30%">
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
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Add Publications Modal -->
<div class="modal fade" id="addPublications" tabindex="-1" role="dialog" aria-labelledby="addPublications"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Publication</h4>
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
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!--  addFreeType Modal -->
<div class="modal fade" id="addFreeType" tabindex="-1" role="dialog" aria-labelledby="addFreeType" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Free Type</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
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
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Add Journal Modal -->
<div class="modal fade" id="addJournal" tabindex="-1" role="dialog" aria-labelledby="addJournal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
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
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->