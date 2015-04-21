@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_faculty')
@stop
@section('content')
<a class="pull-right btn btn-xs btn-primary" href="{{ URL::route('admission.faculty.admission-test')}}"> <i class="fa fa-arrow-circle-left"></i> Go Back </a>
    <h2> Question Paper</h2>

    <div class="row">
          <div class="col-sm-12">
                <h4> <strong> Degree : </strong>{{ Degree::findOrFail($degree_id)->relDegreeLevel->code.'
                                                   '.Degree::findOrFail($degree_id)->relDegreeGroup->code.' in
                                                   '.$degree_data->relDegreeProgram->code.',
                                                   '.Semester::findOrFail($semester_id)->title.',
                                                   '.Year::findOrFail($year_id)->title }} </h4>
          </div>
    </div>

     {{ Form::open(array('url' => 'admission/faculty/admission-test/qpBatchDelete')) }}
                    <table id="example" class="table table-striped  table-bordered"  >
                          <thead>
                               {{ Form::submit('Delete Items', array('class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'))}}

                                 <br>
                                 <tr>
                                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                    <th>Title</th>
                                    <th>Deadline</th>
                                    <th>Subject</th>
                                    <th>Dept</th>
                                    <th>Year</th>
                                    <th>Term</th>
                                    <th>Is Examiner</th>
                                    <th>Action</th>
                                 </tr>
                      </thead>
                      <tbody>
                          @foreach($ba_subject as $values)
                          	{{--{{ $values->relBatch->relBatchAdmtestSubject }}--}}
                          	@foreach($values->relBatch->relBatchAdmtestSubject as $qt)
                          		{{--{{$qt->rel_adm_question}}--}}
                          		@foreach($qt->rel_adm_question as $question)

                                    <tr>
                                        <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $values['id'] }}"></td>

                                        <td>{{ $question->title }}</td>
                                        <td>{{ $question->deadline }}</td>
                                        <td>{{ $qt->relAdmtestSubject->title }}</td>
                                        <td>{{ $qt->relBatch->relDegree->relDepartment->title }}</td>
                                        <td>{{ $qt->relBatch->relYear->title }}</td>
                                        <td>{{ $qt->relBatch->relSemester->title }}</td>
                                        <td>{{ $values->type }}</td>
                                        <td>
                                             @if( $values->type == 'both' )
                                                   <a href="{{ URL::route('admission.faculty.question-papers.view-question-paper',['id'=>$values->id]) }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal">VQP</a>
                                                   <a href="{{ URL::route('admission.faculty.question-papers.view-questions-items',['id'=>$values->id]) }}" class="btn btn-primary btn-xs" >VQs</a>
                                                   <a href="{{ URL::route('admission.faculty.question-papers.view-assign-to-question-paper',['q_id'=>$values->id]) }}" class="btn bg-purple btn-xs" data-toggle="modal" data-target="#modal" >Comments</a>
                                             @elseif( $values->type == 'question-setter' )
                                                   <a href="{{ URL::route('admission.faculty.question-papers.view-question-paper',['id'=>$values->id]) }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal">VQP</a>
                                                   <a href="{{ URL::route('admission.faculty.question-papers.add-question-paper-item',['qid'=>$values->id]) }}" class="btn btn-info btn-xs " data-toggle="modal" data-target="#modal">AQ</a>
                                                   <a href="{{ URL::route('admission.faculty.question-papers.view-questions-items',['id'=>$values->id]) }}" class="btn btn-primary btn-xs" >VQs</a>
                                                   <a href="{{ URL::route('admission.faculty.question-papers.view-assign-to-question-paper',['q_id'=>$values->id]) }}" class="btn bg-purple btn-xs" data-toggle="modal" data-target="#modal" >Comments</a>

                                             @else
                                                   <a href="{{ URL::route('admission.faculty.question-papers.evaluate-questions',['adm_question_id'=>$values->id]) }}" class="btn bg-navy btn-xs " >Evaluate</a>
                                                   <a href="{{ URL::route('admission.faculty.question-papers.view-assign-to-question-paper',['q_id'=>$values->id]) }}" class="btn bg-purple btn-xs" data-toggle="modal" data-target="#modal" >Comments</a>
                                             @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                          @endforeach
                      </tbody>
                    </table>
     {{ Form::close() }}


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="z-index:1050">
          <div class="modal-content">

          </div>
    </div>
</div>

@stop