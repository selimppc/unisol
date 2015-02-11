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
                if (Auth::attempt($credentials)) {
                    //return Redirect::route("user/profile");
                    return Redirect::to("usersign/dashboard");
                }
                return Redirect::back()->withErrors([
                    "password" => ["Username / Password invalid."]
                ]);
            } else {
                return Redirect::back()
                    ->withInput()
                    ->withErrors($validator);
            }
        }
        return View::make('user::user.login');
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
        return Redirect::to('user/login');
    }

    public function profile(){
        return View::make("user/profile");
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



    /* Tanin */
    public function userDashboard(){

    }

}
