
<ul class="sidebar-menu">
    <li class="active">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    <li class="treeview">
         <a href="#">
             <i class="fa fa-credit-card" style="color: rgba(12, 128, 27, 0.85)"></i>
             <span>Human Resource</span>
             <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">

             <li><a href="{{ URL::to('hr/leave') }}"></i><i class="fa fa-spinner" style="color:lightseagreen"></i>HR Leave </a></li>
             {{--<li><a href="{{ URL::to('hr/provident-fund') }}"></i><i class="fa fa-ticket" style="color: lightcoral"></i>HR Provident Fund </a></li>--}}
         </ul>
    </li>
</ul>


