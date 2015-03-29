<?php

class AdmFacultyController extends \BaseController {

    function __construct() {
        $this->beforeFilter('admFaculty', array('except' => array('index')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

// Admission : Admission Test starts here...........................................................



	public function indexAdmExaminer()
	{
        $index_adm_examiner = AdmExaminer::with('relBatch','relBatch.relDegree',
            'relBatch.relDegree.relDepartment','relBatch.relYear','relBatch.relSemester')
            ->where('user_id', '=', Auth::user()->get()->id)
            ->get();

        $year_id = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_id = array('' => 'Select Semester ') + Semester::lists('title', 'id');
        return View::make('admission::faculty.admission_test.index',
            compact('index_adm_examiner','year_id','semester_id'));

	}

    public function searchAdmExaminer()
    {
        $year_id = Input::get('year_id');
        $semester_id = Input::get('semester_id');

        $search_index_adm_examiner = AdmExaminer::with(['relBatch' => function($query) use($year_id, $semester_id) {
                    $query->where('year_id', '=', $year_id);
                    $query->where('semester_id', '=', $semester_id);
                }],'relBatch.relDegree','relBatch.relDegree.relDepartment',
                   'relBatch.relYear','relBatch.relSemester')
                ->get();

        $year_id = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_id = array('' => 'Select Semester ') + Semester::lists('title', 'id');

        return View::make('admission::faculty.admission_test._search_adm_examiner_index',
            compact('search_index_adm_examiner','year_id','semester_id'));

    }



    public function batchDelete()
    {
        try {
            AdmExaminer::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }





}
