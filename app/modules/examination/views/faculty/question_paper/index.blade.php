@extends('layouts.layout')

@section('sidebar')
    @include('layouts._sidebar_faculty')
@stop

@section('content')
<a class="pull-right btn btn-xs btn-primary" href="{{ URL::route('admission.faculty.admission-test')}}"> <i class="fa fa-arrow-circle-left"></i> Go Back </a>
    <h2> Question Paper</h2>

     {{--{{ Form::open(array('url' => 'admission/faculty/admission-test/qpBatchDelete')) }}--}}
                    <table id="example" class="table table-striped  table-bordered"  >
                          <thead>
                               {{ Form::submit('Delete Items', array('class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'))}}

                                 <br>
                                 <tr>
                                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                    <th>Title</th>
                                    <th>Deadline</th>
                                    <th>Dept</th>
                                    <th>Year</th>
                                    <th>Term</th>
                                    <th>Is Examiner</th>
                                    <th>Action</th>
                                 </tr>
                      </thead>
                      <tbody>
                          @foreach($question_paper as $question)
                            <tr>
                                <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $question->id }}"></td>

                                <td>{{ $question->title }}</td>
                                <td>{{ $question->deadline }}</td>
                                <td>{{ $question->relCourseConduct->relDegree->relDepartment->title }}</td>
                                <td>{{ $question->relExmExamList->relYear->title }}</td>
                                <td>{{ $question->relExmExamList->relSemester->title }}</td>
                                <td>
                                    @if($examiner_type->user_id != Auth::user()->get()->id)
                                                 {{ "No" }}
                                    @else
                                                 {{ "Yes" }}
                                    @endif
                                </td>
                                <td>
                                     {{--@if( $examiner_type == 'both' )--}}
                                           {{--<a href="{{ URL::route('admission.faculty.question-papers.view-question-paper',['question_id'=>$question->id]) }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal">VQP</a>--}}
                                           {{--<a href="{{ URL::route('admission.faculty.question-papers.view-questions-items',['question_id'=>$question->id]) }}" class="btn btn-primary btn-xs" >VQs</a>--}}
                                           {{--<a href="{{ URL::route('admission.faculty.question-papers.add-question-paper-item',['question_id'=>$question->id]) }}" class="btn btn-info btn-xs " data-toggle="modal" data-target="#modal">AQ</a>--}}
                                           {{--<a href="{{ URL::route('admission.faculty.question-papers.view-assign-to-question-paper',['question_id'=>$question->id]) }}" class="btn bg-purple btn-xs" data-toggle="modal" data-target="#modal" >Comments</a>--}}
                                           {{--<a href="{{ URL::route('admission.faculty.question-papers.evaluate-questions',['adm_question_id'=>$values->id]) }}" class="btn bg-navy btn-xs " >Evaluate</a>--}}
                                     {{--@elseif( $examiner_type == 'question-setter' )--}}
                                           {{--<a href="{{ URL::route('admission.faculty.question-papers.view-question-paper',['question_id'=>$question->id]) }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal">VQP</a>--}}
                                           {{--<a href="{{ URL::route('admission.faculty.question-papers.add-question-paper-item',['question_id'=>$question->id]) }}" class="btn btn-info btn-xs " data-toggle="modal" data-target="#modal">AQ</a>--}}
                                           {{--<a href="{{ URL::route('admission.faculty.question-papers.view-questions-items',['question_id'=>$question->id]) }}" class="btn btn-primary btn-xs" >VQs</a>--}}
                                           {{--<a href="{{ URL::route('admission.faculty.question-papers.view-assign-to-question-paper',['question_id'=>$question->id]) }}" class="btn bg-purple btn-xs" data-toggle="modal" data-target="#modal" >Comments</a>--}}

                                     {{--@else--}}
                                           {{--<a href="{{ URL::route('admission.faculty.question-papers.evaluate-questions',['adm_question_id'=>$values->id]) }}" class="btn bg-navy btn-xs " >Evaluate</a>--}}
                                           {{--<a href="{{ URL::route('admission.faculty.question-papers.view-assign-to-question-paper',['q_id'=>$values->id]) }}" class="btn bg-purple btn-xs" data-toggle="modal" data-target="#modal" >Comments</a>--}}
                                     {{--@endif--}}
                                </td>
                            </tr>
                          @endforeach
                      </tbody>
                    </table>
     {{--{{ Form::close() }}--}}


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="z-index:1050">
          <div class="modal-content">

          </div>
    </div>
</div>

@stop