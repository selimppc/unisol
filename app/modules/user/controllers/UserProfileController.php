<?php

class UserProfileController extends \BaseController {


    function __construct() {
        $this->beforeFilter('auth', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function profile(){

        if(Auth::user()->check()){
            $user_id = Auth::user()->get()->id;
            $userMeta = UserMeta::where('user_id', '=', $user_id)->first();
            $userProfile = UserProfile::where('user_id', '=', $user_id)->first();
            $academicRecords = UserAcademicRecord::where('user_id', '=', $user_id)->get();
        }elseif(Auth::applicant()->check()){
            $user_id = Auth::applicant()->get()->id;
            $userMeta = ApplicantMeta::where('applicant_id', '=', $user_id)->first();
            $userProfile = ApplicantProfile::where('applicant_id', '=', $user_id)->first();
            $academicRecords = ApplicantAcademicRecords::where('applicant_id', '=', $user_id)->get();
        }
        if($userMeta == NULL){
            Session::flash('info', "User Meta information is missing !");
        }
        if($userProfile == Null) {
            Session::flash('info', "User Profile information is missing !");
        }
        if(!is_array($academicRecords)) {
            Session::flash('danger', "Academic Records are missing !");
        }

        return View::make('user::profile.profile', compact('userMeta', 'userProfile', 'academicRecords'));
    }
}
