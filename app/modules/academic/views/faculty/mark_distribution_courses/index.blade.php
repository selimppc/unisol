@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_faculty')
@stop
@section('content')
    <h2 class="page-header text-purple tab-text-margin">Marks Distribution At Courses</h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Course List</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Settings  <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> </a></li>
                        </ul>
                    </li>
                    <li class="pull-right" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive ">
                            <table id="example" class="table table-bordered table-hover table-striped">
                                <thead>
                                <th>CourseName</th>
                                <th>Department</th>
                                <th>Year</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach ($datas as $value)
                                <tr>
                                    <td><a href="{{ URL::route('coursemarksdist.show', ['cm_id'=>$value->id])  }}" class=" btn-link">{{$value->relCourse->title}}</a></td>
                                    <td>{{$value->relCourse->relSubject->relDepartment->title}}</td>
                                    <td>{{$value->relYear->title}}</td>
                                    <td>{{$value->relSemester->title}}</td>
                                    {{--<td>{{ AcmMarksDistribution::getMarksDistItemStatus($value->id, $value->relCourse->evaluation_total_marks) }}</td>--}}
                                    <td></td>
                                    <td>
                                        <a href="{{ URL::route('marksdistfind.show', ['course_id'=>$value->course_id])  }}"class="btn btn-xs btn-default" data-toggle="modal" data-target="#addModal" data-toggle="tooltip" data-placement="left" title="Marks Distribution" href=""><i class="fa fa-plus text-purple"></i> Marks Distribution</a>

                                        <a href="{{ URL::route('marksdist.show', ['cm_id'=>$value->id])}}" class="btn btn-xs btn-default text-blue" data-toggle="modal" data-target="#showMarksDist" data-toggle="tooltip" data-placement="left" title="Show Distribution" href=""><i class="fa fa-eye text-green "></i> View Distribution</a>
                                    </td>
                                </tr>
                               @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--Start all modal for amw--}}
    {{---------------------------------------------}}

    <!-- Add New marks dist Item Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            {{--<div class="modal-dialog" style="width: 980px; height: 350px;">--}}
            <div class="modal-content ">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div>

    <!-- Show marks_distribution Modal -->
    <div class="modal fade" id="showMarksDist" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop