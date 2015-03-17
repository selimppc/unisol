<?php

class CourseTypeController extends \BaseController {


	public function index()
	{
        $model = CourseType::orderBy('id', 'DESC')->paginate(10);
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
        if (CourseType::create($data)) {

            return Redirect::back()
                ->with('message', 'Successfully added Information!');
        } else{
            return Redirect::back()
                ->with('message', 'invalid');
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

        $model->fill($data);

        if ($model->save()) {
            return Redirect::back()
                ->with('message', 'Successfully Updated Information!');
        }else{
            return Redirect::back();
        }
	}

    public function delete($id)
    {
        //CourseType::find($id)->delete();

        //return Redirect::back()->with('message', 'Successfully deleted Information!');

        try {
            CourseType::find($id)->delete();
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
        catch(exception $ex){
            return Redirect::back()->with('message', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }

    public function batchDelete()
    {
        try {
            CourseType::destroy(Request::get('ids'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        } catch (exception $ex) {
            return Redirect::back()->with('message', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }

}
