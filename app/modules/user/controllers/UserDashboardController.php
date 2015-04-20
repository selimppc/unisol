<?php

class UserDashboardController extends \BaseController {

	public function amwDashboard(){
        Session::flash('message','Successfully Logged in as "AMW" !');
        return View::make('user::dashboard.amw');
    }

    public function facultyDashboard(){
        Session::flash('message','Successfully Logged in as "Faculty" !');
        return View::make('user::dashboard.faculty');
    }

    public function studentDashboard(){
        Session::flash('message','Successfully Logged in as "Student" !');
        return View::make('user::dashboard.student');
    }


}
