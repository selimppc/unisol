<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04-Jun-15
 * Time: 11:49 AM
 */

class CfoOnsiteHelpDesk extends Eloquent{

    protected $table = 'cfo_onsite_help_desk';

    protected $fillable = [
        'token_number', 'name', 'email', 'cfo_category_id', 'purpose','section_dept_id','specific_user_id','status','served_by'
    ];

    private $errors;
    private $rules = [
        'section_dept_id' => 'required',
        'cfo_category_id' => 'required',
        'specific_user_id' => 'required',

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

    public function relDepartment(){
        return $this->belongsTo('Department','section_dept_id','id');
    }

    public function relCfoCategory(){
        return $this->belongsTo('CfoCategory','cfo_category_id','id');
    }

    public function relUser(){
        return $this->belongsTo('User','specific_user_id','id');
    }



    public static function boot(){
        parent::boot();
        if(Auth::user()->check()){
            static::creating(function($query){
                $query->created_by = Auth::user()->get()->id;
                $query->updated_by = Auth::user()->get()->id;
            });
            static::updating(function($query){
                $query->updated_by = Auth::user()->get()->id;
            });
        }

    }
} 