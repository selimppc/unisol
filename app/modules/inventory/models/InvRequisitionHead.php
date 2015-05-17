<?php
class InvRequisitionHead extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'inv_requisition_head';
    protected $fillable = [
        'requisition_no', 'inv_supplier_id', 'date',
        'note', 'requisition_type', 'status'
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
    public static function getRequisitionType(){
        $query = [
            'purchase'=>'Purchase',
            'distribution'=>'Distribution',
        ];
        return $query;
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