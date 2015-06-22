<?php

class HrSalaryGradeController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }


// hr_Salary_grade
    public function index_hr_salary_grade()
    {
        $model = HrBank::orderBy('id', 'DESC')->paginate(5);
        return View::make('hr::hr.hr_bank.index', compact('model'));
    }

    public function store_hr_salary_grade()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new InvProductCategory();
            if($model->validate($input_data)) {
                DB::beginTransaction();
                try {
                    $model->create($input_data);
                    DB::commit();
                    Session::flash('message', 'Success !');
                } catch (Exception $e) {
                    //If there are any exceptions, rollback the transaction`
                    DB::rollback();
                    Session::flash('danger', 'Failed !');
                }
            }
        }
        return Redirect::back();
    }



    public function show_hr_salary_grade($id)
    {
        $data = InvProductCategory::findOrFail($pc_id);
        return View::make('inventory::product_category.show', compact('pageTitle', 'data'));
    }


    public function edit_hr_salary_grade($id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = InvProduct::findOrFail($p_id);
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
            $model = InvProduct::findOrFail($p_id);
            return View::make('inventory::product.edit', compact('model'));
        }
    }



    public function delete_hr_salary_grade($id)
    {
        DB::beginTransaction();
        try{
            InvProduct::destroy($p_id);
            DB::commit();
            Session::flash('message', 'Success !');
        }catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction`
            DB::rollback();
            Session::flash('danger', 'Failed !');
        }
        return Redirect::back();
    }


    public function batch_delete_hr_salary_grade()
    {
        DB::beginTransaction();
        try{
            InvProduct::destroy(Request::get('id'));
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
