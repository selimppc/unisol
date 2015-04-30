@extends('layouts.layout')
@section('sidebar')
    @include('academic::_sidebar')
@stop
@section('content')
<h2 class="page-header text-purple tab-text-margin">Assign of {{isset($item_title->title) ? $item_title->title : ''}} to Student</h2>
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Student List to Assign Question</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Settings  <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> </a></li>
                    </ul>
                </li>
                <li class="pull-right" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                    <ul class="dropdown-menu">
                        <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>
                    </ul>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="box-body table-responsive ">
                        <div>&nbsp;</div>
                        {{ Form::open(array('url' => 'batch/assign')) }}
                        {{--{{ Form::hidden('acm_academic_id',$acm->id, ['class'=>'form-control acm_academic_id'])}}--}}
                        <div class='form-group' style="width: 300px">
                            {{ Form::label('exam_question', 'Examination Question:') }}
                            {{ Form::select('exam_question',$exam_questions,Input::old('exam_question'),['class'=>'form-control','required']) }}
                        </div>
                        <p style="color: cornflowerblue">Help Text: If Question is not Prepared Then Tell Faculty to Create Question Paper.</p>
                        <table id="example" class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="checkbox" >
                                </th>
                                <th>Name</th>
                                <th>Semester</th>
                                <th>Year </th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($std_assign))
                            @foreach($std_assign as $key => $value)
                            <tr>
                                <td><input type="checkbox" name="chk[]" class="myCheckbox" value="{{$value->id}}">
                                    {{--{{ Form::text('acm_academic_assign_stu_id',$value->id , ['class'=>'acm_academic_assign_stu_id'])}}--}}
                                </td>
                                <td>{{isset($value->relUser->relUserProfile->last_name) ? $value->relUser->relUserProfile->last_name : ''}}</td>
                                <td>{{isset($value->relAcmAcademic->relCourseConduct->relSemester->title) ? $value->relAcmAcademic->relCourseConduct->relSemester->title : ''}}</td>
                                <td>{{isset($value->relAcmAcademic->relCourseConduct->relYear->title) ? $value->relAcmAcademic->relCourseConduct->relYear->title : ''}}</td>
                                <td>{{isset($value->relAcmAcademic->relCourseConduct->relCourse->relSubject->relDepartment->title) ? $value->relAcmAcademic->relCourseConduct->relCourse->relSubject->relDepartment->title : ''}}</td>
                                <td>{{isset($value->status) ? $value->status : ''}}</td>
                                <td>
                                    <a href="{{URL::route('item.comments',['acm_assign_stu_id'=>$value->id,'acm_id'=>$value->acm_academic_id,'student_user_id'=>$value->student_user_id])}}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#commentsModal"> Comments </a>

                                    <a href="{{URL::route('item.evaluation',['acm_assign_stu_id'=>$value->id,'acm_id'=>$value->acm_academic_id,'student_user_id'=>$value->student_user_id])}}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#evaluationModal"> Evaluation </a>

                                    @if($value->status == 'A')
                                        {{ Form::submit('Revoke', ['name' => 'revoke', 'class' => 'btn btn-danger btn-xs']) }}
                                    @else
                                        {{ Form::submit('Assign', ['name' => 'assign', 'class' => 'btn btn-success btn-xs']) }}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                        <div class="button" style="margin-top: 10px">
                            <a href="{{URL::previous()}}" class="btn btn-info btn-xs ">Back</a>
                            {{ Form::submit('Do Assign', ['name' => 'assign', 'class' => 'btn btn-success btn-xs']) }}
                            {{ Form::submit('Do Revoke', ['name' => 'revoke','class' => 'btn btn-danger btn-xs']) }}
                        </div>
                        {{ Form::close() }}
                        <div>&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--Assign comments modal--}}
<div class="modal fade" id="commentsModal" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="evaluationModal" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@stop

