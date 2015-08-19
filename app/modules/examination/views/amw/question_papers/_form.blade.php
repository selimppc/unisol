
{{ HTML::script('assets/js/custom.js')}}

<div class="modal-body">
     <div style="padding: 20px;">
            <div class='form-group'>
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', Input::old('title'),['class'=>'form-control','required'=>'required']) }}
            </div>

            <div class='form-group'>
                {{ Form::label('deadline', 'Deadline') }}
                {{ Form::text('deadline', Input::old('deadline'),['class'=>'form-control date_picker','required'=>'required']) }}
            </div>

            <div class='form-group'>
                {{ Form::label('total_marks', 'Total Marks') }}
                {{ Form::text('total_marks', Input::old('total_marks'),['class'=>'form-control','required'=>'required']) }}
            </div>

            {{--@if($examiner_faculty_lists)--}}
            {{--<div class='form-group'>--}}
                {{--{{ Form::label('s_faculty_user_id', 'Setter') }}--}}
                {{--{{ Form::select('s_faculty_user_id', $examiner_faculty_lists, Input::old('s_faculty_user_id'),['class'=>'form-control']) }}--}}
            {{--</div>--}}
            {{--@else--}}
            <div class='form-group'>
                {{ Form::label('s_faculty_user_id', 'Setter') }}
                {{ Form::select('s_faculty_user_id', $examiner_faculty_lists, Input::old('s_faculty_user_id'),['class'=>'form-control']) }}
            </div>
            {{--@endif--}}

            {{--@if($examiner_faculty_lists)--}}
            {{--<div class='form-group'>--}}
                 {{--{{ Form::label('e_faculty_user_id', 'Evaluator') }}--}}
                 {{--{{ Form::select('e_faculty_user_id', $examiner_faculty_lists, Input::old('e_faculty_user_id'),['class'=>'form-control']) }}--}}
             {{--</div>--}}
            {{--@else--}}
             <div class='form-group'>
                 {{ Form::label('e_faculty_user_id', 'Evaluator') }}
                 {{ Form::select('e_faculty_user_id', $examiner_faculty_lists, Input::old('e_faculty_user_id'),['class'=>'form-control']) }}
             </div>
             {{--@endif--}}

            {{ Form::hidden('status', 'open') }}



          {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
          <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

          <p>&nbsp;</p>
        {{Form::close()}}
     </div>
</div>


