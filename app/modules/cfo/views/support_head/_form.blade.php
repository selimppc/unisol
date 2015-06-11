@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_public')
@stop
@section('content')
    <!-- left column -->
    <div class="col-md-10"  style="margin-left: 90px">
        <!-- general form elements -->
        <div class="box box-solid">
            <div class="box-header">
                <h3 class="text-center text-green">User Support</h3>
            </div><!-- /.box-header -->
            <div class="box-body" style="padding: 30px;">
                 <div class="help-text-top">
                    <em style="color:lightskyblue">Enter your support details below.If you are reporting a problem, please remember to provide as much information that is relevant to the issue as possible. <span class="text-danger">  (*) </span>Indicates required field. Please do not skip these fields.</em>
                 </div>
                {{Form::open(['route'=>'support-head.store', 'files'=>true])}}

                {{Form::hidden('status','new')}}

                <div class="form-group">
                    <div class='col-lg-6' style="padding-left: 0;">
                       {{ Form::label('name', 'Name') }}<span class="text-danger">*</span>
                       {{ Form::text('name', Input::old('name'),['class'=>'form-control', 'placeholder'=>'Write Your name','required']) }}
                    </div>

                    <div class='col-lg-6' style="padding-right: 0;">
                        {{ Form::label('email', 'Email') }}<span class="text-danger">*</span>
                        {{ Form::text('email', Input::old('email'),[ 'class'=>'form-control','required']) }}
                    </div>
                </div>
                <p>&nbsp;</p>
                <div class='form-group'>
                   <div class='col-lg-6' style="padding-left: 0;">
                       {{ Form::label('phone', 'Phone Number') }}<span class="text-danger">*</span>
                       {{ Form::text('phone', Input::old('phone'),['class'=>'form-control','required']) }}
                   </div>
                   <div class='col-lg-6' style="padding-right: 0;">
                       {{ Form::label('subject', 'Subject') }}
                       {{ Form::text('subject', Input::old('subject'),['class'=>'form-control']) }}
                   </div>
                </div>
                <p>&nbsp;</p>

                <div class="form-group">
                    <div class='col-lg-6' style="padding-left: 0;">
                        {{ Form::label('cfo_category_id', 'Cfo Category') }}<span class="text-danger">*</span>
                        {{ Form::select('cfo_category_id', $cfo_category_id, Input::old('cfo_category_id'), [ 'class'=>'form-control','required' ]) }}
                    </div>
                    <div class='col-lg-6' style="padding-right: 0;">
                         {{ Form::label('priority', 'Priority') }}<span class="text-danger">*</span>
                         {{ Form::select('priority', array( 'low' => 'Low', 'medium'=>'Medium','high' => 'High'),
                         Input::old('board_university'),[ 'class'=>'form-control','required']) }}
                    </div>
                </div>
                <p>&nbsp;</p>
                <div class='form-group'>
                   {{ Form::label('message', 'Message') }}
                   {{ Form::textarea('message', Input::old('message'),['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');", 'size' => '40x9', 'class'=>'form-control','placeholder'=>'Write Your message here...']) }}
                </div>

                <p>&nbsp;</p>
                {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
                <a href="/" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
                <p>&nbsp;</p>
            </div><!-- /.box -->
            {{ Form::close() }}
            <p>&nbsp;</p>
        </div>
    </div>


@stop

