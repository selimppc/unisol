<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Applicant extends Eloquent implements UserInterface, RemindableInterface{

    protected $table = 'applicant';

    public function getReminderEmail()
    {
        return $this->email;
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }


    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }

    // return username
    public static function getApplicantName($userId){
        $data = Applicant::find($userId);
        return $data->username;
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



    //TODO :: Scope area
    public function scopeApplicantName($query , $id){
        $query = $this::select(DB::raw('CONCAT(first_name, " ", middle_name, " ", last_name) AS full_name'))
            ->where('id', '=', $id)
            ->first()->full_name;
        return $query;
    }


    public function scopeApplicantList($query)
    {
        return $query->select(DB::raw('CONCAT(applicant.first_name, " ", applicant.last_name) as full_name'), 'applicant.id as applicant_id')
                ->lists('full_name', 'applicant_id');

    }



} 