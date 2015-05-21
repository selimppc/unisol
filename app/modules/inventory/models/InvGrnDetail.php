<?php
//use Carbon\Carbon;

class InvGrnDetail extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'inv_grn_detail';
    protected $fillable = [
        'inv_grn_head_id', 'inv_product_id', 'batch_number',
        'expire_date', 'receive_quantity', 'cost_price',
        'unit', 'unit_quantity', 'tax_rate', 'tax_amount',
        'row_amount'
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
    public function relInvGrnHead(){
        return $this->belongsTo('InvGrnHead', 'inv_grn_head_id', 'id');
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
    public function getExpireDateAttribute($expire_date) {
        return Carbon::parse($expire_date)->format('d-M-Y'); //Change the format to whichever you desire
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