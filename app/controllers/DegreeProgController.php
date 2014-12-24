<?php

class DegreeProgController extends \BaseController {

	public function index()
	{
        $degree_programs = DB::table('degree_program')->paginate(5);
        return View::make('degree_program.index', compact('degree_programs'));

	}

    public function store(){
        $rules = array(
            'title' => 'required',

        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            $degree_program = new DegreeProg;
            $degree_program->title = Input::get('title');
            $degree_program->department_id = Input::get('department_id');
            $degree_program->degree_level_id = Input::get('degree_level_id');
            $degree_program->description = Input::get('description');

            $degree_program->save();
            // return Redirect::to('crud')->with('message', 'Successfully added Country!');
            return Redirect::back()->with('message', 'Successfully Added Information!');
        } else {
            return Redirect::to('degreeprogram/index')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }



    public function destroy($id)
	{
        $result =  DegreeProg::find($id);

        if($result->delete())
        {
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        }
	}

    public function edit($id)
    {

        $degree_program = DegreeProg::find($id);
        return View::make('degree_program.edit', compact('degree_program'));

    }

    public function update($id)
    {
        $rules = array(
            'title' => 'required',


        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {

            $degree_program = DegreeProg::find($id);
            $degree_program->title = Input::get('title');
            $degree_program->department_id = Input::get('department_id');
            $degree_program->degree_level_id = Input::get('degree_level_id');
            $degree_program->description = Input::get('description');

            $degree_program->save();

            return Redirect::back()->with('message', 'Successfully Added Information!');
        } else {
            return Redirect::to('degreeprogram/index')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }

    }

    public function show($id)
    {
        // get the country
        $degree_program = DegreeProg::find($id);
        return View::make('degree_program.show',compact('degree_program'));


    }


}
