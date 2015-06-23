<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Designation extends Eloquent {

    protected $table = 'designation';
    protected $fillable = [
        'title','code', 'description', 'status',
    ];

    private $errors;
    private $rules = [
        'title' => 'required',
        'code' => 'required',
        //'description' => 'alpha_dash',
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
//    public function relUser(){
//        return $this->belongsToMany('User');
//    }


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
    public function scopeGetDesignationLists(){
        $query = $this::lists('title', 'id');
        return $query;
    }

} 