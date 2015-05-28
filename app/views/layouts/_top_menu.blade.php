<ul class="nav navbar-nav">
 {{--   @include('layouts._top_menu_layout')--}}
    @include('layouts._top_menu_applicant')
    <!-- User Account: style can be found in dropdown.less -->
    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i>
            <span><b> {{ isset(Auth::user()->get()->username) ? ucwords(Auth::user()->get()->username) : ( Auth::applicant()->check() ? ucwords(Auth::applicant()->get()->username) : "Guest !" ) }} </b> <i class="caret"></i></span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header bg-light-blue">
                {{ HTML::image('/img/avatar3.png', 'User Image', ['class'=>'img-circle']) }}
                <p>
                    <b> {{ isset(Auth::user()->get()->username) ? ucwords(Auth::user()->get()->username) : ( Auth::applicant()->check() ? ucwords(Auth::applicant()->get()->username) : "Guest !" ) }} </b>
                    <small>Last Visit : {{ isset(Auth::user()->get()->last_visit) ? Auth::user()->get()->last_visit : ( Auth::applicant()->check() ? ucwords(Auth::applicant()->get()->last_visit) : "Guest !" ) }}</small>
                </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
                    <a href="{{URL::route('user/profile') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                    <a href="{{URL::route('user/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
            </li>
        </ul>
    </li>
</ul>