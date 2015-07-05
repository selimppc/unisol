<div style="padding: 0px 20px 20px;">
    <div class="form-group">
      {{ Form::label('forward_to', 'Leave Forward To ') }}<span class="text-danger">*</span>
      {{ Form::select('forward_to', $employee_list, Input::old('forward_to'), array('class' => 'form-control','required'=>'required')) }}
    </div>

    <div class="form-group">
          {{ Form::label('hr_leave_type_id', 'Leave Type ') }}<span class="text-danger">*</span>
          {{ Form::select('hr_leave_type_id', $leave_type_id, Input::old('hr_leave_type_id'), array('class' => 'form-control','required'=>'required')) }}
    </div>

    <div class='form-group'>
       {{ Form::label('reason', 'Reason') }}
       {{ Form::text('reason', Input::old('reason'),['class'=>'form-control', 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('leave_duration', 'leave Duration') }}
            <div>{{ Form::select ('leave_duration',  array('' => 'Select one',
                'full-day' => 'Full Day', 'half-day' => 'Half Day'), Input::old('leave_duration'),
                 array('class' => 'form-control ','required')) }}</div>
            </div>
    </div>

    <div class='form-group'>
        <div class="col-lg-6" style="padding-left: 1;">
           {{ Form::label('from_date', 'Start Date') }}
           {{ Form::text('from_date',  Input::old('from_date'),['class'=>'form-control date_picker']) }}
        </div>

        <div class="col-lg-6" style="padding-right: 1;">
           {{ Form::label('to_date', 'End Date') }}
           {{ Form::text('to_date',  Input::old('to_date'),['class'=>'form-control date_picker']) }}
        </div>
    </div>
    <p>&nbsp;</p>
    <div class='form-group'>
         <div class="col-lg-12">{{ Form::label('alt_contact_no', 'Alt Contact No') }}</div>
         <div class="col-lg-12">{{ Form::text('alt_contact_no', Input::old('alt_contact_no'),['class'=>'form-control', 'required']) }}</div>
    </div>
    <p>&nbsp;</p>

    <div class="form-group">
       <div class="col-lg-12">{{ Form::label('alt_hr_employee_id', 'Alt HR Employee') }}</div>
       <div class="col-lg-12">{{ Form::select('alt_hr_employee_id', $employee_list, Input::old('alt_hr_employee_id'), ['class'=>'form-control', 'required']) }}</div>
    </div>
    <p>&nbsp;</p>
    <div class="form-group" style='padding: 0px 20px 20px;"'>
         {{ Form::label('status', 'Status') }}
         {{ Form::select ('status',  array('' => 'Select one',
             'rejected' => 'Rejected', 'canceled' => 'Canceled','pending-approval'=>'pending Approval',
             'scheduled'=>'Scheduled','taken'=>'Taken','approved'=>'Approved'), Input::old('status'),
              array('class' => 'form-control ','required')) }}

    </div>

    <p>&nbsp;</p>
    <div class='form-group'>
          <div>{{ Form::submit('Save', array('class'=>' btn btn-info','style'=>'margin-left:410px')) }}
          <a  href="" class="pull-right btn btn-bitbucket" style="margin-right: 30px">Close</a></div>
    </div>
    <p>&nbsp;</p>
</div>
