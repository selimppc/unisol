@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <table class="table table-bordered">
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
    @if(isset($coursetitle))
        <p>Marks Distribution Done.Following is the Distribution of Course : {{isset($coursetitle->relCourse->title) ? $coursetitle->relCourse->title: 'No Item Added!' }}</p>
    @else <p>Marks Distribution Is Not Done Yet.</p>
    @endif
    <p>Evaluation Total Marks:
        <b>{{ isset($coursetitle->relCourse->evaluation_total_marks) ? $coursetitle->relCourse->evaluation_total_marks : 'No Item Added!'}}</b>
    </p>
    <p>So Far Added Marks:
        <b>@foreach($totalmarks as $value)
                {{ isset($value->marks) ? $value->marks : 'No Item Added!'}}
            @endforeach</b>
    </p>
    <table class="table table-bordered">
        <thead>
        <th>Item</th>
        <th>Marks(%)</th>
        <th>Actual Marks</th>
        <th>IsAttendance</th>
        </thead>
        <tbody>
        @foreach($config_data as  $dkey => $dvalue)
            <tr>
                <td>{{$dvalue['relAcmMarksDistItem']['title']}}</td>
                <td>{{(($dvalue->marks * 100)/$dvalue['relCourse']['evaluation_total_marks'])}}</td>
                <td>{{$dvalue->marks}}</td>
                <td>{{($dvalue->is_attendance == 1) ? 'Yes' : '';}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p>If Marks Distribution Is Not Done Then Go to Distribution And Make It Done First.
        <button type="button" class="btn-xs btn btn-facebook" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="left" title="Marks Distribution"><i class="fa fa-plus text-green"></i> Marks Distribution
        </button>
    </p>
    <div class="modal-footer">
        <a href="{{URL::to('academic/amw/config/')}}" class="pull-right btn-xs btn-success"> <i class="fa fa-arrow-circle-left"></i> Back</a>
    </div>
    <p>&nbsp;</p>

    {{--<!-- add new Dist Item -->--}}
    <div id="myModal" class="modal fade"data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    {{ Form::open(array('url' => 'academic/amw/course/marks/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
                    @include('academic::amw.mark_distribution_courses.show_course_to_insert')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@stop

@section('script_section')
    <script>
        {{---------------------AMW Marks Distribution----------------------------}}

        $tableItemCounter = 0;//To stop additem if exist
        var arrayItems=[];//To stop additem if exist

        function editCourseListItem(itemid){
            arrayItems.push(itemid);
        }

        function addCourseListItem(){

            var listItem = $('.addConfigListItem').val();
            var listItemTitle = $( ".addConfigListItem option:selected" ).text();

            item_id = parseInt($( ".addConfigListItem option:selected" ).val());//To stop additem if exist
            var index = $.inArray(item_id, arrayItems);//To stop additem if exist

            //To stop additem if exist
            if(index>=0){
                alert("Already Added!");
                return;
            }else{
                counter = $('#amwCourseConfig tr').length - 2; //get the sequence number of that table item

                var course_id = $('.course_id').val();
                var course_title = $('.course_title').val();
                var course_evalution_marks = $('.course_evalution_marks').val();

                var contentBody = $('.acm_course_config_list');
                var trLen = $('.acm_course_config_list tr').length;

                // Insert item_id as INT to array otherwise it may be added like string
                arrayItems.push(parseInt(item_id));//To stop additem if exist

                var str = '';
                str += '<tr><input type="hidden" name="acm_config_id[]" value="" />';

                str += '<td width="130"><input type="hidden" name="course_id[]" value="'+course_id+'" /><input type="hidden" name="acm_marks_dist_item_id[]" value="'+listItem+'" />'+listItemTitle+'</td>';

                str += '<td><input type="text" name="marks_percent[]" class="amw_marks_percent'+trLen+'" onchange="calculateActualMarks(this.className, '+course_evalution_marks+',this.value)" required/> </td>';

                str += '<td><input type="text" name="actual_marks[]" class="amw_actual_marks" /> </td>';

                str += '<td><span><input type="checkbox" name="isReadOnly[]" value="'+counter+'" class="amw_isReadOnly"/></span></td>';

                str += '<td><input type="radio" name="isDefault[]" value="'+counter+'" class="amw_isDefault" /></td>';

                str += '<td><input type="radio" name="isAttendance[]" value="'+counter+'" class="amw_isAttendance'+trLen+'" /></td>';

                str += '<td><a class="btn btn-default btn-sm" id="removeTrId'+trLen+'" onClick="deleteNearestTr(this.id, 0)"><i class="fa  fa-trash-o" style="font-size: 15px;color: red"></i></a></td>';

                str += '</tr>';

                contentBody.append(str);
            }

        }

        {{---------------------amw ajax delete in popup----------------------------}}

        function deleteNearestTr(getId, acmId)
        {
            var is_config_id = acmId;
            var url = '{{URL::to('academic/amw/config/acmconfigdelete/ajax')}}' ;
            console.log(url);
            if(is_config_id > 0){

                var check = confirm("Are you sure to delete this item??");
                if(check)
                {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {acm_course_config_id: is_config_id}
                    })
                            .done(function(msg) {
                                console.log(msg);
                                var whichtr = $('#'+getId).closest("tr");
                                whichtr.fadeOut(500).remove();
                                arrayItems.pop(getId);//To stop additem if exist
                            });
                }
                else
                {
                    return false;
                }

            }else{
                //if acm_course_config id not found jst remove the tr form the popup. that will not delete the data form the db.
                var whichtr = $('#'+getId).closest("tr");
                whichtr.fadeOut(500).remove();
                arrayItems.pop(getId);//To stop additem if exist
            }

        }
    </script>

@stop