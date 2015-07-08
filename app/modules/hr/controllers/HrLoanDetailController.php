<?php

class HrLoanDetailController extends \BaseController
{

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index_hr_loan_detail($loan_head_id)
    {
        $model = HrLoanDetail::with('relHrLoanHead')
            ->where('hr_loan_head_id', $loan_head_id)->get();

        $loan_head_name = HrLoanHead::where('id', $loan_head_id)->first();

        return View::make('hr::hr.loan_detail.index', compact('model','loan_head_id','loan_head_name'));
    }

    public function store_hr_loan_detail()
    {   for($i = 0; $i < count(Input::get('hr_loan_head_id')) ; $i++){
            $dt[] = [
                'hr_loan_head_id' => Input::get('hr_loan_head_id'),
                'amount'=> Input::get('amount')[$i],
                'date'=> Input::get('date')[$i],
            ];
        }
        $model = new HrLoanDetail();
        DB::beginTransaction();
        try{
            foreach($dt as $values){
                $model->create($values);
            }
            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }

    public function ajax_delete_hr_loan_detail()
    {
        $id = Input::get('id');
        DB::beginTransaction();
        try {
            HrLoanDetail::destroy($id);
            DB::commit();
            return Response::json("Successfully Deleted");
        }
        catch(exception $ex){
            DB::rollback();
            return Response::json("Can not be Deleted !");
        }
    }

    public function show_hr_loan_detail($ld_id)
    {
        $data = HrLoanDetail::findOrFail($ld_id);
        return View::make('hr::hr.loan_detail.view', compact('data'));
    }

    public function edit_hr_loan_detail($ld_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = HrLoanDetail::findOrFail($ld_id);
            if($model->validate($input_data)){
                DB::beginTransaction();
                try{
                    $model->update($input_data);
                    DB::commit();
                    Session::flash('message', 'Success !');
                }catch ( Exception $e ){
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
            return Redirect::back();
        }else{
            $model = HrLoanDetail::findOrFail($ld_id);
            $loan_head_id = HrLoanDetail::where('id', $ld_id)->first()->hr_loan_head_id;
            return View::make('hr::hr.loan_detail.edit', compact('model','loan_head_id'));
        }
    }

    public function destroy_hr_loan_detail($ld_id)
    {
        DB::beginTransaction();
        try{
            HrLoanDetail::destroy($ld_id);
            DB::commit();
            Session::flash('message', 'Successfully Deleted !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();

    }

    public function batch_delete_hr_loan_detail()
    {
        DB::beginTransaction();
        try{
            HrLoanDetail::destroy(Request::get('id'));
            DB::commit();
            Session::flash('message', 'Success !');
        }catch( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }
}