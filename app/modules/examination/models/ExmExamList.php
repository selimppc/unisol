<?php

class ExmExamList extends \Eloquent
{

    //TODO :: model attributes and rules and validation
    protected $table = 'exm_exam_list';
    protected $fillable = [
        'year_id', 'semester_id', 'course_conduct_id', 'title','acm_marks_dist_item_id',
        'status'
    ];

    private $errors;
    private $rules = [
        'year_id' => 'required|integer',
        'semester_id' => 'required|integer',
        'course_conduct_id' => 'required|integer',
        'title' => 'required',
        'acm_marks_dist_item_id' => 'required|integer',

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
    public function relExmExaminer(){
        return $this->HasMany('ExmExaminer');
    }
    public function relExmExaminerComments(){
        return $this->HasMany('ExmExaminerComments');
    }
    public function relExmQuestion(){
        return $this->HasMany('ExmQuestion');
    }

    public function relYear(){
        return $this->belongsTo('Year', 'year_id', 'id');
    }
    public function relSemester(){
        return $this->belongsTo('Semester', 'semester_id', 'id');
    }
    public function relAcmMarksDistItem(){
        return $this->belongsTo('AcmMarksDistItem', 'acm_marks_dist_item_id', 'id');
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

    public function scopeCourseList($query){
        $query = $this::join('course_conduct',  function($query){
            $query->on('course_conduct.id', '=', 'exm_exam_list.course_conduct_id');
        })
            ->join('course', 'course.id', '=', 'course_conduct.course_id')
            ->select(DB::raw('course.title as title, exm_exam_list.course_conduct_id as cc_id'))
            ->lists('title', 'cc_id');
        return $query;
    }


}