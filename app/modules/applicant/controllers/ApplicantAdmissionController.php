<?php

class ApplicantAdmissionController extends \BaseController {

    public function admission_test()
    {
        if(Auth::applicant()->check()) {
            $applicant_id = Auth::applicant()->get()->id;
            $data = BatchApplicant::with('relBatch','relBatch.relDegree','relBatch.relSemester','relBatch.relYear')
                ->where('applicant_id', '=', $applicant_id)
                ->get();
            return View::make('applicant::admission_test.index',compact('data','applicant'));
        }
        else {
            Session::flash('danger', "Please Login As Applicant!");
            return Redirect::route('user/login');
        }

    }

}
