@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<div class="modal-dialog" style="z-index:1050">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h4> Upload CSV Data into Mysql Table (Chart of Accounts) </h4>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body" >

    {{Form::open(['route'=> ['upload-csv-data'], 'method' => 'patch', 'role' => 'form', 'files' => true,])}}
            <div class='form-group'>
               {{ Form::label('file', 'Upload Your File') }}
               {{ Form::file('file', Input::old('file'),['class'=>'form-control', 'required']) }}
            </div>

            {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
            <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
    {{ Form::close() }}
    <p>&nbsp;</p>

</div>
</div>
</div>
</div>

@stop