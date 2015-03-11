<div style="padding: 10px; width: 90%;">
        <h2>Edit Question Paper : <strong></strong></h2>

            {{ Form::model($edit_question_paper,array('url'=> array('admission_test/amw/update_question_paper',$edit_question_paper->id), 'method' => 'POST')) }}
                         @include('admission::amw.admission_test._form')
            {{ Form::close() }}
</div>