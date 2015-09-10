@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_public')
@stop
@section('content')

   <div class="box-body">
       <div class="row">
           <div class="col-lg-6"  style="margin-left: 15%">
               <div class="box box-warning">
                   <div class="box-body">
                        <p class="text">Change Your Password</p>
                        {{ Form::open(array('url'=>'user/save-new-password', 'class'=>'form-signin')) }}

                        {{ Form::hidden('user_id', $user_id, array('class'=>'form-control')) }}
                        {{ Form::label('password','Password') }}
                        {{ Form::password('password',  array('class'=>'form-control','required')) }}

                        {{ Form::label('confirm_password', 'Confirm Password') }}
                        {{ Form::password('confirm_password', array('class'=>'form-control','required')) }}

                        <p>&nbsp;</p>
                        {{ Form::submit('Submit', array('class'=>'pull-right btn btn-sm btn-primary'))}}
                        <br>
                        {{ Form::close() }}
                        <p>&nbsp;</p>
                   </div>
               </div>
           </div>
       </div>
   </div>

 @stop