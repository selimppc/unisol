@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    {{--@include('layouts._sidebar_u')--}}
@stop
@section('content')


<div class="span6 well">
{{ Form::open(array('class'=>'form-signin')) }}
<h4 class="form-signin-heading">Mail Notification</h4>

       <div>
       <p>Thanks for signing up!</p>
       </div>
       {{ Form::close() }}

</div>

 @stop