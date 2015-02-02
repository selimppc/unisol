{{Form::hidden('qid', $qid->id, ['class'=>'form-control'])}}
 <div class='form-group'>
     {{ Form::label('title', 'Question Title') }}
     {{ Form::text('title', null, ['class'=>'form-control', 'required'=>'required']) }}
 </div>
 <div class='form-group'>
     {{ Form::label('marks', 'Marks') }}
     {{ Form::text('marks', null, array('class' => 'form-control','required'=>'required')) }}
 </div>

 <div class="form-group" id="myRadioGroup">
     {{ Form::label('gender','Question Type:') }}
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
 <div class="container">
    <div class="row">
        @if($qid->question_type == 'radio')
             <div class="form-group">
                 {{ Form::label('gender','Answer Type:') }}
                 {{ Form::label('mcq','Single Answer', array('class'=>'radio-inline')) }}
                 {{ Form::radio('r_question_type', 'mcq_single',true) }}
                 {{ Form::label('mcq','Multiple Answer', array('class'=>'radio-inline')) }}
                 {{ Form::radio('r_question_type', 'mcq_multiple') }}
             </div>
             <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-6"><strong>Option </strong></div>
                    <div class="col-sm-6"><strong>Answer </strong></div>
                </div>

                <?php $counter = 0;?>
                @foreach($options as $op)
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                                {{ Form::hidden('id[]', $op->id, ['class'=>'form-control'])}}
                                {{ Form::text('option_title[]',$op->title,['class'=>'form-control']) }}
                        </div>
                        <div class="col-sm-6">
                              @if($op->answer == 1)
                                {{ Form::checkbox('answer[]', $counter,array('checked'))}}
                              @elseif($op->answer == 0)
                                {{ Form::checkbox('answer[]',$counter)}}
                              @endif
                        </div>
                    </div>
                    <?php $counter++; ?>
                @endforeach
            </div>
             </div>
        @elseif($qid->question_type == 'checkbox')
             <div class="form-group">
                 {{ Form::label('gender','Answer Type') }}
                 {{ Form::label('mcq','Single Answer', array('class'=>'radio-inline')) }}
                 {{ Form::radio('r_question_type', 'mcq_single') }}
                 {{ Form::label('mcq','Multiple Answer', array('class'=>'radio-inline')) }}
                 {{ Form::radio('r_question_type', 'mcq_multiple', true) }}
             </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-6"><strong>Option </strong></div>
                    <div class="col-sm-6"><strong>Answer </strong></div>
                </div>

                <?php $counter = 0;?>
                @foreach($options as $op)
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                                {{ Form::hidden('id[]', $op->id, ['class'=>'form-control'])}}
                                {{ Form::text('option_title[]',$op->title,['class'=>'form-control']) }}
                        </div>
                        <div class="col-sm-6">
                              @if($op->answer == 1)
                                {{ Form::checkbox('answer[]', $counter,array('checked'))}}
                              @elseif($op->answer == 0)
                                {{ Form::checkbox('answer[]',$counter)}}
                              @endif
                        </div>
                    </div>
                    <?php $counter++; ?>
                @endforeach
            </div>
        @else
           <div class="text-center">
                {{ Form::textarea('desc', 'Write Your Answer', ['size' => '40x6']) }}
            </div>
        @endif
    </div>
 </div>
{{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
<a href="{{URL::to('prepare_question_paper/faculty_QuestionList')}}" class="btn btn-default">Close </a>


{{--<script>--}}
                     {{--$(function() {--}}
                         {{--$(document).ready(function(){--}}
                             {{--$("input[name='mcq']").click(function() {--}}

                                 {{--var test = $(this).val();--}}
                                 {{--$(".descriptive").hide();--}}
                                 {{--$("#"+test).show();--}}
                             {{--});--}}
                             {{--$('#multiple').on('click', function () {--}}
                                 {{--$('.radiocheck').attr('type', 'checkbox');--}}
                             {{--});--}}
                             {{--$('#single').on('click', function () {--}}
                                 {{--$('.radiocheck').attr('type', 'radio');--}}
                             {{--});--}}
                         {{--});--}}
                     {{--});--}}

{{--</script>--}}