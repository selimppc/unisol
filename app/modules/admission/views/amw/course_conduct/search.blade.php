@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
    @section('sidebar')
        {{--@include('applicant::_sidebar')--}}
    @stop
@section('content')


<section class="content">
<div class="box-body">

<h3> Course Management </h3>



{{--<a class="pull-right btn btn-sm btn-info" href="{{ URL::to('course_manage/create')}}" data-toggle="modal" data-target="#addModal" >Add New Course</a>--}}


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

        {{ Form::open(array('url'=>'course_manage/search','class'=>'form-horizontal')) }}

         <div  class="col-lg-3">{{ Form::label('search_department', 'Department') }}
         {{ Form::select('search_department', $department , Input::old('search_semester'),['class'=>'form-control input-sm '])}}</div>

        <div  class="col-lg-2">{{ Form::label('search_semester', 'Semester') }}
        {{ Form::select('search_semester', $semester ,Input::old('search_semester'),['class'=>'form-control input-sm '])}}</div>

        <div  class="col-lg-2">{{ Form::label('search_year', 'Year') }}
        {{ Form::select('search_year', $year ,Input::old('search_year'),['class'=>'form-control input-sm '])}}</div>

        <div  class="col-lg-3">{{ Form::label('search_degree', 'Degree') }}
        {{ Form::select('search_degree', $degree ,Input::old('search_degree'),['class'=>'form-control input-sm '])}}</div>


<br>
        {{ Form::submit('Search ', array('class'=>'pull-right btn btn-sm btn btn-info')) }}

    </table>



    {{ Form::close() }}
 </div>

{{-----------------------------------------------Search Form :Ends----------------------------------------------------------}}

{{---------------------------------------------Data Table: Starts-----------------------------------------------------------------}}
@if ($model->count())
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
                    <td>{{ Course::where('id', '=', $value->course_id)->first()->title; }}</td>
                    <td>{{ Degree::where('id','=',$value->deg_id)->first()->title;}}</td>
                     <td>{{ strtoupper($value->major_minor) }}</td>
                     <td>{{ Department::where('id', '=', $value->dept_id)->first()->title }}</td>
                     <td>{{Year::where('id', '=', $value->yr_id)->first()->title;  }}</td>
                     <td>{{ Semester::where('id', '=', $value->sem_id)->first()->title; }}</td>
                     <td>{{User::FullName($value->user_id)}}</td>
                     <td>
                         <a href="{{ URL::to('course_manage/show/'.$value->id) }}" class="btn btn-xs btn-default" data- toggle="modal" data-target="#showModal"><span class="glyphicon glyphicon-eye-open text-danger"></span></a>
                         <a class="btn btn-xs btn-default" href="{{ URL::to('course_manage/edit/'.$value->id) }}" data- toggle="modal" data-target="#editModal" ><span class="glyphicon glyphicon-edit"></span></a>
                     </td>
                </tr>
          @endforeach
     </tbody>


</table>
@else

     <div class="col-xs-12" style="text-align: center;">

          No data found !
          <span class="btn btn-xs btn btn-info" style="color: #e02222;">{{ HTML::linkAction('AdmAmwController@index' ,'View All'  ) }}</span>

     </div>
@endif

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


@stop

