<?php

class LibStudentController extends \BaseController
{

    function __construct()
    {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function findBooks()
    {

        if ($this->isPostRequest()) {

            $book_category_id = Input::get('lib_book_category_id');
            $book_author_id = Input::get('lib_book_author_id');
            $book_publisher_id = Input::get('lib_book_publisher_id');
            /*$lib_book_id = Input::get('title');*/

            $model = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher');

            if (isset($book_category_id) && !empty($book_category_id)) $model->where('lib_books.lib_book_category_id', '=', $book_category_id);
            if (isset($book_author_id) && !empty($book_author_id)) $model->where('lib_books.lib_book_author_id', '=', $book_author_id);
            if (isset($book_publisher_id) && !empty($book_publisher_id)) $model->where('lib_books.lib_book_publisher_id', '=', $book_publisher_id);
            $model = $model->get();
            //print_r($model);exit;
        } else {
            $model = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher')->latest('id')->get();
        }
        $book_category_id = array('' => 'Select Category ') + LibBookCategory::lists('title', 'id');
        $book_author_id = array('' => 'Select Author ') + LibBookAuthor::lists('name', 'id');
        $book_publisher_id = array('' => 'Select Publisher ') + LibBookPublisher::lists('name', 'id');


        if (Session::get('cartBooks')) {
            $all_cart_book_ids = Session::get('cartBooks');
            $all_cart_books = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher')->whereIn('id', $all_cart_book_ids)->get();
        } else {
            $all_cart_books = array();
        }

        return View::make('library::student.index', compact('all_cart_books', 'book_category_id', 'book_author_id', 'book_publisher_id', 'lib_book_id', 'model'));
    }

    public function addBookToStudentCart($id)
    {
        if ($id) {
            $prev_added_book_id = Session::get('cartBooks');

            $all_cart_book_ids = array_merge(array($id), (array)$prev_added_book_id);
            array_unique($all_cart_book_ids);

            Session::put('cartBooks', $all_cart_book_ids);
        }
        //return Redirect::route('student.view-cart');

        return Redirect::back();
    }

    public function removeBookFromToCart($id)
    {
        $all_cart_book_ids = Session::get('cartBooks');

        // Remove array item by array_search
        if (($key = array_search($id, $all_cart_book_ids)) !== false) {
            unset($all_cart_book_ids[$key]);
        }

        Session::set('cartBooks', $all_cart_book_ids);

        return Redirect::back();
    }

    public function getDownload($book_id)
    {
        $download = LibBook::find($book_id);
        $file = $download->file;
        $path = public_path("img/" . $file);
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::download($path, $file, $headers);
    }

    public function viewCart()
    {
        $all_cart_book_ids = Session::get('cartBooks');

        $all_cart_books = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher')
            ->whereIn('id', $all_cart_book_ids)->get();

        $number = count($all_cart_books);

        $sum = $all_cart_books->sum('digital_sell_price');

        return View::make('library::student.view_cart', compact('all_cart_book_ids', 'all_cart_books', 'number', 'sum'));
    }

    public function sendInfoToTransactionTable($all_cart_book_ids)
    {

        // to get total amount
        $all_cart_book_ids = Session::get('cartBooks');
        $all_cart_books = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher')
            ->whereIn('id', $all_cart_book_ids)->get();
        $sum = $all_cart_books->sum('digital_sell_price');


        $info = Input::all();

        // save to lib_book_transaction table
        $lib_book_trnsctn = new LibBookTransaction();
        $lib_book_trnsctn->user_id = Auth::user()->get()->id;
        $lib_book_trnsctn->lib_books_id = $all_cart_book_ids;
        $date = date('d-m-y H:i:s');
        $lib_book_trnsctn->issue_date = $date;

        if ($lib_book_trnsctn->save())
        {
            $lib_book_trnsctn_id = $lib_book_trnsctn->id;

            //print_r($lib_book_trnsctn_id);exit;


            // save to lib_book_financial_transaction table
            $lib_book_fncl_trnsctn = new LibBookFinancialTransaction();
            $lib_book_fncl_trnsctn->lib_book_transaction_id = $lib_book_trnsctn_id;
            $lib_book_fncl_trnsctn->amount = $sum;
            $lib_book_fncl_trnsctn->trn_type = 'commercial';
            $lib_book_fncl_trnsctn->status = 'paid';

        }else{

            echo "second table don't get data ";
            return Redirect::route('student.my-cart');
        }

//        if ($lib_book_fncl_trnsctn->save()) {
//            Session::flash('message', 'Faculty Assigned and Comments added');
//            return Redirect::back();
//        } else {
//            $errors = $model->errors();
//            Session::flash('errors', $errors);
//            return Redirect::back()->with('errors', 'invalid');
//        }

    }

    public function myCart()
    {
        $my_cart_book_ids = Session::get('cartBooks');
        $my_cart_books = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher')
            ->whereIn('id', $my_cart_book_ids)->get();
        $sum = $my_cart_books->sum('digital_sell_price');

        return View::make('library::student.my_cart',compact('my_cart_books','sum'));
    }










}
