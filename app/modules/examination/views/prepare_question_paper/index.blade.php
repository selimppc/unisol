@extends('layouts.master')

@section('sidebar')
    @include('examination::prepare_question_paper._sidebar')
@stop

@section('content')
        <h1>Welcome to Prepare Question paper </h1> <br>


                    {{ Form::open(array('url' => 'prepare_question_paper/batchDelete')) }}

                        <table id="example" class="table table-striped  table-bordered"  >
                                    <thead>

                                          <div class="btn-group" style="margin-right: 10px">
                                              <button type="button" class="btn btn-default" data-toggle="modal"
                                                        data-target="#CreateModal">
                                                          Create Question paper
                                              </button>
                                          </div>


                                          <div class="btn-group" style="margin-right: 10px">
                                               <button type="button" class="btn btn-info" data-toggle="modal"
                                                       data-target="#EditQuestionPaperModal">
                                                          Edit Question Papers
                                               </button>
                                          </div>


                                          {{--page content start from here--}}
                                         <br>
                                              {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                                         <br>


                                        <tr>
                                            <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                            <th>Exam Name</th>
                                            <th>Title</th>
                                            <th>Deadline</th>
                                            <th>Total Marks</th>
                                            <th>Created by</th>
                                            <th>Updated by</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      @foreach($prepareQuestionPaper as $prep_quest_paper)
                                        <tr>

                                            <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $prep_quest_paper->id }}"></td>
                                            <td>{{ ExmExamList::getExamName($prep_quest_paper->exm_exam_list_id) }}</td>
                                            <td>{{ $prep_quest_paper->title }}</td>
                                            <td>{{ $prep_quest_paper->deadline }}</td>
                                            <td>{{ $prep_quest_paper->total_marks }}</td>
                                            <td>{{ $prep_quest_paper->created_by }}</td>
                                            <td>{{ $prep_quest_paper->updated_by }}</td>
                                           <td>
                                              <a href="{{ URL::route('prepare_question_paper.edit', ['id'=>$prep_quest_paper->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#edit-modal" data-placement="left" title="Edit" href="#">Edit</a>
                                                 {{--<span class="glyphicon glyphicon-edit text-info"></span>--}}

                                              <a data-href="{{ URL::route('prepare_question_paper.destroy',['id'=>$prep_quest_paper->id]) }}" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete" data-placement="left" title="Delete" href="#" >Delete</a>
                                                  {{--<span class="glyphicon glyphicon-trash text-danger"></span>--}}

                                              <a href="{{ URL::route('prepare_question_paper.show', ['id'=>$prep_quest_paper->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#showModal" data-placement="left" title="Show/View" href="#">View</a>
                                                   {{--<span class="glyphicon glyphicon-list-alt text-info"></span>--}}

                                                   <br>

                                              <a class="btn btn-default" data-toggle="modal" data-target="#AddQuestionModal">Add Question</a>

                                              <a class="btn btn-default" data-toggle="modal" data-target="#ViewAllQuestionModal">View All Questions</a>

                                           </td>

                                        </tr>
                                            @endforeach

                                    </tbody>
                                </table>



                                {{form::close() }}

                                        {{ $prepareQuestionPaper->links() }}

                                        <br><br><br>

                    <!-- Modal for Create -->
                    <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                     <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Create Course</h4>
                                     </div>
                                     <div class="modal-body">
                                             {{ Form::open(array('url' => 'prepare_question_paper/store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

                                                             @include('examination::prepare_question_paper._form')

                                              {{ Form::close() }}

                                     </div>
                                     <div class="modal-footer">
                                     </div>
                                </div>
                            </div>
                    </div>


                    <!-- Modal for Edit -->
                    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                     <div class="modal-header">
                                               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                             <h4 class="modal-title" id="myModalLabel">Edit </h4>
                                     </div>
                                     <div class="modal-body">
                                     </div>
                                     <div class="modal-footer">
                                     </div>
                                </div>
                            </div>
                    </div>


                    <!-- Show Modal -->
                    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Show </h4>
                          </div>
                          <div class="modal-body">

                            <h1>Show Prepare Question Paper</h1>

                            {{ Form::open(array('url'=>'prepare_question_paper/show','method' => '')) }}


                                    <div class="jumbotron text-center">
                                        <h2><strong>Name :</strong>{{ $prep_quest_paper->title }}</h2>
                                        <p>
                                            <strong> Exam List Id:</strong> {{ ExmExamList::getExamName($prep_quest_paper->exm_exam_list_id) }} <br>
                                            <strong> Deadline:</strong> {{ $prep_quest_paper->deadline }}<br>
                                            <strong> Total Marks:</strong> {{ $prep_quest_paper->total_marks }}<br>
                                            <strong> Created By:</strong> {{ $prep_quest_paper->created_by }}<br>
                                            <strong> Updated By:</strong> {{ $prep_quest_paper->updated_by }}<br>

                                        </p>
                                    </div>

                                {{ Form::close() }}

                          </div>
                          <div class="modal-footer">
                            <button href="{{URL::to('prepare_question_paper/index')}}" type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Modal for delete -->
                    <div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                       <div class="modal-content">
                             <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                               <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                             </div>
                             <div class="modal-body">
                                   <strong>Are you sure to delete?</strong>

                             </div>
                             <div class="modal-footer">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                               <a href="#" class="btn btn-danger danger">Delete</a>

                             </div>
                       </div>
                     </div>
                    </div>




                     <!-- Modal for Add Question -->
                    <div class="modal fade" id="AddQuestionModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                     <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Add Question </h4>
                                     </div>
                                     <div class="modal-body">



                                     </div>

                                     <div class="modal-footer">
                                     </div>
                                </div>
                            </div>
                    </div>


                    <!-- Modal for View All Question  -->
                    <div class="modal fade" id="ViewAllQuestionModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                     <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="myModalLabel">View All Question</h4>
                                     </div>
                                     <div class="modal-body">




                                     </div>
                                     <div class="modal-footer">
                                     </div>
                                </div>
                            </div>
                    </div>

                    <!-- Modal for Edit Question Paper  -->
                    <div class="modal fade" id="EditQuestionPaperModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                     <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Question Paper</h4>
                                     </div>
                                     <div class="modal-body">




                                     </div>
                                     <div class="modal-footer">
                                     </div>
                                </div>
                            </div>
                    </div>


@stop