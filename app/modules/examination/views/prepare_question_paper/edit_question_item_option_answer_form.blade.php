<h4 style="padding: 20px">Edit Question Item for <b>{{$qid->title}}</b></h4>
{{Form::hidden('qid', $qid->exm_question_id, ['class'=>'form-control'])}}
   
<fieldset style="padding: 10px; width: 90%; padding: 20px">
    <div class='form-group'>
        {{ Form::label('title', 'Question Title') }}
        {{ Form::text('title', Input::old('title'),['class'=>'form-control', 'required'=>'required']) }}
    </div>
    <div class="form-group">
       {{ Form::label('marks', 'Marks') }}
       {{ Form::text('marks', Input::old('marks'), array('class' => 'form-control','required'=>'required')) }}
    </div>


    <div class="form-group" id="myRadioGroup">
      {{ Form::label('gender','Question Type') }}

      @if($qid->question_type == 'radio' || $qid->question_type == 'checkbox')

         {{ Form::label('mcq','MCQ',array('class'=>'radio-inline')) }}
         {{ Form::radio('mcq', 'MCQ', array('class'=>'radio', 'checked')) }}

         {{ Form::label('mcq','Descriptive',array('class'=>'radio-inline')) }}
         {{ Form::radio('mcq', 'Descriptive') }}

      @elseif($qid->question_type == 'text')  
      
         {{ Form::label('mcq','MCQ',array('class'=>'radio-inline')) }}
         {{ Form::radio('mcq', 'MCQ', array('id'=>'mcq', 'class'=>'radio')) }}

         {{ Form::label('mcq','Descriptive',array('class'=>'radio-inline')) }}
         {{ Form::radio('mcq', 'Descriptive', array('id'=>'mcq', 'class'=>'radio', 'checked')) }}

       @endif
    </div>


    <!-- <div id="MCQ" class="descriptive" style="display: none">
        @if($qid->question_type == 'radio')
              <div class="form-group">
                {{ Form::label('gender','Answer Type') }}
                {{ Form::label('mcq','Single Answer', array('class'=>'radio-inline')) }}
                {{ Form::radio('r_question_type', 'mcq_single', ['id'=>'single', 'checked']) }}
                {{ Form::label('mcq','Multiple Answer', array('class'=>'radio-inline')) }}
                {{ Form::radio('r_question_type', 'mcq_multiple', ['id'=>'multiple']) }}
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
                                {{ Form::text('option_title[]',$op->title,['class'=>'form-control option_class']) }}
                            </div>
                            <div class="col-sm-6">
                                  @if($op->answer == 1)
                                    {{ Form::radio('answer[]', $counter,array('checked'))}}
                                  @else
                                    {{ Form::radio('answer[]',$counter)}}
                                  @endif
                            </div>
                        </div>
                        <?php $counter++; ?>
                    @endforeach

              </div>      






        @elseif($qid->question_type == 'checkbox') 

            <div class="form-group">
                     {{ Form::label('gender','Answer Type') }}
                     {{ Form::label('mcq','Single Answer', array('class'=>'radio-inline')) }}
                     {{ Form::radio('r_question_type', 'mcq_single',['id'=>'single']) }}
                     {{ Form::label('mcq','Multiple Answer', array('class'=>'radio-inline')) }}
                     {{ Form::radio('r_question_type', 'mcq_multiple',['id'=>'multiple', 'checked']) }}
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
                                    {{ Form::text('option_title[]',$op->title,['class'=>'form-control option_class']) }}
                            </div>
                            <div class="col-sm-6">
                                  @if($op->answer == 1)
                                    {{ Form::checkbox('answer[]', $counter,array('checked'))}}
                                  @else
                                    {{ Form::checkbox('answer[]',$counter)}}
                                  @endif
                            </div>
                        </div>
                        <?php $counter++; ?>
                    @endforeach
            </div> 

        @else


        @endif   
      </div> -->
              



             <!--  <div id="myRadioGroup">
                    <div id="fields">
                         {{ Form::label('Option 1:') }}
                         {{ Form::text('option_title[]', '', array('id'=>'option1','class' => 'option_class')) }}
                         {{ Form::radio('answer[]', 0, Input::old('answer'), ['class'=>'radiocheck']) }}
                    </div>
                    <div id="fields1">
                         {{ Form::label('Option 2:') }}
                         {{ Form::text('option_title[]', '', array('id'=>'option2','class' => 'option_class')) }}
                         {{ Form::radio('answer[]',  1, Input::old('answer'), ['class'=>'radiocheck']) }}
                    </div>
                    <div id="fields">
                    </div>
                    <a onclick="createInput()" class="add_button">Add (+)</a>
              </div>

              <div id="Descriptive" class="descriptive">
              </div>
 -->
          


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





