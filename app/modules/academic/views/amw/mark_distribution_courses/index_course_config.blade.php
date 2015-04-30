@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
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
                                <tr>
                                    <th>CourseName</th>
                                    <th>Department</th>
                                    <th>Year</th>
                                    <th>Semester</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($course as $value)
                                <tr>
                                <td><a href="{{ URL::route('config.show', ['course_id'=>$value->course_id])  }}" class="btn-link">{{$value->relCourse->title}}</a></td>

                                <td>{{$value->relCourse->relSubject->relDepartment->title}}</td>
                                <td>{{$value->relYear->title}}</td>
                                <td>{{$value->relSemester->title}}</td>
                                <td>{{ AcmCourseConfig::getCourseItemStatus($value->course_id, $value->relCourse->evaluation_total_marks) }}</td>
                                <td>
                                <a href="{{ URL::route('coursefind.show', ['course_id'=>$value->course_id])  }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#addNew" data-toggle="tooltip" data-placement="left" title="Marks Distribution" href=""><i class="fa fa-plus text-purple"></i> Marks Distribution</a>

                                <a href="{{ URL::route('dist.show', ['id'=>$value->course_id]) }}" class="btn btn-xs btn-default text-blue" data-toggle="modal" data-target="#marksDistModal" data-toggle="tooltip" data-placement="left" title="Show Distribution" href=""><i class="fa fa-eye text-green "></i> View Distribution</a>
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
    <!-- Add New Item Modal -->
    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">


            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- Show course marksdistribution Modal -->
    <div class="modal fade" id="marksDistModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop


@section('script_section')
    <script>
          //---------------------AMW Marks Distribution----------------------------}}

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

      //---------------------amw ajax delete in popup----------------------------}}

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

         //---------AMW Course_config Course calculate ActualMarks in text filed------}}

          function calculateActualMarksAmw(class_name, course_evalution_marks, selected_percent_marks)
          {
              var total = (selected_percent_marks/100)*course_evalution_marks;
              var actual_marks = $('.'+class_name).closest('tr').find('.amw_actual_marks').val(total);
              // console.log(class_name+"//"+total);
          }

    </script>

@stop