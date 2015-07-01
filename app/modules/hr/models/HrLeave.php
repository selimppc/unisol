<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01-Jul-15
 * Time: 2:26 PM
 */

class HrLeave extends Eloquent{
    //TODO :: model attributes and rules and validation
    protected $table='hr_leave';
    protected $fillable = [
//        'hr_leave_id','comment'
    ];
    private $errors;
    private $rules = [
//        'hr_leave_id' => 'required',
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
            }elseif(Auth::applicant()->check()){
                $query->created_by = Auth::applicant()->get()->id;
            }
        });
        static::updating(function($query){
            if(Auth::user()->check()){
                $query->updated_by = Auth::user()->get()->id;
            }elseif(Auth::applicant()->check()){
                $query->updated_by = Auth::applicant()->get()->id;
            }
        });
    }

    //TODO : Scope Area



} 