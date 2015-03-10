<ul class="sidebar-menu">
    <li class="active">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-leaf"></i>
            <span>Common</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-angle-double-right"></i> Common</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-book"></i>
            <span>Academic</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a tabindex="-1" a href="{{URL::to('academic/amw/') }}">Mark Distribution Item(Amw)</a></li>
            <li><a tabindex="-1" a href="{{URL::to('academic/amw/config/') }}">Course Config(Amw)</a></li>

        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-bell-o"></i>
            <span>Admission</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a tabindex="-1" a href="{{URL::to('amw/course_manage') }}"> Course Management(Amw) </a></li>
            <li><a tabindex="-1" a href="{{URL::to('amw/degree_manage') }}"> Degree Management(Amw) </a></li>
            <li><a tabindex="-1" a href="{{URL::to('admission_test/amw/index') }}"> Admission Test(Amw)</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pencil"></i>
            <span>Examination</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a tabindex="-1" href="{{  URL::to('examination/amw/examination') }}"> Prepare Question Paper (Amw) </a></li>
        </ul>
    </li>

</ul>