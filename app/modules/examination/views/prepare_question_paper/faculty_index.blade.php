@extends('layouts.master')

@section('sidebar')
    @include('examination::prepare_question_paper._sidebar')
@stop

@section('content')
        <h1>Welcome to Prepare Question paper : Faculty </h1> <br>


                    {{ Form::open(array('url' => 'prepare_question_paper/batchDelete')) }}

                        <table id="example" class="table table-striped  table-bordered"  >
                                    <thead>


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

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      @foreach($prepareQuestionPaperByFACULTY as $prepare_question_paper_faculty)
                                        <tr>

                                            <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $prepare_question_paper_faculty->id }}"></td>
                                            <td>{{ $prepare_question_paper_faculty->title }}</td>
                                            <td>{{ $prepare_question_paper_faculty->deadline }}</td>

                                            <td> </td>
                                            <td> </td>
                                            <td>  </td>

                                           <td>

                                              <a href="{{ URL::route('prepare_question_paper.show', ['id'=>$prepare_question_paper_faculty->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#showModal" data-placement="left" title="Show" href="#">View</a>
                                                   

                                              <a class="btn btn-default" data-toggle="modal" data-target="#AddQuestionModal">Add Question Item</a>

                                              <br>

                                              <a class="btn btn-default" href="{{ action('ExmPrepareQuestionPaperController@ViewQuestion') }}">View All Questions</a>

                                           </td>

                                        </tr>
                                            @endforeach

                                    </tbody>
                                </table>

                    {{form::close() }}

                              {{ $prepareQuestionPaperByFACULTY->links() }}

                              <br><br><br>

@include('examination::prepare_question_paper/_modal')

@stop
