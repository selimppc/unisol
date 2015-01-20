@extends('layouts.master')

@section('sidebar')
    @include('admission::_sidebar')
@stop

@section('content')

    <div class="container" style="margin-top: 30px; width:500px">
	  <div class='row clearfix'>
       {{--@if (Session::has('message'))--}}
            {{--<div class="alert alert-info">{{ Session::get('message') }}</div>--}}
          {{--@endif--}}
       

		{{Form::open(array('url'=>'send/email','method'=>'post','role'=>'form'))}}

			<div class='form-group'>
			{{ Form::label('notification', 'Notification') }} 
			<!-- <textarea class="form-control" name="message_details" rows="6" ></textarea> -->
			{{ Form::textarea('message_details', '', ['class'=>'form-control','size'=>'30x5']) }}



			</div>

			<div class="form-group">
			{{Form::submit('SendEmail', array('class'=>'btn btn-primary'))}}
			</div>

		{{Form::close()}}
		

	 </div>
	</div>

@stop