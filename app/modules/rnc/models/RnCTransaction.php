<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class RncTransaction extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table='rnc_transaction';
    protected $fillable = [
        'user_id', 'rnc_research_paper_id','issue_date','count','status'
    ];
    private $errors;
    private $rules = [
        'rnc_research_paper_id' => 'required|integer',
        'issue_date' => 'required',
        /*'return_date' => 'required',
        'status' => 'required',*/

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
    public function relRncResearchPaper(){
        return $this->belongsTo('RncResearchPaper','rnc_research_paper_id','id');
    }

    public function relUser(){
        return $this->belongsTo('User','user_id','id');
    }

    public function relRncFinancialTransaction(){
        return $this->HasOne('RncFinancialTransaction', 'rnc_transaction_id', 'id');
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