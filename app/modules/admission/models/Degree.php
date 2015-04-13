<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Degree extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table='degree';
    protected $fillable = [
        'department_id', 'degree_program_id', 'degree_group_id', 'degree_level_id', 'description',
        'total_credit', 'duration', 'policy_retake', 'policy_course_taking',
        'credit_min_per_semester', 'credit_max_per_semester', 'status'
    ];
    private $errors;
    private $rules = [
        'department_id' => 'required|integer',
        'degree_program_id' => 'required|integer',
        'degree_group_id' => 'required|integer',
        'degree_level_id' => 'required|integer',
        //'description' => 'alpha_dash',
        'total_credit' => 'required|numeric',
        'duration' => 'required',
        'policy_retake' => 'required|alpha_dash',
        'policy_course_taking' => 'required|alpha_dash',
        'credit_min_per_semester' => 'numeric',
        'credit_max_per_semester' => 'numeric',
        //'status' => 'alpha_dash',
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
    public function relBatch(){
        return $this->HasMany('Batch');
    }
    public function relCourseConduct(){
        return $this->HasMany('CourseConduct');
    }
    public function relDegreeCourse(){
        return $this->HasMany('DegreeCourse');
    }
    public function relDepartment(){
        return $this->belongsTo('Department', 'department_id', 'id');
    }
    public function relDegreeLevel(){
        return $this->belongsTo('DegreeLevel', 'degree_level_id', 'id');
    }
    public function relDegreeProgram(){
        return $this->belongsTo('DegreeProgram', 'degree_program_id', 'id');
    }
    public function relDegreeGroup(){
        return $this->belongsTo('DegreeGroup', 'degree_group_id', 'id');
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
    public function scopeDegreeProgramGroup($query){
        $query = $this::join('degree_program', function($query){
            $query->on('degree_program.id', '=', 'degree.degree_program_id');
        })
            ->join('degree_group', function($query){
                $query->on('degree_group.id', '=', 'degree.degree_group_id');
            })
            ->join('department', function($query){
                $query->on('department.id', '=', 'degree.department_id');
            })
            ->select(DB::raw('CONCAT(degree_program.code, "", degree_group.code, " in ", department.title) as dp_name'), 'degree.id as deg_id')
            ->lists('dp_name', 'deg_id');
        if($query){
            return $query;
        }else{
            return $query = [' ' => 'Degree program-group names are missing !'];
        }
    }

} 