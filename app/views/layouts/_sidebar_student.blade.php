
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
                <li><a tabindex="-1" a href="{{ URL::to('library/student/view-cart') }}"><i class="fa fa-shopping-cart" style="color: #9d07db"></i>View Cart</a></li>
                <li><a tabindex="-1" a href="{{ URL::to('library/student/my-book') }}"><i class="fa fa-book" style="color: #0d8b0e"></i>My Book</a></li>
            </ul>
     </li>



</ul>


