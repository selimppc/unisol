<?php

class FeesController extends \BaseController {

    function __construct() {
        $this->beforeFilter('feesAmw', array('except' => array('')));
//		$this->beforeFilter('academicAmw', array('except' => array('index')));
    }

    /**********************Billing Setup Start***************************/

    public function indexBillingSetup()
    {
        $billing_setup = BillingSetup::orderBy('id', 'DESC')->get();
        return View::Make('fees::billing_setup.index',compact('billing_setup'));
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
        $data = Input::all();
        $model = new BillingSetup();
        $model->billing_schedule_id = Input::get('schedule_id');
        $model->billing_item_id = Input::get('item_id');
        $model->batch_id = Input::get('batch_id');
        $model->cost = Input::get('cost');
        $model->deadline = Input::get('deadline');
        $model->fined_cost = Input::get('fined');

        if($model->save()){
            Session::flash('message', "Billing is Setup Successfully");
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()->with('errors', 'Invalid Request');
        }

    }

    public function viewBillingSetup($id)
    {
        $view_category = LibBookCategory::find($id);
        return View::make('library::librarian.category.view',compact('view_category'));
    }


    public function editBillingSetup($id)
    {

        $degree = ['' => 'Select Degree to Edit'] + DegreeProgram::lists('title', 'id');
        $batch_id = ['' => 'Select Batch']+ Batch::lists('batch_number', 'id');
        $schedule_id = ['' => 'Select Billing Schedule']+ BillingSchedule::lists('title', 'id');
        $item_id = ['' => 'Select Billing Item']+ BillingItem::lists('title', 'id');
        $edit_billing_setup = BillingSetup::find($id);
        return View::make('fees::billing_setup.edit',compact('edit_billing_setup','degree','batch_id','schedule_id','item_id'));
    }


    public function updateBillingSetup($id)
    {
        $data = Input::all();
        $model = BillingSetup::find($id);
    /*    $model->title = Input::get('title');
        $flash_msg = $model->title;*/
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "Billing is Setup Successfully");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Billing is Setup Not Updated. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
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

	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
