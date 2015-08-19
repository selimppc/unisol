<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h4>Edit Exm Question Items</h4>
</div>

<div style="padding-left: 8%; width: 90%;">
    <div class="modal-body">
            {{ Form::model($fclty_edit_exm_quest_items,array('url'=> array('examination/faculty/exm-question-papers/specific-exm-question-update',$fclty_edit_exm_quest_items->id), 'method' => 'POST')) }}
                  @include('examination::faculty.question_paper.edit_specific_exm_ques_itm_form')
            {{ Form::close() }}
    </div>
</div>