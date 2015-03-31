{{Form::hidden('adm_question_id', $faculty_editQuestionItems->adm_question_id, ['class'=>'form-control'])}}
{{--{{Form::hidden('qitemid', $qid->id, ['class'=>'form-control'])}}--}}

      <div class='form-group'>
         <Strong> Question Paper : </Strong> {{ $faculty_editQuestionItems->title }}
      </div>

     <div class='form-group'>
         {{ Form::label('title', 'Title') }}
         {{ Form::text('title', null, ['class'=>'form-control', 'required'=>'required']) }}
     </div>

     <div class='form-group'>
         {{ Form::label('marks', 'Marks') }}
         {{ Form::text('marks', null, array('id'=>'new_input_area_one','class' => 'form-control','required'=>'required')) }}
     </div>
     <div class="form-group" id="myRadioGroup" style="display: inline-block;">
        {{ Form::label('Question Type:') }}
        <div class="radio">
             <label>
                  {{ Form::radio('mcq', 'MCQ', ($faculty_editQuestionItems->question_type != 'text'), ['id'=>'mcq_change', 'class'=>'radio']) }}
                  MCQ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             </label>
             <label>
                  {{ Form::radio('mcq', 'Descriptive', ($faculty_editQuestionItems->question_type == 'text'), ['id'=>'des_change', 'class'=>'radio']) }}
                  Descriptive
             </label>
        </div>
     </div>

     <div class="container">
        <div class="row">
           @if($faculty_editQuestionItems->question_type != 'text')
               <div id="mcq_all" class="mcq_all_item" >
                     <div class="form-group" style="display: inline-block;">
                             {{ Form::label('Answer Type:') }}
                             <div class="radio">
                                  <label>
                                       {{ Form::radio('question_type', 'mcq_single',($faculty_editQuestionItems->question_type == 'radio'), ['id'=>'single', 'class'=>'radio']) }}
                                       Single Answer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  </label>
                                  <label>
                                       {{ Form::radio('question_type', 'mcq_multiple',($faculty_editQuestionItems->question_type == 'checkbox'), ['id'=>'multiple', 'class'=>'radio']) }}
                                       Multiple Answer
                                  </label>
                             </div>
                     </div>


                     <div id="myRadioGroup" class="row">
                          <div class="col-sm-8">
                              <div class="col-sm-4"><strong>Option </strong></div>
                              <div class="col-sm-4"><strong>Answer </strong></div>
                          </div>

                          <?php $counter = 0;?>

                          @foreach($faculty_editQuestionOptions as $op)
                              <div class="col-sm-8">
                                  <div class="col-sm-4">
                                          {{ Form::hidden('id[]', $op->id, ['class'=>'form-control'])}}
                                          {{ Form::text('option_title[]',$op->title,['class'=>'form-control']) }}
                                  </div>
                                  <div class="col-sm-4">
                                         @if($faculty_editQuestionItems->question_type == 'radio')
                                              {{ Form::radio('answer[]',$counter, ($op->answer == 1), ['id'=>'single','class'=>'radiocheck']) }}

                                              {{--<a onclick="removalLink" class="remove">Remove (-)</a>--}}

                                         @elseif($faculty_editQuestionItems->question_type == 'checkbox')
                                              {{ Form::checkbox('answer[]',$counter, ($op->answer == 1), ['id'=>'multiple','class'=>'radiocheck']) }}

                                              {{--<a onclick="removalLink" class="remove">Remove (-)</a>--}}
                                         @endif
                                  </div>
                              </div>
                              <?php $counter++; ?>
                          @endforeach

                           {{--<div class="col-sm-12">--}}
                               {{--<div class="col-sm-6">--}}

                                    {{--<div id="fields">--}}
                                    {{--</div>--}}

                                    {{--<a onclick="createInput()" class="add_button">Add (+)</a>--}}
                               {{--</div>--}}
                           {{--</div>--}}

                     </div>
               </div>
           @else
                   <div id="mcq_all" class="mcq_all_item" style="display: none">

                          <div class="form-group">
                               {{ Form::label('','Answer Type:') }}
                               {{ Form::label('','Single Answer', array('class'=>'radio-inline')) }}
                               {{ Form::radio('question_type', 'mcq_single',Input::old('question_type'), ['id'=>'single', 'checked']) }}
                               {{ Form::label('','Multiple Answer', array('class'=>'radio-inline')) }}
                               {{ Form::radio('question_type', 'mcq_multiple', Input::old('question_type'), ['id'=>'multiple']) }}
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

                  </div>

                  <div id="des_one" class="des_one_item" >
                    {{-- nothing to show here --}}
                  </div>
           @endif
        </div>
     </div>

<div class="pull-right">
   {{ Form::submit('Update', array('id'=>'submit_if','class'=>'btn btn-primary')) }}
   <a href="{{URL::previous()}}" class="btn btn-default">Close </a>
</div>

</br></br>


<script>
     $(function() {
         $(document).ready(function(){
             $("#mcq_change").click(function() {
                 $(".mcq_all_item").show();
                 $(".des_one_item").hide();
             });

             $("#des_change").click(function() {
                  $(".mcq_all_item").hide();
                  $(".des_one_item").show();
             });

             $('#multiple').on('click', function () {
                 $('.radiocheck').attr('type', 'checkbox');
             });

             $('#single').on('click', function () {
                 $('.radiocheck').attr('type', 'radio');
             });

//             $('#submit_if').on('click', function () {
//
//                 //var totalMarks = parseInt(document.getElementById("total_marks_all").value);
//
//                 var remainingMarks = parseInt(document.getElementById("remaining_marks").value);
//
//                 var one = parseInt(document.getElementById("new_input_area_one").value);
//                 if(remainingMarks < one){
//                     alert('Exceed the total marks >'+remainingMarks);
//                     return false;
//                 }else{
//                     return true;
//                 }
//
//             });

         });
     });

</script>