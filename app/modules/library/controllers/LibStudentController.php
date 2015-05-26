<?php

class LibStudentController extends \BaseController {

    function __construct() {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function findBooks()
    {

        if($this->isPostRequest()) {

            $book_category_id = Input::get('lib_book_category_id');
            $book_author_id = Input::get('lib_book_author_id');
            $book_publisher_id = Input::get('lib_book_publisher_id');
            /*$lib_book_id = Input::get('title');*/

            $model = LibBook::with('relLibBookCategory','relLibBookAuthor','relLibBookPublisher');

            if (isset($book_category_id) && !empty($book_category_id)) $model->where('lib_books.lib_book_category_id', '=', $book_category_id);
            if (isset($book_author_id) && !empty($book_author_id)) $model ->where('lib_books.lib_book_author_id', '=', $book_author_id);
            if (isset($book_publisher_id) && !empty($book_publisher_id)) $model->where('lib_books.lib_book_publisher_id', '=', $book_publisher_id);
            $model = $model->get();
            //print_r($model);exit;
        }else{
            $model = LibBook::with('relLibBookCategory','relLibBookAuthor','relLibBookPublisher')->latest('id')->get();
        }
        $book_category_id = array('' => 'Select Category ') + LibBookCategory::lists('title', 'id');
        $book_author_id = array('' => 'Select Author ') + LibBookAuthor::lists('name', 'id');
        $book_publisher_id = array('' => 'Select Publisher ') + LibBookPublisher::lists('name', 'id');


        if(Session::get('cartBooks')){
            $all_cart_book_ids = Session::get('cartBooks');
            $all_cart_books = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher')->whereIn('id', $all_cart_book_ids)->get();
        }else{
            $all_cart_books = array();
        }

        return View::make('library::student.index',compact('all_cart_books','book_category_id','book_author_id','book_publisher_id','lib_book_id','model'));
    }

    public function addBookToStudentCart($id)
    {
        if($id) {
            $prev_added_st_book_id = Session::get('cartBooks');

            $all_cart_st_book_ids = array_merge(array($id), (array)$prev_added_st_book_id);
            array_unique($all_cart_st_book_ids);

            Session::put('cartBooks', $all_cart_st_book_ids);
        }
        //return Redirect::route('student.view-cart');

        return Redirect::back();
    }

    public function removeBookFromToCart($id)
    {
        $all_cart_book_ids = Session::get('cartBooks');

        // Remove array item by array_search
        if(($key = array_search($id, $all_cart_book_ids)) !== false) {
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
        return Response::download($path, $file , $headers);
    }

    public function viewCart()
    {
        $all_cart_book_ids = Session::get('cartBooks');

        $all_cart_books = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher')->whereIn('id', $all_cart_book_ids)->get();

        $number = count($all_cart_books);

        $sum = $all_cart_books->sum('digital_sell_price');

        return View::make('library::student.view_cart',compact('all_cart_book_ids','all_cart_books', 'number','sum'));
    }

    public function myCart()
    {
        $all_cart_book_ids = Session::get('cartBooks');

        print_r($all_cart_book_ids);exit;


        $my_cart_books = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher')->whereIn('id', $my_cart_book_ids)->get();



        //$sum = $my_cart_books->sum('digital_sell_price');



        return View::make('library::student.my_cart',compact('all_cart_books', 'number','sum'));
    }










}
