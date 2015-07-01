<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class HrWorkWeek extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table='hr_work_week';
    protected $fillable = [
        'year_id','month','day','status'
    ];

    private $errors;
    private $rules = [
        //'hr_employee_id' => 'required',
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

    public function relYear(){
        return $this->belongsTo('Year', 'year_id', 'id');
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

    public static function getMonth(){
        return $status = [
            'january' => 'January',
            'february' => 'February',
            'march'=>'March',
            'april'=>'April',
            'may'=>'May',
            'june'=>'June',
            'july'=>'July',
            'august'=>'August',
            'september'=>'September',
            'october'=>'October',
            'november'=>'November',
            'december'=>'December',
        ];
    }

    public static function getDay(){
        return $status = [
            'saturday' => 'Saturday',
            'sunday' => 'Sunday',
            'monday'=>'Monday',
            'tuesday'=>'Tuesday',
            'wednesday'=>'Wednesday',
            'thursday'=>'Thursday',
            'friday'=>'Friday',
        ];
    }
}