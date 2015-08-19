<?php

class BillingVApplicantHistory  extends Eloquent{

    protected $table = 'billing_v_applicant_history';


    public function relDegree(){
        return $this->belongsTo('Degree', 'degree_id', 'id');
    }

    public function relDepartment(){
        return $this->belongsTo('Department', 'department_id', 'id');
    }

    public function relBatch(){
        return $this->belongsTo('Batch', 'batch_id', 'id');
    }

}