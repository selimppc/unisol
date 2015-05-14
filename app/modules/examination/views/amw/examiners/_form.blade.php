<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Examiner</h4>
</div>

 <div class="modal-body">
      <div style="padding: 0px 20px 20px 20px;">
          {{--{{Form::open(array('url'=>'examination/amw/examiners/store', 'class'=>'form-horizontal','files'=>true))}}--}}
          {{Form::open(['route'=>'amw.examiners.store', 'files'=>true])}}
          <div class="row">
              <div class="help-text-top">
                <em>If you want to add a new examiner, You have to fillup this form.  <span class="text-danger">  (*) </span>Indicates required field. Please do not skip these fields.</em>
              </div>
          </div>

          {{ Form::hidden('exm_exam_list_id',$exm_exam_list_id) }}
          {{ Form::hidden('status','Requested', Input::old('status')) }}

           <div class='form-group'>
               {{ Form::label('type', 'Examiner Type') }}
               {{ Form::select('type',
               array('question-setter' => 'question-setter','question-evaluator' => 'question-evaluator','both' => 'both'),
               Input::old('type'),['class'=>'form-control','required'=>'required']) }}
           </div>

           <div class="form-group">
               {{ Form::label('user_id', 'Name of Faculty:') }}
               {{ Form::select('user_id', User::FacultyList(),Input::old('user_id'), array('class' => 'form-control','required'=>'required') ) }}
           </div>

          <div class="form-group">
              {{ Form::hidden('assigned_by', 'Assigned By:') }}
              {{ Form::hidden('assigned_by', Auth::user()->get()->id ,Input::old('assigned_by'), array('class' => 'form-control','required'=>'required') ) }}
          </div>

          <div class="form-group">
              {{ Form::label('deadline', 'Deadline') }}
              {{ Form::text('deadline', Input::old('deadline'), array('class' => 'form-control date_picker','required'=>'required')) }}
          </div>

          <div class="form-group">
               {{ Form::label('note', 'Comment:') }}
               {{ Form::textarea('note',Input::old('note'), ['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');",'class' => 'form-control','placeholder'=>'Your Comments Here', 'style'=>'height: 100px;']) }}
          </div>

         <div class='form-group'>
              {{ Form::submit('Save', array('class'=>'pull-right btn btn-primary ')) }}
              <a  href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
         </div>
          {{Form::close()}}
      </div>
 </div>

 {{ HTML::script('assets/js/custom.js')}}
