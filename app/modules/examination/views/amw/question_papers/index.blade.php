@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
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
                    @if(isset($exm_question))
                        @foreach($exm_question as $values)
                            <tr>
                                <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $values->id }}"></td>

                                <td> {{isset( $values->title)?  $values->title :''}} </td>

                                <td>{{date("d-m-Y", strtotime((isset( $values->deadline)) ?  $values->deadline : '') ) }}</td>

                                <td>{{isset( $values->relCourseConduct->relCourse->relSubject->title) ?  $values->relCourseConduct->relCourse->relSubject->title: ''}}</td>

                                <td> {{isset($values->relSUser->relUserProfile->id)? $values->relSUser->relUserProfile->first_name." ". $values->relSUser->relUserProfile->middle_name." ".$values->relSUser->relUserProfile->last_name :''}}

                                    <br> ({{ isset($values->s_status) ?ucfirst($values->s_status) : '' }})
                                    @if($values->s_status == 'assigned')
                                        <a href="{{ URL::route('amw.assign-setter', [ 'q_id'=>$values->id,'exm_exam_list_id'=>$values->exm_exam_list_id ]) }}" class="btn bg-teal btn-xs" data-toggle="modal" data-target="#questions" data-placement="left" title="Assign Faculty" ><b style="color: #000000">Re-Assign</b></a>
                                    @else
                                        <a href="{{ URL::route('amw.assign-setter', [ 'q_id'=>$values->id,'exm_exam_list_id'=>$values->exm_exam_list_id ]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#questions" data-placement="left" title="Assign Faculty"> Assign </a>
                                    @endif
                                </td>

                                <td> {{isset($values->relEUser->relUserProfile->id)? $values->relEUser->relUserProfile->first_name." ". $values->relEUser->relUserProfile->middle_name." ".$values->relEUser->relUserProfile->last_name :''}}
                                    <br> ({{ isset($values->e_status) ? ucfirst($values->e_status) : '' }})
                                    @if($values->s_status == 'assigned')
                                       <a href="{{ URL::route('amw.assign-evaluator', [ 'q_id'=>$values->id ,'exm_exam_list_id'=>$values->exm_exam_list_id]) }}" class="btn  bg-teal btn-xs" data-toggle="modal" data-target="#questions" data-placement="left" title="Assign Faculty" href="#"><b style="color: #000000">Re-Assign</b></a>
                                    @else
                                       <a href="{{ URL::route('amw.assign-evaluator', [ 'q_id'=>$values->id ,'exm_exam_list_id'=>$values->exm_exam_list_id]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#questions" data-placement="left" title="Assign Faculty" href="#"> Assign </a>
                                    @endif

                                </td>

                                <td> {{isset($values->status) ? ucfirst($values->status) : '' }} </td>

                                <td>
                                   @if( strtolower($values->status) == "close" )
                                            <a href="{{ URL::route('amw.view-question-paper', [ 'id'=>$values->id ]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#questions" data-placement="left" title="Show" href="#"> View </a>
                                            <a href="{{ URL::route('amw.edit-question', [ 'id'=>$values->id,'exm_exam_list_id'=>$values->exm_exam_list_id,'course_conduct_id'=>$values->course_conduct_id ]) }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#questions" data-placement="left" title="Edit" href="#"> Edit </a>
                                            <a href="{{ URL::route('amw.question-list', [ 'q_id'=>$values->id ]) }}" class="btn btn-default btn-xs" title="View Questions" > VQ(s)</a>
                                   @else
                                            <a href="{{ URL::route('amw.view-question-paper', [ 'id'=>$values->id ]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#questions" data-placement="left" title="Show" href="#"> View </a>
                                            <a href="{{ URL::route('amw.edit-question', [ 'id'=>$values->id ,'exm_exam_list_id'=>$values->exm_exam_list_id,'course_conduct_id'=>$values->course_conduct_id]) }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#questions" data-placement="left" title="Edit" href="#"> Edit </a>
                                            <a href="{{ URL::route('amw.question-list', [ 'exm_question_id'=>$values->id ]) }}" class="btn btn-default btn-xs" title="View Questions" > VQ(s)</a>
                                   @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
             </table>
             <a class="pull-right btn btn-xs btn-info" href="{{ URL::route('amw.exam-list') }}"  style="color: #ffffff" title="Back to Exam List"><b>Back</b></a>
             <br>
          {{form::close() }}
           {{$exm_question->links()}}

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