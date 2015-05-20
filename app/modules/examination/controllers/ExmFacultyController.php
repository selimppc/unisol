<?php

class ExmFacultyController extends \BaseController {
    //fct: filter
    function __construct() {
        $this->beforeFilter('exmFaculty', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

/* - - - - - - - - - - - - - - -  - - - - - -  - Newly Started ; VERSION : 2 - - - - - - - - - - - - - - - - - - - - - - - - - */

    // Faculty: Examiner index

    public function examinationList()
    {
        $current_year = Year::where('title', Date('Y'))->first()->id;

        if($this->isPostRequest()){
            $year_id  = Input::get('year_id');
            $semester_id = Input::get('semester_id');

            $examination_list = ExmExaminer::with('relExmExamList','relExmExamList.relYear',
                'relExmExamList.relSemester','relExmExamList.relCourseConduct',
                'relExmExamList.relCourseConduct.relCourse','relExmExamList.relCourseConduct.relDegree.relDepartment',
                'relExmExamList.relAcmMarksDistItem')
                ->where('user_id','=',Auth::user()->get()->id)
                ->whereExists(function($query) use($year_id, $semester_id)
                    {
                        $query->from('exm_exam_list')
                            ->whereRaw('exm_exam_list.id = exm_examiner.exm_exam_list_id')
                            ->where('exm_exam_list.year_id', '=', $year_id)
                            ->where('exm_exam_list.semester_id', '=', $semester_id);
                    })
                ->get();
        }else{
            $examination_list = ExmExaminer::with('relExmExamList','relExmExamList.relYear',
                'relExmExamList.relSemester','relExmExamList.relCourseConduct',
                'relExmExamList.relCourseConduct.relCourse','relExmExamList.relCourseConduct.relDegree.relDepartment',
                'relExmExamList.relAcmMarksDistItem')
                ->where('user_id','=',Auth::user()->get()->id)
                ->get();
        }
        $year_id = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_id = array('' => 'Select Semester ') + Semester::lists('title', 'id');

        // To use the old values effective use the following line before  return view::make
        Input::flash();

        return View::make('examination::faculty.examination_list.index',
            compact('exam_name','current_year','examination_list','year_id','semester_id'));
    }

    public function viewExaminer($id , $exm_list_id)
    {
        $view_examination = ExmExaminer::with('relExmExamList','relExmExamList.relYear','relExmExamList.relSemester',
            'relExmExamList.relCourseConduct','relExmExamList.relCourseConduct.relDegree',
            'relExmExamList.relCourseConduct.relDegree.relDepartment',
            'relExmExamList.relAcmMarksDistItem',
            'relExmExamList.relCourseConduct.relCourse.relSubject','relExmExamList.relCourseConduct.relUser')
            ->where('exm_exam_list_id', $exm_list_id)
            ->where('id', $id)
            ->first();

        $view_examiner_comments = ExmExaminerComments::where('exm_exam_list_id', $exm_list_id)->get();

        return View::make('examination::faculty.examination_list.view_examiner',
            compact('id','view_examination','view_examiner_comments'));

    }

    public function saveExaminerComment()
    {
            $data = Input::all();
            $model = new ExmExaminerComments();
            $model->exm_exam_list_id = $data['exm_exam_list_id'];
            $model->comment = $data['comment'];
            $model->commented_to = $data['commented_to'];
            $model->commented_by = Auth::user()->get()->id;

            $user_name = User::FullName($model->commented_to);
            if($model->save()){
            Session::flash('message', 'Comments added To: '.$user_name);
            return Redirect::back();
            }else{
                $errors = $model->errors();
                Session::flash('errors', $errors);
                return Redirect::back()->with('errors', 'Invalid Request');
            }
    }

    public function changeStatusToDeny($id){
        $model = ExmExaminer::findOrFail($id);
        $model->status = 'Deny';
        if($model->save()){
            Session::flash('warning', 'Deny or Revoked! ');
            return Redirect::back();
        }
    }

    public function changeStatusToAccepted($id){
        $model = ExmExaminer::findOrFail($id);
        $model->status = 'Accepted';
        if($model->save()){
            Session::flash('message', 'Requested Accepted! ');
            return Redirect::back();
        }
    }

    public function examinationListBatchDelete()
    {
        try {
            ExmExaminer::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        } catch (exception $ex) {
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function questionPaper($exm_list_id)
    {
        $question_paper = ExmQuestion::with('relExmExamList', 'relExmExamList.relYear',
            'relExmExamList.relSemester','relCourseConduct.relDegree','relSUser','relEUser')
            ->where('exm_exam_list_id', '=', $exm_list_id)
            ->get();

        return View::make('examination::faculty.question_paper.index',
            compact('examiner_type','question_paper','exm_list_id'));

    }


    public function viewExmQuestionPaper($exm_question_id)
    {
        $view_exm_qp = ExmQuestion::with('relExmExamList','relExmExamList.relYear','relExmExamList.relSemester',
            'relCourseConduct','relCourseConduct.relDegree',
            'relCourseConduct.relDegree.relDepartment',
            'relExmExamList.relAcmMarksDistItem',
            'relCourseConduct.relCourse.relSubject','relCourseConduct.relUser')
        ->where('id', $exm_question_id)
        ->first();

        return View::make('examination::faculty.question_paper.view_exm_question_paper',
            compact('view_exm_qp'));
    }


//    public function AssignExmFacultySetter($e_q_id)
//    {
//        $exm_question_data = ExmQuestion::with('relExmExamList')->where('id', $e_q_id)->first();
//
//        $examiner_faculty_lists = ExmQuestion::ExaminationExaminerList($exm_question_data->exm_exam_list_id);
//
//        $comments = ExmQuestionComments::with('relToUser', 'relToUser.relUserProfile', 'relToUser.relRole', 'relByUser', 'relByUser.relUserProfile', 'relByUser.relRole')->where('exm_question_id', $e_q_id)->get();
//
//        $exm_exam_list = ExmExamList::with('relCourseConduct','relCourseConduct.relDegree', 'relYear')->where('id', '=', $exm_question_data->exm_exam_list_id)->first();
//
//        return View::make('examination::faculty.question_paper.assign_exm_faculty_setter',
//            compact('exm_question_data', 'examiner_faculty_lists', 'comments','e_q_id', 'exm_exam_list'));
//    }

//    public function AssignExmFacultyEvaluator($e_q_id)
//    {
//        $exm_question_data = ExmQuestion::with('relExmExamList')->where('id', $e_q_id)->first();
//
//        $examiner_faculty_lists = ExmQuestion::ExaminationExaminerList($exm_question_data->exm_exam_list_id);
//
//        $comments = ExmQuestionComments::with('relToUser', 'relToUser.relUserProfile', 'relToUser.relRole', 'relByUser', 'relByUser.relUserProfile', 'relByUser.relRole')->where('exm_question_id', $e_q_id)->get();
//
//        $exm_exam_list = ExmExamList::with('relCourseConduct','relCourseConduct.relDegree', 'relYear')->where('id', '=', $exm_question_data->exm_exam_list_id)->first();
//
//        return View::make('examination::faculty.question_paper.assign_exm_faculty_evaluator',
//            compact('exm_question_data', 'examiner_faculty_lists', 'comments','e_q_id', 'exm_exam_list'));
//    }


    public function addExaminationModuleQuestionPaperItem($exm_question_id)
    {
        $add_exm_qp_items = ExmQuestion::find($exm_question_id);
        return View::make('examination::faculty.question_paper._addQuestItemForm',
            compact('add_exm_qp_items'));
    }

    public function storeExmQPItem()
    {
        $data = Input::all();

        $fclty_exm_str_qstn_itms = new ExmQuestionItems();
        if ($fclty_exm_str_qstn_itms->validate($data))
        {
            $fclty_exm_str_qstn_itms->title = Input::get('title');
            $fclty_exm_str_qstn_itms->exm_question_id = Input::get('exm_question_id');
            $fclty_exm_str_qstn_itms->marks = Input::get('marks');
            $exm_qstn_name = $fclty_exm_str_qstn_itms->relExmQuestion->title;
            $opt_answer = Input::get('answer');

            if (strtolower(Input::get('mcq')) == 'mcq') {
                if (strtolower(Input::get('q_type')) == 'mcq_single') {
                    $fclty_exm_str_qstn_itms->question_type = 'radio';
                    if (!empty($opt_answer)) {
                        if ($fclty_exm_str_qstn_itms->save())
                            $exm_question_items_id = $fclty_exm_str_qstn_itms->id;
                        $opt_title = Input::get('option_title');
                        $opt_answer = Input::get('answer');

                        $i = 0;
                        foreach ($opt_title as $key => $value) {
                            //Re-declare model each time you want to save data as loop.
                            $exm_question_opt = new ExmQuestionOptionAnswer();
                            $exm_question_opt->exm_question_items_id = $exm_question_items_id;
                            $exm_question_opt->title = $value;
                            $exm_question_opt->answer = 0;

                            foreach ($opt_answer as $oa) {
                                if ($oa == $key)
                                    $exm_question_opt->answer = 1;
                            }
                            $exm_question_opt->save();
                            $i++;

                        } // saving last single data
                        Session::flash('message', 'Option Data : Single Answer Saved for ' . $exm_qstn_name );
                        return Redirect::back();
                    } else {
                        Session::flash('error', 'Single Options Answer is missing!');
                        return Redirect::back();
                    }
                } else {
                    $fclty_exm_str_qstn_itms->question_type = 'checkbox';
                    if (!empty($opt_answer)) {
                        if ($fclty_exm_str_qstn_itms->save())
                            $exm_question_items_id = $fclty_exm_str_qstn_itms->id;
                        $opt_title = Input::get('option_title');
                        $opt_answer = Input::get('answer');

                        $i = 0;
                        foreach ($opt_title as $key => $value) {
                            //Re-declare model each time you want to save data as loop.
                            $exm_question_opt = new ExmQuestionOptionAnswer();
                            $exm_question_opt->exm_question_items_id = $exm_question_items_id;
                            $exm_question_opt->title = $value;
                            $exm_question_opt->answer = 0;

                            foreach ($opt_answer as $oa) {
                                if ($oa == $key)
                                    $exm_question_opt->answer = 1;
                            }
                            $exm_question_opt->save();
                            $i++;

                        } // saving last single data
                        Session::flash('message', 'Option Data : Multiple Answer Saved for '. $exm_qstn_name );
                        return Redirect::back();
                    } else {
                        Session::flash('error', 'Multiple Options Answer is missing!');
                        return Redirect::back();
                    }
                }
            } else {
                $fclty_exm_str_qstn_itms->question_type = 'text';
                if ($fclty_exm_str_qstn_itms->save()) {
                    Session::flash('message', 'Option Data : Descriptive Answer Saved for ' . $exm_qstn_name );
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
            $errors = $fclty_exm_str_qstn_itms->errors();
            Session::flash('errors', $errors);

            return Redirect::back();
        }


    }

    public function viewExmQuestionsItems($exm_question_id)
    {
        $view_exm_qp_items = ExmQuestionItems::where('exm_question_id', '=', $exm_question_id)->latest('id')->get();
        return View::make('examination::faculty.question_paper.view_qp_items',
            compact('view_exm_qp_items'));
    }

    public function viewSpecificExmQuestionItems($e_q_i_id)
    {
        $fclt_view_exm_qstn_items = ExmQuestionItems::where('id', $e_q_i_id)->first();
        $exm_options = ExmQuestionOptionAnswer::where('exm_question_items_id', $fclt_view_exm_qstn_items->id)->get();
        return View::make('examination::faculty.question_paper.view_specific_exm_question_items',
            compact('fclt_view_exm_qstn_items', 'exm_options'));
    }



    public function editSpecificExmQuestionItems($e_q_i_id)
    {
        $fclty_edit_exm_quest_items = ExmQuestionItems::where('id', $e_q_i_id)->first();
        $faculty_edit_exm_quest_options = ExmQuestionOptionAnswer::where('exm_question_items_id', $fclty_edit_exm_quest_items->id)->get();
        return View::make('examination::faculty.question_paper.editSpecificExmQuestionItems',
            compact('fclty_edit_exm_quest_items', 'faculty_edit_exm_quest_options'));
    }


    public function updateSpecificExmQuestionItems($e_q_i_id)
    {
        $data = Input::all($e_q_i_id);

        $faculty_exm_quest_update_items = new ExmQuestionItems();
        if ($faculty_exm_quest_update_items->validate($data))
        {

            $faculty_exm_quest_update_items = ExmQuestionItems::find($e_q_i_id);
            $faculty_exm_quest_update_items->title = Input::get('title');

            $exm_qstn_name = $faculty_exm_quest_update_items->relExmQuestion->title;

            $faculty_exm_quest_update_items->exm_question_id = Input::get('exm_question_id');
            $faculty_exm_quest_update_items->marks = Input::get('marks');


            if (strtolower(Input::get('mcq')) == 'mcq') {
                if (strtolower(Input::get('q_type')) == 'mcq_single') {
                    $faculty_exm_quest_update_items->question_type = 'radio';

                    if ($faculty_exm_quest_update_items->save()) {

                        $exm_question_items_id = Input::get('id');
                        $opt_title = Input::get('option_title');
                        $opt_answer = Input::get('answer');
                        $i = 0;
                        foreach ($opt_title as $key => $value) {

                            //Re-declare model each time you want to save data as loop.
                            $exm_question_opt = (isset($exm_question_items_id)) ? ExmQuestionOptionAnswer::find($exm_question_items_id[$i]) : new ExmQuestionOptionAnswer();
                            if (isset($exm_question_items_id) == null) {
                                $exm_question_opt->exm_question_items_id = $faculty_exm_quest_update_items->id;
                            }

                            #print_r($adm_question_items_id);exit;

                            $exm_question_opt->title = $value;
                            $exm_question_opt->answer = 0;

                            foreach ($opt_answer as $oa) {
                                if ($oa == $key)
                                    $exm_question_opt->answer = 1;
                            }

                            $exm_question_opt->save();
                            $i++;
                        }
                        Session::flash('message', 'Option Data : Single Answer Updates for '. $exm_qstn_name);
                        return Redirect::back();
                    } else {
                        Session::flash('message', 'Option Data : Single Answer Not Updates for '. $exm_qstn_name );
                        return Redirect::back();
                    }
                }else {

                    $faculty_exm_quest_update_items->question_type = 'checkbox';


                    if ($faculty_exm_quest_update_items->save()) {
                        $exm_question_items_id = Input::get('id');

                        #print_r($adm_question_items_id); exit;

                        $opt_title = Input::get('option_title');
                        $opt_answer = Input::get('answer');
                        $i = 0;
                        #print_r($opt_title);exit;
                        foreach ($opt_title as $key => $value) {
                            //Re-declare model each time you want to save data as loop.

                            $exm_question_opt = (isset($exm_question_items_id)) ? ExmQuestionOptionAnswer::find($exm_question_items_id[$i]) : new ExmQuestionOptionAnswer();

                            #print_r($adm_question_items_id); exit;

                            if (isset($exm_question_items_id) == null) {
                                $exm_question_opt->exm_question_items_id = $faculty_exm_quest_update_items->id;

                            }
                            $exm_question_opt->title = $value;
                            $exm_question_opt->answer = 0;

                            foreach ($opt_answer as $oa) {
                                if ($oa == $key)
                                    $exm_question_opt->answer = 1;
                            }

                            $exm_question_opt->save();
                            $i++;
                        }
                        Session::flash('message', 'Option Data : Multiple Answer Updates for'. $exm_qstn_name);
                        return Redirect::back();

                    } else {
                        Session::flash('message', 'Option Data : Multiple Answer Not Updates for '. $exm_qstn_name);
                        return Redirect::back();
                    }
                }
            } else {

                $faculty_exm_quest_update_items->question_type = 'text';
                if ($faculty_exm_quest_update_items->save()) {
                    Session::flash('message', 'Option Data : Descriptive Answer Updates for '. $exm_qstn_name);

                } else {
                    Session::flash('error', 'Descriptive Answer Not Updates!');

                }

                $exm_question_opt = new ExmQuestionOptionAnswer();
                $exm_question_opt->destroy(Request::get('id'));

                return Redirect::back();

            }
        }else
        {
            // failure, get errors
            $errors = $faculty_exm_quest_update_items->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }


    public function assignExmQuestionPaper($e_q_id)
    {
        $assign_exm_qp = ExmQuestion::findOrFail($e_q_id);
        $assign_exm_qp_comment = ExmQuestionComments::where('exm_question_id', $e_q_id)->get();
        return View::make('examination::faculty.question_paper.comment_on_exm_qp',
            compact('assign_exm_qp','assign_exm_qp_comment','e_q_id'));

    }


    public function saveComment()
    {
        $info = Input::all();

        $model = new ExmQuestionComments();
        $model->exm_question_id = $info['exm_question_id'];
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


    public function evaluateExmQuestions($exm_question_id)
    {
        $exm_data = ExmQuestion::with('relExmExamList','relExmExamList.relYear','relExmExamList.relSemester',
            'relCourseConduct','relCourseConduct.relDegree',
            'relCourseConduct.relDegree.relDepartment',
            'relExmExamList.relAcmMarksDistItem',
            'relCourseConduct.relCourse.relSubject','relCourseConduct.relUser')
            ->where('id','=',$exm_question_id)->first();

        $evaluation_exm_qp = ExmQuestionEvaluation::with('relExmQuestionItems','relExmQuestion',
            'relStudentUser','relStudentUser.relUserProfile')
            ->where('exm_question_id','=', $exm_question_id)
            ->latest('id')
//            ->groupBy('exm_question_id')
            ->select(DB::raw('SUM(marks) as ev_marks, id as id, student_user_id, exm_question_id, exm_question_items_id'))
            ->get();


        //print_r($evaluation_exm_qp);exit;

        return View::make('examination::faculty.question_paper.evaluate_exm_question_paper',
            compact('evaluation_exm_qp','exm_data'));

    }


// till now all ok
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// starting just now



    public function evaluateExmQuestionsItems($e_q_id , $no_q = false , $evaluation_id)
    {

        $desc_answer = ExmQuestionAnsText::where('exm_question_evaluation_id',$evaluation_id)->first();

//        print_r($eva_all->answer);exit;

        $all = ExmQuestionEvaluation::where('exm_question_id', $e_q_id)->get();

        foreach ($all as $ev_itm) {
            $ev_id [] = $ev_itm->id;
            $ev_q_item_id [] = $ev_itm->exm_question_items_id;
            $ev_marks [] = $ev_itm->marks;
        }
        $no_q = !empty($no_q) ? $no_q : 0;
        $total_question = count($all);
        $q_item_info = ExmQuestionItems::findOrFail($ev_q_item_id[$no_q]);
        $evaluation_id = $ev_id[$no_q];
        $evaluation_marks = $ev_marks[$no_q];

        $evaluate_exm_qp = ExmQuestionEvaluation::with('relExmQuestionItems','relExmQuestion',
            'relStudentUser','relStudentUser.relUserProfile')
            ->where('exm_question_id', '=', $e_q_id)
            ->latest('id')
            ->first();

//        $all_ans_text = ExmQuestionAnsText::where('exm_question_evaluation_id', $evaluate_exm_qp->id)->get();
//
//        foreach ($all_ans_text as $ev_itm_text) {
//            $ev_text_id [] = $ev_itm_text->id;
//            $ev_q_item_text_id [] = $ev_itm_text->answer;
//        }
//
//        $no_q = !empty($no_q) ? $no_q : 0;
//        $total_answer = count($all);
//        $q_item_info_text = ExmQuestionAnsText::findOrFail($ev_q_item_text_id[$no_q]);
//        $evaluation_text_id = $ev_text_id[$no_q];


        $data_exm_question = ExmQuestion::with('relExmExamList','relExmExamList.relYear',
            'relExmExamList.relSemester','relCourseConduct','relCourseConduct.relDegree',
            'relCourseConduct.relDegree.relDepartment',
            'relExmExamList.relAcmMarksDistItem',
            'relCourseConduct.relCourse.relSubject','relCourseConduct.relUser')
            ->where('id', '=', $e_q_id)->first();

//        $evaluate_exm_qp = ExmQuestionEvaluation::with('relExmQuestionItems','relExmQuestion',
//            'relStudentUser','relStudentUser.relUserProfile')
//            ->where('exm_question_id', '=', $e_q_id)
//            ->latest('id')
//            ->first();

        $total_marks = ExmQuestionEvaluation::where('exm_question_id','=', $e_q_id)
            ->latest('id')->groupBy('exm_question_id')
            ->select(DB::raw('SUM(marks) as ev_marks'))
            ->first();

        $exm_q_stu_answer_text = ExmQuestionAnsText::where('exm_question_evaluation_id', $evaluate_exm_qp->id)->first();

        return View::make('examination::faculty.question_paper.evaluate-exm-questions-items',
            compact('exm_q_stu_answer_text','data_exm_question',
                'evaluate_exm_qp', 'e_q_id', 'evaluation_id','evaluation_marks','desc_answer',
                'eva_q_ans', 'b', 'total_question', 'no_q','total_answer','q_item_info_text','evaluation_text_id',
                'q_item_info', 'total_marks','q_item_evalu_info'));
    }


    public function storeEvaluatedExmQuestionItems()
    {
        $data = Input::all();

        $model = ExmQuestionAnsText::find(Input::get('id'));
        if($model->validate($data)){
            DB::beginTransaction();
            try
            {
                $model->update($data);
                Session::flash('message', 'Successfully Save!');
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


}
