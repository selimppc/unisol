<?php

class HrLeaveTypeController extends \BaseController {

    function __construct() {
        $this->beforeFilter('hr', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index()
    {
        $model = HrLeaveType::latest('id')->get();
        return View::make('hr::hr.leave_type.index',compact('model'));
    }

    public function storeLeaveType()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $id = Input::get('leave_type_id');

            $model = $id ? HrLeaveType::find($id) : new HrLeaveType();

            if($model->validate($input_data)) {
                DB::beginTransaction();
                try{
                    if($id){
                        $model->update($input_data);
                        DB::commit();
                        Session::flash('message', 'Successfully Updated !');
                    }else{
                        $model->create($input_data);
                        DB::commit();
                        Session::flash('message', 'Successfully added !');
                    }
                }catch ( Exception $e ){
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }else{
                Session::flash('danger', 'Validation Error!! Please FillUp These Fields With Integer Values.');
            }
            return Redirect::back();
        }
    }

    public function showLeaveType($id)
    {
        $model = HrLeaveType::find($id);
        return View::make('hr::hr.leave_type.show',compact('model'));
    }

    public function editLeaveType($id){

        $model = HrLeaveType::find($id);
        return View::make('hr::hr.leave_type.edit',compact('model'));
    }
    
    public function ajaxDelete()
    {
        $id = Input::get('id');
        DB::beginTransaction();
        try {
            HrLeaveType::destroy($id);
            DB::commit();
            return Response::json("Successfully Deleted");
        }
        catch(exception $ex){
            DB::rollback();
            return Response::json("Can not be Deleted !");
        }
    }

    public function batchDelete()
    {
        try {
            HrLeaveType::destroy(Request::get('ids'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        } catch (exception $ex) {
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }
}
