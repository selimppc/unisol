<?php

class CfoController extends \BaseController {

    function __construct() {
        $this->beforeFilter('cfo', array('except' => array('')));
    }
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index()
	{
        $data = CfoCategory::latest('id')->paginate(3);
        return View::make('cfo::category.index', compact('pageTitle', 'data'));
	}

	public function storeCategory()
	{
        $data = Input::all();
        $model = new CfoCategory();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->create($data);
                DB::commit();
                Session::flash('message', "$name  Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name not added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
	}

	public function showCategory($id)
	{
        $model = CfoCategory::find($id);
        return View::make('cfo::category.show',compact('model'));
	}

    public function editCategory($id){

        $model = CfoCategory::find($id);
        return View::make('cfo::category.edit',compact('model'));
    }

    public function updateCategory($id){

        $data = Input::all();
        $model = CfoCategory::find($id);
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "$name Updates");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name not updates. Invalid Request !");
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
            $data = CfoCategory::find($id);

            $name = $data->title;
            if ($data->delete()) {
                Session::flash('message', "$name  Deleted");
                return Redirect::back();
            }
        } catch
        (exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

	public function indexKnowledgeBase(){

        $cfo_category_id = CfoCategory::lists('title','id');
        $knb_data = CfoKnowledgeBase::latest('id')->paginate(10);
        return View::make('cfo::knowledge_base.index', compact('cfo_category_id', 'knb_data'));

    }
    public function storeKnowledgeBase()
    {
        $data = Input::all();

        $model = new CfoKnowledgeBase();
        $model->cfo_category_id =  Input::get('cfo_category_id');
//        $model->title = Input::get('title');
//        $name = $model->title;

        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->create($data);
                DB::commit();
                Session::flash('message', "  Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', " not added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    public function showKnowledgeBase($id)
    {
        $model = CfoKnowledgeBase::find($id);
//        $a = User::CfoList();print_r($a);exit;
        return View::make('cfo::knowledge_base.show',compact('model'));
    }

    public function editKnowledgeBase($id){

        $model = CfoKnowledgeBase::find($id);
        $cfo_category_id = CfoCategory::lists('title','id');
        return View::make('cfo::knowledge_base.edit',compact('model','cfo_category_id'));
    }

    public function updateKnowledgeBase($id){

        $data = Input::all();
        $model = CfoKnowledgeBase::find($id);
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "$name Updates");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }


    public function deleteKnowledgeBase($id)
    {
        try {
            $data = CfoKnowledgeBase::find($id);

            $name = $data->title;
            if ($data->delete()) {
                Session::flash('message', "$name  Deleted");
                return Redirect::back();
            }
        } catch
        (exception $ex) {
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function listOfKnowledgeBase($id)
	{
        return View::make('cfo::knowledge_base.edit');
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
