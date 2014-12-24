<?php

class User extends Eloquent {



	protected $table = 'user';

    //Shafi
    public static function getUserName($userId){
        $data = User::find($userId);
        return $data->username;
    }



}
