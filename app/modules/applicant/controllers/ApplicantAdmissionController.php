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


    public function admission_test_subject($batch_id)
    {
        $test_subject = BatchAdmtestSubject::with('relBatch','relAdmtestSubject','relAdmQuestion')
            ->where('batch_id', '=', $batch_id)
            ->get();

        $batch_applicant = BatchApplicant::with('relBatch','relBatch.relDegree','relBatch.relSemester','relBatch.relYear')
            ->where('batch_id', '=', $batch_id)
            ->get();

        return View::make('applicant::admission_test.subject_details',compact('test_subject','batch_applicant','question'));
    }

    public function admission_test_subject_exam($batch_admtest_sub_id)
    {
        $question = AdmQuestion::with('relBatchAdmtestSubject','relBatchAdmtestSubject.relAdmtestSubject','relAdmQuestionItems','relAdmQuestionItems.relAdmQuestionOptAns')
            ->where('batch_admtest_subject_id', '=', $batch_admtest_sub_id)
            ->get();

        return View::make('applicant::admission_test.subject_exam',compact('question'));
    }

}
