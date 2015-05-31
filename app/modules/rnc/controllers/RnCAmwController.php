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
            return Redirect::back()->with('message', 'Category Batch Deleted successfully!');
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
            return Redirect::back()->with('message', 'Config Batch Deleted successfully!');
        }
        catch (exception $ex)
        {
            return Redirect::back()->with('error', 'Invalid Delete Process ! Config has been using in other DB Table.At first Delete Data from there then come here again. Thank You !!!');
        }
    }

    //Publisher
    public function indexPublisher()
    {
        $publisher = RnCPublisher::orderBy('id', 'DESC')->paginate(5);
        return View::make('rnc::amw.publisher.index', compact('publisher'));
    }

    public function storePublisher()
    {
        $data = Input::all();
        $publisher = new RnCPublisher();
        $publisher->title = Input::get('title');
        $name = $publisher->title;
        if($publisher->validate($data))
        {
            DB::beginTransaction();
            try {
                $publisher->create($data);
                DB::commit();
                Session::flash('message', "$name Publisher  Added");
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "$name Publisher not added.Invalid Request!");
            }
            return Redirect::back();
        }else{
            $errors = $publisher->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }

    }

    public function showPublisher($id)
    {
        $publisher = RnCPublisher::find($id);
        if($publisher)
        {
            return View::make('rnc::amw.publisher.show',compact('publisher'));
        }
        App::abort(404);
    }


    public function editPublisher($id)
    {
        $publisher = RnCPublisher::find($id);
        return View::make('rnc::amw.publisher.edit',compact('publisher'));
    }


    public function updatePublisher($id)
    {
        $data = Input::all();
        $publisher = RnCPublisher::find($id);
        $publisher->title = Input::get('title');
        $name = $publisher->title;
        if($publisher->validate($data))
        {
            DB::beginTransaction();
            try {
                $publisher->update($data);
                DB::commit();
                Session::flash('message', "$name Publisher Updates");
            }
            catch ( Exception $e ){
                DB::rollback();
                Session::flash('danger', "$name Publisher not updates. Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $publisher->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'Input Data Not Valid');
        }
    }

    public function deletePublisher($id)
    {
        try {
            $publisher= RnCPublisher::find($id);
            $name = $publisher->title;
            if($publisher->delete())
            {
                Session::flash('message', "$name Publisher Deleted");
                return Redirect::back();
            }
        }
        catch (exception $ex){
            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }

    public function batchDeletPublisher()
    {
        try{
            RnCPublisher::destroy(Request::get('id'));
            return Redirect::back()->with('message', 'Publisher Batch Deleted successfully!');
        }
        catch (exception $ex)
        {
            return Redirect::back()->with('error', 'Invalid Delete Process ! Publisher has been using in other DB Table.At first Delete Data from there then come here again. Thank You !!!');
        }
    }

//    //Research Paper
//
//
//    public function indexBook()
//    {
//        $books = LibBook::orderBy('id', 'DESC')->paginate(5);
//        $category = array('' => 'Select Category ') + LibBookCategory::lists('title', 'id');
//        $author = array('' => 'Select author ') + LibBookAuthor::lists('name', 'id');
//        $publisher = array('' => 'Select Publisher') + LibBookPublisher::lists('name', 'id');
//        return View::Make('library::librarian.books.index',compact('books','category','author','publisher'));
//    }
//
//    public function storeBook()
//    {
//
//        $data = Input::all();
//        $model = new LibBook();
//        if ($model->validate($data)) {
//            $model->title = Input::get('title');
//            $flashmsg = $model->title;
//            $model->isbn = Input::get('isbn');
//            $model->lib_book_category_id = Input::get('category');
//            $model->lib_book_author_id = Input::get('author');
//            $model->lib_book_publisher_id = Input::get('publisher');
//            $model->edition = Input::get('edition');
//            $model->stock_type = Input::get('stock_type');
//            $model->shelf_number = Input::get('self_number');
//            $model->book_type= Input::get('book_type');
//            $model->commercial = Input::get('commercial');
//            $model->book_price = Input::get('book_price');
//            $model->digital_sell_price = Input::get('digital_sell_price');
//            $model->is_rented = Input::get('is_rented');
//
//            if (Input::hasFile('docs'))
//            {
//                $files = Input::file('docs');
//                $destinationPath = public_path() . '/library';
//                $filename =  $files->getClientOriginalExtension();
//                $file = date("d-m-Y-s")."." . $filename;
//                $files->move($destinationPath, $file);
//                $model->file = $file;
//            }
//
//
//            $model->save();
//
//            Session::flash('message', "Successfully Added $flashmsg !");
//            return Redirect::back();
//        } else {
//            // failure, get errors
//            $errors = $model->errors();
//            Session::flash('errors', $errors);
//            return Redirect::back();
//        }
//
//    }
//
//    public function viewBook($id)
//    {
//        $view_book = LibBook::find($id);
//        return View::make('library::librarian.books.view',compact('view_book'));
//    }
//
//    public function editBook($id)
//    {
//        $edit_book = LibBook::find($id);
//        $category = array('' => 'Select Category ') + LibBookCategory::lists('title', 'id');
//        $author = array('' => 'Select author ') + LibBookAuthor::lists('name', 'id');
//        $publisher = array('' => 'Select Publisher') + LibBookPublisher::lists('name', 'id');
//        return View::make('library::librarian.books.edit',compact('edit_book','category','author','publisher'));
//    }
//
//
//    public function updateBook($id)
//    {
//        $data = Input::all();
//        $model = LibBook::find($id);
//        if ($model->validate($data)) {
//            $model->title = Input::get('title');
//            $flashmsg = $model->title;
//            $model->isbn = Input::get('isbn');
//            $model->lib_book_category_id = Input::get('category');
//            $model->lib_book_author_id = Input::get('author');
//            $model->lib_book_publisher_id = Input::get('publisher');
//            $model->edition = Input::get('edition');
//            $model->stock_type = Input::get('stock_type');
//            $model->shelf_number = Input::get('self_number');
//            $model->book_type= Input::get('book_type');
//            $model->commercial = Input::get('commercial');
//            $model->book_price = Input::get('book_price');
//            $model->digital_sell_price = Input::get('digital_sell_price');
//            $model->is_rented = Input::get('is_rented');
//
//            /* $files = Input::get('docs');*/
//            /*$files = Input::file('docs');
//            $destinationPath = public_path() . '/library';
//            $filename =  $files->getClientOriginalExtension();
//            $file = date("d-m-Y-s")."." . $filename;
//            $files->move($destinationPath, $file);
//            $model->file = $file;*/
//
//            if (Input::hasFile('docs'))
//            {
//                $files = Input::file('docs');
//                $destinationPath = public_path() . '/library';
//                $filename =  $files->getClientOriginalExtension();
//                $file = date("d-m-Y-s")."." . $filename;
//                $files->move($destinationPath, $file);
//                $model->file = $file;
//            }
//
//            $model->save();
//            Session::flash('message', "Successfully Updated $flashmsg !");
//            return Redirect::back();
//        } else {
//            // failure, get errors
//            $errors = $model->errors();
//            Session::flash('errors', $errors);
//            return Redirect::back();
//        }
//    }
//
//    public function deleteBook($id)
//    {
//
//        try {
//            $data= LibBook::find($id);
//            $flash_msg = $data->name;
//            if($data->delete())
//            {
//                Session::flash('message', "Book Publisher $flash_msg Deleted");
//                return Redirect::back();
//            }
//        }
//        catch
//        (exception $ex){
//            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
//
//        }
//    }
//    public function batchdeleteBook($id)
//    {
//        try {
//            LibBook::destroy(Request::get('id'));
//            Session::flash('message', "Success: Selected items Deleted ");
//            return Redirect::back();
//        }
//        catch
//        (exception $ex){
//            return Redirect::back()->with('error', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
//        }
//    }
//
//    public function bookDownload($book_id)
//    {
//        $download = LibBook::find($book_id);
//        $file = $download->file;
//        $path = public_path("library/" . $file);
//        $headers = array(
//            'Content-Type: application/pdf',
//        );
//        /*To Direct Download*/
//        return Response::download($path, $file, $headers);
//
//        /*To open and read and download pdf
//        return Response::make(file_get_contents($path), 200, [
//            'Content-Type' => 'application/pdf',
//            'Content-Disposition' => 'inline; '.$file,
//        ]);*/
//    }
//
//    public function bookRead($book_id)
//    {
//        $download = LibBook::find($book_id);
//        $file = $download->file;
//        $path = public_path("library/" . $file);
//        $headers = array(
//            'Content-Type: application/pdf',
//        );
//        /*To open and read and download pdf*/
//        return Response::make(file_get_contents($path), 200, [
//            'Content-Type' => 'application/pdf',
//            'Content-Disposition' => 'inline; '.$file,
//        ]);
//    }



}
