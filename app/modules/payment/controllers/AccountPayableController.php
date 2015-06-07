<?php

class AccountPayableController extends \BaseController {

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
	public function index_account_payable()
	{
        $pageTitle = "Manage Account Payable ";
        $data = InvGrnHead::where('status', '=', 'GRN Confirmed')->latest('id')->get();
        return View::make('payment::account_payable.index', compact('data','pageTitle'));
	}


    /*
     * $grn_id ::
     */
    public function show_detail_grn($grn_id){
        $grn_head = InvGrnHead::find($grn_id);
        $grn_dt = InvGrnDetail::where('inv_grn_head_id', $grn_id)->get();
        return View::make('payment::account_payable.show', compact('grn_id', 'grn_head', 'grn_dt'));
    }


    public function ap_create_invoice($grn_id){
        $sql = sprintf("call sp_im_invoice(%s,'%s')",
            $id,
            $insertuser = Yii::app()->user->name
        );
        $command  = Yii::app()->db->createCommand($sql);
        $command->execute();

        return Redirect::back();
    }

}
