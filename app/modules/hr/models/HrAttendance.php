<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02-Jul-15
 * Time: 4:06 PM
 */

class HrAttendance  extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table=' hr_attendance';
    protected $fillable = [
        'hr_employee_id','date','sign_in_time','sign_out_time','lunch_break_out_time','lunch_break_in_time','break_out_time','break_in_time','note'
    ];

    private $errors;
    private $rules = [
        //'hr_employee_id' => 'required',
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

    public function relHrEmployee(){
        return $this->belongsTo('HrEmployee','hr_employee_id','id');
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