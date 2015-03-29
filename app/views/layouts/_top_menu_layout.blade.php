<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Common
    </a>
    <ul class="dropdown-menu">
        <li class="footer">
            <a href="">Version 2 </a>
        </li>
        <li><a tabindex="-1" a href="{{ URL::to('common/year/') }}"> Year </a></li>
        <li><a tabindex="-1" a href="{{ URL::to('common/semester/') }}"> Semester </a></li>
        <li><a tabindex="-1" a href="{{ URL::to('common/subject/') }}"> Subject </a></li>
        <li><a tabindex="-1" a href="{{ URL::to('common/department/') }}"> Department </a></li>

        <li><a tabindex="-1" a href="{{ URL::to('common/adm_test_subject') }}"> Adm Test Subject </a></li>
        <li><a tabindex="-1" a href="{{ URL::to('common/course') }}"> Course </a></li>

        <li><a tabindex="-1" href="{{ action('DegreeProgramController@degreeProgramIndex') }}"> Degree Program  </a></li>
        <li><a tabindex="-1" href="{{ action('DegreeGroupController@degreeGroupIndex') }}"> Degree Group </a></li>
        <li><a tabindex="-1" href="{{ action('ExamCenterController@exmCenterIndex') }}"> Exam Center </a></li>
        <li><a tabindex="-1" href="{{ action('CourseTypeController@index') }}"> Course Type </a></li>

        <li class="footer">
            <a href="">Version 1 </a>
        </li>
        <li><a tabindex="-1" href="{{ action('CourseController@index') }}"> Course Management </a></li>
        <li><a tabindex="-1" href="{{ action('DegreeLevelController@index') }}"> Degree Level </a></li>
        <li><a tabindex="-1" href="{{ action('TargetRoleController@index') }}"> Target Role </a></li>
        <li><a tabindex="-1" href="{{ action('TaskListRoleController@index') }}"> Task List </a></li>
        <li><a tabindex="-1" href="{{ action('RoleTaskController@index') }}"> Role Task </a></li>
        <li><a tabindex="-1" href="{{ action('RoleTaskUserController@index') }}"> Role Task User </a></li>
        <li><a tabindex="-1" a href="{{ URL::to('term/show') }}"> All Course Management </a></li>
    </ul>
</li>



<!-- Admission Module -->

<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Admission
    </a>
    <ul class="dropdown-menu">

        <li class="footer">
            <a href="">Version 2 </a>
        </li>

        <li class="footer">
            <a href="">Faculty </a>
        </li>

        {{--batch_admtest_subject--table --}}

         <li><a tabindex="-1" a href="{{ URL::to('admission/faculty/batch-admtest-subject') }}"></i> Admision Test </a></li>



        <li class="footer">
            <a href=""> Amw </a>
        </li>

        <li><a tabindex="-1" a href="{{ URL::to('admission/amw/degree') }}"></i>Degree (Amw)</a></li>
        <li><a tabindex="-1" a href="{{ URL::to('admission/amw/batch') }}"></i>Batch (Amw)</a></li>
        <li><a tabindex="-1" a href="{{ URL::to('admission/amw/waiver') }}"></i>Waiver (Amw)</a></li>
        <li><a tabindex="-1" a href="{{ URL::to('admission/amw/batch-education-constraint') }}"></i>Batch Education Constraint</a></li>
        <li><a tabindex="-1" a href="{{ action('AdmAmwController@degree_courses_index') }}"></i>Degree Course(Go from degree list) </a></li>
        <li><a tabindex="-1" a href="{{ URL::to('admission/amw/batch-course') }}"></i>Batch Course(Go from batch list)</a></li>
{{--        <li><a tabindex="-1" a href="{{action('AdmissionController@mngBatchAdmTestSubject') }}"></i>Mng Admssn Tst Sbjct(Amw)</a></li>--}}
        <li><a tabindex="-1" a href="{{ URL::to('admission/amw/admission-test-subject') }}"></i>Only Admssn Tst Sbjct(Amw)</a></li>
        <li><a tabindex="-1" a href="{{ URL::to('admission/amw/admission-test-home') }}"></i>Admssn Test Home</a></li>


        <li class="footer">
            <a href="">Version 1 </a>
        </li>

        <li><a tabindex="-1" a href="{{ URL::to('admission/amw/course_conduct/index') }}"> Course Management(Amw) </a></li>
        <li><a tabindex="-1" a href="{{ URL::to('amw/degree_manage') }}"> Degree Management(Amw) </a></li>
        <li><a tabindex="-1" a href="{{ URL::to('admission/public/degree_list') }}"> Admission (Public) </a></li>
        <li><a tabindex="-1" a href="{{ URL::to('admission_test/amw/index') }}"> Admission Test(Amw)</a></li>
        <li><a tabindex="-1" a href="{{ URL::to('admission_test/amw/mng_adm_test_subject') }}"></i>Mng Admssn Tst Sbjct(Amw)</a></li>
        <li><a tabindex="-1" a href="{{ URL::to('admission_test/amw/adm-test-degree') }}"></i>Adm Test:Degree (Amw)</a></li>
        <li><a tabindex="-1" a href="{{ URL::to('admission_test/amw/adm-test-subject') }}"></i>Adm Test:Subject (Amw)</a></li>


    </ul>
</li>

<!-- Applicant Module -->
<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Applicant
    </a>
    <ul class="dropdown-menu">
        <li><a tabindex="-1" a href="">Applicant Sign Up</a></li>
        <li><a tabindex="-1" a href=""></a></li>
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