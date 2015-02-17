<?php

class ExmAmwController extends \BaseController {
    //amw: filter
    function __construct() {
        $this->beforeFilter('exmAmw', array('except' => array('')));
    }

    //amw: Question papers index

    public function index()
    {
        $data = ExmQuestion::with('relCourseManagement', 'relCourseManagement.relYear',
            'relCourseManagement.relSemester','relCourseManagement.relCourse.relSubject.relDepartment')
            ->get();

        return View::make('examination::amw.prepare_question_paper.index')->with('datas',$data);
    }
    //amw: View question paper
    public function viewQuestion($id)
    {
        $view_question_amw = ExmQuestion::find($id);
        return View::make('examination::amw.prepare_question_paper.viewQuestion')->with('viewPrepareQuestionPaperAmw', $view_question_amw);
    }
    //amw: assignTo
    public function assignTo()
    {
        echo "Not Done Yet";
    }
    //amw: Create Question Paper
//    public function createQuestionPaper()
//    {
//
////        $courseList = CourseManagement::with('relCourse')
////            ->select('relCourse.title', 'relCourse.id')
////            ->get(['title', 'course_id']);
////        print_r($courseList);exit;
//
//        $courseList = DB::table('course_management')
//            ->join('course', 'course_management.course_id', '=', 'course.id')
//            ->select('course.title as title', 'course.id as id')
//            ->lists('title', 'id');
//
//        print_r($courseList);exit;
//
////
////
////
////        return View::make('examination::amw.prepare_question_paper.create', compact('crt_question_ppr','courseList'));
//    }
    //amw: Store Question Paper
    public function storeQuestionPaper()
    {
        $data = Input::all();

        $prepare_question_paper = new ExmQuestion();

        if ($prepare_question_paper->validate($data))
        {
            // success code
            $prepare_question_paper->exm_exam_list_id = Input::get('exm_exam_list_id');

//            print_r($prepare_question_paper->exm_exam_list_id);exit;

            $prepare_question_paper->course_management_id = '2';
            $prepare_question_paper->examiner_faculty_user_id = '1';
            $prepare_question_paper->title = Input::get('title');
            $prepare_question_paper->deadline = Input::get('deadline');
            $prepare_question_paper->total_marks = Input::get('total_marks');
            $prepare_question_paper->created_by = Auth::user()->id;
            $prepare_question_paper->updated_by = Auth::user()->id;
            $prepare_question_paper->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('examination/amw/index');
        }
        else
        {
            // failure, get errors
            $errors = $prepare_question_paper->errors();
            Session::flash('errors', $errors);

            return Redirect::to('examination/amw/create');
        }
        //ok
    }
    //amw: Edit Question Paper
    public function editQuestionPaper($id)
    {
        $prepare_question_paper = ExmQuestion::find($id);

        // Show the edit employee form.
        return View::make('examination::amw.prepare_question_paper.editQuestionPaper')->with('edit_AmwQuestionPaper',$prepare_question_paper);
        //ok
    }
    //amw: Update Question Paper
    public function updateQuestionPaper($id)
    {
        // get the POST data
        $data = Input::all($id);
        // create a new model instance
        $prepare_question_paper = new ExmQuestion();
        // attempt validation
        if ($prepare_question_paper->validate($data))
        {
            $prepare_question_paper = ExmQuestion::find($id);
            $prepare_question_paper->exm_exam_list_id = Input::get('exm_exam_list_id');
            $prepare_question_paper->title = Input::get('title');
            $prepare_question_paper->deadline = Input::get('deadline');
            $prepare_question_paper->total_marks = Input::get('total_marks');
            $prepare_question_paper->created_by = Auth::user()->id;
            $prepare_question_paper->updated_by = Auth::user()->id;
            $prepare_question_paper->save();
            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('examination/amw/index');
        }
        else
        {
            // failure, get errors
            $errors = $prepare_question_paper->errors();
            Session::flash('errors', $errors);

            return Redirect::to('examination/amw/editQuestionPaper');
        }
        //ok
    }
    //amw: Question List
    public function questionList()
    {
        $question_list_amw = ExmQuestionItems::orderBy('id', 'DESC')->paginate(15);
        return View::make('examination::amw.prepare_question_paper.questionList')->with('QuestionListAmw',$question_list_amw);
    }
    //amw: View Question Items
    public function viewQuestionItems($id)
    {
        $amw_ViewQuestionItems = DB::table('exm_question_items')
            ->where('id', $id)
            ->first();

        $options = DB::table('exm_question_opt_ans')
            ->where('exm_question_items_id', $amw_ViewQuestionItems->id)
            ->get();

        return View::make('examination::amw.prepare_question_paper.viewQuestionItems', compact('amw_ViewQuestionItems', 'options'));

    }
    //amw: Destroy
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
    //amw: batch delete->question
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
    //amw: batch delete->Question item
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
    }

    //amw: examination

    public function deshboard(){
        return View::make('examination::amw.prepare_question_paper.deshboard');

    }
    public function examination(){
        $examination = ExmExamList::orderBy('id', 'DESC')->paginate(6);

        return View::make('examination::amw.prepare_question_paper.examination')->with('examination',$examination);


//
//
//        $exam_data = ExmQuestion::with('relCourseManagement', 'relCourseManagement.relYear',
//            'relCourseManagement.relSemester','relCourseManagement.relCourse.relSubject.relDepartment')
//            ->get();
//
//        print_r($exam_data);exit;
//
//
//        $data = ExmQuestion::with('relCourseManagement', 'relCourseManagement.relYear',
//            'relCourseManagement.relSemester','relCourseManagement.relCourse.relSubject.relDepartment')
//            ->get();


//
//        return View::make('examination::amw.prepare_question_paper.index')->with('datas',$data);


    }

//    public function createExamination(){
//
//        return View::make('examination::amw.prepare_question_paper._addExamination_form', compact('add_examination'));
//
//    }

    public function storeExamination(){

        $data = Input::all();

        $store_exam = new ExmExamList();

        if ($store_exam->validate($data))
        {
            // success code
            $store_exam->title = Input::get('title');
            $store_exam->year_id = Input::get('year_id');
            $store_exam->semester_id = Input::get('semester_id');
            $store_exam->acm_marks_dist_item_id = Input::get('acm_marks_dist_item_id');
            $store_exam->status = '0';

            $store_exam->created_by = Auth::user()->id;
            $store_exam->updated_by = Auth::user()->id;
            $store_exam->created_at = Input::get('created_at');
            $store_exam->updated_at = Input::get('updated_at');
            $store_exam->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('examination/amw/examination');
        }
        else
        {
            // failure, get errors
            $errors = $store_exam->errors();
            Session::flash('errors', $errors);

            return Redirect::to('examination/amw/create');
        }

    }

    public function viewExamination($id){
        $view_examination_amw = ExmExamList::find($id);

        return View::make('examination::amw.prepare_question_paper.viewExamination')->with('view_examination_amw', $view_examination_amw);

    }

    public function editExamination(){

    }
    public function courses(){
        return View::make('examination::amw.prepare_question_paper.courses');
    }
    public function examiners(){
        return View::make('examination::amw.prepare_question_paper.examiners');
    }



}
