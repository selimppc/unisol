@extends('layouts.master')
@section('sidebar')
    @include('academic::mark_distribution_courses.amw.sidebar')
@stop
@section('content')

@foreach($datas as $ds)
    <tr>
       <td>{{$ds['id']}} </td>
       <td>{{$ds['title']}} </td>
       <td>{{$ds['deadline']}}</td>
       <td>{{$ds['coursemanagement']['course']['subject']['department']['title']}}</td>
       <td>{{$ds['coursemanagement']['year']['title']}} </td>
       <td>{{$ds['coursemanagement']['semester']['title']}}</td>
       <td>
            <a href="{{ URL::route('prepare_question_paper.faculty_ViewQuestion', ['qid'=>$ds->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#ViewQuestionPaperModal" data-placement="left" title="Show" href="#">View</a>
            <a href="{{ URL::route('prepare_question_paper.faculty_add_question_items', ['qid'=>$ds->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#AddQuestionItemsModal" data-toggle="tooltip" data-placement="left" title="Edit" href="#">Add Question Item</a>
       </td>
    </tr>
@endforeach

@stop
