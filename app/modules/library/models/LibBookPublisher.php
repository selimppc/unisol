<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class LibBookPublisher extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table='lib_book_publisher';
    protected $fillable = [
        'name','company_name','email','phone','address','country_id','note'
    ];
    private $errors;
    private $rules = [
        'name' => 'required',
        'company_name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'country_id' => 'required|integer',
        'note' => 'required',
        /* 'email' => 'required|email|unique:lib_book_author',*/
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

    public function relCountry(){
        return $this->belongsTo('Country','country_id','id');
    }

    /* public function relBatchCourse(){
         return $this->HasMany('BatchCourse');
     }*/


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