<?php
/**
 * Created by PhpStorm.
 * User: SELIM
 * Date: 1/21/2015
 * Time: 10:33 AM
 */

//use App\Models\User;
use User;

class ValidationController extends BaseController {

    public function getCheckUsername()
    {
        if(Request::ajax()) {
            $user = User::where('username', Input::get('username'))->get();
            if($user->count()) {
                return Response::json(array('msg' => 'true'));
            }
            return Response::json(array('msg' => 'false'));
        }

    }


}