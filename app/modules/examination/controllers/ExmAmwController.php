<?php

class ExmAmwController extends \BaseController {
    //amw: filter
    function __construct() {
        $this->beforeFilter('exmAmw', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }


    //amw: View question paper
    public function viewQuestion($id)
    {
        $view_question_amw = ExmQuestion::find($id)->paginate(3);
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
        $course_man_id = Input::get('course_man_id');
//        print_r($exam_list_id);exit;

        $prepare_question_paper = new ExmQuestion();

        if ($prepare_question_paper->validate($data))
        {
            // success code
            $prepare_question_paper->exm_exam_list_id = Input::get('exam_list_id');
            $prepare_question_paper->course_management_id = Input::get('course_man_id');
            $prepare_question_paper->examiner_faculty_user_id = Input::get('examiner_faculty_user_id');
            $prepare_question_paper->title = Input::get('title');
            $prepare_question_paper->deadline = Input::get('deadline');
            $prepare_question_paper->total_marks = Input::get('total_marks');
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
        return View::make('examination::amw.prepare_question_paper.editQuestionPaper',compact('prepare_question_paper','exam_list_id','course_man_id'));
        //ok
    }
    //amw: Update Question Paper
    public function updateQuestionPaper($id)
    {
        // get the POST data
        $data = Input::all($id);
        $exam_list_id = Input::get('exam_list_id');
//        $course_man_id= Input::get('course_man_id');

//        print_r($exam_list_id);exit;
        // create a new model instance
        $prepare_question_paper = new ExmQuestion();
        // attempt validation
        if ($prepare_question_paper->validate($data))
        {
            $prepare_question_paper = ExmQuestion::find($id);
//           print_r($prepare_question_paper);exit;

            $prepare_question_paper->exm_exam_list_id = Input::get('exam_list_id');
            $prepare_question_paper->course_management_id = Input::get('course_man_id');
            $prepare_question_paper->examiner_faculty_user_id = Input::get('examiner_faculty_user_id');

            $prepare_question_paper->title = Input::get('title');
            $prepare_question_paper->deadline = Input::get('deadline');
            $prepare_question_paper->total_marks = Input::get('total_marks');


//            print_r($exam_list_id);exit;

            $prepare_question_paper->save();
            // redirect
            Session::flash('message', 'Question Paper Successfully Updated!');

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
        $question_list_amw = ExmQuestionItems::orderBy('id', 'DESC')->paginate(5);
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

    public function questionsItemShow($question_item_id){

        $questions_item = ExmQuestionItems::where('exm_question_id' ,'=', $question_item_id)
            ->get();

        $question_name = ExmQuestion::lists('title', 'id');

        $q_l = ExmQuestionItems::all();
        return View::make('examination::amw.prepare_question_paper.question_items',compact('questions_item','q_l','question_name'));
    }
    //amw: Questions
    public function index($exam_list_id,$course_man_id)
    {
        $data = ExmQuestion::with('relCourseManagement', 'relCourseManagement.relYear',
            'relCourseManagement.relSemester','relCourseManagement.relCourse.relSubject.relDepartment')
            ->first();


        $question_paper = ExmQuestion::where('exm_exam_list_id' ,'=', $exam_list_id)
            ->where('course_management_id' ,'=', $course_man_id)
            ->get();

//        print_r($question_paper);exit;

        return View::make('examination::amw.prepare_question_paper.index',compact('question_paper','exam_list_id','data','course_man_id'));

    }

//    public function examiners( $year_id, $semester_id, $course_management_id, $acm_marks_dist_item_id,$exm_exam_list_id)
//    {
//        $examiners_home = ExmExaminer::with('relExmExamList','relExmExamList.relCourseManagement', 'relExmExamList.relCourseManagement.relYear',
//                'relExmExamList.relCourseManagement.relSemester','relExmExamList.relCourseManagement.relCourse.relSubject.relDepartment')
//                ->where('exm_exam_list_id', '=', $exm_exam_list_id)
//                ->get();
//
////        print_r($examiners_home);exit;
//
//        $course_title = CourseManagement::with('relCourse')->where('id' ,'=', $course_management_id)->first()->relCourse->title;
//
////        $exam_list_id = ExmExaminer::where('exm_exam_list_id' ,'=', $exam_list_id)->get();
//
//        return View::make('examination::amw.prepare_question_paper.examiners',
//            compact('examiners_home','acm_marks_dist_item_id','course_management_id', 'year_id',
//                    'semester_id', 'course_title','exm_exam_list_id'));
//    }
    public function get_all_examiners( ){


        $examiners_list = ExmExaminer::with('relExmExamList','relExmExamList.relCourseManagement', 'relExmExamList.relCourseManagement.relYear',
            'relExmExamList.relCourseManagement.relSemester','relExmExamList.relCourseManagement.relCourse.relSubject.relDepartment')
            ->get();

//        $course_title = CourseManagement::with('relCourse')->where('id' ,'=', $course_management_id)->first()->relCourse->title;
//        $exam_list_id = ExmExaminer::where('exm_exam_list_id' ,'=', $exam_list_id)->get();

        return View::make('examination::amw.prepare_question_paper.examiners_all',
            compact('examiners_list'));
    }
//    public function storeExaminers(){
//        $data = Input::all();
//        $examiner_mdeol = new ExmExaminer();
//
//        if ($examiner_mdeol->validate($data))
//        {
//            // success code
//            $examiner_mdeol->exm_exam_list_id = Input::get('exm_exam_list_id');
//            $examiner_mdeol->user_id = Input::get('user_id');
//            $examiner_mdeol->type = 'type as examiners';
//
//            if($examiner_mdeol->save()){
//
//                $examiner_comments = new ExmExaminerComments();
//                $examiner_comments->exm_exam_list_id = Input::get('exm_exam_list_id');
//                $examiner_comments->comment = Input::get('comment');
//                $examiner_comments->commented_to = Input::get('user_id');
//                $examiner_comments->commented_by = Auth::user()->get()->id;
//
//                if($examiner_comments->save()){
//                    Session::flash('message', 'Examiner Successfully Added!');
//                    return Redirect::back();
//                }
//            }else{
//                // redirect
//                Session::flash('error', 'Failed!');
//                return Redirect::back();
//            }
//            // redirect
//            Session::flash('message', 'Examiner Successfully Added!');
//            return Redirect::to('examination/amw/examiners');
//        }
//    }
    public function viewExaminers($id){
        $view_examiner_amw = ExmExaminer::find($id);
        return View::make('examination::amw.prepare_question_paper.viewExaminers',compact('view_examiner_amw'));
    }

//    public function addExaminers(){
//        return View::make('examination::amw.prepare_question_paper._addExamination_form', compact('add_examiner'));
//    }

//    public function assignFaculty($id){
//
//        $assign_faculty = ExmExaminer::find($id);
//        return View::make('examination::amw.prepare_question_paper._assignFaculty_form',compact('assign_faculty'));
//
//    }

public function assign_faculty(){
    $data = Input::all();
    $examiner_mdeol = new ExmExaminer();

    if ($examiner_mdeol->validate($data))
    {
        // success code
        $examiner_mdeol->exm_exam_list_id = Input::get('exm_exam_list_id');
        $examiner_mdeol->user_id = Input::get('user_id');
        $examiner_mdeol->type = 'type as faculty';

        if($examiner_mdeol->save()){

            $examiner_comments = new ExmExaminerComments();
            $examiner_comments->exm_exam_list_id = Input::get('exm_exam_list_id');
            $examiner_comments->comment = Input::get('comment');
            $examiner_comments->commented_to = Input::get('user_id');
            $examiner_comments->commented_by = Auth::user()->get()->id;

            if($examiner_comments->save()){
                Session::flash('message', 'Faculty Successfully Assigned!');
                return Redirect::back();
            }
        }else{
            // redirect
            Session::flash('error', 'Failed!');
            return Redirect::back();
        }
//        // redirect
//        Session::flash('message', 'Examiner Successfully Added!');
//        return Redirect::to('examination/amw/examiners');
    }

}

/*--------------------------------  Version 2 :Starts Here  -----------------------------------------------------------------------------------------*/

    public function examList(){

        if($this->isPostRequest()){
            $year_id  = Input::get('year_id');
            $semester_id = Input::get('semester_id');

            $exam_data = ExmExamList::join('course_conduct', function ($query) use ($year_id, $semester_id) {
                $query->on('course_conduct.id', '=', 'exm_exam_list.course_conduct_id');
                $query->where('course_conduct.year_id', '=', $year_id);
                $query->orWhere('course_conduct.semester_id', '=', $semester_id);
            })->groupBy('course_conduct_id')->paginate(10);
            Session::put('year', $year_id);

        }else{
            $exam_data = ExmExamList::with('relCourseConduct','relCourseConduct.relCourse','relYear','relSemester',
                        'relCourseConduct.relCourse.relSubject.relDepartment','relAcmMarksDistItem')->whereExists(function ($query){
                  $query->from('acm_marks_dist_item')->whereRaw('acm_marks_dist_item.id = exm_exam_list.acm_marks_dist_item_id')
                        ->where('acm_marks_dist_item.is_exam', '=', 1);
            })->get();
        }
        $year_id = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_id = array('' => 'Select Semester ') + Semester::lists('title', 'id');

        Input::flash();

        return View::make('examination::amw.exam.exam_list',compact('exam_data','year_id','semester_id'));
    }

    public function createExamination(){

          $year_id = ['' => 'Select Year'] + Year::lists('title', 'id');
          $semester_id = ['' => 'Select Semester'] + Semester::lists('title', 'id');
          $exam_type = ['' => 'Select Exam Type'] + AcmMarksDistItem::where('is_exam','=',1)->lists('title','id');
          $course_list = ['' => 'Select Course']+ Course::lists('title', 'id');

          return View::make('examination::amw.exam.add_exam_form', compact(
               'year_id','semester_id','exam_type','course_list'));

    }

    public function createAjaxCourseList(){

          $year = Input::get('year');
          $semester = Input::get('semester');

          $courses = CourseConduct::join('course', function($query){
                $query->on('course_conduct.course_id', '=', 'course.id');
             })
                ->where('course_conduct.year_id', '=', $year)
                ->where('course_conduct.semester_id', '=', $semester)
                ->select(DB::raw('course.title as c_title, course_conduct.id as cc_id'))
                ->lists('c_title', 'cc_id');

          if($courses){
            return Response::make(['please select one'] + $courses);
          }
          else{
            return Response::make(['no data found']);
          }
    }

    public function storeExamination(){

        $data = Input::all();
        $model = new ExmExamList();
        if($model->validate($data)) {
                DB::beginTransaction();
                try {
                    $model->create($data);
                    DB::commit();
                    Session::flash('message', " Successfully Added Examination ");
                }
                catch ( Exception $e ){
                    //If there are any exceptions, rollback the transaction
                    DB::rollback();
                    Session::flash('danger', "Examination not added.Invalid Request !");
                }
                return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
            }
    }

    public function viewExamination($id){

        $exam_data = ExmExamList::with('relAcmMarksDistItem','relCourseConduct','relCourseConduct.relCourse','relYear','relSemester')->find($id);
        return View::make('examination::amw.exam.view_exam_data',compact('exam_data'));
    }

    public function editExamination($id)
    {
        $model = ExmExamList::find($id);
        $year_id = ['' => 'Select Year'] + Year::lists('title', 'id');
        $semester_id = ['' => 'Select Semester'] + Semester::lists('title', 'id');
        $exam_type = ['' => 'Select Exam Type'] + AcmMarksDistItem::where('is_exam','=',1)->lists('title','id');

        $course_list = ExmExamList::join('course_conduct', function($query) {
                $query->on('exm_exam_list.course_conduct_id', '=', 'course_conduct.id');
            })->join('course', function($join){
                $join->on('course.id', '=', 'course_conduct.course_id');
            })
            ->where('exm_exam_list.id', $id)
            ->select(DB::raw('exm_exam_list.course_conduct_id as id, course.title as title'))
            ->lists('title','id');

        return View::make('examination::amw.exam.edit_exam',compact('model', 'course_list','year_id','semester_id','exam_type','course_list'));
    }

    public function updateExamination($id){

        $data = Input::all();
        $model = ExmExamList::find($id);
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "$name Successfully  Updated");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }

    public function deleteExamination($id){

        try {
            $data= ExmExamList::find($id);

           /* $exam_title = ExmExamList::join('acm_marks_dist_item', function($query){
                $query->on('exm_exam_list.acm_marks_dist_item_id', '=', 'acm_marks_dist_item.id');
            })->select(DB::raw('acm_marks_dist_item.title as exam_title'))->get();*/

            $exam_title = $data->title;

            if($data->delete())
              {
                Session::flash('info', "Successfully Deleted $exam_title ");
                return Redirect::back();
              }
        } catch (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function viewExmCourseList( $year_id , $semester_id){

        $course_data = ExmExamList::with('relCourseConduct','relCourseConduct.relCourse','relYear','relSemester',
            'relCourseConduct.relCourse.relSubject.relDepartment','relAcmMarksDistItem')->whereExists(function ($query) use ($year_id, $semester_id) {
            $query->from('course_conduct')->whereRaw('exm_exam_list.course_conduct_id = course_conduct.id');
            $query->where('course_conduct.year_id', '=', $year_id);
            $query->where('course_conduct.semester_id', '=', $semester_id);
        })->groupBy('exm_exam_list.course_conduct_id')->get();

        $year_title = Year::findOrFail($year_id)->title;
        $semester_title = Semester::findOrFail($semester_id)->title;

        return View::make('examination::amw.courses._exm_course_list',compact('course_data','year_title','semester_title'));
    }

    public function indexExaminers($exm_exam_list_id){

        $examiners_list = ExmExaminer::with('relExmExamList','relExmExamList.relCourseConduct', 'relExmExamList.relCourseConduct.relYear',
                'relExmExamList.relCourseConduct.relSemester','relExmExamList.relCourseConduct.relCourse.relSubject.relDepartment')
                ->where('exm_exam_list_id', '=', $exm_exam_list_id)
                ->get();

//
////        $course_title = CourseManagement::with('relCourse')->where('id' ,'=', $course_management_id)->first()->relCourse->title;
//
////        $exam_list_id = ExmExaminer::where('exm_exam_list_id' ,'=', $exam_list_id)->get();
        return View::make('examination::amw.examiners.index',compact('examiners_list','year_title','semester_title','exm_exam_list_id'));
    }

    public function createExaminers($exm_exam_list_id){
        return View::make('examination::amw.examiners._form',compact('exm_exam_list_id','year_title','semester_title'));
    }

    public function storeExaminers(){
echo 'ok';exit;
        $data = Input::all();
        $model = new ExmExaminer();
        if($model->validate($data)) {
            DB::beginTransaction();
            try {
                $model->create($data);
                DB::commit();
                Session::flash('message', " Successfully Added Examiner ");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Examiner not added.Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }

    }

}