@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop

@section('content')
    <a class="pull-right btn btn-xs btn-success" href="{{ URL::route('admission.amw.admission-test-home')}}"> <i class="fa fa-arrow-circle-left"></i> Back To Admission Test</a>


    <h3> <strong>Question Paper :</strong> {{$question_subject->relBatchAdmtestSubject->relAdmtestSubject->title }}</h3>
    {{ Form::open() }}
    <table id="example" class="table table-striped  table-bordered"  >
          <thead>
               {{ Form::submit('Delete Items', array('class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'))}}

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
                @foreach($question_items as $values)
                  <tr>
                      <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $values['id'] }}"></td>

                      <td>{{ $values->title }}</td>

                      <td>
                          @if($values->question_type == 'text')
                            Descriptive
                          @elseif($values->question_type == "radio")
                            MCQ / Single
                          @else
                            MCQ / Multiple
                          @endif
                      </td>

                      <td>{{ $values->marks }}</td>
                      <td>
                        <a href="{{ URL::route('admission.amw.question.view-question-item-details', [ 'q_items_id'=>$values->id ])  }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Assign Faculty" href="#"> View </a>
                      </td>
                    </tr>
                @endforeach
          </tbody>
    </table>

    &nbsp;


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="z-index:1050">
    <div class="modal-content">

    </div>
  </div>
</div>

@stop