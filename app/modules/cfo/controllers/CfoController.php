<?php

class CfoController extends \BaseController {


    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }


    public function listOfKnowledgeBase()
	{
        $model = new CfoKnowledgeBase();

        if($this->isPostRequest()) {
            $search_key = Input::get('keywords');

            if(($search_key)) {
                $data = CfoKnowledgeBase::where('title', 'LIKE', '%' . $search_key . '%')
                    ->orWhere('description', 'LIKE', '%' . $search_key . '%')
                    ->orWhere('keywords', 'LIKE', '%' . $search_key . '%')
//                    ->take(5)
                    ->get();
            } else{
                Session::flash('info', 'No Data Found!');
                return Redirect::back();
            }
        }else{
            $data = CfoKnowledgeBase::latest('id')->paginate(10);
        }
        Input::flash();
        return View::make('cfo::user.knowledge_base.knb_list',compact('data','model'));
	}

    public function detailsKb($kb_id){

        $data = CfoKnowledgeBase::where('id','=',$kb_id)->first();
        $title = CfoKnowledgeBase::findOrFail($data->id)->title;

        return View::make('cfo::user.knowledge_base.details_knb',compact('data','title'));
    }

    /*
     ** Support Head.............
     */

    public function createSupportHead(){
        $cfo_category_id = CfoCategory::lists('title','id');
        return View::make('cfo::user.support_head._form',compact('cfo_category_id'));
    }

    public function storeSupportHead(){

        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->Fails()) {
            Session::flash('danger', 'Your Support Request Do Not Proceeded Successfully,Please Try Again!!!');
            return Redirect::to('cfo/support-head/create')->withErrors($validator)->withInput();
        } else {
            $support_code = uniqid();
            $model1 = new CfoSupportHead();
            $model1->cfo_category_id = Input::get('cfo_category_id');
            $model1->name = Input::get('name');
            $model1->email = Input::get('email');
            $model1->phone = Input::get('phone');
            $model1->subject = Input::get('subject');
            $model1->priority = Input::get('priority');
            $model1->status = Input::get('status');
            $model1->support_code = $support_code;

            /*CfoSupportDetail*/
            if ($model1->save()) {
                $model2 = new CfoSupportDetail();
                $model2->cfo_support_head_id = $model1->id;
                $model2->message = Input::get('message');
                $model2->replied_by = 'user';

                if($model2->save()){
                    /*get 'support_email' using cfo_category from $model1 */
                    $category_cfo = CfoCategory::find($model1->cfo_category_id);
                   /*send mail to user*/
                    Mail::send('cfo::user.support_head.user_notification', array('link' => $support_code), function ($message) use ($model1) {
                         $message->from('test@edutechsolutionsbd.com', 'Email Notification For Support Code');
                         $message->to($model1->email);
                         $message->cc('tanintjt@gmail.com');
                         $message->subject('Email Notification For Support Code');
                    });
                    /*send mail to cfo-staff*/
                    Mail::send('cfo::cfo.support_head.cfo_notification', array('link' => $support_code), function ($message) use ($category_cfo) {
                         $message->from('test@edutechsolutionsbd.com', 'Email Notification For Support User');
                         $message->to($category_cfo->support_email);
                         $message->cc('tanintjt@gmail.com');
                         $message->subject('Email Notification For Support User');
                    });
                }
                Session::flash('message', 'Successfully Proceeded Your Support Request. Please Check Your Email.');
                return Redirect::back();
            } else {
                Session::flash('danger', 'Please try again');
                return Redirect::back();
            }
        }
    }

    public function commentsToCfo(){

        $input_sc = Input::get('support_code');
        $data = CfoSupportHead::where('support_code','=', $input_sc)->first();
        if($data){
            $reply_data = CfoSupportDetail::with('relCfoSupportHead')->whereExists(function($query) use($input_sc)
            {
                $query->from('cfo_support_head')
                    ->whereRaw('cfo_support_detail.cfo_support_head_id = cfo_support_head.id')
                    ->where('cfo_support_head.support_code', $input_sc);
            })->get();
            return View::make('cfo::user.support_head.comment_to_cfo',compact('data','reply_data'));
        }
        else{
            Session::flash('message', 'This Support Code Does Not Exist.');
            return Redirect::back();
        }
    }

    public function responseByUser(){

        $data = Input::all();
        $support_head = CfoSupportHead::find($data['id']);

        $support_head->status = 'open';
        $support_head->update($data);

        $model = new CfoSupportDetail();
        $model->cfo_support_head_id = $data['id'];
        $model->message = Input::get('message');
        $model->replied_by = 'user';

        if($model->save()){
            $category_cfo = CfoCategory::find($support_head->cfo_category_id);
            Mail::send('cfo::cfo.support_head.support_mail_notification', array('link' => $model->message), function ($message) use ($category_cfo) {
                $message->from('test@edutechsolutionsbd.com', 'Email Notification For Support');
                $message->to($category_cfo->support_email);
                $message->cc('tanintjt@gmail.com');
                $message->subject('Email Notification For Support');
            });
            Session::flash('message', 'Successfully Send This Message.');
            return Redirect::route('support-head.create');
        }else {
            Session::flash('danger', 'Please try again');
            return Redirect::back();
        }
    }

    public function changeStatus($id, $value){

        if($value=='closed'){
            $model =  CfoSupportHead::find($id);
            $model->status = $value;
            $model->save();
        }
        if(Auth::user()->get()->id){
            return Redirect::route('support-head.index');
        }else{
            return Redirect::route('support-head.create');
        }
    }

}
