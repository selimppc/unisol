<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class BillingSetup extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table = 'billing_setup';
    protected $fillable = [
        'billing_item_id', 'billing_schedule_id', 'batch_id','cost','deadline','fined_cost'
    ];
    private $errors;
    private $rules = [
       // 'billing_item_id' => 'required|integer',
        //'billing_schedule_id' => 'required|integer',
        'batch_id' => 'required|integer',
        'cost' => 'numeric',
        'deadline' => 'date',
        'fined_cost' => 'numeric',
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

    public function relBillingItem(){
        return $this->belongsTo('BillingItem', 'billing_item_id', 'id');
    }
    public function relBillingSchedule(){
        return $this->belongsTo('BillingSchedule', 'billing_schedule_id', 'id');
    }
    public function relBatch(){
        return $this->belongsTo('Batch', 'batch_id', 'id');
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