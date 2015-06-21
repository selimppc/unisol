<?php
//use Carbon\Carbon;

class AccVoucherDetail extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'acc_voucher_detail';
    protected $fillable = [
        'acc_voucher_head_id', 'acc_chart_of_accounts_id', 'sub_account_code',
        'currency_id', 'exchange_rate', 'prime_amount',
        'base_amount', 'note'
    ];

    private $errors;
    private $rules = [
        'acc_voucher_head_id' => 'required|integer',
        'acc_chart_of_accounts_id' => 'required|integer',
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
    public function relAccVoucherHead(){
        return $this->belongsTo('AccVoucherHead', 'acc_voucher_head_id', 'id');
    }

    public function relAccChartOfAccounts(){
        return $this->belongsTo('AccChartOfAccounts', 'acc_chart_of_accounts_id', 'id');
    }

    public function relInvSupplier(){
        return $this->belongsTo('InvSupplier', 'inv_supplier_id', 'id');
    }

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

    public function geDateAttribute($date) {
        return Carbon::parse($date)->format('d-M-Y'); //Change the format to whichever you desire
    }




}