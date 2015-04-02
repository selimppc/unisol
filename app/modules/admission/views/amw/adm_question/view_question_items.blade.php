@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<h3> Question Item Lists </h3>

<div class="row">
<div class="box box-solid ">
<div class="box-body">
    <h4> Question Paper  # {{$question_subject->relBatchAdmtestSubject->relAdmtestSubject->title }}</h4>
    <table class="table table-striped  table-bordered"  >
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th> Marks</th>
                <th> Action</th>
            </tr>
        </thead>
        @foreach($question_items as $values)
            <tr>
                <td>
                    {{$values->title}}
                </td>
                <td>
                    {{$values->question_type}}
                </td>
                <td>
                    {{$values->marks}}
                </td>
                <td>
                    <a href="{{ URL::route('admission.amw.admission-test-question.view-question_item-details', [ 'q_items_id'=>$values->id ])  }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Assign Faculty" href="#"> View </a>
                </td>
            </tr>
        @endforeach
    </table>

    &nbsp;
    </br>
    &nbsp;

</div>
</div>
</div>


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="z-index:1050">
    <div class="modal-content">

    </div>
  </div>
</div>

@stop