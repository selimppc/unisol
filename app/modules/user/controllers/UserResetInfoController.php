<?php

class UserResetInfoController extends \BaseController {

    protected function isPostRequest()
    {
        return Input::server("REQUEST_METHOD") == "POST";
    }

   //********************** Forgot password *****************************

    public function forgot_password()
    {
        return View::make('user::forgot_password.email_form');
    }

    public function user_password_reminder_mail()
    {
        $email = Input::get('email');
        $user = DB::table('user')->where('email', '=', $email)->first();
        $applicant = DB::table('applicant')->where('email', '=', $email)->first();

        if($user || $applicant){
            $input_data = [
                isset($user->id) ? 'user_id': 'applicant_id' => isset($user->id) ? $user->id : $applicant->id,
                'reset_password_token'=> str_random(30),
                'reset_password_expire'=> date("Y-m-d h:i:s", (strtotime(date('Y-m-d h:i:s', time()))+(60*30))),
                'reset_password_time'=> date('Y-m-d h:i:s', time()),
                'status'=> '2',
            ];
            $model = isset($user->id) ? new UserResetPassword() : new ApplicantResetPassword();

            if($model->create($input_data)) {
                Mail::send('user::forgot_password.email_notification', array('link' =>$input_data['reset_password_token']),
                    function($message) use ($applicant,$user)
                {
                    $message->from('test@edutechsolutionsbd.com', 'Sattar University');
                    $message->to(isset($user) ? $user->email: $applicant->email);
                    $message->cc('tanintjt@gmail.com', 'Tanin');
                    $message->replyTo('test@edutechsolutionsbd.com','Sattar University');
                    $message->subject('Forgot Password Reset Mail');
                });
            }
            return View::make('user::forgot_password.flash_message');
        }else{
            Session::flash('danger', 'The Specified Email address Is not Listed On Your Account. Please Try Again.');
            return Redirect::back();
        }
    }
    //forgot password : confirm
    public function user_password_reset_confirm($reset_password_token)
    {
        $user = UserResetPassword::where('reset_password_token','=',$reset_password_token)->first();
        $applicant = ApplicantResetPassword::where('reset_password_token','=',$reset_password_token)->first();
        $current_time = date('Y-m-d h:i:s', time());

        if(isset($user)||isset($applicant)) {
            $input_data = [
                isset($user->id) ? 'user_id': 'applicant_id' => isset($user->id) ? $user->id : $applicant->id,
                'reset_password_token'=> str_random(30),
                'reset_password_expire'=> date("Y-m-d h:i:s", (strtotime(date('Y-m-d h:i:s', time()))+(60*30))),
                'reset_password_time'=> date('Y-m-d h:i:s', time()),
                'status'=> '2',
            ];
            if ($input_data['reset_password_expire'] > $current_time && $input_data['status'] == 2) {
                $user_id = $input_data['user_id'];
                return View::make('user::forgot_password.new_password_form',compact('user_id'));
            }
            if($input_data['reset_password_expire'] < $current_time){
                Session::flash('danger', 'Time Expired.Please Try Again.');
                return View::make('user::forgot_password.email_form');
            }
            if($input_data['status'] == 0) {
                Session::flash('danger', 'Session Expired! You can Not Access To This link.Please Try Again.');
                return View::make('user::forgot_password.email_form');
            }
        }else{
            Session::flash('danger', 'Invalid Password Reset Link.Please Try Again.');
            return View::make('user::forgot_password.email_form');
        }
    }
    // forgot password: get new password action:update
    public function save_new_password()
    {
        $data = Input::all();

        $user_id = $data['user_id'];
        $model = User::findOrFail($user_id);
        $rules = array(
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        );
        $validator = Validator::make(Input::all(), $rules);

        if($validator->passes()) {
            DB::beginTransaction();
            try {
                //update status and password
                if($model->update($data)){
                    DB::table('user_reset_password')->where('user_id', '=', $user_id)->update(array('status' => 0));
                }
                DB::commit();
                Session::flash('message','You have reset your password successfully. You may signin now.');
                return Redirect::route('user/login');
            }
            catch ( Exception $e ){
                //If there are any exceptions, rollback the transaction
                DB::rollback();
                Session::flash('danger', "Invalid Request! Please Try Again.");
            }
            return Redirect::back();
        }else{
            return Redirect::back()->with('danger', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }

//********************* Forgot UserName ***********************************

    public function forgot_username()
    {
        return View::make('user::forgot_username.email_form');
    }

    public  function username_reminder_mail(){

        $rules = array(
            'email' => 'required|email|exists:user',
        );
        $validator = Validator::make(Input::all(), $rules);

        if($validator->Fails()){
            Session::flash('warning', 'The Specified Email address Is not Listed On Your Account. Please Try Again.');
            return Redirect::back();
        }else{
            $user_data = User::where('email', Input::get('email'))->first();

            Mail::send('user::forgot_username.email_notification', array('link' =>$user_data->username),  function($message) use ($user_data)
            {
                $message->from('test@edutechsolutionsbd.com', 'Sattar University');
                $message->to($user_data->email,$user_data->username);
                $message->cc('tanintjt@gmail.com', 'Tanin');
                $message->replyTo('test@edutechsolutionsbd.com','Sattar University');
                $message->subject('UserName Reminder Mail');
            });
        }
        return View::make('user::forgot_username._confirmation',compact('user_data'));
    }
}
