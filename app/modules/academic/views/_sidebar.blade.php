<div class="panel panel-default">
    @if((Role::find(Auth::user()->get()->role_id)->title)=='amw')
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-user">
            </span>You are loggged in as <strong>{{ ucwords(Auth::user()->get()->username) }} </strong></a>
            </h4>
        </div>
        {{-- sidebar for courseconfig for amw--}}
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <a href="{{ action('AcmAmwController@amw_index') }}">Marks Distribution Item</a> <span class="label label-success"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ action('AcmAmwController@config_index') }}">Course Config</a> <span class="label label-info"></span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        {{--End courseconfig--}}

    @elseif((Role::find(Auth::user()->get()->role_id)->title)=='faculty')
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-in">
            </span>You loggged in as <strong>{{ ucwords(Auth::user()->get()->username) }} </strong></a>
            </h4>
        </div>
        {{-- sidebar for marks distribution at courses and item for faculty--}}
        <div id="collapseTwo" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <a href="{{ action('AcmFacultyController@index') }}">Courses</a> <span class="label label-success"></span>
                        </td>
                    </tr>
                    @if(isset($data))
                        @foreach($data as $key => $value)
                            <tr>
                                <td style="color:#669900;font-weight: bold">{{$value['relCourse']['title']}}</td>
                            </tr>
                        @endforeach
                    @endif

                    @if(isset($config_data))
                        @foreach($config_data as  $dkey => $dvalue)
                            <tr>
                                <td>
                                    <?php
                                    $check_array = array(1,2,3,4,5);
                                    $marks_dist_item_id = $dvalue['relAcmMarksDistItem']['id'];
                                    $marks_dist_id = $dvalue->id;
                                    $course_management_id = $dvalue['course_management_id'];
                                    $url_link = '';
                                    ?>
                                    @if(in_array($marks_dist_item_id, $check_array))
                                        <?php
                                        switch ($marks_dist_item_id) {
                                            case 1:
                                                $url_link = 'academic/faculty/marksdistitem/class/'.$marks_dist_id.'/'.$course_management_id;
                                                break;
                                            case 2:
                                                $url_link = 'academic/faculty/marks/dist/item/assignment/'.$marks_dist_id.'/'.$course_management_id;
                                                break;
                                            case 3:
                                                $url_link = 'academic/faculty/marks/dist/item/class_test/'.$marks_dist_id.'/'.$course_management_id;
                                                break;
                                            case 4:
                                                $url_link = 'academic/faculty/marks/dist/item/midterm/'.$marks_dist_id.'/'.$course_management_id;
                                                break;
                                            case 5:
                                                $url_link = 'academic/faculty/marks/dist/item/final/term/'.$marks_dist_id.'/'.$course_management_id;
                                                break;

                                            default:
                                                $url_link = URL::current();
                                                break;
                                        }
                                        ?>
                                        <a href="{{ URL::to($url_link)  }}">{{$dvalue['relAcmMarksDistItem']['title']}}</a>
                                    @else
                                        {{$dvalue['relAcmMarksDistItem']['title']}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    @endif
</div>

