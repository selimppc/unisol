
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

<!-- Confirm Test Modal -->
<div class="modal fade" id="confirmTest" tabindex="-1" role="dialog" aria-labelledby="confirmTest" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Confirm Test</h4>
      </div>
      <div class="modal-body">
        Are you sure to start the Test ?
    </div>
    <div class="modal-footer">
        <button class="btn btn-success" data-toggle="modal" data-target="#viewDetails" >Start</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    </div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Pause Modal -->
<div class="modal fade" id="pause" tabindex="-1" role="dialog" aria-labelledby="pause" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Confirm Pause</h4>
            </div>
            <div class="modal-body">
                Are you sure to pause this test ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Pause</button>
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
                <h4 class="modal-title"> Calculus Part 1  </h4>
            </div>
            <div class="modal-body" style="text-align: center">
                <h2>&nbsp;</h2>
                <h2> Your Time Starts Now !</h2>
                <h3> 00:00 Hour</h3>
                <h2>&nbsp;</h2>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Start Now!</button>
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





<!-- Add Question Paper Modal -->
<div class="modal fade" id="addQuestionPaper" tabindex="-1" role="dialog" aria-labelledby="addQuestionPaper" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">New Question </h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="classTest">Question Type </label>
                        <select class="form-control" id="classTest">
                            <option>MCQ</option>
                            <option>Descriptive</option>
                            <option>Mixed</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="question"> Question </label>
                        <input type="text" class="form-control" id="question" placeholder="Enter questio">
                    </div>

                    <div class="form-group">
                        <label for="option"> Option One </label>
                        <input type="text" class="form-control" id="option" placeholder="Enter option one">
                    </div>

                    <div class="form-group">
                        <label for="option"> Option Two </label>
                        <input type="text" class="form-control" id="option" placeholder="Enter option two ">
                    </div>

                    <div class="form-group">
                        <label for="option"> Option Three </label>
                        <input type="text" class="form-control" id="option" placeholder="Enter option three">
                    </div>

                    <div class="form-group">
                        <label for="option"> Option Four </label>
                        <input type="text" class="form-control" id="option" placeholder="Enter option four">
                    </div>

                    <div class="form-group">
                        <label for="Searching">Answer</label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="inlineCheckboxOptions" id="inlineCheckbox1" value="option1"> Option One
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="inlineCheckboxOptions" id="inlineCheckbox2" value="option2"> Option Two
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="inlineCheckboxOptions" id="inlineCheckbox3" value="option3"> Option Three
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="inlineCheckboxOptions" id="inlineCheckbox4" value="option4"> Option Four
                        </label>
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

<!-- Add Number Revoluation  Modal -->
<div class="modal fade" id="addEvoNo" tabindex="-1" role="dialog" aria-labelledby="addEvoNo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Number for the question</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">RAD stands for?</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter NUmber">
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


