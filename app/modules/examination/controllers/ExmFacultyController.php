<?php

class ExmFacultyController extends \BaseController {

    function __construct() {
        $this->beforeFilter('exmFaculty', array('except' => array('')));
    }

    public function index()
    {
        $data = ExmQuestion::with('relCourseManagement', 'relCourseManagement.relYear',
                'relCourseManagement.relSemester','relCourseManagement.relCourse.relSubject.relDepartment')
                ->get();

        return View::make('examination::faculty.prepare_question_paper.index')->with('datas', $data);
    }
    public function questionList()
    {
        $question_list_faculty = ExmQuestionItems::orderBy('id', 'DESC')->paginate(15);
        return View::make('examination::faculty.prepare_question_paper.questionList')->with('QuestionListFaculty',$question_list_faculty);
    }

    public function viewQuestion($id)
    {
        $view_question_faculty = ExmQuestion::find($id);

        return View::make('examination::faculty.prepare_question_paper.viewQuestion')->with('viewPrepareQuestionPaperFaculty',$view_question_faculty);

    }

    protected function totalMarks($qid){
        $result = DB::table('exm_question_items')
            ->select(DB::raw('SUM(marks) as question_total_marks'))
            ->where('exm_question_id', '=', $qid)
            ->first();
        return $result;
    }
    public function add_question_items($qid){
        $qid2 = ExmQuestion::find($qid);
        $total_marks = $this->totalMarks($qid);

        return View::make('examination::faculty.prepare_question_paper.add_question_item', compact('total_marks', 'qid2'));
    }


    public function editQuestionItems($id)
    {
        $qid = DB::table('exm_question_items')
            ->where('id', $id)
            ->first();

//        $q_marks = ExmQuestion::find($id);
//        print_r($q_marks);exit;


        $total_marks = $this->totalMarks($qid->exm_question_id);

        $options = DB::table('exm_question_opt_ans')
            ->where('exm_question_items_id', $qid->id)
            ->get();

        return View::make('examination::faculty.prepare_question_paper.editQuestionItems', compact('q_marks','total_marks','qid', 'options'));

    }
    public function storeQuestionItems()
    {

        $data = Input::all();

        $faculty_store_question_items = new ExmQuestionItems();

        if ($faculty_store_question_items->validate($data))
        {
            $faculty_store_question_items->title = Input::get('title');
            $faculty_store_question_items->exm_question_id = Input::get('qid');
            $faculty_store_question_items->marks = Input::get('marks');



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
        //ok
    }
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
