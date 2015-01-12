<?php

class MarkdistributionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
//-------------------------------------
//Start amw code
//-------------------------------------

	public function amw_index()
	{
        return View::make('academic::mark_distribution_courses.amw.index')->with('title','All Courses Items List');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function amw_save()
	{
        $data = Input::all();

        // create a new model instance
        $datas = new AcmMarksDist();

        // attempt validation
        if ($datas->validate($data))
        {

            $datas->title = Input::get('title');
            $datas->save();

            // redirect
            Session::flash('message', 'Successfully Added!');
            return Redirect::to('amw/index');
        }
        else
        {
            // failure, get errors
            $errors = $datas->errors();
            Session::flash('errors', $errors);

            return Redirect::to('amw/index');
        }
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function amw_show()
	{
        $data = AcmMarksDist::all();
        return View::make('academic::mark_distribution_courses.amw.index')->with('datas', $data)->with('title','All Courses Title List');
    }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}
    public function amw_batchdelete()
    {

    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
//-------------------------------------
//End amw code
//-------------------------------------

}
