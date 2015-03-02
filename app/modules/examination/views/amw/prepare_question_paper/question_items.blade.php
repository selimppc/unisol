@extends('layouts.master')

@section('sidebar')
    @include('examination::_sidebar')
@stop

@section('content')

<h1>Welcome to Courses : <strong></strong> </h1> <br>
    {{ Form::open(array('url' => 'examination/amw/batchDelete')) }}
<table id="example" class="table table-striped  table-bordered"  >
    <thead>
   <strong> Course Title:</strong>
{{--   {{ExmQuestion::getExamName($question_name) }}--}}
    </br>
    <strong> Question Paper:</strong>
{{--    {{ExmQuestion::getExamName($question_name) }}--}}

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
    @foreach($questions_item as $question_list)
        <tr>
            <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $question_list['id'] }}"></td>

            <td> {{ $question_list->title }} </td>
            <td>
                @if($question_list->question_type == 'text')
                  Descriptive
                @elseif($question_list->question_type == "radio")
                  MCQ / Single
                @else
                  MCQ / Multiple
                @endif
            </td>
            <td>{{ $question_list->marks }}</td>
            <td>
                <a href="{{ URL::route('examination.amw.viewQuestionItems', ['id'=>$question_list->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#"> View </a>

            </td>
        </tr>

    @endforeach
    </tbody>
</table>
{{form::close() }}

@include('examination::amw.prepare_question_paper._modal._common_modal')
@stop
