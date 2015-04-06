@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

<h4> Admission Test Question Paper Evaluation</h4>

<div class="box">
    <div class="box-header">
    <p>
        <div class="col-xs-4">
            <b>Degree</b> :: {{$data->relBatch->relDegree->relDegreeProgram->code}}
                    {{$data->relBatch->relDegree->relDegreeGroup->code}} in {{$data->relBatch->relDegree->relDepartment->title}} -
                    {{ $data->relBatch->relSemester->title }} - {{ $data->relBatch->relYear->title }}
        </div>
        <div class="col-xs-4">
            <b>Credit</b> : {{$data->relBatch->relDegree->total_credit}}
        </div>
        <div class="col-xs-4">
            <b>Department</b> : {{$data->relBatch->relDegree->relDepartment->title}}
        </div>
        <div class="col-xs-4">
            <b>Duration</b> : {{$data->relBatch->relDegree->duration}} Years
        </div>
        <div class="col-xs-4">
            <b>Year</b> : {{$data->relBatch->relYear->title}}
        </div>
        <div class="col-xs-4">
            <b>Semester</b> : {{$data->relBatch->relSemester->title}}
        </div>
    </p>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Subject </th>
                <th>Question Setter</th>
                <th>Question Evaluator</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($adm_question as $values)
            <tr>
                <td> {{$values->relBatchAdmtestSubject->relAdmtestSubject->title}}</td>
                <td> {{isset($values->s_faculty_user_id) ? User::Fullname($values->s_faculty_user_id):''}}</td>
                <td> {{isset($values->e_faculty_user_id) ? User::Fullname($values->e_faculty_user_id):'' }}</td>
                <td> {{$values->status}}</td>
                <td>
                    <a href="{{ URL::route('admission.amw.student-list-of-qpe', ['adm_question_id'=> $values->id ]) }}" class="btn btn-xs btn-info"><span class="fa fa-eye"></span> view</a>
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>
    </div><!-- /.box-body -->
    <p style="padding: 1%">
        <a href="{{ URL::route('admission.amw.admission-test-home') }}" class="btn btn-xs bg-black"></span> Back to Admission Test</a>
    </p>

</div><!-- /.box -->

@stop