<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class HrSalaryTransactionHead extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table='hr_salary_transaction_head';
    protected $fillable = [
        'trn_number','hr_employee_id','date','year_id','period','total_amount','status'
    ];

    private $errors;
    private $rules = [
        'hr_employee_id' => 'required',

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

    public function relYear(){
        return $this->belongsTo('Year','year_id','id');
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