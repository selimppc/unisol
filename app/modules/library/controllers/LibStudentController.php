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


//            $id = $model->id;
//            if($id) {
//                $prev_added_st_book_id = Session::get('cartBooks');
//
//                $all_cart_st_book_ids = array_merge(array($id), (array)$prev_added_st_book_id);
//                array_unique($all_cart_st_book_ids);
//                Session::put('cartBooks', $all_cart_st_book_ids);
//            }else{
//                $all_cart_st_book_ids = (array)Session::get('cartBooks');
//            }
//
//            $all_cart_st_books = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher')->whereIn('id', $all_cart_st_book_ids)->get();
//
//
//            $number = count($all_cart_st_books);
//
//            Session::flash('message', "$number Cart Added");




        }
        $book_category_id = array('' => 'Select Category ') + LibBookCategory::lists('title', 'id');
        $book_author_id = array('' => 'Select Author ') + LibBookAuthor::lists('name', 'id');
        $book_publisher_id = array('' => 'Select Publisher ') + LibBookPublisher::lists('name', 'id');
        /*$lib_book_id = array('' => 'Select Book ') + LibBook::lists('title', 'id');*/

        // ----------------------

//        $id = $model->id;
//
//        if($id) {
//            $prev_added_st_book_id = Session::get('cartBooks');
//
//            $all_cart_st_book_ids = array_merge(array($id), (array)$prev_added_st_book_id);
//            array_unique($all_cart_st_book_ids);
//            Session::put('cartBooks', $all_cart_st_book_ids);
//        }else{
//            $all_cart_st_book_ids = (array)Session::get('cartBooks');
//        }
//
//        $all_cart_st_books = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher')->whereIn('id', $all_cart_st_book_ids)->get();
//
//
//        $number = count($all_cart_st_books);
//
//        Session::flash('message', 'Successfully Added to Cart!');


        //--------



        return View::make('library::student.index',compact('number','book_category_id','book_author_id','book_publisher_id','lib_book_id','model'));
    }


    public function addBookToStudentCart($id)
    {
        if($id) {
            $prev_added_st_book_id = Session::get('cartBooks');

            $all_cart_st_book_ids = array_merge(array($id), (array)$prev_added_st_book_id);
            array_unique($all_cart_st_book_ids);
            Session::put('cartBooks', $all_cart_st_book_ids);
        }else{
            $all_cart_st_book_ids = (array)Session::get('cartBooks');
        }
        //print_r($all_cart_st_book_ids);exit;

        $all_cart_st_books = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher')->whereIn('id', $all_cart_st_book_ids)->get();


        $number = count($all_cart_st_books);

        #return View::make('library::student.add_student_cart_book',compact('all_cart_st_books','number'));
        Session::flash('message', 'Successfully Added to Cart!');
        return Redirect::back()->with('number', $number);

    }

    public function viewBookToCart(){
        $all_cart_st_books = Session::get('cartBooks');

        //$all_cart_books = (object) $all_cart_books;
        return View::make('library::faculty.view_cart_book',compact('all_cart_st_books'));
    }



}
