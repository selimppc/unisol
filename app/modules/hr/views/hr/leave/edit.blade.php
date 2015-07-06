

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit </h4>
</div>

<div class="modal-body" style="padding: 50px">
       {{ Form::open(['route' => ['leave.update',$model->id], 'class'=>'form-horizontal','files' => true,]) }}
       <div class="form-group">
             {{ Form::label('forward_to', 'Leave Forward To ') }}<span class="text-danger">*</span>
             {{ Form::select('forward_to', $employee_list, $model->forward_to, array('class' => 'form-control','required'=>'required')) }}
       </div>

       <div class="form-group">
          <div class="col-lg-6" style="padding-left: 0;">
             {{ Form::label('hr_leave_type_id', 'Leave Type ') }}<span class="text-danger">*</span>
             {{ Form::select('hr_leave_type_id', $leave_type_id, $model->hr_leave_type_id, array('class' => 'form-control','required'=>'required')) }}
          </div>

          <div class="col-lg-6" style="padding-right: 0;">
          {{ Form::label('leave_duration', 'leave Duration') }}
              {{ Form::select ('leave_duration',  array('' => 'Select one',
                  'full-day' => 'Full Day', 'half-day' => 'Half Day'),$model->leave_duration,
                   array('class' => 'form-control ','required')) }}
          </div>
       </div>

       <div class='form-group'>
          {{ Form::label('reason', 'Reason') }}
          {{ Form::text('reason', $model->reason,['class'=>'form-control', 'required']) }}
       </div>

       <div class='form-group'>
           <div class="col-lg-6" style="padding-left: 0;">
              {{ Form::label('from_date', 'Start Date') }}
              {{ Form::text('from_date', $model->from_date,['class'=>'form-control date_picker']) }}
           </div>

           <div class="col-lg-6" style="padding-right: 0;">
              {{ Form::label('to_date', 'End Date') }}
              {{ Form::text('to_date',  $model->to_date,['class'=>'form-control date_picker']) }}
           </div>
       </div>

       <div class='form-group'>
            {{ Form::label('alt_contact_no', 'Alt Contact No') }}
            {{ Form::text('alt_contact_no', $model->alt_contact_no,['class'=>'form-control', 'required']) }}
       </div>

       <div class="form-group">
          {{ Form::label('alt_hr_employee_id', 'Alt HR Employee') }}
          {{ Form::select('alt_hr_employee_id', $employee_list, $model->alt_hr_employee_id, ['class'=>'form-control', 'required']) }}
       </div>

       <div class="form-group">
            {{ Form::label('status', 'Status') }}
            {{ Form::select ('status',  array('' => 'Select one',
                'rejected' => 'Rejected', 'canceled' => 'Canceled','pending-approval'=>'pending Approval',
                'scheduled'=>'Scheduled','taken'=>'Taken','approved'=>'Approved'),$model->status,
                 array('class' => 'form-control ','required')) }}
       </div>
       <p>&nbsp;</p>
       {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
       <a  href="" class="pull-right btn btn-bitbucket" style="margin-right: 5px">Close</a>

       {{Form::close()}}
       <p>&nbsp;</p>
</div>

