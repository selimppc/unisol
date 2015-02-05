<h3>Question Type:</h3>

         Type: {{$qid->question_type}}
         @if($qid->question_type='text')
            {{ Form::label('mcq','MCQ')}}  {{ Form::radio('mcq', 'mcq', null, ['id'=>'mcq_change']) }}
             {{ Form::label('mcq','Descriptive') }} {{ Form::radio('mcq', 'descriptive', ['id'=>'des_change', 'checked' ]) }}
         @else
            {{ Form::label('mcq','MCQ')}}  {{ Form::radio('mcq', 'mcq', null, ['id'=>'mcq_change', 'checked']) }}
             {{ Form::label('mcq','Descriptive') }} {{ Form::radio('mcq', 'descriptive', ['id'=>'des_change' ]) }}
         @endif


