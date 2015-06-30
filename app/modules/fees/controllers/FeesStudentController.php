<?php

class FeesStudentController extends \BaseController
{

    function __construct()
    {
        $this->beforeFilter('feesStudent', array('except' => array('')));
    }

    public function index_student_billing()
    {
        $regularOrInstallment = Input::get('regularOrInstallment');
        Input::flash();

        if($regularOrInstallment == 'regular'){

            $applicant_id = User::findOrFail(Auth::user()->get()->id)->applicant_id;
            $batch_id = BatchApplicant::where('applicant_id', $applicant_id)->first()->batch_id;
            $q = BillingSetup::with('relBillingSchedule','relBillingSchedule','relBatch','relBatch.relDegree.relDegreeProgram')
                ->where('batch_id', $batch_id);

        }else {

            $applicant_id = User::findOrFail(Auth::user()->get()->id)->applicant_id;
            $batch_id = BatchApplicant::where('applicant_id', $applicant_id)->first()->batch_id;
            $q = InstallmentSetup::with('relBillingSchedule','relBillingSchedule','relBatch','relBatch.relDegree.relDegreeProgram')
                ->where('batch_id', $batch_id);
        }
        $data = $q->get();
        //$queries = DB::getQueryLog();
       // $last_query = end($data);
       // dd(DB::getQueryLog());
       // print_r($data);exit;

        return View::make('fees::student.billing_setup.index',compact('data','regularOrInstallment'));
    }



}