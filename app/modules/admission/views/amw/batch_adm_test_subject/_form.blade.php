<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Batch Adm-Test Subject : Add</h4>
</div>

<div class="modal-body">
   <div style="padding: 0px 20px 20px 20px;">
      <div class="row">
          <div class="pull-left">
              <strong> Degree: </strong>
              {{ $degree_name->relDegree->relDegreeProgram->code.''.$degree_name->relDegree->relDegreeGroup->code }}
              {{$degree_name->relSemester->title}} - {{$degree_name->relYear->title}}
          </div>
      </div>
    {{Form::open(array('url'=>'admission/amw/batch-adm-test-subjects/store_admtest_subjects', 'class'=>'form-horizontal','files'=>true))}}
      {{ Form::hidden('batch_id',$batch_id,Input::old('batch_id')) }} <br>
        <div class='form-group'>
           {{ Form::label('admtest_subject[]', 'Admission Test Subject') }}
           {{ Form::select('admtest_subject[]',$subject_id_result,Input::old('admtest_subject') ? Input::old('admtest_subject') : $subject_id_result,[ 'class'=>'form-control', 'required']) }}
           <small>for adding new admission subject got to <a href="{{ URL::to('admission/amw/admission-test-subject')}}"  >Admission Test Subject</a></small>
        </div>

        {{--<div class='form-group'>--}}
           {{--{{ Form::label('admtest_subject_id', 'Admission Test Subject') }}--}}
           {{--{{ Form::select('admtest_subject_id',$subject_id_result,Input::old('admtest_subject_id'),['class'=>'form-control']) }}--}}
           {{--<small>for adding new admission subject got to <a href="{{ URL::to('admission/amw/admission-test-subject')}}"  >Admission Test Subject</a></small>--}}
        {{--</div>--}}
        <div class='form-group'>
          {{ Form::label('description', 'Description') }}
          {{ Form::textarea('description', Input::old('description'),['size' => '30x5','class'=>'form-control','required'=>'required']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('marks', 'Marks') }}
            {{ Form::text('marks', Input::old('evaluation_total_marks'),['class'=>'form-control','required'=>'required']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('qualify_marks', 'Qualify Marks') }}
            {{ Form::text('qualify_marks', Input::old('qualify_marks'),['class'=>'form-control','required'=>'required']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('duration', 'Duration in Minutes') }}
           {{ Form::text('duration', Input::old('duration'),['class'=>'form-control','required'=>'required']) }}
        </div>
      {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
      <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

      <p>&nbsp;</p>

    {{Form::close()}}
   </div>
</div>