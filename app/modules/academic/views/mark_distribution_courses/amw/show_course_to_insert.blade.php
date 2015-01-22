<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <h4 class="modal-title">Show Course Item config</h4>
</div>
<div class="modal-body">
    
  <p> Total Marks: {{ $datas->evaluation_total_marks}}</p>
        
   
   <div class="form-horizontal">
      <div class="form-group">
          {{ Form::hidden('course_id', $datas->id, ['class'=>'form-control course_id'])}}
          {{ Form::hidden('course_title', $datas->title, ['class'=>'form-control course_title'])}}
          {{ Form::hidden('course_evaluation_total_marks', $datas->evaluation_total_marks, ['class'=>'form-control course_evalution_marks'])}}
      </div>
      <div class="form-group">
         <div class="col-md-4">
              {{ Form::select('acm_marks_dist_item_id', [''=>'Select Option'] + AcmMarksDist::orderBy('title')->lists('title', 'id'),Input::old('acm_marks_dist_item_id'), ['class'=>'form-control addConfigListItem']) }}
         </div>
         <div class="col-md-4">
             {{ Form::submit('ADD', ['class'=>'btn btn-info addConfigList','onClick'=>'addCourseListItem()']) }}
         </div>
      </div>
   </div>


    {{ Form::open(array('url'=>'amw/course/marks/save','method' => '')) }}
    <table class="table table-bordered">
        <thead>
            <th>Item</th>
            <th>Marks (%)</th>
            <th>Read Only</th>
            <th>Default Item?</th>
            <th>Actual Marks</th>
            <th>Action</th>
        </thead>

        <tbody class="acm_course_config_list">
        @foreach($course_data as $key=>$value)
            <tr>
                <td>{{ AcmMarksDist::AcmMarksDistName($value->acm_marks_dist_item_id) }}</td>
                <td><input type="text" name="marks_percent[]" value="{{ $value->marks }}" class="amw_marks_percent'+trLen+'" onChange="calculateActualMarks(this.className, '+course_evalution_marks+',this.value)" required/></td>
                <td>
                    <input type="checkbox" name="isReadOnly[]" value="1" class="amw_isReadOnly" {{($value->readonly == 1) ? 'checked' : '' }} />
                </td>
                <td>
                    <input type="radio" name="isDefault{{$key}}" value="1" class="amw_isDefault" {{($value->default_item == 1) ? 'checked' : '' }}/><span>Yes</span>
                    <input type="radio" name="isDefault{{$key}}" value="0" class="amw_isDefault" {{($value->default_item == 0) ? 'checked' : '' }}/><span>No</span>
                </td>
                <td><input type="text" name="actual_marks[]" value="{{$value->marks}}" class="amw_actual_marks"/> </td>
                <td><a class="btn btn-default btn-sm" id="removeTrId{{$key}}" onClick="deleteNearestTr(this.id)"><span class="glyphicon glyphicon-trash text-danger"></span></a></td>
            </tr>
        @endforeach
        </tbody>        
        <tr><td colspan="6">{{ Form::submit('Submit', ['class'=>'btn btn-info'] ) }}</td></tr>

    </table>
    {{Form::close()}}
</div>
<div class="modal-footer">
    <a href="{{URL::to('amw/config/index')}}" class="btn btn-default">Close </a>
</div>