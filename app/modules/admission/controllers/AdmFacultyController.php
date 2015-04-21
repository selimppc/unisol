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

    /**
     * @return mixed
     */
    public function indexAdmExaminer()
    {
        $index_adm_examiner = AdmExaminer::with('relBatch','relBatch.relDegree',
            'relBatch.relDegree.relDepartment','relBatch.relYear','relBatch.relSemester')
            ->get();

        $year_id = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_id = array('' => 'Select Semester ') + Semester::lists('title', 'id');
        return View::make('admission::faculty.admission_test.index',
            compact('index_adm_examiner','year_id','semester_id'));

    }

    /**
     * @param $batch_id
     * @return mixed
     */
    public function viewAdmTest($id,$batch_id)
    {
        $view_examiner = AdmExaminer::with('relBatch','relBatch.relDegree','relBatch.relDegree.relDepartment','relBatch.relYear',
                                   'relBatch.relAdmExaminerComments','relBatch.relSemester','relUser','relUser.relUserProfile')
                                   ->where('id', $id)->first();

        $view_examiner_comment = AdmExaminerComments::where('batch_id', $batch_id)->get();

        return View::make('admission::faculty.admission_test.view_admtest',
            compact('view_examiner','view_examiner_comment','id'));
    }

    /**
     * @return mixed
     */
    public function searchAdmExaminer()
    {
        $year_id = Input::get('year_id');
        $semester_id = Input::get('semester_id');

        $search_index_adm_examiner = AdmExaminer::join('batch', function ($query) use ($year_id, $semester_id) {
            $query->on('batch.id', '=', 'adm_examiner.batch_id');
            $query->where('batch.year_id', '=', $year_id);
            $query->where('batch.semester_id', '=', $semester_id);
        });

//        $search_index_adm_examiner = AdmExaminer::select(['adm_examiner.status'])->get();
//        if (isset($status) && !empty($status)) $search_index_adm_examiner = $search_index_adm_examiner->where('adm_examiner.status', '=', $search_index_adm_examiner->status);
//



        $year_id = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_id = array('' => 'Select Semester ') + Semester::lists('title', 'id');

        return View::make('admission::faculty.admission_test._search_adm_examiner_index',
            compact('search_index_adm_examiner','year_id','semester_id'));
    }


    /**
     * @param $id = AdmExaminer's id
     * @return mixed
     */
    public function changeStatustoDenyByFacultyAdmTest($id){
        $model = AdmExaminer::findOrFail($id);
        $model->status = 'Deny';
        if($model->save()){
            Session::flash('danger', 'Deny or Revoked! ');
            return Redirect::back();
        }
    }

    /**
     * @param $id = AdmExaminer's id
     * @return mixed
     */
    public function changeStatusToAcceptedByFacultyAdmTest($id){
        $model = AdmExaminer::findOrFail($id);
        $model->status = 'Accepted';
        if($model->save()){
            Session::flash('message', 'Requested Accepted! ');
            return Redirect::back();
        }
    }

    /**
     * @return mixed
     */
    public function viewAdmTestComment()
    {
        $data = Input::all();

        $model = new AdmExaminerComments();
        $model->batch_id = $data['batch_id'];
        $model->comment = $data['comment'];
        $model->commented_to = $data['commented_to'];
        $model->commented_by = Auth::user()->get()->id;

        $user_name = User::FullName($model->commented_to);
        if ($model->save()) {
            Session::flash('message', 'Comments added To: ' . $user_name);
            return Redirect::back();
        } else {
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()->with('errors', 'invalid');
        }

        return Redirect::back();
    }


    /**
     * @return mixed
     */
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

    /**
     * @param $year_id
     * @param $semester_id
     * @param $batch_id
     * @return mixed
     */
    public function admTestQuestionPaper($year_id, $semester_id, $batch_id )
    {
        $ba_subject = BatchAdmtestSubject::where('batch_id', $batch_id)->get();
        foreach($ba_subject as $ba){
            $admtest_question_paper = AdmQuestion::latest('id')
                //->where('s_faculty_user_id' ,'=', Auth::user()->get()->id)
                ->where('batch_admtest_subject_id' ,'=', $ba->id)
                ->get();
        }

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

    /**
     * @param $id = AdmQuestion's id
     * @return mixed
     */
    public function viewQuestionPaper($id)
    {
        $view_adm_qp = AdmQuestion::find($id);
        return View::make('admission::faculty.question_papers.view_question_paper',
            compact('view_adm_qp'));
    }

    /**
     * @param $id = AdmQuestion's id
     * @return mixed
     */
    public function viewQuestionsItems($id)
    {
        $view_adm_qp_items = AdmQuestionItems::where('adm_question_id', '=', $id)->get();
        return View::make('admission::faculty.question_papers.view_qp_items',
            compact('view_adm_qp_items'));

    }

    /**
     * @param $qid = AdmQuestion's id
     * @return mixed
     */
    public function addQuestionItems($qid){
        $question_item = AdmQuestion::find($qid);
        return View::make('admission::faculty.question_papers._add_question_item_form', compact('total_marks', 'question_item'));
    }

    /**
     * @return mixed
     */
    public function storeQuestionItems()
    {
        $data = Input::all();

        $faculty_admisison_store_question_items = new AdmQuestionItems();
        if ($faculty_admisison_store_question_items->validate($data))
        {
                $faculty_admisison_store_question_items->title = Input::get('title');
                $faculty_admisison_store_question_items->adm_question_id = Input::get('adm_question_id');
                $faculty_admisison_store_question_items->marks = Input::get('marks');
                $opt_answer = Input::get('answer');

                if (strtolower(Input::get('mcq')) == 'mcq') {
                    if (strtolower(Input::get('question_type')) == 'mcq_single') {
                        $faculty_admisison_store_question_items->question_type = 'radio';
                        if (!empty($opt_answer)) {
                            if ($faculty_admisison_store_question_items->save())
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

                                foreach ($opt_answer as $oa) {
                                    if ($oa == $key)
                                        $adm_question_opt->answer = 1;
                                }
                                $adm_question_opt->save();
                                $i++;

                            } // saving last single data
                            Session::flash('message', 'Option Data : Single Answer Saved!');
                            return Redirect::back();
                        } else {
                            Session::flash('error', 'Single Options Answer is missing!');
                            return Redirect::back();
                        }
                    } else {
                        $faculty_admisison_store_question_items->question_type = 'checkbox';
                        if (!empty($opt_answer)) {
                            if ($faculty_admisison_store_question_items->save())
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

                                foreach ($opt_answer as $oa) {
                                    if ($oa == $key)
                                        $adm_question_opt->answer = 1;
                                }
                                $adm_question_opt->save();
                                $i++;

                            } // saving last single data
                            Session::flash('message', 'Option Data : Multiple Answer Saved!');
                            return Redirect::back();
                        } else {
                            Session::flash('error', 'Multiple Options Answer is missing!');
                            return Redirect::back();
                        }
                    }
                } else {
                    $faculty_admisison_store_question_items->question_type = 'text';
                    if ($faculty_admisison_store_question_items->save()) {
                        Session::flash('message', 'Option Data : Descriptive Answer Saved!');
                        return Redirect::back();
                    } else {
                        Session::flash('error', 'Descriptive Answer is missing!');
                        return Redirect::back();
                    }
                }
                // redirect
        }
        else
        {
            // failure, get errors
            $errors = $faculty_admisison_store_question_items->errors();
            Session::flash('errors', $errors);

            return Redirect::back();
        }
    }

    /**
     * @param $id = AdmQuestionItems's id
     * @return mixed
     */
    public function viewSpecificQuestionItems($id)
    {
        $faculty_ViewQuestionItems = AdmQuestionItems::where('id', $id)->first();
        $options = AdmQuestionOptAns::where('adm_question_items_id', $faculty_ViewQuestionItems->id)->get();
        return View::make('admission::faculty.question_papers.viewSpecificQuestionItems', compact('faculty_ViewQuestionItems', 'options'));
    }

    /**
     * @param $id = AdmQuestionItems's id
     * @return mixed
     */
    public function editSpecificQuestionItems($id)
    {
        $faculty_editQuestionItems = AdmQuestionItems::where('id', $id)->first();
        $faculty_editQuestionOptions = AdmQuestionOptAns::where('adm_question_items_id', $faculty_editQuestionItems->id)->get();
        return View::make('admission::faculty.question_papers.editSpecificQuestionItems',
            compact('faculty_editQuestionItems', 'faculty_editQuestionOptions'));
    }

    /**
     * @param $id = AdmQuestionItems's id
     * @return mixed
     */
    public function updateSpecificQuestionItems($id)
    {
        $data = Input::all($id);

        $faculty_adm_update_question_items = new AdmQuestionItems();
        if ($faculty_adm_update_question_items->validate($data))
        {

                $faculty_adm_update_question_items = AdmQuestionItems::find($id);
                $faculty_adm_update_question_items->title = Input::get('title');
                $faculty_adm_update_question_items->adm_question_id = Input::get('adm_question_id');
                $faculty_adm_update_question_items->marks = Input::get('marks');

                if (strtolower(Input::get('mcq')) == 'mcq') {
                    if (strtolower(Input::get('r_c')) == 'mcq_single') {
                        $faculty_adm_update_question_items->question_type = 'radio';

                        if ($faculty_adm_update_question_items->save()) {

                            $adm_question_items_id = Input::get('id');
                            $opt_title = Input::get('option_title');
                            $opt_answer = Input::get('answer');
                            $i = 0;
                            foreach ($opt_title as $key => $value) {

                                //Re-declare model each time you want to save data as loop.
                                $adm_question_opt = (isset($adm_question_items_id)) ? AdmQuestionOptAns::find($adm_question_items_id[$i]) : new AdmQuestionOptAns();
                                if (isset($adm_question_items_id) == null) {
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
                        } else {
                            echo "NO";
                        }
                    }else {
                        $faculty_adm_update_question_items->question_type = 'checkbox';


                        if ($faculty_adm_update_question_items->save()) {
                            $adm_question_items_id = Input::get('id');

                            #print_r($adm_question_items_id); exit;

                            $opt_title = Input::get('option_title');
                            $opt_answer = Input::get('answer');
                            $i = 0;
                            #print_r($opt_title);exit;
                            foreach ($opt_title as $key => $value) {
                                //Re-declare model each time you want to save data as loop.

                                $adm_question_opt = (isset($adm_question_items_id)) ? AdmQuestionOptAns::find($adm_question_items_id[$i]) : new AdmQuestionOptAns();

                                #print_r($adm_question_items_id); exit;

                                if (isset($adm_question_items_id) == null) {
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
                        } else {
                            echo "NO";
                        }
                    }
                } else {

                    $faculty_adm_update_question_items->question_type = 'text';
                    $faculty_adm_update_question_items->save();

                    $adm_question_opt = new AdmQuestionOptAns();
                    $adm_question_opt->destroy(Request::get('id'));

                }
        }else
        {
            // failure, get errors
            $errors = $faculty_adm_update_question_items->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }

    /**
     * @param $q_id = AdmQuestion's id
     * @return mixed
     */
    public function viewAssignQuestionPaper($q_id)
    {
        $assign_qp = AdmQuestion::findOrFail($q_id);

        $assign_qp_assign = AdmQuestionComments::where('adm_question_id', $q_id)->get();

        return View::make('admission::faculty.question_papers.assign_qp',
            compact('assign_qp','assign_qp_assign','q_id'));

    }


    /**
     * @return mixed
     */
    public function commentAssignQuestionPaper()
    {
        $info = Input::all();


            $model = new AdmQuestionComments();
            $model->adm_question_id = $info['adm_question_id'];
            $model->comment = $info['comment'];
            $model->commented_to = $info['commented_to'];
            $model->commented_by = Auth::user()->get()->id;

            $user_name = User::FullName($model->commented_to);
            if($model->save()){
                Session::flash('message', 'Comments added To: ' . $user_name );
                return Redirect::back();
            }else{
                $errors = $model->errors();
                Session::flash('errors', $errors);
                return Redirect::back()->with('errors', 'invalid');
            }
    }


    /**
     * @param $adm_question_id
     * @return mixed
     */
    public function evaluateQuestions($adm_question_id)
    {
        $data = AdmQuestion::with('relBatchAdmtestSubject',
            'relBatchAdmtestSubject.relBatch','relBatchAdmtestSubject.relAdmtestSubject')
            ->where('id','=',$adm_question_id)->first();

        $evaluation_qp = AdmQuestionEvaluation::with('relBatchApplicant','relBatchApplicant.relApplicant')
            ->where('adm_question_id','=', $adm_question_id)
            ->latest('id')->groupBy('adm_question_id')
            ->select(DB::raw('SUM(marks) as ev_marks, id as id, batch_applicant_id, adm_question_id, adm_question_items_id'))
            ->get();
        //print_r($evaluation_qp);exit;

        return View::make('admission::faculty.question_papers.evaluate_question_paper',
            compact('evaluation_qp','data'));
    }

    /**
     * @param $adm_question_id
     * @return mixed
     */
    protected function totalMarks($adm_question_id){
        $result = DB::table('adm_question_evaluation')
            ->select(DB::raw('SUM(marks) as evaluated_total_marks'))
            ->where('adm_question_id', '=', $adm_question_id)
            ->first();
        return $result;
    }

    /**
     * @param $a_q_id : adm_question_id
     * @param $a_q_itm_id : adm_question_items_id
     * @param bool $no_q : number of question
     * @return mixed
     */
    public function evaluateQuestionsItems($a_q_id , $no_q = false )
    {
        $all = AdmQuestionEvaluation::where('adm_question_id', $a_q_id)->get();

        foreach ($all as $ev_itm) {
            $ev_id [] = $ev_itm->id;
            $ev_q_item_id [] = $ev_itm->adm_question_items_id;
            $ev_marks [] = $ev_itm->marks;
        }
        $no_q = !empty($no_q) ? $no_q : 0;
        $total_question = count($all);
        $q_item_info = AdmQuestionItems::findOrFail($ev_q_item_id[$no_q]);
        $evaluation_id = $ev_id[$no_q];
        $evaluation_marks = $ev_marks[$no_q];

        $data_question = AdmQuestion::with('relBatchAdmtestSubject',
            'relBatchAdmtestSubject.relBatch', 'relBatchAdmtestSubject.relAdmtestSubject')
            ->where('id', '=', $a_q_id)->first();

        $evaluate_qp = AdmQuestionEvaluation::with('relBatchApplicant', 'relBatchApplicant.relApplicant',
            'relAdmQuestionItems', 'relAdmQuestionItems.relAdmQuestion')
            ->where('adm_question_id', '=', $a_q_id)
            ->latest('id')
            ->first();

        $total_marks = AdmQuestionEvaluation::where('adm_question_id','=', $a_q_id)
            ->latest('id')->groupBy('adm_question_id')
            ->select(DB::raw('SUM(marks) as ev_marks'))
            ->first();

        return View::make('admission::faculty.question_papers.evaluate-questions-items',
            compact('data_question', 'evaluate_qp', 'a_q_id', 'evaluation_id','evaluation_marks', 'eva_q_ans', 'b', 'total_question', 'no_q', 'q_item_info', 'total_marks'));
    }

    /**
     * @return mixed
     */
    public function storeEvaluatedQuestionItems()
    {
        $data = Input::all();

        $model = AdmQuestionEvaluation::find($data['id']);

        if($model->validate($data)){
            DB::beginTransaction();
            try
            {
                if($model->update($data)){
                    Session::flash('message', 'Successfully Updates Information!');
                    return Redirect::back();
                }
                DB::commit();
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('error', 'invalid');
        }
    }

    /**
     * @return mixed
     */
    public function admTestBatchDelete()
    {
        try {
            AdmExaminer::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    /**
     * @return mixed
     */
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

    /**
     * @return mixed
     */
    public function evaluationBatchDelete()
    {
        try {
            AdmQuestionEvaluation::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    /**
     * @return mixed
     */
    public function indexCourse()
    {
        $index_course = CourseConduct::latest('id')->with('relCourse','relCourse.relCourseType','relYear','relSemester','relDegree','relDegree.relDepartment')->get();

        return View::make('admission::faculty.course.index',compact('index_course'));

    }

    /**
     * @param $id = CourseConduct's id
     * @return mixed
     */
    public function assignCourse($id)
    {
        $assign_course = CourseConduct::findOrFail($id);

        $assign_course_commnt = CourseConductComments::where('course_conduct_id', $id)->get();

        return View::make('admission::faculty.course.assign_course',
            compact('assign_course','assign_course_commnt','id'));

    }


    /**
     * @return mixed
     */
    public function commentAssignCourse()
    {
        $info = Input::all();
        $model = new CourseConductComments();

        $model->course_conduct_id = $info['course_conduct_id'];
        $model->comments = $info['comments'];
        $model->commented_to = $info['commented_to'];
        $model->commented_by = Auth::user()->get()->id;

        if ($model->save()) {
            Session::flash('message', 'Comments added');
            return Redirect::back();
        }else {
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()->with('errors', 'invalid');
        }

    }

    /**
     * @return mixed
     */
    public function courseBatchDelete()
    {
        try {
            CourseConduct::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }
}