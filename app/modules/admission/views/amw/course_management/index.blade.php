@extends('layouts.master')
@section('sidebar')
    {{--@include('applicant::_sidebar')--}}
@stop
@section('content')


<section class="content">
<div class="box-body">

<h3> Course Management </h3>


<a class="pull-right btn btn-sm btn-info" href="{{ URL::to('course_manage/create')}}" data-toggle="modal" data-target="#addModal" >Add New Course</a>

{{--<div class="pagination-tool">--}}
        {{--<div class="paginate-area">--}}
            {{--Displaying <span style="color: red"> {{$viewCount}} </span> of {{$countAll}} entries.--}}
        {{--</div>--}}
        {{--<div class="pull-right paginate-button">--}}
            {{--{{$courseDataList->links()}}--}}
        {{--</div>--}}
{{--</div>--}}

</div>
<div class="row">
<div class="col-xs-12">

<div class="box">
<div class="box-header">

</div><!-- /.box-header -->
<div class="box-body table-responsive">

<br>

 <div class="span10 well">

        {{ Form::open(array('class'=>'form-horizontal')) }}

        <div  class="col-lg-3">{{ Form::label('semester_id', 'Semester') }}
        {{ Form::select('semester_id',$semester ,Input::old('degree_id'),['class'=>'form-control input-sm '])}}</div>

         <div  class="col-lg-3">{{ Form::label('degree_id', 'Degree') }}
         {{ Form::select('degree_id',$degree ,Input::old('degree_id'),['class'=>'form-control input-sm '])}}</div>


        <div  class="col-lg-3">{{ Form::label('dep_id', 'Department') }}
        {{ Form::select('dep_id',$department ,Input::old('dep_id'),['class'=>'form-control input-sm '])}}</div>


        {{--{{ Form::label('year_id', 'Year') }}--}}
        {{--{{ Form::select('year_id',$year) }}--}}
        <div  class="col-lg-3">{{ Form::label('year_id', 'Year') }}
        {{ Form::select('year_id',$year ,Input::old('year_id'),['class'=>'form-control input-sm '])}}</div>


        {{ Form::close() }}
   </div>
{{--</div>--}}


{{--<!-- for search box -->--}}
         {{--<div class="row m-t-sm">--}}
          {{--<div class="col-md-10">--}}
            {{--<section class="panel panel-default">--}}
              {{--<div class="panel-body">--}}

              {{--<div class="col-md-8 pull-right">--}}
               {{--<div class="wrapper text-right no-padder">--}}
               {{--{{ Form::open(array('class'=>'form-horizontal')) }}--}}

                       {{--<div>{{ Form::label('semester_id', 'Semester') }}</div>--}}
                       {{--<div class="col-lg-3">{{ Form::select('semester_id',$semester ,Input::old('degree_id'),['class'=>'form-control input-sm '])}}</div>--}}

                       {{--{{ Form::label('degree_id', 'Degree') }}--}}
                       {{--{{ Form::select('degree_id',$degree) }}--}}

                       {{--{{ Form::label('dep_id', 'Department') }}--}}
                       {{--{{ Form::select('dep_id',$department) }}--}}

                       {{--{{ Form::label('year_id', 'Year') }}--}}
                       {{--{{ Form::select('year_id',$year) }}--}}

                       {{--{{ Form::close() }}--}}
              {{--</div>--}}
            {{--</div>--}}
          {{--</div>--}}
        {{--</section>--}}
      {{--</div>--}}
    {{--</div>--}}

<table id="example1" class="table table-bordered table-striped">

<col width="120">
<col width="150">
<col width="100">
<col width="120">
<col width="50">
<col width="40">
<col width="180">


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

      @foreach($model as $value)
          <tr>
               <td>{{ $value->relCourse->title }}</td>
               <td>{{ $value->relDegree->title }}</td>
               <td>{{ $value->major_minor }}</td>
               <td>{{ $value->relCourse->relSubject->relDepartment->title }}</td>
               <td>{{ $value->relYear->title }}</td>
               <td>{{ $value->relSemester->title }}</td>
               <td>{{ $value->relUser->username }}</td>

               <td>
                   <a href="{{ URL::to('course_manage/show/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal"><span class="glyphicon glyphicon-eye-open text-danger"></span></a>
                   <a class="btn btn-xs btn-default" href="{{ URL::to('course_manage/edit/'.$value->id) }}" data-toggle="modal" data-target="#editModal" ><span class="glyphicon glyphicon-edit"></span></a>
                   {{--<a data-href="" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>--}}
               </td>

          </tr>
      @endforeach

</tbody>

</table>

<div class="pagination-tool">
        <div class="paginate-area">
            {{--Displaying <span style="color: red"> {{$viewCount}} </span> of {{$countAll}} entries.--}}
        </div>
        <div class="pull-right paginate-button">
            {{$courseDataList->links()}}
        </div>
</div>

</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>
</section>

{{---------------------------------------------------Modals-----------------------------------------------}}
 <!-- Modal :: add Information -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

       </div>
      </div>
 </div>

 <!-- Modal :: show Information -->
 <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">

        </div>
       </div>
  </div>

  <!-- Modal :: edit Information -->
   <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
           <div class="modal-content">

          </div>
         </div>
    </div>




@stop

{{--<script>--}}
             {{--$(document).ready(function() {--}}
                 {{--$('#example1').DataTable({--}}
{{--//                     "paging":   false,--}}
{{--//                     "oLanguage": {--}}
{{--//                          "sSearch": "Filter _INPUT_ ",--}}
{{--//                          "sInfoFiltered": " - filtered from ( _MAX_ ) items"--}}
{{--//                        }--}}
                 {{--});--}}
            {{--}--}}

         {{--</script>--}}