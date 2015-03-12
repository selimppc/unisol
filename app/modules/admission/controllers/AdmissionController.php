<?php

class AdmissionController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('admAmw', array('except' => array('index')));
    }

    public function back(){
        return Redirect::back()->with('error_code', 5);;
    }

// ...............................Admission Test : Admission Test starts here...........................................
//.................................................Desh-Board...........................................................

    public function admAmwDashboard()
    {
        return View::make('admission::amw.admission_test.dashboard');
    }

//.................................................Index................................................................
    public function admissionTestIndex()
    {
        $admission_test = Degree::orderBy('id', 'DESC')->paginate(3);
        $year_id = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_id = array('' => 'Select Semester ') + Semester::lists('title', 'id');

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
        $year_id = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_id = array('' => 'Select Semester ') + Semester::lists('title', 'id');

        return View::make('admission::amw.admission_test._search_index',
            compact('adm_test_data','year_id','semester_id'));
    }

//.................................................Examiner.............................................................

    public function examiners($year_id, $semester_id, $degree_id)
    {
        $adm_examiners_home = AdmExaminer::latest('id')->where('degree_id' ,'=', $degree_id)->paginate(10);
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

//.................................................Question Paper.......................................................

    public function questionPaper($year_id, $semester_id, $degree_id )
    {
//        $adm_question_paper = AdmQuestion::latest('id')->get();  , $degree_admtest_subject_id
        $adm_question_paper = AdmQuestion::latest('id')->get();

//        print_r($adm_question_paper);exit;
        $data = Degree::with('relDepartment')->where('id' ,'=', $degree_id)->first()->relDepartment->title;

        $degree_name = array('' => 'Select Degree ') + Degree::lists('title', 'id');
        $dgr_sbjct_id = array('' => 'Select Degree Admission Test Subject ') + DegreeAdmTestSubject::lists('admtest_subject_id', 'id');

        return View::make('admission::amw.admission_test.question_paper',
            compact('adm_question_paper','year_id','semester_id','degree_id','data','degree_name','dgr_sbjct_id'
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
        Echo "ok";



    }
    public function assignFaculty(){
        Echo "ok";
    }

//..............................................Manage Admission Test Subject...........................................

    public function mngAdmTestSubject(){

        $degree_test_sbjct = DegreeAdmTestSubject::latest('id')->paginate(5);

        $sbjct_dgre_name = DegreeAdmTestSubject::with('relDegree')->where('degree_id' ,'=', 2)->first()->relDegree->title;

        $admtest_subject_id = array('' => 'Select Admission Test Subject ') + AdmTestSubject::lists('title','id');

//        print_r($sbjct_dgre_name);exit;

        return View::make('admission::amw.admission_test.mng_adm_test_subject',
            compact('degree_test_sbjct','sbjct_dgre_name','sbjct_name','admtest_subject_id','
            '));
    }

    public function storeAdmTestSubject(){

        $data = Input::all();
//        $exam_list_id = Input::get('exam_list_id');
//        $course_man_id = Input::get('course_man_id');
//        print_r($exam_list_id);exit;

        $degree_adm_test_sbjct = new DegreeAdmTestSubject();

        if ($degree_adm_test_sbjct->validate($data))
        {

            $degree_adm_test_sbjct->degree_id = Input::get('degree_id');
            $degree_adm_test_sbjct->admtest_subject_id = Input::get('admtest_subject_id');
            $degree_adm_test_sbjct->description = Input::get('description');
            $degree_adm_test_sbjct->marks = Input::get('marks');
//            $degree_adm_test_sbjct->qualify_marks = Input::get('qualify_marks');
            $degree_adm_test_sbjct->duration = Input::get('duration');

//            print_r($degree_adm_test_sbjct);exit;

            $degree_adm_test_sbjct->save();

            // redirect
            Session::flash('message', 'Manage Degree Admission Test Subject Successfully Added!');
            return Redirect::back();
        }
        else
        {
            // failure, get errors
            $errors = $degree_adm_test_sbjct->errors();
            Session::flash('errors', $errors);

            return Redirect::to('admission_test/amw/mng_adm_test_subject');
        }
    }

    public function viewAdmTestSubject($id){
        $view_question_paper = DegreeAdmTestSubject::find($id);

        return View::make('admission::amw.admission_test.view_question_paper.blade.php',compact('view_question_paper'));
    }

    public function editAdmTestSubject($id){
        $edit_question_paper = DegreeAdmTestSubject::find($id);

        return View::make('admission::amw.admission_test.edit_admtest_subject',compact('edit_question_paper'));
    }

//.................................................Degree Management....................................................

    public function degreeManagement(){

        $degree_management = Degree::orderBy('id', 'DESC')->paginate(10);

        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        $semester = array('' => 'Select Semester ') + Semester::lists('title', 'id');
        $year = array('' => 'Select Year ') + Year::lists('title', 'id');
        $degree_program = array('' => 'Please Select ') + DegreeProgram::lists('title', 'id');


        return View::make('admission::amw.admission_test.adm_test_degree',
            compact('degree_management','d_m_year_id','d_m_semester_id',
                'department','semester','year','degree_program'));

    }

    public function searchAdmTestDegree()
    {
        $searchQuery = [
            'year_id' =>   Input::get('year_id'),
            'semester_id' =>   Input::get('semester_id'),
        ];

        $model = new Degree();
        $adm_test_degree = Helpers::search($searchQuery, $model);
        $year = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester = array('' => 'Select Semester ') + Semester::lists('title', 'id');
        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        $degree_program = array('' => 'Please Select ') + DegreeProgram::lists('title', 'id');

        return View::make('admission::amw.admission_test._search_adm_test_degree',
            compact('adm_test_degree','year','semester','department','degree_program'));


    }

    public function storeDegreeManagement(){

        $data = Input::all();

        $adm_test_degree = new Degree();

        if ($adm_test_degree->validate($data))
        {
            $adm_test_degree->title = Input::get('title');
            $adm_test_degree->description = Input::get('description');
            $adm_test_degree->department_id = Input::get('department_id');
            $adm_test_degree->degree_program_id = Input::get('degree_program_id');
            $adm_test_degree->year_id = Input::get('year_id');
            $adm_test_degree->semester_id = Input::get('semester_id');
            $adm_test_degree->total_credit = Input::get('total_credit');
            $adm_test_degree->duration = Input::get('duration');
            $adm_test_degree->start_date = Input::get('start_date');
            $adm_test_degree->end_date = Input::get('end_date');

            if ($adm_test_degree->save()) {
                return Redirect::to('dmission_test/amw/adm-test-degree')
                    ->with('message', 'Successfully added Information!');
            }
        } else
        {
            $errors = $adm_test_degree->errors();
            Session::flash('errors', $errors);

            return Redirect::back();
        }
    }


    public function viewDegreeManagement($id)
    {
        $view_degree_management = Degree::find($id);

        return View::make('admission::amw.admission_test.view_degree_management',compact('view_degree_management'));
    }


    public function editDegreeManagement($id)
    {
        $edit_degree_management = Degree::find($id);

        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        $semester = array('' => 'Select Semester ') + Semester::lists('title', 'id');
        $year = array('' => 'Select Year ') + Year::lists('title', 'id');
        $degree_program = array('' => 'Please Select ') + DegreeProgram::lists('title', 'id');

        return View::make('admission::amw.admission_test.edit_degree_management',
            compact('edit_degree_management','department','degree_program','year','semester'));
    }

    public function updateDegreeManagement($id)
    {
        $data = Input::all($id);

        $adm_test_degree = new Degree();

        if ($adm_test_degree->validate($data))
        {
            $adm_test_degree = Degree::find($id);
            $adm_test_degree->title = Input::get('title');
            $adm_test_degree->description = Input::get('description');
            $adm_test_degree->department_id = Input::get('department_id');
            $adm_test_degree->degree_program_id = Input::get('degree_program_id');
            $adm_test_degree->year_id = Input::get('year_id');
            $adm_test_degree->semester_id = Input::get('semester_id');
            $adm_test_degree->total_credit = Input::get('total_credit');
            $adm_test_degree->duration = Input::get('duration');
            $adm_test_degree->start_date = Input::get('start_date');
            $adm_test_degree->end_date = Input::get('end_date');

            if ($adm_test_degree->save()) {
                return Redirect::to('admission_test/amw/adm-test-degree')
                    ->with('message', 'Successfully Updates Information!');
            }
        } else
        {
            $errors = $adm_test_degree->errors();
            Session::flash('errors', $errors);

            return Redirect::back();
        }



    }

//.................................................Subject Management....................................................


    public function subjectManagement()
    {
        $subject_management = AdmTestSubject::orderBy('id', 'DESC')->paginate(10);

        return View::make('admission::amw.admission_test.adm_test_subject',
            compact('subject_management'));


    }

    public function storeSubjectManagement()
    {

        $data = Input::all();

        $adm_test_subject = new AdmTestSubject();

        if ($adm_test_subject->validate($data))
        {
            $adm_test_subject->title = Input::get('title');
            $adm_test_subject->description = Input::get('description');

            if ($adm_test_subject->save()) {
                return Redirect::to('admission_test/amw/adm-test-subject')
                    ->with('message', 'Successfully added Information!');
            }
        } else
        {
            $errors = $adm_test_subject->errors();
            Session::flash('errors', $errors);

            return Redirect::back();
        }


    }

    public function viewSubjectManagement($id)
    {
        $view_subject_management = AdmTestSubject::find($id);

        return View::make('admission::amw.admission_test.view_subject_management',compact('view_subject_management'));


    }

    public function editSubjectManagement($id)
    {
        $edit_subject_management = AdmTestSubject::find($id);

        return View::make('admission::amw.admission_test.edit_subject_management',
            compact('edit_subject_management'));


    }

    public function updateSubjectManagement($id)
    {
        $data = Input::all($id);

        $adm_test_subject = new AdmTestSubject();

        if ($adm_test_subject->validate($data))
        {
            $adm_test_subject = AdmTestSubject::find($id);
            $adm_test_subject->title = Input::get('title');
            $adm_test_subject->description = Input::get('description');

            if ($adm_test_subject->save()) {
                return Redirect::to('admission_test/amw/adm-test-subject')
                    ->with('message', 'Successfully added Information!');
            }
        } else
        {
            $errors = $adm_test_subject->errors();
            Session::flash('errors', $errors);

            return Redirect::back();
        }


    }



}
