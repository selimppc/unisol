<?php


class UserResetPassword extends Eloquent {

    protected $table = 'user_reset_password';

    public $fillable = [
        'user_id', 'reset_password_token', 'reset_password_expire', 'reset_password_time', 'status',
    ];

    private $errors;
    private $rules = [
        //'title' => 'required',
        //'code' => 'required',
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
    public function relUser(){
        return $this->belongsTo('User', 'id', 'user_id');
    }



    public static function boot(){
        parent::boot();
        static::creating(function($query){
            //$query->created_by = Auth::user()->get()->id;
            //$query->updated_by = Auth::user()->get()->id;
        });
        static::updating(function($query){
            //$query->updated_by = Auth::user()->get()->id;
        });
    }


    // TODO:: scope area
    public function scopeDuration()
    {
        return $this->end->diffForHumans($this->start);
    }


}
