


{{ Form::open(array('url' => 'prepare_question_paper/faculty_updateQuestionItems', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

        {{Form::hidden('qid', $qid->id, ['class'=>'form-control'])}}

        <fieldset style="padding: 10px; width: 90%; padding: 20px">


                                     {{ Form::label('title', 'Question Title') }}
                                     {{ Form::text('title', null, ['class'=>'form-control', 'required'=>'required']) }}

                                     </br>
                                     {{ Form::label('marks', 'Marks') }}
                                     {{ Form::text('marks', null, array('class' => 'form-control','required'=>'required')) }}

                                     </br>

                                     <div class="form-group" id="myRadioGroup">
                                                 {{ Form::label('gender','Question Type') }}

                                                 {{ Form::label('mcq','MCQ',array('class'=>'radio-inline')) }}
                                                 {{ Form::radio('mcq', 'MCQ', array('id'=>'mcq', 'class'=>'radio')) }}

                                                 {{ Form::label('mcq','Descriptive',array('class'=>'radio-inline')) }}
                                                 {{ Form::radio('mcq', 'Descriptive',array('id'=>'mcq', 'class'=>'radio')) }}

                                     </div>
                                     </br>

                                     <div class="form-group">

                                                 {{ Form::label('gender','Answer Type') }}

                                                 {{ Form::label('mcq','Single Answer', array('class'=>'radio-inline')) }}
                                                 {{ Form::radio('question_type', 'mcq_single', array('id'=>'single', 'class'=>'radio')) }}

                                                 {{ Form::label('mcq','Multiple Answer', array('class'=>'radio-inline')) }}
                                                 {{ Form::radio('question_type', 'mcq_multiple', array('id'=>'multiple', 'class'=>'radio')) }}

                                     </div>
                                     </br>

                                     <div class="container">



                                       <div class="row">

                                            @if($qid->question_type == 'radio')

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-6"><strong>Option </strong></div>
                                                        <div class="col-sm-6"><strong>Answer </strong></div>
                                                </div>

                                                @foreach($options as $op)

                                                    <div class="col-sm-12">
                                                        <div class="col-sm-6">
                                                                {{ Form::radio('options','')}}

                                                                {{ Form::text('title',$op->title,['class'=>'form-control']) }}
                                                                {{--{{$op->title}}--}}
                                                        </div>
                                                        <div class="col-sm-6">
                                                             @if($op->answer == 1)
                                                                {{Form::checkbox('checkbox', '',array('checked'))}}<br>
                                                             @endif
                                                        </div>
                                                    </div>
                                                @endforeach

                                            @elseif($qid->question_type == 'checkbox')

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-6"><strong>Option </strong></div>
                                                            <div class="col-sm-6"><strong>Answer </strong></div>
                                                    </div>

                                                @foreach($options as $op)

                                                    <div class="col-sm-12">
                                                        <div class="col-sm-6">
                                                                {{Form::radio('options', '')}}
                                                                {{--{{$op->title}}--}}
                                                                 {{ Form::text('title',$op->title,['class'=>'form-control']) }}
                                                        </div>
                                                        <div class="col-sm-6">
                                                              @if($op->answer == 1)
                                                                {{Form::checkbox('checkbox', '',array('checked'))}}<br>
                                                              @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                   <div class="text-center">
                                                        {{ Form::textarea('desc', 'Write Your Answer', ['size' => '40x6']) }}
                                                    </div>
                                            @endif

                                       </div>
                                     </div>
                             </div>
                             </div>
                             </div>

                {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}

                <a href="{{URL::to('prepare_question_paper/faculty_QuestionList')}}" class="btn btn-default">Close </a>
        </fieldset>
    {{ Form::close() }}
