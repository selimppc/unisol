
<ul class="sidebar-menu">
    <li>
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-leaf" style="color: #09b021"></i>
            <span>Common</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ URL::to('common/year/') }}"> Year </a></li>
            <li><a href="{{ URL::to('common/semester/') }}"> Semester </a></li>
            <li><a href="{{ URL::to('common/subject/') }}"> Subject </a></li>
            <li><a href="{{ URL::to('common/department/') }}"> Department </a></li>

            <li><a href="{{ URL::to('common/adm_test_subject') }}"> Admission Test Subject </a></li>
            <li><a href="{{ URL::to('common/course') }}"> Course </a></li>

            <li><a href="{{ action('DegreeProgramController@degreeProgramIndex') }}"> Degree Program  </a></li>
            <li><a href="{{ action('DegreeGroupController@degreeGroupIndex') }}"> Degree Group </a></li>
            <li><a href="{{ action('ExamCenterController@exmCenterIndex') }}"> Exam Center </a></li>
            <li><a href="{{ action('CourseTypeController@index') }}"> Course Type </a></li>
        </ul>
    </li>

    <li class="treeview">
            <a href="#">
                <i class="fa fa-folder-open" style="color:#0089db"></i>
                <span>Academics</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ URL::to('academic/student/courses') }}">Courses</a></li>

            </ul>
    </li>

     <li class="treeview">
            <a href="#">
                <i class="fa fa-list-alt" style="color: #992177"></i>
                <span>Library</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a tabindex="-1" a href="{{ URL::to('library/student/find-book') }}"><i class="fa fa-search-plus" style="color: #2327db"></i>Find Book</a></li>
                <li><a tabindex="-1" a href="{{ URL::to('library/student/my-book') }}"><i class="fa fa-book" style="color: #0d8b0e"></i>My Book</a></li>
            </ul>
     </li>

     <li class="treeview">
         <a href="#">
             <i class="fa fa-credit-card" style="color: rgba(2, 128, 125, 0.85)"></i>
             <span>Research & Consultancy</span>
             <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
             <li><a href="{{ URL::to('rnc/student/config/index') }}"></i><i class="fa fa-cogs" style="color: #c69bff"></i>Config</a></li>
             <li><a href="{{ URL::to('rnc/student/research-paper/index') }}"></i><i class="fa fa-fire-extinguisher" style="color: rgb(219, 94, 17)"></i>Research Paper</a></li>
             <li><a href="{{ URL::to('rnc/student/research-paper/my-item') }}"></i><i class="fa fa-check-square" style="color: rgb(7, 219, 205)"></i>My Item</a></li>
         </ul>
     </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-credit-card text-yellow" style="color:deepskyblue"></i>
            <span>Fees</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ URL::to('fees/student/billing/setup') }}"><i class="fa fa-bars text-red"></i> Billing Setup</a>

            <li><a href="#"><i class="fa fa-bars text-purple"></i> Billing History</a>

        </ul>
    </li>

</ul>


