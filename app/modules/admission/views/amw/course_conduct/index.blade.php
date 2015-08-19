@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
 @include('layouts._sidebar_amw')
@stop

@section('content')


 <div class="box box-solid ">
        <div class="box box-info">
              <div class="box-header">
              <h3 class="box-title">Course Management</h3>
                  <div class="box-tools pull-right">
                       <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('admission/amw/course_conduct/create')}}" data-toggle="modal" data-target="#addModal" >Add New Course</a>
                  </div>
              <p>&nbsp;</p>
              </div>
              <div class="box-body">
                   <div class="row">
                       <div class="col-lg-12">
                          <table class="table table-bordered">
                                 <thead>
                                         <tr>
                                            <th>Course Title</th>
                                            <th>Course Code</th>
                                            <th>Department</th>
                                            {{--<th>Action</th>--}}
                                         </tr>
                                 </thead>
                                        <tbody>
                                              @if(isset($model))
                                                    @foreach($model as $value)
                                                        <tr>
                                                            <td>{{ $value->title }}</td>
                                                            {{--<td>{{ $value->relDegree->title}}</td>--}}
                                                            {{--<td>{{ strtoupper($value->major_minor) }}</td>--}}
                                                            {{--<td>{{ $value->relCourse->relSubject->relDepartment->title }}</td>--}}
                                                            {{--<td>{{ $value->relYear->title }}</td>--}}
                                                            {{--<td>{{ $value->relSemester->title }}</td>--}}
                                                            {{--<td>{{User::FullName($value->user_id)}}</td>--}}

                                                            {{--<td>--}}
                                                                 {{--<a href="{{ URL::to('course_manage/show/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal"><span class="fa fa-eye"></span></a>--}}
                                                                 {{--<a class="btn btn-xs btn-default" href="{{ URL::to('course_manage/edit/'.$value->id) }}" data-toggle="modal" data-target="#editModal" ><i class="fa fa-edit"></i></a>--}}
                                              {{----}}
                                                            {{--</td>--}}
                                                        </tr>
                                                    @endforeach
                                              @endif
                                        </tbody>
                          </table>
                       </div>
                   </div>
              </div>
        </div>
 </div>


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

       </div>
      </div>
 </div>
@stop