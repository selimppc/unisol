<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class HrLoanHead extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table='hr_loan_head';
    protected $fillable = [
        'hr_employee_id','title','loan_amount','loan_date','monthly_repayment_amount','repayment_start_date','description','number_of_installment','status'
    ];
//'currency_id','exchange_rate',
    private $errors;
    private $rules = [
        'hr_employee_id' => 'required',
//        'currency_id' => 'required'
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