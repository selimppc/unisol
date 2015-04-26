<?php

class DegreeGroup extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'degree_group';

    protected $fillable = [
        'title', 'code', 'description',
    ];
    private $errors;
    private $rules = [
        'title' => 'required',
        'code' => ['required',
            'max:20',
            'min:3',
            'Regex:/\A(?!.*[:;]-\))[ -~]+\z/'],
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
