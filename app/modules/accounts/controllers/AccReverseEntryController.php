<?php

class AccReverseEntryController extends \BaseController {

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

    /*
     * All data list(s)
     */
    public function index_reverse_voucher()
    {
        $pageTitle = 'Reverse Voucher Lists';
        $year = ['' => 'Select Year'] + Year::lists('title', 'id');
        $period = AccChartOfAccounts::list_period();
        $data = AccVoucherHead::where('status', '!=','cancel')->latest('id')->paginate('10');
        return View::make('accounts::reverse_voucher.index', compact(
            'pageTitle', 'data', 'year', 'period'
        ));
    }

    /*
     * Store input data into reverse voucher table
     *
     */
    public function store_reverse_voucher()
    {
        if($this->isPostRequest()) {
            $rec_no = AccTrnNoSetup::where('title', '=', "Reverse Voucher")
                ->select(DB::raw('CONCAT (code, LPAD(last_number + 1, 8, 0)) as number'))
                ->first()->number;
            $input_data = Input::all();
            $inp_data = [
                'voucher_number' => $rec_no,
                'date' => $input_data['date'],
                'reference' => $input_data['reference'],
                'year_id' => $input_data['year_id'],
                'period' => $input_data['period'],
                'note' => $input_data['note'],
                'status' => "open",
            ];
            $model = new AccVoucherHead();
            if ($model->validate($inp_data)) {
                DB::beginTransaction();
                try {
                    $model->create($inp_data);
                    DB::table('acc_trn_no_setup')->where('title', '=', "Reverse Voucher")
                        ->update(array('last_number' => substr($rec_no, 4)));
                    DB::commit();
                    Session::flash('message', 'Success !');
                } catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
            return Redirect::back();
        }
    }

    /*
     * Show specific model data only
     * $rev_id => receipt voucher ID
     */
    public function show_reverse_voucher($rev_id){
        $data = AccVoucherHead::where('status', '!=','cancel')->find($rev_id);
        $rev_dt = AccVoucherDetail::where('acc_voucher_head_id', $data->id)->get();
        return View::make('accounts::receipt_voucher.show', compact('pageTitle', 'data', 'rev_dt'));
    }

    /*
     * edit and update specific model data only
     * $rev_id => reverse voucher ID
     */
    public function edit_reverse_voucher($rev_id){
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = AccVoucherHead::findOrFail($rev_id);
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
            $year = ['' => 'Select Year'] + Year::lists('title', 'id');
            $period = AccChartOfAccounts::list_period();
            $model = AccVoucherHead::findOrFail($rev_id);
            return View::make('accounts::receipt_voucher.edit', compact('model', 'year', 'period'));
        }

    }

    /*
     * Delete specific model data only
     * $rev_id => reverse voucher ID
     */
    public function destroy_reverse_voucher($rev_id){
        $model = AccVoucherHead::findOrFail($rev_id);
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


    /*
     * Mass / Batch Delete from Product Category Table
     */
    public function batch_delete_reverse_voucher()
    {
        DB::beginTransaction();
        try{
            AccVoucherHead::whereIn('id', Request::get('id'))->update(['status'=> 'cancel']);
            DB::commit();
            Session::flash('message', 'Success !');
        }catch( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }





    /*
     *  ====================================================================================
     *  reverse voucher Detail Area
     *  =====================================================================================
     */

    /*
     * detail of reverse voucher item(s)
     */
    public function detail_reverse_voucher($rev_id){
        $rev_head = AccVoucherHead::find($rev_id);
        $rev_dt = AccVoucherDetail::where('acc_voucher_head_id', $rev_id)->get();
        return View::make('accounts::receipt_voucher_detail.add_edit', compact('rev_id', 'rev_head', 'rev_dt'));
    }

    // AJax Product Search
    public function ajaxGetCoaAutoComplete(){

        $term = Input::get('term');
        $results = array();
        $queries = DB::table('acc_chart_of_accounts')
            ->where('description', 'LIKE', '%'.$term.'%')
            ->orWhere('account_code', 'LIKE', '%'.$term.'%')
            ->take(10)->get();
        foreach ($queries as $query)
        {
            $results[] = [
                'label' => $query->description.' - '.$query->account_code ,
                'id' => $query->id,
                'code'=>$query->account_code ,
                'name' =>$query->description,
            ];
        }
        return Response::json($results);
    }



    /*
     * Store reverse Voucher Detail
     *
     */
    public function store_reverse_voucher_detail(){
        $data = Input::all();
        for($i = 0; $i < count(Input::get('acc_chart_of_accounts_id')) ; $i++){
            $dt[] = [
                'acc_voucher_head_id' => Input::get('acc_voucher_head_id'),
                'acc_chart_of_accounts_id'=> Input::get('acc_chart_of_accounts_id')[$i],
                'prime_amount'=> Input::get('prime_amount')[$i],
                'note'=> Input::get('note')[$i],
            ];
        }
        $model = new AccVoucherDetail();
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
    public function ajax_delete_reverse_voucher_detail(){
        $id = Input::get('id');
        DB::beginTransaction();
        try{
            AccVoucherDetail::destroy($id);
            DB::commit();
            return Response::json("Successfully Deleted");
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            return Response::json("Can not delete !");
        }
    }

}
