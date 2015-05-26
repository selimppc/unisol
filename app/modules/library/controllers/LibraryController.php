<?php

class LibraryController extends \BaseController {

    function __construct()
    {
        $this->beforeFilter('librarian', array('except' => array('')));
        //$this->beforeFilter('academicFaculty', array('except' => array('index')));
    }

    /**********************Library Book Category start***************************/

	public function index()
	{
        $book_category = LibBookCategory::orderBy('id', 'DESC')->paginate(5);
		return View::Make('library::librarian.category.index',compact('book_category'));
	}

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
                Session::flash('danger', "$flash_msg Book Category Not Added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
	}


	public function viewCategory($id)
	{
        $view_category = LibBookCategory::find($id);
        return View::make('library::librarian.category.view',compact('view_category'));
	}


	public function editCategory($id)
	{
        $edit_category = LibBookCategory::find($id);
        return View::make('library::librarian.category.edit',compact('edit_category'));
	}


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
                Session::flash('danger', "$flash_msg Book Category Not Updated. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
	}

    public function deleteCategory($id)
    {
        try {
            $data= LibBookCategory::find($id);
            $name = $data->title;
            if($data->delete())
            {
                Session::flash('message', "Book Category $name Deleted");
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

    public function indexAuthor()
    {
        $book_author = LibBookAuthor::orderBy('id', 'DESC')->paginate(5);
        $country = array('' => 'Select Country ') + Country::lists('title', 'id');
        return View::Make('library::librarian.author.index',compact('book_author','country'));
    }

    public function storeAuthor()
    {
        $data = Input::all();
        $model = new LibBookAuthor();
        $model->name = Input::get('name');
        $flash_msg = $model->name;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                if ($model->create($data))
                    DB::commit();
                Session::flash('message', "Book Author $flash_msg Successfully Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Book Author $flash_msg Not Added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }


    public function viewAuthor($id)
    {
        $view_author = LibBookAuthor::find($id);
        return View::make('library::librarian.author.view',compact('view_author'));
    }


    public function editAuthor($id)
    {
        $edit_author = LibBookAuthor::find($id);
        $country = array('' => 'Select Country ') + Country::lists('title', 'id');
        return View::make('library::librarian.author.edit',compact('edit_author','country'));
    }


    public function updateAuthor($id)
    {
        $data = Input::all();
        $model = LibBookAuthor::find($id);
        $model->name = Input::get('name');
        $flash_msg = $model->name;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "Book Author $flash_msg Successfully Updated");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Book Author $flash_msg  Not Updated. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }

    public function deleteAuthor($id)
    {

        try {
            $data= LibBookAuthor::find($id);
            $flash_msg = $data->name;
            if($data->delete())
            {
                Session::flash('message', "Book Author $flash_msg Deleted");
                return Redirect::back();
            }
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }
    public function batchdeleteAuthor($id)
    {
        try {
            LibBookAuthor::destroy(Request::get('id'));
            Session::flash('message', "Success: Selected items Deleted ");
            return Redirect::back();
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    /**********************Library Book Publisher start***************************/

    public function indexPublisher()
    {
        $book_publisher = LibBookPublisher::orderBy('id', 'DESC')->paginate(5);
        $country = array('' => 'Select Country ') + Country::lists('title', 'id');
        return View::Make('library::librarian.publisher.index',compact('book_publisher','country'));
    }

    public function storePublisher()
    {
        $data = Input::all();
        $model = new LibBookPublisher();
        $model->name = Input::get('name');
        $flash_msg = $model->name;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                if ($model->create($data))
                DB::commit();
                Session::flash('message', "Book Publisher $flash_msg Successfully Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Book Publisher $flash_msg Not Added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    public function viewPublisher($id)
    {
        $view_publisher = LibBookPublisher::find($id);
        return View::make('library::librarian.publisher.view',compact('view_publisher'));
    }

    public function editPublisher($id)
    {
        $edit_publisher = LibBookPublisher::find($id);
        $country = array('' => 'Select Country ') + Country::lists('title', 'id');
        return View::make('library::librarian.publisher.edit',compact('edit_publisher','country'));
    }


    public function updatePublisher($id)
    {
        $data = Input::all();
        $model = LibBookPublisher::find($id);
        $model->name = Input::get('name');
        $flash_msg = $model->name;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "Book Author $flash_msg Successfully Updated");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Book Author $flash_msg  Not Updated. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }

    public function deletePublisher($id)
    {

        try {
            $data= LibBookPublisher::find($id);
            $flash_msg = $data->name;
            if($data->delete())
            {
                Session::flash('message', "Book Publisher $flash_msg Deleted");
                return Redirect::back();
            }
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');

        }
    }
    public function batchdeletePublisher($id)
    {
        try {
            LibBookPublisher::destroy(Request::get('id'));
            Session::flash('message', "Success: Selected items Deleted ");
            return Redirect::back();
        }
        catch
        (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

}
