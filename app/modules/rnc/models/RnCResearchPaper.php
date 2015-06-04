<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class RnCResearchPaper extends Eloquent{

    //TODO :: model attributes and rules and validation
    protected $table='rnc_research_paper';
    protected $fillable = [
        'title','abstract','rnc_category_id','where_published_id','publication_no','details',
        'file','free_type_student','free_type_faculty','free_type_non_user','searching',
        'benefit_share','price','note','status','reviewed_by'
    ];
    private $errors;
    private $rules = [
      /*  'title' => 'required',
        'isbn' => 'required',
        'lib_book_category_id' => 'required',
        'lib_book_author_id' => 'required',
        'lib_book_publisher_id' => 'required',
        'edition' => 'required',
        'stock_type' => 'required',
        'shelf_number' => 'required',
        'book_type' => 'required',
        'commercial' => 'required',
        'book_price' => 'required',
        'digital_sell_price' => 'required',
        'is_rented' => 'required',
        'file' => 'required|mimes:pdf|max:2000',   //2MB file can be uploaded*/
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

    public function validate2($data)
    {
        $validate2 = Validator::make($data, $this->rules);
        if ($validate2->fails())
        {
            $this->errors = $validate2->errors();
            return false;
        }
        return true;
    }
    public function errors2()
    {
        return $this->errors;
    }

    //TODO : Model Relationship

    public function relRnCCategory(){
        return $this->belongsTo('RnCCategory','rnc_category_id','id');
    }
    public function relRnCPublisher(){
        return $this->belongsTo('RnCPublisher','where_published_id','id');
    }

    public function relRnCResearchPaperWriter(){
        return $this->HasMany('RnCResearchPaperWriter');
    }

    public function relWriterBeneficial(){
        return $this->HasMany('RnCWriterBeneficial');
    }

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