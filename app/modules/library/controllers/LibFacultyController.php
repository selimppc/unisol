<?php

class LibFacultyController extends \BaseController {

    function __construct() {
        $this->beforeFilter('', array('except' => array('')));
    }

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

    public function index()
	{
        if($this->isPostRequest()) {

            $lib_book_category_id = Input::get('lib_book_category_id');
            $lib_book_author_id = Input::get('lib_book_author_id');
            $lib_book_publisher_id = Input::get('lib_book_publisher_id');
           /*$lib_book_id = Input::get('title');*/



            $model = LibBook::with('relLibBookCategory','relLibBookAuthor','relLibBookPublisher','relLibBookTransaction');

            if (isset($lib_book_category_id) && !empty($lib_book_category_id)) $model->where('lib_books.lib_book_category_id', '=', $lib_book_category_id);
            if (isset($lib_book_author_id) && !empty($lib_book_author_id)) $model ->where('lib_books.lib_book_author_id', '=', $lib_book_author_id);
            if (isset($lib_book_publisher_id) && !empty($lib_book_publisher_id)) $model->where('lib_books.lib_book_publisher_id', '=', $lib_book_publisher_id);
            $model = $model->get();
           //print_r($model);exit;
        }else{
            $model = LibBook::with('relLibBookCategory','relLibBookAuthor','relLibBookPublisher')->latest('id')->get();
        }
            $lib_book_category_id = array('' => 'Select Category ') + LibBookCategory::lists('title', 'id');
            $lib_book_author_id = array('' => 'Select Author ') + LibBookAuthor::lists('name', 'id');
            $lib_book_publisher_id = array('' => 'Select Publisher ') + LibBookPublisher::lists('name', 'id');

        if(Session::get('cartBooks')){
            $all_cart_book_ids = Session::get('cartBooks');
            $all_cart_books = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher')->whereIn('id', $all_cart_book_ids)->get();
        }else{
            $all_cart_books = array();
        }

        return View::make('library::faculty.index',compact('lib_book_category_id','lib_book_author_id','lib_book_publisher_id','lib_book_id','model', 'all_cart_books'));
	}

	public function addBookToCart($id)
	{
        if($id) {
            $prev_added_book_id = Session::get('cartBooks');

            $all_cart_book_ids = array_merge(array($id), (array)$prev_added_book_id);
            //array_unique($all_cart_book_ids);
            Session::put('cartBooks',  array_unique($all_cart_book_ids));
        }else{
            $all_cart_book_ids = (array)Session::get('cartBooks');
        }
        $all_cart_books = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher')->whereIn('id', $all_cart_book_ids)->get();

        count($all_cart_books);

        return Redirect::back();
	}

    public function viewBookToCart(){

        $all_cart_book_ids = Session::get('cartBooks');
        $all_cart_books = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher')

            ->whereIn('id', $all_cart_book_ids)->get();

        $sum = $all_cart_books->sum('digital_sell_price');
        $number = count($all_cart_books);

        $remove_paid_book = LibBookFinancialTransaction::join('lib_book_transaction',function($query){
            $query->on('lib_book_financial_transaction.lib_book_transaction_id', '=', 'lib_book_transaction.id');
        })->join('lib_books', function($join){
            $join->on('lib_books.id', '=', 'lib_book_transaction.lib_books_id');

        })
//            ->where('lib_book_financial_transaction.id','=', $all_cart_book_ids)
           ->get();
        //print_r($remove_paid_book);exit;



//        $course_list = ExmExamList::join('course_conduct', function($query) {
////            $query->on('exm_exam_list.course_conduct_id', '=', 'course_conduct.id');
////        })->join('course', function($join){
////            $join->on('course.id', '=', 'course_conduct.course_id');
////        })
////            ->where('exm_exam_list.id', $id)
////            ->select(DB::raw('exm_exam_list.course_conduct_id as id, course.title as title'))
////            ->lists('title','id');


            return View::make('library::faculty.my_cart', compact('all_cart_books', 'number', 'id', 'sum', 'all_cart_book_ids'));
        }

    public function storeBookTransaction(){
        $all_cart_book_ids = Session::get('cartBooks');


        $all_cart_books = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher')
            ->whereIn('id',$all_cart_book_ids)
            ->get();
        $tr_error = '';
        $tr_info = '';
        if($all_cart_book_ids){
           foreach($all_cart_books as $key => $cb){
               $transaction = new LibBookTransaction();
               $transaction->user_id = Auth::user()->get()->id;
               $transaction->lib_books_id = $cb->id;
               $transaction->issue_date = date('d-m-y H:i:s');
               $transaction->status = 'purchase';

               if ($transaction->save())
               {
                   // save to lib_book_financial_transaction table
                   $f_transaction = new LibBookFinancialTransaction();
                   $f_transaction->lib_book_transaction_id = $transaction->id;
                   $f_transaction->amount = $cb->digital_sell_price;
                   $f_transaction->trn_type = 'commercial';
                   $f_transaction->status = 'paid';
                   $f_transaction->save();
                   if($f_transaction->save())
                   {
                       $tr_info[] = 'Book "'.$cb->title.'" is paid. You can download it.';
                       if (($key = array_search($cb->id, $all_cart_book_ids)) !== false) {
                           unset($all_cart_book_ids[$key]);
                       }

                   }else{
                       $tr_error[] = 'At transaction of Book "'.$cb->title.'" is done but payment is not done. So please try once again.';
                   }
               }else{
                   $tr_error[] = 'Error at transaction of Book "'.$cb->title.'". So please try once again.';
               }
           }
            // set if any item is not successfully added.
            Session::set('cartBooks', $all_cart_book_ids);

            if($tr_error){
                Session::flash('errors', implode("<br />", $tr_error));
                return Redirect::back();
            }elseif($tr_info){
                Session::flash('errors', implode("<br />", $tr_info));
                return Redirect::back();
            }else{
                return Redirect::back();
            }

       }
    }

	public function checkoutByFaculty($all_cart_book_ids)
    {
        $all_cart_book_ids = Session::get('cartBooks');
        //print_r($all_cart_book_ids);exit;

        $book_id = LibBook::where('id',$all_cart_book_ids)->get();

        //print_r($book_id);exit;
    }

    public function getBookDownload($book_id)
    {
        $download = LibBook::find($book_id);
        $file = $download->file;
        $path = public_path("img/" . $file);
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::download($path, $file , $headers);
    }

    public function removeBookFromCart($id)
    {
        $all_cart_book_ids = Session::get('cartBooks');

        // Remove array item by array_search
        if (($key = array_search($id, $all_cart_book_ids)) !== false) {
            unset($all_cart_book_ids[$key]);
        }

        Session::set('cartBooks', $all_cart_book_ids);

        return Redirect::back();
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
