@extends('layouts.master')
@section('sidebar')
    {{--@include('applicant::_sidebar')--}}
@stop
@section('content')


<section class="content">
<div class="box-body">

<h3> Course Management </h3>

<a class="pull-left btn btn-sm btn-info" href="{{ URL::to('course_manage/create')}}" data-toggle="modal" data-target="#addModal" >Add  Course</a>


</div>
<div class="row">
<div class="col-xs-12">

<div class="box">
<div class="box-header">

</div><!-- /.box-header -->
<div class="box-body table-responsive">

<table id="example1" class="table table-bordered table-striped">

<col width="150">
<col width="200">
<col width="100">
<col width="120">
<col width="20">
<col width="20">


<thead>
<tr>

   <th>Title</th>
   <th>Degree</th>
   <th>Major/Minor</th>

   <th>Department</th>
   <th>Year</th>
   <th>Semester</th>
   <th>Faculty</th>
   <th>Action</th>

</tr>
</thead>
<tbody>

      {{--@foreach($model as $value)--}}
          {{--<tr>--}}
               {{--<td>{{strtoupper($value->level_of_education ) }}</td>--}}
               {{--<td>{{ $value->board_university}}</td>--}}
               {{--<td>{{ $value->year_of_passing}}</td>--}}
               {{--<td>--}}

               {{--@if($value->result_type =='division')--}}
               {{--{{ $value->result }}--}}
               {{--@else--}}
               {{--{{$value->gpa}}--}}
               {{--@endif--}}

               {{--</td>--}}

               {{--<td>--}}
                    {{--<a href="" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal"><span class="glyphicon glyphicon-eye-open text-danger"></span></a>--}}
                   {{--<a class="btn btn-xs btn-default" href="" data-toggle="modal" data-target="#myeditModal" ><span class="glyphicon glyphicon-edit"></span></a>--}}
                   {{--<a data-href="" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>--}}
               {{--</td>--}}

          {{--</tr>--}}
      {{--@endforeach--}}

</tbody>

</table>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>
</section>

{{---------------------------------------------------Modals-----------------------------------------------}}
 <!-- Modal :: Show Information -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

       </div>
      </div>
 </div>




@stop