<?php

class AdmAmwController extends \BaseController
{
    function __construct() {
        $this->beforeFilter('admAmw', array('except' => array('index')));
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

        return View::make('admission::amw.degree_management.index',
            compact('degree_model'));
    }

    public function dgmCreate()
    {

        $department = array('' => 'Select Department ') + Department::lists('title', 'id');
        $semester = array('' => 'Select Semester ') + Semester::lists('title', 'id');
        $year = array('' => 'Please Select Year') + Year::lists('title', 'id');
        $degree_program = array('' => 'Please Select ') + DegreeProgram::lists('title', 'id');

        return View::make('admission::amw.degree_management.degree_modals._form',
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
        return View::make('admission::amw.degree_management.degree_modals.show',
            compact('degree_model'));
    }

    public function dgmEdit($id)
    {

        $degree_model = Degree::find($id);
        $year = Year::lists('title', 'id');
        $department = Department::lists('title', 'id');
        $semester = Semester::lists('title', 'id');
        $degree_program = DegreeProgram::lists('title', 'id');
        return View::make('admission::amw.degree_management.degree_modals.edit',
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
        return View::make('admission::amw.degree_management.degree_waiver_index',
            compact('degree_model', 'degree_waiver'));
    }

    public function degreeWaiverCreate($degree_id)
    {
        $waiverList = array('' => 'Select Waiver Item ') + Waiver::lists('title','id');
        return View::make('admission::amw.degree_management.degree_modals.add_degree_waiver',
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

    public function degreeWaiverDelete($id){
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
        return View::make('admission::amw.degree_management.deg_waiver_const',
            compact('degree_model','deg_waiver','deg_waiver_const'));

    }

    public function degWaiverTimeConstCreate($degree_waiver_id){

        return View::make('admission::amw.degree_management.degree_modals.add_time_const',
            compact('degree_waiver_id'));
    }

    public function degWaiverGpaConstCreate($degree_waiver_id){

        return View::make('admission::amw.degree_management.degree_modals.add_gpa_const',
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

    public function degWaiverConstDelete($id){

        WaiverConstraint::find($id)->delete();
        return Redirect::back()
            ->with('message', 'Successfully deleted Information!');
    }
    public function degWaiverTimeConstEdit($id){

        $time_const_model = WaiverConstraint::find($id);

        return View::make('admission::amw.degree_management.degree_modals.edit_time_const',
            compact('time_const_model'));

    }

    public function degWaiverGpaConstEdit($id){

        $gpa_const_model = WaiverConstraint::find($id);

        return View::make('admission::amw.degree_management.degree_modals.edit_gpa_const',
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


//******************************Degree Course start(R)*****************************

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
    public function degree_courses_save()
    {
        $data = Input::all();
        $select = Input::get('course_list');
        $deg_id = Input::get('degree_id');
        foreach($select as $value)
        {
            $degree_course = new DegreeCourse();
            $degree_course ->degree_id =$deg_id;
            $degree_course ->course_id =$value;
            $degreeCourseCheck = DB::table('degree_course')
                ->select(DB::raw('1'))
                ->where('course_id', '=', $degree_course->course_id)
                ->where('degree_id', '=', $degree_course->degree_id)
                ->get();
            if($degreeCourseCheck){
                return Redirect::back()->with('info','The selected Course already added !
                    Please Select One That Is Not Added Yet.');
            }else{
                $degree_course->save();
            }
        }
        return Redirect::back()->with('message', 'Successfully Added Information!');
    }

    public function degree_courses_delete($id)
    {
        try {
            $data= DegreeCourse::find($id);
            if($data->delete())
            {
                return Redirect::back() ->with('message', 'Successfully Deleted Information!');
            }
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }

//******************************Batch Course start(R)*****************************

    public function batch_course_index($batch_id, $deg_id)
    {
        $batch = $batch_id;
        $degree_id = $deg_id;;
        $degree_title = Degree::with('relDegreeCourse')
            ->where('id' , '=' ,$deg_id)
            ->first();
        $year_data = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_data = array('' => 'Select Semester ') + Semester::lists('title','id');

        $deg_course_info = DB::table('degree_course')
            ->leftJoin('batch_course', 'degree_course.course_id', '=', 'batch_course.course_id')
            ->leftjoin('degree', 'degree_course.degree_id', '=', 'degree.id' )
            ->where('degree_course.degree_id', '=', $deg_id)
            ->where('batch_course.course_id', NULL)
            ->select('degree_course.course_id', 'degree_course.degree_id', 'degree.department_id')
            ->get();

        $batch_course_data = DB::table('batch_course')
            ->select(
                'batch_course.id as ID',
                'batch_course.is_mandatory as isMandatory',
                'batch_course.year_id as YearId',
                'year.title as YearTitle',
                'batch_course.semester_id as SemesterId',
                'semester.title as SemesterTitle',
                'batch_course.course_id as CourseId',
                'course.title as CourseTitle',
                'course.course_code as CourseCode',
                'course.credit as CourseCredit',
               // 'course.course_type_id as CourseTypeId',
                'course_type.title as CourseTypeTitle',
                //'course.subject_id as SubjId',
                'subject.department_id as DepartmentId',
                'department.title as DepartmentTitle'
            )
            ->join ('year','batch_course.year_id','=','year.id')
            ->join ('semester','batch_course.semester_id','=','semester.id')
            ->join ('course','batch_course.course_id','=','course.id')
            ->join ('course_type','course.course_type_id','=','course_type.id')
            ->join ('subject','course.subject_id','=','subject.id')
            ->join ('department','subject.department_id','=','department.id')
            ->where('batch_id' , '=' ,$batch_id)
            ->orderBy('YearId', 'ASC')
            ->orderBy('SemesterId', 'ASC')
            // ->groupBy('year_id','semester_id')
            ->get();
        $cd = null;
        foreach($batch_course_data as $bcd){
            $v['ID']               = $bcd->ID    ;
            $v['isMandatory']      = $bcd->isMandatory    ;
            $v['CourseId']         = $bcd->CourseId       ;
            $v['CourseTitle']      = $bcd->CourseTitle    ;
            $v['CourseCode']       = $bcd->CourseCode     ;
            $v['CourseCredit']     = $bcd->CourseCredit   ;
          //  $v['CourseTypeId']     = $bcd->CourseTypeId   ;
            $v['CourseTypeTitle']  = $bcd->CourseTypeTitle;
          //  $v['SubjId']           = $bcd->SubjId         ;
            $v['DepartmentId']     = $bcd->DepartmentId   ;
            $v['DepartmentTitle']  = $bcd->DepartmentTitle;

            $cd[$bcd->YearId]['year'] = $bcd->YearTitle;
            $cd[$bcd->YearId][$bcd->SemesterId]['semester'] = $bcd->SemesterTitle;
            $cd[$bcd->YearId][$bcd->SemesterId][] = $v;
        }

        $batch_course_data = $cd;
        #dd(DB::getQueryLog($batch_course_data));exit;
        #print_r($batch_course_data);exit;
        return View::make('admission::amw.batch_course.index',compact(
            'batch','degree_id','degree_title','deg_course_info','year_data','semester_data','batch_course_data'
        ));

    }
    public function batch_course_save()
    {
        $data = Input::all();
        $model = new BatchCourse();
        if($model->validate($data)){
            if($model->create($data)){
                Session::flash('message','Successfully added Information!');
                return Redirect::back();
            }else{
                Session::flash('danger','Invalid Request!');
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
    }

    public function batch_course_delete($id)
    {
        try {
            $data = BatchCourse::find($id);
            if ($data->delete()) {
                Session::flash('danger', "Items Deleted successfully");
                return Redirect::back();
            }
        } catch
        (exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }
    public function batch_data_save()
    {
        $data = Input::all();
        $course_id = Input::get('id');
        $batch_id = Input::get('batch_id');
        $year_id = Input::get('year_id');
        $semester_id = Input::get('semester_id');
        $major_minor= Input::get('major_minor');
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
        Session::flash('message','Successfully added Information!');
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

    public function assign_faculty_index($course_id,$dep_id)
    {

        $batch_course = BatchCourse::with('relBatch','relBatch.relDegree','relCourse','relYear','relSemester')
            ->where('course_id' , '=' ,$course_id)
            ->get();

        $facultyList =  array('' => 'Select faculty ') +User::FacultyList();
        $cc_status = CourseConduct::where('course_id' , '=' ,$course_id)
            ->first();

        return View::make('admission::amw.batch_course.assign_faculty_index',compact('facultyList','batch_course','cc_status'));
    }

    public function assign_faculty_save()
   {
       $data = Input::all();
       $model = new CourseConduct();
       $model->course_id = Input::get('course_id');
       $model->faculty_user_id = Input::get('faculty_user_id');
       $model->year_id = Input::get('year_id');
       $model->semester_id = Input::get('semester_id');
       $model->degree_id = Input::get('degree_id');
       $model->status = 'requested';
       $model->save();
       $course_conduct_id = $model->id;//to get last inserted id

       if($model->validate($data)){
               $comments = new CourseConductComments();
               $comments->course_conduct_id = $course_conduct_id;
               $comments->comments = Input::get('comments');
               $comments->commented_to = Input::get('faculty_user_id');
               $comments->commented_by = Auth::user()->get()->id;
               $comments->status = 'requested';
               $comments->save();

               Session::flash('message', 'Successfully added Information!');
               return Redirect::back();
       }else{
           $errors = $model->errors();
           Session::flash('errors', $errors);
           return Redirect::back();
       }
   }



//new code of admission module by shafi

//.................................................batch....................................................

    public function batchIndex()
    {
        $batch_management = Batch::latest('id')->paginate(10);

        $dpg_list = Degree::DegreeProgramGroup();
        $year_list = array('' => 'Year ') +Year::lists('title', 'id');
        $department_list = array('' => 'Department ') +Department::lists('title', 'id');

        return View::make('admission::amw.batch.batch_management_index',
            compact('batch_management','dpg_list','year_list','department_list'));
    }

    public function batchShow($id)
    {
        $b_m_course = Batch::find($id);
        return View::make('admission::amw.batch.show',compact('b_m_course'));
    }

    public function batchCreate()
    {
        $dpg_list = Degree::DegreeProgramGroup();

        $year_list = Year::lists('title', 'id');
        $semester_list = Semester::lists('title', 'id');

        return View::make('admission::amw.batch._form',compact('dpg_list','year_list','semester_list'));
    }

    public function batchStore()
    {
        $data = Input::all();

        $model = new Batch();
        if($model->validate($data)){
            if($model->create($data)){
                Session::flash('message', 'Successfully added Information!');
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }

    }

    public function batchEdit($id)
    {
        $batch_edit = Batch::find($id);

        $dpg_list = Degree::DegreeProgramGroup();
        $year_list = Year::lists('title', 'id');
        $semester_list = Semester::lists('title', 'id');

        return View::make('admission::amw.batch.edit',compact('batch_edit','dpg_list','year_list','semester_list'));
    }

    public function batchUpdate($id)
    {
        $model = Batch::find($id);
        $data = Input::all();

        if($model->validate($data)){
            if($model->update($data)){
                Session::flash('message', 'Successfully Updates Information!');
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('error', 'invalid');
        }
    }
//
//    public function destroy($id)
//    {
//        try {
//            Course::find($id)->delete();
//            return Redirect::back()->with('message', 'Successfully deleted Information!');
//        }
//        catch(exception $ex){
//            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
//        }
//
//    }
//
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

    public function indexBatchAdmTestSubject($batch_id)
    {
        $degree_test_sbjct = BatchAdmtestSubject::where('batch_id' ,'=', $batch_id)->get();

        $degree_name = Batch::with('relDegree')
            ->where('id' ,'=', $batch_id)
            ->first();

        return View::make('admission::amw.batch_adm_test_subject.index',
            compact('batch_id','degree_test_sbjct','degree_name'));
    }

    public function viewBatchAdmTestSubject($id)
    {
        $view_adm_test_subject = BatchAdmtestSubject::find($id);

        return View::make('admission::amw.batch_adm_test_subject.view',compact('view_adm_test_subject'));
    }

    public function createBatchAdmTestSubject($batch_id)
    {
//        print_r($batch_id);exit;
        $subject_id_result = AdmTestSubject::lists('title', 'id');

        $degree_name = Batch::with('relDegree')
            ->where('id' ,'=', $batch_id)
            ->first();
//
//        $degree_name = BatchAdmtestSubject::with('relDegree')
//            ->where('batch_id' ,'=', $batch_id)
//            ->first();

        return View::make('admission::amw.batch_adm_test_subject._form',compact('batch_id','degree_name','subject_id_result'));
    }

    public function storeBatchAdmTestSubject()
    {
        $data = Input::all();
//         print_r($data);exit;

        $model = new BatchAdmtestSubject();
//        print_r($data);exit;

        if($model->validate($data)){

            if($model->create($data)){
                Session::flash('message', 'Successfully added Information!');
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }

    }

    public function editBatchAdmTestSubject($batch_id)
    {
        $batch_edit = BatchAdmtestSubject::find($batch_id);

        $degree_name = Batch::with('relDegree')
//            ->where('id' ,'=', $batch_id)
            ->first();

        $subject_id_result = AdmTestSubject::lists('title', 'id');

        return View::make('admission::amw.batch_adm_test_subject.edit',compact('batch_id','degree_name','batch_edit','subject_id_result'));
    }

    public function updateBatchAdmTestSubject($id)
    {
        $model = BatchAdmtestSubject::find($id);
        $data = Input::all();

        if($model->validate($data)){
            if($model->update($data)){
                Session::flash('message', 'Successfully Updates Information!');
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('error', 'invalid');
        }
    }


//.................................................admtest_subject....................................................


    public function indexAdmissionTestSubject()
    {
        $admission_test_subject = AdmTestSubject::orderBy('id', 'DESC')->paginate(10);

        return View::make('admission::amw.adm_test_subject.admtest_subject_index',
            compact('admission_test_subject'));

    }

    public function createAdmissionTestSubject()
    {
        return View::make('admission::amw.adm_test_subject._form');
    }

    public function storeAdmissionTestSubject()
    {
        $data = Input::all();
        $model = new AdmTestSubject();
        if($model->validate($data)){
            if($model->create($data)){
                Session::flash('message', 'Successfully added Information!');
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }

    }

    public function viewAdmissionTestSubject($id)
    {
        $view_admission_test_subject = AdmTestSubject::find($id);
        return View::make('admission::amw.adm_test_subject.view',compact('view_admission_test_subject'));

    }

    public function editAdmissionTestSubject($id)
    {
        $edit_admission_test_subject = AdmTestSubject::find($id);

        return View::make('admission::amw.adm_test_subject.edit',compact('edit_admission_test_subject'));

    }

    public function updateAdmissionTestSubject($id)
    {
        $model = AdmTestSubject::find($id);
        $data = Input::all();

        if($model->validate($data)){
            if($model->update($data)){
                Session::flash('message', 'Successfully Updates Information!');
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('error', 'invalid');
        }
    }

//............................................ Admission Test Management : Home ........................................

    public function admissionTestIndex()
    {
//        $admission_test_batch = BatchAdmtestSubject::latest('id')->get();

        $admission_test_home = BatchAdmtestSubject::with('relBatch','relBatch.relDegree',
            'relBatch.relDegree.relDepartment','relBatch.relYear','relBatch.relSemester')
            ->get();

        $year_id = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_id = array('' => 'Select Semester ') + Semester::lists('title', 'id');

        return View::make('admission::amw.adm_test_home.index',
            compact('admission_test_home','admission_test_batch','year_id','semester_id'));
    }

    public function admissionTestSearchIndex()
    {
        $searchQuery = [
            'year_id' =>   Input::get('year_id'),
            'semester_id' =>   Input::get('semester_id'),
        ];

        $model = new BatchAdmtestSubject();
        $adm_test_home_data = Helpers::search($searchQuery, $model);
        $year_id = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_id = array('' => 'Select Semester ') + Semester::lists('title', 'id');

        return View::make('admission::amw.adm_test_home._search_adm_test_home_index',
            compact('adm_test_home_data','year_id','semester_id'));

    }

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

    public function admExaminerIndex( $year_id, $semester_id, $batch_id)
    {
        $adm_test_examiner = AdmExaminer::latest('id')->paginate(10);

        $degree_id = Batch::where('id' ,'=', $batch_id )
            ->where('semester_id' ,'=', $semester_id)
            ->where('year_id' ,'=', $year_id)
            ->first()->degree_id;

        $degree_data = Degree::with('relDepartment')
            ->where('id','=', $degree_id)
            ->first();

        return View::make('admission::amw.adm_examiner.adm_examiner_index',
            compact('adm_test_examiner','year_id','semester_id','batch_id','degree_id','degree_data'));

    }

    public function addAdmTestExaminer($year_id, $semester_id, $batch_id)
    {
        $degree_id = Batch::where('id' ,'=', $batch_id )
            ->where('semester_id' ,'=', $semester_id)
            ->where('year_id' ,'=', $year_id)
            ->first()->degree_id;

        $degree_data = Degree::with('relDepartment')
            ->where('id','=', $degree_id)
            ->first();

        return View::make('admission::amw.adm_examiner._form',compact('degree_data','degree_id','batch_id'));
    }

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

            $mod_comments = new AdmExaminerComments();
            $mod_comments->batch_id = Input::get('batch_id');
            $mod_comments->comment = Input::get('comment');

            $mod_comments->commented_to = Input::get('user_id');
            $mod_comments->commented_by = Auth::user()->get()->id;
            $mod_comments->status = 1;

            $mod_comments->save();

            Session::flash('message', 'Successfully added Information!');
            return Redirect::back();

        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    public function viewAdmTestExaminers(){
//        $adm_view_examiners = AdmExaminer::where('id' ,'=', $degree_id)->first();
        $data = AdmExaminer::with('relBatch','relBatch.relDegree')->first()->relBatch->relDegree->relDepartment->title;

        return View::make('admission::amw.adm_examiner.view_examiners',
            compact('data','exm_info','exm_comnt_info'));
    }


//..................................................admtest_question.......................................

    public function admQuestionIndex( $year_id, $semester_id, $batch_id)
    {

        $adm_test_question_paper = AdmQuestion::latest('id')->paginate(10);

        $degree_id = Batch::where('id' ,'=', $batch_id )
            ->where('semester_id' ,'=', $semester_id)
            ->where('year_id' ,'=', $year_id)
            ->first()->degree_id;

        $degree_data = Degree::with('relDepartment')
            ->where('id','=', $degree_id)
            ->first();

//        $batch_admtest_subject_id = BatchAdmtestSubject::where('id','=',$batch_id)->first();
//
//        $batch_admtst_sbjct_name = AdmQuestion::with('relBatchAdmTestSubject','relBatchAdmTestSubject.AdmTestSubject')->where('batch_admtest_subject_id','=',$batch_admtest_subject_id)->first();

//        print_r($batch_admtst_sbjct_name);exit;

        return View::make('admission::amw.adm_question.adm_question_index',
            compact('semester_id','year_id','adm_test_question_paper','degree_id','degree_data','batch_id'));
    }


    public function createAdmTestQuestionPaper($year_id, $semester_id, $batch_id)
    {

        $degree_id = Batch::where('id' ,'=', $batch_id )
            ->where('semester_id' ,'=', $semester_id)
            ->where('year_id' ,'=', $year_id)
            ->first()->degree_id;

        $degree_data = Degree::with('relDepartment')
            ->where('id','=', $degree_id)
            ->first();

        // join querrylagbe :: selim vai
        //adm_question.batch_admtest_subject_id with batch_admtest_subject.admtest_subject_id and admtest_subject.title

        $batch_admtest_subject = AdmTestSubject::lists('title','id');

        return View::make('admission::amw.adm_question._form',
            compact('batch_id','year_id','semester_id','degree_id','degree_data','batch_admtest_subject'));
    }


    public function storeAdmTestQuestionPaper()
    {
        $data = Input::all();
        $model = new AdmQuestion();
        if($model->validate($data)){
            if($model->create($data)){
                Session::flash('message', 'Successfully added Information!');
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }

    }


    public function viewAdmTestQuestionPaper($id)
    {
        $view_questions = AdmQuestion::with('relBatchAdmtestSubject', 'relBatchAdmtestSubject.relBatch', 'relBatchAdmtestSubject.relBatch.relDegree')
            ->where('id', $id)->first();

        return View::make('admission::amw.adm_question.view_question',compact(
            'view_questions'));
    }


    public function editAdmTestQuestionPaper($id , $year_id, $semester_id, $batch_id)
    {
        $edit_admtest_question = AdmQuestion::find($id);

        $degree_id = Batch::where('id' ,'=', $batch_id )
            ->where('semester_id' ,'=', $semester_id)
            ->where('year_id' ,'=', $year_id)
            ->first()->degree_id;

        $degree_data = Degree::with('relDepartment')
            ->where('id','=', $degree_id)
            ->first();

        $batch_admtest_subject = AdmTestSubject::lists('title','id');


        return View::make('admission::amw.adm_question.edit_question',
            compact('batch_admtest_subject','edit_admtest_question','year_id','semester_id','batch_id','degree_id','degree_data'));
    }


    public function updateAdmTestQuestionPaper($id)
    {
        $model = AdmQuestion::find($id);
        $data = Input::all();

        if($model->validate($data)){
            if($model->update($data)){
                Session::flash('message', 'Successfully Updates Information!');
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('error', 'invalid');
        }
    }

    public function assignFacutly()
    {

        echo "ei part tuku baki ace // shafi";


    }



//..................................................Admission Test : Question Evaluation .......................................

    public function admQuestionEvaluationIndex()
    {
        return View::make('admission::amw.adm_question_evaluation.adm_question_evaluation_index');
    }




}