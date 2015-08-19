<?php
class AcmClassSchedule extends \Eloquent
{

    //TODO :: model attributes and rules and validation
    protected $table = 'acm_class_schedule';
    protected $fillable = [
        'course_type_id', 'acm_class_time_id', 'day', 'department_id', 'acm_class_room_id',
        'is_online'
    ];

    private $errors;
    private $rules = [
        'course_type_id' => 'required|integer',
        'acm_class_time_id' => 'required|integer',
        //'day'  => 'required',
        'department_id' => 'required|integer',
        'acm_class_room_id' => 'required|integer',
        //'is_online' => 'required|integer',
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
    public function relAcmClassTime(){
        return $this->belongsTo('AcmClassTime', 'acm_class_time_id', 'id' );
    }
    public function relAcmClassRoom(){
        return $this->belongsTo('AcmClassRoom', 'acm_class_room', 'id');
    }


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


    //TODO : Scope Area


}