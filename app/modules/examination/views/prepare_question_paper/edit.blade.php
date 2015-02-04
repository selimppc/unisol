<div style="padding: 10px; width: 90%;">
        <h1>Edit Prepare Question Paper</h1>
            {{ Form::model($prepareQuestionPaper,array('url'=> array('prepare_question_paper/update',$prepareQuestionPaper->id), 'method' => 'POST')) }}
                     @include('examination::_amw_form')
            {{ Form::close() }}
</div>