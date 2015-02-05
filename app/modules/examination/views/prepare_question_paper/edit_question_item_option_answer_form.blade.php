{{Form::hidden('qid', $qid->exm_question_id, ['class'=>'form-control'])}}
{{--{{Form::hidden('qitemid', $qid->id, ['class'=>'form-control'])}}--}}

<div class="container">
    <div class="row">

         <div class='form-group'>
             {{ Form::label('title', 'Question Title') }}
             {{ Form::text('title', null, ['class'=>'form-control', 'required'=>'required']) }}
         </div>
         <div class='form-group'>
             {{ Form::label('marks', 'Marks') }}
             {{ Form::text('marks', null, array('class' => 'form-control','required'=>'required')) }}
         </div>

    </div>


    <div class="form-group" id="myRadioGroup">
         <h3>Question Type:</h3>

         {{ Form::label('','MCQ:',['class'=>'radio-inline']) }} {{ Form::radio('radio', 'MCQ', ($qid->question_type != 'text'), ['id'=>'mcq_change', 'class'=>'radio']) }}

         {{ Form::label('','Descriptive:',['class'=>'radio-inline']) }} {{ Form::radio('radio', 'Descriptive', ($qid->question_type == 'text'), ['id'=>'des_change', 'class'=>'radio']) }}

   {{--  ager html ekhn ei fomrat e boshate hobe --}}


     </div>

    <div class="row">
        @if($qid->question_type != 'text')
              <div id="mcq_all" class="mcq_all_item" >
                  mcq
              </div>
        @else
              <div id="des_one" class="des_one_item" style="">
                  descriptive
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
                 //var test = $(this).val();
                 $(".mcq_all_item").show();
                 $(".des_one_item").hide();
                 //$("#"+test).show();
             });

             $("#des_change").click(function() {
                  //var test = $(this).val();
                  $(".mcq_all_item").hide();
                  $(".des_one_item").show();
                  //$("#"+test).show();
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