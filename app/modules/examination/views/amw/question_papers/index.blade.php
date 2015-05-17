@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

<a class="pull-right btn btn-sm btn-info" href="{{URL::route('amw.question-papers.create',['exm_exam_list_id'=>$exm_exam_list_id,'course_conduct_id'=>$course_conduct_id])}}" data-toggle="modal" data-target="#questions" >+ Add Question Paper</a>
<h3>Examination :Question Papers</h3>

<div class="row">
   <div class="col-md-12 ">
      <div class="box box-solid">
          {{ Form::open(array('url' => 'examination/amw/batchDelete')) }}
             <table id="example" class="table table-striped  table-bordered">
                <thead>
                   {{ Form::submit('Delete Items', array('class'=>'btn btn-xs btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                       <br>
                       <tr>
                          <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                          <th>Title</th>
                          <th>Deadline</th>
                          <th>Subject</th>
                          <th>Setter</th>
                          <th>Evaluator</th>
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
                                <td>{{isset( $values->relBatchAdmtestSubject->relAdmtestSubject->title) ?  $values->relBatchAdmtestSubject->relAdmtestSubject->title: ''}}</td>
                                <td> {{isset($values->relSUser->relUserProfile->id)? $values->relSUser->relUserProfile->first_name." ". $values->relSUser->relUserProfile->middle_name." ".$values->relSUser->relUserProfile->last_name :''}}
                                    <br> {{ isset($values->s_status) ? ucfirst($values->s_status) : '' }}
                                    <a href="{{ URL::route('admission.amw.assign-faculty-setter', [ 'q_id'=>$values->id ]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Assign Faculty" href="#"> Assign </a>
                                </td>
                                <td> {{isset($values->relEUser->relUserProfile->id)? $values->relEUser->relUserProfile->first_name." ". $values->relEUser->relUserProfile->middle_name." ".$values->relEUser->relUserProfile->last_name :''}}
                                    <br> {{ isset($values->e_status) ? ucfirst($values->e_status) : '' }}
                                    <a href="{{ URL::route('admission.amw.assign-faculty-evaluator', [ 'q_id'=>$values->id ]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Assign Faculty" href="#"> Assign </a>
                                </td>
                                <td> {{isset($values->status) ? ucfirst($values->status) : '' }} </td>
                                <td>
                                   @if( strtolower($values->status) == "close" )
                                            <a href="{{ URL::route('admission.amw.view-admtest-question-paper', [ 'id'=>$values->id ]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#"> View </a>
                                            <a href="{{ URL::route('admission.amw.edit-admtest-question-paper', [ 'id'=>$values->id ]) }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Edit" href="#"> Edit </a>
                                            <a href="{{ URL::route('admission.amw.view-questions-by-paper', [ 'q_id'=>$values->id ]) }}" class="btn btn-default btn-xs" title="View Questions" > VQ(s)</a>
                                   @else
                                            <a href="{{ URL::route('admission.amw.view-admtest-question-paper', [ 'id'=>$values->id ]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#"> View </a>
                                            <a href="{{ URL::route('admission.amw.edit-admtest-question-paper', [ 'id'=>$values->id ]) }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Edit" href="#"> Edit </a>
                                            <a href="{{ URL::route('admission.amw.view-questions-by-paper', [ 'q_id'=>$values->id ]) }}" class="btn btn-default btn-xs" title="View Questions" > VQ(s)</a>
                                            {{--<a href="{{ URL::route('admission.amw.re-assign-faculty', [ 'q_id'=>$values->id ]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Assign Faculty" href="#"> RAssign </a>--}}

                                   @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
             </table>
          {{form::close() }}

          <p>&nbsp;</p>
      </div>
   </div>
</div>

<!-- Modal  -->
 <div class="modal fade" id="questions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="z-index:1050">
        <div class="modal-content">

        </div>
      </div>
 </div>

@stop