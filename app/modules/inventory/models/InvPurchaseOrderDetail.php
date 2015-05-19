<?php
class InvPurchaseOrderDetail extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'inv_purchase_order_detail';
    protected $fillable = [
        'inv_po_head_id', 'inv_product_id', 'quantity',
        'grn_quantity', 'tax_rate', 'tax_amount', 'unit',
        'unit_quantity', 'purchase_rate', 'amount'
    ];

    private $errors;
    private $rules = [
        'inv_po_head_id' => 'required|integer',
        'inv_product_id' => 'required|integer',
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
    public function relInvPurchaseOrderHead(){
        return $this->belongsTo('InvPurchaseOrderHead', 'inv_po_head_id', 'id');
    }
    public function relInvProduct(){
        return $this->belongsTo('InvProduct', 'inv_product_id', 'id');
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



}