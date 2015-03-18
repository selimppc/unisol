<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class BillingTuitionDetails extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table = 'billing_tuition_details';

    protected $fillable = [
        'billing_summary_student_id', 'student_user_id', 'year_id', 'month',
    ];
    private $errors;
    private $rules = [
        'billing_summary_student_id' => 'required|integer',
        'student_user_id' => 'required|integer',
        'year_id' => 'required|integer',
        'month' => 'alpha_dash',
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

    public function relBillingSummaryStudent(){
        return $this->belongsTo('BillingSummaryStudent', 'billing_summary_student_id', 'id');
    }
    public function relUser(){
        return $this->belongsTo('User', 'student_user_id', 'id');
    }
    public function relYear(){
        return $this->belongsTo('Year', 'year_id', 'id');
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