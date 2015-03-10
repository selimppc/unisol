<ul class="sidebar-menu">
    <li class="active">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-edit"></i>
            <span> Settings </span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <a href="{{URL::to('applicant/profile/index') }}"  class="list-group-item" >Profile</a>
            <a href="{{URL::to('apt/acm_records/index') }}" class="list-group-item ">Academic Records</a>
            <a href="{{URL::to('apt/personal_info/index') }}" class="list-group-item ">Personal Information</a>
            <a href="{{URL::to('apt/supporting_docs/index') }}" class="list-group-item ">Supporting Documents</a>
            <a href="{{URL::to('apt/extra_curricular/index') }}" class="list-group-item ">Extra-curricular Activities</a>
            <a href="{{URL::to('apt/misc_info/index') }}" class="list-group-item ">Miscellaneous Information</a>
        </ul>
    </li>



    <li class="treeview">
        <a href="#">
            <i class="fa fa-table"></i>
            <span>Admission</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a tabindex="-1" a href=""> No Menu </a></li>
        </ul>
    </li>
</ul>