<?php

class DegreeProgram extends \Eloquent
{
    //TODO :: model attributes and rules and validation
	protected $table = 'degree_program';

    protected $fillable = [
        'title', 'code', 'description',
    ];
    private $errors;
    private $rules = [
        'title' => 'required',
        'code' => 'required|alpha_dash',
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
    public function relDegree(){
        return $this->HasMany('Degree');
    }




	// ratna code
    public static function getDegreeProgramName($degreeId)
    {
        $data = DegreeProgram::find($degreeId);
        return $data->title;
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
