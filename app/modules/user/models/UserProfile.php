<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserProfile extends Eloquent {

    protected $table = 'user_profile';

    protected $fillable = [
        'user_id','first_name','middle_name','last_name','date_of_birth','gender','image','city','state','country','zip_code'
    ];
    private $errors;
    private $rules = [
        'zip_code' => 'required|numeric',
        'gender' => 'required',
//        'image' => 'required'
    ];

    public function validate($data)
    {
        $validate = Validator::make($data, $this->rules);
        if ($validate->fails())
        {
            $this->errors = $validate->errors();
            return false;
        }
        return true;
    }
    public function errors()
    {
        return $this->errors;
    }

    //TODO : Model Relationship

    public function relUser(){
        return $this->belongsTo('User');
    }

    public function relCountry(){
        return $this->belongsTo('Country','country_id','id');
    }


    public static function boot(){
        parent::boot();
        if(Auth::user()->check()){
            static::creating(function($query){
                $query->created_by = Auth::user()->get()->id;
                $query->updated_by = Auth::user()->get()->id;
            });
            static::updating(function($query){
                $query->updated_by = Auth::user()->get()->id;
            });
        }
    }
}
