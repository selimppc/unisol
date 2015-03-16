<?php

class SubjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
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
			return Redirect::to('common/subject/list')->withErrors($validator)->withInput()->with('title', 'Create Subject');
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
				Session::flash('message', "Success:Subject added successfully");
				return Redirect::to('common/subject/list')->with('title', 'Subject List');
			}
			else
			{
				Session::flash('message', 'Token Mismatched');
				return Redirect::to('common/subject/list')->with('title', 'Subject List');
			}
		}
	}
	public function index()
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
		return View::make('common::subject.index')->with('datas',$data)->with('title','All Subject List');
	}

	public function batchdelete()
	{
		Session::flash('danger', "Subject Deleted successfully");
		Subject::destroy(Request::get('id'));
		return Redirect::to('common/subject/list')->with('title','All Subject List');

	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */


	public function edit()
	{
		$subId = Input::get('subjectId');
		$data = Subject::find($subId);
		return json_encode($data);
	}

	public function update($id)
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
			return Redirect::to('common/subject/list')->withErrors($validator)->withInput()->with('title', 'Subject List');
		}
		else
		{
			if($token == Input::get('_token'))
			{
				$data = Subject::find($id);
				$data->department_id = Input::get('department_id');
				$data->title = Input::get('title');
				$data->description = Input::get('description');
				$data->save();
				Session::flash('info', "Subject Updated successfully");
				return Redirect::to('common/subject/list')->with('title', 'Subject List');
			}
			else
			{
				Session::flash('message', 'Token Mismatched');
				return Redirect::to('common/subject/list')->with('title', 'Subject List');
			}
		}
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
			Session::flash('danger', "Subject Deleted successfully");
			return Redirect::to('common/subject/list')->with('title','All Subject List');
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
