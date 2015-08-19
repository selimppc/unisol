@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_public')
@stop
@section('content')
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-solid">
            <div class="box-header" style="background-color: #0490a6">
                <h3 class="text-center text-green"><b style="color: #f5f5f5">User Support</b></h3>
            </div><!-- /.box-header -->
            <div class="box-body" style="padding: 30px;background-color:aliceblue">
                {{Form::open(['route'=>'support-head.support-data', 'files'=>true])}}
                    <div class='col-lg-6'>
                      {{ Form::label('support_code', 'Support Code') }}
                      {{ Form::text('support_code', Input::old('support_code'),['class'=>'form-control','placeholder'=>'Enter Your Support code If Exists']) }}
                    </div>
                    <div class="col-sm-2" style="padding-top: 1%">
                    </br>
                     {{--<a href="{{ URL::route('support-head.support-data')  }}" class="btn btn-success btn-sm" data-toggle="modal" data-target="#reply" title="Show" style="font-size: 11px">Submit</a>--}}
                    {{ Form::submit('Submit', array('class'=>'btn btn-success btn-sm','id'=>'button'))}}
                    </div>
                {{ Form::close() }}

                <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>

                <div class="help-text-top">
                    <em style="color:midnightblue">Enter your support details below.If you are reporting a problem, please remember to provide as much information that is relevant to the issue as possible. <span class="text-danger">  (*) </span>Indicates required field. Please do not skip these fields.</em>
                </div>
                {{Form::open(['route'=>'support-head.store', 'files'=>true])}}

                    {{Form::hidden('status','new')}}

                    <div class="form-group">
                        <div class='col-lg-6'>
                           {{ Form::label('name', 'Name') }}<span class="text-danger">*</span>
                           {{ Form::text('name', Input::old('name'),['class'=>'form-control', 'placeholder'=>'Write Your name','required']) }}
                        </div>

                        <div class='col-lg-6'>
                            {{ Form::label('email', 'Email') }}<span class="text-danger">*</span>
                            {{ Form::text('email', Input::old('email'),[ 'class'=>'form-control','required']) }}
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <div class='form-group'>
                        <div class='col-lg-6'>
                           {{ Form::label('phone', 'Phone Number') }}<span class="text-danger">*</span>
                           {{ Form::text('phone', Input::old('phone'),['class'=>'form-control','required']) }}
                        </div>
                        <div class='col-lg-6'>
                           {{ Form::label('subject', 'Subject') }}
                           {{ Form::text('subject', Input::old('subject'),['class'=>'form-control']) }}
                        </div>
                    </div>
                    <p>&nbsp;</p>

                    <div class="form-group">
                        <div class='col-lg-6'>
                            {{ Form::label('cfo_category_id', 'Cfo Category') }}<span class="text-danger">*</span>
                            {{ Form::select('cfo_category_id', $cfo_category_id, Input::old('cfo_category_id'), [ 'class'=>'form-control','required' ]) }}
                        </div>
                        <div class='col-lg-6'>
                             {{ Form::label('priority', 'Priority') }}<span class="text-danger">*</span>
                             {{ Form::select('priority', array( 'low' => 'Low', 'medium'=>'Medium','high' => 'High'),
                             Input::old('board_university'),[ 'class'=>'form-control','required']) }}
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <div>
                       {{ Form::label('message', 'Message') }}
                       {{ Form::textarea('message', Input::old('message'),['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');", 'size' => '35x6', 'class'=>'form-control','placeholder'=>'Write Your message here...']) }}
                    </div>

                    <p>&nbsp;</p>
                    <div class="pull-right">
                         {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-sm')) }}
                         <a href="" class="btn btn-default btn-sm" style="margin-right:8px">Close</a>
                    </div>
                    <p>&nbsp;</p>
                <!-- /.box -->
                {{ Form::close() }}
            </div>
        </div>
    </div>

<!-- Modal  -->
 <div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

        </div>
      </div>
 </div>

@stop

