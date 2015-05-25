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

        echo "Hi";exit;

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
        /*$lib_book_id = array('' => 'Select Book ') + LibBook::lists('title', 'id');*/

        return View::make('library::student.index',compact('book_category_id','book_author_id','book_publisher_id','lib_book_id','model'));
    }

}
