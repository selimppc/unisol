@extends('layouts.master')

@section('sidebar')
    @include('degree_level._sidebar')
@stop


@section('content')
   <h1>Welcome to Degree Level! </h1>


    <!-- will be used to show any messages -->
    {{--@if (Session::has('message'))--}}
        {{--<div class="alert alert-info">{{ Session::get('message') }}</div>--}}
    {{--@endif--}}

        <table class="table table-striped  table-bordered" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($degree as $level)
                        <tr>
                            <td>{{ $level->id }}</td>
                            <td>{{ $level->title }}</td>
                            <td>{{ $level->description }}</td>
                        </tr>
                        <td>
                              <a href="{{ URL::route('degreelevel.edit', ['id'=>$level->id])  }}" class="btn btn-default">Edit</a>

                              <a data-href="{{ URL::route('degreelevel.destroy', ['id'=>$level->id]) }}" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete" href="" >Delete</a>

                              <a href="{{ URL::route('degreelevel.show', ['id'=>$level->id])  }}" class="btn btn-default">View</a>

                        </td>
                    @endforeach



    <!-- Modal -->
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

    <script>
         $('#confirm-delete').on('show.bs.modal', function(e)
         {
            $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.danger').attr('href') + '</strong>');
        })
    </script>
            </tbody>
        </table>
@stop