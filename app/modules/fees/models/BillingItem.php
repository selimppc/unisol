<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class BillingItem extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table = 'billing_item';

    protected $fillable = [
        'title', 'description', 'is_unit_qty'
    ];
    private $errors;
    private $rules = [
     /*   'title' => 'required',
        'description' => 'alpha',
        'initial' => 'required',
        'is_unit_qty' => 'required|integer',*/
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

    public function relBillingSetup(){
        return $this->HasMany('BillingSetup');
    }
    public function relBillingDetailsStudent(){
        return $this->HasMany('BillingDetailsStudent');
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