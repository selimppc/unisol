<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $table = 'user';
    protected $fillable = array('username', 'password', 'email', 'role_id', 'department_id', 'join_date', 'last_visit','ip_address','status', 'verified_code', 'csrf_token', 'applicant_id', 'waiver_id', 'created_by', 'updated_by');
    public $errors;

    private $rules = [
        'title' => 'required|alpha|min:3',
        'body' => 'required|alpha|min:3'
        //'first_name' => 'required|alpha|min:3',
        //'last_name'  => 'required',
        //'email' => 'required|email|unique:employees', // required and must be unique in the employees table
        //'files' => 'required|mimes:jpeg,jpg,png'
        //'photo' => 'image|max:3000',
        //'photo' => 'mimes:jpg,jpeg,bmp,png'
        // .. more rules here ..
        //'password'         => 'required',
        //'password_confirm' => 'required|same:password'
        //'name'                  => 'required|between:4,16',
        //'email'                 => 'required|email',
        //'password'              => 'required|alpha_num|between:4,8|confirmed',
        //'password_confirmation' => 'required|alpha_num|between:4,8',
    ];
    public function validate($data)
    {
        // make a new validator object
        $validate = Validator::make($data, $this->rules);
        // check for failure
        if ($validate->fails())
        {
            // set errors and return false
            $this->errors = $validate->errors();
            return false;
        }
        // validation pass
        return true;
    }
    public function errors()
    {
        return $this->errors;
    }

    public function getReminderEmail()
    {
        return $this->email_address;
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }


    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }

    //Shafi
    public static function getUserName($userId){
        $data = User::find($userId);
        return $data->username;
    }




    public function relRole() {
        return $this->belongsToMany('Role', 'role_id', 'id');
    }

    public static function hasRole($key) {
        /*foreach($this->relRole as $role){
            if($role->id === $key)
            {
                return $role->title;
            }
        }
        //return false; */
        if($key){
            $role = Role::find($key);
            return $role->title;
        }
            return false;
    }


    /// TODO:: User Model Relationship
    public function relUserMeta(){
        return $this->hasOne('UserMeta');
    }

    public function relUserAcademicRecord(){
        return $this->hasMany('UserAcademicRecord');
    }

    public function relUserExtraCurricularActivity(){
        return $this->hasMany('UserExtraCurricularActivity');
    }

    public function relUserMiscellaneousInfo(){
        return $this->hasMany('UserMiscellaneousInfo');
    }

    public function relUserProfile(){
        return $this->hasOne('UserProfile');
    }

    public function relUserResetPassword(){
        return $this->hasOne('UserResetPassword');
    }

    public function relUserSupportingDoc(){
        return $this->hasOne('UserSupportingDoc');
    }

}
