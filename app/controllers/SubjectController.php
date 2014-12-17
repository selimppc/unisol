<?php

class SubjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function Index()
	{
		return View::make('subject.create')->with('title','Create Subject');
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
				
				'department_id' => 'Required',
				'title' => 'Required|Min: 3',
			    'description' => 'Required|min:3'
			);
		$validator = Validator::make(Input::all(), $rules);

		
			if($validator->fails())
			{				
				return Redirect::to('create/subject')->withErrors($validator)->withInput()->with('title', 'Create Subject');
			}
			else
			{
				if($token == Input::get('_token'))
					{
							$data = new Subject;
							$data->department_id = Input::get('department_id');
							$data->title = Input::get('title');
							$data->description = Input::get('description');
							$data->save();
							Session::flash('message', "Subject added successfully");
						return Redirect::to('create/subject')->with('title', 'Create Role');
					}
					else
					{
						Session::flash('message', 'Token Mismatched');
						return Redirect::to('create/subject')->with('title', 'Create Subject');
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
	
	public function show()
	{
		$search_text =trim(Input::get('search_text'));
	     //Input::flash();

	    $q = Subject::query();

	    if (!empty($search_text)) 
	    {
	     $q->where(function($query) use ($search_text)
	      {

	         $query->where('department_id', 'LIKE', '%'.$search_text.'%');
             $query->orWhere('title', 'LIKE', '%'.$search_text.'%');
             $query->orWhere('description', 'LIKE', '%'.$search_text.'%');
	        
	      });
        }

      $data = $q->orderBy('id', 'DESC')->paginate(5);
  
  	 return View::make('subject.show')->with('datas',$data)->with('title','All Subject List');
	}

     public function batchdelete()
     {

     	Subject::destroy(Request::get('id'));
        return Redirect::to('subject/list')->with('title','All Subject List');

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
	public function delete($id)
	{
		$data= Subject::find($id);
		if($data->delete())
		{
		 return Redirect::to('subject/list')->with('title','All Subject List');
		}
	}
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
