<p class="lead"></p>
@if(!Auth::check())

        <a href="{{URL::to('applicant') }}" class="list-group-item">Signup</a>
        <a href="{{URL::to('applicant/login') }}" class="list-group-item">SignIn</a>
 @else
        <p>Hello <b >{{Auth::user()->username}}</b>! </p>
        <p> Logged as <b class="btn btn-sm btn-info" style="color: red">Applicant</b></p>
        <a href="{{URL::to('applicant/logout') }}" class="list-group-item">Signout</a>
        {{--<a href="{{URL::to('user/reset_password') }}" class="list-group-item">Change Password</a>--}}
        {{--<a href="{{URL::to('applicant/meta_data') }}" class="list-group-item">Profile</a>--}}
  @endif