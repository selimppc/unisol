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
        $data = Input::all();
        $model = new Year();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->create($data);
                DB::commit();
                Session::flash('message', "$name Year  Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Year not added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
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
		$data = $q->orderBy('id', 'DESC')->paginate(10);
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
        $data = Input::all();
        $model = Year::find($id);
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "$name Year Updates");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Year not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
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
