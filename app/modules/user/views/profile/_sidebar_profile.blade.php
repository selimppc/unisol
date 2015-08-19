<ul class="sidebar-menu">
    <li class="active">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-bar-chart-o"></i>
            <span> Settings </span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{URL::to('user/reset_password') }}"><i class="fa fa-angle-double-right"></i> Change Password</a></li>
            {{--<li><a href="{{URL::to('user/meta_data') }}"><i class="fa fa-angle-double-right"></i> Profile</a></li>--}}
        </ul>
    </li>
</ul>