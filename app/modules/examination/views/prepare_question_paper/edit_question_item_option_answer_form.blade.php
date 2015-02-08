{{Form::hidden('qid', $qid->exm_question_id, ['class'=>'form-control'])}}

{{--{{Form::hidden('qitemid', $qid->id, ['class'=>'form-control'])}}--}}



     <div class='form-group'>
         {{ Form::label('title', 'Question Title') }}
         {{ Form::text('title', null, ['class'=>'form-control', 'required'=>'required']) }}
     </div>

     <div class='form-group'>
         {{ Form::label('marks', 'Marks') }}
         {{ Form::text('marks', null, array('class' => 'form-control','required'=>'required')) }}
     </div>


    <div class="form-group" id="myRadioGroup">

         {{ Form::label('Question Type:') }}

         {{ Form::label('','MCQ',['class'=>'radio-inline']) }} {{ Form::radio('mcq', 'MCQ', ($qid->question_type != 'text'), ['id'=>'mcq_change', 'class'=>'radio']) }}

         {{ Form::label('','Descriptive',['class'=>'radio-inline']) }} {{ Form::radio('mcq', 'Descriptive', ($qid->question_type == 'text'), ['id'=>'des_change', 'class'=>'radio']) }}

   {{--  ager html ekhn ei fomrat e boshate hobe --}}

    </div>

<div class="container">
   <div class="row">
      @if($qid->question_type != 'text')
         <div id="mcq_all" class="mcq_all_item" >
              {{-- new code starts from here--}}


           <div class="form-group">
           {{ Form::label('Answer Type:') }}

           {{ Form::label('','Single Answer', ['class'=>'radio-inline']) }}
           {{ Form::radio('r_question_type', 'mcq_single',($qid->question_type == 'radio'), ['id'=>'single', 'class'=>'radio']) }}

           {{ Form::label('','Multiple Answer', ['class'=>'radio-inline']) }}
           {{ Form::radio('r_question_type', 'mcq_multiple',($qid->question_type == 'checkbox'), ['id'=>'multiple', 'class'=>'radio']) }}
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
                             @if($qid->question_type == 'radio')

                                    @if($op->answer == 1)
                                    {{ Form::radio('answer[]', $counter,array('checked'))}}
                                    @else
                                    {{ Form::radio('answer[]',$counter)}}
                                    @endif

                             @elseif($qid->question_type == 'checkbox')

                                    @if($op->answer == 1)
                                    {{ Form::checkbox('answer[]', $counter,array('checked'))}}
                                    @else
                                    {{ Form::checkbox('answer[]',$counter)}}
                                    @endif

                             @endif
                      </div>
                  </div>
                  <?php $counter++; ?>
              @endforeach
           </div>
         </div>
        @else
              <div id="mcq_all" class="mcq_all_item" style="display: none">

                  <div class="form-group">
                       {{ Form::label('gender','Answer Type:') }}
                       {{ Form::label('mcq','Single Answer', array('class'=>'radio-inline')) }}
                       {{ Form::radio('r_question_type', 'mcq_single',true) }}
                       {{ Form::label('mcq','Multiple Answer', array('class'=>'radio-inline')) }}
                       {{ Form::radio('r_question_type', 'mcq_multiple') }}
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

                D

              </div>
        @endif
   </div>
 </div>

{{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
<a href="{{URL::to('prepare_question_paper/faculty_QuestionList')}}" class="btn btn-default">Close </a>


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


//             $("input[id='mcq_r']").click(function() {
//                   var test = $(this).val();
//                   $(".descriptive_rl").hide();
//                   $("#"+test).show();
//             });


             $('#multiple').on('click', function () {
                 $('.radiocheck').attr('type', 'checkbox');
             });

             $('#single').on('click', function () {
                 $('.radiocheck').attr('type', 'radio');
             });

         });
     });

</script>