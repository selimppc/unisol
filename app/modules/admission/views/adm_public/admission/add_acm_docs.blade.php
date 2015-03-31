
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Add Or Edit</h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
           {{--<div class="span9 well">--}}
                 {{ Form::open(array('class'=>'form-horizontal','route' => 'admission.public.store-applicant-acm-docs', 'method' =>'post', 'files'=>'true')) }}

                 {{ Form::hidden('applicant_id', $applicant_id = 1, array('class'=>'form-control')) }}

                 <div >{{ Form::label('level_of_education', 'Level of Education ') }}
                 {{ Form::select ('level_of_education',  array('' => 'Select one',
                    'psc' => 'PSC', 'jsc' => 'JSC', 'ssc'=>'SSC','hsc'=>'HSC','grad'=>'Grad','under_grad'=>'Under Grad'), Input::old('level_of_education'),
                     array('class' => 'level')) }}
                 </div>


                 <div >{{ Form::label('degree_name', 'Name of Examination') }}</div >
                 <div >{{ Form::text('degree_name', Input::old('degree_name'),['class'=>'form-control ']) }}</div>

                 <div >{{ Form::label('institute_name', 'Institute Name') }}</div >
                 <div >{{ Form::text('institute_name', Input::old('institute_name'),['class'=>'form-control ']) }}</div>

                 <div id="acm_group" style="display:none">{{ Form::label('academic_group', 'Academic Group') }}
                 {{ Form::text('academic_group', Input::old('academic_group'),['class'=>'form-control ']) }}
                 </div>

                 <br>

                 <div id="subject" style="display:none">{{ Form::label('major_subject', 'Major Subject') }}
                 {{ Form::text('major_subject', Input::old('major_subject'),['class'=>'form-control ']) }}
                 </div>

                 <div  id='board_type' style="display:none">{{ Form::label('board_type', 'Board Type') }}   (Select one : Board/ University/Other )</div>

                 <div id="board" style="display:none"><label class="small">{{ Form::radio('board_type','board',null) }} Board</label>
                     <div style="display:none" class="board">
                       {{ Form::select('board_university_board', array('' => 'Select one',
                             'Dhaka' => 'Dhaka', 'Chittagong' => 'Chittagong', 'Comilla'=>'Comilla','Khulna'=>'Khulna','Syllhet'=>'Syllhet'),
                             Input::old('board_university'),
                             array('class' => 'form-control')) }}
                     </div>
                 </div>

                 <div id="university" style="display:none"><label class="small">{{ Form::radio('board_type','university',null) }} University</label>
                     <div style="display:none" class="university">
                       {{ Form::select('board_university_university', array('' => 'Select one',
                             'Dhaka University' => 'Dhaka University', 'Chittagong University' => 'Chittagong University', 'Khulna University'=>'Khulna University'),
                             Input::old('board_university'),
                             array('class' => 'form-control')) }}
                     </div>
                 </div>

                 <div id="other" style="display:none"><label class="small">{{ Form::radio('board_type','other',null) }} Other</label>
                     <div style="display:none" class="other">
                        {{ Form::text('board_university_other', Input::old('board_university'),['class'=>'form-control ']) }}
                     </div>
                 </div>

                 <br>

                 <div>{{ Form::label('result_type', 'Result Type') }}   (Select one : Division/Class OR CGPA )</div>

                 <div id="division"><label class="small">{{ Form::radio('result_type','division',null) }} Division/Class </label>

                 <div style="display:none" class="division">
                 {{ Form::text('result', Input::old('result'),['class'=>'form-control ','placeholder'=>"3rd Class First"]) }}
                 </div>
                 </div>

                 <div id="gpa"><label class="small">{{ Form::radio('result_type','gpa',null) }} CGPA</label>
                   <div style="display:none" class="gpa">
                       <div class="col-lg-3">{{ Form::text('gpa', Input::old('gpa'),['class'=>'form-control input-sm','placeholder'=>"3.20"]) }}</div>
                         <div class="col-lg-3">{{ Form::text('gpa_scale', Input::old('gpa_scale'),['class'=>'form-control input-sm','placeholder'=>"5"]) }}
                         </div>
                   </div>
                 </div>

                 <br><br>
                 <div >{{ Form::label('roll_number', 'Roll No') }}</div >
                 <div >{{ Form::text('roll_number', Input::old('roll_number'),['class'=>'form-control ']) }}</div>

                 <div >{{ Form::label('registration_number', 'Registration Number') }}</div >
                 <div >{{ Form::text('registration_number', Input::old('registration_number'),['class'=>'form-control ']) }}</div>

                 <div >{{ Form::label('year_of_passing', 'Passing Year') }}</div >
                 <div >{{ Form::text('year_of_passing', Input::old('year_of_passing'),['class'=>'form-control ']) }}</div>

                 <div >{{ Form::label('duration', 'Duration') }}</div >
                 <div >{{ Form::text('duration', Input::old('duration'),['class'=>'form-control ']) }}</div>

                 <div>{{ Form::label('study_at', 'Study At ') }}
                 {{ Form::select('study_at', array('' => 'Select one',
                    'national' => 'National', 'abroad' => 'Abroad'), null,
                     ['class'=>'form-control ']) }}</div>

                 {{ Form::label('certificate', 'Certificate') }}
                 {{ Form::file('certificate', null,['class' => 'form-control','required']) }}

                 {{ Form::label('transcript', 'Transcript') }}
                 {{ Form::file('transcript', null,['class' => 'form-control','required']) }}



                 <br>
                 <br>

                 <div>

                   {{ Form::submit('Save', array('class'=>'pull-right btn btn-sm btn-primary')) }}
                   <a  href="" class="pull-right btn btn-sm btn-default" style="margin-right: 5px">Close</a>

                 </div>

                 <br>
                 <br>
                 {{ Form::close() }}
     </div>
</div>


{{-------------------js: show board_type for selected level of education value---------------------------}}
<script>
$('select[class=level]').change(function () {
    if ($(this).val()=="grad" || $(this).val()=="under_grad") {
        $('#board_type').show();
        $('#university').show();
        $('#other').show();
        $('#board').hide();
    }else{
        $('#board_type').show();
        $('#board').show();
        $('#university').hide();
        $('#other').hide();
    }
});
</script>

{{-------------------------js:show major subject / academic group-----------------------------------------}}
<script>
$('select[class=level]').change(function () {
    if ($(this).val()=="grad" || $(this).val()=="under_grad") {
        $('#subject').show();
        $('#acm_group').hide();
    }else{
        $('#acm_group').show();
        $('#subject').hide();
    }

});
</script>

{{--------------------------------js: selection for division or cgpa------------------------------------}}
<script>

    $("#division").click(function(){
        $(".division").show();
        $(".gpa").hide();
    });
    $("#gpa").click(function(){
        $(".division").hide();
        $(".gpa").show();
    });

</script>

{{-------------------------------js: selection for board/university/other------------------------------------}}
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

{{---------------------------------js: selection for retult_type--------------------------------------------}}
<script>

    $("#division").click(function(){
        $(".division").show();
        $(".gpa").hide();
    });
    $("#gpa").click(function(){
        $(".division").hide();
        $(".gpa").show();
    });

</script>