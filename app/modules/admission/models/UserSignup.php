<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/8/2015
 * Time: 10:55 AM
 */

class UserSignup extends Eloquent {

    protected $fillable = ['username', 'email', 'password', 'confirmation_code'];
    protected $table = 'user_signup';


} 