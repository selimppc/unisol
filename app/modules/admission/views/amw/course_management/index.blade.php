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

<br>
{{--<div class="search">--}}
        {{--{{ Form::model(null) }}--}}
        {{--{{ Form::text('query', null, array('class' => 'form-control', 'placeholder' => 'Search query...', 'required'=>'required' )) }}--}}
        {{--{{ Form::submit('Search', array('class'=>"btn btn-success")) }}--}}
        {{--{{ Form::close() }}--}}
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
               <td></td>

               <td>
                   <a href="{{ URL::to('course_manage/show/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal"><span class="glyphicon glyphicon-eye-open text-danger"></span></a>
                   <a class="btn btn-xs btn-default" href="{{ URL::to('course_manage/edit/'.$value->id) }}" data-toggle="modal" data-target="#editModal" ><span class="glyphicon glyphicon-edit"></span></a>
                   {{--<a data-href="" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>--}}
               </td>

          </tr>
      @endforeach

</tbody>

</table>
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