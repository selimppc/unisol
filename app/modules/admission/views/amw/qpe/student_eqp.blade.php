@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

<h4> Question Paper Evaluation for Subject and Applicant(s)</h4>

<div class="box">
    <div class="box-header">
    <p>
       <div class="col-xs-4">
           <b>Degree</b> :: {{$adm_question->relBatchAdmtestSubject->relBatch->relVDegree->title }}
       </div>
       <div class="col-xs-4">
           <b>Credit</b> : {{$adm_question->relBatchAdmtestSubject->relBatch->relVDegree->total_credit}}
       </div>
       <div class="col-xs-4">
           <b>Department</b> : {{$adm_question->relBatchAdmtestSubject->relBatch->relVDegree->dept_title}}
       </div>
       <div class="col-xs-4">
           <b>Duration</b> : {{$adm_question->relBatchAdmtestSubject->relBatch->relVDegree->duration}} Years
       </div>
       <div class="col-xs-4">
           <b>Year</b> : {{$adm_question->relBatchAdmtestSubject->relBatch->relYear->title}}
       </div>
       <div class="col-xs-4">
           <b>Semester</b> : {{$adm_question->relBatchAdmtestSubject->relBatch->relSemester->title}}
       </div>
       <div class="col-xs-4">
          <b>Subject Name</b> : {{$adm_question->relBatchAdmtestSubject->relAdmtestSubject->title}}
      </div>
      <div class="col-xs-4">
         <b>Total Marks</b> : {{$adm_question->total_marks}}
      </div>
    </p>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Applicant Name </th>
                <th>Status</th>
                <th>Marks</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($adm_question_evaluation as $values)
              <tr>
                <td> {{Applicant::ApplicantName($values->batch_applicant_id)}} </td>
                <td> TBD </td>
                <td> TBD </td>
                <td>
                    <a href="{{ URL::route('admission.amw.view-details-of-qpe', ['ba_id'=> $values->batch_applicant_id, 'question_id'=> $values->adm_question_id, 'q_items_id'=> $values->adm_question_items_id ]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal"><span class="fa fa-eye"></span> view </a>
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


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="z-index:1050">
      <div class="modal-content">

     </div>
    </div>
</div>
@stop