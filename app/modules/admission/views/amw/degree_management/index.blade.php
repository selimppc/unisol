@extends('layouts.master')
@section('sidebar')
    {{--@include('applicant::_sidebar')--}}
@stop
@section('content')


<section class="content">
<div class="box-body">

<h3> Degree Management </h3>



<a class="pull-right btn btn-sm btn-info" href="{{ URL::to('degree_manage/create')}}" data-toggle="modal" data-target="#addModal" >Add New Degree</a>


</div>
<div class="row">
<div class="col-xs-12">

<div class="box">
<div class="box-header">

</div><!-- /.box-header -->
{{--<div class="box-body table-responsive">--}}

<br>

{{---------------------------------------------Data Table: Starts-----------------------------------------------------------------}}
<table id="example1" class="table table-bordered table-striped">

<col width="120">
<col width="120">
<col width="100">
<col width="120">
<col width="50">
<col width="40">
<col width="130">


<thead>
<tr>

   <th>Title</th>
   <th>Department</th>
   <th>Year</th>
   <th>Semester</th>
   <th>Credit</th>
   <th>Duration</th>
   <th>Status</th>
   <th>Action</th>

</tr>
</thead>
<tbody>

      {{--@foreach($model as $value)--}}


          {{--<tr>--}}
          {{--<td>{{ $value->relCourse->title }}</td>--}}
          {{--<td>{{ $value->relDegree->title}}</td>--}}
          {{--<td>{{ strtoupper($value->major_minor) }}</td>--}}
          {{--<td>{{  $value->relCourse->relSubject->relDepartment->title }}</td>--}}
          {{--<td>{{ $value->relYear->title }}</td>--}}
          {{--<td>{{ $value->relSemester->title }}</td>--}}
          {{--<td>{{ $value->relUser->relUserProfile->first_name.' '.$value->relUser->relUserProfile->last_name }}</td>--}}
          {{--<td>--}}
               {{--<a href="{{ URL::to('course_manage/show/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal"><span class="glyphicon glyphicon-eye-open text-danger"></span></a>--}}
               {{--<a class="btn btn-xs btn-default" href="{{ URL::to('course_manage/edit/'.$value->id) }}" data-toggle="modal" data-target="#editModal" ><span class="glyphicon glyphicon-edit"></span></a>--}}
                  {{----}}
          {{--</td>--}}

            {{----}}
          {{--</tr>--}}
      {{--@endforeach--}}

</tbody>

</table>
{{-----------------------------------Data Table : Ends---------------------------------------------------------------------------}}

{{--------Pagination Link--------------------------}}
<div class="pull-right paginate-button">
    {{--{{$model->links()}}--}}
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

