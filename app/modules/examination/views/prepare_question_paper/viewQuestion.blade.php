@extends('layouts._master')

@section('sidebar')
    @include('examination::prepare_question_paper._sidebar')
@stop

@section('content')

             <h1>Welcome to View Question </h1> <br>


              <table id="example" class="table table-striped  table-bordered"  >
                     <thead>

                           <div class="btn-group" style="margin-right: 10px">
                              <a class="btn btn-default" data-toggle="modal" data-target="#AddQuestionModal">Add Question</a>
                           </div>





                           {{--page content start from here--}}
                          <br>
                               {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                          <br>


                         <tr>
                             <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>

                             <th>Title</th>
                             <th>Question Type</th>
                             <th>Answer Type</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>

                       @foreach($prepareQuestionPaper as $prep_quest_paper)
                         <tr>

                             <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="  {{ $prep_quest_paper->id }}"></td>

                             <td>a</td>
                             <td>a</td>
                             <td>a</td>
                            <td>
                              <a type="button" class="btn btn-info" data-toggle="modal" data-target="#EditQuestionPaperModal"> Edit Question Papers </a>


                            </td>

                         </tr>
                             @endforeach

                     </tbody>
              </table>








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

@include('examination::prepare_question_paper/_modal');
@stop