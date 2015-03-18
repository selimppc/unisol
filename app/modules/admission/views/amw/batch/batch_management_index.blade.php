@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
   <h1>Welcome to Batch Management </h1>

<div class="row">
           {{--<div class="col-sm-12">--}}
               {{--<div class="pull-right col-sm-4">--}}
                   {{--<a class="pull-right btn btn-sm btn-info" href="{{ URL::to('common/course/create')}}" data-toggle="modal" data-target="#modal" >Add</a>--}}
               {{--</div>--}}
           {{--</div>--}}
</div>

{{--{{ Form::open(array('url' => 'common/course/batchDelete')) }}--}}

        <table id="example" class="table table-striped  table-bordered"  >
            <thead>
                  {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                  <br>

                <tr>
                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                    <th>Title</th>
                    <th>BN</th>
                    <th>Department</th>
                    <th>Year</th>
                    <th>Term</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($batch_management))
              @foreach($batch_management as $course_list)
                <tr>

                   <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $course_list->id }}"></td>
                   <td>{{ $course_list->relDegree->title }}</td>
                   <td>{{ $course_list->batch_number }}</td>
                   <td>{{ $course_list->relDegree->relDepartment->title }}</td>
                   <td>{{ $course_list->relYear->title }}</td>
                   <td>{{ $course_list->relSemester->title }}</td>
                    <td>{{ $course_list->status }}</td>

                   <td>
                         <a href="{{ URL::to('batch/amw/show/'.$course_list->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                         {{--<a class="btn btn-xs btn-default" href="{{ URL::to('batch/amw/edit/'.$course_list->id) }}" data-toggle="modal" data-target="#modal" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>--}}

                   </td>

                </tr>
               @endforeach
             @endif

            </tbody>
        </table>

        {{--{{form::close() }}--}}
<div class="text-right">
    {{ $batch_management->links() }}
</div>
<p>&nbsp;</p><p>&nbsp;</p>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

         </div>
        </div>
   </div>



<!-- Modal for delete -->
  <div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
            </div>
            <div class="modal-body">
                  <strong>Are you sure to delete?</strong>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <a href="#" class="btn btn-danger danger">Delete</a>

            </div>
      </div>
    </div>
  </div>


@stop