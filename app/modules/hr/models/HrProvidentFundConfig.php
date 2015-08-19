<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02-Jul-15
 * Time: 3:45 PM
 */

class HrProvidentFundConfig extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table = 'hr_provident_fund_config';
    protected $fillable = [
        'employee_type','contribution_amount','company_contribution_0','company_contribution_25','company_contribution_50','company_contribution_75','company_contribution_100'
    ];

    private $errors;
    private $rules = [
        'contribution_amount' =>'required',
        'company_contribution_0' => 'required|integer',
        'company_contribution_25' => 'required|integer',
        'company_contribution_50' => 'required|integer',
        'company_contribution_75' => 'required|integer',
        'company_contribution_100' => 'required|integer',
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


    // TODO : user info while saving data into table
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

    //TODO : Scope Area

} 