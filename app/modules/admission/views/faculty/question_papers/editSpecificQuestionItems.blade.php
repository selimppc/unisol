<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h4>Edit Question Items</h4>
</div>

<div style="padding-left: 8%; width: 90%;">
    <div class="modal-body">

            {{ Form::model($faculty_editQuestionItems,array('url'=> array('admission/faculty/question-papers/specific-question-update',$faculty_editQuestionItems->id), 'method' => 'POST')) }}

                  @include('admission::faculty.question_papers.edit_specific_question_item_form')

            {{ Form::close() }}
    </div>
</div>

