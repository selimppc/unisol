@extends('layouts.master')

@section('sidebar')
    @include('examination::_sidebar')
@stop

@section('content')
             <h1>Welcome to Question Items </h1> <br>
                {{ Form::open(array('url' => 'examination/faculty/batchItemsDelete')) }}
              <table id="example" class="table table-striped  table-bordered"  >
                     <thead>
                          <br>
                               {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none','data-toggle'=>'modal', 'data-target'=>'#confirm-delete'))}}
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
                                <a href="{{ URL::route('examination.faculty.viewQuestionItems', ['id'=>$question_list_faculty->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#ViewQuestionItems" data-placement="left" title="Show" href="#"> View </a>
                                <a href="{{ URL::route('examination.faculty.editQuestionItems', ['id'=>$question_list_faculty->id])  }}" class="btn btn-info" data-toggle="modal" data-target="#EditQuestionItems"> Edit </a>
                            </td>
                         </tr>
                       @endforeach
                     </tbody>
              </table>
             {{form::close() }}
@include('examination::faculty.prepare_question_paper._modal');
@stop

