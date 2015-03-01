<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class BillingDetails extends Eloquent{

    protected $table='billing_details';

    public function scopeBillingItem($query){

        $query = $this::join('billing_item', function($query){
            $query->on('billing_item.id', '=', 'billing_details.billing_item_id');
        })
            ->select(DB::raw('billing_item.title as title, billing_details.id as bill_id'))
            ->lists('title', 'bill_id');
        return $query;
    }


    public function relBillingItem() {
        return $this->belongsTo('BillingItem', 'billing_item_id', 'id');
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