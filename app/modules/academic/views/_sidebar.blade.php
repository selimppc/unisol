<ul class="sidebar-menu">
    <li class="active">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-bar-chart-o"></i>
            <span>Admission</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a tabindex="-1" a href="{{ URL::to('admission/faculty/admission-test') }}"><i class="fa fa-anchor" style="color: #db4509"></i>Admission Test </a></li>
            <li><a tabindex="-1" a href="{{ URL::to('admission/faculty/course') }}"><i class="fa fa-gift" style="color: #aa28db"></i> Course </a></li>
            <li><a tabindex="-1" a href="#"></i>Question paper (Come from Adm Test) </a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-book text-purple"></i>
            <span>Academic</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{URL::to('academic/faculty/course/config')}}"></i><i class="fa fa-stack-overflow text-blue"></i> Courses</a></li>
        </ul>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td style="color:#669900;font-weight: bold">{{isset($coursetitle->relCourseConduct->relCourse->title) ? $coursetitle->relCourseConduct->relCourse->title: 'No Item Added' }}</td>
                </tr>
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
    </li>
</ul>
