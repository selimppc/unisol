<?php

class AdmAmwController extends \BaseController
{
    function __construct() {
        $this->beforeFilter('admAmw', array('except' => array('index')));
    }
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

// Admission : Course Management starts here...........................................................
    public function courseConductIndex()
    {
        //$model = CourseManagement::orderby('id', 'DESC')->paginate(5);

        $model= Course::orderby('id', 'DESC')->paginate(5);
        $semester = array('' => 'Select Semester ') + Semester::lists('title', 'id');
        $year = array('' => 'Select Year ') + Year::lists('title', 'id');
        $degree = array('' => 'Select Degree ') + Degree::lists('title', 'id');
        $department = array('' => 'Select Department ') + Department::lists('title', 'id');

        return View::make('admission::amw.course_conduct.index',
            compact('model'));
    }

    public function courseConductCreate()
    {
        $courseType = array('' => 'Please Select Course Type') + CourseType::lists('title', 'id');
        $subject = array('' => 'Please Select Year') + Subject::lists('title', 'id');

        return View::make('admission::amw.course_conduct.modals._form',
            compact('subject','courseType'));
    }

    public function store()
    {
        $data = Input::all();
        if (Course::create($data)) {

            return Redirect::back()
                ->with('message', 'Successfully added Information!');
        } else{
            return Redirect::back()
                ->with('message', 'invalid');
        }
    }

    public function show($id)
    {
        $model = CourseManagement::find($id);
        return View::make('admission::amw.course_management.modals.show',
            compact('model'));
    }

    public function edit($id)
    {
        $course_model = CourseManagement::find($id);
        $facultyList = User::FacultyList();

        $courseType = CourseType::lists('title', 'id');
        $year = Year::lists('title', 'id');
        $course = Course::lists('title', 'id');
        $semester = Semester::lists('title', 'id');
        $degree = Degree::lists('title', 'id');

        return View::make('admission::amw.course_management.modals.edit',
            compact('course_model', 'courseType', 'year', 'course', 'semester', 'user', 'facultyList', 'degree'));
    }

    public function update($id)
    {
        $rules = array(//            'ever_admit_this_university' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {

            $course_model = CourseManagement::find($id);

            $course_model->course_id = Input::get('course_id');
            $course_model->year_id = Input::get('year_id');
            $course_model->semester_id = Input::get('semester_id');
            $course_model->course_type_id = Input::get('course_type_id');
            $course_model->evolution_system = Input::get('evolution_system');
            $course_model->start_date = Input::get('start_date');
            $course_model->end_date = Input::get('end_date');
            $course_model->major_minor = Input::get('major_minor');
            $course_model->degree_id = Input::get('degree_id');

            $course_model->save();
            return Redirect::back()
                ->with('message', 'Successfully updated Information!');
        } else {
            return Redirect::back()
                ->with('message', 'The following errors occurred')
                ->withErrors($validator)
                ->withInput();
        }
    }

//Multiple dropdown filtering..........................................

    public function search()
    {

        $dep_id = Input::get('search_department');
        $semester_id = Input::get('search_semester');
        $degree_id = Input::get('search_degree');
        $year_id = Input::get('search_year');

        $model = CourseManagement::join('Degree', function ($query) use ($dep_id) {
            $query->on('degree.id', '=', 'course_management.degree_id');

            if (isset($dep_id) && !empty($dep_id)) $query->where('degree.department_id', '=', $dep_id);
        });
        $model = $model->select(['course_management.semester_id as sem_id', 'course_management.year_id as yr_id',
            'course_management.id as cm_id',
            'course_management.degree_id as deg_id', 'course_management.major_minor as major_minor',
            'course_management.course_id as course_id', 'course_management.user_id as user_id',
            'degree.department_id as dept_id', 'degree.title as deg_title']);
        if (isset($semester_id) && !empty($semester_id)) $model = $model->where('course_management.semester_id', '=', $semester_id);
        if (isset($year_id) && !empty($year_id)) $model = $model->where('course_management.year_id', '=', $year_id);
        if (isset($degree_id) && !empty($degree_id)) $model = $model->where('course_management.degree_id', '=', $degree_id);
        $model = $model->paginate();


        $semester = array('' => 'Select Semester ') + Semester::lists('title', 'id');
        $year = array('' => 'Select Year ') + Year::lists('title', 'id');
        $degree = array('' => 'Select Degree ') + Degree::lists('title', 'id');
        $course = array('' => 'Select Course ') + Course::lists('title', 'id');
        $department = array('' => 'Select Department ') + Department::lists('title', 'id');

        return View::make('admission::amw.course_management.search',
            compact('model', 'semester', 'department', 'course', 'degree', 'year'));

    }
// ......................................Admission : Course Management ends ................................

//.........................Admission :Degree Management starts here with method prefix-Dgm..................

    public function dgmIndex()
    {

        $degree_model = Degree::orderby('id', 'DESC')->paginate(5);

        return View::make('admission::amw.degree.index',
            compact('degree_model'));
    }

    public function dgmCreate()
    {

        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        $semester = array('' => 'Select Semester ') + Semester::lists('title', 'id');
        $year = array('' => 'Please Select Year') + Year::lists('title', 'id');
        $degree_program = array('' => 'Please Select ') + DegreeProgram::lists('title', 'id');

        return View::make('admission::amw.degree.degree_modals._form',
            compact('year', 'semester', 'department', 'degree_program'));
    }

    public function dgmStore()
    {
        $rules = array(
            //    'course_id' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {

            $degree_model = new Degree();

            $degree_model->title = Input::get('title');
            $degree_model->description = Input::get('description');
            $degree_model->year_id = Input::get('year_id');
            $degree_model->semester_id = Input::get('semester_id');
            $degree_model->department_id = Input::get('department_id');
            $degree_model->degree_program_id = Input::get('degree_program_id');
            $degree_model->start_date = Input::get('start_date');
            $degree_model->end_date = Input::get('end_date');
            $degree_model->total_credit = Input::get('total_credit');
            $degree_model->duration = Input::get('duration');
            //$degree_model->seat = Input::get('seat');
            //$degree_model->admission_deadline = Input::get('admission_deadline');
//            $degree_model->status = Input::get('status');

            if ($degree_model->save()) {
                return Redirect::to('amw/degree_manage')
                    ->with('message', 'Successfully added Information!');
            }
        } else {
            return Redirect::back()
                ->with('message', 'The following errors occurred')
                ->withErrors($validator)
                ->withInput();
        }

    }

    public function dgmShow($id)
    {

        $degree_model = Degree::find($id);
        return View::make('admission::amw.degree.degree_modals.show',
            compact('degree_model'));
    }

    public function dgmEdit($id)
    {

        $degree_model = Degree::find($id);
        $year = Year::lists('title', 'id');
        $department = Department::lists('title', 'id');
        $semester = Semester::lists('title', 'id');
        $degree_program = DegreeProgram::lists('title', 'id');
        return View::make('admission::amw.degree.degree_modals.edit',
            compact('degree_model', 'department', 'year', 'semester', 'degree_program', 'semester'));
    }

    public function dgmUpdate($id)
    {
        $rules = array(
            //            'ever_admit_this_university' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {

            $degree_model = Degree::find($id);

            $degree_model->title = Input::get('title');
            $degree_model->description = Input::get('description');
            $degree_model->year_id = Input::get('year_id');
            $degree_model->semester_id = Input::get('semester_id');
            $degree_model->department_id = Input::get('department_id');
            $degree_model->degree_program_id = Input::get('degree_program_id');
            $degree_model->start_date = Input::get('start_date');
            $degree_model->end_date = Input::get('end_date');
            $degree_model->total_credit = Input::get('total_credit');
            $degree_model->duration = Input::get('duration');
            $degree_model->status = Input::get('status');
            //  $course_model->user_id = Input::get('user_id');

            $degree_model->save();
            return Redirect::back()
                ->with('message', 'Successfully updated Information!');
        } else {
            return Redirect::back()
                ->with('message', 'The following errors occurred')
                ->withErrors($validator)
                ->withInput();
        }

    }

    public function degreeWaiverIndex($id)
    {
        $degree_model = Degree::find($id);
        $degree_waiver = DegreeWaiver::with('relWaiver')
            ->where('degree_id', '=', $id)
            ->get();
        return View::make('admission::amw.degree.degree_waiver_index',
            compact('degree_model', 'degree_waiver'));
    }

    public function degreeWaiverCreate($degree_id)
    {
        $waiverList = array('' => 'Select Waiver Item ') + Waiver::lists('title','id');
        return View::make('admission::amw.degree.degree_modals.add_degree_waiver',
            compact('waiverList', 'degree_id'));
    }

    public function degreeWaiverStore(){

        $dw_model = new DegreeWaiver();

        $dw_model->degree_id = Input::get('degree_id');
        $dw_model->waiver_id = Input::get('waiver_id');

        if ($dw_model->save()) {
            return Redirect::back()
                ->with('message', 'Successfully added Information!');
        }
    }

    public function degreeWaiverDelete($id)
    {
        try {
            DegreeWaiver::find($id)->delete();
            return Redirect::back()
                ->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
            return Redirect::back()
                ->with('message', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function degWaiverConstIndex($id){

        $degree_model = DegreeWaiver::find($id);

        $deg_waiver_const = WaiverConstraint::with('relDegreeWaiver')
            ->where('degree_waiver_id', '=', $id)
            ->get();
        return View::make('admission::amw.degree.deg_waiver_const',
            compact('degree_model','deg_waiver','deg_waiver_const'));

    }

    public function degWaiverTimeConstCreate($degree_waiver_id){

        return View::make('admission::amw.degree.degree_modals.add_time_const',
            compact('degree_waiver_id'));
    }

    public function degWaiverGpaConstCreate($degree_waiver_id){

        return View::make('admission::amw.degree.degree_modals.add_gpa_const',
            compact('degree_waiver_id'));
    }

//    Degree Waiver Time/GPA Constraint Store method
    public function degWaiverConstStore(){

        $data = Input::all();
        if (WaiverConstraint::create($data)) {

            return Redirect::back()
                ->with('message', 'Successfully added Information!');
        }
        else{
            return Redirect::back()
                ->with('message', 'invalid');
        }
    }

    public function degWaiverConstDelete($id)
    {
        WaiverConstraint::find($id)->delete();
        return Redirect::back()
            ->with('message', 'Successfully deleted Information!');
    }
    public function degWaiverTimeConstEdit($id){

        $time_const_model = WaiverConstraint::find($id);

        return View::make('admission::amw.degree.degree_modals.edit_time_const',
            compact('time_const_model'));

    }

    public function degWaiverGpaConstEdit($id){

        $gpa_const_model = WaiverConstraint::find($id);

        return View::make('admission::amw.degree.degree_modals.edit_gpa_const',
            compact('gpa_const_model'));

    }

    public function degWaiverConstUpdate($id){

        $const_model = WaiverConstraint::find($id);
        $data = Input::all();

        $const_model->fill($data);

        if ($const_model->save()) {
            return Redirect::back()
                ->with('message', 'Successfully Updated Information!');
        }else{
            return Redirect::back();
        }
    }

//..............................    Waiver Management : starts ...................................................

    public function waiverIndex()
    {
        $waiver_model = Waiver::with('relBillingDetails', 'relBillingDetails.relBillingItem')
            ->orderBy('id', 'DESC')
            ->paginate(15);
        return View::make('admission::amw.waiver_management.index',
            compact('waiver_model'));
    }

    public function waiverCreate()
    {
        $billing_item = BillingDetails::BillingItem();

        return View::make('admission::amw.waiver_management.waiver_modals._form',
            compact('billing_item'));
    }

    public function waiverStore(){

        $rules = array(
            //    'course_id' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {

            $waiver_model = new Waiver();

            $waiver_model->title = Input::get('title');
            $waiver_model->description = Input::get('description');
            $waiver_model->amount = Input::get('amount');
            $waiver_model->is_percentage = Input::get('is_percentage');
            $waiver_model->billing_details_id = Input::get('billing_details_id');

            if ($waiver_model->save()) {
                return Redirect::to('amw/waiver_manage')
                    ->with('message', 'Successfully added Information!');
            }
        } else {
            return Redirect::back()
                ->with('message', 'The following errors occurred')
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function waiverShow($id){

        $waiver_model = Waiver::find($id);
        return View::make('admission::amw.waiver_management.waiver_modals.show',
            compact('waiver_model'));
    }
    public function waiverEdit($id){

        $waiver_model = Waiver::find($id);
        return View::make('admission::amw.waiver_management.waiver_modals.edit',
            compact('waiver_model'));
    }
    public function waiverUpdate($id){

        $rules = array(
            //   'billing_details_id' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {

            $waiver_model = Waiver::find($id);

            $waiver_model->title = Input::get('title');
            $waiver_model->description = Input::get('description');
            $waiver_model->amount = Input::get('amount');
            $waiver_model->is_percentage = Input::get('is_percentage');
            $waiver_model->billing_details_id = Input::get('billing_details_id');

            $waiver_model->save();

            return Redirect::back()->with('message', 'Successfully updated Information!');
        } else {
            return Redirect::back()
                ->with('message', 'The following errors occurred')
                ->withErrors($validator)
                ->withInput();
        }
    }


// * * * * * * * * * * * * * * * * * * * * * * *  VERSION 2  Starts From Here* * * * * * * * * * * * * * * * * * * * * * *
//* * * * * * * * * * * * * * * * * * * * * * * Degree Course start(R) * * * * * * * *  * * * * * * * * * * * * * * * * *

    /**
     * @param $id
     * @return mixed
     */
    public function degree_courses_index($id)
    {
        $degree_id = $id;
        $degree_title = Degree::with('relDegreeCourse')
            ->where('id' , '=' ,$id)
            ->first();
        $course_list = Course::lists('title', 'id');
        $deg_course_info = DegreeCourse::with('relCourse','relCourse.relSubject.relDepartment','relCourse.relCourseType')
            ->where('degree_id', '=' ,$id)
            ->paginate(10);
        return View::make('admission::amw.degree_courses.index',compact('course_list','deg_course_info','deg_course','degree_id','degree_title'));
    }

    /**
     * @return mixed
     */
    public function degree_courses_save()
    {
        $data = Input::all();

        $select = Input::get('course_list');
        $deg_id = Input::get('degree_id');
        $i = 0;
        $flash_msg_course = "";

        DB::beginTransaction();
        try {
            foreach($select as $value){
                $degree_course = new DegreeCourse();

                $degree_course->degree_id = $deg_id;
                $degree_course->course_id = $value;

                $flash_name = $degree_course->relCourse->title;
                $flash_msg_course = $flash_msg_course .", ". $flash_name;

                $degreeCourseCheck = $this->checkDegreeCourse($degree_course->degree_id, $degree_course->course_id);

                if($degreeCourseCheck){
                    $exists [] = Course::findOrFail($degree_course->course_id)->course_code;
                    Session::flash('info', "Already Exists :$flash_msg_course ");
                }else{
                    $degree_course->save();
                    //$exists [] = Course::findOrFail($degree_course->course_id)->course_code;
                    Session::flash('message', "Degree Course Added");

                }
            }
            DB::commit();

        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('danger', " Degree Course is not added.Invalid Request !");
        }
        return Redirect::back();
    }

    /**
     * @param $degree_id
     * @param $course_id
     * @return mixed
     */
    protected function checkDegreeCourse($degree_id, $course_id){
        $result = DB::table('degree_course')->select(DB::raw('1'))
            ->where('course_id', '=', $course_id)
            ->where('degree_id', '=', $degree_id)
            ->first();
        return $result;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function degree_courses_delete($id)
    {
        try {
            $data= DegreeCourse::find($id);
            $name = $data->relCourse->title;
            if($data->delete())
            {
                Session::flash('message', "Successfully Deleted $name!");
                return Redirect::back() ;
            }
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }

//******************************Batch Course start(R)*****************************

    /**
     * @param $batch_id
     * @param $deg_id
     * @return mixed
     */
    public function batch_course_index($batch_id, $deg_id)
    {
        $batch = Batch::with('relDegree')->where('id', '=', $batch_id)->first();
        if(!$batch) {
            Session::flash('danger', "This batch does not exist!");
            return Redirect::intended('errors.missing');
        }

        $addCourseCredit = DB::table('adm_v_batch_course')
            ->select(DB::raw('sum(course_credit) AS credit'))
            ->where('batch_id', $batch_id)->get();

        $year_by_batch = DB::table('year')->where('id', '>=', $batch->year_id)->take($batch->relDegree->duration + 2)->lists('title', 'id');
        $year_data = array('' => 'Select Year ') + $year_by_batch;
        $semester_data = array('' => 'Select Semester ') + Semester::lists('title','id');

        $deg_course_info = AdmVDdegreeCourse::where('degree_id', $deg_id)->where('batch_id', $batch_id)->get();

        $bc_list = AdmVBatchCourse::where('batch_id', $batch_id)->orderBy('year')->orderBy('semester')->get();
        foreach($bc_list as $key => $value){
            $batch_course_data[$value->year][$value->semester][$value->id]['title']         = $value->course;
            $batch_course_data[$value->year][$value->semester][$value->id]['mandatory']     = $value->mandatory;
            $batch_course_data[$value->year][$value->semester][$value->id]['department']    = $value->department;
            $batch_course_data[$value->year][$value->semester][$value->id]['type']          = $value->course_type;
            $batch_course_data[$value->year][$value->semester][$value->id]['credit']        = $value->course_credit;
        }

        return View::make('admission::amw.batch_course.index',compact(
            'batch_id','deg_id','batch','deg_course_info','year_data','semester_data','batch_course_data', 'addCourseCredit'
        ));
    }

    /**
     * @return mixed
     */
    public function batch_course_save()
    {
        $data = Input::all();
        $model = new BatchCourse();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->create($data);
                DB::commit();
                Session::flash('message', "$name Batch Course  Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Batch Course  not added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Invalid Request');
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function batch_course_delete($id)
    {
        try {
            $data = BatchCourse::find($id);
            $name = $data->relCourse->title;
            if($data->delete())
            {
                Session::flash('message', "Successfully Deleted $name Course ");
                return Redirect::back();
            }
        } catch(exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }

    /**
     * @return mixed
     */
    public function batch_data_save()
    {
        $data = Input::all();

        $course_id = Input::get('id');
        $batch_id = Input::get('batch_id');
        $year_id = Input::get('year_id');
        $semester_id = Input::get('semester_id');
        $major_minor= Input::get('major_minor');

        DB::beginTransaction();
        try {
            foreach ($course_id as $key => $value)
            {
                $data = new BatchCourse();
                $data->course_id = $value;
                $data->batch_id = $batch_id;
                $data->year_id = $year_id;
                $data->semester_id = $semester_id;
                $data->major_minor = $major_minor;
                $data->save();

            }
            DB::commit();
            Session::flash('message', "Batch is Added");
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('danger', "Batch is not added.Invalid Request!");
        }
        return Redirect::back();
    }


  /*  public function batch_data_save()
    {
        $data = Input::all();
        $course_id = Input::get('id');
        $batch_id = Input::get('batch_id');
        $year_id = Input::get('year_id');
        $semester_id = Input::get('semester_id');
        $major_minor = Input::get('major_minor');
        foreach ($course_id as $key => $value) {
            $new_post = array(
                'course_id' => $value,
                'batch_id' => $batch_id,
                'year_id' => $year_id,
                'semester_id' => $semester_id,
                'major_minor' => $major_minor,
            );
        }
        $data = new BatchCourse($new_post);
        $data->save();
        Session::flash('message', 'Successfully added Information!');
        return Redirect::back();

    }*/

//******************************Assign faculty start(R)*****************************

    /**
     * @param $course_id
     * @param $dep_id
     * @return mixed
     */
    public function assign_faculty_index($bc_id)
    {
        $data = BatchCourse::findOrFail($bc_id);
        $batch_course = BatchCourse::with('relBatch','relBatch.relDegree','relCourse','relYear','relSemester')
            ->where('course_id' , '=' , $data->course_id)
            ->first();

        $facultyList =  array('' => 'Select faculty ') +User::FacultyList();
        $cc_status = CourseConduct::where('course_id' , '=' ,$data->course_id)
            ->first();
        $comments_info = CourseConduct::with('relCourseConductComments')
                        ->where('course_id','=', $data->course_id)->get();
        return View::make('admission::amw.batch_course.assign_faculty_index',compact(
            'facultyList','batch_course','cc_status', 'comments_info'
        ));
    }

    /**
     * @return mixed
     */
    public function assign_faculty_save()
   {
       $data = Input::all();
       if(Input::get('revoke')) {
           DB::beginTransaction();
           try {
               $course_id = Input::get('course_id');
               $course_conduct_id = CourseConduct::where('course_id', $course_id)->first()->id;
               $course_conduct_comments_id = CourseConductComments::where('course_conduct_id', $course_conduct_id)->first()->id;
               $course_conduct_comments = CourseConductComments::findOrFail($course_conduct_comments_id);
               if ($course_conduct_comments->destroy($course_conduct_comments_id)) {
                   $course_conduct = CourseConduct::findOrFail($course_conduct_id);
                   $course_conduct->destroy($course_conduct_id) ;
               }
               DB::commit();
               Session::flash('info', 'Successfully Revoked!');
           }catch ( Exception $e ){
               //If there are any exceptions, rollback the transaction
               DB::rollback();
               Session::flash('danger', "Faculty not Revoked!");
           }
       }elseif(Input::get('request')){
           DB::beginTransaction();
           try {
               $model = new CourseConduct();
               $model->course_id = Input::get('course_id');
               $model->faculty_user_id = Input::get('faculty_user_id');
               $model->year_id = Input::get('year_id');
               $model->semester_id = Input::get('semester_id');
               $model->degree_id = Input::get('degree_id');
               $model->status = 'requested';
               if($model->save()) {
                   $comments = new CourseConductComments();
                   $comments->course_conduct_id = $model->id;
                   $comments->comments = Input::get('comments');
                   $comments->commented_to = Input::get('faculty_user_id');
                   $comments->commented_by = Auth::user()->get()->id;
                   $comments->status = '';
                   $comments->save();
                }
               Session::flash('message', 'Successfully added Information!');
               DB::commit();
           }catch ( Exception $e ){
               //If there are any exceptions, rollback the transaction
               DB::rollback();
               Session::flash('danger', " Invalid Request!");
           }
       }
       return Redirect::back();
   }


//new code of admission module by shafi : VERSION 2

//.................................................batch....................................................

    /**
     * @param $degree_id
     * @return mixed
     */
    public function batchIndex($degree_id)
    {
        $batch_management = Batch::where('degree_id', '=', $degree_id)->latest('id')->paginate(10);
        $dpg_list = array('' => 'Select Degree Program ') + Degree::DegreeProgramGroup();
        $year_list = array('' => 'Year ') + Year::lists('title', 'id');
        $department_list = array('' => 'Department ') + Department::lists('title', 'id');

        return View::make('admission::amw.batch.index',
            compact('degree_id','batch_management','dpg_list','year_list','department_list'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function batchShow($id)
    {
        $b_m_course = Batch::find($id);
        return View::make('admission::amw.batch.show',compact('b_m_course'));
    }

    /**
     * @param $degree_id
     * @return mixed
     */
    public function batchCreate($degree_id)
    {
        $batch_number = Batch::where('degree_id','=',$degree_id)->count();
        $degree_title = Degree::with('relDegreeLevel','relDegreeProgram','relDegreeGroup')
            ->where('id','=',$degree_id)->first();

        $dpg_list = array('' => 'Select Degree Program ') + Degree::DegreeProgramGroup();

        $semester_list = array('' => 'Select Semester ') + Semester::lists('title', 'id');

        $duration = Degree::with('relDegreeLevel','relDegreeProgram','relDegreeGroup')
            ->where('id','=',$degree_id)->first()->duration;

        $time = date('Y-m-d h:i:s', time());;

        $year_list = array('' => 'Select Year ') + Year::lists('title', 'id');
        $current_year = Year::where('title', Date('Y'))->first()->id;

//        //get year data according to degree duration
//        $duration = Degree::findOrFail($deg_id)->duration;
//        $curretn_year = DB::table('year')->where('id', '>=', $year_id)->take($duration+2)->lists('title', 'id');
//        $year_list = array('' => 'Select Year ') + $year_by_batch;


        return View::make('admission::amw.batch._form',compact(
            'degree_id','dpg_list','year_list','semester_list','batch_number','degree_title','duration','time',
            'current_year'
        ));
    }

    /**
     * @return mixed
     */
    public function batchStore()
    {


        $data = Input::all();

//        print_r($data);exit;

        $model = new Batch();

        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->create($data);
                DB::commit();
                Session::flash('message', "Batch Added");
            }
            catch ( Exception $e ){
                    //If there are any exceptions, rollback the transaction
                    DB::rollback();
                    Session::flash('danger', " Batch not added.Invalid Request !");
                }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function batchEdit($id)
    {
        $batch_edit = Batch::find($id);
        $dpg_list = array('' => 'Select Degree Program') + Degree::DegreeProgramGroup();
        $year_list = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_list = array('' => 'Select Semester ') + Semester::lists('title', 'id');

        return View::make('admission::amw.batch.edit',compact('batch_edit','dpg_list','year_list','semester_list'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function batchUpdate($id)
    {
        $data = Input::all();
        $model = Batch::find($id);
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "Batch Updates");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', " Batch not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    /**
     * @return mixed
     */
    public function batchDelete()
    {
        try {
            Batch::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

//..............................................batch_admtest_subject...........................................

    /**
     * @param $batch_id
     * @return mixed
     */
    public function indexBatchAdmTestSubject($batch_id)
    {
        $degree_test_sbjct = BatchAdmtestSubject::where('batch_id' ,'=', $batch_id)->get();
        $degree_name = Batch::with('relDegree','relDegree.relDegreeLevel','relDegree.relDegreeGroup')
            ->where('id' ,'=', $batch_id)
            ->first();
        return View::make('admission::amw.batch_adm_test_subject.index',
            compact('batch_id','degree_test_sbjct','degree_name'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function viewBatchAdmTestSubject($id)
    {
        $view_adm_test_subject = BatchAdmtestSubject::find($id);
        return View::make('admission::amw.batch_adm_test_subject.view',compact('view_adm_test_subject'));
    }

    /**
     * @param $batch_id
     * @return mixed
     */
    public function createBatchAdmTestSubject($batch_id)
    {
        $subject_id_result = AdmTestSubject::lists('title', 'id');
        $degree_name = Batch::with('relDegree','relDegree.relDegreeLevel','relDegree.relDegreeGroup','relYear','relSemester','relDegree.relDegreeProgram')
            ->where('id' ,'=', $batch_id)
            ->first();
        return View::make('admission::amw.batch_adm_test_subject._form',compact('batch_id','degree_name','subject_id_result'));
    }

    /**
     * @return mixed
     */
    public function storeBatchAdmTestSubject()
    {
        $data = Input::all();
        $select = Input::get('admtest_subject');
        $batch_id = Input::get('batch_id');

        DB::beginTransaction();
        try {
            $i = 0;
            foreach ($select as $value) {
                $degree_course = new BatchAdmtestSubject();
                $degree_course->description = Input::get('description');
                $degree_course->marks = Input::get('marks');
                $degree_course->qualify_marks = Input::get('qualify_marks');
                $degree_course->duration = Input::get('duration');
                $degree_course->batch_id = $batch_id;
                $degree_course->admtest_subject_id = $value;

                $degreeCourseCheck = $this->checkBatchAdmTestSubject($degree_course->batch_id, $degree_course->admtest_subject_id);

                if ($degreeCourseCheck) {
                    $exists [] = AdmTestSubject::findOrFail($degree_course->admtest_subject_id)->title;
                    Session::flash('info', 'Already Exists : ' . $exists[$i]);
                } else {
                    $degree_course->save();
                    $array [] = AdmTestSubject::findOrFail($degree_course->admtest_subject_id)->title;
                    Session::flash('message', 'Successfully Added ! ' . $array[$i]);
                }
            }
            DB::commit();
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('danger', " is not added.Invalid Request !");
        }
        return Redirect::back();
    }

    /**
     * @param $batch_id
     * @param $admtest_subject_id
     * @return mixed
     */
    protected function checkBatchAdmTestSubject($batch_id, $admtest_subject_id){
        $result = DB::table('batch_admtest_subject')->select(DB::raw('1'))
            ->where('admtest_subject_id', '=', $admtest_subject_id)
            ->where('batch_id', '=', $batch_id)
            ->first();
        return $result;
    }

    /**
     * @param $id
     * @param $batch_id
     * @return mixed
     */
    public function editBatchAdmTestSubject($id, $batch_id)
    {
        $batch_edit = BatchAdmtestSubject::findOrFail($id);
        $degree_name = Batch::with('relDegree')->first();
        $subject_id_result = AdmTestSubject::lists('title', 'id');

        return View::make('admission::amw.batch_adm_test_subject.edit',compact('batch_id','degree_name','batch_edit','subject_id_result'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function updateBatchAdmTestSubject($id)
    {
        $data = Input::all();
        $model = BatchAdmtestSubject::find($id);
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "Batch Updates");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', " Batch not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    public function batchAdmTestSubjectBatchDelete()
    {
        try {
            BatchAdmtestSubject::destroy(Request::get('id'));

            return Redirect::back()->with('message', 'Successfully deleted Information!');
        } catch (exception $ex) {

            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

//.................................................admtest_subject....................................................

    /**
     * @return mixed
     */
    public function indexAdmissionTestSubject()
    {
        $admission_test_subject = AdmTestSubject::orderBy('id', 'DESC')->paginate(10);
        return View::make('admission::amw.adm_test_subject.admtest_subject_index', compact('admission_test_subject'));
    }

    /**
     * @return mixed
     */
    public function createAdmissionTestSubject()
    {
        return View::make('admission::amw.adm_test_subject._form');
    }

    /**
     * @return mixed
     */
    public function storeAdmissionTestSubject()
    {
        $data = Input::all();
        $model = new AdmTestSubject();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->create($data);
                DB::commit();
                Session::flash('message', "Successfully Added Admission Test Subject $name!");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', " Added Admission Test Subject $name not added.Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function viewAdmissionTestSubject($id)
    {
        $view_admission_test_subject = AdmTestSubject::find($id);
        return View::make('admission::amw.adm_test_subject.view',compact('view_admission_test_subject'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function editAdmissionTestSubject($id)
    {
        $edit_admission_test_subject = AdmTestSubject::find($id);
        return View::make('admission::amw.adm_test_subject.edit',compact('edit_admission_test_subject'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function updateAdmissionTestSubject($id)
    {
        $model = AdmTestSubject::find($id);
        $model->title = Input::get('title');
        $name = $model->title;
        $data = Input::all();
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "$name Updates");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', " $name not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

//............................................ Manage Admission Tests  : Home ........................................

    /**
     * @return mixed
     */
    public function admissionTestIndex()
    {
        if($this->isPostRequest()){
            $year_id  = Input::get('year_id');
            $semester_id = Input::get('semester_id');
            $admission_test_home = BatchAdmtestSubject::with(['relBatch'=> function($query) use($year_id, $semester_id) {
                //$query->where('year_id', '=', $year_id)->where('semester_id', '=', $semester_id);
            }])->groupBy('batch_id')
                ->get();
        }else{
            $admission_test_home = BatchAdmtestSubject::with('relBatch','relBatch.relDegree',
                'relBatch.relDegree.relDepartment','relBatch.relYear','relBatch.relSemester')->groupBy('batch_id')->get();
        }
        $year_id = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_id = array('' => 'Select Semester ') + Semester::lists('title', 'id');

        return View::make('admission::amw.adm_test_home.index',
            compact('admission_test_home','admission_test_batch','year_id','semester_id'));
    }

    /**
     * @return mixed
     */
    public function admissionTestSearchIndex()
    {
        $year_id  = Input::get('year_id');
        $semester_id = Input::get('semester_id');

        $adm_test_home_data = BatchAdmtestSubject::join('batch', function ($query) use ($year_id, $semester_id) {
            $query->on('batch.id', '=', 'batch_admtest_subject.batch_id');
            $query->where('batch.year_id', '=', $year_id);
            $query->where('batch.semester_id', '=', $semester_id);
        })->groupBy('batch_id')->paginate(10);

        $year_id = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_id = array('' => 'Select Semester ') + Semester::lists('title', 'id');

        // To use the old values effective use the following line before  return view:: make
        Input::flash();
        
        return View::make('admission::amw.adm_test_home._search_adm_test_home_index',
            compact('adm_test_home_data','year_id','semester_id'));

    }

    /**
     * @return mixed
     */
    public function admissionTestBatchDelete()
    {
        try {
            Batch::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }


//..................................................admtest_examiner.......................................

    /**
     * @param $year_id
     * @param $semester_id
     * @param $batch_id
     * @return mixed
     */
    public function admExaminerIndex( $year_id, $semester_id, $batch_id)
    {
        $adm_test_examiner = AdmExaminer::latest('id')->where('batch_id', $batch_id)->paginate(10);

        $degree_batch = Batch::with('relDegree', 'relDegree.relDepartment', 'relSemester', 'relYear')
            ->where('id', $batch_id )->first();

        return View::make('admission::amw.adm_examiner.adm_examiner_index',
            compact('adm_test_examiner','degree_batch'));

    }

    /**
     * @param $year_id
     * @param $semester_id
     * @param $batch_id
     * @return mixed
     */
    public function addAdmTestExaminer($year_id, $semester_id, $batch_id)
    {
        $degree_id = Batch::where('id' ,'=', $batch_id )
            ->where('semester_id' ,'=', $semester_id)
            ->where('year_id' ,'=', $year_id)
            ->first()->degree_id;
        $degree_data = Degree::with('relDepartment')
            ->where('id','=', $degree_id)->first();

        return View::make('admission::amw.adm_examiner._form',compact('degree_data','degree_id','batch_id'));
    }

    /**
     * @return mixed
     */
    public function storeAdmTestExaminer()
    {
        $data = Input::all();

        $model = new AdmExaminer();
        $model->batch_id = Input::get('batch_id');
        $model->user_id = Input::get('user_id');
        $model->type = Input::get('type');
        $model->assigned_by = Auth::user()->get()->id;
        $model->status = Input::get('status');
        $model->save();
        if ($model->validate($data)) {
            DB::beginTransaction();
            try {
                $mod_comments = new AdmExaminerComments();
                $mod_comments->batch_id = Input::get('batch_id');
                $mod_comments->comment = Input::get('comment');
                $mod_comments->commented_to = Input::get('user_id');
                $name = $mod_comments->commented_to;
                $mod_comments->commented_by = Auth::user()->get()->id;
                $mod_comments->status = 1;
                $mod_comments->save();

                DB::commit();
                Session::flash('message', "Successfully Assigned to Examiner Id $name !");
            } catch (Exception $e) {
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Invalid Request !");
            }
            return Redirect::back();
        } else {
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    /**
     * @param $batch_id
     * @return mixed
     */
    public function viewAdmTestExaminers($batch_id){
        $data = AdmExaminer::with('relBatch','relBatch.relDegree', 'relBatch.relAdmExaminerComments')
            ->where('batch_id', $batch_id)->first();
        $exm_comment_info = AdmExaminerComments::where('batch_id', $batch_id)->get();
        return View::make('admission::amw.adm_examiner.view_examiners',
            compact('data','exm_comment_info'));
    }

    /**
     * @return mixed
     */
    public function admTestExaminersComments()
    {
        $data = Input::all();

        $model = new AdmExaminerComments();
        $model->batch_id = $data['batch_id'];
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
            return Redirect::back()->with('errors', 'invalid');
        }

    }

    /**
     * @param $id
     * @return mixed
     */
    public function changeStatusByAdmTestExaminer($id){
        $model = AdmExaminer::findOrFail($id);
        $model->status = 'Cancel';
        if($model->save()){
            Session::flash('danger', 'Cancel or Revoked! ');
            return Redirect::back();
        }
    }

    /**
     * @return mixed
     */
    public function deleteAdmTestExaminer(){
        $id = Input::get('id');
        $batch_id = Input::get('batch_id');
        try {
            AdmExaminer::destroy(Request::get('id'));
            AdmExaminerComments::where('batch_id', Request::get('batch_id'));
            Session::flash('message', 'Deleted Successfully! ');
            return Redirect::back();
        }
        catch(exception $ex){
            Session::flash('warning', 'Invalid Request! ');
            return Redirect::back();
        }
    }


//..................................................adm test_question.......................................

    /**
     * @param $bats_id  = batch_admtest_subject_id
     * @param $batch_id = batch_id
     * @return mixed
     */
    public function admQuestionIndex($bats_id, $batch_id)
    {
        $batch = BatchAdmtestSubject::with('relBatch')->where('id', $bats_id)->first();
        $adm_question = AdmQuestion::with(['relBatchAdmtestSubject'=>
            function($query) use($batch_id) {
                $query->where('batch_id', '=', $batch_id);
            }])->latest('id')->paginate(10);

        return View::make('admission::amw.adm_question.adm_question_index',
            compact('adm_question', 'batch', 'bats_id'));
    }

    /**
     * @param $bats_id
     * @return mixed
     */
    public function createAdmTestQuestionPaper($bats_id)
    {

        $batch = BatchAdmtestSubject::with('relBatch')->where('id', $bats_id)->first();

            $admtest_subject = BatchAdmtestSubject::AdmissionTestSubjectByBatchId($batch->batch_id);
            $examiner_faculty_lists = AdmQuestion::AdmissionExaminerList($batch->batch_id);

        return View::make('admission::amw.adm_question._form',
            compact('bats_id', 'batch','admtest_subject', 'examiner_faculty_lists'));
    }

    /**
     * @return mixed
     */
    public function storeAdmTestQuestionPaper()
    {
        $data = Input::all();
        $model = new AdmQuestion();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->create($data);
                DB::commit();
                Session::flash('message', "Successfully Added Admission Test Question $name!");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', " Added Admission Test Question $name not added.Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function viewAdmTestQuestionPaper($id)
    {
        $view_questions = AdmQuestion::with('relBatchAdmtestSubject', 'relBatchAdmtestSubject.relBatch', 'relBatchAdmtestSubject.relBatch.relDegree')
            ->where('id', $id)->first();
        return View::make('admission::amw.adm_question.view_question',compact('view_questions'));
    }


    /**
     * @param $id
     * @return mixed
     */
    public function editAdmTestQuestionPaper($id)
    {
        $question = AdmQuestion::with('relBatchAdmtestSubject')->where('id', $id)->first();
        $batch_admtest_subject = BatchAdmtestSubject::BatchAdmissionTestSubjectLists($question->batch_admtest_subject_id);
        $examiner_faculty_lists = AdmQuestion::AdmissionExaminerList($question->relBatchAdmtestSubject->batch_id);

        return View::make('admission::amw.adm_question.edit_question',
            compact('question','batch_admtest_subject','examiner_faculty_lists'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function updateAdmTestQuestionPaper($id)
    {
        $data = Input::all();

        $model = AdmQuestion::find($id);
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "Successfully Updated Admission Test Question $name!");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Admission Test Question $name! not updates. Invalid Request !");
            }
         return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }


    }

    /**
     * @param $q_id :: question id
     * @return mixed
     */
    public function viewQuestionsByPaper($q_id)
    {
        $question_subject = AdmQuestion::with('relBatchAdmtestSubject')->where('id', $q_id)->first();
        $question_items = AdmQuestionItems::where('adm_question_id', $q_id)->get();
        return View::make('admission::amw.adm_question.view_question_items',
            compact('question_items', 'question_subject'));
    }

    /**
     * @param $q_items_id :: question item id
     * @return mixed
     */
    public function viewQuestionItemDetails($q_items_id)
    {
        $question_item = AdmQuestionItems::where('id', $q_items_id)->first();
        $question_item_details = AdmQuestionOptAns::where('adm_question_items_id', $q_items_id)->get();
        return View::make('admission::amw.adm_question.view_question_item_details',
            compact('question_item', 'question_item_details'));
    }

    /**
     * @param $q_id :: question ID
     * @return mixed
     */
    public function assignFacultyByQuestion($q_id)
    {
        $question_data = AdmQuestion::with('relBatchAdmtestSubject')->where('id', $q_id)->first();

        $examiner_faculty_lists = AdmQuestion::AdmissionExaminerList($question_data->relBatchAdmtestSubject->batch_id);

        $comments = AdmQuestionComments::where('adm_question_id', $q_id)->get();

        return View::make('admission::amw.adm_question.assign_faculty_by_question_comnnets',
            compact('question_data', 'examiner_faculty_lists', 'comments','q_id'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function assignFacultyCommentsByQuestion($id)
    {
        $info = Input::all();

        $model1 = AdmQuestion::findOrFail($id);
        $model1->status = 'assigned';
        $model1->s_faculty_user_id = Input::get('commented_to');
        $model1->e_faculty_user_id = Input::get('commented_to');
        $model1->save();

        $model = new AdmQuestionComments();
        $model->adm_question_id = $info['adm_question_id'];
        $model->comment = $info['comment'];
        $model->commented_to = $info['commented_to'];
        $model->commented_by = Auth::user()->get()->id;

        if ($model->save()) {
            Session::flash('message', 'Faculty Assigned and Comments added');
            return Redirect::back();
        } else {
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()->with('errors', 'invalid');
        }

        return Redirect::back();
    }



    public function reAssignFaculty($q_id)
    {
        $question_data = AdmQuestion::with('relBatchAdmtestSubject')->where('id', $q_id)->first();

        $examiner_faculty_lists = AdmQuestion::AdmissionExaminerList($question_data->relBatchAdmtestSubject->batch_id);

        $comments = AdmQuestionComments::where('adm_question_id', $q_id)->get();

        return View::make('admission::amw.adm_question.re_assign_faculty_by_question_comnnets',
            compact('question_data', 'examiner_faculty_lists', 'comments','q_id'));
    }

    public function reAssignFacultyCommentsByQuestion($id)
    {
        $info = Input::all();

        $model1 = AdmQuestion::findOrFail($id);
        $model1->status = 'assigned';
        $model1->s_faculty_user_id = Input::get('commented_to');
        $model1->e_faculty_user_id = Input::get('commented_to');
        $model1->save();

        $model = new AdmQuestionComments();
        $model->adm_question_id = $info['adm_question_id'];
        $model->comment = $info['comment'];
        $model->commented_to = $info['commented_to'];
        $model->commented_by = Auth::user()->get()->id;

        if ($model->save()) {
            Session::flash('message', 'Faculty Re-assigned and Comments added');
            return Redirect::back();
        } else {
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()->with('errors', 'invalid');
        }

        return Redirect::back();
    }

    public function batchDeleteQuestionPaper()
    {
        try {
            AdmQuestion::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }


    }




//..................................................Admission Test : Question Evaluation .......................................

    public function questionPaperEvaluation($bats_id)
    {
        $data = BatchAdmtestSubject::where('id', $bats_id)->first();
        $adm_question = AdmQuestion::where('batch_admtest_subject_id', $bats_id)->get();
        return View::make('admission::amw.qpe.index', compact('data', 'adm_question'));
    }

    public function studentListOfQpe($adm_question_id)
    {
        $data = AdmQuestion::where('id', $adm_question_id)->first();
        $adm_question_evaluation = AdmQuestionEvaluation::where('adm_question_id', $adm_question_id)->get();
        return View::make('admission::amw.qpe.student_list_eqp', compact('data', 'adm_question_evaluation'));
    }

    /**
     * @param $ba_id :: Batch Applicant ID
     * @param $question_id  :: Adm_Question_Id
     * @param $q_items_id :: Adm_question_items_id
     * @return mixed
     */
    public function viewDetailsOfQpe($ba_id, $question_id, $q_items_id)
    {
        $data = AdmQuestion::where('id', $question_id)->first();
        $question_item_details = AdmQuestionEvaluation::with('relAdmQuestionItems')
            ->where('adm_question_items_id', $q_items_id)->get();
        return View::make('admission::amw.qpe.view_eqp_details', compact('data', 'question_item_details'));
    }

//{-----------Version: 2 (Tanin) -----------------------------------------------------------------}

    /*
     {------------------- Version:2 ->Admission--> Degree ------------------------------------}
     */
    public function admDegreeIndex(){
        $model = Degree::with('relDegreeLevel','relDegreeProgram')->orderby('id','DESC')->paginate(10);

        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        return View::make('admission::amw.degree.degree.index',
            compact('model','department'));
    }

    public function admDegreeCreate()
    {
        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        $degree_program = array('' => 'Select Degree Program ') + DegreeProgram::lists('title', 'id');
        $degree_group = array('' => 'Select Degree Group ') + DegreeGroup::lists('title', 'id');
        $degree_level = array('' => 'Select Degree Level ') + DegreeLevel::lists('title', 'id');
        return View::make('admission::amw.degree.degree._form',
            compact('department','degree_program','degree_group','degree_level'));
    }

    public function admDegreeStore()
    {
        $data = Input::all();

        $model = new Degree();
        $model->degree_level_id = Input::get('degree_level_id');
        $model->degree_group_id = Input::get('degree_group_id');
        $model->degree_program_id = Input::get('degree_program_id');
        $nameL = $model->relDegreeLevel->code;
        $nameG = $model->relDegreeGroup->code;
        $nameP = $model->relDegreeProgram->code;
        if ($model->validate($data)) {
            DB::beginTransaction();
            try {
                $model->create($data);
                DB::commit();
                Session::flash('message', "Successfully Added $nameL $nameG In $nameP  Degree!");
            } catch (Exception $e) {
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Degree not added.Invalid Request!");
            }
        }
        else {
        $errors = $model->errors();
        Session::flash('errors', $errors);
        return Redirect::back()->with('errors', 'invalid');
        }
        return Redirect::back();
    }

    public function admDegreeShow($id)
    {
        $model = Degree::find($id);
        return View::make('admission::amw.degree.degree.degree_show',compact('model'));
    }

    public function admDegreeEdit($id)
    {
        $model = Degree::find($id);
        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        $degree_program = array('' => 'Select Department ') + DegreeProgram::lists('title', 'id');
        $degree_group = array('' => 'Select Department ') + DegreeGroup::lists('title', 'id');
        $degree_level = array('' => 'Select Degree Level ') + DegreeLevel::lists('title', 'id');
        return View::make('admission::amw.degree.degree.degree_edit',
            compact('model','department','degree_program','degree_group','degree_level'));
    }

    public function admDegreeUpdate($id)
    {
        $model = Degree::find($id);

        $model->degree_level_id = Input::get('degree_level_id');
        $model->degree_group_id = Input::get('degree_group_id');
        $model->degree_program_id = Input::get('degree_program_id');
        $nameL = $model->relDegreeLevel->code;
        $nameG = $model->relDegreeGroup->code;
        $nameP = $model->relDegreeProgram->code;
        $data = Input::all();

        if($model->validate($data)){
            DB::beginTransaction();
            try {
                $model->update($data);
                Session::flash('message',"Successfully Updated $nameL$nameG In $nameP  Degree!");

                DB::commit();
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Degree not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }

    }

    public function admDegreeDelete($id)
    {
        try {
            Degree::find($id)->delete();
            return Redirect::back()
                ->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
            return Redirect::back()
                ->with('message', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }

    }

    public function admDegreeBatchDelete()
    {
        try {
            Degree::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }



    public function admDegreeSearch()
    {
        $searchQuery = $department_id = Input::get('search_department');
        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        if($searchQuery){
            $model = Degree::with(['relDepartment'])->where('department_id', '=', $searchQuery)->paginate(5);
            return View::make('admission::amw.degree.degree.index',
                compact('model','department'));
        }else{
            return Redirect::to('admission/amw/degree');
        }
    }
    //{----------------- Waiver ----------------------------------------------------------------}

    //TODO : Add Billing Details.............

    public function admWaiverIndex()
    {
        $waiver_model =Waiver::latest('id')->paginate(15);
        return View::make('admission::amw.waiver.index',
            compact('waiver_model'));

    }
    public function admWaiverCreate()
    {
        //$billing_item = BillingDetails::BillingItem();
        return View::make('admission::amw.waiver.waiver_modals._form');
    }

    public function admWaiverStore()
    {
        $data = Input::all();
        $model = new Waiver();
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {

                $model->title = Input::get('title');
                $name = $model->title;
                $model->create($data);
                DB::commit();
                Session::flash('message', "$name Waiver  Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Waiver not added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    public function admWaiverShow($id)
    {
        $waiver_model = Waiver::find($id);
        return View::make('admission::amw.waiver.waiver_modals.show',compact('waiver_model'));
    }

    public function  admWaiverEdit($id)
    {
        $waiver_model = Waiver::findOrFail($id);
        return View::make('admission::amw.waiver.waiver_modals.edit',
            compact('model','batch','waiver_model'));
    }

    public function admWaiverUpdate($id)
    {
        $data = Input::all();
        $model = Waiver::find($id);
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "$name Waiver Updates");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Waiver not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }

    public function admWaiverDelete($id)
    {
        try {
            Waiver::find($id)->delete();
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }


//{------------------------------------ Batch Waiver --------------------------------------------------------------------------}

    /**
     * @param $batch_id
     * @return mixed
     */
     public function batchWaiverIndex($batch_id){

        $model = Batch::find($batch_id);
        $batch_info = Batch::with('relDegree.relDegreeGroup','relDegree.relDegreeProgram','relDegree.relDegreeLevel','relYear','relSemester','relDegree')
            ->where('id', '=', $batch_id)
            ->first();

        $waiver_info = BatchWaiver::with('relWaiver', 'relWaiverConstraint')->where('batch_id','=',$batch_id)->get();

        return View::make('admission::amw.batch_waiver.index',
            compact('model','batch_info','waiver_info'));
    }

    /**
     * @param $batch_id
     * @return mixed
     */
    public function batchWaiverCreate($batch_id)
    {
        $waiverList = array('' => 'Select Waiver Item ') + Waiver::lists('title','id');
        return View::make('admission::amw.batch_waiver.waiver_form',
            compact('waiverList','batch_id'));

    }

    /**
     * @return mixed
     */
    public function batchWaiverStore()
    {
        DB::beginTransaction();
        try {
            $model = new BatchWaiver();
            $model->batch_id = Input::get('batch_id');
            $model->waiver_id = Input::get('waiver_id');
            $name = $model->relWaiver->title;
            $model->save();
            DB::commit();
            Session::flash('message', "Successfully added $name!");
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('danger', "$name already exists! ");
        }
        return Redirect::back();
    }

    /**
     * @param $bw_id
     * @return mixed
     */
    public function batchWaiverDelete($bw_id)
    {
        try {
            $data= BatchWaiver::find($bw_id);
            $name = $data->relWaiver->title;
            if($data->delete())
            {
                Session::flash('message', "Successfully deleted $name!");
                return Redirect::back();
            }
        }
        catch(exception $ex){
            return Redirect::back()->with('danger', 'Invalid Request. Delete Constraint Data First. !!!');
        }
    }

//{----------------------------------Waiver Constraint---------------------------------------------------------------------}

    /**
     * @param $batch_id
     * @param $bw_id
     * @return mixed
     */
    public function waiverConstraintIndex($batch_id, $bw_id){

        $batchWaiver = BatchWaiver::with('relWaiver')->where('id', '=', $bw_id)->first();
        $timeDependent = WaiverConstraint::where('batch_waiver_id','=',$bw_id)->where('is_time_dependent','=', 1)->get();
        $gpaDependent = WaiverConstraint::where('batch_waiver_id','=',$bw_id)->where('is_time_dependent','=', 0)->get();
        //print_r($waiverConstraint);exit;
        return View::make('admission::amw.waiver_constraint.index', compact('bw_id', 'batchWaiver','timeDependent', 'gpaDependent'));
    }

    public function waiverTimeConstCreate($batch_waiver_id){

        return View::make('admission::amw.waiver_constraint.add_time_constraint',
            compact('batch_waiver_id'));
    }

    public function waiverGpaConstCreate($batch_waiver_id){

        return View::make('admission::amw.waiver_constraint.add_gpa_constraint',
            compact('batch_waiver_id'));
    }


    public function waiverConstraintStore()
    {
        $data = Input::all();

        $model = new WaiverConstraint();
        $model->start_date = Input::get('start_date');
        $model->end_date = Input::get('end_date');
        $namestart = $model->start_date;
        $nameend = $model->end_date;
        $model->level_of_education = Input::get('level_of_education');
        $model->gpa = Input::get('gpa');
        $lavelOfEdu = $model->level_of_education;
        $gpa = $model->gpa;
        if($model->validate($data)){
            DB::beginTransaction();
            try {
                 $model->create($data);
                 if($namestart != null)
                 {
                    Session::flash('message',"Successfully Added StartDate: $namestart and EndDate: $nameend !");
                 }else{
                    Session::flash('message',"Successfully Added Level of Education: $lavelOfEdu and GPA: $gpa !");
                 }
                DB::commit();
            }catch ( Exception $e ) {
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Level of Education  not added.Invalid Request!");
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
        return Redirect::back();

    }

    public function waiverTimeConstEdit($id){

        $timeDependent = WaiverConstraint::find($id);

        return View::make('admission::amw.waiver_constraint.edit_time_constraint',
            compact('timeDependent'));

    }

    public function waiverGpaConstEdit($id){

        $gpaDependent = WaiverConstraint::find($id);

        return View::make('admission::amw.waiver_constraint.edit_gpa_constraint',
            compact('gpaDependent'));

    }

    public function waiverConstUpdate($id)
    {
            $const_model = WaiverConstraint::find($id);
            $const_model->start_date = Input::get('start_date');
            $const_model->end_date = Input::get('end_date');
            $namestart = $const_model->start_date;
            $nameend = $const_model->end_date;
            $const_model->level_of_education = Input::get('level_of_education');
            $const_model->gpa = Input::get('gpa');
            $lavelOfEdu = $const_model->level_of_education;
            $gpa = $const_model->gpa;
            $data = Input::all();
            $const_model->fill($data);
            if ($const_model->update($data)) {
                DB::beginTransaction();
                try {
                    $const_model->update($data);
                    if($namestart != null)
                    {
                        Session::flash('message',"Successfully Updated StartDate: $namestart and EndDate: $nameend !");
                    }else{
                        Session::flash('message',"Successfully Updated Level of Education: $lavelOfEdu and GPA: $gpa !");
                    }
                    DB::commit();
                }catch ( Exception $e ) {
                    //If there are any exceptions, rollback the transaction
                    DB::rollback();
                    Session::flash('danger', "Level of Education  not added.Invalid Request!");
                }
            }else{
                $errors = $const_model->errors();
                Session::flash('errors', $errors);
                return Redirect::back();
            }
            return Redirect::back();
    }

    public function waiverConstDelete($id)
    {
        try {
            $data= WaiverConstraint::find($id);
            $nameL = $data->level_of_education;
            $nameS = $data->start_date;
            if($data->delete())
            {
                if($nameL != null){
                    Session::flash('message', "Successfully Deleted $nameL !");
                }
                else{
                    Session::flash('message', "Successfully Deleted $nameS !");
                }

                return Redirect::back();
            }
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }

    }

//{--------------------------------- Batch Education Constraint -------------------------------------------------------------------------------------}

    public function admBatchEduConstIndex(){
        $model = BatchEducationConstraint::latest('id')->paginate(5);

        return View::make('admission::amw.batch_edu_const.index',
            compact('model'));
    }
    public function admBatchEduConstCreate()
    {
        $batch = array('' => 'Select Batch ') + Batch::lists('batch_number','id');
        return View::make('admission::amw.batch_edu_const.edu_const_form',
            compact('batch'));
    }

    public function admBatchEduConstStore()
    {
        $data = Input::all();
        $model = new BatchEducationConstraint();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->create($data);
                DB::commit();
                Session::flash('message', "$name Batch Education Constraint Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Batch Education Constraint not added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    public function admBatchEduConstShow($id)
    {
        $model = BatchEducationConstraint::find($id);
        return View::make('admission::amw.batch_edu_const.edu_const_show',compact('model'));
    }

    public function  admBatchEduConstEdit($id)
    {
        $model = BatchEducationConstraint::findOrFail($id);
        $batch = array('' => 'Select Batch ') + Batch::lists('batch_number','id');
        return View::make('admission::amw.batch_edu_const.edu_const_edit',
            compact('model','batch'));
    }

    public function admBatchEduConstUpdate($id)
    {
        $data = Input::all();
        $model = BatchEducationConstraint::find($id);
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "$name Batch Education Constraint Updates");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Batch Education Constraint not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }

    public function admBatchEduConstDelete($id)
    {
        try {
            BatchEducationConstraint::find($id)->delete();
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

// {-----------------  Batch Applicant    ----------------------------------------------------------------------}

    public function batchApplicantIndex($batch_id){
        $model = new BatchApplicant();

        //view info according to batch(admission on)
        $batchApt = Batch::with('relDegree.relDegreeGroup','relDegree.relDegreeProgram','relDegree.relDepartment','relYear','relSemester')
            ->where('id', '=', $batch_id)
            ->first();
        $status =  $model->getStatus();
        if($this->isPostRequest()){
            $chk_status = Input::get('status');
            if($chk_status != null){
                $apt_data = BatchApplicant::with('relBatch','relApplicant','relBatch.relSemester');
                $apt_data = $apt_data->where('batch_id','=', $batch_id);
                $apt_data = $apt_data->where('status','=', $chk_status);
                $apt_data = $apt_data->get();
            }else{
                $apt_data = BatchApplicant::with('relBatch','relApplicant','relBatch.relSemester')
                    ->where('batch_id','=',$batch_id)->get();
            }
        }else{
            $apt_data = BatchApplicant::with('relBatch','relApplicant','relBatch.relSemester')
                ->where('batch_id','=',$batch_id)->get();
        }
        return View::make('admission::amw.batch_applicant.index',
            compact('batch_id', 'batchApt','apt_data', 'status','chk_status'));

    }

    public function batchApplicantChangeStatus($id){

        $model = BatchApplicant::findOrFail($id);
        $status = $model->getStatus();
        return View::make('admission::amw.batch_applicant.status',compact('status','model'));

    }

    public function  batchApplicantUpdateStatus($applicant_id){

        $model = BatchApplicant::find($applicant_id);
        $data = Input::all();
        $model->status = Input::get('status');
        $name = $model->status;

        if($model->validate($data)){
            if($model->update($data)){
                Session::flash('message',"Successfully Updated Status: $name!");
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }
    public function batchApplicantApply($id){

        $ids = Input::get('ids');
        $status = Input::get('status');
        if($ids == null){
            Session::flash('error',"You didn't select any applicant ! Please check at least one applicant !");
        }else{
            foreach($ids as $key => $value) {
                $model = BatchApplicant::findOrFail($value);
                $model->status = $status;
                $model->save();
            }
            Session::flash('message','Successfully Updated applicant Status!');
        }
        return Redirect::back();
    }


    public function batchApplicantView($id,$batch_id,$applicant_id){
        $model = BatchApplicant::findOrFail($id);
        $status = $model->getStatus();

        $applicant_account_info = Applicant::where('id','=',$applicant_id)->first();
        $applicant_profile_info = ApplicantProfile::with('relCountry')->where('applicant_id', '=',$applicant_id )->first();
        $applicant_acm_records =  ApplicantAcademicRecords::where('applicant_id','=',$applicant_id)->get();
        $applicant_meta_records = ApplicantMeta::where('applicant_id', '=',$applicant_id )->first();
        $applicant_extra_curr_activities = ApplicantExtraCurrActivity::where('applicant_id','=',$applicant_id)->get();
        $supporting_docs = ApplicantSupportingDoc::where('applicant_id','=',$applicant_id)->first();
        $miscellaneous_info = ApplicantMiscInfo::where('applicant_id','=',$applicant_id)->first();

        if($applicant_account_info == Null){
            Session::flash('info', "Applicant's Account information is missing !");
        }
        if($applicant_profile_info == Null) {
            Session::flash('info', "Applicant's Profile information is missing !");
        }
        if($applicant_meta_records == Null){
            Session::flash('danger', "Applicant's Biographical information is missing !");
        }
        if(count($applicant_acm_records)< 2) {
            Session::flash('error', "Academic Records are incomplete !");
        }
        if(count($applicant_extra_curr_activities)< 1) {
            Session::flash('info', "Applicant's Extra Curricular Activities Do Not Added !");
        }

        return View::make('admission::amw.batch_applicant.view_applicant_info',
            compact('applicant_id','batch_id','applicant_account_info', 'applicant_profile_info',
                'applicant_acm_records','applicant_meta_records','applicant_extra_curr_activities',
                'supporting_docs','miscellaneous_info','status','model'));
    }

}