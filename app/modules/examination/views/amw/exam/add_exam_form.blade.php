<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Examination</h4>
</div>

<div class="modal-body">
      <div style="padding: 0px 20px 20px 20px;">
          {{Form::open(array('url'=>'examination/amw/drop-down-courses', 'class'=>'form-horizontal','files'=>true))}}
          <div class="row">
                  <div class="help-text-top">
                    <em>If you want to add a new examination, You have to fillup this form.  <span class="text-danger">  (*) </span>Indicates required field. Please do not skip these fields.</em>
                  </div>
          </div>

          <div class="form-group">
              {{ Form::label('title', 'Title') }}
              {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
              {{ Form::label('exam_type', 'Exam Type') }}
              {{ Form::select('acm_marks_dist_item_id',$exam_type, Input::old('acm_marks_dist_item_id'), array('class' => 'form-control')) }}
          </div>

          <div class="form-group">
                {{ Form::label('semester_id', 'Semester') }}
                {{ Form::select('semester_id', $semester_id, Input::old('semester_id'), array('class' => 'form-control', 'id'=>'sem-data')) }}
            </div>

          <div class="form-group">
              {{ Form::label('year_id', 'Year') }}
              {{ Form::select('year_id',$year_id, Input::old(''), ['id'=>'course_name','class'=>'form-control'] ) }}


          </div>



          <div class="form-group">
              {{ Form::label('course_name', 'Course Name') }}
              {{ Form::select('course_name',$course_list, Input::old('course_name'), ['id'=>'dependable-list', 'class'=>'form-control','placeholder'=>'fgfdhfhj']) }}
          </div>
          {{--<select id="dependable-list" name="dependable_list">--}}
                   {{--<option>Please choose one</option>--}}
          {{--</select>--}}

          <div class='form-group'>
              {{ Form::submit('Save', array('class'=>'pull-right btn btn-primary')) }}
              <a  href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
          </div>
          {{Form::close()}}
      </div>
</div>

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