<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class RnCResearchPaperComment extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table='rnc_research_paper_comment';
    protected $fillable = [
        'rnc_research_paper_id','commented_to','commented_by','comments'
    ];
    private $errors;
    private $rules = [
     'rnc_research_paper_id' => 'required'
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

    public function validate2($data)
    {
        $validate2 = Validator::make($data, $this->rules);
        if ($validate2->fails())
        {
            $this->errors = $validate2->errors();
            return false;
        }
        return true;
    }
    public function errors2()
    {
        return $this->errors;
    }

    //TODO : Model Relationship

    public function relRnCResearchPaper(){
        return $this->belongsTo('RnCResearchPaper','rnc_research_paper_id','id');
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