<?php


class ApplicantProfile extends Eloquent{

    protected $table = 'applicant_profile';


    public function relApplicant(){
        return $this->belongsTo('Applicant');
    }
    public function relCountry(){
        return $this->belongsTo('Country','country_id','id');
    }

    private $errors;
    private $rules = array(
        'profile_image' => 'required',
    );
    public function validate($data)
    {
        $validate = Validator::make($data, $this->rules);
        if ($validate->fails()) {
            $this->errors = $validate->errors();
            return false;
        }
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }

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