<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add/Edit Examination</h4>
</div>

 <div class="modal-body">
      <div style="padding: 0px 20px 20px 20px;">
          {{Form::open(array('url'=>'examination/amw/store-exam', 'class'=>'form-horizontal','files'=>true))}}

          <div class="row">
              <div class="help-text-top">
                <em>If you want to add a new examination, You have to fillup this form.  <span class="text-danger">  (*) </span>Indicates required field. Please do not skip these fields.</em>

              </div>
          </div>

          <div class="form-group">
              {{ Form::label('title', 'Title') }}<span class="text-danger">*</span>
              {{ Form::text('title', Input::old('title'), array('class' => 'form-control','required'=>'required')) }}
          </div>

          <div class="form-group">
              {{ Form::label('acm_marks_dist_item_id', 'Exam Type') }}<span class="text-danger">*</span>
              {{ Form::select('acm_marks_dist_item_id', $exam_type, Input::old('acm_marks_dist_item_id'), array('class' => 'form-control','required'=>'required')) }}
          </div>

          <div class="form-group">
                {{ Form::label('semester_id', 'Semester') }}<span class="text-danger">*</span>
                {{ Form::select('semester_id', $semester_id, Input::old('semester_id'), ['class' => 'form-control', 'id'=>'sem-data','required'=>'required']) }}
          </div>

          <div class="form-group">
              {{ Form::label('year_id', 'Year') }}<span class="text-danger">*</span>  <em style="margin-left: 20px;color:#808080">(To Select Year,Please Select Semester At Before)</em>
              {{ Form::select('year_id',$year_id, Input::old('year_id'), ['id'=>'course_name','class'=>'form-control','required'=>'required', 'onclick'=>'SelectSemester()'] ) }}
          </div>
          <div style="color:firebrick" id ="errors">
          </div>

           @if($course_list)
              <div class="form-group">
                  {{ Form::label('course_conduct_id', 'Course Name') }}<span class="text-danger">*</span>
                  {{ Form::select('course_conduct_id',$course_list, Input::old('course_conduct_id'),['id'=>'dependable-list', 'class'=>'form-control','placeholder'=>'']) }}
              </div>
          @else
              <div class="form-group">
                 {{ Form::label('course_conduct_id', 'Course Name') }}<span class="text-danger">*</span>
                 {{ Form::select('course_conduct_id', $course_list, Input::old('course_conduct_id'), ['id'=>'dependable-list', 'class'=>'form-control','placeholder'=>'','required'=>'required']) }}
              </div>
          @endif

          <div class='form-group'>
              {{ Form::submit('Save', array('class'=>'pull-right btn btn-primary')) }}
              <a  href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
          </div>
          {{Form::close()}}
      </div>
 </div>

{{----------------Ajax operation: Dropdown CourseList  ----------------------------------}}
<script>
 $('#course_name').change(function(){
    $.get("{{ url('examination/amw/drop-down-courses')}}",
        { year: $(this).val(), semester:$('#sem-data').val() },
        function(data) {
             var model = $('#dependable-list');
             model.empty();
            $.each(data, function(key, element) {
                model.append("<option value='"+ key +"'>" + element + "</option>");
            });
        });
 });
 </script>

{{------------------Error Message Show------------------}}
 <script>
      function SelectSemester(){

         var semester_value =  document.getElementById("sem-data").value ;
         if(semester_value === ""){
             document.getElementById('errors').innerHTML="Please Select Semester At First.";
         }else{
             $("#errors").hide();
         }
      }
</script>
