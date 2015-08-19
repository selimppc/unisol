@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_faculty')
@stop

@section('content')
    <h2> View Question Items</h2>

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
                          @foreach($view_adm_qp_items as $view_adm_qp_items_list)
                                <tr>
                                    <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $view_adm_qp_items_list['id'] }}"></td>

                                    <td>{{ $view_adm_qp_items_list->title }}</td>

                                    <td>
                                        @if($view_adm_qp_items_list->question_type == 'text')
                                          Descriptive
                                        @elseif($view_adm_qp_items_list->question_type == "radio")
                                          MCQ / Single
                                        @else
                                          MCQ / Multiple
                                        @endif
                                    </td>

                                    <td>{{ $view_adm_qp_items_list->marks }}</td>

                                    <td>
                                        <a href="{{ URL::route('admission.faculty.question-papers.specific-question-view',['id'=>$view_adm_qp_items_list->id]) }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal">View</a>
                                        <a href="{{ URL::route('admission.faculty.question-papers.specific-question-edit',['id'=>$view_adm_qp_items_list->id]) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal" >Edit</a>
                                    </td>
                                </tr>
                          @endforeach
                      </tbody>
                    </table>

                    <a href="{{ URL::previous() }}" class="pull-right btn btn-info">Back</a>

                {{ Form::close() }}
                    &nbsp;
                    &nbsp;

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="z-index:1050">
          <div class="modal-content">
          </div>
    </div>
</div>

@stop