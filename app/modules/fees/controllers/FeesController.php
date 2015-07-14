<?php

class FeesController extends \BaseController {

    function __construct() {
        $this->beforeFilter('feesAmw', array('except' => array('')));
    }

    /*
    * POST REQUEST To save data
    */
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    /****==================================================================
                                Billing Setup Start
    ===================================================================****/

    public function indexBillingSetup()
    {
        $degree = ['' => 'Select Degree'] + DegreeProgram::lists('title', 'id');
        $batch = ['' => 'Select Batch'] + Batch::lists('batch_number', 'id');

        $degree_id = Input::get("degree_id");
        $batch_id = Input::get("batch_id");
        Input::flash();

        $q = BillingSetup::with('relBillingSchedule','relBillingSchedule','relBatch','relBatch.relDegree.relDegreeProgram');

        if (!empty($degree_id)) {
            $q->whereExists(function($query) use ($degree_id)
            {
                $query->from('batch')
                    ->whereRaw('batch.id = billing_setup.batch_id')
                    ->where('batch.degree_id', $degree_id);
            });
        }
        if (!empty($batch_id)) {
            $q->where(function($query) use ($batch_id) {
                $query->where('batch_id', '=', $batch_id);
            });
        }
        $data = $q->orderBy('id', 'DESC')->paginate(10);

        return View::Make('fees::billing_setup.index', compact('degree', 'batch','data'));
    }

    public function createBillingSetup()
    {
        $degree = ['' => 'Select Degree'] + DegreeProgram::lists('title', 'id');
        $batch_id = ['' => 'Select Batch']+ Batch::lists('batch_number', 'id');

        $schedule_id = ['' => 'Select Billing Schedule']+ BillingSchedule::lists('title', 'id');
        $item_id = ['' => 'Select Billing Item']+ BillingItem::lists('title', 'id');
        return View::Make('fees::billing_setup.create',compact('billing_setup','degree','batch_id','schedule_id','item_id'));
    }

    public function createAjaxBatchList()
    {
        $degree_prog_id = Input::get('degree');
        $degree = Degree::where('degree_program_id', $degree_prog_id)->first();
        $deg_id = $degree->id;
        $Batch = Batch::where('degree_id', '=', $deg_id)->lists('batch_number', 'id');
        if($Batch){
            return Response::make(['Please select one']+ $Batch);
        }else{
            return Response::make(['No data found']);
        }
    }

    public function storeBillingSetup()
    {
        if($this->isPostRequest()) {
            $data = Input::all();
            $model = new BillingSetup();
            if ($model->validate($data)) {
                DB::beginTransaction();
                try {
                    $model->billing_schedule_id = Input::get('schedule_id');
                    $model->billing_item_id = Input::get('item_id');
                    $model->batch_id = Input::get('batch_id');
                    $model->cost = Input::get('cost');
                    $model->deadline = Input::get('deadline');
                    $model->fined_cost = Input::get('fined');
                    $model->save();
                    DB::commit();
                    Session::flash('message', "Billing is Setup Successfully");
                    return Redirect::back();
                }
                catch ( Exception $e ){
                        //If there are any exceptions, rollback the transaction
                        DB::rollback();
                        Session::flash('danger', "not added.Invalid Request!");
                    }
                    return Redirect::back();
            } else {
                $errors = $model->errors();
                Session::flash('errors', $errors);
                return Redirect::back()
                    ->with('errors', 'invalid');
            }
        }
        return Redirect::back();
    }

    public function viewBillingSetup($id)
    {
        $view_billing_setup = BillingSetup::find($id);
        $view_details = BillingSetup::with('relBatch', 'relBatch.relDegree','relBatch.relDegree.relDegreeProgram')
            ->where('id', '=', $id)
            ->first();
        return View::make('fees::billing_setup.view',compact('view_billing_setup','view_details'));
    }

    public function editBillingSetup($id)
    {
        $edit_billing_setup = BillingSetup::find($id);
        $degree_program_name= BillingSetup::with('relBatch', 'relBatch.relDegree','relBatch.relDegree.relDegreeProgram')
            ->where('id', '=', $id)
            ->first();

        $degree = ['' => 'Please Select Degree to Edit'] + DegreeProgram::lists('title', 'id');
        $batch_id = ['' => 'Select Batch']+ Batch::lists('batch_number', 'id');
        $schedule_id = ['' => 'Select Billing Schedule']+ BillingSchedule::lists('title', 'id');
        $item_id = ['' => 'Select Billing Item']+ BillingItem::lists('title', 'id');

        return View::make('fees::billing_setup.edit',compact('edit_billing_setup','degree','batch_id','schedule_id','item_id','degree_program_name'));
    }

    public function updateBillingSetup($id)
    {
        if($this->isPostRequest()) {
            $data = Input::all();
            $model = BillingSetup::find($id);
            if ($model->validate($data)) {
                DB::beginTransaction();
                try {
                    $model->billing_schedule_id = Input::get('schedule_id');
                    $model->billing_item_id = Input::get('item_id');
                    $model->batch_id = Input::get('batch_id');
                    $model->cost = Input::get('cost');
                    $model->deadline = Input::get('deadline');
                    $model->fined_cost = Input::get('fined');
                    $model->save();
                    DB::commit();
                    Session::flash('message', "Billing is Setup Successfully");
                    return Redirect::back();
                }
                catch ( Exception $e ){
                    //If there are any exceptions, rollback the transaction
                    DB::rollback();
                    Session::flash('danger', "not added.Invalid Request!");
                }
                return Redirect::back();
            } else {
                $errors = $model->errors();
                Session::flash('errors', $errors);
                return Redirect::back()
                    ->with('errors', 'invalid');
            }
        }

        return Redirect::back();
    }

    public function deleteBillingSetup($id)
    {
        try {
            $data= BillingSetup::find($id);
            if($data->delete())
            {
                Session::flash('message', "Billing setup Item Deleted");
                return Redirect::back();
            }
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    /***
     * @author Ratna
     * @param $id
     *
    */
    public function batchdeleteBillingSetup($id)
    {
        try {
            BillingSetup::destroy(Request::get('id'));
            Session::flash('message', "Success: Selected items Deleted ");
            return Redirect::back();
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    /****==================================================================
                            Billing History Start
    ===================================================================****/

	public function index_billing_history()
	{
        $degree = ['' => 'Select Degree'] + DegreeProgram::lists('title', 'id');
        $batch = ['' => 'Select Batch']+ Batch::lists('batch_number', 'id');
        $department = ['' => 'Select Department']+ Department::lists('title', 'id');

        $department_id = Input::get('department_id');
        $degree_id = Input::get('degree_id');
        $batch_id = Input::get('batch_id');
        $name  = Input::get('student_name');

        Input::flash();
            $q = new BillingVApplicantHistory();

            if (!empty($department_id)) {
                $q = $q->where('department_id', '=', $department_id);
            }

            if (!empty($degree_id)) {
                $q = $q->where('degree_id', '=', $degree_id);
            }

            if (!empty($batch_id)) {
                $q = $q->where('batch_id', '=', $batch_id);
            }

            if (!empty($name)) {
                $q = $q->where('first_name', 'like', "%$name%");
                $q = $q->orWhere('last_name', 'like', "%$name%");
            }

          $data = $q->get();

        return View::make('fees::billing_history.index_applicant',compact('degree','batch','department','applicant','data'));

	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
    public function billing_history_show($id)
    {
            $data = BillingVApplicantHistory::where('id', $id)->first();
            $relation_data = BillingSummaryApplicant::with('relBillingDetailsApplicant',  'relBillingSchedule')
                ->where('id', $id)
                ->get();
        #print_r($relation_data[0]['relBillingDetailsApplicant'][0]['relBillingItem']['title']);exit;
        return View::make('fees::billing_history.view_applicant',compact('data','relation_data'));

    }

    public function index_student_billing_history()
    {
        $degree = ['' => 'Select Degree'] + DegreeProgram::lists('title', 'id');
        $batch = ['' => 'Select Batch']+ Batch::lists('batch_number', 'id');
        $department = ['' => 'Select Department']+ Department::lists('title', 'id');

        $department_id = Input::get('department_id');
        $degree_id = Input::get('degree_id');
        $batch_id = Input::get('batch_id');
        $student_id  = Input::get('student_id');
        $name  = Input::get('student_name');

        Input::flash();

            $q = new BillingVStudentHistory();

            if (!empty($department_id)) {
                $q = $q->where('department_id', '=', $department_id);
            }

            if (!empty($degree_id)) {
                $q = $q->where('degree_id', '=', $degree_id);
            }

            if (!empty($batch_id)) {
                $q = $q->where('batch_id', '=', $batch_id);
            }

            if (!empty($name)) {
                $q = $q->where('first_name', 'like', "%$name%");
                $q = $q->orWhere('last_name', 'like', "%$name%");
            }
            if (!empty($student_id)) {
                $q->where('student_id', '=', $student_id);
            }

        $data = $q->get();

        return View::make('fees::billing_history.index_student',compact('degree','batch','department','student','data'));
    }

    public function view_student_billing_history($id)
    {
        $data = BillingVStudentHistory::where('id', $id)->first();
        $relation_data = BillingSummaryStudent::with('relBillingDetailsStudent.relBillingItem', 'relBillingSchedule')->where('id', $id)->get();
        return View::make('fees::billing_history.view_student',compact('data','relation_data'));
    }

    /****==================================================================
                        Installment Setup Start
    ===================================================================****/

    public function index_installment_setup()
    {
        $degree = ['' => 'Select Degree'] + DegreeProgram::lists('title', 'id');
        $batch = ['' => 'Select Batch']+ Batch::lists('batch_number', 'id');
        $schedule = DB::table('billing_schedule')->orderBy('id', 'DESC')->lists('title','id');
        $item = DB::table('billing_item')->orderBy('id', 'DESC')->lists('title','id');

        $degree_id = Input::get("degree_id");
        Input::flash();

        $q = InstallmentSetup::with('relBillingSchedule','relBillingSchedule','relBatch','relBatch.relDegree.relDegreeProgram');

        if (!empty($degree_id)) {
            $q->whereExists(function($query) use ($degree_id)
            {
                $query->from('batch')
                    ->whereRaw('batch.id = installment_setup.batch_id')
                    ->where('batch.degree_id', $degree_id);

            });
        }
        $data = $q->groupBy('batch_id');
        $data = $q->orderBy('id', 'DESC')->paginate(10);
        return View::Make('fees::installment_setup.index',compact('degree','batch','schedule','item','data','installment_setup'));
    }

    public function create_installment_setup()
    {
        $degprog_id         = Input::get('degprog_id');
        $batch_id           = Input::get('batch_id');
        $schedule_id        = Input::get('schedule_id');
        $item_id            = Input::get('item_id');
        $no_installment     = Input::get('no_installment');
        $status             = Input::get('status');

        /****************For View page installment***********
         **************/
        $setup = DB::table('installment_setup')
            ->where('installment_setup.batch_id', '=' ,$batch_id)
            ->get();

        if($setup && $status != 'recreate'){
            $view_details = InstallmentSetup::with('relBatch', 'relBatch.relDegree','relBatch.relDegree.relDegreeProgram')
                ->where('batch_id', '=', $batch_id)
                ->first();

            $view_installment_setup = InstallmentSetup::with('relBatch')
                ->where('batch_id', '=', $batch_id)
                ->get();

            $total_cost = DB::table('installment_setup')
                ->where('installment_setup.batch_id', '=', $batch_id )
                ->sum('installment_setup.cost');

            $total_fined_cost = DB::table('installment_setup')
                ->where('installment_setup.batch_id', '=', $batch_id )
                ->sum('installment_setup.fined_cost');

            return View::make('fees::installment_setup.view',compact('view_installment_setup','view_details','total_cost','total_fined_cost', 'batch_id', 'schedule_id', 'item_id'));

        }else{

            /******************For create page installment*************
             ****************/
            $view_details = BillingSetup::with('relBatch', 'relBatch.relDegree','relBatch.relDegree.relDegreeProgram')
                ->where('batch_id', '=', $batch_id)
                ->first();
            $data = DB::table('billing_setup')
                ->join('billing_item','billing_setup.billing_item_id','=','billing_item.id')
                ->groupBy('billing_item.initial')
                ->where('billing_item.initial', '=', 'acm' )
                ->where('billing_setup.batch_id', '=', $batch_id )
                ->sum('billing_setup.cost');

            $no_installment_price = ($data !=0) ? $data/$no_installment : '';
            $total = round($no_installment_price,2);

            $fined_total = $total*0.05;
            $totalfc = round($fined_total,2);

            // Calcuation of installment dealines
            $batch = Batch::find($batch_id)->select('start_date', 'end_date')->first();////
            $end_date = strtotime($batch['end_date']);
            $start_date = strtotime($batch['start_date']);
            $duration = floor(( $end_date - $start_date ) / (3600 * 24 * 30) / $no_installment);
            $deadlines = array();
            for($i = 0; $i < $no_installment ; $i++){
                $deadlines[$i] = date("Y-m-d", strtotime("+".$i*$duration." months +15 days", strtotime($batch['start_date'])));
            }
            //print_r($deadlines);exit;
            return View::Make('fees::installment_setup.create', compact('view_details','data', 'no_installment', 'no_installment_price','batch_id','schedule_id','item_id','degprog_id', 'deadlines', 'status','total','totalfc'));
        }
    }

    public function save_installment_setup()
    {
        if($this->isPostRequest()) {
            $data = Input::all();
            $amount = Input::get('amount');
            $deadline = Input::get('deadline');
            $fined_cost = Input::get('fined_cost');
            DB::beginTransaction();

            if($data['status'] == 'recreate'){
                //**********Delete previous items with this batch id**********/
                InstallmentSetup::where('batch_id', $data['batch_id'])->delete();
            }
            try {
                for($k = 0; $k < count($amount); $k++){
                    $model = new InstallmentSetup();
                    $model->billing_schedule_id = Input::get('schedule_id');
                    $model->billing_item_id = Input::get('item_id');
                    $model->batch_id = Input::get('batch_id');
                    $model->cost = $amount[$k];
                    $model->deadline = $deadline[$k];
                    $model->fined_cost = $fined_cost[$k];
                    $model->save();
                    DB::commit();
                }
                Session::flash('message', "Billing is Setup Successfully");
                return Redirect::to('fees/installment/setup');
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "not added.Invalid Request!");
            }
            return Redirect::to('fees/installment/setup');

        }
        return Redirect::to('fees/installment/setup');
    }

    public function view_installment_setup($batch_id)
    {
        $view_details = InstallmentSetup::with('relBatch','relBatch.relDegree','relBatch.relDegree.relDegreeProgram')
            ->where('batch_id', '=', $batch_id)
            ->first();

        $schedule_id = $view_details['billing_schedule_id'];
        $item_id = $view_details['billing_item_id'];

        $total_cost = DB::table('installment_setup')
            ->where('installment_setup.batch_id', '=', $batch_id )
            ->sum('installment_setup.cost');

        $total_fined_cost = DB::table('installment_setup')
            ->where('installment_setup.batch_id', '=', $batch_id )
            ->sum('installment_setup.fined_cost');

        $view_installment_setup = InstallmentSetup::with('relBatch')
            ->where('batch_id', '=', $batch_id)
            ->get();

        return View::make('fees::installment_setup.view',compact('view_installment_setup','view_details','total_cost','total_fined_cost', 'batch_id', 'schedule_id', 'item_id'));
    }


    /****==================================================================
                            Billing Item Start
    ===================================================================****/

    public function index_billing_item()
    {
        $billing_item = BillingItem::orderBy('id', 'ASC')->paginate(9);
        return View::Make('fees::billing_item.index',compact('billing_item'));
    }

    public function save_item()
    {
        $data = Input::all();
        $model = new BillingItem();
        $model->title = Input::get('title');
        $flash_msg = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                if ($model->create($data))
                    DB::commit();
                Session::flash('message', "$flash_msg Billing Item Successfully Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$flash_msg Billing Item Not Added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    public  function edit_item($id)
    {
        $edit_item = BillingItem::find($id);
        return View::make('fees::billing_item.edit',compact('edit_item'));
    }

    public function update_billing_item($id)
    {
        $data = Input::all();
        $model = BillingItem::find($id);
        $model->title = Input::get('title');
        $flash_msg = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "$flash_msg Billing Item Successfully Updated");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$flash_msg Billing Item Not Updated. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }

    /****==================================================================
                            Billing Schedule Start
    ===================================================================****/

    public function index_billing_schedule()
    {
        $billing_schedule = BillingSchedule::orderBy('id', 'ASC')->paginate(10);
        return View::Make('fees::billing_schedule.index',compact('billing_schedule'));
    }

    public function save_schedule()
    {
        $data = Input::all();
        $model = new BillingSchedule();
        $model->title = Input::get('title');
        $flash_msg = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                if ($model->create($data))
                    DB::commit();
                Session::flash('message', "$flash_msg Billing Item Successfully Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$flash_msg Billing Item Not Added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    public  function edit_schedule($id)
    {
        $edit_schedule = BillingSchedule::find($id);
        return View::make('fees::billing_schedule.edit',compact('edit_schedule'));
    }

    public function update_billing_schedule($id)
    {
        $data = Input::all();
        $model = BillingSchedule::find($id);
        $model->title = Input::get('title');
        $flash_msg = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "$flash_msg Billing Schedule Successfully Updated");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$flash_msg Billing Schedule Not Updated. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }

    /****==================================================================
                    Billing Applicant Head start
    ===================================================================****/

    public function index_billing_summary()
    {
        $applicant = array(''=>'Select applicant') + Applicant::ApplicantList();
        $schedule = ['' => 'Select schedule'] + BillingSchedule::lists('title', 'id');
        $payment_option = ['' => 'Select Payment Option'] + PaymentOption::lists('title', 'id');
        $summary_applicant = BillingApplicantHead::latest('id')->with('relApplicant', 'relBillingSchedule')->get();
        return View::make('fees::billing_summary.applicant.index_applicant',compact('applicant','summary_applicant','schedule','payment_option'));
    }

    public function save_summary_applicant()
    {
        $data = Input::all();
        $model = new BillingApplicantHead();
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                if ($model->create($data))
                    DB::commit();
                Session::flash('message', "Billing summary applicant Successfully Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Billing summary applicant Not Added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()->with('errors', 'invalid');
        }
    }

    public function view_applicant_summary($id)
    {
        $view_summary_applicant = BillingApplicantHead::find($id);
        $view_details_applicant = BillingApplicantDetail::with('relBillingApplicantHead','relBillingItem','relWaiver')
             ->where('billing_applicant_head_id','=',$id)
             ->get();
        return View::make('fees::billing_summary.applicant.view_applicant',compact('view_summary_applicant','view_details_applicant','total'));
    }

    public function edit_applicant_summary($id)
    {
        $edit_summary = BillingApplicantHead::find($id);
        $applicant = array(''=>'Select applicant') + Applicant::ApplicantList();
        $schedule = ['' => 'Select schedule'] + BillingSchedule::lists('title', 'id');
        $payment_option = ['' => 'Select Payment Option'] + PaymentOption::lists('title', 'id');
        return View::make('fees::billing_summary.applicant.edit_applicant',compact('edit_summary','applicant','schedule','payment_option'));
    }

    public function update_applicant_summary($id)
    {
        $data = Input::all();
        $model = BillingApplicantHead::find($id);
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                if ($model->update($data))
                    DB::commit();
                Session::flash('message', "Billing summary applicant Successfully Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Billing summary applicant Not Added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    public  function update_applicant_head_status()
    {
        if($this->isPostRequest()) {
            $id = Input::get('id');
            $status = Input::get('status');
            DB::beginTransaction();
            try {
                $update = DB::table('billing_applicant_head')
                    ->where('id', $id)
                    ->where('status', "open")
                    ->update(array('status' => $status));
                DB::commit();
                if($update)
                    Session::flash('message', "Billing Details confirmed Successfully");
                else
                    Session::flash('danger', "Billing Details confirmed Is Just For One Time.");
                return Redirect::to('fees/billing/summary/applicant');
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "not added.Invalid Request!");
            }
            return Redirect::to('fees/billing/summary/applicant');
        }
        return Redirect::to('fees/billing/summary/applicant');

    }

    /****==================================================================
                  Billing details applicant start
     ===================================================================****/


    public function create_billing_details_applicant($id)
    {
        $billing_head_id = BillingApplicantHead::with('relApplicant','relBillingSchedule','relPaymentOption')
            ->where('id','=',$id)
            ->first()->id;

        $applicant_name = BillingApplicantHead::with('relApplicant','relBillingSchedule','relPaymentOption')
            ->where('id','=',$id)
            ->first();

        $billing_details_data = BillingApplicantDetail::latest('id')->with('relBillingApplicantHead','relBillingItem','relWaiver')
            ->where('billing_applicant_head_id','=',$id)
            ->get();

        $item = ['' => 'Select Billing Item'] + BillingItem::lists('title', 'id');
        $waiver = ['' => 'Select waiver'] + Waiver::lists('title', 'id');

        return View::Make('fees::billing_summary.applicant.create_details_applicant',compact('billing_head_id','item','waiver','billing_details_data','applicant_name'));
    }

    public function save_billing_details_applicant()
    {
        $data = Input::all();
        $counter = count(Input::get('billing_item_id'));
        for($i = 0; $i < $counter ; $i++){
            $all []= [
                'billing_applicant_head_id' => Input::get('billing_applicant_head_id')[$i],
                'billing_item_id' => Input::get('billing_item_id')[$i],
                'waiver_id'=> Input::get('waiver_id')[$i],
                'waiver_amount'=> Input::get('waiver_amount')[$i],
                'cost_per_unit'=> Input::get('cost_per_unit')[$i],
                'quantity'=> Input::get('quantity')[$i],
                'total_amount'=> Input::get('total_amount')[$i],
            ];

        }
      //  print_r($all);exit;
        $model = new BillingApplicantDetail();
        DB::beginTransaction();
        try{
            foreach($all as $values){
                $model->create($values);
            }
            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
           // print_r($e->getMessage());exit;
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }

    public function ajax_delete_detail()
    {
      if(Request::ajax())
        {
            $id = Input::get('billing_applicant_detail_id');
            $data = BillingApplicantDetail::find($id);
            if($data->delete())
                return Response::json(['msg'=> 'Data Successfully Deleted']);
            else
                return Response::json(['msg'=> 'Data Successfully Not Deleted']);
        }

    }


  /* Store procedure save example
   public function applicant_to_invoice( $billing_applicant_head_id )
    {
        $check = BillingApplicantDetail::where('billing_applicant_head_id', $billing_applicant_head_id)->exists();
        if($check){
            //Call Store Procedure
            DB::select('call sp_fees_applicant_to_invoice(?, ?)', array($billing_applicant_head_id, Auth::user()->get()->id ) );
            Session::flash('message', 'Invoiced Successfully !');
        }else{
            Session::flash('info', 'Applicant Billing Detail is empty. Please add Billing item. And try later!');
        }
        return Redirect::back();
    }*/


    /****==================================================================
                        Billing summary Student start
    ===================================================================****/

    public function index_billing_summary_student()
    {
        $student = array(''=>'Select Student') + User::StudentList();
        $schedule = ['' => 'Select schedule'] + BillingSchedule::lists('title', 'id');
        $payment_option = ['' => 'Select Payment Option'] + PaymentOption::lists('title', 'id');
        $summary_student = BillingStudentHead::latest('id')->with('relUser','relUser.relUserProfile', 'relBillingSchedule')->get();
        return View::make('fees::billing_summary.student.index',compact('student','summary_student','schedule','payment_option'));
    }

    public function view_summary_student($id)
    {
        $view_summary_student = BillingStudentHead::find($id);
        $view_details_student = BillingStudentDetail::with('relBillingStudentHead','relBillingItem','relWaiver')
            ->where('billing_student_head_id','=',$id)
            ->get();
        return View::make('fees::billing_summary.student.view',compact('view_summary_student','view_details_student','total'));
    }



}
