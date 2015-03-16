<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 16-Mar-15
 * Time: 12:27 PM
 */

class DegreeGroup extends Eloquent{


protected $table = 'degree_group';

    protected $fillable = [
        'code',
        'title',
        'description',
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