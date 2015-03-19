<?php

class CourseTypeController extends \BaseController {


	public function index()
	{
        $model = CourseType::orderBy('id', 'DESC')->paginate(5);
        return View::make('common::course_type.index',
                  compact('model'));

	}

	public function create()
	{
        return View::make('common::course_type._form');
	}

	public function store()
	{
        $data = Input::all();
        $model = new CourseType();

        if($model->validate($data)){
            if($model->create($data)){
                Session::flash('message','Successfully added Information!');
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
	}

	public function show($id)
	{
        $model = CourseType::find($id);
        return View::make('common::course_type.show',compact('model'));
	}

	public function edit($id)
	{
        $model = CourseType::find($id);
        return View::make('common::course_type.edit',compact('model'));
	}

	public function update($id)
	{
        $model = CourseType::find($id);
        $data = Input::all();

        if($model->validate($data)){
            if($model->update($data)){
                Session::flash('message','Successfully Updated Information!');
                return Redirect::back();
            }
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back();
        }
	}

    public function delete($id)
    {
        try {
            CourseType::find($id)->delete();
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }

    public function batchDelete()
    {
        try {
            CourseType::destroy(Request::get('ids'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');

        } catch (exception $ex) {
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }

}
