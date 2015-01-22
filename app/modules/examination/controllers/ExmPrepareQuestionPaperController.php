<?php

class ExmPrepareQuestionPaperController extends \BaseController {


//	public function index()
//	{
//        $prepare_question_paper = ExmQuestion::orderBy('id', 'DESC')->paginate(3);
//        return View::make('examination::prepare_question_paper.index')->with('prepareQuestionPaper', $prepare_question_paper);
//        //ok
//	}

    public function amw_index()
    {
        //$prepare_question_paper_amw = ExmQuestion::orderBy('id', 'DESC')->paginate(3);
        $data = ExmQuestion::all();
//        $exm_exam_list = DB::table('exm_exam_list')->where('id', $data->exm_exam_list_id)->first();
//        $department_id = $exm_exam_list->department_id;
//        $year_id = $exm_exam_list->year_id;
//        $semester_id = $exm_exam_list->semester_id;
//
//               //$course = Course::where('id', $exm_exam_list->course_id)->get();
//
//        $department = DB::table('department')->where('id', $department_id)->first();
//        $year = DB::table('year')->where('id', $year_id)->first();
//        $semester = DB::table('semester')->where('id', $semester_id)->first();
//
//
//        print_r($data->id); //,$year->title,$semester->title
//        exit();


        return View::make('examination::prepare_question_paper.amw_index')->with('prepareQuestionPaperByAMW',$data);

    }


    public function faculty_index()
    {
        $prepare_question_paper_faculty = ExmQuestion::orderBy('id', 'DESC')->paginate(3);
        return View::make('examination::prepare_question_paper.faculty_index')->with('prepareQuestionPaperByFACULTY',$prepare_question_paper_faculty);
    }


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

    public function amw_ViewQuestion($id)
    {
        $view_question_amw = ExmQuestion::find($id);

        if($view_question_amw) {
            return View::make('examination::prepare_question_paper.amw_viewQuestion')->with('viewPrepareQuestionPaperAmw', $view_question_amw);
        }//ok
    }

    public function faculty_ViewQuestion()
    {
        $view_question_faculty = ExmQuestion::orderBy('id', 'DESC')->paginate(3);
        return View::make('examination::prepare_question_paper.faculty_viewQuestion')->with('viewPrepareQuestionPaperFaculty',$view_question_faculty);
    }


    public function amw_QuestionList()
    {
        $question_list_amw = ExmQuestion::orderBy('id', 'DESC')->paginate(3);
        return View::make('examination::prepare_question_paper.amw_QuestionList')->with('QuestionListAmw',$question_list_amw);
    }


    public function faculty_QuestionList()
    {
        $question_list_faculty = ExmQuestion::orderBy('id', 'DESC')->paginate(3);
        return View::make('examination::prepare_question_paper.faculty_QuestionList')->with('QuestionListFaculty',$question_list_faculty);
    }



	public function amw_createQuestionPaper()
	{
        return View::make('examination::prepare_question_paper.create');
        //ok
	}



	public function amw_storeQuestionPaper()
	{
        $data = Input::all();

        $prepare_question_paper = new ExmQuestion();

        if ($prepare_question_paper->validate($data))
        {
            // success code
            $prepare_question_paper->exm_exam_lists_id = Input::get('exm_exam_lists_id');
            $prepare_question_paper->title = Input::get('title');
            $prepare_question_paper->deadline = Input::get('deadline');
            $prepare_question_paper->total_marks = Input::get('total_marks');
            $prepare_question_paper->created_by = Input::get('created_by');
            $prepare_question_paper->updated_by = Input::get('updated_by');
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





//    public function edit($id)
//    {
//        $prepare_question_paper = ExmQuestion::find($id);
//
//        // Show the edit employee form.
//        return View::make('examination::prepare_question_paper.edit')->with('prepareQuestionPaper',$prepare_question_paper);
//        //ok
//    }


    public function amw_editQuestionPaper($id)
    {
        $prepare_question_paper = ExmQuestion::find($id);

        // Show the edit employee form.
        return View::make('examination::prepare_question_paper.amw_editQuestionPaper')->with('edit_AmwQuestionPaper',$prepare_question_paper);
        //ok
    }



    public function update($id)
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
            $prepare_question_paper->created_by = Input::get('created_by');
            $prepare_question_paper->updated_by = Input::get('updated_by');


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

    public function assignTo()
    {

        echo "Not Done Yet";


    }


    public function destroy($id)
    {
        try {
            ExmQuestion::find($id)->delete();
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
        //ok
    }


    public function batchDelete()
    {
        ExmQuestion::destroy(Request::get('id'));
        return Redirect::back();
    }
    //ok

}
