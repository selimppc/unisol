@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('admission.amw.admission-test-home')}}"> <i class="fa fa-arrow-circle-left"></i> Go Back</a>

    <h3> Question paper </h3>
    {{ Form::open(array('url' => 'admission/amw/batch-delete-question-paper')) }}
    <div class="row">
        <div class="box box-solid ">
            <div class="box-body">
                <div class="row">
                    <div class="pull-right col-sm-4">
                        <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('admission/amw/admission/create-admtest-question-paper',['bats_id'=>$bats_id])}}" data-toggle="modal" data-target="#modal" >Create Question Paper</a>
                    </div>
                    <div class="col-sm-6">
                        <strong> Batch# </strong> {{ isset($batch->relBatch->batch_number) ? $batch->relBatch->batch_number : '' }} </br>
                        <strong> Degree Name: </strong> {{isset( $batch->relBatch->relDegree->relDegreeLevel->code) ?$batch->relBatch->relDegree->relDegreeLevel->code : '' }}{{isset($batch->relBatch->relDegree->relDegreeGroup->code) ? $batch->relBatch->relDegree->relDegreeGroup->code : '' }} In {{isset($batch->relBatch->relDegree->relDegreeProgram->code) ? $batch->relBatch->relDegree->relDegreeProgram->code : '' }} , {{isset($batch->relBatch->relSemester->title)? $batch->relBatch->relSemester->title : '' }} - {{isset( $batch->relBatch->relYear->title) ? $batch->relBatch->relYear->title :'' }}
                    </div>
                </div>
                <table id="example" class="table table-striped  table-bordered"  >
                    <thead>
                    {{ Form::submit('Delete Items', array('class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'))}}
                    <br>
                    <tr>
                        <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                        <th>Title</th>
                        <th>Deadline</th>
                        <th>Subject</th>
                        <th>Assigned</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($adm_question))
                    @foreach($adm_question as $values)
                        <tr>
                            <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $values->id }}"></td>
                            <td> {{isset( $values->title)?  $values->title :''}} </td>
                            <td>{{date("d-m-Y", strtotime((isset( $values->deadline)) ?  $values->deadline : '') ) }}</td>
                            <td>{{isset( $values->relBatchAdmtestSubject->relAdmtestSubject->id) ?  $values->relBatchAdmtestSubject->relAdmtestSubject->id: ''}}</td>
                            <td> {{isset($values->s_faculty_user_id)? User::FullName($values->s_faculty_user_id) :''}} </td>
                            <td> {{isset($values->status) ? $values->status : '' }} </td>
                            <td>
                               @if( $values->status == "requested" )
                                        <a href="{{ URL::route('admission.amw.view-admtest-question-paper', [ 'id'=>$values->id ]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#"> View </a>
                                        <a href="{{ URL::route('admission.amw.edit-admtest-question-paper', [ 'id'=>$values->id ]) }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Edit" href="#"> Edit </a>
                                        <a href="{{ URL::route('admission.amw.view-questions-by-paper', [ 'q_id'=>$values->id ]) }}" class="btn btn-default btn-xs" title="View Questions" > VQ(s)</a>
                                        <a href="{{ URL::route('admission.amw.assign-faculty-by-question', [ 'q_id'=>$values->id ]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Assign Faculty" href="#"> AF </a>

                               @elseif( $values->status == "assigned" )
                                        <a href="{{ URL::route('admission.amw.view-admtest-question-paper', [ 'id'=>$values->id ]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#"> View </a>
                                        <a href="{{ URL::route('admission.amw.edit-admtest-question-paper', [ 'id'=>$values->id ]) }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Edit" href="#"> Edit </a>
                                        <a href="{{ URL::route('admission.amw.view-questions-by-paper', [ 'q_id'=>$values->id ]) }}" class="btn btn-default btn-xs" title="View Questions" > VQ(s)</a>
                                        <a href="{{ URL::route('admission.amw.re-assign-faculty', [ 'q_id'=>$values->id ]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Assign Faculty" href="#"> AAF </a>
                               @else
                                        <a href="{{ URL::route('admission.amw.view-admtest-question-paper', [ 'id'=>$values->id ]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#"> View </a>
                                        <a href="{{ URL::route('admission.amw.edit-admtest-question-paper', [ 'id'=>$values->id ]) }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Edit" href="#"> Edit </a>
                                        <a href="{{ URL::route('admission.amw.view-questions-by-paper', [ 'q_id'=>$values->id ]) }}" class="btn btn-default btn-xs" title="View Questions" > VQ(s)</a>
                                        <a href="{{ URL::route('admission.amw.assign-faculty-by-question', [ 'q_id'=>$values->id ]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Assign Faculty" href="#"> AF </a>
                               @endif
                            </td>
                        </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
                {{form::close() }}

                {{$adm_question->links()}}

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="z-index:1050">
            <div class="modal-content">
            </div>
        </div>
    </div>

@stop