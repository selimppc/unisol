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
        $data = InvAdjustHead::where('status', '!=', 'cancel')->latest('id')->get();
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

    public function approve_stock_adjustment(){
        echo "Hello";
    }


    public function add_product_stock_adjustment($adj_id){
        $adj_head = InvAdjustHead::find($adj_id);
        $adj_dt = InvAdjustDetail::where('inv_adjust_head_id', $adj_id)->get();
        return View::make('inventory::adjust_detail.add_edit', compact('adj_id', 'adj_head', 'adj_dt'));
    }

    // AJax Product Search
    public function ajaxAdjustmentProductAutoComplete(){
        $term = Input::get('term');
        $results = array();
        $queries = DB::table('inv_v_stock')
            ->where('title', 'LIKE', '%'.$term.'%')
            ->orWhere('code', 'LIKE', '%'.$term.'%')
            ->groupBy('code')
            ->take(10)->get();
        foreach ($queries as $query)
        {
            $results[] = [
                'label' => $query->title.' - '.$query->code ,
                'id' => $query->inv_product_id,
                'rate'=>$query->rate ,
                'unit' =>$query->unit,
                'name' => $query->title,
                'available_qty' => $query->availableQty
            ];
        }
        return Response::json($results);
    }


    /*
     * Store Requisition Detail products
     *
     */
    public function store_adj_detail(){
        $data = Input::all();
        for($i = 0; $i < count(Input::get('inv_product_id')) ; $i++){
            $dt[] = [
                'inv_transfer_head_id' => Input::get('inv_transfer_head_id'),
                'inv_product_id'=> Input::get('inv_product_id')[$i],
                'rate'=> Input::get('rate')[$i],
                'unit'=> Input::get('unit')[$i],
                'quantity'=> Input::get('quantity')[$i],
            ];
        }
        $model = new InvAdjustDetail();
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


    /*
     * $id = Requisition Detail ID
     *
     */
    public function ajax_delete_adj_detail($id){
        $id = Input::get('id');
        DB::beginTransaction();
        try{
            InvAdjustDetail::destroy($id); //Batch::destroy(Request::get('id'));
            DB::commit();
            return Response::json("Successfully Deleted");
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            return Response::json("Can not delete !");
        }
    }




    public function sp_confirm_stock_adjustment($adj_head_id){
        $check = InvAdjustDetail::where('inv_adjust_head_id', $adj_head_id)->exists();
        if($check){
            //Call Store Procedure
            DB::select('call sp_inv_confirm_dispatch(?, ?)', array($adj_head_id, Auth::user()->get()->id) );
            Session::flash('message', 'Success:: Stock Adjustment!');
        }else{
            Session::flash('info', 'Adjustment Detail is empty. Please add product item. And try later!');
        }
        return Redirect::back();
    }


}
