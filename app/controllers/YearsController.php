<?php

class YearsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function Index()
	{
		return View::make('years.index')->with('title','Create Years');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}
	public function save()
	{
		$token = csrf_token();
		
		$rules = array(
				
				'title' => 'Required|Min: 3',
			    'description' => 'Required|min:3'
			);
		$validator = Validator::make(Input::all(), $rules);

		
			if($validator->fails())
			{				
				return Redirect::to('create/years')->withErrors($validator)->withInput()->with('title', 'Create Subject');
			}
			else
			{
				if($token == Input::get('_token'))
					{
							$data = new Years;
							$data->title = Input::get('title');
							$data->description = Input::get('description');
							$data->save();
							Session::flash('message', "Years added successfully");
						return Redirect::to('create/years')->with('title', 'Years List');
					}
					else
					{
						Session::flash('message', 'Token Mismatched');
						return Redirect::to('create/years')->with('title', 'Years List');
					}
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
	public function show($id)
	{
		//
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


}
