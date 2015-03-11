<?php

class AdmissionController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('admAmw', array('except' => array('index')));
    }

    public function back(){
        return Redirect::back()->with('error_code', 5);;
    }

// Admission Test : Admission Test starts here....................................................
    public function admAmwDashboard()
    {
        return View::make('admission::amw.admission_test.dashboard');
    }

    public function admissionTestIndex()
    {
        $admission_test = Degree::orderBy('id', 'DESC')->paginate(3);
        $year_id = Year::lists('title', 'id');
        $semester_id = Semester::lists('title', 'id');

        return View::make('admission::amw.admission_test.index',
            compact('admission_test','year_id','semester_id'));
    }

    public function searchIndex(){

        $searchQuery = [
            'year_id' =>   Input::get('year_id'),
            'semester_id' =>   Input::get('semester_id'),
        ];

        $model = new Degree();
        $adm_test_data = Helpers::search($searchQuery, $model);
        $year_id = Year::lists('title', 'id');
        $semester_id = Semester::lists('title', 'id');

        return View::make('admission::amw.admission_test._search_index',
            compact('adm_test_data','year_id','semester_id'));
    }




    public function examiners($year_id, $semester_id, $degree_id)
    {
        $adm_examiners_home = AdmExaminer::orderby('id', 'DESC')->where('degree_id', '=', $degree_id)->paginate(3);
        $data = Degree::with('relDepartment')->where('id' ,'=', $degree_id)->first()->relDepartment->title;

        return View::make('admission::amw.admission_test.examiners',
            compact('data','adm_examiners_home','year_id','semester_id','degree_id'));
    }




    public function viewExaminers($degree_id){

        $adm_view_examiners = AdmExaminer::where('id' ,'=', $degree_id)->first();
        $data = Degree::with('relDepartment')->where('id' ,'=', $degree_id)->first()->relDepartment->title;

        return View::make('admission::amw.admission_test.view_examiners',
            compact('data','adm_view_examiners','degree_id'));
    }

    public function storeExaminers(){
        $data = Input::all();
        $adm_examiner_model = new AdmExaminer();

        if ($adm_examiner_model->validate($data))
        {
            // success code
            $adm_examiner_model->degree_id = Input::get('degree_id');
            $adm_examiner_model->user_id = Input::get('user_id');
            $adm_examiner_model->type = Input::get('type');
            $adm_examiner_model->assigned_by = 3;
            $adm_examiner_model->deadline = '2020-20-20 20:20:20';
            $adm_examiner_model->note = 'me note';
            $adm_examiner_model->status = 1;

            if($adm_examiner_model->save()){

                $ad_examiner_comments = new AdmExaminerComments();
                $ad_examiner_comments->degree_id = Input::get('degree_id');
                $ad_examiner_comments->comment = Input::get('comment');
                $ad_examiner_comments->commented_to = Input::get('user_id');
                $ad_examiner_comments->commented_by = Auth::user()->get()->id;
                $ad_examiner_comments->status = 1;

                if($ad_examiner_comments->save()){
                    Session::flash('message', 'Examiner Successfully Added!');
                    return Redirect::back();
                }
            }else{
                // redirect
                Session::flash('error', 'Failed!');
                return Redirect::back();
            }
            // redirect
            Session::flash('message', 'Examiner Successfully Added!');
            return Redirect::to('admission_test/amw/examiners');
        }
    }

    public function questionPaper($year_id, $semester_id, $degree_id )
    {
//        $adm_question_paper = AdmQuestion::latest('id')->get();  , $degree_admtest_subject_id
        $adm_question_paper = AdmQuestion::latest('id')->get();

//        print_r($adm_question_paper);exit;
        $data = Degree::with('relDepartment')->where('id' ,'=', $degree_id)->first()->relDepartment->title;

        return View::make('admission::amw.admission_test.question_paper',
            compact('adm_question_paper','year_id','semester_id','degree_id','data'
            ));
    }



    public function storeQuestionPaper()
    {
        $data = Input::all();
//        $exam_list_id = Input::get('exam_list_id');
//        $course_man_id = Input::get('course_man_id');
//        print_r($exam_list_id);exit;

        $prepare_question_paper = new AdmQuestion();

        if ($prepare_question_paper->validate($data))
        {
            // success code
            $prepare_question_paper->degree_admtest_subject_id = Input::get('degree_admtest_subject_id');
            $prepare_question_paper->examiner_faculty_id = Input::get('examiner_faculty_id');
            $prepare_question_paper->title = Input::get('title');
            $prepare_question_paper->deadline = Input::get('deadline');
            $prepare_question_paper->total_marks = Input::get('total_marks');
            $prepare_question_paper->status = 1;
            $prepare_question_paper->save();

            // redirect
            Session::flash('message', 'Question Paper Successfully Added!');
            return Redirect::back();
        }
        else
        {
            // failure, get errors
            $errors = $prepare_question_paper->errors();
            Session::flash('errors', $errors);

            return Redirect::to('admission_test/amw/question_paper');
        }
        //ok
    }
    public function viewQuestionPaper($id){
        $view_question_paper = AdmQuestion::find($id);

        return View::make('admission::amw.admission_test.view_question_paper',compact('view_question_paper'));



    }
    public function editQuestionPaper($id){
        $edit_question_paper = AdmQuestion::find($id);

        return View::make('admission::amw.admission_test.edit_question_paper',compact('edit_question_paper'));

    }

    public function updateQuestionPaper(){
        echo "ok";

    }


    public function viewQuestionsItem(){


    }
    public function assignFaculty(){


    }




}
