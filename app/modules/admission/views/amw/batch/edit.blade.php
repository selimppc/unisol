<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Edit Batch</h4>
</div>

<div class="modal-body">
      <div style="padding: 20px;">

          {{Form::open(array('url'=> ['admission/amw/batch/update',$batch_edit->id], 'class'=>'form-horizontal','files'=>true))}}
          {{ Form::hidden('degree_id',$batch_edit->degree_id,['class'=>'form-control']) }}

                <div class='form-group'>

                    <div class="col-sm-6" style="padding-right: 0;">
                        {{ Form::label('semester_id', 'Semester') }}
                       {{ Form::select('semester_id',$semester_list,$batch_edit->semester_id,['class'=>'form-control']) }}
                    </div>

                    <div class="col-sm-6">
                        {{ Form::label('year_id', 'Year') }}
                       {{ Form::select('year_id', $year_list, $batch_edit->year_id,['class'=>'form-control']) }}
                    </div>
                </div>

                <div class='form-group'>
                   {{ Form::label('batch_number', 'Batch Number') }}
                   {{ Form::hidden('batch_number', $batch_edit->batch_number,['class'=>'form-control input-sm','required'=>'required']) }}
                </div>

                <div class='form-group'>

                   {{ Form::textarea('description', $batch_edit->description,['size' => '30x5','class'=>'form-control','required'=>'required']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('seat_total', 'Total Seat') }}
                   {{ Form::text('seat_total', $batch_edit->seat_total,['class'=>'form-control input-sm','required'=>'required']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('start_date', 'Start Date') }}
                   {{ Form::text('start_date', $batch_edit->start_date,['class'=>'form-control date_picker input-sm']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('end_date', 'End Date') }}
                   {{ Form::text('end_date', $batch_edit->end_date,['class'=>'form-control date_picker input-sm','required'=>'required']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('admission_deadline', 'Admission Deadline') }}
                   {{ Form::text('admission_deadline',$batch_edit->admission_deadline,['class'=>'form-control input-sm date_picker','required'=>'required']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('admtest_date', 'Admission Test Date') }}
                   {{ Form::text('admtest_date', $batch_edit->admtest_date,['class'=>'form-control date_picker input-sm','required'=>'required']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('admtest_start_time', 'Admission Test Start Time') }}
                   {{ Form::text('admtest_start_time', $batch_edit->admtest_start_time,['class'=>'form-control input-sm','required'=>'required']) }}
                </div>
          <p>&nbsp;</p>
          <div>
          {{ Form::submit('Update', array('class'=>'pull-right btn btn-info')) }}
          <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

          </div>
          <p>&nbsp;</p>
          {{Form::close()}}
      </div>

</div>
{{ HTML::script('assets/js/custom.js')}}
