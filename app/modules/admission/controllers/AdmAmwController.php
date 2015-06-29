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
        $degree = AdmVDegree::where('id', $id)->first();

        $deg_course_info = DegreeCourse::with('relCourse','relCourse.relSubject.relDepartment','relCourse.relCourseType')
            ->where('degree_id', '=' ,$id)
            ->paginate(10);

        // Show at drop down which courses are not at added course list
        $edc = array();
        foreach($deg_course_info as $dci){
            $edc[] =$dci->relCourse->id;
        }
        $course_list = Course::whereNotIn('id',$edc)->lists('title', 'id');

        return View::make('admission::amw.degree_courses.index',compact('course_list','deg_course_info','degree'));
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
                if($degree_course->save()){
                    Session::flash('message', "Degree Course is added.");
                }else{

                    Session::flash('message', "Degree Course is not added");
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
        $batch = Batch::with('relVDegree')->where('id', '=', $batch_id)->first();
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
        $batch = Batch::with('relVDegree', 'relYear', 'relSemester')->where('degree_id', '=', $degree_id)->latest('id')->paginate(10);

        return View::make('admission::amw.batch.index',
            compact('batch', 'degree_id'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function batchShow($id)
    {
        $batch = Batch::with('relVDegree', 'relYear', 'relSemester')->find($id);
        return View::make('admission::amw.batch.view',compact('batch'));
    }

    /**
     * @param $degree_id
     * @return mixed
     */
    public function batchCreate($degree_id)
    {
        $batch_number = Batch::where('degree_id','=',$degree_id)->count();
        $degree = AdmVDegree::find($degree_id);
        $dpg_list = array('' => 'Select Degree Program ') + Degree::DegreeProgramGroup();
        $semester_list = array('' => 'Select Semester ') + Semester::lists('title', 'id');
        $time = date('Y-m-d h:i:s', time());
        $year_list = array('' => 'Select Year ') + Year::lists('title', 'id');
        $current_year = Year::where('title', Date('Y'))->first()->id;

        return View::make('admission::amw.batch._form',compact(
            'degree_id', 'dpg_list', 'year_list', 'semester_list', 'batch_number', 'degree', 'time', 'current_year'
        ));
    }

    /**
     * @return mixed
     */
    public function batchStore()
    {
        $data = Input::all();
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
            return Redirect::back()->with('errors', 'invalid');
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function batchEdit($id)
    {
        $batch = Batch::with('relVDegree')->find($id);
        //$degree = AdmVDegree::find($batch->degree_id);
        $dpg_list = array('' => 'Select Degree Program') + Degree::DegreeProgramGroup();
        $year_list = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_list = array('' => 'Select Semester ') + Semester::lists('title', 'id');

        return View::make('admission::amw.batch.edit',compact('batch','dpg_list','year_list','semester_list'));
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
        $batch_test_subject = BatchAdmtestSubject::where('batch_id' ,'=', $batch_id)->get();
        $batch = Batch::with('relVDegree')->find($batch_id);
        return View::make('admission::amw.batch_adm_test_subject.index',
            compact('batch_test_subject','batch'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function viewBatchAdmTestSubject($id, $batch_id)
    {
        $adm_test_subject = BatchAdmtestSubject::with('relAdmTestSubject')->find($id);
        $batch = Batch::with('relVDegree')->find($batch_id);
        return View::make('admission::amw.batch_adm_test_subject.view',compact('adm_test_subject', 'batch'));
    }

    /**
     * @param $batch_id
     * @return mixed
     */
    public function createBatchAdmTestSubject($batch_id)
    {
        $subject_id_result = AdmTestSubject::lists('title', 'id');
        $batch = Batch::with('relVDegree', 'relSemester', 'relYear')->find($batch_id);

        return View::make('admission::amw.batch_adm_test_subject._form',compact('batch_id','subject_id_result', 'batch'));
    }

    /**
     * @return mixed
     */
    public function storeBatchAdmTestSubject()
    {
        $data = Input::all();

        DB::beginTransaction();
        try {
            $degree_course = new BatchAdmtestSubject();
            $degree_course->create($data);
            DB::commit();
            Session::flash('message', 'Successfully Added ! ');
        }
        catch ( Exception $e ){
            //If there are any exceptions, rollback the transaction
            DB::rollback();
            Session::flash('danger', " is not added.Invalid Request !");
        }
        return Redirect::back();
    }

    /**
     * @param $id
     * @param $batch_id
     * @return mixed
     */
    public function editBatchAdmTestSubject($id, $batch_id)
    {
        $batch_admtest_subject = BatchAdmtestSubject::findOrFail($id);
        $batch = Batch::with('relVDegree', 'relSemester', 'relYear')->find($batch_id);
        $subject_id_result = AdmTestSubject::lists('title', 'id');

        return View::make('admission::amw.batch_adm_test_subject.edit',compact('batch','batch_admtest_subject','subject_id_result'));
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

            $admission_test_home = BatchAdmtestSubject::join('batch', function ($query) use ($year_id, $semester_id) {
                $query->on('batch.id', '=', 'batch_admtest_subject.batch_id');
                $query->where('batch.year_id', '=', $year_id);
                $query->where('batch.semester_id', '=', $semester_id);
            })->groupBy('batch_id')->paginate(10);
        }else{
            $admission_test_home = BatchAdmtestSubject::with('relBatch','relBatch.relDegree',
                'relBatch.relDegree.relDepartment','relBatch.relYear','relBatch.relSemester')->groupBy('batch_id')->get();
        }

        $year_id = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_id = array('' => 'Select Semester ') + Semester::lists('title', 'id');

        // To use the old values effective use the following line before  return view::make
        Input::flash();

        return View::make('admission::amw.adm_test_home.index',
            compact('admission_test_home','year_id','semester_id'));
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
    public function admExaminerIndex($batch_id)
    {
        $adm_test_examiner = AdmExaminer::with('relUser', 'relUser.relUserProfile')->latest('id')->where('batch_id', $batch_id)->paginate(10);

        $batch_degree = Batch::with('relVDegree', 'relSemester', 'relYear')
            ->where('id', $batch_id )->first();

        return View::make('admission::amw.adm_examiner.index',
            compact('adm_test_examiner','batch_degree'));
    }

    /**
     * @param $year_id
     * @param $semester_id
     * @param $batch_id
     * @return mixed
     */
    public function addAdmTestExaminer($year_id, $semester_id, $batch_id)
    {
        $batch = Batch::with('relVDegree')
            ->where('id', '=', $batch_id)
            ->where('year_id', '=', $year_id)
            ->where('semester_id', '=', $semester_id)
            ->first();
        $degree_id = $batch->relVdegree->id;

        return View::make('admission::amw.adm_examiner._form',compact('batch','degree_id','batch_id'));
    }

    /**
     * @return mixed
     */
    public function storeAdmTestExaminer()
    {
        $data = Input::all();
        $count = DB::select('select count(id) as cnt from adm_examiner where user_id = ? and batch_id = ?', array(Input::get('user_id'), Input::get('batch_id')));
        if($count[0]->cnt > 0){

            return Redirect::back()
                ->with('error', 'This user is already in the examiner list. If you want to change the type, edit it from comments section.');
        }
        //Else save the new entry.
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
                $name = User::FullName(Input::get('user_id'));
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
        /**
         * TODO:: Needs to create a view for this.
         */
        $data = AdmExaminer::with('relUser', 'relUser.relUserProfile', 'relBatch','relBatch.relVDegree', 'relBatch.relAdmExaminerComments',
            'relBatch.relAdmExaminerComments.relCommentedToUser', 'relBatch.relAdmExaminerComments.relCommentedByUser',
            'relBatch.relAdmExaminerComments.relCommentedToUser.relUserProfile', 'relBatch.relAdmExaminerComments.relCommentedByUser.relUserProfile',
            'relBatch.relAdmExaminerComments.relCommentedToUser.relRole', 'relBatch.relAdmExaminerComments.relCommentedByUser.relRole')
            ->where('id', $batch_id)->first();

        Input::flash();

        return View::make('admission::amw.adm_examiner.view',
            compact('data'));
    }

    /**
     * @return mixed
     */
    public function admTestExaminersComments()
    {
        $data = Input::all();

        // Now it can change type as AMW may wants to change the examiner type.
        $examiner = AdmExaminer::find($data['id']);
        $examiner->update($data);

        // Save comments as usual
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
    public function admQuestionIndex($batch_id)
    {
        $batch = Batch::with('relVDegree', 'relYear')->where('id', '=', $batch_id)->first();

        $adm_question = AdmQuestion::with('relBatchAdmtestSubject', 'relSUser.relUserProfile', 'relEUser.relUserProfile',
            'relBatchAdmtestSubject.relBatch', 'relBatchAdmtestSubject.relAdmtestSubject')
            ->whereExists(function($query) use($batch_id)
            {
                $query->from('batch_admtest_subject')
                    ->whereRaw('batch_admtest_subject.id = adm_question.batch_admtest_subject_id')
                    ->where('batch_admtest_subject.batch_id', $batch_id);
            })
            ->latest('id')->paginate(10);

        return View::make('admission::amw.adm_question.index', compact('adm_question', 'batch', 'bats_id'));
    }

    /**
     * @param $bats_id
     * @return mixed
     */
    public function createAdmTestQuestionPaper($batch_id)
    {
        $batch = Batch::with('relVDegree', 'relYear', 'relSemester')->where('id', '=', $batch_id)->first();
        $admtest_subject = BatchAdmtestSubject::AdmissionTestSubjectByBatchId($batch_id);
        $examiner_faculty_lists = AdmQuestion::AdmissionExaminerList($batch_id);

        return View::make('admission::amw.adm_question._form',
            compact('batch','admtest_subject', 'examiner_faculty_lists'));
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
        $view_questions = AdmQuestion::with('relBatchAdmtestSubject', 'relSUser.relUserProfile', 'relEUser.relUserProfile',
            'relBatchAdmtestSubject.relBatch', 'relBatchAdmtestSubject.relBatch.relDegree')
            ->where('id', $id)->first();
        $batch = Batch::with('relVDegree', 'relYear')->where('id', '=', $view_questions->relBatchAdmtestSubject->batch_id)->first();

        return View::make('admission::amw.adm_question.view_question',compact('view_questions', 'batch'));
    }


    /**
     * @param $id
     * @return mixed
     */
    public function editAdmTestQuestionPaper($id)
    {
        $question = AdmQuestion::with('relBatchAdmtestSubject', 'relBatchAdmtestSubject.relBatch', 'relBatchAdmtestSubject.relBatch.relDegree')
            ->where('id', $id)->first();

        $batch_admtest_subject = BatchAdmtestSubject::BatchAdmissionTestSubjectLists($question->relBatchAdmtestSubject->relBatch->id);
        $examiner_setter_lists = AdmQuestion::ExaminerList($question->relBatchAdmtestSubject->relBatch->id, 'question-setter');
        $examiner_evaluator_lists = AdmQuestion::ExaminerList($question->relBatchAdmtestSubject->relBatch->id, 'question-evaluator');

        $batch = Batch::with('relVDegree', 'relYear')->where('id', '=', $question->relBatchAdmtestSubject->batch_id)->first();

        Input::flash();
        return View::make('admission::amw.adm_question.edit',
            compact('question','batch_admtest_subject','examiner_setter_lists', 'examiner_evaluator_lists', 'batch'));
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
                //Check previous status and if status is changed to Selected then ensure that other questions of same subject
                //status must not be "Selected"
                if($model->status != $data['status'] and $data['status'] == 'selected'){
                    DB::table('adm_question')
                        ->where('batch_admtest_subject_id', $data['batch_admtest_subject_id'])
                        ->where('status', 'selected')
                        ->update(array('status' => 'open'));
                }

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

    public function AssignFacultySetter($q_id)
    {
        $question_data = AdmQuestion::with('relBatchAdmtestSubject')->where('id', $q_id)->first();

        $examiner_faculty_lists = AdmQuestion::AdmissionExaminerList($question_data->relBatchAdmtestSubject->batch_id);

        $comments = AdmQuestionComments::with('relToUser', 'relToUser.relUserProfile', 'relToUser.relRole', 'relByUser',
            'relByUser.relUserProfile', 'relByUser.relRole')
            ->where('adm_question_id', $q_id)->get();

        $batch = Batch::with('relVDegree', 'relYear')
            ->where('id', '=', $question_data->relBatchAdmtestSubject->batch_id)
            ->first();

        return View::make('admission::amw.adm_question.assign_faculty_setter',
            compact('question_data', 'examiner_faculty_lists', 'comments','q_id', 'batch'));
    }

    public function AssignFacultyEvaluator($q_id)
    {
        $question_data = AdmQuestion::with('relBatchAdmtestSubject')->where('id', $q_id)->first();

        $examiner_faculty_lists = AdmQuestion::AdmissionExaminerList($question_data->relBatchAdmtestSubject->batch_id);

        $comments = AdmQuestionComments::with('relToUser', 'relToUser.relUserProfile', 'relToUser.relRole', 'relByUser', 'relByUser.relUserProfile', 'relByUser.relRole')->where('adm_question_id', $q_id)->get();

        $batch = Batch::with('relVDegree', 'relYear')->where('id', '=', $question_data->relBatchAdmtestSubject->batch_id)->first();

        return View::make('admission::amw.adm_question.assign_faculty_evaluator',
            compact('question_data', 'examiner_faculty_lists', 'comments','q_id', 'batch'));
    }

    public function reAssignFacultyCommentsByQuestion($id)
    {
        $info = Input::all();

        $model1 = AdmQuestion::findOrFail($id);
        //$model1->status = 'assigned';
        if(Input::get('examiner_type') == 'setter'){
            $model1->s_faculty_user_id = Input::get('commented_to');
            $model1->s_status = Input::get('s_status');
        }else {
            $model1->e_faculty_user_id = Input::get('commented_to');
            $model1->e_status = Input::get('e_status');
        }

        $model1->save();
        if($info['comment']) {
            $model = new AdmQuestionComments();
            $model->adm_question_id = $info['adm_question_id'];
            $model->comment = $info['comment'];
            $model->commented_to = $info['commented_to'];
            $model->commented_by = Auth::user()->get()->id;

            if ($model->save()) {
                Session::flash('message', 'Faculty assigning and Comments added');
                return Redirect::back();
            } else {
                $errors = $model->errors();
                Session::flash('errors', $errors);
                return Redirect::back()->with('errors', 'invalid');
            }
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

    /**
     * @param $batch_id
     * @return mixed
     */
    public function questionPaperEvaluation($batch_id)
    {
        $batch = Batch::with('relVDegree', 'relYear', 'relSemester')->where('id', $batch_id)->first();

        $adm_question = AdmQuestion::with('relBatchAdmtestSubject', 'relSUser.relUserProfile', 'relEUser.relUserProfile',
            'relBatchAdmtestSubject.relBatch', 'relBatchAdmtestSubject.relAdmtestSubject')
            ->whereExists(function($query) use($batch_id)
            {
                $query->from('batch_admtest_subject')
                    ->whereRaw('batch_admtest_subject.id = adm_question.batch_admtest_subject_id')
                    ->where('batch_admtest_subject.batch_id', $batch_id);
            })
            ->where('status', 'selected')
            ->latest('id')->get();
        //print_r($adm_question);exit;
        return View::make('admission::amw.qpe.index', compact('batch', 'adm_question'));
    }

    /**
     * @param $adm_question_id
     * @return mixed
     */
    public function studentListOfQpe($adm_question_id)
    {
        /**
         * TODO: Have to Create view for applicant status and marks calculation.
         */
        $adm_question = AdmQuestion::with('relBatchAdmtestSubject', 'relBatchAdmtestSubject.relAdmtestSubject', 'relBatchAdmtestSubject.relBatch',
            'relBatchAdmtestSubject.relBatch.relVDegree',
            'relBatchAdmtestSubject.relBatch.relYear', 'relBatchAdmtestSubject.relBatch.relSemester')
            ->where('id', $adm_question_id)->first();

        $adm_question_evaluation = AdmQuestionEvaluation::where('adm_question_id', $adm_question_id)
            ->groupby('batch_applicant_id')
            ->get();

        return View::make('admission::amw.qpe.student_eqp', compact('adm_question', 'adm_question_evaluation'));
    }

    /**
     * @author Almas
     * @param $ba_id :: Batch Applicant ID
     * @param $question_id  :: Adm_Question_Id
     * @param $q_items_id :: Adm_question_items_id
     * @return mixed
     */
    public function viewDetailsOfQpe($ba_id, $question_id, $q_items_id)
    {
        $data = AdmQuestion::with('relBatchAdmtestSubject.relAdmtestSubject')->where('id', $question_id)->first();

        $question_items = AdmVQuestionEvaluation::with('relAdmQuestionItems', 'relAdmQuestionOptAns')
            ->where('adm_question_id', $question_id)
            ->where('batch_applicant_id', $ba_id)
            ->get();

        foreach($question_items as $qs){
            $i = 0;
            $qlist[$qs->adm_question_items_id]['question_title']       = $qs->relAdmQuestionItems->title;
            $qlist[$qs->adm_question_items_id]['marks']                 = $qs->marks;
            $qlist[$qs->adm_question_items_id]['type']       = $qs->question_type;
            foreach($qs->relAdmQuestionOptAns as $aqoa){
                $qlist[$qs->adm_question_items_id]['options'][$i]['id']       = $aqoa->id;
                $qlist[$qs->adm_question_items_id]['options'][$i]['title']    = $aqoa->title;
                $qlist[$qs->adm_question_items_id]['options'][$i]['answer']   = $aqoa->answer;
                $i++;
            }
            if($qs->question_type == 'checkbox')
                $qlist[$qs->adm_question_items_id]['answer'][]          = $qs->canswer;
            elseif($qs->question_type == 'radio')
                $qlist[$qs->adm_question_items_id]['answer']            = $qs->ranswer;
            if($qs->question_type == 'text')
                $qlist[$qs->adm_question_items_id]['answer']            = $qs->tanswer;

        }

        $count = DB::table('adm_question_evaluation')
            ->select(DB::raw('count(adm_question_evaluation.id) as total, sum(adm_question_evaluation.marks) as marks'))
            ->join('adm_question_items', 'adm_question_items.id', '=', 'adm_question_evaluation.adm_question_items_id')
            //->where('exm_question_items.question_type', '=','text')
            ->where('adm_question_evaluation.adm_question_id', $question_id)
            ->first();

       return View::make('admission::amw.qpe.view_eqp_details', compact('data', 'qlist', 'count'));
    }

//{-----------Version: 2 (Tanin) -----------------------------------------------------------------}

    /*
     {------------------- Version:2 ->Admission--> Degree ------------------------------------}
     */
    public function admDegreeIndex(){
        $dept_id = Input::get('search_department');

        // Showing from adm_v_degree
        if(isset($dept_id) and $dept_id != '')
            $model = AdmVDegree::where('dept_id', $dept_id)->orderby('id','DESC')->paginate(10);
        else
            $model = AdmVDegree::orderby('id','DESC')->paginate(10);

        $department = array('' => 'Select Department ') + Department::lists('title', 'id');

        Input::flash();

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
        // No need to view from Adm_v_degree as this is single one.
        $model = Degree::with('relDepartment', 'relDegreeProgram', 'relDegreeGroup', 'relDegreeLevel')->find($id);
        return View::make('admission::amw.degree.degree.show',compact('model'));
    }

    public function admDegreeEdit($id)
    {
        $model = Degree::find($id);
        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        $degree_program = array('' => 'Select Department ') + DegreeProgram::lists('title', 'id');
        $degree_group = array('' => 'Select Department ') + DegreeGroup::lists('title', 'id');
        $degree_level = array('' => 'Select Degree Level ') + DegreeLevel::lists('title', 'id');
        return View::make('admission::amw.degree.degree.edit',
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
                ->with('warning', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function admDegreeBatchDelete()
    {
        try {
            Degree::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex) {
            return Redirect::back()->with('warning', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
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
        $namestart = Input::get('start_date');

        $exist_message = '';
        if(isset($namestart) and $namestart != ''){
            $count = DB::select('select count(id) as cnt from waiver_constraint where batch_waiver_id = ? and is_time_dependent=?', array($data['batch_waiver_id'], 1));
            if($count[0]->cnt > 1)
                $exist_message = "Already time constraint is added.";

            $nameend = Input::get('end_date');
        }else{
            $count = DB::select('select count(id) as cnt from waiver_constraint where batch_waiver_id = ? and level_of_education = ? and is_time_dependent=?', array($data['batch_waiver_id'], $data['level_of_education'], 0));
            if($count[0]->cnt > 1)
                $exist_message = $data['level_of_education']." level constraint is added already.";

            $lavelOfEdu = Input::get('level_of_education');
            $gpa = Input::get('gpa');
        }

        if($exist_message){
            Session::flash('info', $exist_message);
            return Redirect::back();
        }
        if($model->validate($data)){
            DB::beginTransaction();
            try {
                $model->create($data);
                if ($namestart != null) {
                    Session::flash('message', "Successfully Added StartDate: $namestart and EndDate: $nameend !");
                } else {
                    Session::flash('message', "Successfully Added Level of Education: $lavelOfEdu and GPA: $gpa !");
                }
                DB::commit();
            }catch ( Exception $e ) {
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Invalid Request! Time constraint or gpa constraint is invalid.");
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
        $batchApt = Batch::with('relDegree.relDegreeGroup','relDegree.relDegreeProgram','relDegree.relDepartment', 'relDegree.relDegreeLevel','relYear','relSemester')
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

        Input::flash();
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
        $status = Input::get('a_status');
        if($ids == null){
            Session::flash('error',"You didn't select any applicant ! Please check at least one applicant !");
        }else{
            // Batch Update query
            BatchApplicant::whereIn("id", $ids)->update(array('status' => $status));
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

        Input::flash();

        return View::make('admission::amw.batch_applicant.view_applicant_info',
            compact('applicant_id','batch_id','applicant_account_info', 'applicant_profile_info',
                'applicant_acm_records','applicant_meta_records','applicant_extra_curr_activities',
                'supporting_docs','miscellaneous_info','status','model'));
    }

    public function examSeat($batch_id){

        $apt_id = BatchApplicant::where('batch_id','=',$batch_id)->first()->applicant_id;
        $data_of_applicant = BatchApplicant::with('relExmCenterApplicantChoice')
            ->where('status', 'CFAT')
            ->where('batch_id', $batch_id)
            ->get();

        $selectedApplicantListWithChoiceList = [];

        foreach($data_of_applicant as $doa){
            $cnt = '';
            foreach($doa->relExmCenterApplicantChoice as $c){
                $cnt[] = $c->exm_center_id;
            }
            $selectedApplicantListWithChoiceList[$doa->id]['personChoiceList'] = $cnt;
        }

        $data_of_center = ExmCenter::get(array('exm_center.id','exm_center.capacity as capacity'));

        $CenterListWithCurrentCapacity = '';
        foreach($data_of_center as $doc){
            $CenterListWithCurrentCapacity[$doc->id]['capacity'] = $doc->capacity;
        }

        foreach( $selectedApplicantListWithChoiceList as $salwcl){
            foreach($salwcl['personChoiceList'] as $pcl){
                if( $CenterListWithCurrentCapacity[$pcl]['capacity'] > 0 ){
//                    $CenterListWithCurrentCapacity[$pcl]['capacity']--;
                    $capacity_list [] = $pcl;
                    // Update batch_applicant
                    $model = BatchApplicant::where('batch_id','=',$batch_id)->where('applicant_id','=',$apt_id)->first();
//                    return $pcl;
                }
            } return $capacity_list;
        }
    }
}