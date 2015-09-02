@extends('layouts.layout')
@section('sidebar')
    {{--@include('layouts._sidebar_applicant')--}}
@stop
<div class="span6 well">
{{ Form::open(array('class'=>'form-signin')) }}
<h4 class="form-signin-heading">Mail Notification</h4>

       <div>
       <p>We’ve sent you an email containing your username.</p>
       <p>Please check your spam folder if the email doesn’t appear within a few minutes.</p>
       </div>
        {{ Form::close() }}

</div>

 @stop