@extends('layouts.master')
@section('sidebar')
    @include('examination::_sidebar')
@stop
@section('content')
             <h1>Welcome to Question Items : <strong>{{ ucwords(Auth::user()->username) }}</strong> </h1> <br>
              {{ Form::open(array('url' => 'examination/amw/batchItemsDelete')) }}
              <table id="example" class="table table-striped  table-bordered"  >
                     <thead>
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
                       @foreach($QuestionListAmw as $question_list_amw)
                         <tr>
                             <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="  {{ $question_list_amw->id }}"></td>
                             <td>{{ $question_list_amw->title }}</td>
                             <td>{{ $question_list_amw->question_type }}</td>
                             <td>{{ $question_list_amw->marks }}</td>
                             <td>
                              <a href="{{ URL::route('examination.amw.viewQuestionItems', ['id'=>$question_list_amw->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#ViewQuestionItems" data-placement="left" title="Show" href="#"> View </a>
                             </td>
                         </tr>
                       @endforeach
                     </tbody>
              </table>
              {{form::close() }}

    @include('examination::amw.prepare_question_paper._modal._common_modal');
@stop