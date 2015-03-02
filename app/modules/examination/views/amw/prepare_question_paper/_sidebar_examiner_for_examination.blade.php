<div class="panel panel-default">
        <div class="panel-heading">
        </div>
        <div id="collapseTwo" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">

                    <tr>
                        <td>
                         <a href="{{ action('ExmAmwController@deshboard') }}"> Home </a> <span class="label label-success"></span>
                        </td>
                    </tr>

                    <tr>
                         <td>
                          <a href="{{ action('ExmAmwController@examination') }}"> Examination</a> <span class="label label-success"></span>
                         </td>
                    </tr>


                    {{--<tr>--}}
                         {{--<td>--}}
                          {{--<a href="{{ action('ExmAmwController@courses') }}"> Courses</a> <span class="label label-success"></span>--}}
                         {{--</td>--}}
                    {{--</tr>--}}

                    <tr>
                         <td>
                          <a href="{{ URL::to('examination/amw/examiners', ['year_id'=>$year_id,'semester_id'=>$semester_id,'course_management_id'=>$course_management_id,'acm_marks_dist_item_id'=>$acm_marks_dist_item_id]) }}"> Examiners</a> <span class="label label-success"></span>
                         </td>
                    </tr>


                    {{--<tr>--}}
                        {{--<td>--}}
                         {{--<a href="{{ action('ExmAmwController@index') }}"> Question Papers</a> <span class="label label-success"></span>--}}
                        {{--</td>--}}
                    {{--</tr>--}}

                     {{--<tr>--}}
                        {{--<td>--}}
                         {{--<a href="{{ action('ExmAmwController@questionList') }}"> Question List</a> <span class="label label-success"></span>--}}
                        {{--</td>--}}
                     {{--</tr>--}}

                </table>
            </div>
        </div>
</div>