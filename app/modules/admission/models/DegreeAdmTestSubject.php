<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/5/2015
 * Time: 2:45 PM
 */

class DegreeAdmTestSubject extends Eloquent{

    protected $table='degree_admtest_subject';

    private $errors;

    private $rules = array(

//        'exm_exam_list_id'  => 'required',
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



    public function relDegree(){
        return $this->belongsTo('Degree','degree_id','id');
    }

    public function relAdmTestSubject(){
        return $this->belongsTo('AdmTestSubject','admtest_subject_id','id');
    }

    public static function boot(){
        parent::boot();
        static::creating(function($query){
            if(Auth::user()->check()){
                $query->created_by = Auth::user()->get()->id;
            }elseif(Auth::applicant()->check()){
                $query->created_by = Auth::applicant()->get()->id;
            }
        });
        static::updating(function($query){
            if(Auth::user()->check()){
                $query->updated_by = Auth::user()->get()->id;
            }elseif(Auth::applicant()->check()){
                $query->updated_by = Auth::applicant()->get()->id;
            }
        });
    }

} 