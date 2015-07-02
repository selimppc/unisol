<?php

class FeesStudentController extends \BaseController
{

    function __construct()
    {
        $this->beforeFilter('feesStudent', array('except' => array('')));
    }

    /*
 * POST REQUEST To save data
 */
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    /**********************Student Billing Setup Start***************************/
    public function index_student_billing()
    {
        if(Auth::user()->check()) {
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
        return View::make('fees::student.billing_setup.index',compact('data','regularOrInstallment','applicant_id'));
        } else {
            Session::flash('danger', "Please Login As Student!");
            return Redirect::route('user/login');
        }

    }

    public  function save_billing_type()
    {
        if($this->isPostRequest()) {
            $applicant_id = Input::get('applicant_id');
            $billing_type = Input::get('billing_type');
            DB::beginTransaction();
            try {
                $update = DB::table('user')
                    ->where('applicant_id', $applicant_id)
                    ->where('billing_type', "")
                    ->update(array('billing_type' => $billing_type));
                DB::commit();
                if($update)
                    Session::flash('message', "Billing Type Update Successfully");
                else
                    Session::flash('danger', "Billing Type Setup Is Just For One Time.");
                return Redirect::to('fees/student/billing/setup');
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "not added.Invalid Request!");
            }
            return Redirect::to('fees/student/billing/setup');
        }
        return Redirect::to('fees/student/billing/setup');

    }
    /**********************Student Billing history Start***************************/

    public function index_billing_history()
    {
        $applicant_id = User::findOrFail(Auth::user()->get()->id)->applicant_id;
        $batch_id = BatchApplicant::where('applicant_id', $applicant_id)->first()->batch_id;
        $applicant_data = BillingVApplicantHistory::where('applicant_id', $batch_id)->get();
        $student_data = BillingVStudentHistory::with('relDegree')->get();

        return View::make('fees::student.billing_history.index',compact('applicant_data','student_data'));

    }
    public function view_student_billing_history($id)
    {
        $data = BillingVStudentHistory::where('id', $id)->first();
        $stu_data = BillingSummaryStudent::with('relBillingDetailsStudent.relBillingItem', 'relBillingSchedule')->where('id', $id)->get();
        return View::make('fees::student.billing_history.view_student',compact('data','stu_data'));
    }

    public function view_applicant_billing_history($id)
    {
        $data = BillingVApplicantHistory::where('id', $id)->first();
        $applicant_data = BillingSummaryApplicant::with('relBillingDetailsApplicant',  'relBillingSchedule')->where('id', $id)->get();
        return View::make('fees::student.billing_history.view_applicant',compact('data','applicant_data'));
    }


}