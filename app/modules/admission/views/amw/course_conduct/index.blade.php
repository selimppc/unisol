@extends('layouts.layout')

@section('sidebar')
 @include('layouts._sidebar_amw')
@stop

@section('content')


 <div class="box box-solid ">
        <div class="box box-info">
              <div class="box-header">
              <h3 class="box-title">Course Management</h3>
                  <div class="box-tools pull-right">
                       <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('course_manage/create')}}" data-toggle="modal" data-target="#addModal" >Add New Course</a>
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
                                            <th>Action</th>
                                         </tr>
                                 </thead>
                                        <tbody>

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