<?php

class DegreeProgController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{    //$departments = Department::lists('title', 'id');
        //$Select_id = array('' => 'Select One') +Department::find('title', 'id');
        //print_r($departments);
        $degree_prog = DB::table('degree_program')->get();
        return View::make('degree_program.index', compact('degree_prog'));

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

        $degree_prog = DegreeProg::find($id);
        // Show the edit employee form.
        return View::make('degreeprog.edit', compact('degree_prog'));

    }

    public function update($id)
    {
        $rules = array(
            'title' => 'required',


        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {

            $degree_prog = DegreeProg::find($id);
            $degree_prog->title = Input::get('title');
//            $degree_prog->department_id = Input::get('department_id');
//            $degree_prog->degree_level_id = Input::get('degree_level_id');
            $degree_prog->description = Input::get('description');

            $degree_prog->save();
            return Redirect::back()->with('message', 'Successfully Added Information!');
        } else {
            return Redirect::to('degreeprogram/index')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }

    public function show($id)
    {
        // get the country
        $degree_program = DegreeProg::find($id);
        $selectId = Input::get('Select_id');
        //echo "ok";
        //print_r($degree_program);
        //exit;

        return View::make('degreeprogram.show',compact('degree_program'));


    }


}
