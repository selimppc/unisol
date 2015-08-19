<?php
class InvProductCategory extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'inv_product_category';
    protected $fillable = [
        'code', 'title', 'description'
    ];

    private $errors;
    private $rules = [
        'code' => 'required',
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
        return $this->HasMany('InvProduct');
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
    public function scopeProductCategoryLists($query){
        $query = InvProductCategory::lists('title', 'id');
        return $query;

    }

}