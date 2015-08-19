@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_public')
@stop
@section('content')
    <!-- left column -->
    <div class="box box-solid">
        <div class="box-header" style="background-color: #0490a6">
           <h3 class="text-center text-green"><b style="color: #f5f5f5">User Support</b></h3>
        </div>
        <section class="col-lg-12 connectedSortable"style="background-color:#ffffff">
            <div class="box box-solid">
                <section class="col-lg-12 connectedSortable pull-right">
                    <br>
                    <div class="box box-info">
                         <div class="box-body" style="padding: 30px;background-color:aliceblue">
                             {{Form::open(['route'=>'support-head.support-data', 'files'=>true])}}
                                 <div class='col-lg-6 pull-right'>
                                   {{ Form::label('support_code', 'Support Code') }}
                                   {{ Form::text('support_code', Input::old('support_code'),['class'=>'form-control','placeholder'=>'Enter Your Support code If Exists']) }}
                                 </div>
                                 <span class="text-muted ">If You Have A support code,Please Enter Existing code For Any Support Or Getting Your Previous Support Information.</span>
                                 <p>&nbsp;</p>
                                 <div>
                                     {{ Form::submit('Submit', array('class'=>'pull-right btn btn-success btn-sm','id'=>'button'))}}
                                 </div>
                             {{ Form::close() }}
                             <br>
                         </div>
                    </div>
                    <p>&nbsp;</p>
                    {{--New Entry--}}
                    <div class="box box-info">
                         <div class="box-body" style="padding: 30px;background-color:aliceblue">
                             <div class="help-text-top">
                                 <em style="color:midnightblue">Enter your support details below.If you report a problem, please remember to provide as much information that is relevant to the issue as possible. <span class="text-danger">  (*) </span>Indicates required field. Please do not skip these fields.</em>
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
                             {{ Form::close() }}
                         </div>
                    </div>
                </section>
            </div>
        </section>
    </div>

<!-- Modal  -->
 <div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

        </div>
      </div>
 </div>

@stop

