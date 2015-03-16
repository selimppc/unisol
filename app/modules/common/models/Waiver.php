<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Waiver extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table='waiver';
    protected $fillable = [
        'title', 'description', 'waiver_type', 'is_percentage', 'amount', 'billing_details_id',
    ];
    private $errors;
    private $rules = [
        'title' => 'required|integer',
        'description' => 'alpha',
        'waiver_type' => 'alpha',
        'is_percentage' => 'integer',
        'amount' => 'numeric',
        'billing_details_id' => 'required|integer',
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
    public function relBatchWaiver(){
        return $this->HasMany('BatchWaiver');
    }
    public function relBillingDetails(){
        return $this->belongsTo('BillingDetails', 'billing_details_id', 'id');
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