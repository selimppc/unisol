  <div class="form-group">
   {{ Form::label('acm_marks_dist_item_id', 'CourseItemName') }}
   {{ Form::select('acm_marks_dist_item_id', [''=>'Select Option'] + AcmMarksDist::orderBy('title')->lists('title', 'id'),Input::old('acm_marks_dist_item_id'), ['class'=>'form-control']) }}
  </div>

  {{--<div class='form-group'>--}}
      {{--{{ Form::label('marks', 'Marks') }}--}}
      {{--{{ Form::text('marks', Input::old('marks'), array('placeholder'=>'marks','class'=>'form-control','change','required'=>'required')) }}--}}

  {{--</div>--}}
   {{--<div class='form-group'>--}}
    {{--{{ Form::label('actualmarks', 'ActualMarks') }}--}}
    {{--{{ Form::text('actualmarks', Input::old('actualmarks'), array('placeholder'=>'actualmarks','class'=>'form-control','change','required'=>'required')) }}--}}
     {{--</div>--}}
  {{--<div class="form-group">--}}
     {{--<label class="col-sm-3 control-label">ReadOnly<span class="asterisk"></span></label>--}}

     {{--{{ Form::checkbox('ReadOnly[]', 'bangla', null, null) }}ReadOnly--}}

  {{--</div><!-- form-group -->--}}

  {{--<div class='form-group'>--}}
  {{--<label class="col-sm-3 control-label">DeafaultItem<span class="asterisk"></span></label>--}}
     {{--<label>--}}
     {{--{{ Form::radio('deafaultitem', 'yes', null,null) }}Yes</label>--}}
      {{--<label>--}}
     {{--{{ Form::radio('deafaultitem', 'no', null, null) }}No</label>--}}
  {{--</div>--}}

     <a href="{{URL::to('amw/config/index')}}" class="btn btn-default">Add </a>
     <br>
      <div class='form-group'>
      </div>
 <div>
    {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
    <a href="{{URL::to('amw/config/index')}}" class="btn btn-default">Close </a>
 </div>
