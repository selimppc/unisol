<div style="padding: 10px; width: 90%;">
        <h2>Edit Prepare Question Paper : AMW</h2>
            {{ Form::model($edit_AmwQuestionPaper,array('url'=> array('examination/amw/updateQuestionPaper',$edit_AmwQuestionPaper->id), 'method' => 'POST')) }}
                     @include('examination::amw.prepare_question_paper._form')
            {{ Form::close() }}
</div>