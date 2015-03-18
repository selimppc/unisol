@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
   <h1>Batch Management </h1>

<div class="row">
           <div class="col-sm-12">
               <div class="pull-right col-sm-4">
                   <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('batch/amw/create')}}" data-toggle="modal" data-target="#modal" >New Batch</a>
               </div>
           </div>
</div>

{{ Form::open(array('url' => 'batch/amw/batchDelete')) }}

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
              @foreach($batch_management as $batch_list)
                <tr>

                   <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $batch_list->id }}"></td>
                   <td>{{ $batch_list->relDegree->title }}</td>
                   <td>{{ $batch_list->batch_number }}</td>
                   <td>{{ $batch_list->relDegree->relDepartment->title }}</td>
                   <td>{{ $batch_list->relYear->title }}</td>
                   <td>{{ $batch_list->relSemester->title }}</td>
                    <td>{{ $batch_list->status }}</td>

                   <td>
                         <a href="{{ URL::to('batch/amw/show/'.$batch_list->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                         {{--<a class="btn btn-xs btn-default" href="{{ URL::to('batch/amw/edit/'.$batch_list->id) }}" data-toggle="modal" data-target="#modal" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>--}}

                   </td>

                </tr>
               @endforeach
             @endif

            </tbody>
        </table>

        {{form::close() }}
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


@stop