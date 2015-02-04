<?php

class ExmPrepareQuestionPaperController extends \BaseController {

// method for index : past
//	public function index()
//	{
//        $prepare_question_paper = ExmQuestion::orderBy('id', 'DESC')->paginate(3);
//        return View::make('examination::prepare_question_paper.index')->with('prepareQuestionPaper', $prepare_question_paper);
//        //ok
//	}

// method for amw_index
    public function amw_index()
    {
        $data = ExmQuestion::with('coursemanagement', 'coursemanagement.year', 'coursemanagement.semester','coursemanagement.course.subject.department')
            ->get();
        return View::make('examination::prepare_question_paper.amw_index')->with('datas',$data);
    }

// method for faculty_index
    public function faculty_index()
    {
        $data = ExmQuestion::with('coursemanagement', 'coursemanagement.year', 'coursemanagement.semester','coursemanagement.course.subject.department')
            ->get();
        return View::make('examination::prepare_question_paper.faculty_index')->with('datas', $data);
    }

// method for view question : past
//    public function ViewQuestion()
//    {
//        $prepare_question_paper = ExmQuestion::orderBy('id', 'DESC')->paginate(3);
//        return View::make('examination::prepare_question_paper.viewQuestion')->with('prepareQuestionPaper', $prepare_question_paper);
//    }

//    public function show($id)
//    {
//        $prepare_question_paper = ExmQuestion::find($id);
//
//        if($prepare_question_paper)
//        {
//            return View::make('examination::prepare_question_paper.show')->with('prepareQuestionPaper',$prepare_question_paper);
//        }
//        //ok
//    }

// method for View Question : AMW
    public function amw_ViewQuestion($id)
    {
        $view_question_amw = ExmQuestion::find($id);

        if($view_question_amw) {
            return View::make('examination::prepare_question_paper.amw_viewQuestion')->with('viewPrepareQuestionPaperAmw', $view_question_amw);
        }
    }
// method for Question Item List : AMW
    public function amw_QuestionList()
    {
        $question_list_amw = ExmQuestionItems::orderBy('id', 'DESC')->paginate(15);
        return View::make('examination::prepare_question_paper.amw_QuestionList')->with('QuestionListAmw',$question_list_amw);
    }
// method for Question Item List : Faculty
    public function faculty_QuestionList()
    {
        $question_list_faculty = ExmQuestionItems::orderBy('id', 'DESC')->paginate(15);
        return View::make('examination::prepare_question_paper.faculty_QuestionList')->with('QuestionListFaculty',$question_list_faculty);
    }
// method for Create Question  Paper : AMW
	public function amw_createQuestionPaper()
	{
        return View::make('examination::prepare_question_paper.create');
        //ok
	}
// method for Store Question Paper : AMW
	public function amw_storeQuestionPaper()
	{
        $data = Input::all();

        $prepare_question_paper = new ExmQuestion();

        if ($prepare_question_paper->validate($data))
        {
            // success code
            $prepare_question_paper->exm_exam_list_id = Input::get('exm_exam_list_id');
            $prepare_question_paper->course_management_id = '3';
            $prepare_question_paper->examiner_faculty_user_id = '1';
            $prepare_question_paper->title = Input::get('title');
            $prepare_question_paper->deadline = Input::get('deadline');
            $prepare_question_paper->total_marks = Input::get('total_marks');
            $prepare_question_paper->created_by = '0';
            $prepare_question_paper->updated_by = '0';
            $prepare_question_paper->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('prepare_question_paper/amw_index');
        }
        else
        {
            // failure, get errors
            $errors = $prepare_question_paper->errors();
            Session::flash('errors', $errors);

            return Redirect::to('prepare_question_paper/create');
        }
        //ok
	}

// method for edit Question Paper : Past
//    public function edit($id)
//    {
//        $prepare_question_paper = ExmQuestion::find($id);
//
//        // Show the edit employee form.
//        return View::make('examination::prepare_question_paper.edit')->with('prepareQuestionPaper',$prepare_question_paper);
//        //ok
//    }

// method for Edit Question Paper : AMW
    public function amw_editQuestionPaper($id)
    {
        $prepare_question_paper = ExmQuestion::find($id);

        // Show the edit employee form.
        return View::make('examination::prepare_question_paper.amw_editQuestionPaper')->with('edit_AmwQuestionPaper',$prepare_question_paper);
        //ok
    }
// method for Update Question Paper : AMW
    public function amw_updateQuestionPaper($id)
    {
        // get the POST data
        $data = Input::all($id);
        // create a new model instance
        $prepare_question_paper = new ExmQuestion();
        // attempt validation
        if ($prepare_question_paper->validate($data))
        {
            // success code
            $prepare_question_paper = ExmQuestion::find($id);

            $prepare_question_paper->exm_exam_lists_id = Input::get('exm_exam_lists_id');
            $prepare_question_paper->title = Input::get('title');
            $prepare_question_paper->deadline = Input::get('deadline');
            $prepare_question_paper->total_marks = Input::get('total_marks');
            $prepare_question_paper->created_by = '0';
            $prepare_question_paper->updated_by = '0';


            $prepare_question_paper->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('prepare_question_paper/amw_index');
        }
        else
        {
            // failure, get errors
            $errors = $prepare_question_paper->errors();
            Session::flash('errors', $errors);

            return Redirect::to('prepare_question_paper/amw_editQuestionPaper');
        }
        //ok

    }

// method for Add Question Items : Faculty
    public function faculty_add_question_items($qid){
        $qid = ExmQuestion::find($qid);
        return View::make('examination::prepare_question_paper.faculty_add_question_item', compact('qid'));
    }

// method for Store Question Items : Faculty
    public function faculty_storeQuestionItems()
    {
        $data = Input::all();

        $faculty_store_question_items = new ExmQuestionItems();

        if ($faculty_store_question_items->validate($data))
        {
            $faculty_store_question_items->title = Input::get('title');
            $faculty_store_question_items->exm_questions_id = Input::get('qid');
            $faculty_store_question_items->marks = Input::get('marks');

            if( strtolower(Input::get('mcq')) == 'mcq'){
                if( strtolower(Input::get('r_question_type')) == 'mcq_single'){
                    $faculty_store_question_items->question_type = 'radio';
                    if($faculty_store_question_items->save()) {
                        $exm_question_items_id = $faculty_store_question_items->id;
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
            return Redirect::to('prepare_question_paper/faculty_QuestionList');
        }
        else
        {
            // failure, get errors
            $errors = $faculty_store_question_items->errors();
            Session::flash('errors', $errors);

            return Redirect::to('prepare_question_paper/faculty_index');
        }

    }

// method for View Question : Faculty
    public function faculty_ViewQuestion($id)
    {
        $view_question_faculty = ExmQuestion::find($id);

        return View::make('examination::prepare_question_paper.faculty_viewQuestion')->with('viewPrepareQuestionPaperFaculty',$view_question_faculty);

    }

// method for View Question Items: AMW
    public function amw_ViewQuestionItems($id)
    {
        $amw_ViewQuestionItems = DB::table('exm_question_items')
            ->where('id', $id)
            ->first();

        $options = DB::table('exm_question_opt_ans')
            ->where('exm_question_items_id', $amw_ViewQuestionItems->id)
            ->get();

        return View::make('examination::prepare_question_paper.amw_viewQuestionItems', compact('amw_ViewQuestionItems', 'options'));

    }

// method for View Question Items: Faculty
    public function faculty_ViewQuestionItems($id)
    {
        $faculty_ViewQuestionItems = DB::table('exm_question_items')
            ->where('id', $id)
            ->first();

        $options = DB::table('exm_question_opt_ans')
            ->where('exm_question_items_id', $faculty_ViewQuestionItems->id)
            ->get();

        return View::make('examination::prepare_question_paper.faculty_viewQuestionItems', compact('faculty_ViewQuestionItems', 'options'));
    }

// method for Assign Question Paper Creation Task to teacher : AMW
    public function assignTo()
    { echo "Not Done Yet"; }

//// method for delete : AMW
//    public function destroy($id)
//    {
//        try {
//            ExmQuestion::find($id)->delete();
//            return Redirect::back()->with('message', 'Successfully deleted Information!');
//        }
//        catch(exception $ex){
//            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
//
//        }
//        //ok
//    }

    public function batchDelete()
    {
        ExmQuestion::destroy(Request::get('id'));
        return Redirect::back();
    }
    //ok

// method for Edit Question Items : Faculty
    public function faculty_EditQuestionItems($id)
    {
//        $qid = ExmQuestionItems::find($qid);
//        return View::make('examination::prepare_question_paper.faculty_editQuestionItems',compact('qid'));


        $qid = DB::table('exm_question_items')
            ->where('id', $id)
            ->first();

        $options = DB::table('exm_question_opt_ans')
            ->where('exm_question_items_id', $qid->id)
            ->get();

        return View::make('examination::prepare_question_paper.faculty_editQuestionItems', compact('qid', 'options'));

    }

// method for Update Question Items : Faculty
    public function faculty_updateQuestionItems($id)
    {
        $data = Input::all($id);
        $faculty_store_question_items = new ExmQuestionItems();
        if ($faculty_store_question_items->validate($data))
        {
            $faculty_store_question_items = ExmQuestionItems::find($id);
            $faculty_store_question_items->title = Input::get('title');
            $faculty_store_question_items->exm_questions_id = Input::get('qid');
            $faculty_store_question_items->marks = Input::get('marks');

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
                            $exm_question_opt = ExmQuestionOptionAnswer::find($exm_question_items_id[$i]);
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
                        $opt_title = Input::get('option_title');
                        $opt_answer = Input::get('answer');
                        $i = 0;
                        foreach($opt_title as $key => $value){
                            //Re-declare model each time you want to save data as loop.
                            $exm_question_opt = ExmQuestionOptionAnswer::find($exm_question_items_id[$i]);
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
            }else{
                $faculty_store_question_items->question_type = 'text';
                if($faculty_store_question_items->save()){
                    echo "Descriptive Answer Saved";
                }else{
                    echo "No";
                }
            }
            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('prepare_question_paper/faculty_QuestionList');
        }
        else
        {
            // failure, get errors
            $errors = $faculty_store_question_items->errors();
            Session::flash('errors', $errors);
            return Redirect::to('prepare_question_paper/faculty_index');
        }
    }
}
