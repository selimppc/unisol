<?php

class AdmTestSubjectController extends \BaseController {

	public function Index()
    {
        $adm_test_sbjct = AdmTestSubject::latest('id')->paginate(10);
        return View::make('common::adm_test_subject.index',compact('adm_test_sbjct'));
    }

    public function View($id)
    {
        $view_adm_test_subject = AdmTestSubject::find($id);
        return View::make('common::adm_test_subject.view',compact('view_adm_test_subject'));
    }

    public function  Create()
    {
        return View::make('common::adm_test_subject._form');
    }

    public function Store()
    {
        $data = Input::all();
        $model = new AdmTestSubject();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                if ($model->create($data))
                    DB::commit();
                Session::flash('message', "$name Adm Test Subject Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Invalid!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    public function Edit($id)
    {
        $edit_adm_test_subject = AdmTestSubject::find($id);
        return View::make('common::adm_test_subject.edit',compact('edit_adm_test_subject'));
    }

    public function Update($id)
    {

        $data = Input::all();
        $model = AdmTestSubject::find($id);
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "$name Admission Test Subject Updates");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Admission Test Subject not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }

    public function Delete($id)
    {
        try {
            $data= AdmTestSubject::find($id);
            $name = $data->title;
            if($data->delete())
            {
                Session::flash('message', "$name Adm Test Subject Deleted");
                return Redirect::back();
            }
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }

    public function BatchDelete()
    {
        AdmTestSubject::destroy(Request::get('id'));
        return Redirect::back()->with('message','Successfully deleted Information!');
    }
}