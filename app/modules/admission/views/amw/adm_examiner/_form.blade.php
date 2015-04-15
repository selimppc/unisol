<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Admission Test Examiner : Add</h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
        {{Form::open(array('url'=>'admission/amw/admission-test-examiner/store-admission-test-examiner', 'class'=>'form-horizontal','files'=>true))}}

            <div class='form-group'>
                <strong> Degree Name: </strong>{{ Degree::findOrFail($degree_id)->relDegreeLevel->code.''.Degree::findOrFail($degree_id)->relDegreeGroup->code.' In '.Degree::findOrFail($degree_id)->relDegreeProgram->code }} </br>
                {{--<strong> Department: </strong>{{ $degree_data->relDepartment->title }}--}}
            </div>

           {{ Form::hidden('batch_id',$batch_id,Input::old('batch_id')) }} </br>

            <div class='form-group'>
                {{ Form::label('type', 'Examiner Type') }}
                {{ Form::select('type',
                array('Question Setter' => 'Question Setter(QS)','Question Evaluator' => 'Question Evaluator(QE)','Both' => 'Both(BOTH)'),
                Input::old('type'),['class'=>'form-control','required'=>'required']) }}
            </div>

            <div class="form-group">
                {{ Form::label('user_id', 'Name of Faculty:') }}
                {{ Form::select('user_id', User::AmwList(),Input::old('user_id'), array('class' => 'form-control','required'=>'required') ) }}
            </div>

           <div class="form-group">
               {{ Form::hidden('assign_by', 'Assign By:') }}
               {{ Form::hidden('assign_by', Auth::user()->get()->id ,Input::old('assign_by'), array('class' => 'form-control','required'=>'required') ) }}
           </div>

            {{--<div class="form-group">
               {{ Form::label('status', 'Status:') }}
               {{ Form::select('status', array('Requested' => 'Requested','Accepted' => 'Accepted','Deny' => 'Deny','Cancel' => 'Cancel'),Input::old('user_id'), array('class' => 'form-control','required'=>'required') ) }}
           </div>--}} {{ Form::hidden('status','Requested', Input::old('status')) }}

            <div class="form-group">
                     {{ Form::label('comment', 'Comment:') }}
                     {{ Form::textarea('comment',Input::old('comment'), ['class' => 'form-control','placeholder'=>'Your Comments Here', 'style'=>'height: 100px;']) }}
            </div>

      {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
      <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

      <p>&nbsp;</p>
    {{Form::close()}}
     </div>
</div>


