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


// Admission Test
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

    public function viewAdmTest($id)
    {
        $view_adm_test = AdmExaminer::find($id);

        $dept_name = AdmExaminer::with('relBatch','relBatch.relDegree')->first()->relBatch->relDegree->relDepartment->title;

        $view_adm_test_comments = AdmExaminerComments::find($id);

        return View::make('admission::faculty.admission_test.view_admtest',
            compact('view_adm_test','dept_name','view_adm_test_comments'));

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

    public function acceptAdmTest()
    {
        echo "ACCEPT the request";
    }

    public function denyAdmTest()
    {
        echo "DENY the request";
    }

    public function admTestQuestionPaper($year_id, $semester_id, $batch_id )
    {
        $admtest_question_paper = AdmQuestion::latest('id')->get();

        $degree_id = Batch::where('id' ,'=', $batch_id )
            ->where('semester_id' ,'=', $semester_id)
            ->where('year_id' ,'=', $year_id)
            ->first()->degree_id;

        $degree_data = Degree::with('relDepartment')
            ->where('id','=', $degree_id)
            ->first();

        return View::make('admission::faculty.question_papers.question_papers',
            compact('admtest_question_paper','degree_id','degree_data','semester_id','year_id'));
    }


    public function viewQuestionPaper($id)
    {
        $view_adm_qp = AdmQuestion::find($id);

        return View::make('admission::faculty.question_papers.view_question_paper',
            compact('view_adm_qp'));

    }

    public function viewQuestionsItems($id)
    {
        $view_adm_qp_items = AdmQuestionItems::where('adm_question_id', '=', $id)->get();

//        print_r($view_adm_qp_items);exit;

        return View::make('admission::faculty.question_papers.view_qp_items',
            compact('view_adm_qp_items'));

    }

    public function addQuestionPaper(){ echo " Add Question Paper";}

    public function assignQuestionPaper(){ echo " Assign Question Paper";}

    public function evaluateQuestions(){ echo " Evaluate Question Paper";}




    public function qpBatchDelete()
    {
        try {
            AdmQuestion::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }





}
