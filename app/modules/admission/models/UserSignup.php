<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserSignup extends Eloquent implements UserInterface, RemindableInterface {


    protected $table = 'user_signup';


    public function getReminderEmail()


    {
        // TODO: Implement getReminderEmail() method.

        return $this->email;

    }
    public function getAuthIdentifier()
    {
        // TODO: Implement getAuthIdentifier() method.
    }

    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.
        return $this->password;


    }

    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.

        return $this->getKey();
    }

    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }



}
