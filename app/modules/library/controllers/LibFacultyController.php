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
        $user_id = Auth::user()->get()->id;
        $model = new LibBook();

        if($this->isPostRequest()) {

            $lib_book_category_id = Input::get('lib_book_category_id');
            $lib_book_author_id = Input::get('lib_book_author_id');
            $lib_book_publisher_id = Input::get('lib_book_publisher_id');

            $model = $model->with('relLibBookCategory','relLibBookAuthor','relLibBookPublisher');
            if (isset($lib_book_category_id) && !empty($lib_book_category_id)) $model->where('lib_books.lib_book_category_id', '=', $lib_book_category_id);
            if (isset($lib_book_author_id) && !empty($lib_book_author_id)) $model ->where('lib_books.lib_book_author_id', '=', $lib_book_author_id);
            if (isset($lib_book_publisher_id) && !empty($lib_book_publisher_id)) $model->where('lib_books.lib_book_publisher_id', '=', $lib_book_publisher_id);
            //$model = $model->get();
        }else{
            $model = $model->with('relLibBookCategory','relLibBookAuthor','relLibBookPublisher')->latest('lib_books.id');
        }

        $model = $model->leftJoin('lib_book_transaction as lbt', function($query)  use($user_id){
            $query->on('lbt.lib_books_id', '=', 'lib_books.id');
            $query->where('lbt.user_id',  '=', $user_id);
        });
        $model = $model->leftJoin('lib_book_financial_transaction as lbft', function($query)  use($user_id){
            $query->on('lbft.lib_book_transaction_id', '=', 'lbt.id');
        });

        $model = $model->get(array('lib_books.id as id', 'lib_books.digital_sell_price as digital_sell_price',
            'lib_books.title as title', 'lib_books.isbn as isbn', 'lib_books.lib_book_category_id',
            'lib_books.lib_book_author_id', 'lib_books.lib_book_publisher_id', 'lib_books.edition', 'lib_books.book_type',
            'lib_books.book_price', 'lib_books.is_rented', 'lib_books.commercial', 'lbt.user_id', 'lbt.lib_books_id',
            'lbt.issue_date', 'lbt.status as lbtStatus', 'lbft.lib_book_transaction_id', 'lbft.amount', 'lbft.trn_type',
            'lbft.status as tbftStatus'
        ));

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

            Session::put('cartBooks',  array_unique($all_cart_book_ids));
        }else{
            $all_cart_book_ids = (array)Session::get('cartBooks');
        }
        $all_cart_books = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher')->whereIn('id', $all_cart_book_ids)->get();

        count($all_cart_books);

        return Redirect::back();
	}

    public function checkout(){

        $all_cart_book_ids = Session::get('cartBooks');
        $all_cart_books = LibBook::with('relLibBookCategory', 'relLibBookAuthor', 'relLibBookPublisher')

            ->whereIn('id', $all_cart_book_ids)->get();

        $sum = $all_cart_books->sum('digital_sell_price');
        $number = count($all_cart_books);

            return View::make('library::faculty.checkouts', compact('all_cart_books', 'number', 'id', 'sum', 'all_cart_book_ids'));
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
                Session::flash('info', implode("<br />", $tr_info));
                return Redirect::route('faculty.my-book');
            }else{
                return Redirect::back();
            }
       }
    }

	public function viewMyBook()
    {
        $my_cart_books = LibBookTransaction::with('relLibBook','relLibBookFinancialTransaction')
            ->get();
        return View::make('library::faculty.my_book',compact('my_cart_books'));
    }

        public function downloadBook($book_id)
    {
        $download = LibBook::find($book_id);
        $file = $download->file;
        $path = public_path("library/" . $file);
        $headers = array(
            'Content-Type: application/pdf',
        );
        //$file_name = $download->title;
        return Response::download($path, $file, $headers);

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

    public function viewBook($book_id)
    {
        $download = LibBook::find($book_id);


        $file = $download->file;
        if($file){
            $path = public_path("library/" . $file);
            $headers = array(
                'Content-Type: application/pdf',
            );
            /*To open and read and download pdf*/
            return Response::make(file_get_contents($path), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; '.$file,
            ]);
        }else{
            Session::flash('info', 'No File Found');
            return Redirect::back();
        }

    }





}
