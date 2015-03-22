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
                return Redirect::to('admission/amw/degree-course/')
                    ->with('message', 'Successfully Deleted Information!');
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
        $degree_id = Batch::where('id','=', $batch_id)->first()->degree_id;
        $degree_title = Degree::with('relDegreeCourse')
            ->where('id' , '=' ,$deg_id)
            ->first();
        $deg_course_info = DegreeCourse::with('relCourse')
            ->where('degree_id', '=' ,$deg_id)
            ->paginate(10);
        $year_data = array('' => 'Select Year ') + Year::lists('title', 'id');
        $semester_data = array('' => 'Select Semester ') + Semester::lists('title','id');

        return View::make('admission::amw.batch_course.index',compact(
            'batch','degree_id','degree_title','deg_course_info','year_data','semester_data'
        ));

    }

    public function batch_course_save()
    {
        $data = Input::all();
        $batch_id = Input::get('batch_id');
        $course_id = Input::get('course_id');
        $semester_list = Input::get('semester_id');
        $year_list = Input::get('year_id');
        $mandatory = Input::get('is_mandatory');
        print_r($mandatory);exit;
        $major_minor = Input::get('major_minor');
        $model = new BatchCourse();
        if($model->validate($data)){
                $model->batch_id = $batch_id;
                $model->course_id = $course_id;
                $model->semester_id = $semester_list;
                $model->year_id = $year_list;
                $model->is_mandatory = 0;
                if($mandatory){
                     $model->is_mandatory = 1;
                }
                $model->major_minor = $major_minor;
                Session::flash('message','Successfully added Information!');
                return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }

    }

}