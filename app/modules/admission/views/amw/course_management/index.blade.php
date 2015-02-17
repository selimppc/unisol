@extends('layouts.master')
@section('sidebar')
    {{--@include('applicant::_sidebar')--}}
@stop
@section('content')


<section class="content">
<div class="box-body">

<h3> Course Management </h3>

<a class="pull-right btn btn-sm btn-info" href="{{ URL::to('course_manage/create')}}" data-toggle="modal" data-target="#addModal" >Add New Course</a>


</div>
<div class="row">
<div class="col-xs-12">

<div class="box">
<div class="box-header">

</div><!-- /.box-header -->
{{--<div class="box-body table-responsive">--}}

<br>
{{-----------------------------------Search Form :Starts---------------------------------------------------------------}}

 <div class="well well-lg">

    <table id="example1">

        {{ Form::open(array('class'=>'form-horizontal')) }}

        <div  class="col-lg-2">{{ Form::label('semester_id', 'Semester') }}
        {{ Form::select('semester_id',$semester ,Input::old('degree_id'),['class'=>'form-control input-sm '])}}</div>

         <div  class="col-lg-3">{{ Form::label('degree_id', 'Degree') }}
         {{ Form::select('degree_id',$degree ,Input::old('degree_id'),['class'=>'form-control input-sm '])}}</div>


        <div  class="col-lg-3">{{ Form::label('dep_id', 'Department') }}
        {{ Form::select('dep_id',$department ,Input::old('dep_id'),['class'=>'form-control input-sm '])}}</div>

        <div  class="col-lg-2">{{ Form::label('year_id', 'Year') }}
        {{ Form::select('year_id',$year ,Input::old('year_id'),['class'=>'form-control input-sm '])}}</div>

<br><br><br>
         <div class="col-lg-2">
         {{ Form::submit('Search ',['class'=>'form-control input-sm  '] ) }}
         </div>




    </table>
    {{ Form::close() }}
 </div>

{{-----------------------------------------------Search Form :Ends----------------------------------------------------------}}

{{---------------------------------------------Data Table: Starts-----------------------------------------------------------------}}
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
{{-----------------------------------Data Table : Ends---------------------------------------------------------------------------}}

{{--------Pagination Link--------------------------}}
<div class="pull-right paginate-button">
    {{$model->links()}}
</div>


{{--</div><!-- /.box-body -->--}}
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