<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Role extends Eloquent {

    protected $table = 'role';
    protected $fillable = array('code','title','description','status','created_by','updated_by');

    public function relUser(){
        return $this->belongsToMany('User');
    }

    public static function boot(){
        parent::boot();
        static::creating(function($query){
            $query->created_by = Auth::user()->get()->id;
            $query->updated_by = Auth::user()->get()->id;
        });
        static::updating(function($query){
            $query->updated_by = Auth::user()->get()->id;
        });
    }

    public function scopeRoleName($query , $user_id){
        $role_id = User::find($user_id)->role_id;
        $query = $this::select(DB::raw('title AS role_name'))
            ->where('id', '=', $role_id)
            ->first()->role_name;
        return $query;
    }

} 