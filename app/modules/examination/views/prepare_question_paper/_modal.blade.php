
<!-- Modal for Create -->
<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Create Question paper</h4>
            </div>
            <div class="modal-body">

                {{ Form::open(array('url' => 'prepare_question_paper/store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

                    @include('examination::prepare_question_paper._form')

                {{ Form::close() }}

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!-- Modal for Edit -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit </h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>



<!-- Show Modal -->
                    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Show Semester</h4>
                          </div>
                          <div class="modal-body">



                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" >Cencel</button>
                          </div>
                        </div>
                      </div>
                    </div>



<!-- Modal for delete -->
<div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
            </div>
            <div class="modal-body">
                <strong>Are you sure to delete?</strong>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Delete</a>

            </div>
        </div>
    </div>
</div>

<!-- Modal for Add Question -->
<div class="modal fade" id="AddQuestionModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Question Item </h4>
            </div>

            <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="title">Add Question</label>
                                    <input type="text" class="form-control" id="title" placeholder="Enter Title">
                                </div>


                               <div id="myRadioGroup">
                               						<label for="gender">Question Type </label>

                               						<label class="radio-inline">
                               							<input type="radio" name="mcq" checked="checked" value="twoCarDiv"  />	MCQ
                               						</label>

                               						<label class="radio-inline">
                               							<input type="radio" name="mcq" value="threeCarDiv" /> Descriptive
                               						</label>

                               						<div id="twoCarDiv" class="descriptive">

                               							        <div class="form-group">
                                                                        <label for="gender">Answer Type </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="answerType" id="inlineRadio1" value="Male"> Single Answer
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="answerType" id="inlineRadio2" value="Female"> Multiple Answer
                                                                        </label>
                                                                 </div>

                                                                 <div class="form-group">
                                                                        <label for="title">Marks</label>
                                                                        <input type="text" class="form-control" id="title" placeholder="Enter Marks">
                                                                 </div>


                                                                {{--challenging part--}}
                                                                {{--challenging part : start--}}
                                                                    <div id="fields">
                                                                        <label>
                                                                        Option 1:
                                                                        </label>
                                                                        <input id="option1" class="option_class" type="text" name="option[]">

                                                                         <input type="checkbox" name="answerType" id="inlineRadio1" value="Male">



                                                                    </div>

                                                                    <div id="fields1">
                                                                        <label>
                                                                        Option 2:
                                                                        </label>
                                                                        <input id="option2" class="option_class" type="text" name="option[]">

                                                                         <input type="checkbox" name="answerType" id="inlineRadio2" value="Female">



                                                                    </div>

                                                                    <div id="fields">

                                                                    </div>
                                                                    <a onclick="createInput()" class="add_button">Add (+)</a>
                                                                {{--challenging part : end --}}

                                                    </div>

                                                    <div id="threeCarDiv" class="descriptive">

                                                    </div>

                               </div>

                            </form>
                        </div>


            <div class="modal-footer">
                 <button type="button" class="btn btn-info" data-dismiss="modal">Submit</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>



 <!-- Modal for Edit Question Paper  -->
                    <div class="modal fade" id="EditQuestionPaperModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                     <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Question Paper</h4>
                                     </div>
                                     <div class="modal-body">
                                            hi

                                     </div>
                                     <div class="modal-footer">
                                     </div>
                                </div>
                            </div>
                    </div>