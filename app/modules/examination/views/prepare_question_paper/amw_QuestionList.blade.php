@extends('layouts.master')

@section('sidebar')
    @include('examination::prepare_question_paper._sidebar')
@stop

@section('content')


             <h1>Welcome to Question List : AMW </h1> <br>

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

                       @foreach($QuestionListAmw as $question_list_amw)
                         <tr>

                             <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="  {{ $question_list_amw->id }}"></td>

                             <td>{{ $question_list_amw->title }}</td>
                             <td>{{ $question_list_amw->question_type }}</td>
                             <td>{{ $question_list_amw->marks }}</td>
                            <td>

                            <a href="{{ URL::route('prepare_question_paper.amw_ViewQuestionItems', ['id'=>$question_list_amw->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#ViewQuestionItems" data-placement="left" title="Show" href="#"> View </a>

                            </td>

                         </tr>
                             @endforeach

                     </tbody>
              </table>



              {{form::close() }}



@include('examination::prepare_question_paper/_modal');
@stop

