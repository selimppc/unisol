@if ( $errors->any() )
    <div class="alert alert-danger alert-dismissable">
        <ul>
            @foreach($errors->all() as $message )
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif


     <div style="padding: 0px 20px 20px 20px;">
         {{Form::hidden('user_id',$user_id)}}
         <div class="help-text-top">
             <em><span class="text-danger">  (*) </span>Indicates required field. Please do not skip these fields.</em>
         </div>
         <div class="form-group">
             <div class="col-lg-6">{{ Form::label('level_of_education', 'Level of Education ') }}<span class="text-danger">*</span>
             {{ Form::select ('level_of_education',  array('' => 'Select one',
                'psc' => 'PSC', 'jsc' => 'JSC', 'ssc'=>'SSC','hsc'=>'HSC','grad'=>'Grad','under_grad'=>'Under Grad'), Input::old('level_of_education'),
                 array('class' => 'form-control', 'id'=>'level','required')) }}
             </div>
             <div class="col-lg-6">
                {{ Form::label('degree_name', 'Name of Examination') }}<span class="text-danger">*</span>
                {{ Form::text('degree_name', Input::old('degree_name'),['class'=>'form-control','required']) }}
             </div>
         </div>
         <p>&nbsp;</p>
         <div class="form-group">
             <div class="col-lg-6">
                {{ Form::label('institute_name', 'Institute Name') }}<span class="text-danger">*</span>
                {{ Form::text('institute_name', Input::old('institute_name'),['class'=>'form-control','required']) }}
             </div>
             <div class="col-lg-6">
                  <div id="acm_group" style="display:none">{{ Form::label('academic_group', 'Academic Group') }}
                     {{ Form::text('academic_group',Input::old('academic_group'), ['class'=>'form-control','required']) }}
                  </div>

                  <div id="subject" style="display:none">{{ Form::label('major_subject', 'Major Subject') }}
                     {{ Form::text('major_subject',Input::old('major_subject'),['class'=>'form-control ','required']) }}
                  </div>
             </div>
         </div>

         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <div class="form-group">
             <div class="col-lg-6">
                 @if(isset($model->board_type))
                    <div  id='board_type'>{{ Form::label('board_type', 'Board Type') }}<span class="text-danger">*</span>   (Select one : Board/ University/Other )</div>
                    <div id="board"><label class="small">{{ Form::radio('board_type','board',null) }} Board</label>
                         @if($model->board_type =='board')
                             <div class="board">
                                 {{ Form::select('board_university_board', array('' => 'Select one',
                                     'Dhaka' => 'Dhaka', 'Chittagong' => 'Chittagong', 'Comilla'=>'Comilla','Khulna'=>'Khulna','Syllhet'=>'Syllhet'),
                                     $model->board_university,
                                     array('class' => 'form-control')) }}
                             </div>
                         @else
                             <div class="board" style="display:none">
                                  {{ Form::select('board_university_board', array('' => 'Select one',
                                      'Dhaka' => 'Dhaka', 'Chittagong' => 'Chittagong', 'Comilla'=>'Comilla','Khulna'=>'Khulna','Syllhet'=>'Syllhet'),
                                      $model->board_university,
                                      array('class' => 'form-control')) }}
                             </div>
                         @endif
                    </div>

                    <div id="university" ><label class="small">{{ Form::radio('board_type','university',null) }} University</label>
                        @if($model->board_type =='university')
                             <div class="university">
                                 {{ Form::select('board_university_university', array('' => 'Select one',
                                     'Dhaka University' => 'Dhaka University', 'Chittagong University' => 'Chittagong University', 'Khulna University'=>'Khulna University'),
                                     $model->board_university,
                                     array('class' => 'form-control')) }}
                             </div>
                        @else
                             <div class="university" style="display:none">
                                  {{ Form::select('board_university_university', array('' => 'Select one',
                                      'Dhaka University' => 'Dhaka University', 'Chittagong University' => 'Chittagong University', 'Khulna University'=>'Khulna University'),
                                      $model->board_university,
                                      array('class' => 'form-control')) }}
                             </div>
                        @endif
                    </div>

                    <div id="other" ><label class="small">{{ Form::radio('board_type','other',null) }} Other</label>
                         @if($model->board_type == 'other')
                             <div class="other">
                                {{ Form::text('board_university_other',$model->board_university,['class'=>'form-control ']) }}
                             </div>
                         @else
                             <div style="display:none" class="other">
                                {{ Form::text('board_university_other',Input::old('board_university'),['class'=>'form-control ']) }}
                             </div>
                         @endif
                    </div>
                 @else
                    <div  id='board_type'>{{ Form::label('board_type', 'Board Type') }}<span class="text-danger">*</span>   (Select one : Board/ University/Other )</div>
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
                 @endif
             </div>
         </div>

         <div class="form-group">
             <div class="col-lg-6">
                 @if(isset($model->result_type))
                     <div>{{ Form::label('result_type', 'Result Type') }}<span class="text-danger">*</span>   (Select one : Division/Class OR CGPA )</div>
                     <div id="division"><label class="small">{{ Form::radio('result_type','division',null) }} Division/Class </label>
                         @if($model->result_type =='division')
                              <div class="division">
                                 {{ Form::text('result', $model->result,['class'=>'form-control ','placeholder'=>"3rd Class First"]) }}
                              </div>
                         @else
                              <div class="division" style="display:none">
                                  {{ Form::text('result', $model->result,['class'=>'form-control ','placeholder'=>"3rd Class First"]) }}
                              </div>
                         @endif
                     </div>
                     <div id="gpa"><label class="small">{{ Form::radio('result_type','gpa',null) }} CGPA</label>
                         @if($model->result_type =='gpa')
                             <div class="gpa">
                                <div class="col-lg-3">{{ Form::text('gpa', $model->gpa,['class'=>'form-control input-sm','placeholder'=>"gpa"]) }}</div>
                                <div class="col-lg-3">{{ Form::text('gpa_scale', $model->gpa_scale,['class'=>'form-control input-sm','placeholder'=>"gpa scale"]) }}</div>
                             </div>
                         @else
                             <div class="gpa" style="display:none">
                                <div class="col-lg-3">{{ Form::text('gpa', $model->gpa,['class'=>'form-control input-sm','placeholder'=>"gpa"]) }}</div>
                                <div class="col-lg-3">{{ Form::text('gpa_scale', $model->gpa_scale,['class'=>'form-control input-sm','placeholder'=>"gpa scale"]) }}</div>
                             </div>
                         @endif
                     </div>
                 @else
                     <div>{{ Form::label('result_type', 'Result Type') }}<span class="text-danger">*</span>   (Select one : Division/Class OR CGPA )</div>
                     <div id="division"><label class="small">{{ Form::radio('result_type','division',null) }} Division/Class </label>
                          <div style="display:none" class="division">
                            {{ Form::text('result', Input::old('result'),['class'=>'form-control ','placeholder'=>"3rd Class First"]) }}
                          </div>
                     </div>
                     <div id="gpa"><label class="small">{{ Form::radio('result_type','gpa',null) }} CGPA</label>
                          <div style="display:none" class="gpa">
                              <div class="col-lg-3">{{ Form::text('gpa', Input::old('gpa'),['class'=>'form-control input-sm','placeholder'=>"gpa"]) }}</div>
                              <div class="col-lg-3">{{ Form::text('gpa_scale', Input::old('gpa_scale'),['class'=>'form-control input-sm','placeholder'=>"gpa scale"]) }}</div>
                          </div>
                     </div>
                 @endif
             </div>
         </div>
         <p>&nbsp;</p>

         <div class="form-group">
             <div class="col-lg-6">
                 {{ Form::label('roll_number', 'Roll No') }}<span class="text-danger">*</span>
                 {{ Form::text('roll_number', Input::old('roll_number'),['class'=>'form-control ','required']) }}
             </div>
             <div class="col-lg-6">
                 {{ Form::label('registration_number', 'Registration Number') }}
                 {{ Form::text('registration_number', Input::old('registration_number'),['class'=>'form-control','required']) }}
             </div>
         </div>
         <p>&nbsp;</p>
         <div class="form-group">
              <div class="col-lg-4">
                  {{ Form::label('year_of_passing', 'Passing Year') }}
                  {{ Form::text('year_of_passing', Input::old('year_of_passing'),['class'=>'form-control ','required']) }}
              </div>
              <div class="col-lg-4">
                  {{ Form::label('duration', 'Duration (In Year)') }}<span class="text-danger">*</span>
                  {{ Form::text('duration', Input::old('duration'),['class'=>'form-control ','required']) }}
              </div>
              <div class="col-lg-4">
                   {{ Form::label('study_at', 'Study At ') }}
                   {{ Form::select('study_at', array('' => 'Select one',
                   'national' => 'National', 'abroad' => 'Abroad'), null,
                   ['class'=>'form-control','required']) }}
              </div>
         </div>
         <p>&nbsp;</p>
         <div class="form-group">
             <div class="col-lg-4">
                 {{ Form::label('certificate', 'Certificate') }}
                 {{ Form::file('certificate', null,['class' => 'form-control','required']) }}
             </div>
         </div>

         <div class="form-group">
             <div class="col-lg-4">
                 {{ Form::label('transcript', 'Transcript') }}
                 {{ Form::file('transcript', null,['class' => 'form-control','required']) }}
             </div>
         </div>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <div class="form-group">
            {{ Form::submit('Save', array('class'=>'pull-right btn btn-primary')) }}
            <a  href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
         </div>
         <p>&nbsp;</p>

     </div>
{{-------------------js: show board_type for selected level of education value---------------------------}}
<script>

    $('select[id=level]').change(function () {
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

{{-------------------------js:show major subject / academic group-----------------------------------------}}

    $('select[id=level]').change(function () {
        if ($(this).val()=="grad" || $(this).val()=="under_grad") {
            $('#subject').show();
            $('#acm_group').hide();
        }else{
            $('#acm_group').show();
            $('#subject').hide();
        }

    });

{{--------------------------------js: selection for division or cgpa------------------------------------}}

    $("#division").click(function(){
        $(".division").show();
        $(".gpa").hide();
    });
    $("#gpa").click(function(){
        $(".division").hide();
        $(".gpa").show();
    });

{{-------------------------------js: selection for board/university/other------------------------------------}}
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

{{---------------------------------js: selection for retult_type--------------------------------------------}}

    $("#division").click(function(){
        $(".division").show();
        $(".gpa").hide();
    });
    $("#gpa").click(function(){
        $(".division").hide();
        $(".gpa").show();
    });

</script>