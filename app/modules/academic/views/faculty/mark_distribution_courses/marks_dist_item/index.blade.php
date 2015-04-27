@extends('layouts.layout')
@section('sidebar')
    @include('academic::_sidebar')
@stop
@section('content')
    @if(isset($marks_dist_item_id))
        @if($marks_dist_item_id == 1)
            <h4 style="text-align: center ;color: #800080; font-size: large">All Class List</h4>
            <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#addItem" data-toggle="tooltip" data-placement="left" title="Add Class" style="margin-bottom: 5px">Add Class</button>
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
        @elseif($marks_dist_item_id == 2)
            <h4 style="text-align: center ;color: #800080; font-size: large">All Assignment List</h4>
            <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#addItem" data-toggle="tooltip" data-placement="left" title="Add Assignment" style="margin-bottom: 5px">Add Assignment</button>
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

                                {{--<a href="{{ URL::route('assign.assign',['id'=>$value->id, 'cmid'=>$value->course_management_id, 'marksid'=>$value->acm_marks_distribution_id,--}}
                                {{--'course_id'=>$value->relCourseManagement->course_id])  }}" class="btn btn-default btn-xs"> Assign </a>--}}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        @elseif($marks_dist_item_id == 3)
            <h4 style="text-align: center ;color: #800080; font-size: large">All Class Test List</h4>
            <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#addItem" data-toggle="tooltip" data-placement="left" title="Add Class Test"  style="margin-bottom: 5px">Add CT</button>
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

                                <a href="{{ URL::route('item.assign',['id'=>$value->id, 'cc_id'=>$value->course_conduct_id, 'marksid'=>$value->acm_marks_distribution_id,
                                'course_id'=>$value->relCourseConduct->course_id])  }}" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="left" title="Assign Student"><i class="fa fa-plus text-purple"></i> Assign</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        @elseif($marks_dist_item_id == 4)
            <h4 style="text-align: center ;color: #800080; font-size: large">All Mid Term List</h4>
            <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#addItem" data-toggle="tooltip" data-placement="left" title="Add Mid Term" style="margin-bottom: 5px;">Add MT</button>
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

                                {{--<a href="{{ URL::route('mid/term.assign',['id'=>$value->id, 'cmid'=>$value->course_management_id, 'marksid'=>$value->acm_marks_distribution_id,--}}
                                {{--'course_id'=>$value->relCourseManagement->course_id])  }}" class="btn btn-default btn-xs"> Assign </a>--}}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        @elseif($marks_dist_item_id == 5)
            <h4 style="text-align: center ;color: #800080; font-size: large">All Final Term List</h4>
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

                                {{--<a href="{{ URL::route('final/term.assign',['id'=>$value->id, 'cmid'=>$value->course_management_id, 'marksid'=>$value->acm_marks_distribution_id,--}}
                                {{--'course_id'=>$value->relCourseManagement->course_id])  }}" class="btn btn-default btn-xs"> Assign </a>--}}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
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