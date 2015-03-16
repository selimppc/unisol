<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Batch extends Eloquent{

    //TODO : model attributes rule
    protected $table = 'batch';
    protected $fillable = [
        'degree_id', 'year_id', 'semester_id', 'batch_number', 'description', 'start_date', 'end_date',
        'seat_total', 'admission_deadline', 'status'
    ];
    private $errors;
    private $rules = [
        'degree_id' => 'required|integer',
        'year_id' => 'required|integer',
        'semester_id' => 'required|integer',
        'batch_number' => 'required|alpha_num',
        'description' => 'alpha',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'seat_total' => 'required|numeric',
        'admission_deadline' => 'required|date',
        'status' => 'alpha'
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

    //TODO : model relationship
    public function relDegree(){
        return $this->HasMany('Degree');
    }
    public function relYear(){
        return $this->HasMany('Year');
    }
    public function relSemester(){
        return $this->HasMany('Semester');
    }

    //TODO : on Save created_by or Updated_by
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


    //TODO: Scope



} 