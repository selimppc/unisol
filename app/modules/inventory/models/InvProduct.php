<?php
class InvProduct extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'inv_product';
    protected $fillable = [
        'code', 'title', 'description', 'image','product_class', 'inv_product_category_id', 'cost_price',
        'purchase_unit', 'purchase_unit_quantity', 'stock_unit', 'stock_unit_quantity', 'stock_type'
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
    public function relInvProductCategory(){
        return $this->belongsTo('InvProductCategory', 'inv_product_category_id', 'id');
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

    public static function product_class(){
        $result = [
            ''=>'Select Product Class',
            'service'=>'Service',
            'product'=>'Product'
        ];
        return $result;
    }

}