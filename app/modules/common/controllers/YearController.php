<?php

class YearController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function Index()
	{
		return View::make('common::year.index')->with('title','Create Year');
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
			'title' => 'Required|Min: 3|numeric',
			'description' => 'Required|min:3'
			);
		$validator = Validator::make(Input::all(), $rules);

		
		if($validator->fails())
		{				
			return Redirect::to('year/show')->withErrors($validator)->withInput()->with('title', 'Create Subject');
		}
		else
		{
			if($token == Input::get('_token'))
			{
				$data = new Year;
				$data->title = Input::get('title');
				$data->description = Input::get('description');
				$data->save();
				Session::flash('message', "Success:Years added successfully");
				return Redirect::to('year/show')->with('title', 'Years List');
			}
			else
			{
				Session::flash('message', 'Token Mismatched');
				return Redirect::to('year/show')->with('title', 'Years List');
			}
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function show()
	{
		// $data= Years::orderBy('id', 'DESC')->paginate(5);
		// return View::make('years.index')->with('datas',$data)->with('title','All Years list');
		
		$search_text =trim(Input::get('search_text'));
		$q = Year::query();

		if (!empty($search_text)) 
		{
			$q->where(function($query) use ($search_text)
			{
				$query->where('id', 'LIKE', '%'.$search_text.'%');
				$query->orWhere('title', 'LIKE', '%'.$search_text.'%');
				$query->orWhere('description', 'LIKE', '%'.$search_text.'%');
				
			});
		}
		$data = $q->orderBy('id', 'DESC')->paginate(5);
		return View::make('common::year.index')->with('datas',$data)->with('title','All Year List');
	}

	public function show_one($id)
	{
		$years = Year::find($id);
		return View::make('common::year.show')->with('years',$years);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$years = Year::find($id);
		return View::make('common::year.edit')->with('years',$years);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$token = csrf_token();
		$rules = array(
			'title' => 'Required|Min: 3|numeric',
			'description' => 'Required|min:3'
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails())
		{
			return Redirect::to('year/show')->withErrors($validator)->withInput()->with('title', 'Create Subject');
		}
		else
		{
			if($token == Input::get('_token'))
			{
				$data = new Year;
				$data->title = Input::get('title');
				$data->description = Input::get('description');
				$data->save();
				Session::flash('info', "Years Updated successfully");
				return Redirect::to('year/show')->with('title', 'Years List');
			}
			else
			{
				Session::flash('message', 'Token Mismatched');
				return Redirect::to('year/show')->with('title', 'Years List');
			}
		}
	}

	public function delete($id)
	{
		try {
			$data= Year::find($id);
			if($data->delete())
			{
				Session::flash('danger', "Years Deleted successfully");
				return Redirect::to('year/show')->with('title','All Year List');
			}
		}
		catch
		(exception $ex){
			return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

		}
	}

	public function batchdelete()
	{
		Session::flash('danger', "Years Deleted successfully");
		Year::destroy(Request::get('id'));
		return Redirect::to('year/show')->with('title','All Subject List');

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
