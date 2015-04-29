@extends('layouts.layout')

@section('sidebar')
 @include('layouts._sidebar_student')
@stop
@section('content')

<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('academic.student.courses.index')}}"><b><i class="fa fa-arrow-circle-left"></i>Go Back</b></a>

<div class="wrapper row-offcanvas row-offcanvas-left">

    <h2 class="page-header">Course : {{isset($courses) ? $courses->relBatchCourse->relCourse->title : ''}}</h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Obtained Marks </a></li>
                    <li><a href="#tab_2" data-toggle="tab">Class</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Class Test</a></li>
                    <li><a href="#tab_4" data-toggle="tab">Assignment</a></li>
                    <li><a href="#tab_5" data-toggle="tab">Mid Term</a></li>
                    <li><a href="#tab_6" data-toggle="tab">Term Final</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Settings  <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            {{--<li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>--}}
                            {{--<li role="presentation" data-toggle="modal" data-target="#addResearchReview"><a role="menuitem" tabindex="-1" href="#"> Add Journal </a></li>--}}
                        </ul>
                    </li>
                    <li class="pull-right" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>
                            <li role="presentation" data-toggle="modal" data-target="#addResearchReview"><a role="menuitem" tabindex="-1" href="#"> Add Journal </a></li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive"><p>&nbsp;</p>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <tr>
                                            <th>Item</th>
                                            <th>Obtain</th>
                                            <th>Out To</th>
                                        </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                   @if(isset($courses))
                                       @foreach($courses as $c => $v)
                                             <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                             </tr>
                                       @endforeach
                                   @endif
                                </tbody>

                            </table>
                        </div><!-- /.box -->
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <div class="box-body table-responsive"><p>&nbsp;</p>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Class Date</th>
                                    <th>View Status </th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                   {{--@if(isset($acm_academic_item))--}}
                                      {{--@foreach($acm_academic_item as $value)--}}
                                            {{--<tr>--}}
                                               {{--<td>{{$value->title}}</td>--}}
                                               {{--<td>{{$value->relAcmClassSchedule->relAcmClassTime->start_time}}</td>--}}
                                               {{--<td></td>--}}
                                               {{--<td></td>--}}
                                            {{--</tr>--}}
                                      {{--@endforeach--}}
                                   {{--@endif--}}
                                </tbody>

                            </table>
                        </div><!-- /.box -->
                    </div><!-- /.tab-pane -->

                </div><!-- /.tab-content -->
                {{-----------------------Class Test --------------------------------}}

                {{------------------------------------------------------}}
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->
    </div> <!-- /.row -->
    <!-- END CUSTOM TABS -->
</div><!-- ./wrapper -->

@stop
