<?php
//use Carbon\Carbon;

class AccVArLibrary extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'acc_v_ar_library';
    protected $fillable = [

    ];

    private $errors;
    private $rules = [
        //'purchase_no' => 'required|integer',
        //'acm_marks_distribution_id' => 'required|integer',
        //'acm_class_schedule_id' => 'required|integer',
        //'status' => 'required|integer',
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


    //TODO : Scope Area
    public function getDateAttribute($date) {
        return Carbon::parse($date)->format('d-M-Y'); //Change the format to whichever you desire
    }




}