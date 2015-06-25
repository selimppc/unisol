<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class HrSalaryAllowance extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table='hr_salary_allowance';
    protected $fillable = [
        'hr_salary_id','hr_allowance_id','is_percentage','percentage','allowance_type','amount','status'
    ];
    private $errors;
    private $rules = [
        'hr_salary_id' => 'required',
        'hr_allowance_id' => 'required',
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
    public function relHrSalary(){
        return $this->belongsTo('HrSalary','hr_salary_id','id');
    }
    public function relHrAllowance(){
        return $this->belongsTo('HrAllowance','hr_allowance_id','id');
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
    public function scopeHrAllowanceLists($query){
        $query = HrBank::lists('title', 'id');
        return $query;

    }

}