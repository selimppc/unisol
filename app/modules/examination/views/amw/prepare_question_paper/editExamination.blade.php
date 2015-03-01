<div style="padding: 10px; width: 90%;">
        <h2>Edit Examination : <strong></strong></h2>
            {{ Form::model($edit_examination,array('url'=> array('examination/amw/updateExamination',$edit_examination->id), 'method' => 'POST')) }}
                     @include('examination::amw.prepare_question_paper._addExamination_form')
            {{ Form::close() }}
</div>