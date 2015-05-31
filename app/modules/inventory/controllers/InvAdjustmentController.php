<?php

class InvAdjustmentController extends \BaseController {

    /*
     * POST REQUEST
     */
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }



	public function index_stock_adjustment(){
        $pageTitle = "Stock Adjustment ";
        $data = InvAdjustHead::where('status', '!=', 'cancel')->get();
        return View::make('inventory::adjust_head.index', compact('data','pageTitle'));
    }


    public function store_stock_adjustment(){
        if($this->isPostRequest()){

            $input_data = Input::all();
            $model = new InvAdjustHead();
            if($model->validate($input_data)) {
                DB::beginTransaction();
                try {
                    $model->create($input_data);
                    DB::commit();
                    Session::flash('message', 'Success !');
                }catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
        }
        return Redirect::back();
    }

    public function edit_stock_adjustment($adj_id){
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = InvAdjustHead::findOrFail($adj_id);
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
            $model = InvAdjustHead::findOrFail($adj_id);
            return View::make('inventory::adjust_head.edit', compact('model'));
        }
    }

    public function show_stock_adjustment($adj_id){
        $data = InvAdjustHead::where('status', '!=','cancel')->find($adj_id);
        $adj_dt = InvAdjustDetail::where('inv_adjust_head_id', $adj_id)->get();
        return View::make('inventory::adjust_head.show', compact('pageTitle', 'data', 'adj_dt'));
    }

    public function cancel_stock_adjustment($sd_id){
        $model = InvAdjustHead::findOrFail($sd_id);
        $model->status = 'cancel';
        DB::beginTransaction();
        try{
            $model->save();
            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }

    public function batch_cancel_stock_adjustment()
    {
        DB::beginTransaction();
        try{
            InvAdjustDetail::whereIn('id', Request::get('id'))->update(['status'=> 'cancel']);
            DB::commit();
            Session::flash('message', 'Success !');
        }catch( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }



    //TODO :: details
git

}
