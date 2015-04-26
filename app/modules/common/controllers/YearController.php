<?php

class YearController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
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
			'title' => 'Required|Min: 3|integer|unique:year',
			'description' => 'Required|min:3'
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails())
		{
			return Redirect::to('common/year/')->withErrors($validator)->withInput()->with('title', 'Create year');
		}
		else
		{
			if($token == Input::get('_token'))
			{
                DB::beginTransaction();
                try{
                    $data = new Year;
                    $data->title = Input::get('title');
                    $name = $data->title;
                    $data->description = Input::get('description');
                    $data->save();

                    DB::commit();
                    Session::flash('message', "$name Year Added");
                }
                catch ( Exception $e ){
                    //If there are any exceptions, rollback the transaction
                    DB::rollback();
                    Session::flash('danger', " $name Year is not added.Invalid Request !");
                }

				return Redirect::to('common/year/');
			}
			else
			{
				Session::flash('message', 'Token Mismatched');
				return Redirect::to('common/year/');
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

	public function index()
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
			'title' => 'Required|Min: 3|integer',
			'description' => 'Required|min:3'
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails())
		{
			return Redirect::to('common/year/')->withErrors($validator)->withInput()->with('title', 'Create Subject');
		}
		else
		{
			if($token == Input::get('_token'))
			{
                DB::beginTransaction();
                try{
                    $data = Year::find($id);
                    $data->title = Input::get('title');
                    $name = $data->title;
                    $data->description = Input::get('description');
                    $data->save();

                    DB::commit();
                    Session::flash('message', "$name Updated");
                }
                catch ( Exception $e ){
                    //If there are any exceptions, rollback the transaction
                    DB::rollback();
                    Session::flash('danger', " $name Year is not added.Invalid Request !");
                }

				return Redirect::to('common/year/');
			}
			else
			{
				Session::flash('message', 'Token Mismatched');
				return Redirect::to('common/year/');
			}
		}
	}

	public function delete($id)
	{
		try {
			$data= Year::find($id);
			$name = $data->title;
			if($data->delete())
			{
				Session::flash('message', "$name Deleted");
				return Redirect::to('common/year/');
			}
		}
		catch
		(exception $ex){
			return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

		}
	}

	public function batchdelete()
	{
		try {
			Year::destroy(Request::get('id'));
			Session::flash('message', "Success: Selected Year Deleted ");
			return Redirect::to('common/year/');
		}
		catch
		(exception $ex){
			return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
		}
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
