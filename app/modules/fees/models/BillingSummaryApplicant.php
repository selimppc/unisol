<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class BillingSummaryApplicant extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table = 'billing_summary_applicant';

    protected $fillable = [
        'applicant_id', 'billing_schedule_id', 'total_cost'
    ];
    private $errors;
    private $rules = [
        'applicant_id' => 'required|integer',
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

    public function relApplicant(){
        return $this->belongsTo('Applicant', 'applicant_id', 'id');
    }
    public function relBillingSchedule(){
        return $this->belongsTo('BillingSchedule', 'billing_schedule_id', 'id');
    }
    public function relBillingDetailsApplicant(){
        return $this->HasMany('BillingDetailsApplicant');
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