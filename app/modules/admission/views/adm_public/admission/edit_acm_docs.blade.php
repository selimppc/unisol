
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit Academic Records....</h4>
</div>

<div class="modal-body">
  <div style="padding: 20px;">

{{Form::open(array('url'=>'apt/acm_records/update/'.$model->id, 'class'=>'form-horizontal','files'=>true))}}

<div>{{ Form::label('level_of_education', 'Level of Education ') }}
{{ Form::select('level_of_education', array('' => 'Select one',
   'psc' => 'PSC', 'jsc' => 'JSC', 'ssc'=>'SSC','hsc'=>'HSC'),$model->level_of_education,
    array('class' => 'form-control')) }}</div>

<div >{{ Form::label('degree_name', 'Name of Examination') }}</div >
<div >{{ Form::text('degree_name', $model->degree_name,['class'=>'form-control ']) }}</div>

<div >{{ Form::label('institute_name', 'Institute Name') }}</div >
<div >{{ Form::text('institute_name',$model->institute_name ,['class'=>'form-control ']) }}</div>

<div >{{ Form::label('academic_group', 'Academic Group') }}
  <div >{{ Form::text('academic_group',$model->academic_group ,['class'=>'form-control ']) }}</div>
</div >


{{ Form::label('board_type', 'Board Type') }}

<div id="board"><label class="small">{{ Form::radio('board_type','board',($model->board_type == 'board')) }} Board</label>
    <div style="display:{{($model->board_type=='board')? 'block':'none'}}" class="board">
      {{ Form::select('board_university_board', array('' => 'Select one',
            'Dhaka' => 'Dhaka', 'Chittagong' => 'Chittagong', 'Comilla'=>'Comilla','Khulna'=>'Khulna','Syllhet'=>'Syllhet'),
            $model->board_university,
            array('class' => 'form-control')) }}
    </div>
</div>

<div id="university"><label class="small">{{ Form::radio('board_type','university',($model->board_type == 'university')) }} University</label>
    <div style="display:{{($model->board_type=='university')? 'block':'none'}}" class="university">
      {{ Form::select('board_university_university', array('' => 'Select one',
            'Dhaka University' => 'Dhaka University', 'Chittagong University' => 'Chittagong University', 'Khulna University'=>'Khulna University'),
            $model->board_university,
            array('class' => 'form-control')) }}
    </div>
</div>

<div id="other"><label class="small">{{ Form::radio('board_type','other',($model->board_type == 'other')) }} Other</label>
    <div style="display:{{($model->board_type=='other')? 'block':'none'}}" class="other">
       {{ Form::text('board_university_other', $model->board_university,['class'=>'form-control ']) }}
    </div>
</div>


     <div >{{ Form::label('result_type', 'Result Type') }}   (Select one : Division/Class OR CGPA )</div>

     <div id="division"><label class="small">{{ Form::radio('result_type','division',$model->result_type == 'division') }} Division/Class </label>

     <div style="display:none" class="division">
     {{ Form::text('result',$model->result ,['class'=>'form-control ','placeholder'=>"3rd Class First"]) }}
     </div>
     </div>

     <div id="gpa"><label class="small">{{ Form::radio('result_type','gpa',$model->result_type == 'gpa') }} CGPA</label>
       <div style="display:none" class="gpa">
           <div class="col-lg-3">{{ Form::text('gpa', $model->gpa,['class'=>'form-control input-sm','placeholder'=>"3.20"]) }}</div>
             <div class="col-lg-3">{{ Form::text('gpa_scale', $model->gpa_scale,['class'=>'form-control input-sm','placeholder'=>"5"]) }}
             </div>
       </div>
     </div>
<br><br>
<div >{{ Form::label('major_subject', 'Major Subject') }}</div >
<div >{{ Form::text('major_subject',$model->major_subject,['class'=>'form-control ']) }}</div>

<div >{{ Form::label('roll_number', 'Roll') }}</div >
<div >{{ Form::text('roll_number',$model->roll_number,['class'=>'form-control ']) }}</div>

<div >{{ Form::label('registration_number', 'Registration') }}</div >
<div >{{ Form::text('registration_number',$model->registration_number,['class'=>'form-control ']) }}</div>

<div >{{ Form::label('year_of_passing', 'Passing Year') }}</div >
<div >{{ Form::text('year_of_passing',$model->year_of_passing,['class'=>'form-control ']) }}</div>

<div >{{ Form::label('duration', 'Duration') }}</div >
<div >{{ Form::text('duration', $model->duration,['class'=>'form-control ']) }}</div>


   <p>&nbsp;</p>
{{ Form::submit('Save ', array('class'=>'btn btn-primary')) }}
<a href="{{URL::to('apt/acm_records/index') }} " class="btn btn-default" span class="glyphicon-refresh">Close</a>

        {{Form::close()}}
  </div>
</div>


<script>
$(document).ready(function(){
    $("#board").click(function(){
        $(".board").show();
        $(".university").hide();
        $(".other").hide();
    });
    $("#university").click(function(){
        $(".board").hide();
        $(".other").hide();
        $(".university").show();
    });
    $("#other").click(function(){
            $(".board").hide();
            $(".university").hide();
            $(".other").show();
        });
});
</script>

<script>
//$(document).ready(function(){
    $("#division").click(function(){
        $(".division").show();
        $(".gpa").hide();
    });
    $("#gpa").click(function(){
        $(".division").hide();
        $(".gpa").show();
    });
//});
</script>



