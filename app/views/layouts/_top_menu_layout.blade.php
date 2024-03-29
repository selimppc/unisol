<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Common
    </a>
    <ul class="dropdown-menu">
        <li><a tabindex="-1" href="{{ action('CourseController@index') }}"> Course Management </a></li>
        <li><a tabindex="-1" href="{{ action('CourseTypeController@index') }}"> Course Type </a></li>
        <li><a tabindex="-1" href="{{ action('DegreeLevelController@index') }}"> Degree Level </a></li>
        <li><a tabindex="-1" href="{{ action('DegreeProgController@index') }}"> Degree / Program Name </a></li>
        <li><a tabindex="-1" href="{{ action('DepartmentController@index') }}"> Department Management </a></li>
        <li><a tabindex="-1" href="{{ action('SemesterController@index') }}"> Semester </a></li>
        <li><a tabindex="-1" href="{{ action('TargetRoleController@index') }}"> Target Role </a></li>
        <li><a tabindex="-1" href="{{ action('TaskListRoleController@index') }}"> Task List </a></li>
        <li><a tabindex="-1" href="{{ action('RoleTaskController@index') }}"> Role Task </a></li>
        <li><a tabindex="-1" href="{{ action('RoleTaskUserController@index') }}"> Role Task User </a></li>
        <li><a tabindex="-1" a href="{{ URL::to('subject/list') }}"> Subject Management </a></li>
        <li><a tabindex="-1" a href="{{ URL::to('year/show') }}"> Year Management </a></li>
        <li><a tabindex="-1" a href="{{ URL::to('term/show') }}"> All Course Management </a></li>
    </ul>
</li>



<!-- Admission Module -->
<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Admission
    </a>
    <ul class="dropdown-menu">
        <li><a tabindex="-1" a href="{{ URL::to('amw/course_manage') }}"> Course Management(Amw) </a></li>
        <li><a tabindex="-1" a href="{{ URL::to('amw/degree_manage') }}"> Degree Management(Amw) </a></li>
        <li><a tabindex="-1" a href="{{ URL::to('admission/public/degree_list') }}"> Admission (Public) </a></li>
        <li><a tabindex="-1" a href="{{ URL::to('admission_test/amw/index') }}"> Admission Test(Amw)</a></li>
        <li><a tabindex="-1" a href="{{ URL::to('admission_test/amw/mng_adm_test_subject') }}"></i>Mng Admssn Tst Sbjct(Amw)</a></li>
        <li><a tabindex="-1" a href="{{ URL::to('admission_test/amw/adm-test-degree') }}"></i>Adm Test:Degree (Amw)</a></li>
        <li><a tabindex="-1" a href="{{ URL::to('admission_test/amw/adm-test-subject') }}"></i>Adm Test:Subject (Amw)</a></li>
    </ul>
</li>

<!-- Academic Module -->
<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Academic
    </a>
    <ul class="dropdown-menu">
       <li><a tabindex="-1" a href="{{ URL::to('academic/faculty/') }}">Mark Distribution (Faculty)</a></li>
       <li><a tabindex="-1" a href="{{ URL::to('academic/amw/') }}">Mark Distribution (Amw)</a></li>
    </ul>
</li>


<!-- Examination Module -->
<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Examination
    </a>
    <ul class="dropdown-menu">
       <li><a tabindex="-1" href="{{ action('ExmFacultyController@index') }}"> Prepare Question Paper (Faculty) </a></li>
       <li><a tabindex="-1" href="{{ URL::to('examination/amw/examination') }}"> Prepare Question Paper (Amw) </a></li>
    </ul>
</li>

<!-- Messages: style can be found in dropdown.less-->
<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-envelope"></i>
        <span class="label label-success">4</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have 4 messages</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <li><!-- start message -->
                    <a href="#">
                        <div class="pull-left">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image"/>
                        </div>
                        <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                    </a>
                </li><!-- end message -->

            </ul>
        </li>
        <li class="footer"><a href="#">See All Messages</a></li>
    </ul>
</li>
<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-warning"></i>
        <span class="label label-warning">10</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have 10 notifications</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <li>
                    <a href="#">
                        <i class="ion ion-ios7-people info"></i> 5 new members joined today
                    </a>
                </li>

            </ul>
        </li>
        <li class="footer"><a href="#">View all</a></li>
    </ul>
</li>
<!-- Tasks: style can be found in dropdown.less -->
<li class="dropdown tasks-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-tasks"></i>
        <span class="label label-danger">9</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have 9 tasks</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <li><!-- Task item -->
                    <a href="#">
                        <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">20% Complete</span>
                            </div>
                        </div>
                    </a>
                </li><!-- end task item -->

            </ul>
        </li>
        <li class="footer">
            <a href="#">View all tasks</a>
        </li>
    </ul>
</li>