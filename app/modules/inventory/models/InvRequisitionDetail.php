<?php
class InvRequisitionDetail extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'inv_requisition_detail';
    protected $fillable = [
        'inv_requisition_head_id', 'inv_product_id', 'rate',
        'unit', 'quantity'
    ];

    private $errors;
    private $rules = [
        //'course_conduct_id' => 'required|integer',
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
    public function relInvProduct(){
        return $this->belongsTo('InvProduct', 'inv_product_id', 'id');
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



}