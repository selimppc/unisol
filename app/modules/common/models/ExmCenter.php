<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 16-Mar-15
 * Time: 4:05 PM
 */

class ExmCenter extends Eloquent{

    protected $table = 'exm_center';

    protected $fillable = [
        'title',
        'description',
        'capacity',
        'status',
    ];


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

} 