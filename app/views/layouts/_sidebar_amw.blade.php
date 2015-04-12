<ul class="sidebar-menu">
    <li class="active">
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
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-download" style="color: #803a0f"></i>
            <span>Admission</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="active"><a tabindex="-1" a href="{{ URL::to('admission/amw/degree') }}"></i><i class="fa fa-flask" style="color: #db4509"></i> Degree (Amw)</a></li>
            <li><a tabindex="-1" a href="{{ URL::to('admission/amw/admission-test-home') }}"></i><i class="fa fa-flask" style="color: #db4509"></i> Admission Test (Ex,Qp, QPE)</a></li>
        </ul>
    </li>





</ul>