<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 16-Mar-15
 * Time: 4:05 PM
 */

class ExmCenter extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table = 'exm_center';
    protected $fillable = [
        'title', 'description', 'capacity', 'status',
    ];
    private $errors;
    private $rules = [
        'title' => 'required|alpha',
        'description' => 'alpha',
        'capacity' => 'alpha',
        'status' => 'alpha',
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
    public function relExmCenterApplicantChoice(){
        return $this->HasMany('ExmCenterApplicantChoice', 'batch_waiver_id', 'id');
    }



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