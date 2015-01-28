@extends('layouts.master')
@section('sidebar')
    @include('applicant._sidebar')
@stop
@section('content')
{{--<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
{{--<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>--}}
{{--<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">--}}

  <div class="span well">
  <table class="table table-striped table-bordered" id="myTable">
    <col width="50">
      <col width="180">
      <col width="100">
      <col width="90">
      <col width="120">
      <col width="180">
     <h4>Biographical Information</h4>
                    <thead>
                    <tr>
                       <td><input name="checkbox" type="checkbox" id="checkbox" class="checkbox" value="">
                       </td>
                        <th>Father's name</th>
                        <th>mother's name</th>
                        <th>Father's occupation</th>
                        <th>Father's Phone</th>
                        <th>Freedom Fighter</th>
                        <th>Mother's occupation</th>
                        <th>Mother's Phone</th>
                        <th>National id</th>
                        <th>Driving license</th>
                        <th>Passport</th>
                        <th>Place of birth</th>
                        <th>Action</th>


                    </tr>
                  </thead>

        <tbody>

                {{--@foreach ($role_task_list as $roletask)--}}
                                    {{--<tr>--}}
                                       {{--<td><input type="checkbox" name="ids[]"  id="check" class="myCheckbox" value="{{ $roletask->id }}"></td>--}}

                                        {{--<td>{{ $roletask->title }}</td>--}}
                                        {{--<td align="left" class="TargetRole">{{ TargetRole::getTargetRole($roletask->target_role_id) }}</td>--}}
                                        {{--<td align="left" class="TaskList">{{ TaskListRole::getTaskList($roletask->task_list_id) }}</td>--}}
                                        {{--<td>{{ $roletask->description }}</td>--}}
                                        {{--<td>{{ $roletask->status }}</td>--}}
                                        {{--<td>--}}

                                           {{--<a data-href="{{ URL::to('roletask/delete/'.$roletask->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>--}}
                                           {{--<a href="{{ URL::to('roletask/show/'.$roletask->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-show"><span class="glyphicon glyphicon-eye-open text-danger"></span></a>--}}
                                           {{--<a class="btn btn-sm btn-info" href="{{ URL::to('roletask/edit/' . $roletask->id ) }}" data-toggle="modal" data-target="#myeditModal" >Edit...</a>--}}
                                        {{--</td>--}}

                                    {{--</tr>--}}
                                {{--@endforeach--}}
                                 <br>
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
           Add New
     </button>

        </tbody>
    </table>
  </div>


@stop

