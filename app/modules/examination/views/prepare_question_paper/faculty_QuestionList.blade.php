@extends('layouts.master')

@section('sidebar')
    @include('examination::prepare_question_paper._sidebar')
@stop

@section('content')


             <h1>Welcome to Question List : Faculty </h1> <br>

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
                             <th>Type</th>
                             <th>Marks</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>

                       @foreach($QuestionListFaculty as $question_list_faculty)
                         <tr>

                             <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="  {{ $question_list_faculty->id }}"></td>

                             <td>{{ $question_list_faculty->title }}</td>
                             <td>{{ $question_list_faculty->question_type }}</td>
                             <td>{{ $question_list_faculty->marks }}</td>
                            <td>


                              <a type="button" class="btn btn-info" data-toggle="modal" data-target="#ViewQuestionItems"> View </a>

                              <a href="{{ URL::route('prepare_question_paper.amw_ViewQuestionItems', ['id'=>$question_list_faculty->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#ViewQuestionPaperModal" data-placement="left" title="Show" href="#">View</a>




                              <a type="button" class="btn btn-info" data-toggle="modal" data-target="#EditQuestion"> Edit </a>


                            </td>

                         </tr>
                             @endforeach

                     </tbody>
              </table>



             {{form::close() }}



@include('examination::prepare_question_paper/_modal');
@stop

