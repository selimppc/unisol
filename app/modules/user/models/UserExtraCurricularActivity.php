<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserExtraCurricularActivity extends Eloquent {

    protected $table = 'user_extra_curricular_activity';


    protected $fillable = [
        'user_id', 'title', 'description', 'achievement', 'certificate_medal',

    ];

    private $errors;
    private $rules = [
//        'zip_code' => 'required|numeric',
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


    public function relUser(){
        return $this->belongsTo('User', 'user_id', id);
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
