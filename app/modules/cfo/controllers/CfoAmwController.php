<?php

class CfoAmwController extends \BaseController {

//    function __construct() {
//        $this->beforeFilter('cfo', array('except' => array('indexHelpDesk')));
//    }
    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
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

        return View::make('cfo::onsite_help_desk.index',compact('data','status_open','status_wt','status_srvd','srving','closed_status','self_desk','assigned_user'));
    }

    public function createHelpDesk(){

        $users = User::ExceptLoggedUser();

        $dept_id = Department::lists('title','id');
        $cfo_category_id = CfoCategory::lists('title','id');

        $count_token = CfoOnsiteHelpDesk::count();
        $token_number = sprintf('%08s',$count_token+1);

        return View::make('cfo::onsite_help_desk.create',compact('data','cfo_category_id','dept_id','user_id','token_number','users'));
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
        return View::make('cfo::onsite_help_desk.show',compact('data'));
    }

    public function editHelpDesk($id){

        $model = CfoOnsiteHelpDesk::find($id);
        $dept_id = Department::lists('title','id');
        $users = User::ExceptLoggedUser($id);
        $cfo_category_id = CfoCategory::lists('title','id');

        return View::make('cfo::onsite_help_desk.edit',compact('model','dept_id','users','cfo_category_id'));
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
        $cfo_user_id = Auth::user()->get()->id;
        $support_data = CfoSupportHead::with('relCfoCategory')
            ->whereExists(function($query) use($cfo_user_id)
            {
                $query->from('cfo_category')
                    ->whereRaw('cfo_category.id = cfo_support_head.cfo_category_id')
                    ->where('cfo_category.support_user_id', $cfo_user_id)
                    ->whereIn('status', array('new', 'open', 'replied'));
            })
//            ->orderBy('status')
            ->get();

        return View::make('cfo::support_head.staff.index',compact('support_data'));
    }

    public function reply($id){

        $data = CfoSupportHead::find($id);
        $reply_data = CfoSupportDetail::with('relCfoSupportHead')->where('cfo_support_head_id','=',$id)->get();

        return View::make('cfo::support_head.staff.reply',compact('data','reply_data'));
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
            Mail::send('cfo::support_head.staff.support_mail', array('link' => $model->message,'username'=>$support_head->name,'support_code'=>$support_code), function ($message) use ($support_head) {
                $message->from('test@edutechsolutionsbd.com', 'Email Notification For Support');
                $message->to($support_head->email);
                $message->cc('tanintjt@gmail.com');
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
