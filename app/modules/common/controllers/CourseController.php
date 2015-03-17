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
        return View::make('common::course._form');
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

	public function edit($id)
	{
        $course = Course::find($id);
        return View::make('common::course.edit',compact('course'));
	}

	public function update($id)
	{
        $model = Course::find($id);
        $data = Input::all();

        $model->fill($data);

        if ($model->save()) {
            return Redirect::back()
                ->with('message', 'Successfully Updated Information!');
        }else{
            return Redirect::back();
        }
	}

    public function destroy($id)
    {
        try {
            Course::find($id)->delete();
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
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
