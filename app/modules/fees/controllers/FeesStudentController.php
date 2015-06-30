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
    }

    public  function save_billing_type()
    {
        /*$applicant_id = Input::get('applicant_id');
        $billing_type = Input::get('installment');
        $update = DB::table('user')
            ->where('applicant_id', $applicant_id)
            ->where('billing_type', "")
            ->update(array('billing_type' => $billing_type));*/
        /*if($this->isPostRequest()) {
            $data = Input::all();
            $applicant_id = Input::get('applicant_id');
            $billing_type = Input::get('installment');
            DB::beginTransaction();
            try {
                    $model = ($applicant_id) ? User::find($applicant_id) : new User;
                    $model->billing_type = $billing_type;
                    $model->save();
                    DB::commit();

                Session::flash('message', "Billing Type Update Successfully");
                return Redirect::to('fees/student/billing/setup');
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "not added.Invalid Request!");
            }
            return Redirect::to('fees/student/billing/setup');

        }
        return Redirect::to('fees/student/billing/setup');*/
    }
    /**********************Student Billing history Start***************************/

    public function index_billing_history()
    {
       // echo('ffffffffff');exit;
        $applicant_id = User::findOrFail(Auth::user()->get()->id)->applicant_id;
        $batch_id = BatchApplicant::where('applicant_id', $applicant_id)->first()->batch_id;
        $applicant_data = BillingVApplicantHistory::where('applicant_id', $batch_id)->get();

       // $student_data = BillingVStudentHistory::where('applicant_id', $batch_id)->get();

        return View::make('fees::student.billing_history.index',compact('applicant_data','student_data'));

    }



}