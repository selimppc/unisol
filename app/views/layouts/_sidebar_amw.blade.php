<ul class="sidebar-menu">
    <li>
        <a href="/admission">
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
            <i class="fa fa-download" style="color: #803a0f"></i>
            <span>Admission</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ URL::to('admission/amw/degree') }}"></i><i class="fa fa-flask" style="color: #db4509"></i> Degree</a></li>
            <li><a href="{{ URL::to('admission/amw/admission-test-home') }}"></i><i class="fa fa-flask" style="color: #db4509"></i> Admission Test</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-book text-purple"></i>
            <span>Academic</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ URL::to('academic/amw/config/') }}"></i><i class="fa fa-stack-overflow text-blue"></i> Courses</a></li>
            <li><a href="{{ URL::to('common/exm-center') }}"></i><i class="fa fa-qrcode text-green"></i> Exam Center</a></li>
        </ul>
    </li>

    <li class="treeview">
            <a href="#">
                <i class="fa fa-pencil" style="color:deepskyblue"></i>
                <span>Examination</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ URL::to('examination/amw/exam-list') }}"></i><i class="fa fa-list text-blue"></i> Exam List</a></li>
                {{--<li><a href="{{ URL::to('admission/amw/admission-test-home') }}"></i><i class="fa fa-flask" style="color: #db4509"></i> Admission Test</a></li>--}}
            </ul>
        </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-credit-card text-yellow" style="color:deepskyblue"></i>
            <span>Fees</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ URL::to('fees/billing/setup') }}"><i class="fa  fa-bars text-red"></i> Billing Setup</a>

            <li><a href="{{ URL::to('fees/billing/history') }}"><i class="fa  fa-bars text-purple"></i> Billing History</a>

            <li><a href="#"><i class="fa  fa-bars text-blue"></i> Billing Installment</a>

        </ul>
    </li>


    <li class="treeview">
            <a href="#">
                <i class="fa fa-credit-card" style="color: rgba(2, 128, 125, 0.85)"></i>
                <span>Research & Consultancy</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ URL::to('rnc/amw/category/index') }}"></i><i class="fa fa-puzzle-piece" style="color: #0effae"></i>Category</a></li>
                <li><a href="{{ URL::to('rnc/amw/config/index') }}"></i><i class="fa fa-cogs" style="color: #c69bff"></i>Config</a></li>
                <li><a href="{{ URL::to('rnc/amw/publisher/index') }}"></i><i class="fa fa-print" style="color: #ff1465"></i>Publisher</a></li>
                <li><a href="{{ URL::to('rnc/amw/research-paper/index') }}"></i><i class="fa fa-fire-extinguisher" style="color: rgb(219, 94, 17)"></i>Research Paper</a></li>

            </ul>
        </li>

        @include('inventory::_sidebar._inventory')
        @include('accounts::_sidebar._accounts')

</ul>


