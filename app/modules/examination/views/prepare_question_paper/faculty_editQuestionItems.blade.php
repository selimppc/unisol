<div style="padding: 10px; width: 90%;">
        {{--<h2>Edit Question Items : Faculty</h2>--}}
            {{ Form::model($qid,array('url'=> array('prepare_question_paper/faculty_updateQuestionItems',$qid->id), 'method' => 'POST')) }}
                     {{--@include('examination::prepare_question_paper/edit_item')--}}

                  @include('examination::prepare_question_paper/edit_question_item_option_answer_form')

            {{ Form::close() }}
</div>

