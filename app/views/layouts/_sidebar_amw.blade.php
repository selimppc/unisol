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
            <li><a tabindex="-1" a href="{{URL::to('amw/course_manage') }}"><i class="fa fa-crosshairs"></i> Course Management(Amw) </a></li>
            <li><a tabindex="-1" a href="{{URL::to('amw/degree_manage') }}"><i class="fa fa-flask"></i> Degree Management(Amw) </a></li>
            <li><a tabindex="-1" a href="{{URL::to('admission_test/amw/index') }}"><i class="fa fa-thumbs-o-up"></i> Admission Test(Amw)</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pencil"></i>
            <span>Examination</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a tabindex="-1" href="{{  URL::to('examination/amw/examination') }}"><i class="fa fa-pencil-square"></i> Prepare Question Paper</a></li>
        </ul>
    </li>

</ul>