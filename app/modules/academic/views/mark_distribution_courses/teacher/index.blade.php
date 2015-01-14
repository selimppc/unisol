@extends('layouts.master')
@section('sidebar')
  @include('academic::mark_distribution_courses.amw.sidebar')
@stop
@section('content')
<h4>{{$title}}</h4>

       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNew" >
         Add New
        </button>



     {{--{{ Form::open(array('url' => 'amw/config/batch/delete')) }}--}}
        {{--<table id="example" class="table table-bordered table-hover table-striped">--}}
        {{--<thead>--}}
            {{--<tr>--}}
              {{--<th>--}}
              {{--<input name="id" type="checkbox" id="checkbox" class="checkbox" value="">--}}
               {{--</th>--}}
                {{--<th>Id</th>--}}
                {{--<th>CourseItemName</th>--}}
                {{--<th>Marks</th>--}}
                {{--<th>ReadOnly</th>--}}
                {{--<th>Action</th>--}}
            {{--</tr>--}}
        {{--</thead>--}}

        {{--<tbody>--}}
            {{--@foreach ($datas as $value)--}}
            {{--<tr>--}}
                {{--<td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $value->id }}">--}}
                {{--</td>--}}
                {{--<td>{{$value->id}}</td>--}}
                {{--<td>{{ AcmMarksDist::AcmMarksDistName($value->acm_marks_dist_item_id) }}</td>--}}
                {{--<td>{{$value->marks}}</td>--}}
                {{--<td>{{$value->readonly}}</td>--}}
                {{--<td>--}}
                  {{--<a data-href="{{ URL::to('amw/config/delete/'.$value->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>--}}

                   {{--<a href="{{ URL::route('config.edit', ['id'=>$value->id]) }}" class="subEdit btn btn-sm btn-default" data-toggle="modal" data-target="#editModal" href="" ><span class="glyphicon glyphicon-edit text-info"></span></a>--}}

                   {{--<a href="{{ URL::route('config.show', ['id'=>$value->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#showModal" href=""><span class="glyphicon glyphicon-list-alt text-info"></span></a>--}}
                {{--</td>--}}
            {{--</tr>--}}
            {{--@endforeach--}}
          {{--</tbody>--}}
          {{--{{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}--}}
    {{--</table>--}}
    {{--{{ Form::close() }}--}}

    {{--{{ $datas->links() }}--}}



{{---------------------------------------------}}
{{--Start all modal for amw course config --}}
{{---------------------------------------------}}

{{--<!-- Add New Item Modal -->--}}
{{--<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">--}}
    {{--<div class="modal-dialog">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>--}}
                {{--<h4 class="modal-title">Add Course Item Marks</h4>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}

             {{--{{ Form::open(array('url' => 'amw/config/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}--}}

               {{--@include('academic::mark_distribution_courses.amw._form_course_config')--}}

             {{--{{ Form::close() }}--}}


            {{--</div>--}}
            {{--<div class="modal-footer">--}}

            {{--</div>--}}
        {{--</div><!-- /.modal-content -->--}}
    {{--</div><!-- /.modal-dialog -->--}}
{{--</div><!-- /.modal -->--}}


{{--<!-- Edit Item Modal -->--}}

 {{--<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">--}}
     {{--<div class="modal-dialog">--}}
         {{--<div class="modal-content">--}}
             {{--<div class="modal-header">--}}
                 {{--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>--}}
                 {{--<h4 class="modal-title">Edit Course Item config</h4>--}}
             {{--</div>--}}
             {{--<div class="modal-body">--}}

             {{--</div>--}}
             {{--<div class="modal-footer">--}}

             {{--</div>--}}
         {{--</div><!-- /.modal-content -->--}}
     {{--</div><!-- /.modal-dialog -->--}}
 {{--</div><!-- /.modal -->--}}

{{--<!-- Modal for delete -->--}}
    {{--<div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
      {{--<div class="modal-dialog">--}}
        {{--<div class="modal-content">--}}
              {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>--}}
                {{--<h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>--}}
              {{--</div>--}}
              {{--<div class="modal-body">--}}
                    {{--<strong>Are you sure to delete?</strong>--}}
              {{--</div>--}}
              {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>--}}
                {{--<a href="#" class="btn btn-danger danger">Delete</a>--}}

              {{--</div>--}}
        {{--</div>--}}
      {{--</div>--}}
    {{--</div>--}}


      {{--<!-- Show Modal -->--}}
      {{--<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">--}}
        {{--<div class="modal-dialog">--}}
          {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
               {{--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>--}}
              {{--<h4 class="modal-title" id="myModalLabel">Show Course Item config </h4>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}

            {{--</div>--}}
            {{--<div class="modal-footer">--}}
              {{--<button type="button" class="btn btn-danger" data-dismiss="modal" >Cencel</button>--}}
            {{--</div>--}}
          {{--</div>--}}
        {{--</div>--}}
      {{--</div>--}}

{{--End all modal for amw course config--}}
{{---------------------------------------------}}

@stop