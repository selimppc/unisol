<?php

class UserController extends \BaseController {

    function __construct() {
        $this->beforeFilter('userAuth', array('except' => array('login')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }


    public function login()
    {
        if ($this->isPostRequest()) {
            $validator = $this->getLoginValidator();
            if ($validator->passes()) {
                $credentials = $this->getLoginCredentials();
                if (Auth::user()->attempt($credentials)) {
                    Session::put('user_id', Auth::user()->get()->id);
                    Session::put('username', Auth::user()->get()->username);
                    $this->userLastVisit(Auth::user()->get()->id);
                    return Redirect::to("user/user-access-to");
                }elseif(Auth::applicant()->attempt($credentials)){
                    Session::put('user_id', Auth::applicant()->get()->id);
                    Session::put('username', Auth::applicant()->get()->username);
                    $this->applicantLastVisit(Auth::applicant()->get()->id);
                    if(Session::has('applicantRedirect')){
                        $redirect_url = Session::get('applicantRedirect');

                        // Now forget these data as applicant is logged in.
                        Session::forget('applicantRedirect');
                        Session::forget('applicantDegIds');
                        return Redirect::to($redirect_url);
                    }else{
                        return Redirect::to("user/user-access-to");
                    }
                }
                return Redirect::back()->withErrors([
                    "password" => ["Username / Password invalid."]
                ]);
            } else {
                return Redirect::back()
                    ->withInput()
                    ->withErrors($validator);
            }
        }else{
            if(Auth::user()->check()){
                return Redirect::to("user/user-access-to");
            }elseif(Auth::applicant()->check()){
                return Redirect::route('applicant.details', [Auth::applicant()->get()->id]);
            }
            return View::make('user::user.login');
        }

    }

    public static function userAccessTo(){

        if(Auth::user()->check()){
            $user_role = User::hasRole(Auth::user()->get()->role_id);
            if($user_role=="amw"){
                return Redirect::to("user/amw-dashboard");
            }
            if($user_role=="faculty"){
                return Redirect::to("user/faculty-dashboard");
            }
            if($user_role=="student"){
                return Redirect::to("user/student-dashboard");
            }
            if($user_role=="librarian"){
                return Redirect::to("user/librarian-dashboard");
            }
            if($user_role=="cfo"){
                return Redirect::to("user/cfo-dashboard");
            }
            if($user_role=="hr"){
                return Redirect::to("user/hr-dashboard");
            }
            if($user_role=="employee"){
                return Redirect::to("user/employee-dashboard");
            }
        }elseif(Auth::applicant()->check()){
            return Redirect::to("user/applicant-dashboard");
        }else{
            return View::make('user::user.login');
        }

    }

    protected function userLastVisit($user_id){
        $model = User::findOrFail($user_id);
        date_default_timezone_set("Asia/Dacca");
        $date = date('Y-m-d H:i:s', time());
        $model->last_visit = $date;
        $model->ip_address = getHostByName(getHostName());
        $model->save();
    }
    protected function applicantLastVisit($applicant_id){
        $model = Applicant::findOrFail($applicant_id);
        date_default_timezone_set("Asia/Dacca");
        $date = date('Y-m-d H:i:s', time());
        $model->last_visit = $date;
        $model->ip_address = getHostByName(getHostName());
        $model->save();
    }

    protected function getLoginValidator()
    {
        return Validator::make(Input::all(), [
            "username" => "required",
            "password" => "required"
        ]);
    }

    protected function getLoginCredentials()
    {
        return [
            "username" => Input::get("username"),
            "password" => Input::get("password")
        ];
    }

    public function logout() {
        Auth::logout();
        Session::flush(); //delete the session
        return Redirect::to('user/login');
    }

    public function request()
    {
        if ($this->isPostRequest()) {
            $response = $this->getPasswordRemindResponse();
            if ($this->isInvalidUser($response)) {
                return Redirect::back()
                    ->withInput()
                    ->with("error", Lang::get($response));
            }
            return Redirect::back()
                ->with("status", Lang::get($response));
        }
        return View::make("user/request");
    }

    protected function getPasswordRemindResponse()
    {
        return Password::remind(Input::only("email"));
    }

    protected function isInvalidUser($response)
    {
        return $response === Password::INVALID_USER;
    }


    public function reset($token)
    {
        if ($this->isPostRequest()) {
            $credentials = Input::only(
                    "email",
                    "password",
                    "password_confirmation"
                ) + compact("token");

            $response = $this->resetPassword($credentials);
            if ($response === Password::PASSWORD_RESET) {
                return Redirect::route("user/profile");
            }
            return Redirect::back()
                ->withInput()
                ->with("error", Lang::get($response));
        }
        return View::make("user/reset", compact("token"));
    }

    protected function resetPassword($credentials)
    {
        return Password::reset($credentials, function($user, $pass) {
            $user->password = Hash::make($pass);
            $user->save();
        });
    }
}
