<h4 style="padding: 20px">Add Question Item for <b>{{$qid2->title}} </b></h4>
{{ Form::open(array('url' => 'examination/faculty/store_Question_Items', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}
    {{Form::hidden('qid', $qid2->id, ['class'=>'form-control'])}}
        <fieldset style="padding: 10px; width: 90%; padding: 20px">
            <div class='form-group'>
                {{ Form::label('title', 'Question Title') }}
                {{ Form::text('title', Input::old('title'),['class'=>'form-control', 'required'=>'required']) }}
            </div>

            {{--<div class="form-group">--}}
               {{--{{ Form::label('marks', 'Marks') }}--}}
               {{--{{ Form::text('marks', Input::old('marks'), array('class' => 'form-control','required'=>'required')) }}--}}
            {{--</div>--}}

            {{--<input id="total_marks_all" value="40" readonly>--}}

             {{ Form::label('Total Marks :') }}
             {{ Form::text('remaining_marks', $total_marks->question_total_marks , array('id'=>'total_marks_all','readonly')) }}


            <div class="form-group">
               {{ Form::label('marks', 'Marks') }}
               {{ Form::text('marks', Input::old('marks'), array('id'=>'new_input_area_one','class' => 'form-control','required'=>'required')) }}
            </div>




            <div class="form-group" id="myRadioGroup">
               {{ Form::label('gender','Question Type') }}
               {{ Form::label('mcq','MCQ',array('class'=>'radio-inline')) }}
               {{ Form::radio('mcq', 'MCQ', array('id'=>'mcq', 'class'=>'radio', 'checked')) }}
               {{ Form::label('mcq','Descriptive',array('class'=>'radio-inline')) }}
               {{ Form::radio('mcq', 'Descriptive', array('id'=>'mcq', 'class'=>'radio')) }}
            </div>
            <div id="MCQ" class="descriptive" style="display: none">
              <div class="form-group">
                {{ Form::label('gender','Answer Type') }}
                {{ Form::label('mcq','Single Answer', array('class'=>'radio-inline')) }}
                {{ Form::radio('r_question_type', 'mcq_single', Input::old('r_question_type'), ['id'=>'single', 'checked']) }}
                {{ Form::label('mcq','Multiple Answer', array('class'=>'radio-inline')) }}
                {{ Form::radio('r_question_type', 'mcq_multiple', Input::old('r_question_type'), ['id'=>'multiple']) }}
              </div>
              <div id="myRadioGroup">
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

              </div>
              <div id="Descriptive" class="descriptive">
              </div>
            </div>


            {{--<input id="total_marks_all" value="40" readonly>--}}
            {{--<input id="new_input_area_one" >--}}


            {{ Form::submit('Submit', array('id'=>'submit_if', 'class'=>'btn btn-primary')) }}
            <a href="{{URL::to('examination/faculty/index')}}" class="btn btn-default">Close </a>
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

            $('#submit_if').on('click', function () {
                var totalMarks = parseInt(document.getElementById("total_marks_all").value);

//                var remainingMarks = (parseInt(document.getElementById("total_marks_all").value - parseInt(document.getElementById("#").value )));

                var one = parseInt(document.getElementById("new_input_area_one").value);
                if(totalMarks < one){
                    alert('Exceed the total marks >'+totalMarks);
                    return false;
                }else{
                    return true;
                }

            });


        });
    });
</script>





