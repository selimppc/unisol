<?php
//use Carbon\Carbon;

class AccChartOfAccounts extends \Eloquent
{
    //TODO :: model attributes and rules and validation
    protected $table = 'acc_chart_of_accounts';
    protected $fillable = [
        'account_code', 'description', 'account_type',
        'account_usage', 'group_one', 'group_two',
        'analytical_code'
    ];

    private $errors;
    private $rules = [
        //'acc_voucher_head_id' => 'required|integer',
        //'currency_id' => 'required|integer',
        //'acm_marks_distribution_id' => 'required|integer',
        //'acm_class_schedule_id' => 'required|integer',
        //'status' => 'required|integer',
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

    public function relHrEmployee(){
        return $this->belongsTo('HrEmployee', 'associated_id', 'id');
    }



    // TODO : user info while saving data into table
    public static function boot(){
        parent::boot();
        static::creating(function($query){
            if(Auth::user()->check()){
                $query->created_by = Auth::user()->get()->id;
            }
        });
        static::updating(function($query){
            if(Auth::user()->check()){
                $query->updated_by = Auth::user()->get()->id;
            }
        });
    }


    //TODO : Scope Area
    public static function list_period(){
        $array = [
            '' => 'Select Period',
            '1' => 'January',
            '2' => 'February',
            '3' => 'March',
            '4' => 'April',
            '5' => 'May',
            '6' => 'June',
            '7' => 'July',
            '8' => 'August',
            '9' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ];
        return $array;
    }





}