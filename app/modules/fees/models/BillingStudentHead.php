<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class BillingStudentHead extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table = 'billing_student_head';

    protected $fillable = [
        'student_user_id', 'billing_schedule_id','payment_option_id', 'tax_rate',
        'tax_amount', 'discount_rate', 'discount_amount', 'total_cost' , 'status'
    ];
    private $errors;
    private $rules = [
        'student_user_id' => 'required|integer',
        'billing_schedule_id' => 'required|integer',
        'total_cost' => 'numeric',
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

    public function relUser(){
        return $this->belongsTo('User', 'student_user_id', 'id');
    }
    public function relBillingSchedule(){
        return $this->belongsTo('BillingSchedule', 'billing_schedule_id', 'id');
    }
    public function relBillingStudentDetail(){
        return $this->HasMany('BillingStudentDetail','billing_student_head_id', 'id');
    }
    public function relPaymentOption(){
        return $this->belongsTo('PaymentOption', 'payment_option_id', 'id');
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