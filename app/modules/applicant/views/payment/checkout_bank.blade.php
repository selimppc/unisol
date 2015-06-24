@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
 @section('sidebar')
   @include('layouts._sidebar_applicant')
 @stop
@section('content')
<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('admission.applicant.adm_checkout')}}"><b><i class="fa fa-arrow-circle-left"></i>Go Back</b></a>
<h3 class="box-title">Degree List</h3>
<div class="box box-solid ">
    <div class="box-tools pull-right">
        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>

    <div class="box box-info">
        <div class="box-header">

        </div>
        <div class="box-body">
            <div class="row">

                <div class="col-lg-12">
                    <table class="table  table-bordered">
                        <tbody>
                        <tr>
                            <th rowspan="70%" style="vertical-align: middle"><b style="font-size: medium">Degree Name</b></th>
                        </tr>
                        @if(isset($data))
                        @foreach($data as $value)
                        <tr>
                            <td class="col-lg-10">
                                <a href="{{ URL::route('admission.applicant.admission.test_details',
                                                       ['batch_id' => $value->id]) }}" class="btn-link" title="Degree,Subject & Exam Center Info For Admission" data-toggle="modal" data-target="#ATDModal">
                                    {{$value->relDegree->relDegreeLevel->code.''.$value->relDegree->relDegreeGroup->code.' In '.$value->relDegree->relDegreeProgram->code}}
                                </a>&nbsp;&nbsp;  Batch #:{{ $value->batch_number }}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{--<div class="box-footer clearfix">
            <a class="pull-right btn btn-xs btn-info" href="{{ URL::route('admission.applicant.add-degree' )}}" data-toggle="modal" data-target="#addDegreeModal"> Add more degree</a>
        </div>--}}
    </div>
</div>


<div class="box box-solid ">
    <div class="box-tools pull-right">
        <button class="btn btn-success btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-success btn-xs" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>

    <div class="box box-info">
        <div class="box-header">
            <h4 class="box-title">Application Fees Info</h4>
        </div>
        <div class="box-body">
            <div class="row">

                <div class="col-lg-12">
                    <table class="table  table-bordered">
                        <tr>
                            <th class="col-lg-6">Application Charge Per Degree</th>
                            <td>1000</td>
                        </tr>
                        <tr>
                            <th class="col-lg-6"><b>Total</b></th>
                            <td>3000</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="box-footer clearfix">
            <button class="pull-right btn btn-default" id="sendEmail">Edit <i class="fa fa-arrow-circle-right"></i></button>
        </div>
    </div>
</div>
{{------------------------------------ Bank Information --------------------------------------------------------------------------}}
<div class="box box-solid ">

   <div class="box box-info">
        <div class="box-header">
            <h4 class="box-title">Bank Information</h4>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-12">
                    <div  class="col-lg-6">
                    {{Form::open(array('url'=>'', 'class'=>'form-horizontal','files'=>true))}}
                        <div class='form-group'>
                             <div>{{ Form::label('name', 'Bank Name') }}<span class="text-danger">*</span>
                             {{ Form::text('name',Input::old('name') ,['class'=>'form-control input-sm','required'])}}</div>
                        </div>
                        <div class='form-group'>
                             <div>{{ Form::label('deposit_number', 'Deposit Number') }}<span class="text-danger">*</span>
                             {{ Form::text('deposit_number',Input::old('deposit_number') ,['class'=>'form-control input-sm','required'])}}</div>
                        </div>
                        <div class='form-group'>
                             <div>{{ Form::label('deposit_file', 'Deposit File') }}<span class="text-danger">*</span>
                             {{ Form::file('deposit_file',Input::old('deposit_file') ,['class'=>'form-control input-sm','required'])}}</div>
                        </div>
                        <div class='form-group'>
                             {{ Form::submit('Submit', array('class'=>'pull-right btn btn-primary')) }}
                             <a  href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
                        </div>
                    {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
   </div>
</div><p>&nbsp;</p><p>&nbsp;</p>
@stop
