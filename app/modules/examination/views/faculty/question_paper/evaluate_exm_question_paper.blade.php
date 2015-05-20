@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_faculty')
@stop

@section('content')
    <!-- START CUSTOM TABS -->
            <h2 class="page-header">Evaluate Exm Question Paper </h2>
            <div class="row">
                <div class="col-md-12">
                <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Evaluation  </a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    Settings  <span class="caret"></span>
                                </a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Blank </a></li>

                                    </ul>
                            </li>
                            <li class="pull-right" class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                                <ul class="dropdown-menu">
                                    <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Blank </a></li>

                                </ul>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" style="margin-left: 10px" id="tab_1">

                                        </br>

                                  <p><strong> Degree: &nbsp;&nbsp; </strong>
                                     {{ $exm_data->relCourseConduct->relDegree->relDegreeLevel->code.''
                                           .$exm_data->relCourseConduct->relDegree->relDegreeGroup->code.' In '
                                           .$exm_data->relCourseConduct->relDegree->relDegreeProgram->title.' , '
                                           .$exm_data->relCourseConduct->relSemester->title.' , '
                                           .$exm_data->relCourseConduct->relYear->title
                                       }}
                                  </p>
                                  <p><strong> Course: &nbsp;&nbsp; </strong>{{ $exm_data->relCourseConduct->relCourse->course_code }}</p>
                                  <p><strong> Subject: &nbsp;&nbsp; </strong>{{ $exm_data->relCourseConduct->relCourse->relSubject->title }}</p>
                                  <p><strong>Total Marks: &nbsp;&nbsp; </strong>{{ $exm_data->total_marks }}</p>
                                  <p><strong> Overall Status: &nbsp;&nbsp;</strong>{{ ucfirst($exm_data->status) }}</p>
                                     OR <a href="#" class="btn bg-info btn-ls">Let AMW know that Evaluation Done</a>

                                <br>

                                <div class="box-body table-responsive">
                                      {{--{{ Form::open(array('url' => 'admission/faculty/admission-test/evaluationBatchDelete')) }}--}}
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                        <th>Marks</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
{{--                                                @if(!isset($evaluation_exm_qp))--}}
                                                    @foreach($evaluation_exm_qp as $evaluation)

                                                        <tr>
                                                        <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $evaluation['id'] }}"></td>
                                                            <td> {{ $evaluation->relStudentUser->relUserProfile->first_name.' '.$evaluation->relStudentUser->relUserProfile->middle_name.' '.$evaluation->relStudentUser->relUserProfile->last_name }} </td>
                                                            <td> {{ $evaluation->relExmQuestion->status }} </td>
                                                            <td> {{ $evaluation->ev_marks }}</td>

                                                            <td width="140">
                                                                <a href="{{ URL::route('faculty.exm-question-paper.evaluate-exm-questions-items',['e_q_id'=>$evaluation->exm_question_id ,'no_q'=>0 ]) }}" class="btn bg-orange btn-xs " >Evaluate</a>
                                                            {{--,'evaluation_id'=>$evaluation->id--}}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                {{--@endif--}}
                                                </tbody>
                                            </table>
                                      {{ Form::close() }}
                                </div>
                            </div><!-- /.tab-pane -->
                        </div><!-- /.tab-content -->
                    </div><!-- nav-tabs-custom -->
                </div><!-- /.col -->
            </div> <!-- /.row -->
            <!-- END CUSTOM TABS -->

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="z-index:1050">
          <div class="modal-content">

          </div>
    </div>
</div>

@stop