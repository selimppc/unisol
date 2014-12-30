
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



<!-- View Details Modal -->
<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">View Details</h4>
            </div>
            <div class="modal-body">
                <h2> Renewal: The Ultimate Gift </h2>
                <p>Consistently ranked the most highly-cited and pertinent publications in the field</p>
                <p>
                    <img src="../img/doc.png" >
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- View Details Modal -->
<div class="modal fade" id="viewPublications" tabindex="-1" role="dialog" aria-labelledby="viewPublications" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">View Publication</h4>
            </div>
            <div class="modal-body">
                <h2> Drug Abuse and Addiction </h2>
                <p>What is drug addiction?</p>
                <p>
                    Addiction is defined as a chronic, relapsing brain disease that is characterized by compulsive drug seeking and use, despite harmful consequences.† It is considered a brain disease because drugs change the brain—they change its structure and how it works. These brain changes can be long-lasting, and can lead to the harmful behaviors seen in people who abuse drugs.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Add Research Review Modal -->
<div class="modal fade" id="addResearchReview" tabindex="-1" role="dialog" aria-labelledby="addResearchReview" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Review</h4>
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
                        <label for="topics"> Category </label>
                        <select class="form-control">
                            <option>Biosciences</option>
                            <option>Biomolecules and Biomedicine</option>
                            <option>Microbiology and Mycology</option>
                            <option>Artificial Integency</option>
                            <option>Agriculture</option>
                        </select>
                        <!--<input type="text" class="form-control" id="topics" placeholder="Enter Topics">-->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
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



<!-- Add Publications Modal -->
<div class="modal fade" id="addPublications" tabindex="-1" role="dialog" aria-labelledby="addPublications" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
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
                        <select class="form-control">
                            <option>Biosciences</option>
                            <option>Biomolecules and Biomedicine</option>
                            <option>Microbiology and Mycology</option>
                            <option>Artificial Integency</option>
                            <option>Agriculture</option>
                        </select>
                        <!--<input type="text" class="form-control" id="topics" placeholder="Enter Topics">-->
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