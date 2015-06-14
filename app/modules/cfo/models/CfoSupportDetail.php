<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04-Jun-15
 * Time: 11:46 AM
 */

class CfoSupportDetail extends Eloquent{

    protected $table = 'cfo_support_detail';

    protected $fillable = [
        'cfo_support_head_id', 'message', 'replied_by', 'support_user_id'
    ];

    private $errors;

    private $rules = [
        'cfo_support_head_id' => 'required',
        'support_user_id' => 'required',
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

    public function relCfoSupportHead(){
        return $this->belongsTo('CfoSupportHead', 'cfo_support_head_id', 'id');
    }


} 