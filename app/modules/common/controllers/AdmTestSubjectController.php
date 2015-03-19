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
        if($model->validate($data)){
            if($model->create($data)){
                Session::flash('message', 'Successfully added Information!');
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

        if($model->validate($data)){
            if($model->update($data)){
                Session::flash('message', 'Successfully Updates Information!');
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
        AdmTestSubject::find($id)->delete();
        return Redirect::back()->with('message', 'Successfully deleted Information!');
    }

    public function BatchDelete()
    {
        AdmTestSubject::destroy(Request::get('id'));
        return Redirect::back()->with('message','Successfully deleted Information!');
    }
}