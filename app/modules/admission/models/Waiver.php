<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Waiver extends Eloquent{

    protected $table='waiver';
    protected $fillable= [
        'title',
        'description',
        'waiver_type',
        'is_percentage',
        'amount',
        'billing_details_id',
         ];

    public function relBillingDetails() {
        return $this->belongsTo('BillingDetails', 'billing_details_id', 'id');
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

} 