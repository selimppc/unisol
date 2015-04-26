@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <div class="box-body table-responsive ">
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <th>CourseName</th>
            <th>Department</th>
            <th>Year</th>
            <th>Semester</th>
            </thead>
            <tbody>
            @foreach($datas as $value)
                <tr>
                    <td>{{$value['relCourse']['title']}}</td>
                    <td>{{$value->relCourse->relSubject->relDepartment->title}}</td>
                    <td>{{$value['relYear']['title']}}</td>
                    <td>{{$value['relSemester']['title']}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @if(isset($coursetitle))
        <p>Marks Distribution Done.Following is the Distribution of Course : {{isset($coursetitle->relCourseConduct->relCourse->title) ? $coursetitle->relCourseConduct->relCourse->title: 'No Item Added!' }}</p>
    @else <p>Marks Distribution Is Not Done Yet.</p>
    @endif

    <p>Evaluation Total Marks:<b>{{ isset($coursetitle->relCourseConduct->relCourse->evaluation_total_marks) ? $coursetitle->relCourseConduct->relCourse->evaluation_total_marks : 'No Item Added!'}}</b></p>

    <p>So Far Added Marks:
        <b>@foreach($totalmarks as $value)
                {{ isset($value->marks) ? $value->marks : 'No Item Added!'}}
            @endforeach</b>
    </p>

    <div>&nbsp;</div>
    <div class="box-body table-responsive ">
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <th>Item</th>
            <th>Marks(%)</th>
            <th>Actual Marks</th>
            <th>Policy</th>
            <th>IsAttendance</th>
            </thead>
            <tbody>
            @foreach($config_data as  $dkey => $dvalue)

                <tr>
                    <td>{{$dvalue['relAcmMarksDistItem']['title']}}</td>
                    <td>{{(($dvalue->marks * 100)/$dvalue['relCourseConduct']['relCourse']['evaluation_total_marks'])}}</td>
                    <td>{{$dvalue->marks}}</td>
                    <td>{{$dvalue->acm_marks_policy}}</td>
                    <td>{{($dvalue->is_attendance == 1) ? 'Yes' : '';}}</td>
                </tr>
            @endforeach
            {{--@endif--}}
            </tbody>
        </table>
    </div>
    <p>If Marks Distribution Is Not Done Then Go to Distribution And Make It Done First.
        <button type="button" class="btn-xs btn text-maroon" style="background:#5CE6E6" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="left" title="Marks Distribution"> <i class="fa fa-plus text-purple"></i> Marks Distribution
        </button>
    </p>
    <div class="modal-footer">
        <a href="{{URL::to('academic/faculty/course/config')}}" class="pull-right btn-xs btn-success"> <i class="fa fa-arrow-circle-left"></i> Back</a>
    </div>
    <p>&nbsp;</p>

    <!-- add new Dist Item -->
    {{--<div id="myModal" class="modal fade"data-keyboard="false" data-backdrop="static">--}}
        {{--<div class="modal-dialog modal-lg">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-body">--}}
                    {{--{{ Form::open(array('url' => 'academic/faculty/marks/distribution/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}--}}
                    {{--@include('academic::faculty.mark_distribution_courses.show_marks_dist_to_insert')--}}
                    {{--{{ Form::close() }}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@stop
@section('script_section')
    <script>
        {{---------------------Faculty Marks Distribution----------------------------}}
//        $tableItemCounter = 0;//To stop additem if exist
//        var arrayItems=[];//To stop additem if exist
//
//        function editMarksListItem(itemid){
//            arrayItems.push(itemid);
//        }
//
//        function addMarksDistItem() {
//
//            var listItem = $('.addDistListItem').val();
//            var listItemTitle = $(".addDistListItem option:selected").text();
//
//            item_id = parseInt($(".addDistListItem option:selected").val());//To stop additem if exist
//            var index = $.inArray(item_id, arrayItems);//To stop additem if exist
//
//            //To stop additem if exist
//            if (index >= 0) {
//                alert("Already Added Marks Distribution Item!");
//
//            } else {
//                counter = $('#facultyMarksDist tr').length - 2; //get the sequence number of that table item
//                var course_id = $('.course_id').val();
//                var course_title = $('.course_title').val();
//                var course_evalution_marks = $('.course_evalution_marks').val();
//
//                var contentBody = $('.acm_marks_dist_list');
//                var trLen = $('.acm_marks_dist_list tr').length;
//
//                // Insert item_id as INT to array otherwise it may be added like string
//                arrayItems.push(parseInt(item_id));//To stop additem if exist
//
//                var str = '';
//                str += '<tr><input type="hidden" name="acm_config_id[]" value="" />';
//
//                str += '<td width="130"><input type="hidden" name="course_id[]" value="' + course_id + '" /><input type="hidden" name="acm_marks_dist_item_id[]" value="' + listItem + '" />' + listItemTitle + '</td>';
//
//                str += '<td><input type="text" name="marks_percent[]" class="amw_marks_percent' + trLen + '" onchange="calculateActualMarks(this.className, ' + course_evalution_marks + ',this.value)" required/> </td>';
//
//                str += '<td><input type="text" name="actual_marks[]" class="amw_actual_marks" /> </td>';
//
//                str += '<td><span></span></td>';
//
//                str += '<td><input type="radio" name="isDefault[]" value="' + counter + '" class="amw_isDefault" /></td>';
//
//                str += '<td><input type="radio" name="isAttendance[]" value="' + counter + '" class="amw_isAttendance' + trLen + '" /></td>';
//
//                str += '<td><select name="policy_id[]" class="form-control"><option value="">Select Option</option><option value="attendance">Attendance</option><option value="best_one">BestOne</option><option value="avarage">Average</option><option value="avarage_top_n">Average of Top N</option><option value="sum">Sum</option><option value="single">Single</option></select></td>';
//
//
//                str += '<td><a class="btn btn-default btn-sm" id="removedistTrId' + trLen + '" onClick="deleteMarkDistTr(this.id, 0)"><i class="fa  fa-trash-o" style="font-size: 15px;color: red"></i></a></td>';
//
//                str += '</tr>';
//
//                contentBody.append(str);
//            }
//        }
    </script>

@stop



