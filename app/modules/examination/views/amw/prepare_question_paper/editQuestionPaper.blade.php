<div style="padding: 10px; width: 90%;">
        <h2>Edit Prepare Question Paper : <strong>{{ ucwords(Auth::user()->username) }}</strong></h2>
            {{ Form::model($prepare_question_paper,array('url'=> array('examination/amw/updateQuestionPaper',$prepare_question_paper->id), 'method' => 'POST')) }}
{{--                  {{ Form::hidden('exam_list_id',$exam_list_id, Input::old('exam_list_id')) }}--}}
                      @include('examination::amw.prepare_question_paper._form')
            {{ Form::close() }}
</div>