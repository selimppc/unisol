<?php

class LibraryController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('librarian', array('except' => array('')));
        //$this->beforeFilter('academicFaculty', array('except' => array('index')));
    }

	public function index()
	{
        $data= LibBookCategory::orderBy('id', 'DESC')->paginate(5);
		return View::Make('library::book_category.index',compact('data'));
	}

	public function storeCategory()
	{
        $data = Input::all();
        $model = new LibBookCategory();
        $model->title = Input::get('title');
        $flashmsg = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                if ($model->create($data))
                    DB::commit();
                Session::flash('message', "$flashmsg Book Category Successfully Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$flashmsg Book Category not added.Invalid Request!");
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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function viewCategory($id)
	{
        $view_category = LibBookCategory::find($id);
        return View::make('library::book_category.view',compact('view_category'));
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
