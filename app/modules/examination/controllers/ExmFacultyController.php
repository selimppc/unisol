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

    // Faculty: Examiner index

    public function examinationList()
    {
        if($this->isPostRequest()){
            $year_id  = Input::get('year_id');
            $semester_id = Input::get('semester_id');

            $examination_list = ExmExaminer::join('exm_exam_list', function ($query) use ($year_id, $semester_id) {
                $query->on('exm_exam_list.id', '=', 'exm_examiner.exm_exam_list_id');
                $query->where('exm_exam_list.year_id', '=', $year_id);
                $query->where('exm_exam_list.semester_id', '=', $semester_id);
            })->select(DB::raw('exm_examiner.exm_exam_list_id as exm_exam_list_id , exm_examiner.status as status'))->get();
        }else{
            $examination_list = ExmExaminer::with('relExmExamList','relExmExamList.relYear',
                'relExmExamList.relSemester','relExmExamList.relCourseConduct',
                'relExmExamList.relCourseConduct.relCourse','relExmExamList.relCourseConduct.relDegree.relDepartment',
                'relExmExamList.relAcmMarksDistItem')->get();
        }
        $year_id = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_id = array('' => 'Select Semester ') + Semester::lists('title', 'id');

        // To use the old values effective use the following line before  return view::make
        Input::flash();

        return View::make('examination::faculty.examination_list.index',
            compact('examination_list','year_id','semester_id'));
    }

    public function changeStatustoDenyByFacultyEXM($id){
        $model = ExmExaminer::findOrFail($id);
        $model->status = 'Deny';
        if($model->save()){
            Session::flash('warning', 'Deny or Revoked! ');
            return Redirect::back();
        }
    }

    public function changeStatusToAcceptedByFacultyEXM($id){
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
//        $examiner_type = ExmExaminer::where('exm_exam_list_id', $exm_list_id)->first()->type;
//
//        $ba_subject = ExmExaminer::with('relBatchAdmtestSubject','relBatchAdmtestSubject.relAdmQuestion')
//            ->where('id', '=', $exm_list_id)
//            ->get();
//
//        $degree_id = ExmExamList::where('id' ,'=', $exm_list_id )
//            ->where('semester_id' ,'=', 'exm_exam_list.semester_id')
//            ->where('year_id' ,'=', 'exm_exam_list.year_id')
//            ->first()->degree_id;
//
//        $degree_data = Degree::with('relDepartment')
//            ->where('id','=', $degree_id)
//            ->first();
//
//        return View::make('admission::faculty.question_papers.question_papers',
//            compact('ba_subject','degree_id','degree_data','semester_id','year_id', 'examiner_type'));

        $examiner_type = ExmExaminer::where('exm_exam_list_id',$exm_list_id)->where('user_id', Auth::user()->get()->id)->first()->id;
//        print_r($examiner_type);exit;

        $question_paper = ExmQuestion::with('relExmExamList', 'relExmExamList.relYear',
            'relExmExamList.relSemester','relCourseConduct.relDegree','relExaminerFacultyUser')
            ->where('exm_exam_list_id', '=', $exm_list_id)
            ->get();

//        print_r($question_paper);exit;

        return View::make('examination::faculty.question_paper.index',
            compact('examiner_type','question_paper','exm_list_id'));





    }








//fct: Question List

    public function questionList()
    {
        $question_list_faculty = ExmQuestionItems::orderBy('id', 'DESC')->paginate(15);
        return View::make('examination::faculty.prepare_question_paper.questionList')->with('QuestionListFaculty',$question_list_faculty);
    }
    //fct: View Question
    public function viewQuestion($id)
    {
        $view_question_faculty = ExmQuestion::find($id);

        return View::make('examination::faculty.prepare_question_paper.viewQuestion')->with('viewPrepareQuestionPaperFaculty',$view_question_faculty);

    }
    //fct: Total Marks Calculation
    protected function totalMarks($qid){
        $result = DB::table('exm_question_items')
            ->select(DB::raw('SUM(marks) as question_total_marks'))
            ->where('exm_question_id', '=', $qid)
            ->first();
        return $result;
    }
    //fct: add question items
    public function add_question_items($qid){
        $qid2 = ExmQuestion::find($qid);


        $total_marks = $this->totalMarks($qid);

        return View::make('examination::faculty.prepare_question_paper.add_question_item', compact('total_marks', 'qid2'));
    }
    //fct: edit question items
    public function editQuestionItems($id)
    {
        $qid = DB::table('exm_question_items')
            ->where('id', $id)
            ->first();

        $exm_q_marks = ExmQuestion::find($qid->exm_question_id)->total_marks;

        $item_total_marks = $this->totalMarks($qid->exm_question_id);


        $options = DB::table('exm_question_opt_ans')
            ->where('exm_question_items_id', $qid->id)
            ->get();

        return View::make('examination::faculty.prepare_question_paper.editQuestionItems', compact('exm_q_marks','item_total_marks','qid', 'options'));

    }
    //fct: update question items
    public function updateQuestionItems($id)
    {
        $data = Input::all($id);
        $faculty_store_question_items = new ExmQuestionItems();
        if ($faculty_store_question_items->validate($data))
        {

            $faculty_store_question_items = ExmQuestionItems::find($id);
            $faculty_store_question_items->title = Input::get('title');
            $faculty_store_question_items->exm_question_id = Input::get('qid');
            $faculty_store_question_items->marks = Input::get('marks');
            //print_r($faculty_store_question_items);exit;
            if( strtolower(Input::get('mcq')) == 'mcq'){

                if( strtolower(Input::get('r_question_type')) == 'mcq_single'){

                    $faculty_store_question_items->question_type = 'radio';

                    if($faculty_store_question_items->save()) {

                        $exm_question_items_id = Input::get('id');
                        $opt_title = Input::get('option_title');
                        $opt_answer = Input::get('answer');
                        $i = 0;
                        foreach ($opt_title as $key => $value) {

                            //Re-declare model each time you want to save data as loop.
                            $exm_question_opt = (isset($exm_question_items_id)) ? ExmQuestionOptionAnswer::find($exm_question_items_id[$i]) : new ExmQuestionOptionAnswer() ;
                            if(isset($exm_question_items_id) == null){
                                $exm_question_opt->exm_question_items_id = $faculty_store_question_items->id;
                            }

                            #print_r($exm_question_items_id);exit;

                            $exm_question_opt->title = $value;
                            $exm_question_opt->answer = 0;

                            foreach ($opt_answer as $oa) {
                                if ($oa == $key)
                                    $exm_question_opt->answer = 1;
                            }

                            $exm_question_opt->save();
                            $i++;
                        }
                        echo "Option Data : Single Answer Saved!";
                    }else {
                        echo "NO";
                    }
                }else{
                    $faculty_store_question_items->question_type = 'checkbox';


                    if($faculty_store_question_items->save()){
                        $exm_question_items_id = Input::get('id');

                        #print_r($exm_question_items_id); exit;

                        $opt_title = Input::get('option_title');
                        $opt_answer = Input::get('answer');
                        $i = 0;
                        #print_r($opt_title);exit;
                        foreach($opt_title as $key => $value){
                            //Re-declare model each time you want to save data as loop.

                            $exm_question_opt = (isset($exm_question_items_id)) ? ExmQuestionOptionAnswer::find($exm_question_items_id[$i]) : new ExmQuestionOptionAnswer() ;

                            #print_r($exm_question_items_id); exit;

                            if(isset($exm_question_items_id) == null){
                                $exm_question_opt->exm_question_items_id = $faculty_store_question_items->id;

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
                        echo "Option Data : Multiple Answer Saved!";
                    }else{
                        echo "NO";
                    }
                }
            }else {

                $faculty_store_question_items->question_type = 'text';
                $faculty_store_question_items->save();


                $exm_question_opt = new ExmQuestionOptionAnswer();

                $exm_question_opt->destroy(Request::get('id'));



            }
            // redirect
            Session::flash('message', 'Successfully Updated!');
            return Redirect::to('examination/faculty/questionList');
        }
        else
        {
            // failure, get errors
            $errors = $faculty_store_question_items->errors();
            Session::flash('errors', $errors);
            return Redirect::to('examination/faculty/index');
        }
    }
    //fct: store question items
    public function storeQuestionItems()
    {

        $data = Input::all();

        $faculty_store_question_items = new ExmQuestionItems();

        if ($faculty_store_question_items->validate($data))
        {
            $faculty_store_question_items->title = Input::get('title');
            $faculty_store_question_items->exm_question_id = Input::get('qid');
            $faculty_store_question_items->marks = Input::get('marks');
            $faculty_store_question_items->created_by = Auth::user()->get()->id;
            $faculty_store_question_items->updated_by = Auth::user()->get()->id;



            if( strtolower(Input::get('mcq')) == 'mcq'){
                if( strtolower(Input::get('r_question_type')) == 'mcq_single'){
                    $faculty_store_question_items->question_type = 'radio';
                    if($faculty_store_question_items->save()) {
                        $exm_question_items_id = $faculty_store_question_items->id;
                        $opt_title = Input::get('option_title');
                        $opt_answer = Input::get('answer');

                        //    print_r($opt_answer);exit;

                        $i = 0;
                        foreach ($opt_title as $key => $value) {
                            //Re-declare model each time you want to save data as loop.
                            $exm_question_opt = new ExmQuestionOptionAnswer();
                            $exm_question_opt->exm_question_items_id = $exm_question_items_id;
                            $exm_question_opt->title = $value;
                            $exm_question_opt->answer = 0;


//                            if (isset($opt_answer))
                                foreach ($opt_answer as $oa) {
                                    if ($oa == $key)
                                        $exm_question_opt->answer = 1;


                                }


                                $exm_question_opt->save();
                                $i++;
                        }
                        echo "Option Data : Single Answer Saved!";
                    }else {
                        echo "NO";
                    }
                }else{
                    $faculty_store_question_items->question_type = 'checkbox';
                    if($faculty_store_question_items->save()){
                        $exm_question_items_id = $faculty_store_question_items->id;
                        $opt_title = Input::get('option_title');
                        $opt_answer = Input::get('answer');

//                      print_r($opt_answer);exit;
                        $i = 0;

                        foreach($opt_title as $key => $value){
                            //Re-declare model each time you want to save data as loop.
                            $exm_question_opt = new ExmQuestionOptionAnswer();
                            $exm_question_opt->exm_question_items_id = $exm_question_items_id;
                            $exm_question_opt->title = $value;
                            $exm_question_opt->answer = 0;


                            foreach($opt_answer as $oa){
                                if($oa == $key)
                                    $exm_question_opt->answer = 1;
                            }
                            $exm_question_opt->save();
                            $i++;




                        } /// saving last single data
                        echo "Option Data : Multiple Answer Saved!";
                    }else{
                        echo "NO";
                    }
                }
            }else{
                $faculty_store_question_items->question_type = 'text';
                if($faculty_store_question_items->save()){
                    echo "Save";
                }else{
                    echo "No";
                }
            }

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('examination/faculty/questionList');
        }
        else
        {
            // failure, get errors
            $errors = $faculty_store_question_items->errors();
            Session::flash('errors', $errors);

            return Redirect::to('examination/faculty/index');
        }

    }
    //fct: view question items
    public function viewQuestionItems($id)
    {
        $faculty_ViewQuestionItems = DB::table('exm_question_items')
            ->where('id', $id)
            ->first();

        $options = DB::table('exm_question_opt_ans')
            ->where('exm_question_items_id', $faculty_ViewQuestionItems->id)
            ->get();

        return View::make('examination::faculty.prepare_question_paper.viewQuestionItems', compact('faculty_ViewQuestionItems', 'options'));
    }
    //fct: batch delete->question
    public function batchDelete()
    {
        try {
            ExmQuestion::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }
    //fct: batch delete->Question items
    public function batchItemsDelete()
    {
        try {
            ExmQuestionItems::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
        //ok
    }
    //fct: batch delete->Question option answer
    public function batchOptionAnswerDelete()
    {

        try {

            ExmQuestionOptionAnswer::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');

        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
        //ok
    }


}
