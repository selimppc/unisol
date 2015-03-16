<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Degree extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table='degree';
    protected $fillable = [
        'department_id', 'degree_program_id', 'degree_group_id', 'title', 'description',
        'total_credit', 'duration', 'policy_retake', 'policy_course_taking',
        'credit_min_per_semester', 'credit_max_per_semester', 'status'
    ];
    private $errors;
    private $rules = [
        'department_id' => 'required|integer',
        'degree_program_id' => 'required|integer',
        'degree_group_id' => 'required|integer',
        'title' => 'required|alpha',
        'description' => 'alpha',
        'total_credit' => 'required|numeric',
        'duration' => 'required|alpha',
        'policy_retake' => 'required|alpha',
        'policy_course_taking' => 'required|alpha',
        'credit_min_per_semester' => 'numeric',
        'credit_max_per_semester' => 'numeric',
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
    public function relDepartment(){
        return $this->HasMany('Department');
    }
    public function relDegreeProgram(){
        return $this->belongsTo('DegreeProgram');
    }
    public function relDegreeGroup(){
        return $this->belongsTo('DegreeGroup');
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

} 