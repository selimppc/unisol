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
				Session::flash('message', "Subject added successfully");
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
		// $data= Years::orderBy('id', 'DESC')->paginate(5);
		// return View::make('years.index')->with('datas',$data)->with('title','All Years list');

		$search_text =trim(Input::get('search_text'));
	    $q = TermUnderSemester::query();

	    if (!empty($search_text))
	    {
	     $q->where(function($query) use ($search_text)
	      {
	      	  $query->where('id', 'LIKE', '%'.$search_text.'%');
              $query->orWhere('degree_program_id', 'LIKE', '%'.$search_text.'%');
              $query->orWhere('department_id', 'LIKE', '%'.$search_text.'%');
              $query->orWhere('year_id', 'LIKE', '%'.$search_text.'%');
              $query->orWhere('semester_id', 'LIKE', '%'.$search_text.'%');
              $query->orWhere('start_date', 'LIKE', '%'.$search_text.'%');
              $query->orWhere('end_date', 'LIKE', '%'.$search_text.'%');

	      });
        }

      $data = $q->orderBy('id', 'DESC')->paginate(5);
  	  return View::make('termundersemester.index')->with('datas',$data)->with('title','	Courses under semester/term List');

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
						Session::flash('message', "Courses added successfully");
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

		 Session::flash('message', "Deleted successfully");
		 return Redirect::to('term/show')->with('title','Deleted Successfully');
		}
	
    }
	


	public function batchdelete()
     {
		TermUnderSemester::destroy(Request::get('id'));
		Session::flash('message', "Deleted successfully");
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
