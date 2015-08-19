<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class BillingApplicantDetail extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table = 'billing_applicant_detail';
    protected $fillable = [
        'billing_applicant_head_id', 'billing_item_id', 'waiver_id',
        'waiver_amount', 'cost_per_unit', 'quantity', 'tax_rate', 'tax_amount',
        'total_amount',
    ];
    private $errors;
    private $rules = [
        'billing_applicant_head_id' => 'required|integer',
        'billing_item_id' => 'required|integer',
//        'waiver_id' => 'required|integer',
//        'waiver_amount' => 'numeric',
//        'cost_per_unit' => 'numeric',
//        'quantity' => 'numeric',
//        'total_amount' => 'numeric',
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

    public function relBillingApplicantHead(){
        return $this->belongsTo('BillingApplicantHead', 'billing_applicant_head_id', 'id');
    }
    public function relBillingItem(){
        return $this->belongsTo('BillingItem', 'billing_item_id', 'id');
    }
    public function relWaiver(){
        return $this->belongsTo('Waiver', 'waiver_id', 'id');
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