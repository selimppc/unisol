<?php
//use Carbon\Carbon;

class InvPurchasePrderHead extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'inv_purchase_order_head';
    protected $fillable = [
        'purchase_no', 'inv_requisition_head_id', 'pay_terms',
        'delivery_date	', 'tax', 'tax_amount', 'discount_rate',
        'discount_amount', 'amount'
    ];

    private $errors;
    private $rules = [
        'purchase_no' => 'required|integer',
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
    public function relInvSupplier(){
        return $this->belongsTo('InvSupplier', 'inv_supplier_id', 'id');
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


}