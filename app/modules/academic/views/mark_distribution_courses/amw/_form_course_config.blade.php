  <div class="form-group">
   {{ Form::label('acm_marks_dist_item_id', 'CourseItemName') }}
   {{ Form::select('acm_marks_dist_item_id', [''=>'Select Option'] + AcmMarksDist::orderBy('title')->lists('title', 'id'),Input::old('acm_marks_dist_item_id'), ['class'=>'form-control']) }}
  </div>

  <div class='form-group'>
      {{ Form::label('marks', 'Marks') }}
      {{ Form::text('marks', Input::old('marks'), array('placeholder'=>'Course Item marks','class'=>'form-control','change','required'=>'required')) }}

  </div>
  <div class='form-group'>
    {{ Form::label('readonly', 'ReadOnly') }}
    {{ Form::select('readonly', array(''=>'Select','0' => '0', '1' => '1'), Input::old('readonly'),array('class' => 'form-control','required'=>'required'))}}
  </div>
 <div>
    {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
    <a href="{{URL::to('amw/config/index')}}" class="btn btn-default">Close </a>
 </div>
