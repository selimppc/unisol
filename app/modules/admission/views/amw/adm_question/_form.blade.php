<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Admission Test Question : Add</h4>
</div>

{{ HTML::script('assets/js/custom.js')}}

<div class="modal-body">
     <div style="padding: 20px;">
        {{Form::open(array('url'=>'admission/amw/admission-test-question/store-admtest-question-paper', 'class'=>'form-horizontal','files'=>true))}}

                   <div class='form-group'>
                         <strong> Batch# </strong> {{ Batch::findOrFail($batch_id)->batch_number }}
                   </div>

                   <div class='form-group'>
                         <strong> Degree Name: </strong>
                                            {{
                                                Degree::findOrFail($degree_id)->relDegreeProgram->code.'
                                                '.Degree::findOrFail($degree_id)->relDegreeGroup->code.' in
                                                '.$degree_data->relDepartment->title.',
                                                '.Semester::findOrFail($semester_id)->title.',
                                                '.Year::findOrFail($year_id)->title
                                            }}
                   </div>


                <div class='form-group'>
                    {{ Form::label('batch_admtest_subject_id', 'Subject') }}
                    {{ Form::select('batch_admtest_subject_id',$batch_admtest_subject, Input::old('batch_admtest_subject_id'),['class'=>'form-control','required'=>'required']) }}
                </div>

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

                <div class='form-group'>
                    {{ Form::label('examiner_faculty_user_id', 'Assign To') }}
                    {{ Form::select('examiner_faculty_user_id',User::AmwList(), Input::old('examiner_faculty_user_id'),['class'=>'form-control','required'=>'required']) }}
                </div>




              {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
              <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

              <p>&nbsp;</p>
        {{Form::close()}}
     </div>
</div>


