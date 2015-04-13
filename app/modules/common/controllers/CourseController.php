<?php

class CourseController extends \BaseController {

	public function index()
	{
        $course = Course::latest('id')->paginate(10);
        return View::make('common::course.index',compact('course'));
	}

    public function show($id)
    {
        $course = Course::find($id);
        return View::make('common::course.show',compact('course'));
    }

    public function create()
	{
        $subject_id_result = Subject::lists('title', 'id');
        $course_type_id_result = CourseType::lists('title', 'id');
        return View::make('common::course._form',compact('subject_id_result','course_type_id_result'));
	}

	public function store()
	{
        $data = Input::all();
        $model = new Course();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data)){
            if($model->create($data)){
                Session::flash('message', "$name Course Added");
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }

	}

	public function edit($id)
	{
        $course = Course::find($id);

        $subject_name = Subject::lists('title','id');
        $course_type_name = CourseType::lists('title','id');

        return View::make('common::course.edit',compact('course','subject_name','course_type_name'));
	}

	public function update($id)
	{
        $model = Course::find($id);
        $model->title = Input::get('title');
        $name = $model->title;
        $data = Input::all();
        if($model->validate($data)){
            if($model->update($data)){
                Session::flash('message', "$name Course Updated");
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('error', 'invalid');
        }
	}

    public function destroy($id)
    {
        try {
            $data= Course::find($id);
            $name = $data->title;
            if($data->delete())
            {
                Session::flash('message', "$name Course Deleted");
                return Redirect::back();
            }
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }

    }

    public function batchDelete()
    {
        try {
            Course::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

}
