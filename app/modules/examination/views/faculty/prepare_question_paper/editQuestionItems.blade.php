<div style="padding: 10px; width: 90%;">
        <h4>Edit Question Items : Faculty</h4>
            {{ Form::model($qid,array('url'=> array('examination/faculty/updateQuestionItems',$qid->id), 'method' => 'POST')) }}

                  @include('examination::faculty.prepare_question_paper.edit_question_item_option_answer_form')

            {{ Form::close() }}
</div>

