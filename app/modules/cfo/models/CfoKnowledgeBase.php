<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31-May-15
 * Time: 10:40 AM
 */

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class CfoKnowledgeBase extends Eloquent{

    protected $table = 'cfo_knowledge_base';

    protected $fillable = [
        'cfo_category_id','title','description', 'keywords',
    ];

    private $errors;
    private $rules = [
        //'cfo_category_id' => 'required',
       // 'keywords' => 'required',
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
    public function relCfoCategory(){
        return $this->belongsTo('CfoCategory','cfo_category_id','id');
    }



} 