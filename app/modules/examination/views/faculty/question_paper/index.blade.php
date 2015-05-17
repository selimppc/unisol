@extends('layouts.layout')

@section('sidebar')
    @include('layouts._sidebar_faculty')
@stop

@section('content')
{{--<a class="pull-right btn btn-xs btn-primary" href="{{ URL::route('admission.faculty.admission-test')}}"> <i class="fa fa-arrow-circle-left"></i> Go Back </a>--}}
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
                                    {{--<th>Setter</th>--}}
                                    {{--<th>Evaluator</th>--}}
                                    <th>Examiner Role</th>
                                    <th>Action</th>
                                 </tr>
                      </thead>
                      <tbody>
                          @foreach($question_paper as $question)
                            <tr>
                                <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $question->id }}"></td>

                                <td>{{ $question->title }}</td>
                                <td>{{ date("d-m-Y", strtotime((isset( $question->deadline)) ?  $question->deadline : '') ) }}</td>
                                <td>{{ $question->relCourseConduct->relDegree->relDepartment->title }}</td>
                                <td>{{ $question->relExmExamList->relYear->title }}</td>
                                <td>{{ $question->relExmExamList->relSemester->title }}</td>

                                {{--<td> {{isset($question->relSUser->relUserProfile->id)? $question->relSUser->relUserProfile->first_name." ". $question->relSUser->relUserProfile->middle_name." ".$question->relSUser->relUserProfile->last_name :''}}--}}
                                    {{--<br> {{ isset($question->s_status) ? ucfirst($question->s_status) : '' }}--}}
                                    {{--<a href="{{ URL::route('faculty.assign-exm-faculty-setter', [ 'e_q_id'=>$question->id ]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Assign Faculty" href="#"> Assign </a>--}}
                                {{--</td>--}}

                                {{--<td> {{isset($question->relEUser->relUserProfile->id)? $question->relEUser->relUserProfile->first_name." ". $question->relEUser->relUserProfile->middle_name." ".$question->relEUser->relUserProfile->last_name :''}}--}}
                                    {{--<br> {{ isset($question->e_status) ? ucfirst($question->e_status) : '' }}--}}
                                    {{--<a href="{{ URL::route('faculty.assign-exm-faculty-evaluator', [ 'e_q_id'=>$question->id ]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Assign Faculty" href="#"> Assign </a>--}}
                                {{--</td>--}}
                                <td>

                                     @if( $question->s_faculty_user_id == $question->e_faculty_user_id )
                                           {{ "Both" }}
                                     @elseif( $question->s_faculty_user_id == Auth::user()->get()->id )
                                           {{ "Setter" }}
                                     @elseif( $question->e_faculty_user_id == Auth::user()->get()->id )
                                           {{ "Evaluator" }}
                                     @endif

                                </td>

                                <td>
                                     @if( $question->s_faculty_user_id == $question->e_faculty_user_id )
                                         <a href="{{ URL::route('faculty.exm-question-paper.view-exm-question-paper',['exm_question_id'=>$question->id]) }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal">VQP</a>
                                         <a href="{{ URL::route('faculty.examination-quest-paper-item.add-exm-quest-paper-item',['exm_question_id'=>$question->id]) }}" class="btn btn-info btn-xs " data-toggle="modal" data-target="#modal">AQ</a>
                                         <a href="{{ URL::route('faculty.exm-question-paper.view-exm-questions-items',['exm_question_id'=>$question->id]) }}" class="btn btn-primary btn-xs" >VQs</a>
                                         <a href="{{ URL::route('faculty.exm-question-paper.assign-exm-question-comment',['e_q_id'=>$question->id]) }}" class="btn bg-maroon btn-xs" data-toggle="modal" data-target="#modal" >Comments</a>
                                         <a href="{{ URL::route('faculty.exm-question-paper.evaluate',['exm_question_id'=>$question->id]) }}" class="btn bg-orange btn-xs" data-toggle="modal" data-target="#modal" >Evaluate</a>

                                     @elseif( $question->s_faculty_user_id == Auth::user()->get()->id )
                                           <a href="{{ URL::route('faculty.exm-question-paper.view-exm-question-paper',['exm_question_id'=>$question->id]) }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal">VQP</a>
                                           <a href="{{ URL::route('faculty.examination-quest-paper-item.add-exm-quest-paper-item',['exm_question_id'=>$question->id]) }}" class="btn btn-info btn-xs " data-toggle="modal" data-target="#modal">AQ</a>
                                           <a href="{{ URL::route('faculty.exm-question-paper.view-exm-questions-items',['exm_question_id'=>$question->id]) }}" class="btn btn-primary btn-xs" >VQs</a>
                                           <a href="{{ URL::route('faculty.exm-question-paper.assign-exm-question-comment',['e_q_id'=>$question->id]) }}" class="btn bg-maroon btn-xs" data-toggle="modal" data-target="#modal" >Comments</a>

                                     @elseif( $question->e_faculty_user_id == Auth::user()->get()->id )
                                           <a href="{{ URL::route('faculty.exm-question-paper.view-exm-question-paper',['exm_question_id'=>$question->id]) }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal">VQP</a>
                                           <a href="{{ URL::route('faculty.exm-question-paper.view-exm-questions-items',['exm_question_id'=>$question->id]) }}" class="btn btn-primary btn-xs" >VQs</a>
                                           <a href="{{ URL::route('faculty.exm-question-paper.assign-exm-question-comment',['e_q_id'=>$question->id]) }}" class="btn bg-maroon btn-xs" data-toggle="modal" data-target="#modal" >Comments</a>
                                           <a href="{{ URL::route('faculty.exm-question-paper.evaluate',['exm_question_id'=>$question->id]) }}" class="btn btn-xs bg-orange" data-toggle="modal" data-target="#modal" >Evaluate</a>

                                     @endif
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