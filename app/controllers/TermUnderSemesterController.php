<?php

class TermUnderSemesterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('termundersemester.index')->with('title','All Courses under semester/term List');

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
			'degree_program_id' => 'Required',
			'department_id' => 'Required',
			'year_id' => 'Required',
			'semester_id' => 'Required',
			'start_date' => 'Required',
			'end_date' => 'Required'
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails())
		{
			return Redirect::to('term/show')->withErrors($validator)->withInput()->with('title', 'Add New');
		}
		else
		{
			if($token == Input::get('_token'))
			{
				$data = new TermUnderSemester;
				$data->degree_program_id = Input::get('degree_program_id');
				$data->department_id = Input::get('department_id');
				$data->year_id = Input::get('year_id');
				$data->semester_id = Input::get('semester_id');
				$data->start_date = Input::get('start_date');
				$data->end_date = Input::get('end_date');
				$data->save();
				Session::flash('message', "Success:Added successfully");
				return Redirect::to('term/show')->with('title', 'Subject List');
			}
			else
			{
				Session::flash('message', 'Token Mismatched');
				return Redirect::to('subject/list')->with('title', 'Subject List');
			}
		}

	}

	public function showterm()
	{
		$search_dept = Input::get('department');
		$search_semester = Input::get('semester');
		$search_prog = Input::get('program');
		$search_year = Input::get('year');

		Input::flash();

		$q = TermUnderSemester::query();

		if (!empty($search_dept)) {
			$q->where(function($query) use ($search_dept) {
				$query->where('department_id', '=', $search_dept);
			});
		}

		if (!empty($search_semester)) {
			$q->where(function($query) use ($search_semester) {
				$query->where('semester_id', '=', $search_semester);
			});
		}

		if (!empty($search_prog)) {
			$q->where(function($query) use ($search_prog) {
				$query->where('degree_program_id', '=', $search_prog);
			});
		}

		if (!empty($search_year)) {
			$q->where(function($query) use ($search_year) {
				$query->where('year_id', '=', $search_year);
			});
		}


		$data = $q->orderBy('id', 'DESC')
		->paginate(20);

		return View::make('termundersemester.index')->with('datas',$data)->with('title','Courses under semester/term List');

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
	public function show_one($id)
	{
		$terms = TermUnderSemester::find($id);
		return View::make('termundersemester.show')->with('datas',$terms);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$terms = TermUnderSemester::find($id);
		return View::make('termundersemester.edit')->with('terms',$terms);
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
			'degree_program_id' => 'Required',
			'department_id' => 'Required',
			'year_id' => 'Required',
			'semester_id' => 'Required',
			'start_date' => 'Required',
			'end_date' => 'Required'
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails())
		{
			return Redirect::to('term/show')->withErrors($validator)->withInput()->with('title', 'All List of Courses under semester/term');
		}
		else
		{
			if($token == Input::get('_token'))
			{
				$data = TermUnderSemester::find($id);
				$data->degree_program_id = Input::get('degree_program_id');
				$data->department_id = Input::get('department_id');
				$data->year_id = Input::get('year_id');
				$data->semester_id = Input::get('semester_id');
				$data->start_date = Input::get('start_date');
				$data->end_date = Input::get('end_date');
				$data->save();
				Session::flash('info', "Courses Updated successfully");
				return Redirect::to('term/show')->with('title', 'All List of Courses under semester/term');
			}
			else
			{
				Session::flash('message', 'Token Mismatched');
				return Redirect::to('term/show')->with('title', 'All List of Courses under semester/term');
			}
		}
	}


	public function delete($id)
	{
		
		$data= TermUnderSemester::find($id);
		if($data->delete())
		{

			Session::flash('danger', " Courses Deleted successfully");
			return Redirect::to('term/show')->with('title','Deleted Successfully');
		}
		
	}
	


	public function batchdelete()
	{
		
		TermUnderSemester::destroy(Request::get('id'));
		Session::flash('danger', " Courses Deleted successfully");
		return Redirect::to('term/show')->with('title','Deleted Successfully');

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
