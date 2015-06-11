<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04-Jun-15
 * Time: 11:37 AM
 */

class CfoSupportHead extends Eloquent{

    protected $table = 'cfo_support_head';

    protected $fillable = [
        'cfo_category_id', 'name', 'email', 'phone', 'subject','priority','status'
    ];

    private $errors;
    private $rules = [
        'cfo_category_id' => 'required',
        'name' => 'required',
        'email' => 'required',
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

    public function relCfoCategory(){
        return $this->belongsTo('CfoCategory', 'cfo_category_id', 'id');
    }



} 