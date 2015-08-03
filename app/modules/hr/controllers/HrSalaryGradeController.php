<?php

class HrSalaryGradeController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('hr', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

//hr_salary_grade
    public function index_hr_salary_grade()
    {
        $pageTitle = 'Salary Grade List';
        $model = HrSalaryGrade::orderBy('id', 'ASC')->paginate(5);
        return View::make('hr::hr.salary_grade.index', compact('model','pageTitle'));
    }

    public function store_hr_salary_grade()
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = new HrSalaryGrade();
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

    public function show_hr_salary_grade($s_g_id)
    {
        $data = HrSalaryGrade::findOrFail($s_g_id);
        return View::make('hr::hr.salary_grade.view', compact('pageTitle', 'data'));
    }

    public function edit_hr_salary_grade($s_g_id)
    {
        if($this->isPostRequest()){
            $input_data = Input::all();
            $model = HrSalaryGrade::findOrFail($s_g_id);
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
            $model = HrSalaryGrade::findOrFail($s_g_id);
            return View::make('hr::hr.salary_grade.edit', compact('model'));
        }
    }

    public function destroy_hr_salary_grade($s_g_id)
    {
        DB::beginTransaction();
        try{
            HrSalaryGrade::destroy($s_g_id);
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
            HrSalaryGrade::destroy(Request::get('id'));
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
