<?php
class InvVStock extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'inv_v_stock';


    //TODO : Model Relationship
    public function relInvProduct(){
        return $this->belongsTo('InvProduct', 'inv_product_id', 'id');
    }



    //TODO : Scope Area
    public function getExpireDateAttribute($expire_date) {
        return Carbon::parse($expire_date)->format('d-M-Y'); //Change the format to whichever you desire
    }






}