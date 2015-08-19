<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Edit Batch : {{ $batch->batch_number }} of {{ $batch->relVDegree->title }}</h4>
</div>

<div class="modal-body">
      <div style="padding: 20px;">

          {{Form::open(array('url'=> ['admission/amw/batch/update',$batch->id], 'class'=>'form-horizontal','files'=>true))}}
          {{ Form::hidden('degree_id',$batch->degree_id,['class'=>'form-control']) }}
          {{ Form::hidden('batch_number', $batch->batch_number,['class'=>'form-control input-sm','required'=>'required']) }}

                <div class='form-group'>

                    <div class="col-sm-6" style="padding-right: 0;">
                        {{ Form::label('year_id', 'Year') }}
                       {{ Form::select('year_id', $year_list, $batch->year_id,['class'=>'form-control']) }}
                    </div>

                    <div class="col-sm-6" >
                        {{ Form::label('semester_id', 'Semester') }}
                        {{ Form::select('semester_id',$semester_list,$batch->semester_id,['class'=>'form-control']) }}
                    </div>
                </div>

                <div class='form-group'>
                   {{ Form::label('description', 'Description') }}
                   {{ Form::textarea('description', $batch->description,['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');",'size' => '30x5','class'=>'form-control']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('seat_total', 'Total Seat') }}
                   {{ Form::text('seat_total', $batch->seat_total,['class'=>'form-control input-sm','required'=>'required']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('start_date', 'Start Date') }}
                   {{ Form::text('start_date', $batch->start_date,['class'=>'form-control date_picker input-sm']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('end_date', 'End Date') }}
                   {{ Form::text('end_date', $batch->end_date,['class'=>'form-control date_picker input-sm','required'=>'required']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('admission_deadline', 'Admission Deadline') }}
                   {{ Form::text('admission_deadline',$batch->admission_deadline,['class'=>'form-control input-sm date_picker','required'=>'required']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('admtest_date', 'Admission Test Date') }}
                   {{ Form::text('admtest_date', $batch->admtest_date,['class'=>'form-control date_picker input-sm','required'=>'required']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('admtest_start_time', 'Admission Test Start Time') }}
                   {{ Form::select('admtest_start_time',
                        array(''=>'Select Time','08:00:00'=>'08:00:00','08:30:00'=>'08:30:00','09:00:00'=>'09:00:00','09:30:00'=>'09:30:00',
                                                '10:00:00'=>'10:00:00','10:30:00'=>'10:30:00','11:00:00'=>'11:00:00','11:30:00'=>'11:30:00',
                                                '12:00:00'=>'12:00:00','12:30:00'=>'12:30:00','01:00:00'=>'01:00:00','01:30:00'=>'01:30:00',
                                                '02:00:00'=>'02:00:00','02:30:00'=>'02:30:00','03:00:00'=>'03:00:00','03:30:00'=>'03:30:00',
                                                '04:00:00'=>'04:00:00','04:30:00'=>'04:30:00','05:00:00'=>'05:00:00','05:30:00'=>'05:30:00'),
                        $batch->admtest_start_time,['class'=>'form-control input-sm','required'=>'required']) }}
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
