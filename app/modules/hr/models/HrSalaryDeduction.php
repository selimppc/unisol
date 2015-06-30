<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class HrSalaryDeduction extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table='hr_salary_deduction';
    protected $fillable = [
        'hr_employee_id','title','type','hr_loan_head_id','hr_salary_advance_id','amount','date','status'
    ];

    private $errors;
    private $rules = [
        'hr_employee_id' => 'required',
        'hr_loan_head_id' => 'required',
        'hr_salary_advance_id' => 'required',

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

    //is this relation ok ?
    public function relHrEmployee(){
        return $this->belongsTo('HrEmployee','hr_employee_id','id');
    }

    public function relHrLoanHead(){
        return $this->belongsTo('HrLoanHead','hr_loan_head_id','id');
    }

    public function relHrSalaryAdvance(){
        return $this->belongsTo('HrSalaryAdvance','hr_salary_advance_id','id');
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
    public function getDateAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d'); //Change the format to whichever you desire
    }
}