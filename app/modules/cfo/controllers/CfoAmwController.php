<?php

class CfoAmwController extends \BaseController {

    function __construct() {
        $this->beforeFilter('cfo', array('except' => array('index')));
    }
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }
    /*
    * Cfo Category
    * */

    public function index()
    {
        $data = CfoCategory::latest('id')->paginate(10);
        return View::make('cfo::cfo.category.index', compact('pageTitle', 'data'));
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
        return View::make('cfo::cfo.category.show',compact('model'));
    }

    public function editCategory($id){

        $model = CfoCategory::find($id);
        return View::make('cfo::cfo.category.edit',compact('model'));
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

    /*
    ** KnowledgeBase.............
    */

    public function indexKnowledgeBase(){

        $cfo_category_id = CfoCategory::lists('title','id');
        $knb_data = CfoKnowledgeBase::latest('id')->paginate(10);
        return View::make('cfo::cfo.knowledge_base.index', compact('cfo_category_id', 'knb_data'));

    }
    public function storeKnowledgeBase()
    {
        $data = Input::all();

        $model = new CfoKnowledgeBase();
        $model->cfo_category_id =  Input::get('cfo_category_id');

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
        return View::make('cfo::cfo.knowledge_base.show',compact('model'));
    }

    public function editKnowledgeBase($id){

        $model = CfoKnowledgeBase::find($id);
        $cfo_category_id = CfoCategory::lists('title','id');
        return View::make('cfo::cfo.knowledge_base.edit',compact('model','cfo_category_id'));
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

    /*
    ** Onsite-Help-Desk.............
    */

    public function indexHelpDesk(){

        $data = CfoOnsiteHelpDesk::with('relDepartment','relUser','relCfoCategory')->latest('id')->paginate(10);

        $status_open = CfoOnsiteHelpDesk::where('status','=','open')->get();
        $status_wt = CfoOnsiteHelpDesk::where('status','=','waiting')->get();
        $status_srvd = CfoOnsiteHelpDesk::where('status','=','served')->get();
        $srving = CfoOnsiteHelpDesk::where('status','=','serving')->get();
        $closed_status = CfoOnsiteHelpDesk::where('status','=','closed')->get();
        /*my desk...*/
        $self_desk = CfoOnsiteHelpDesk::with('relDepartment','relUser','relCfoCategory')->where('specific_user_id','=', Auth::user()->get()->id)->paginate(10);
        $assigned_user = User::with('relUserProfile')->where('id','=', Auth::user()->get()->id)->first();

        return View::make('cfo::cfo.onsite_help_desk.index',compact('data','status_open','status_wt','status_srvd','srving','closed_status','self_desk','assigned_user'));
    }

    public function createHelpDesk(){

        $users = User::ExceptLoggedUser();

        $dept_id = Department::lists('title','id');
        $cfo_category_id = CfoCategory::lists('title','id');

        $count_token = CfoOnsiteHelpDesk::count();
        $token_number = sprintf('%08s',$count_token+1);

        return View::make('cfo::cfo.onsite_help_desk.create',compact('data','cfo_category_id','dept_id','user_id','token_number','users'));
    }

    public function storeHelpDesk(){

        $data = Input::all();

        $model = new CfoOnsiteHelpDesk();

        if($model->validate($data))
        {
            DB::beginTransaction();
            try {
                $model->create($data);
                DB::commit();
                Session::flash('message', "Successfully  Added");
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

    public function showHelpDesk($id){

        $data = CfoOnsiteHelpDesk::with('relDepartment','relUser','relCfoCategory')->find($id);
        return View::make('cfo::cfo.onsite_help_desk.show',compact('data'));
    }

    public function editHelpDesk($id){

        $model = CfoOnsiteHelpDesk::find($id);
        $dept_id = Department::lists('title','id');
        $users = User::ExceptLoggedUser($id);
        $cfo_category_id = CfoCategory::lists('title','id');

        return View::make('cfo::cfo.onsite_help_desk.edit',compact('model','dept_id','users','cfo_category_id'));
    }

    public function updateHelpDesk($id){

        $data = Input::all();
        $model = CfoOnsiteHelpDesk::findOrFail($id);

        if($model->validate($data)) {
            DB::beginTransaction();
            try {
                $model->update($data);
                DB::commit();
                Session::flash('message', " Successfully updated  ");
            }
            catch ( Exception $e ){
                DB::rollback();
                Session::flash('danger', "Invalid Request !");
            }
            return Redirect::back();
        }else{
            $errors = $model->errors();
            Session::flash('errors', $errors);
            return Redirect::back()
                ->with('errors', 'invalid');
        }
    }

    public function deleteHelpDesk($id)
    {
        try {
            $data = CfoOnsiteHelpDesk::find($id);

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

    public function batchDelete()
    {
        try {
            CfoOnsiteHelpDesk::destroy(Request::get('ids'));
            return Redirect::back()->with('message', 'Successfully deleted Information!');
        } catch (exception $ex) {
            return Redirect::back()->with('danger', 'Invalid Delete Process ! At first Delete Data from related tables then come here again. Thank You !!!');
        }
    }
/*Support Desk*/

    public function cfoSupportIndex(){

        return View::make('cfo::cfo.support_head.index');
    }

    //TODO :Stop Repeated call in ajax pagination......

    public function ajaxSupportDataByStatus($status){
        $cfo_user_id = Auth::user()->get()->id;
        /*$offset = Input::get('page');
        if(!isset($offset))
            $offset = 1;*/

        $support_data = CfoSupportHead::with('relCfoCategory')
            ->whereExists(function($query) use($cfo_user_id,$status)
            {
                $query->from('cfo_category')
                    ->whereRaw('cfo_category.id = cfo_support_head.cfo_category_id')
                    ->where('cfo_category.support_user_id', $cfo_user_id)
                    ->where('cfo_support_head.status',$status);
            })
            ->paginate(3);

        if (Request::ajax()) {
            return Response::json(View::make('cfo::cfo.support_head._ajax_list', array('support_data' => $support_data))->render());
        }

        return Redirect::route('support-head.index');
    }

    public function showSupportHead($id){

        $data = CfoSupportHead::with('relCfoCategory')->find($id);
        return View::make('cfo::cfo.support_head.show',compact('data'));
    }

    public function reply($id){

        $data = CfoSupportHead::find($id);
        $reply_data = CfoSupportDetail::with('relCfoSupportHead')->where('cfo_support_head_id','=',$id)->get();

        return View::make('cfo::cfo.support_head.reply',compact('data','reply_data'));
    }

    public function replyToUser(){

        $data = Input::all();
        $support_head = CfoSupportHead::find($data['id']);

        $support_head->status = 'replied';
        $support_head->update($data);

        $model = new CfoSupportDetail();
        $model->cfo_support_head_id = $data['id'];
        $model->message = Input::get('message');
        $model->replied_by = 'staff';

        $model->support_user_id = Auth::user()->get()->id;

        if($model->save()){
        $support_code = $support_head->support_code;
            Mail::send('cfo::cfo.support_head.support_mail_notification', array('link' => $model->message,'support_code'=>$support_code), function ($message) use ($support_head) {
                $message->from('test@edutechsolutionsbd.com', 'Email Notification For Support');
                $message->to($support_head->email);
//                $message->cc('tanintjt@gmail.com');
                $message->subject('Email Notification For Support');
            });
            Session::flash('message', 'Successfully Send This Message.');
            return Redirect::back();
        }else {
            Session::flash('danger', 'Please try again');
            return Redirect::back();
        }
    }


}
