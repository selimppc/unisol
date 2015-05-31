<ul class="sidebar-menu">
    @if(isset(Auth::user()->get()->id) OR isset(Auth::applicant()->get()->id))
        <li>
            <a class="fa fa-dashboard" href="{{URL::route('user/user-access-to') }}" class="btn btn-default btn-flat">Dashboard</a>
        </li>
    @else
        <li>
            <a href="/">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="">
            <a href="{{ URL::to('user/sign') }}">
                <i class="fa fa-angle-double-right"></i> <span>User login</span>
            </a>
        </li>
        <li class="">
            <a href="#">
                <i class="fa fa-angle-double-right"></i> <span>User Sign Up</span>
            </a>
        </li>
        <li class="">
            <a href="{{ URL::to('applicant/signup') }}">
                <i class="fa fa-angle-double-right"></i> <span>Applicant Sign Up</span>
            </a>
            <a href="{{ URL::to('user/sign') }}">
                <i class="fa fa-angle-double-right"></i> <span>Applicant Login</span>
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
            <li class="active"><a tabindex="-1" a href="{{ URL::route('admission.public.degree_offer_list') }}"></i><i class="fa fa-globe" style="color:#0089db"></i>Admission Degree Offer</a></li>
        </ul>
    </li>
</ul>