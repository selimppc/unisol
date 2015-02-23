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
            {{ Form::submit('Search',['class'=>'pull-right btn btn-sm btn btn-info']) }}
    {{--{{ HTML::linkAction('AdmAmwController@cmSearchView', 'Search') }}--}}
     {{--<a href="{{URL::to('course_manage/search_view') }} " class="btn btn-default" span class="glyphicon-refresh">Search</a>--}}
        </table>



        {{ Form::close() }}
     </div>

    {{-----------------------------------------------Search Form :Ends----------------------------------------------------------}}

    {{---------------------------------------------Data Table: Starts-----------------------------------------------------------------}}
    <table id="example1" class="table table-bordered table-striped">



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
    {{--{{$model}}--}}
          @foreach($model as $value)


              <tr>
              <td>{{ $value->relCourse->title }}</td>
              <td>{{ $value->relDegree->title}}</td>
              <td>{{ strtoupper($value->major_minor) }}</td>
              <td>{{  $value->relCourse->relSubject->relDepartment->title }}</td>
              <td>{{ $value->relYear->title }}</td>
              <td>{{ $value->relSemester->title }}</td>
              <td>{{ $value->relUser->relUserProfile->first_name.' '.$value->relUser->relUserProfile->last_name }}</td>
              <td>
                   <a href="{{ URL::to('course_manage/show/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal"><span class="glyphicon glyphicon-eye-open text-danger"></span></a>
                   <a class="btn btn-xs btn-default" href="{{ URL::to('degree_manage/edit/'.$value->id) }}" data-toggle="modal" data-target="#editModal" ><span class="glyphicon glyphicon-edit"></span></a>
                       {{--<a data-href="" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>--}}
              </td>

                {{--{{ $value->relCourse->title }}--}}
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

