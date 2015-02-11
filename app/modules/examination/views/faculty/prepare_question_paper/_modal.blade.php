<!-- Modal for Create -->
<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Create Question paper</h4>
            </div>
            <div class="modal-body">
                {{ Form::open(array('url' => 'examination/amw/store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}
                        @include('examination::amw/prepare_question_paper/_form')
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

{{--Modal for View Question Paper--}}
 <div class="modal fade" id="ViewQuestionPaperModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                     <h4 class="modal-title" id="myModalLabel">View Question Paper</h4>
                  </div>
                  <div class="modal-body">
                  </div>
                  {{--<div class="modal-footer">--}}
                   {{--<a href="{{URL::to('prepare_question_paper/amw_index')}}" class="btn btn-default">Close </a>--}}
                  {{--</div>--}}
             </div>
         </div>
</div>









<!-- Modal for Edit Amw Question Paper -->
<div class="modal fade" id="edit_amw_QuestionPapermodal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Question paper : AMW </h4>
            </div>
            <div class="modal-body">
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

 <!-- Modal for Edit Question  -->
                    <div class="modal fade" id="EditQuestionItems" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                     <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Question Items</h4>
                                     </div>
                                     <div class="modal-body">
                                     </div>
                                     <div class="modal-footer">
                                     </div>
                                </div>
                            </div>
                    </div>

<!-- Modal for AddQuestionItemsModal -->
             <div class="modal fade" id="AddQuestionItemsModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                 <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                 </div>
                                 <div class="modal-body">
                                 </div>
                                 <div class="modal-footer">
                                 </div>
                            </div>
                        </div>
             </div>

<!-- View Question Items Modal -->
                    <div class="modal fade" id="ViewQuestionItems" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                          </div>
                          <div class="modal-body">
                          </div>
                          <div class="modal-footer">
                          </div>
                        </div>
                      </div>
                    </div>