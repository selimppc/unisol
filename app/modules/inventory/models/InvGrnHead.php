<?php
//use Carbon\Carbon;

class InvGrnHead extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'inv_grn_head';
    protected $fillable = [
        'grn_no', 'inv_po_head_id', 'voucher_no', 'date',
        'inv_supplier_id', 'inv_requisition_head_id', 'tax_amount',
        'tax_rate', 'tax_amount', 'discount_rate', 'discount_amount',
        'amount', 'net_amount', 'status'
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
    public function relInvPurchaseOrderHead(){
        return $this->belongsTo('InvPurchaseOrderHead', 'inv_po_head_id', 'id');
    }
    public function relInvSupplier(){
        return $this->belongsTo('InvSupplier', 'inv_supplier_id', 'id');
    }
    public function relInvRequisitionHead(){
        return $this->belongsTo('InvRequisitionHead', 'inv_requisition_head_id', 'id');
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
    public static function getStatus(){
        $query = [
            'open'=>'Open',
            'approved'=>'Approved',
            'close'=>'Close',
            'cancel'=>'Cancel'
        ];
        return $query;
    }


}