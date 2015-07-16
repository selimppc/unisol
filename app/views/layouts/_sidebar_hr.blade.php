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
             <li><a href="{{ URL::to('hr/bank') }}"></i><i class="fa fa-briefcase" style="color: #0effae"></i>HR Bank</a></li>
             <li><a href="{{ URL::to('hr/salary_grade') }}"></i><i class="fa fa-signal" style="color: #ffa108"></i>HR Salary Grade</a></li>
             <li><a href="{{ URL::to('hr/tax_rule') }}"></i><i class="fa fa-rub" style="color: #ff828a"></i>HR Tax Rule</a></li>
             <li><a href="{{ URL::to('hr/employee') }}"></i><i class="fa fa-user" style="color: #0707cc"></i>HR Employee</a></li>
             <li><a href="{{ URL::to('hr/currency') }}"></i><i class="fa fa-dollar" style="color: #ff1383"></i>Currency</a></li>
             <li><a href="{{ URL::to('hr/allowance') }}"></i><i class="fa fa-sort" style="color: #00fff2"></i>HR Allowance</a></li>
             <li><a href="{{ URL::to('hr/attendance') }}"></i><i class="fa fa-align-center" style="color: #000000"></i>HR  Attendance</a></li>
             <li><a href="{{ URL::to('hr/work-week') }}"></i><i class="fa  fa-crosshairs" style="color: #ffa108"></i>HR Work Week</a></li>
             <li><a href="{{ URL::to('hr/leave') }}"></i><i class="fa fa-spinner" style="color:lightseagreen"></i>HR Leave </a></li>
             <li><a href="{{ URL::to('hr/provident-fund') }}"></i><i class="fa fa-ticket" style="color: lightcoral"></i>HR Provident Fund </a></li>
             <li><a href="{{ URL::to('hr/bonus') }}"></i><i class="fa fa-briefcase" style="color: #0effae"></i>Bonus</a></li>
             <li><a href="{{ URL::to('hr/over_time') }}"></i><i class="fa fa-briefcase" style="color: #0effae"></i>Over Time</a></li>
             <li><a href="{{ URL::to('hr/salary_advance') }}"></i><i class="fa fa-briefcase" style="color: #0effae"></i>Salary Advance</a></li>
             <li><a href="{{ URL::to('hr/salary') }}"></i><i class="fa fa-briefcase" style="color: #0effae"></i>Salary </a></li>
             <li><a href="{{ URL::to('hr/loan_head') }}"></i><i class="fa fa-briefcase" style="color: #0effae"></i>Loan Head </a></li>
             <li><a href="{{ URL::to('hr/salary_transaction') }}"></i><i class="fa fa-briefcase" style="color: #0effae"></i>Salary Transaction</a></li>

         </ul>
    </li>
</ul>


