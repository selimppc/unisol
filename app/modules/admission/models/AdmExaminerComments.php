<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class AdmExaminerComments extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table = 'adm_examiner_comments';
    protected $fillable = [
        'batch_id', 'comment', 'commented_to', 'commented_by', 'status',
    ];
    private $errors;
    private $rules = [
        'batch_id' => 'required|integer',
        //'comment' => 'alpha_dash',
        'commented_to' => 'required|integer',
        'commented_by' => 'required|integer',
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
        return $this->belongsTo('Batch', 'batch_id', 'id');
    }

    public function relCommentedToUser(){
        return $this->belongsTo('User', 'commented_to', 'id');
    }

    public function relCommentedByUser(){
        return $this->belongsTo('User', 'commented_by', 'id');
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