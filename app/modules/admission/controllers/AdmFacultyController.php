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
        $admtest_question_paper = AdmQuestion::latest('id')
           ->where('examiner_faculty_user_id' ,'=', Auth::user()->get()->id)
            ->get();

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

        return View::make('admission::faculty.question_papers.view_qp_items',
            compact('view_adm_qp_items'));

    }

//fct: Total Marks Calculation
//    protected function totalMarks($id){
//        $result = DB::table('exm_question_items')
//            ->select(DB::raw('SUM(marks) as question_total_marks'))
//            ->where('exm_question_id', '=', $id)
//            ->first();
//        return $result;
//    }

//fct: add question items
    public function addQuestionItems($qid){
        $question_item = AdmQuestion::find($qid);

//        $total_marks = $this->totalMarks($qid);

        return View::make('admission::faculty.question_papers._add_question_item_form', compact('total_marks', 'question_item'));
    }

    public function storeQuestionItems()
    {
        $data = Input::all();

        $faculty_admisison_store_question_items = new AdmQuestionItems();
        if ($faculty_admisison_store_question_items->validate($data))
        {
            $faculty_admisison_store_question_items->title = Input::get('title');
            $faculty_admisison_store_question_items->adm_question_id = Input::get('adm_question_id');
            $faculty_admisison_store_question_items->marks = Input::get('marks');

            if( strtolower(Input::get('mcq')) == 'mcq'){
                if( strtolower(Input::get('question_type')) == 'mcq_single'){
                    $faculty_admisison_store_question_items->question_type = 'radio';
                    if($faculty_admisison_store_question_items->save()) {
                        $adm_question_items_id = $faculty_admisison_store_question_items->id;
                        $opt_title = Input::get('option_title');
                        $opt_answer = Input::get('answer');

                        $i = 0;
                        foreach ($opt_title as $key => $value) {
                            //Re-declare model each time you want to save data as loop.
                            $adm_question_opt = new AdmQuestionOptAns();
                            $adm_question_opt->adm_question_items_id = $adm_question_items_id;
                            $adm_question_opt->title = $value;
                            $adm_question_opt->answer = 0;

//                            if (isset($opt_answer))
                            foreach ($opt_answer as $oa) {
                                if ($oa == $key)
                                    $adm_question_opt->answer = 1;
                            }
                            $adm_question_opt->save();
                            $i++;
                        }
                        echo "Option Data : Single Answer Saved!";
                    }else {
                        echo "NO";
                    }
                }else{
                    $faculty_admisison_store_question_items->question_type = 'checkbox';
                    if($faculty_admisison_store_question_items->save()){
                        $adm_question_items_id = $faculty_admisison_store_question_items->id;
                        $opt_title = Input::get('option_title');
                        $opt_answer = Input::get('answer');

                        $i = 0;
                        foreach($opt_title as $key => $value){
                            //Re-declare model each time you want to save data as loop.
                            $adm_question_opt = new AdmQuestionOptAns();
                            $adm_question_opt->adm_question_items_id = $adm_question_items_id;
                            $adm_question_opt->title = $value;
                            $adm_question_opt->answer = 0;

                            foreach($opt_answer as $oa){
                                if($oa == $key)
                                    $adm_question_opt->answer = 1;
                            }
                            $adm_question_opt->save();
                            $i++;

                        } /// saving last single data
                        echo "Option Data : Multiple Answer Saved!";
                    }else{
                        echo "NO";
                    }
                }
            }else{
                $faculty_admisison_store_question_items->question_type = 'text';
                if($faculty_admisison_store_question_items->save()){
                    echo "Save";
                }else{
                    echo "No";
                }
            }

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::back();
        }
        else
        {
            // failure, get errors
            $errors = $faculty_admisison_store_question_items->errors();
            Session::flash('errors', $errors);

            return Redirect::back();
        }
    }


    public function viewSpecificQuestionItems($id)
    {
        $faculty_ViewQuestionItems = AdmQuestionItems::where('id', $id)->first();

        $options = AdmQuestionOptAns::where('adm_question_items_id', $faculty_ViewQuestionItems->id)->get();

        return View::make('admission::faculty.question_papers.viewSpecificQuestionItems', compact('faculty_ViewQuestionItems', 'options'));

    }

    public function editSpecificQuestionItems($id)
    {
        $faculty_editQuestionItems = AdmQuestionItems::where('id', $id)->first();

        $faculty_editQuestionOptions = AdmQuestionOptAns::where('adm_question_items_id', $faculty_editQuestionItems->id)->get();

        return View::make('admission::faculty.question_papers.editSpecificQuestionItems',
            compact('faculty_editQuestionItems', 'faculty_editQuestionOptions'));



    }

    public function updateSpecificQuestionItems($id)
    {
        echo " update Question Items List";
    }

    public function assignQuestionPaper()
    {
        echo " assign Question Paper";
    }

    public function evaluateQuestions()
    {
        echo " evaluate Questions";
    }


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
