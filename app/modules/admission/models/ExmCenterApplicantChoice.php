<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class ExmCenterApplicantChoice extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table = 'exm_center_applicant_choice';
    protected $fillable = [
        'batch_applicant_id', 'exm_center_id', 'note', 'status',
    ];
    private $errors;
    private $rules = [
        'batch_applicant_id' => 'required|integer',
        'exm_center_id' => 'required|integer',
        'note' => 'alpha',
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
    public function relBatchApplicant(){
        return $this->belongsTo('BatchApplicant', 'batch_applicant_id', 'id');
    }
    public function relExmCenter(){
        return $this->belongsTo('ExmCenter', 'exa_center_id', 'id');
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