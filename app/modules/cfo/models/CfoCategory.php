<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31-May-15
 * Time: 10:19 AM
 */

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class CfoCategory  extends Eloquent{

    protected $table = 'cfo_category';

    protected $fillable = [
        'title', 'description', 'support_name', 'support_email', 'support_user_id',
    ];

    private $errors;
    private $rules = [
        'support_name' => 'required',
        'support_email' => 'required',
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

    //TODO : Model Relationship


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


} 