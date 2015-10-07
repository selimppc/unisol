<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserAcademicRecord extends Eloquent {

    protected $table = 'user_academic_record';

    protected $fillable = [
        'level_of_education', 'degree_name', 'institute_name', 'board_type', 'result_type',

    ];

    public function relUser(){
        return $this->belongsTo('User', 'user_id', 'id');
    }


    private $errors;

    /*private $rules = [

        'level_of_education' => 'required|unique:user_academic_record,',
        'degree_name' => 'required',
        'institute_name' => 'required',
        'board_type' => 'required',
        'result_type' => 'required',
        'roll_number' => 'required',
        'year_of_passing' => 'required',
        'duration' => 'required',

        ];*/
    public static function rules ($id=0, $merge=[]) {
        return array_merge(
            [
                'level_of_education' => 'required|unique:user_academic_record,level_of_education'.($id ? ",$id" : ''),
                'degree_name' => 'required',
                'institute_name' => 'required',
                'board_type' => 'required',
                'result_type' => 'required',
                'roll_number' => 'required',
                'year_of_passing' => 'required',
                'duration' => 'required',
            ],
        $merge);
    }


    public function validate($data, $id=0)
    {
        $validate = Validator::make($data, $this->rules($id));
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
