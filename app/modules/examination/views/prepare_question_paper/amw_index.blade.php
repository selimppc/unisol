@extends('layouts.master')

@section('sidebar')
    @include('examination::prepare_question_paper._sidebar')
@stop

@section('content')
        <h1>Welcome to Prepare Question paper : AMW </h1> <br>


                    {{ Form::open(array('url' => 'prepare_question_paper/batchDelete')) }}

                        <table id="example" class="table table-striped  table-bordered"  >
                                    <thead>

                                          <div class="btn-group" style="margin-right: 10px">
                                                                <button type="button" class="btn btn-default" data-toggle="modal"
                                                                          data-target="#CreateModal">
                                                                            Create Question paper
                                                                </button>
                                          </div>

                                          {{--page content start from here--}}
                                         <br>
                                              {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                                         <br>


                                        <tr>
                                            <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                            <th>Title</th>
                                            <th>Deadline</th>
                                            <th>Department</th>
                                            <th>Year</th>
                                            <th>Term</th>
                                            <th>Assigned</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                      @foreach($prepareQuestionPaperByAMW as $prepare_question_paper_amw)
                                        <tr>

                                            <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $prepare_question_paper_amw->id }}"></td>
                                            {{--<td>{{ ExmExamList::getExamName($prepare_question_paper_amw->exm_exam_list_id) }}</td>--}}
                                            <td>{{ $prepare_question_paper_amw->title }}</td>
                                            <td>{{ $prepare_question_paper_amw->deadline }}</td>

                                            

                                            <td> {{ Department::getDepartmentName(1) }} </td>
                                            <td> {{ Year::getYearsName(1) }}</td>
                                            <td> {{ Semester::getSemesterName(1) }} </td>

                                            <td> Mr. </td>


                                                        {{--$prepare_question_paper_amw->title--}}

                                           <td>

                                                   <a href="{{ URL::route('prepare_question_paper.show', ['id'=>$prepare_question_paper_amw->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#showModal" data-placement="left" title="Show" href="#">View</a>



                                                   <a href="{{ URL::route('prepare_question_paper.edit', ['id'=>$prepare_question_paper_amw->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#edit-modal" data-placement="left" title="Edit" href="#">Edit</a>


                                                   <br>



                                              <a class="btn btn-default" href="{{ action('ExmPrepareQuestionPaperController@ViewQuestion') }}">Assign</a>

                                           </td>

                                        </tr>
                                            @endforeach

                                    </tbody>
                                </table>

                    {{form::close() }}

                              {{--{{ $prepareQuestionPaperByAMW->links() }}--}}

                              <br><br><br>


@include('examination::prepare_question_paper/_modal')

@stop
