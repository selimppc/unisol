@extends('layouts.master')
@section('sidebar')
  @include('academic::mark_distribution_courses.amw.sidebar')
@stop
@section('content')
<h4>{{$title}}</h4>

       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNew" >
         Add New Item
        </button>

         <!-- search db  -->
       <div class="wrapper text-right no-padder" style="margin-top: 20px">
        {{ Form::open(array('url' =>'amw/show', 'class'=>'form-inline', 'role' => 'form')) }}
            <div class="form-group">
              {{ Form::label('search_text', 'Search Text:',array('class'=>'sr-only')) }}
              {{ Form::text('search_text', Input::old('search_text'), array('class' => 'form-control','placeholder' => 'Search All')) }}
            </div>
            {{ Form::submit('Search', array('class' => 'btn btn-info')) }}
        {{ Form::close() }}
        </div>

         <!-- search db ends -->


     {{ Form::open(array('url' => 'amw/batch/delete')) }}
        <table id="example" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
              <th>
              <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
               </th>
                <th>Id</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            {{--@foreach ($datas as $value)--}}
            {{--<tr>--}}
                {{--<td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $value->id }}">--}}
                {{--</td>--}}
                {{--<td>{{$value->id}}</td>--}}
                {{--<td>{{$value->title}}</td>--}}

                {{--<td>--}}
                  {{--<a data-href="{{ URL::to('year/delete/'.$value->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>--}}

                   {{--<a href="{{ URL::route('year.edit', ['id'=>$value->id]) }}" class="subEdit btn btn-sm btn-default" data-toggle="modal" data-target="#edit-modal" href="" ><span class="glyphicon glyphicon-edit text-info"></span></a>--}}

                   {{--<a href="{{ URL::route('year.show', ['id'=>$value->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#show-modal" href=""><span class="glyphicon glyphicon-list-alt text-info"></span></a>--}}
                {{--</td>--}}
            {{--</tr>--}}
            {{--@endforeach--}}
          </tbody>
          {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
    </table>
    {{ Form::close() }}

    {{--{{ $datas->links() }}--}}








{{---------------------------------------------}}
{{--Start all modal for amw--}}
{{---------------------------------------------}}

<!-- Add New Item Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add New Item</h4>
            </div>
            <div class="modal-body">

             {{ Form::open(array('url' => 'amw/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}

               @include('academic::mark_distribution_courses.amw._form')

             {{ Form::close() }}


            </div>
            <div class="modal-footer">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


{{---------------------------------------------}}
{{--End all modal for amw--}}
{{---------------------------------------------}}

@stop