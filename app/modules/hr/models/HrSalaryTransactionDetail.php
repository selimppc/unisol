<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class HrSalaryTransactionDetail extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table='hr_salary_transaction_detail';
    protected $fillable = [
        'salary_trn_hd_id','type','hr_salary_allowance_id','hr_salary_deduction_id','hr_over_time_id','hr_bonus_id','percentage','amount'
    ];

    private $errors;
    private $rules = [
//        'hr_salary_allowance_id' => 'required',
//        'salary_trn_hd_id' => 'required',
//        'hr_over_time_id' => 'required',
//        'hr_bonus_id' => 'required',
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
    public function relHrSalaryTransactionHead(){
        return $this->belongsTo('HrSalaryTransactionHead','salary_trn_hd_id','id');
    }

    public function relHrSalaryAllowance(){
        return $this->belongsTo('HrSalaryAllowance','hr_salary_allowance_id','id');
    }

    public function relHrSalaryDeduction(){
        return $this->belongsTo('HrSalaryDeduction','hr_salary_deduction_id','id');
    }

    public function relHrOverTime(){
        return $this->belongsTo('HrOverTime','hr_over_time_id','id');
    }

    public function relHrBonus(){
        return $this->belongsTo('HrBonus','hr_bonus_id','id');
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