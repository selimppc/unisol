<ul class="sidebar-menu">
    <li class="active">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-edit" style="color: #2ecee7"></i>
            <span> Sign Up </span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <a href="{{URL::to('/applicant/registration') }}"  class="list-group-item" >Sign Up</a>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa  fa-arrow-circle-o-right" style="color: #24AA7A"></i>
            <span> Sign In </span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <a href="{{URL::to('user/login') }}"  class="list-group-item" >Sign In</a>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa  fa-male" style="color: #0044cc"></i>
            <span> User Account </span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <a href="{{URL::to('applicant/change/password') }}"  class="list-group-item" >Change Password</a>
            <a href="{{URL::to('applicant/profile/') }}"  class="list-group-item" >Profile</a>
            <a href="{{URL::to('applicant/acm_records/') }}" class="list-group-item ">Academic Records</a>
            <a href="{{URL::to('applicant/personal_info/') }}" class="list-group-item ">Personal Information</a>
            <a href="{{URL::to('applicant/supporting_docs/') }}" class="list-group-item ">Supporting Documents</a>
            <a href="{{URL::to('applicant/extra_curricular/') }}" class="list-group-item ">Extra-curricular Activities</a>
            <a href="{{URL::to('apt/misc_info/') }}" class="list-group-item ">Miscellaneous Information</a>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-edit" style="color: #2ecee7"></i>
            <span> Admission Test </span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <a href="{{URL::to('applicant/admission-test')}}"  class="list-group-item" >Admission Test </a>
        </ul>
    </li>

</ul>