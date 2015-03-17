<?php

class AdmTestSubjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

    public function admTestSubjectIndex(){

        $adm_test_sbjct = AdmTestSubject::latest('id')->paginate(10);

        return View::make('common::adm_test_subject.index',compact('adm_test_sbjct'));
    }

    public function  admTestSubjectCreate()
    {
        return View::make('common::adm_test_subject._form');
    }

    public function admTestSubjectStore(){

        $data = Input::all();
        if (AdmTestSubject::create($data)) {

            return Redirect::back()
                ->with('message', 'Successfully added Information!');
        } else{
            return Redirect::back()
                ->with('message', 'invalid');
        }
    }

    public function admTestSubjectView($id){
        $view_question_paper = AdmTestSubject::find($id);

        return View::make('admission::amw.admission_test.view_question_paper.blade.php',compact('view_question_paper'));
    }

    public function admTestSubjectEdit($id){
        $edit_question_paper = AdmTestSubject::find($id);

        return View::make('admission::amw.admission_test.edit_admtest_subject',compact('edit_question_paper'));
    }

    public function admTestSubjectUpdate($id)
    {
        $model = AdmTestSubject::find($id);
        $data = Input::all();

        $model->fill($data);

        if ($model->save()) {
            return Redirect::back()
                ->with('message', 'Successfully Updated Information!');
        }else{
            return Redirect::back();
        }
    }




    public function admTestSubjectDelete($id)
    {
        AdmTestSubject::find($id)->delete();
        return Redirect::back()->with('message', 'Successfully deleted Information!');
    }



    public function admTestSubjectBatchDelete()
    {
        AdmTestSubject::destroy(Request::get('ids'));
        return Redirect::back()->with('message','Successfully deleted Information!');
    }


}
