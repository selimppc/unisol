<?php
//use Carbon\Carbon;

class InvAdjustHead extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'inv_adjust_head';
    protected $fillable = [
        'adjust_no', 'date', 'store', 'type',
        'confirm_date', 'currency_id', 'voucher_number',
        'note', 'status'
    ];

    private $errors;
    private $rules = [
        //'purchase_no' => 'required|integer',
        //'acm_marks_distribution_id' => 'required|integer',
        //'acm_class_schedule_id' => 'required|integer',
        //'status' => 'required|integer',
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
    public function relCurrency(){
        return $this->belongsTo('Currency', 'currency_id', 'id');
    }


    // TODO : user info while saving data into table
    public static function boot(){
        parent::boot();
        static::creating(function($query){
            if(Auth::user()->check()){
                $query->created_by = Auth::user()->get()->id;
            }
        });
        static::updating(function($query){
            if(Auth::user()->check()){
                $query->updated_by = Auth::user()->get()->id;
            }
        });
    }


    //TODO : Scope Area
    public function getDateAttribute($date) {
        return Carbon::parse($date)->format('d-M-Y'); //Change the format to whichever you desire
    }
    public function getConfirmDateAttribute($confirm_date) {
        return Carbon::parse($confirm_date)->format('d-M-Y'); //Change the format to whichever you desire
    }




}