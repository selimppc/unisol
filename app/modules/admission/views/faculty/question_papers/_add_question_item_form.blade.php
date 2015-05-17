<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Add Question Item for <b>{{$question_item->title}} </b></h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">

        {{Form::open(array('url'=>'faculty/exm-quest-paper-item/store-exm-quest-paper-item', 'class'=>'form-horizontal','files'=>true))}}
           {{Form::hidden('adm_question_id', $question_item->id, ['class'=>'form-control'])}}
             <fieldset style="width: 90%; padding: 20px">

                 <div class='form-group'>
                    <Strong> Question Paper : </Strong> {{ $question_item->title }}
                 </div>

                <div class='form-group'>
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', Input::old('title'),['class'=>'form-control', 'required'=>'required','autofocus' => 'autofocus']) }}
                </div>

                 {{-- now{{ Form::label('Marks added till now :') }}--}}
                 {{--{{ Form::text('total_marks', $total_marks->question_total_marks , array('placeholder' => '0','id'=>'total_marks_all','readonly')) }}--}}

                 {{--</br>--}}

                 {{-- now{{ Form::label('Remaining Marks to add:') }}--}}
                 {{--{{ Form::text('remaining_marks', ($qid2->total_marks - $total_marks->question_total_marks) , array('id'=>'remaining_marks','readonly')) }}--}}

                <div class="form-group">
                   {{ Form::label('marks', 'Marks') }}
                   {{ Form::text('marks', Input::old('marks'), array('id'=>'new_input_area_one','class' => 'form-control','required'=>'required','autofocus' => 'autofocus')) }}
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
                    {{ Form::radio('q_type', 'mcq_single', Input::old('q_type'), ['id'=>'single', 'checked']) }}
                    {{ Form::label('mcq','Multiple Answer', array('class'=>'radio-inline')) }}
                    {{ Form::radio('q_type', 'mcq_multiple', Input::old('q_type'), ['id'=>'multiple']) }}
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

                        <a onclick="createInput()" class="add_button">Add (+)</a>

                  </div>
                  <div id="Descriptive" class="descriptive">
                  </div>
                </div>

                </br>

                {{ Form::submit('Submit', array('id'=>'submit_if', 'class'=>'btn btn-primary')) }}
                <a href="{{URL::previous()}}" class="btn btn-default">Close </a>
                 <p>&nbsp;</p>
             </fieldset>
        {{Form::close()}}
     </div>
</div>


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

//            $('#submit_if').on('click', function () {
//               // var totalMarks = parseInt(document.getElementById("total_marks_all").value);
//
//                var remainingMarks = parseInt(document.getElementById("remaining_marks").value);
//
//                var one = parseInt(document.getElementById("new_input_area_one").value);
//                if(remainingMarks < one){
//                    alert('Exceed the remaining marks :'+remainingMarks);
//                    return false;
//                }else{
//                    return true;
//                }
//
//            });
        });
    });
</script>





