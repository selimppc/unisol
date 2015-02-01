
{{ Form::model($qid,array('url' => array('prepare_question_paper/faculty_updateQuestionItems',$qid->id) , 'method' => 'POST'))  }}

        {{Form::hidden('qid', $qid->id, ['class'=>'form-control'])}}

        <fieldset style="padding: 10px; width: 90%; padding: 20px">
                                     <div class='form-group'>
                                         {{ Form::label('title', 'Question Title') }}
                                         {{ Form::text('title', null, ['class'=>'form-control', 'required'=>'required']) }}
                                     </div>
                                     <div class='form-group'>
                                         {{ Form::label('marks', 'Marks') }}
                                         {{ Form::text('marks', null, array('class' => 'form-control','required'=>'required')) }}
                                     </div>

                                     <div class="form-group" id="myRadioGroup">
                                                 {{ Form::label('gender','Question Type') }}

                                                 @if($qid->question_type == 'radio' || $qid->question_type == 'checkbox')

                                                     {{ Form::label('mcq','MCQ',array('class'=>'radio-inline')) }}
                                                     {{ Form::radio('mcq', 'MCQ', array('class'=>'radio','checked')) }}

                                                     {{ Form::label('mcq','Descriptive',array('class'=>'radio-inline')) }}
                                                     {{ Form::radio('mcq', 'Descriptive') }}




                                                 @elseif($qid->question_type == 'text')

                                                 {{ Form::label('mcq','MCQ',array('class'=>'radio-inline')) }}
                                                 {{ Form::radio('mcq', 'MCQ', array('id'=>'mcq', 'class'=>'radio')) }}



                                                     {{ Form::label('mcq','Descriptive',array('class'=>'radio-inline')) }}
                                                     {{ Form::radio('mcq', 'Descriptive',array('id'=>'mcq', 'class'=>'radio','checked')) }}


                                                 @endif


                                     </div>
                                     </br>

                                     <div class="container">
                                       <div class="row">
                                            @if($qid->question_type == 'radio')
                                                 <div class="form-group">
                                                             {{ Form::label('gender','Answer Type') }}

                                                             {{ Form::label('mcq','Single Answer', array('class'=>'radio-inline')) }}
                                                             {{ Form::radio('question_type', 'mcq_single', array('id'=>'single', 'class'=>'radio')) }}

                                                             {{ Form::label('mcq','Multiple Answer', array('class'=>'radio-inline')) }}
                                                             {{ Form::radio('question_type', 'mcq_multiple', array('id'=>'multiple', 'class'=>'radio')) }}
                                                 </div>
                                                 </br>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-6"><strong>Option </strong></div>
                                                        <div class="col-sm-6"><strong>Answer </strong></div>
                                                </div>
                                                @foreach($options as $op)
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-6">
                                                                {{--{{ Form::radio('options','')}}--}}

                                                                {{Form::hidden('id[]', $op->id, ['class'=>'form-control'])}}

                                                                {{ Form::text('option_title[]',$op->title,['class'=>'form-control']) }}

                                                        </div>
                                                        <div class="col-sm-6">
                                                             @if($op->answer == 1)
                                                                {{Form::checkbox('checkbox',$op->answer ,array('checked'))}}<br>
                                                             @elseif($op->answer == 0)
                                                                {{Form::checkbox('checkbox', $op->answer)}}<br>
                                                             @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @elseif($qid->question_type == 'checkbox')

                                                 <div class="form-group">
                                                             {{ Form::label('gender','Answer Type') }}

                                                             {{ Form::label('mcq','Single Answer', array('class'=>'radio-inline')) }}
                                                             {{ Form::radio('question_type', 'mcq_single', array('id'=>'single', 'class'=>'radio')) }}

                                                             {{ Form::label('mcq','Multiple Answer', array('class'=>'radio-inline')) }}
                                                             {{ Form::radio('question_type', 'mcq_multiple', array('id'=>'multiple', 'class'=>'radio')) }}

                                                 </div>
                                                 </br>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-6"><strong>Option </strong></div>
                                                            <div class="col-sm-6"><strong>Answer </strong></div>
                                                    </div>

                                                @foreach($options as $op)

                                                    <div class="col-sm-12">
                                                        <div class="col-sm-6">
                                                                {{Form::hidden('id[]', $op->id, ['class'=>'form-control'])}}

                                                                {{ Form::text('option_title[]',$op->title,['class'=>'form-control']) }}
                                                        </div>
                                                        <div class="col-sm-6">
                                                              @if($op->answer == 1)
                                                                {{Form::checkbox('checkbox', $op->answer,array('checked'))}}<br>
                                                              @elseif($op->answer == 0)
                                                                {{Form::checkbox('checkbox',$op->answer)}}<br>
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


<script>
    $(function() {

        $(document).ready(function(){
            $("input[name='mcq']").click(function() {

                var test = $(this).val();
                $(".descriptive").hide();
                $("#"+test).show();
            });

            $('#multiple').on('click', function () {
                $('.radiocheck').attr('type', 'checkbox');
            });
            $('#single').on('click', function () {
                $('.radiocheck').attr('type', 'radio');
            });

        });

    });

</script>