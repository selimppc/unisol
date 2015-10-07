<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserMiscellaneousInfo extends Eloquent {

    protected $table = 'user_miscellaneous_info';

    public function relUser(){
        return $this->belongsTo('User');
    }

    protected $fillable = [
        'user_id', 'ever_admit_this_university', 'ever_dismiss', 'academic_honors_received', 'ever_admit_other_university','admission_test_center',

    ];

    private $errors;
    private $rules = [
       'admission_test_center' => 'required',
//        'gender' => 'required',
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

    public static function boot(){
        parent::boot();
        static::creating(function($query){
            $query->created_by = Auth::user()->get()->id;
            $query->updated_by = Auth::user()->get()->id;
        });
        static::updating(function($query){
            $query->updated_by = Auth::user()->get()->id;
        });
    }


}
