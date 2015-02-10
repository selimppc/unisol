<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Waiver extends Eloquent{

    protected $table='waiver';
    protected $fillable= array('title', 'description', 'waiver_type', 'is_percentage', 'amount', 'acm_billing_item_id', 'created_by', 'updated_by');

} 