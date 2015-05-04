@extends('layouts.layout')
@section('sidebar')
    @include('academic::_sidebar')
@stop
@section('content')

@if(isset($marks_dist_item_id))
@if($marks_dist_item_id == 1)

<h2 class="page-header text-purple tab-text-margin">Marks Distribution At Courses Item Class</h2>
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Class List</a></li>
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
                        <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#addItem" data-toggle="tooltip" data-placement="left" title="Add Class" style="margin-top: 15px;">Add Class</button>
                        <table id="example" class="table table-bordered table-hover table-striped">
                            <thead>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Class Date</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @if(isset($datas))
                                @foreach ($datas as $value)
                                    <tr>
                                        <td>{{isset($value->title)? $value->title :''}}</td>
                                        <td>{{isset($value->description) ? $value->description:''}}</td>
                                        <td>{{($value->status == 1) ? 'Active' : 'Inactive';}}</td>
                                        <td>{{isset($value->relAcmClassSchedule->day)? $value->relAcmClassSchedule->day : ''}}</td>
                                        <td>
                                            <a href="{{ URL::route('item.show', ['id'=>$value->id])}}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal"  data-toggle="tooltip" data-placement="left" title="Show Item"  href=""><i class="fa fa-eye" style="color: green"></i></a>

                                            <a href="{{ URL::route('item.edit', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#editModal"data-toggle="tooltip" data-placement="left" title="Edit Item"  href="" ><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    {{--<input type="button"  value="Back" onclick="window.history.go(-2)" />--}}
                </div>
            </div>
        </div>
        {{--<a href="{{ URL::route('coursemarksdist.show')}}" class="pull-right btn-xs btn-success"> <i class="fa fa-arrow-circle-left"></i> Back</a>--}}
        {{--<a class="pull-right btn btn-xs btn-primary" href="{{ URL::route('coursemarksdist.show')}}"> <i class="fa fa-arrow-circle-left"></i> Back</a>--}}
    </div>
</div>

@elseif($marks_dist_item_id == 2)

<h2 class="page-header text-purple tab-text-margin">Marks Distribution At Courses Item Assignment</h2>
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Assignment List</a></li>
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
                        <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#addItem" data-toggle="tooltip" data-placement="left" title="Add Assignment" style="margin-top: 15px">Add Assignment</button>
                        <table id="example" class="table table-bordered table-hover table-striped">
                            <thead>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Deadline</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @if(isset($datas))
                                @foreach ($datas as $value)
                                    <tr>
                                        <td>{{isset($value->title) ? $value->title: '' }}</td>
                                        <td>{{isset($value->description) ? $value->description: ''}}</td>
                                        <td>{{($value->status == 1) ? 'Active' : 'Inactive';}}</td>
                                        <td>{{isset($value->relAcmClassSchedule->day) ? $value->relAcmClassSchedule->day : ''}}</td>
                                        <td>
                                            <a href="{{ URL::route('item.show', ['id'=>$value->id])}}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal"  data-toggle="tooltip" data-placement="left" title="Show Item"  href=""><i class="fa fa-eye" style="color: green"></i></a>

                                            <a href="{{ URL::route('item.edit', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#editModal"data-toggle="tooltip" data-placement="left" title="Edit Item"  href="" ><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>

                                            <a href="{{ URL::route('item.assign',['id'=>$value->id, 'cc_id'=>$value->course_conduct_id, 'marksid'=>$value->acm_marks_distribution_id]) }}" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="left" title="Assign Student"><i class="fa fa-plus text-purple"></i> Assign</a>
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

@elseif($marks_dist_item_id == 3)

<h2 class="page-header text-purple tab-text-margin">Marks Distribution At Courses Item Class Test</h2>
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">CT List</a></li>
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
                        <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#addItem" data-toggle="tooltip" data-placement="left" title="Add Class Test"  style="margin-top: 15px">Add CT</button>
                        <table id="example" class="table table-bordered table-hover table-striped">
                            <thead>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Deadline</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @if(isset($datas))
                                @foreach ($datas as $value)
                                    <tr>
                                        <td>{{isset($value->title) ? $value->title : ''}}</td>
                                        <td>{{isset($value->description) ? $value->description : ''}}</td>
                                        <td>{{($value->status == 1) ? 'Active' : 'Inactive';}}</td>
                                        <td>{{isset($value->relAcmClassSchedule->day)? $value->relAcmClassSchedule->day : ''}}</td>
                                        <td>
                                            <a href="{{ URL::route('item.show', ['id'=>$value->id])}}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal"  data-toggle="tooltip" data-placement="left" title="Show Item"  href=""><i class="fa fa-eye" style="color: green"></i></a>

                                            <a href="{{ URL::route('item.edit', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#editModal"data-toggle="tooltip" data-placement="left" title="Edit Item"  href="" ><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>

                                            <a href="{{ URL::route('item.assign',['id'=>$value->id, 'cc_id'=>$value->course_conduct_id, 'marksid'=>$value->acm_marks_distribution_id]) }}" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="left" title="Assign Student"><i class="fa fa-plus text-purple"></i> Assign</a>
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

@elseif($marks_dist_item_id == 4)

    <h2 class="page-header text-purple tab-text-margin">Marks Distribution At Courses Item Mid Term</h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">MT List</a></li>
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
                            <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#addItem" data-toggle="tooltip" data-placement="left" title="Add Mid Term" style="margin-top: 15px;">Add MT</button>
                            <table id="example" class="table table-bordered table-hover table-striped">
                                <thead>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Deadline</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @if(isset($datas))
                                    @foreach ($datas as $value)
                                        <tr>
                                            <td>{{isset($value->title) ? $value->title :''}}</td>
                                            <td>{{isset($value->description) ? $value->description:''}}</td>
                                            <td>{{($value->status == 1) ? 'Active' : 'Inactive';}}</td>
                                            <td>{{isset($value->relAcmClassSchedule->day) ? $value->relAcmClassSchedule->day : ''}}</td>
                                            <td>
                                                <a href="{{ URL::route('item.show', ['id'=>$value->id])}}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal"  data-toggle="tooltip" data-placement="left" title="Show Item"  href=""><i class="fa fa-eye" style="color: green"></i></a>

                                                <a href="{{ URL::route('item.edit', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#editModal"data-toggle="tooltip" data-placement="left" title="Edit Item"  href="" ><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>

                                                <a href="{{ URL::route('item.assign',['id'=>$value->id, 'cc_id'=>$value->course_conduct_id, 'marksid'=>$value->acm_marks_distribution_id]) }}" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="left" title="Assign Student"><i class="fa fa-plus text-purple"></i> Assign</a>
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

@elseif($marks_dist_item_id == 5)

<h2 class="page-header text-purple tab-text-margin">Marks Distribution At Courses Item Final Term</h2>
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">FT List</a></li>
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
                        <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#addItem" data-toggle="tooltip" data-placement="left" title="Add Final Term" style="margin-bottom: 5px">Add FT</button>
                        <table id="example" class="table table-bordered table-hover table-striped">
                            <thead>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Deadline</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @if(isset($datas))
                                @foreach ($datas as $value)
                                    <tr>
                                        <td>{{isset($value->title) ? $value->title :''}}</td>
                                        <td>{{isset($value->description) ? $value->description:''}}</td>
                                        <td>{{($value->status == 1) ? 'Active' : 'Inactive';}}</td>
                                        <td>{{isset($value->relAcmClassSchedule->day) ? $value->relAcmClassSchedule->day : ''}}</td>
                                        <td>
                                            <a href="{{ URL::route('item.show', ['id'=>$value->id])}}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal"  data-toggle="tooltip" data-placement="left" title="Show Item"  href=""><i class="fa fa-eye" style="color: green"></i></a>

                                            <a href="{{ URL::route('item.edit', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#editModal"data-toggle="tooltip" data-placement="left" title="Edit Item"  href="" ><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>

                                            <a href="{{ URL::route('item.assign',['acm_id'=>$value->id, 'cc_id'=>$value->course_conduct_id, 'marksid'=>$value->acm_marks_distribution_id]) }}" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="left" title="Assign Student"><i class="fa fa-plus text-purple"></i> Assign</a>
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
@endif
@endif

    {{--All Modal--}}
    {{---------------------------------------------}}
    <!-- Add New class Modal -->
    <div id="addItem" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
                    <h4 class="modal-title" style="text-align: center;color: #800080;font-size:large">Add Item
                    </h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('url' => 'academic/faculty/marksdistitem/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
                    {{ Form::hidden('course_conduct_id', $course_con_id, ['class'=>'form-control course_conduct_id'])}}
                    {{ Form::hidden('marks_dist_id',$marks_dist, ['class'=>'form-control marks_dist_id'])}}
                    @include('academic::faculty.mark_distribution_courses.marks_dist_item._form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    {{--Show single class info --}}
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Edit Class Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop
@section('script_section')
    <script>
        function deleteAcaDetailsImage(getId, acaId)
        {
            var aca_details_id = acaId;
            var url = '{{URL::to('academic/faculty/acadetailsdelete/ajax')}}' ;
            var token = $('.edit_modal_aca').find('input[name="_token"]').val();
            //console.log(url);
            if(aca_details_id > 0){

                var check = confirm("Are you sure to delete this item??");
                if(check)
                {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {aca_academic_details_id: aca_details_id, token: token}
                    })
                            .done(function(msg) {
                                console.log(msg);
                                var whichtr = $('#'+getId).closest("p");
                                whichtr.fadeOut(500).remove();
                            });
                }
                else
                {
                    return false;
                }
            }
        }
    </script>

@stop