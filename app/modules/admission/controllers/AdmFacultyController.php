<?php

class AdmFacultyController extends \BaseController {

    function __construct() {
        $this->beforeFilter('admFaculty', array('except' => array('index')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

// Admission : Course starts here...........................................................



	public function indexBatchAdmTestSubject()
	{
        $index_admtest_subject = BatchAdmtestSubject::latest('id')->paginate(10);
        return View::make('admission::faculty.batch_admtest_subject.index',compact('index_admtest_subject'));

	}

    public function searchBatchAdmTestSubject()
    {


        return View::make('admission::faculty.batch_admtest_subject.index',compact(''));

    }



    public function batchDelete()
    {
        try {
            BatchAdmtestSubject::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }





}
