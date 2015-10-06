<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserMeta extends Eloquent {

    protected $table = 'user_meta';

    protected $fillable = [
        'user_id', 'fathers_name', 'mothers_name', 'fathers_occupation', 'fathers_phone','freedom_fighter','mothers_occupation','mothers_phone',
         'national_id','driving_licence','passport','place_of_birth','marital_status','nationality','religion','signature','present_address','permanent_address'
    ];

    private $errors;
    private $rules = [
        'national_id' => 'required|max:3',
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
        return $this->belongsTo('User');
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
