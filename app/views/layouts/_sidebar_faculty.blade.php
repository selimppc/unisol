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
    </li>

    <li class="treeview">
            <a href="#">
                <i class="fa fa-building-o"></i>
                <span>Examination</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{URL::to('examination/faculty/examination-list')}}"></i><i class="fa fa-qrcode" style="color: #db8f18"></i> Examination</a></li>
            </ul>
    </li>
</ul>