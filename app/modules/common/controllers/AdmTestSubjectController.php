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
        if($model->validate($data)){
            if($model->create($data)){
                Session::flash('message', "$name Adm Test Subject Added");
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('error', 'invalid');
        }
    }

    public function Edit($id)
    {
        $edit_adm_test_subject = AdmTestSubject::find($id);
        return View::make('common::adm_test_subject.edit',compact('edit_adm_test_subject'));
    }

    public function Update($id)
    {
        $model = AdmTestSubject::find($id);
        $data = Input::all();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data)){
            if($model->update($data)){
                Session::flash('message', "$name Adm Test Subject Updated");
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('error', 'invalid');
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