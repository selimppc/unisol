<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01-Jul-15
 * Time: 2:26 PM
 */

class HrLeave extends Eloquent{
    //TODO :: model attributes and rules and validation
    protected $table = 'hr_leave';
    protected $fillable = [
      'hr_employee_id','forward_to','hr_leave_type_id','reason','leave_duration','from_date','to_date','alt_contact_no','alt_hr_employee_id','status'
    ];
    private $errors;
    private $rules = [
//        'forward_to' => 'required',
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

    public function getFromDateAttribute($from_date) {
        return Carbon::parse($from_date)->format('d-M-Y'); //Change the format to whichever you desire
    }

    public function getToDateAttribute($to_date) {
        return Carbon::parse($to_date)->format('d-M-Y'); //Change the format to whichever you desire
    }

    //TODO : Model Relationship

    public function relHrLeaveType(){
        return $this->belongsTo('HrLeaveType', 'hr_leave_type_id', 'id');
    }

    public function relHrEmployee(){
        return $this->belongsTo('HrEmployee','hr_employee_id','id');
    }

    public function relHrAltEmployee(){
        return $this->belongsTo('HrEmployee','alt_hr_employee_id','id');
    }

    public function relUser(){
        return $this->belongsTo('User','forward_to','id');
    }

    // TODO : user info while saving data into table
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

    //TODO : Scope Area



} 