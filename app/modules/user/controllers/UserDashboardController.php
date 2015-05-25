<?php

class UserDashboardController extends \BaseController {

	public function amwDashboard(){
        Session::flash('message','Welcome to dashboard of "AMW" !');
        return View::make('user::dashboard.amw');
    }

    public function facultyDashboard(){
        Session::flash('message','Welcome to dashboard of "Faculty" !');
        return View::make('user::dashboard.faculty');
    }

    public function studentDashboard(){
        Session::flash('message','Welcome to dashboard of "Student" !');
        return View::make('user::dashboard.student');
    }

    public function librarianDashboard(){
        Session::flash('message','Welcome to dashboard of "Librarian" !');
        return View::make('user::dashboard.librarian');
    }


}
