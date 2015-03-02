<div style="padding: 10px; width: 90%;">
        <h2>Edit Prepare Question Paper : <strong></strong></h2>

            {{ Form::model($prepare_question_paper,array('url'=> array('examination/amw/updateQuestionPaper',$prepare_question_paper->id), 'method' => 'POST')) }}
                         @include('examination::amw.prepare_question_paper._form')
            {{ Form::close() }}
</div>