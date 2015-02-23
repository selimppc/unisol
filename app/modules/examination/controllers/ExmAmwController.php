<?php

class ExmAmwController extends \BaseController {
    //amw: filter
    function __construct() {
        $this->beforeFilter('exmAmw', array('except' => array('')));
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
        $exam_list_id = Input::get('exam_list_id');
//        print_r($exam_list_id);exit;

        $prepare_question_paper = new ExmQuestion();

        if ($prepare_question_paper->validate($data))
        {
            // success code
            $prepare_question_paper->exm_exam_list_id = Input::get('exam_list_id');

//            print_r($prepare_question_paper->exm_exam_list_id);exit;

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
            return Redirect::route('examination/amw/index', ['exam_list_id'=>$exam_list_id]);
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
    public function editQuestionPaper($exam_list_id)
    {
        $prepare_question_paper = ExmQuestion::find($exam_list_id);

//        $exam_list_id = Input::get('exam_list_id');

        // Show the edit employee form.
        return View::make('examination::amw.prepare_question_paper.editQuestionPaper',compact('prepare_question_paper','exam_list_id'));
        //ok
    }
    //amw: Update Question Paper
    public function updateQuestionPaper($id)
    {
        // get the POST data
        $data = Input::all($id);
        $exam_list_id = Input::get('exam_list_id');

//        print_r($exam_list_id);exit;
        // create a new model instance
        $prepare_question_paper = new ExmQuestion();
        // attempt validation
        if ($prepare_question_paper->validate($data))
        {
            $prepare_question_paper = ExmQuestion::find($id);
//           print_r($prepare_question_paper);exit;

            $prepare_question_paper->exm_exam_list_id = Input::get('exm_exam_list_id');
            $prepare_question_paper->title = Input::get('title');
            $prepare_question_paper->deadline = Input::get('deadline');
            $prepare_question_paper->total_marks = Input::get('total_marks');
            $prepare_question_paper->created_by = Auth::user()->id;
            $prepare_question_paper->updated_by = Auth::user()->id;

//            print_r($exam_list_id);exit;

            $prepare_question_paper->save();
            // redirect
            Session::flash('message', 'Successfully Updated!');

            return Redirect::back();

//            return Redirect::route('examination/amw/index', ['exam_list_id'=>$exam_list_id]);

        }
        else
        {
            // failure, get errors
            $errors = $prepare_question_paper->errors();
            Session::flash('errors', $errors);

            return Redirect::to('examination/amw/index');
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
        $exam_data = ExmExamList::with(
            [
                'relCourseManagement', 'relCourseManagement.relCourse',
                'relCourseManagement.relCourse.relSubject.relDepartment',
                'relMeta' => function ($query)
                { $query->where('is_exam', 1); }
            ]
        )->get();

        $year_id = Year::lists('title', 'id');
        $semester_id = Semester::lists('title', 'id');

        return View::make('examination::amw.prepare_question_paper.examination',compact('exam_data','year_id','semester_id'));
    }

    public function courses($mark_dist_item_id){

        $course_data = ExmExamList::where('acm_marks_dist_item_id' ,'=', $mark_dist_item_id)
            ->get();
        return View::make('examination::amw.prepare_question_paper.courses',compact('course_data'));

    }
//    public function createExamination(){
//
//        $year_id = Year::lists('title', 'id');
//        $semester_id = Semester::lists('title', 'id');
//        $exam_type = AcmMarksDistItem::lists('title','id');
//        $course_name = Course::lists('title','id');
//
//        return View::make('examination::amw.prepare_question_paper._addExamination_form', compact(
//            'add_examination','year_id','semester_id','exam_type','course_name'
//            ));
//
//    }
    public function storeExamination(){

        $data = Input::all();
        $store_exam = new ExmExamList();
        if ($store_exam->validate($data))
        {
            // success code
            $store_exam->title = Input::get('title');
            $store_exam->year_id = Input::get('year');
//            print_r($store_exam->year_id);exit;
            $store_exam->semester_id = Input::get('semester');

            $store_exam->course_management_id = Input::get('course_management_id');

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
    public function editExamination($id)
    {
        $edit_examination = ExmExamList::find($id);
        return View::make('examination::amw.prepare_question_paper.editExamination',compact('edit_examination'));
    }
    public function updateExamination($id)
    {
        $data = Input::all();
        $update_exam = new ExmExamList();
        if ($update_exam->validate($data))
        {
            // success code
            $update_exam = ExmExamList::find($id);
            $update_exam->title = Input::get('title');
            $update_exam->year_id = Input::get('year');
            $update_exam->semester_id = Input::get('semester');

            $update_exam->course_management_id = Input::get('course_management_id');

            $update_exam->acm_marks_dist_item_id = Input::get('acm_marks_dist_item_id');
            $update_exam->status = '0';
            $update_exam->created_by = Auth::user()->id;
            $update_exam->updated_by = Auth::user()->id;
            $update_exam->created_at = Input::get('created_at');
            $update_exam->updated_at = Input::get('updated_at');
            $update_exam->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('examination/amw/examination');
        }
        else
        {
            // failure, get errors
            $errors = $update_exam->errors();
            Session::flash('errors', $errors);

            return Redirect::to('examination/amw/edit');
        }
    }
    public function examiners(){
        $examiners_home = ExmExaminer::orderBy('id', 'DESC')->paginate(15);

//        $role_id = Role::where('title', '=', 'faculty')->first()->id;
//        $user_id = User::where('role_id', '=', $role_id)->first()->id;

//        $user_profile = User::fullName($user_id);

        #print_r($user_profile);exit;


        return View::make('examination::amw.prepare_question_paper.examiners',compact('examiners_home','role_id','facultyList','user_id'));
    }
    public function addExaminers(){
        return View::make('examination::amw.prepare_question_paper._addExamination_form', compact('add_examiner'));
    }
    public function storeExaminers(){

    }

    public function viewExaminers($id){
        $view_examiner_amw = ExmExaminer::find($id);
        return View::make('examination::amw.prepare_question_paper.viewExaminers',compact('view_examiner_amw'));
    }

    public function questionsItemShow($question_item_id){

        $questions_item = ExmQuestionItems::where('exm_question_id' ,'=', $question_item_id)
            ->get();
        return View::make('examination::amw.prepare_question_paper.question_items',compact('questions_item'));


    }
    //amw: Questions
    public function index($exam_list_id)
    {
//        $data = ExmQuestion::with('relCourseManagement', 'relCourseManagement.relYear',
//            'relCourseManagement.relSemester','relCourseManagement.relCourse.relSubject.relDepartment')
//            ->get();
//        return View::make('examination::amw.prepare_question_paper.index')->with('datas',$data);

        $question_paper = ExmQuestion::where('exm_exam_list_id' ,'=', $exam_list_id)
            ->get();



        return View::make('examination::amw.prepare_question_paper.index',compact('question_paper','exam_list_id'));


    }


}
