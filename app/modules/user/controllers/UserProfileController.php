<?php

class UserProfileController extends \BaseController {

    public function profile(){
        $user_id = Auth::user()->get()->id;
        $userMeta = UserMeta::where('user_id', '=', $user_id)->first();
        $userProfile = UserProfile::where('user_id', '=', $user_id)->first();
        $academicRecords = UserAcademicRecord::where('user_id', '=', $user_id)->get();

        if($userMeta == NULL){
            Session::flash('info', "User Meta information is missing !");
        }
        if($userProfile == Null) {
            Session::flash('error', "User Profile information is missing !");
        }
        if(!is_array($academicRecords)) {
            Session::flash('danger', "Academic Records are missing !");
        }

        return View::make('user::profile.profile', compact('userMeta', 'userProfile', 'academicRecords'));
    }
}
