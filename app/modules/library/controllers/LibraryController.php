<?php

class LibraryController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('librarian', array('except' => array('')));
        //$this->beforeFilter('academicFaculty', array('except' => array('index')));
    }

	public function index()
	{
        $book_category = LibBookCategory::orderBy('id', 'DESC')->paginate(5);

		return View::Make('library::librarian.category.index',compact('book_category'));
	}

    /**********************Library Book Category start***************************/
	public function storeCategory()
	{
        $data = Input::all();
        $model = new LibBookCategory();
        $model->title = Input::get('title');
        $flash_msg = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                if ($model->create($data))
                    DB::commit();
                Session::flash('message', "$flash_msg Book Category Successfully Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$flash_msg Book Category not added.Invalid Request!");
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
        return View::make('library::librarian.category.view',compact('view_category'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editCategory($id)
	{
        $edit_category = LibBookCategory::find($id);
        return View::make('library::librarian.category.edit',compact('edit_category'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateCategory($id)
	{
        $data = Input::all();
        $model = LibBookCategory::find($id);
        $model->title = Input::get('title');
        $flash_msg = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "$flash_msg Book Category Successfully Updated");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$flash_msg Book Category not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function deleteCategory($id)
    {

        try {
            $data= LibBookCategory::find($id);
            $name = $data->title;
            if($data->delete())
            {
                Session::flash('message', "$name Deleted");
                return Redirect::back();
            }
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }
    public function batchdeleteCategory($id)
    {
        try {
            LibBookCategory::destroy(Request::get('id'));
            Session::flash('message', "Success: Selected items Deleted ");
            return Redirect::back();
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }
	public function destroy($id)
	{
		//
	}

    /**********************Library Book Author start***************************/



}
