<div style="padding: 10px; width: 90%;">

        <h2>Edit Question Items : Faculty</h2>

            {{ Form::model($fac_edit_question_item,array('url'=> array('prepare_question_paper/updatequestionItems',$fac_edit_question_item->id), 'method' => 'POST')) }}

                     @include('examination::prepare_question_paper/_addQuestionItem_form')

            {{ Form::close() }}

</div>

