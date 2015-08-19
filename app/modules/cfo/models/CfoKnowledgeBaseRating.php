<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31-May-15
 * Time: 10:50 AM
 */

class CfoKnowledgeBaseRating extends Eloquent{

    protected $table = 'cfo_knowledge_base_rating';

    protected $fillable = [
        'cfo_knowledge_base_id', 'value',
    ];

    private $errors;
    private $rules = [
        'cfo_knowledge_base_id' => 'required',
        'value' => 'required',
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
    public function relCfoKnowledgeBase(){
        return $this->belongsTo('CfoKnowledgeBase','cfo_knowledge_base_id','id');
    }

} 