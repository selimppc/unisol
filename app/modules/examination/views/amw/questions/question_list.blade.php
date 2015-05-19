@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

<a class="pull-right btn btn-xs btn-info" href="{{ URL::route('amw.exam-list') }}"  style="color: #ffffff" title="Back to Exam List"><b>Back</b></a>

<h3>Examination :Question-List</h3>

<div class="row">
   <div class="col-md-12 ">
      <div class="box box-solid">
          {{ Form::open(array('url' => 'examination/amw/batchDelete')) }}
             <table id="example" class="table table-striped  table-bordered">
                <thead>
                   {{ Form::submit('Delete Items', array('class'=>'btn btn-xs btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
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
                    @if(isset($question_list))
                        @foreach($question_list as $values)
                            <tr>
                                <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $values['id'] }}"></td>
                                 <td> {{ $values->title }} </td>
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
                                        <a href="{{ URL::route('amw.view-question', ['q_id'=>$values->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#q_item" data-placement="left" title="Show" style="font-size: 11px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                    </td>
                            </tr>
                        @endforeach
                        {{--<a class="pull-right btn btn-sm btn-info" href="{{ URL::route('amw.exam-list') }}"  style="color: #ffffff" ><b>All</b></a>--}}
                    @else
                    @endif
                </tbody>
             </table>
          {{form::close() }}

          <p>&nbsp;</p>
      </div>
   </div>
</div>

<!-- Modal  -->
 <div class="modal fade" id="q_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="z-index:1050">
        <div class="modal-content">

        </div>
      </div>
 </div>


@stop

