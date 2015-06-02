<ul class="sidebar-menu">
    @if(isset(Auth::user()->get()->id) OR isset(Auth::applicant()->get()->id))
        <li>
            <a href="{{URL::route('user/user-access-to') }}"><i class="fa fa-dashboard"  style="color:#0089db"></i>Dashboard</a>
        </li>
    @else
        <li>
            <a href="/">
                <i class="fa fa-dashboard"></i> <span>Home</span>
            </a>
        </li>

        <li class="">
            <a href="{{ URL::to('user/sign') }}">
                <i class="fa fa-angle-double-right"></i> <span>Login</span>
            </a>
        </li>
        <li class="">
            <a href="#">
                <i class="fa fa-angle-double-right"></i> <span>User Registration</span>
            </a>
        </li>
        <li class="">
            <a href="{{ URL::to('applicant/signup') }}">
                <i class="fa fa-angle-double-right"></i> <span>Applicant Registration</span>
            </a>
        </li>
    @endif
    <li class="treeview">
        <a href="#">
            <i class="fa fa-download" style="color: #803a0f"></i>
            <span>Admission</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a tabindex="-1" a href="{{ URL::route('admission.public.degree_offer_list') }}"><i class="fa fa-globe" style="color:#0089db"></i>Admission Degree Offer</a></li>
        </ul>
    </li>
</ul>