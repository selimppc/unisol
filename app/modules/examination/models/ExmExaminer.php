<?php

class ExmExaminer extends \Eloquent
{
    protected $table = 'exm_examiner';

    protected $fillable = [
        'exm_exam_list_id', 'user_id', 'type', 'assigned_by','deadline','note','status'
    ];

    public function relExmExamList(){
        return $this->belongsTo('ExmExamList','exm_exam_list_id','id');
    }

    public function relUser(){
        return $this->belongsTo('User','user_id','id');
    }


    private $errors;
    private $rules = array(

        'exm_exam_list_id'  => 'required',
        'user_id'  => 'required',

        'type'  => 'required',
        'assigned_by'  => 'required',
        'deadline'  => 'required',
       // 'note'  => 'required',
        'status'  => 'required',

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

    public function scopeExamName($query , $exm_exam_list_id){
        $query = ExmExamList::select(DB::raw('title AS exam_name'))
            ->where('exm_exam_list.id', '=', $exm_exam_list_id)
            ->first()->exam_name;
        return $query;
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


    public function scopeExaminersList($query , $batch_id, $type = 'both'){
        $query = ExmExaminer::join('user_profile', function($join)
        {
            $join->on('exm_examiner.user_id', '=', 'user_profile.user_id');
        })
            ->where('exm_examiner.batch_id', '=', $batch_id)
            ->whereIn('exm_examiner.type', array($type, 'both'))
            ->select(DB::raw('CONCAT(user_profile.first_name, " ", user_profile.middle_name, " ", user_profile.last_name) AS full_name, exm_examiner.user_id as id'))
            ->lists('full_name', 'id');
        return $query;
    }
}
