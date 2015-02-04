<div style="padding: 10px; width: 90%;">
        <h2>Edit Prepare Question Paper : AMW</h2>
            {{ Form::model($edit_AmwQuestionPaper,array('url'=> array('prepare_question_paper/amw_updateQuestionPaper',$edit_AmwQuestionPaper->id), 'method' => 'POST')) }}
                     @include('examination::prepare_question_paper/_amw_form')
            {{ Form::close() }}
</div>