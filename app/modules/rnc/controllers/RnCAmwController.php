<?php

class RnCAmwController extends \BaseController
{

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    // Category
	public function indexCategory()
	{
        $model = RnCCategory::orderBy('id', 'DESC')->paginate(5);
        return View::make('rnc::amw.category.index', compact('model'));
	}

    public function storeCategory()
    {
        $data = Input::all();
        $model = new RnCCategory();
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->create($data);
                DB::commit();
                Session::flash('message', "$name Category  Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Category not added.Invalid Request!");
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
        $model = RnCCategory::find($id);
        if($model)
        {
            return View::make('rnc::amw.category.show',compact('model'));
        }
        App::abort(404);
    }


    public function editCategory($id)
    {
        $model = RnCCategory::find($id);
        return View::make('rnc::amw.category.edit',compact('model'));
    }


    public function updateCategory($id)
    {
        $data = Input::all();
        $model = RnCCategory::find($id);
        $model->title = Input::get('title');
        $name = $model->title;
        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', "$name Category Updates");
            }
            catch ( Exception $e ){
                DB::rollback();
                Session::flash('danger', "$name Category not updates. Invalid Request !");
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
            $model= RnCCategory::find($id);
            $name = $model->title;
            if($model->delete())
            {
                Session::flash('message', "$name Category Deleted");
                return Redirect::back();
            }
        }
        catch (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function batchDeleteCategory()
    {
        try{
            RnCCategory::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Category Deleted successfully!');
        }
        catch (exception $ex)
        {
            return Redirect::back()->with('error', 'Invalid Delete Process ! Category has been using in other DB Table.At first Delete Data from there then come here again. Thank You !!!');
        }
    }

    // Config
    public function indexConfig()
    {
        $config = RnCConfig::orderBy('id', 'DESC')->paginate(5);
        return View::make('rnc::amw.config.index', compact('config'));
    }

    public function storeConfig()
    {
        $data = Input::all();
        $config = new RnCConfig();
        $config->title = Input::get('title');
        $name = $config->title;
        if($config->validate($data))
        {
            DB::beginTransaction();
            try {
                $config->create($data);
                DB::commit();
                Session::flash('message', "$name Config  Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Config not added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $config->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }

    }

    public function showConfig($id)
    {
        $config = RnCConfig::find($id);
        if($config)
        {
            return View::make('rnc::amw.config.show',compact('config'));
        }
        App::abort(404);
    }


    public function editConfig($id)
    {
        $config = RnCConfig::find($id);
        return View::make('rnc::amw.config.edit',compact('config'));
    }


    public function updateConfig($id)
    {
        $data = Input::all();
        $config = RnCConfig::find($id);
        $config->title = Input::get('title');
        $name = $config->title;
        if($config->validate($data))
        {
            DB::beginTransaction();
            try {
                $config->update($data);
                DB::commit();
                Session::flash('message', "$name Config Updates");
            }
            catch ( Exception $e ){
                DB::rollback();
                Session::flash('danger', "$name Config not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $config->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }

    public function deleteConfig($id)
    {
        try {
            $config= RnCConfig::find($id);
            $name = $config->title;
            if($config->delete())
            {
                Session::flash('message', "$name Config Deleted");
                return Redirect::back();
            }
        }
        catch (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function batchDeletConfig()
    {
        try{
            RnCConfig::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Config Deleted successfully!');
        }
        catch (exception $ex)
        {
            return Redirect::back()->with('error', 'Invalid Delete Process ! Config has been using in other DB Table.At first Delete Data from there then come here again. Thank You !!!');
        }
    }
}
