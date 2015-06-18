@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-purple ">Billing Details</h3>
        </div><!-- ./col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-12">
    <div class="box-body table-responsive ">

        <table class="table table-bordered table-hover table-striped">
            <tr>{{$student_info->first_name}}
                <td>Name:</td>
                <td>{{isset($student_info->first_name) ? $student_info->first_name:''}} {{isset($student_info->last_name) ? $student_info->last_name:''}}
                </td>
            </tr>
            <tr>
                <td>Department:</td>
                <td>
                    {{isset($student_info->department_id) ? $student_info->department_id :''}}
                </td>
            </tr>
            <tr>
                <td>Degree:</td>
                <td>
                    {{isset($student_info->degree_id) ? $student_info->degree_id :''}}
                </td>
            </tr>
            <tr>
                <td>Batch:</td>
                <td>
                    {{isset($student_info->batch_id) ? $student_info->batch_id :''}}
                </td>
            </tr>
            <tr>
                <td>User Type:</td>
                <td>
                    Student
                </td>
            </tr>
        </table>
    </div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>$applicant_info
            <div>&nbsp;</div>
            <div class="box-body table-responsive ">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <th>Student</th>
                    <th>Schedule</th>
                    <th>Amount</th>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
    </div>
    </div>
    </div>
@stop



