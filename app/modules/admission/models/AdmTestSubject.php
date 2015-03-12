<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/5/2015
 * Time: 2:47 PM
 */

class AdmTestSubject extends Eloquent{

    protected $table='admtest_subject';

    private $errors;

    private $rules = array(


//        'user_id'  => 'required',

//        'type'  => 'required',
//        'assigned_by'  => 'required',
//        'deadline'  => 'required',
//        'note'  => 'required',
//        'status'  => 'required',

    );

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



    public static function getTestSubjectName($semId)
    {
        $data = AdmTestSubject::find($semId);
        return $data->title;
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