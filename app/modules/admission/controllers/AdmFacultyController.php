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
//ok
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

//ok
    public function viewAdmTest($id)
    {
        $view_adm_test = AdmExaminer::find($id);

        $dept_name = AdmExaminer::with('relBatch','relBatch.relDegree')->first()->relBatch->relDegree->relDepartment->title;

        $view_adm_test_comments = AdmExaminerComments::find($id);

        return View::make('admission::faculty.admission_test.view_admtest',
            compact('view_adm_test','dept_name','view_adm_test_comments'));

    }

//ok
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
//ok
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

//->
    public function acceptAdmTest()
    {
        echo "ACCEPT the request";
    }

//->
    public function denyAdmTest()
    {
        echo "DENY the request";
    }

//ok
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

//ok
    public function viewQuestionPaper($id)
    {
        $view_adm_qp = AdmQuestion::find($id);

        return View::make('admission::faculty.question_papers.view_question_paper',
            compact('view_adm_qp'));

    }

//ok
    public function viewQuestionsItems($id)
    {
        $view_adm_qp_items = AdmQuestionItems::where('adm_question_id', '=', $id)->get();

        return View::make('admission::faculty.question_papers.view_qp_items',
            compact('view_adm_qp_items'));

    }

//fct: Total Marks Calculation
//    protected function totalMarks($id){
//        $result = DB::table('adm_question_items')
//            ->select(DB::raw('SUM(marks) as question_total_marks'))
//            ->where('adm_question_id', '=', $id)
//            ->first();
//        return $result;
//    }

//fct: add question items
//ok
    public function addQuestionItems($qid){
        $question_item = AdmQuestion::find($qid);

//        $total_marks = $this->totalMarks($qid);

        return View::make('admission::faculty.question_papers._add_question_item_form', compact('total_marks', 'question_item'));
    }

//ok
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

//ok
    public function viewSpecificQuestionItems($id)
    {
        $faculty_ViewQuestionItems = AdmQuestionItems::where('id', $id)->first();

        $options = AdmQuestionOptAns::where('adm_question_items_id', $faculty_ViewQuestionItems->id)->get();

        return View::make('admission::faculty.question_papers.viewSpecificQuestionItems', compact('faculty_ViewQuestionItems', 'options'));

    }
//ok
    public function editSpecificQuestionItems($id)
    {
        $faculty_editQuestionItems = AdmQuestionItems::where('id', $id)->first();

        $faculty_editQuestionOptions = AdmQuestionOptAns::where('adm_question_items_id', $faculty_editQuestionItems->id)->get();

        return View::make('admission::faculty.question_papers.editSpecificQuestionItems',
            compact('faculty_editQuestionItems', 'faculty_editQuestionOptions'));

    }

//ok
    public function updateSpecificQuestionItems($id)
    {
//        echo "ok";exit;

        $data = Input::all($id);
        $faculty_adm_update_question_items = new AdmQuestionItems();
        if ($faculty_adm_update_question_items->validate($data))
        {

            $faculty_adm_update_question_items = AdmQuestionItems::find($id);
            $faculty_adm_update_question_items->title = Input::get('title');
            $faculty_adm_update_question_items->adm_question_id = Input::get('adm_question_id');
            $faculty_adm_update_question_items->marks = Input::get('marks');
            //print_r($faculty_store_question_items);exit;
            if( strtolower(Input::get('mcq')) == 'mcq'){

                if( strtolower(Input::get('r_c')) == 'mcq_single'){

                    $faculty_adm_update_question_items->question_type = 'radio';

                    if($faculty_adm_update_question_items->save()) {

                        $adm_question_items_id = Input::get('id');
                        $opt_title = Input::get('option_title');
                        $opt_answer = Input::get('answer');
                        $i = 0;
                        foreach ($opt_title as $key => $value) {

                            //Re-declare model each time you want to save data as loop.
                            $adm_question_opt = (isset($adm_question_items_id)) ? AdmQuestionOptAns::find($adm_question_items_id[$i]) : new AdmQuestionOptAns() ;
                            if(isset($adm_question_items_id) == null){
                                $adm_question_opt->adm_question_items_id = $faculty_adm_update_question_items->id;
                            }

                            #print_r($adm_question_items_id);exit;

                            $adm_question_opt->title = $value;
                            $adm_question_opt->answer = 0;

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
                    $faculty_adm_update_question_items->question_type = 'checkbox';


                    if($faculty_adm_update_question_items->save()){
                        $adm_question_items_id = Input::get('id');

                        #print_r($adm_question_items_id); exit;

                        $opt_title = Input::get('option_title');
                        $opt_answer = Input::get('answer');
                        $i = 0;
                        #print_r($opt_title);exit;
                        foreach($opt_title as $key => $value){
                            //Re-declare model each time you want to save data as loop.

                            $adm_question_opt = (isset($adm_question_items_id)) ? AdmQuestionOptAns::find($adm_question_items_id[$i]) : new AdmQuestionOptAns() ;

                            #print_r($adm_question_items_id); exit;

                            if(isset($adm_question_items_id) == null){
                                $adm_question_opt->adm_question_items_id = $faculty_adm_update_question_items->id;

                            }
                            $adm_question_opt->title = $value;
                            $adm_question_opt->answer = 0;

                            foreach ($opt_answer as $oa) {
                                if ($oa == $key)
                                    $adm_question_opt->answer = 1;
                            }

                            $adm_question_opt->save();
                            $i++;
                        }
                        echo "Option Data : Multiple Answer Saved!";
                    }else{
                        echo "NO";
                    }
                }
            }else {

                $faculty_adm_update_question_items->question_type = 'text';
                $faculty_adm_update_question_items->save();


                $adm_question_opt = new AdmQuestionOptAns();

                $adm_question_opt->destroy(Request::get('id'));



            }
            // redirect
            Session::flash('message', 'Successfully Updated!');
            return Redirect::back();
        }
        else
        {
            // failure, get errors
            $errors = $faculty_adm_update_question_items->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }



    public function assignQuestionPaper($qid)
    {
        $assign_qp = AdmQuestionComments::find($qid);

       // $adm_question_comments = AdmQuestionComments::where('adm_question_id','=', $qid)->get();

        return View::make('admission::faculty.question_papers.assign_qp',
            compact('assign_qp','adm_question_comments'));




        $data = Input::all();
        $examiner_mdeol = new AdmQuestion();

        if ($examiner_mdeol->validate($data))
        {
            // success code
            $examiner_mdeol->batch_admtest_subject_id = Input::get('batch_admtest_subject_id');
            $examiner_mdeol->examiner_faculty_user_id = Input::get('examiner_faculty_user_id');
            $examiner_mdeol->status = 'status type as faculty';

            if($examiner_mdeol->save()){

                $examiner_comments = new AdmQuestionComments();
                $examiner_comments->adm_question_id = Input::get('adm_question_id');
                $examiner_comments->comment = Input::get('comment');
                $examiner_comments->commented_to = Input::get('user_id');
                $examiner_comments->commented_by = Auth::user()->get()->id;

                if($examiner_comments->save()){
                    Session::flash('message', 'Faculty Successfully Assigned!');
                    return Redirect::back();
                }
            }else{
                // redirect
                Session::flash('error', 'Failed!');
                return Redirect::back();
            }
//        // redirect
//        Session::flash('message', 'Examiner Successfully Added!');
//        return Redirect::to('examination/amw/examiners');
        }



    }



//->
    public function evaluateQuestions()
    {
        echo " evaluate Questions";
    }

//ok
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
