
<ul class="sidebar-menu">
    <li class="active">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview">
         <a href="#">
             <i class="fa fa-credit-card" style="color: rgba(2, 128, 125, 0.85)"></i>
             <span>Human Resource</span>
             <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
             <li><a href="{{ URL::to('hr/bank') }}"></i><i class="fa fa-briefcase" style="color: #0effae"></i>HR Bank</a></li>
             <li><a href="{{ URL::to('hr/salary_grade') }}"></i><i class="fa fa-dollar" style="color: #1806ff"></i>HR Salary Grade</a></li>
         </ul>
    </li>

</ul>


