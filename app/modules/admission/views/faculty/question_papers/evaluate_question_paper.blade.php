@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_faculty')
@stop

@section('content')
    <!-- START CUSTOM TABS -->
            <h2 class="page-header">Evaluate Question Paper </h2>
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
                <div class="tab-pane active" id="tab_1">
                    {{--<button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addExtraCurricular" >--}}
                        {{--Blank--}}
                    {{--</button><br>--}}

                    <br>

                   <strong> Degree: </strong>{{ $data->relBatchAdmtestSubject->relBatch->relDegree->relDegreeProgram->code.''
                                                .$data->relBatchAdmtestSubject->relBatch->relDegree->relDegreeGroup->code.' in '
                                                 .$data->relBatchAdmtestSubject->relBatch->relDegree->relDepartment->title.' , '
                                                 .$data->relBatchAdmtestSubject->relBatch->relSemester->title.' , '
                                                  .$data->relBatchAdmtestSubject->relBatch->relYear->title }}  <br>

                   <strong> Subject: </strong>{{ $data->relBatchAdmtestSubject->relAdmtestSubject->title }}  <br>
                   <strong> Total Marks: </strong>{{ $data->total_marks }}  <br>
                   <strong> Overall Status: </strong>{{ $data->status }}  <br>

                    <div class="box-body table-responsive">
                          {{ Form::open(array('url' => 'admission/faculty/admission-test/evaluationBatchDelete')) }}
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Marks</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($evaluation_qp as $evaluation)

                                        <tr>
                                            <td> {{ $evaluation->marks  }} </td>
                                            <td> {{ $evaluation->marks }} </td>
                                            <td> {{ $evaluation->marks  }}  </td>


                                            <td width="140">
                                                <a href="{{ URL::route('admission.faculty.question-papers.evaluate-questions-items',['id'=>$evaluation->id]) }}" class="btn bg-orange btn-xs " >Evaluate</a>

{{--                                                <a href="{{ URL::route('admission.faculty.question-papers.re-evaluate-questions-items',['id'=>$evaluation->id]) }}" class="btn bg-purple btn-xs " >Re-Evaluate</a>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                          {{ Form::close()  }}
                    </div><!-- /.box -->
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
