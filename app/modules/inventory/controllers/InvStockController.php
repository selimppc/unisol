<?php

class InvStockController extends \BaseController {

    function __construct() {
        $this->beforeFilter('amw', array('except' => array('')));
    }


    /*
     * POST REQUEST
     */
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function stock_view()
	{
        $pageTitle = "Stock History ";
        $data = InvVStock::get();
        return View::make('inventory::stock.stock_view', compact('data','pageTitle'));
	}


    public function stock_dispatch(){
        $data = InvTransferHead::where('status', '!=', 'cancel')->latest('id')->get();
        $pageTitle = "Stock Dispatch(s) ";

        return View::make('inventory::stock.stock_dispatch', compact('data','pageTitle'));
    }

    public function store_stock_dispatch(){
        if($this->isPostRequest()){
            $transfer_no = InvTrnNoSetup::where('title', '=', "Stock Transfer")
                ->select(DB::raw('CONCAT (code, LPAD(last_number + 1, 8, 0)) as number'))
                ->first()->number;
            $input_data = Input::all();
            $inp_data = [
                'transfer_number' => $transfer_no,
                'transfer_to' => $input_data['transfer_to'],
                'date' => $input_data['date'],
                'confirm_date' => $input_data['confirm_date'],
                'note' => $input_data['note'],
                'status'=> "open",
            ];
            $model = new InvTransferHead();
            if($model->validate($inp_data)) {
                DB::beginTransaction();
                try {
                    $model->create($inp_data);
                    DB::table('inv_trn_no_setup')->where('title', '=', "Stock Transfer")
                        ->update(array('last_number' => substr($transfer_no,4)));
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

    public function edit_stock_dispatch($sd_id){
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = InvTransferHead::findOrFail($sd_id);
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
            $model = InvTransferHead::findOrFail($sd_id);
            return View::make('inventory::stock.edit', compact('model'));
        }
    }

    public function show_stock_dispatch($sd_id){
        $data = InvTransferHead::where('status', '!=','cancel')->find($sd_id);
        $sd_dt = InvTransferDetail::where('inv_transfer_head_id', $sd_id)->get();
        return View::make('inventory::stock.show', compact('pageTitle', 'data', 'sd_dt'));
    }

    public function cancel_stock_dispatch($sd_id){
        $model = InvTransferHead::findOrFail($sd_id);
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

    public function batch_cancel_transfer()
    {
        DB::beginTransaction();
        try{
            InvTransferHead::whereIn('id', Request::get('id'))->update(['status'=> 'cancel']);
            DB::commit();
            Session::flash('message', 'Success !');
        }catch( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }

    //TODO :: approved / confirm Stock Transfer
    public function approve_stock_dispatch(){
        echo "Hello";
    }


    public function add_product_dispatch($sd_id){
        $sd_head = InvTransferHead::find($sd_id);
        $sd_dt = InvTransferDetail::where('inv_transfer_head_id', $sd_id)->get();
        return View::make('inventory::stock_transfer_detail.add_edit', compact('sd_id', 'sd_head', 'sd_dt'));
    }

    // AJax Product Search
    public function ajaxTransferProductAutoComplete(){
        $term = Input::get('term');
        $results = array();
        $queries = DB::table('inv_v_stock')
            ->where('title', 'LIKE', '%'.$term.'%')
            ->orWhere('code', 'LIKE', '%'.$term.'%')
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
    public function store_sd_detail(){
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
        $model = new InvTransferDetail();
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
    public function ajax_delete_sd_detail($id){
        $id = Input::get('id');
        DB::beginTransaction();
        try{
            InvTransferDetail::destroy($id); //Batch::destroy(Request::get('id'));
            DB::commit();
            return Response::json("Successfully Deleted");
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            return Response::json("Can not delete !");
        }
    }




    public function sp_confirm_dispatch ($transfer_head_id){
        $check = InvTransferDetail::where('inv_transfer_head_id', $transfer_head_id)->exists();
        if($check){
            //Call Store Procedure
            DB::select('call sp_inv_confirm_dispatch(?, ?)', array($transfer_head_id, Auth::user()->get()->id) );
            Session::flash('message', 'Stock Transferred Successfully !');
        }else{
            Session::flash('info', 'Transfer Detail is empty. Please add product item. And try later!');
        }
        return Redirect::back();
    }


    /*
     * Deliver Stock and Balanced
     *
     */

    public function deliver_stock(){
        $data = InvTransferHead::where('status', '=', 'Confirmed Dispatch')->get();
        $pageTitle = "Deliver Stock ";

        return View::make('inventory::stock.deliver', compact('data','pageTitle'));
    }

    public function confirm_deliver_stock($transfer_head_id){
        $check = InvTransferDetail::where('inv_transfer_head_id', $transfer_head_id)->exists();
        if($check){
            //Call Store Procedure
            DB::select('call sp_inv_confirm_dispatch(?, ?)', array($transfer_head_id, Auth::user()->get()->id) );
            Session::flash('message', 'Stock Transferred Successfully !');
        }else{
            Session::flash('info', 'Transfer Detail is empty. Please add product item. And try later!');
        }
        return Redirect::back();
    }





}
