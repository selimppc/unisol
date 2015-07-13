{{--{{ HTML::style('assets/css/jquery.timepicker.css') }}
{{ HTML::style('assets/css/jquery.timepicker.min.css') }}

{{ HTML::style('assets/etsb/etsb_css/bootstrap/bootstrap.min.css') }}
{{ HTML::style('assets/etsb/etsb_css/style.css') }}
{{ HTML::script('assets/etsb/etsb_js/jquery/jquery-2.1.1.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}--}}
<div style="padding: 0px 20px 20px;">
    <div class="form-group">
      {{ Form::label('forward_to', 'Leave Forward To ') }}<span class="text-danger">*</span>
      {{ Form::select('forward_to', $employee_list, Input::old('forward_to'), array('class' => 'form-control','required'=>'required')) }}
    </div>

    <div class="form-group">
       <div class="col-lg-6" style="padding-left: 0;">
          {{ Form::label('hr_leave_type_id', 'Leave Type ') }}<span class="text-danger">*</span>
          {{ Form::select('hr_leave_type_id', $leave_type_id, Input::old('hr_leave_type_id'), array('class' => 'form-control','required'=>'required')) }}
       </div>

       <div class="col-lg-6" style="padding-right: 0;">
       {{ Form::label('leave_duration', 'leave Duration') }}
           {{ Form::select ('leave_duration',  array('' => 'Select one',
               'full-day' => 'Full Day', 'half-day' => 'Half Day'), Input::old('leave_duration'),
                array('class' => 'form-control ','required')) }}
       </div>
    </div>
<p>&nbsp;</p>

    <div class='form-group'>
        <div class="col-lg-6" style="padding-left: 0;">
           {{ Form::label('from_date', 'Start Date') }}
           {{ Form::text('from_date',  Input::old('from_date'),['class'=>'form-control date_picker']) }}
        </div>

        <div class="col-lg-6" style="padding-right: 0;">
           {{ Form::label('to_date', 'End Date') }}
           {{ Form::text('to_date',  Input::old('to_date'),['class'=>'form-control date_picker']) }}
        </div>
    </div>
    <p>&nbsp;</p>

    <div class="form-group">
        <div class="col-lg-6" style="padding-left: 0;">
           {{ Form::label('alt_hr_employee_id', 'Alt HR Employee') }}
           {{ Form::select('alt_hr_employee_id', $employee_list, Input::old('alt_hr_employee_id'), ['class'=>'form-control', 'required']) }}
        </div>
        <div class="col-lg-6" style="padding-right: 0;">
        {{ Form::label('alt_contact_no', 'Alt Contact No') }}
        {{ Form::text('alt_contact_no', Input::old('alt_contact_no'),['class'=>'form-control', 'required']) }}
        </div>
    </div>
    <p>&nbsp;</p>
    <div class="form-group">
        <div class="col-lg-8" style="padding-left: 0;">
            {{ Form::label('reason', 'Reason') }}
            {{ Form::text('reason', Input::old('reason'),['class'=>'form-control', 'required']) }}
        </div>
        <div class="col-lg-4" style="padding-right: 0;">
             {{ Form::label('status', 'Status') }}
             {{ Form::select ('status',  array('' => 'Select one',
                 'rejected' => 'Rejected', 'canceled' => 'Canceled','pending-approval'=>'pending Approval',
                 'scheduled'=>'Scheduled','taken'=>'Taken','approved'=>'Approved'), Input::old('status'),
                  array('class' => 'form-control ','required')) }}
        </div>
    </div>
    <p>&nbsp;</p>
    <div class='form-group'>
       {{ Form::label('comment', 'HR Leave Comments') }}
       {{ Form::textarea('comment', Input::old('comment'),['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');", 'size' => '40x9', 'class'=>'form-control','placeholder'=>'Write Your message here...']) }}
    </div>

    {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
    <a  href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
    <p>&nbsp;</p>
</div>


