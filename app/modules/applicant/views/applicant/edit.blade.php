<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Edit Account</h4>
</div>
<div class="modal-body">

    <div style="padding: 10px; width: 90%;">

        {{ Form::model($account,array('url'=> array('applicant/user-account/update/'.$account->id), 'method' => 'POST','class'=>'form-horizontal','files'=>true)) }}

        <div class="control-group">
            {{ Form::label('first_name', 'First Name:') }}<span style="color:red;">*</span>
            {{ Form::text('first_name',Input::old('first_name'), array('class' => 'form-control','placeholder'=>'Enter First  name')) }}
        </div>
        <div class="control-group">
            {{ Form::label('middle_name', 'Middle Name:') }}
            {{ Form::text('middle_name',Input::old('middle_name'), array('class' => 'form-control','placeholder'=>'Enter Middle Name')) }}
        </div>
        <div class="control-group">
            {{ Form::label('last_name', 'Last Name:') }}<span style="color:red;">*</span>
            {{ Form::text('last_name',Input::old('last_name'), array('class' => 'form-control','placeholder'=>'Enter Last Name')) }}
        </div>
        <div class="control-group ">
            {{ Form::label('username', 'User Name:') }}<span style="color:red;">*</span>
            {{ Form::text('username',Input::old('username'), array('class' => 'form-control','placeholder'=>'Enter User Name')) }}
        </div>
        <div class="control-group ">
            {{ Form::label('email', 'Email:') }}<span style="color:red;">*</span>
            {{ Form::text('email', Input::old('email_address'), array('class'=>'form-control','placeholder'=>'Enter a valid email address','required')) }}
        </div>

        <br><br>
        <div class="modal-footer">
            {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
            <a href="{{URL::to('applicant/user-account/info')}}" class="btn btn-default pull-right">Close </a>
        </div>

        {{ Form::close() }}

    </div>
</div>
