@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
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
                                @if(isset($datas))
                                    @foreach ($datas as $value)
                                        <tr>
                                            <td><a href="{{ URL::route('coursemarksdist.show', ['cc_id'=>$value->id,'course_id'=>$value->course_id])  }}" class=" btn-link">{{isset($value->relCourse->title) ?$value->relCourse->title : ''}}</a></td>
                                            <td>{{isset($value->relCourse->relSubject->relDepartment->title) ? $value->relCourse->relSubject->relDepartment->title :''}}</td>
                                            <td>{{isset($value->relYear->title)? $value->relYear->title: ''}}</td>
                                            <td>{{isset($value->relSemester->title)? $value->relSemester->title : ''}}</td>
                                            <td>{{ AcmMarksDistribution::getMarksDistItemStatus($value->id, $value->relCourse->evaluation_total_marks) }}</td>

                                            <td>
                                                <a href="{{ URL::route('marksdistfind.show', ['course_id'=>$value->course_id,'cc_id'=>$value->id])}}"class="btn btn-xs btn-default" data-toggle="modal" data-target="#addModal" data-toggle="tooltip" data-placement="left" title="Marks Distribution" href=""><i class="fa fa-plus text-purple"></i> Marks Distribution</a>

                                                <a href="{{ URL::route('marksdist.show', ['cc_id'=>$value->id])}}" class="btn btn-xs btn-default text-blue" data-toggle="modal" data-target="#showMarksDist" data-toggle="tooltip" data-placement="left" title="Show Distribution" href=""><i class="fa fa-eye text-green "></i> View Distribution</a>
                                            </td>
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
    </div>


    {{--Start all modal for amw--}}
    {{---------------------------------------------}}

    <!-- Add New marks dist Item Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true" data-keyboard="false" data-backdrop="static" >
        <div class="modal-dialog modal-lg">
            {{--<div class="modal-dialog" style="width: 980px; height: 350px;">--}}
            <div class="modal-content ">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div>

    <!-- Show marks_distribution Modal -->
    <div class="modal fade" id="showMarksDist" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop

@section('script_section')
    <script>

        /*ratna_script.js*/

        {{---------------------Faculty Marks Distribution----------------------------}}
        {{------------------------Ajax delete in modal----------------------}}

       /* function deleteMarkDistTr(getId, distId) {

            var is_marksdist_id = distId;

            if (is_marksdist_id > 0) {

                var check = confirm("Are you sure to delete this item??");
                if (check) {
                    $.ajax({
                        url: 'academic/faculty/marksdist/acmmarksdistdelete/ajax',
                        type: 'POST',
                        dataType: 'json',
                        data: {acm_marks_distribution_id: is_marksdist_id}
                    })
                            .done(function (msg) {
                                //console.log(msg);
                                var whichtr = $('#' + getId).closest("tr");
                                whichtr.fadeOut(500).remove();
                                arrayItems.pop(getId);//To stop additem if exist
                            });
                }
                else {
                    return false;
                }
            } else {
                //if acm_course_config id not found jst remove the tr form the popup. that not delete the data form the db.
                var whichtr = $('#' + getId).closest("tr");
                whichtr.fadeOut(500).remove();
                arrayItems.pop(getId);//To stop additem if exist
            }
        }*/

    </script>

@stop
