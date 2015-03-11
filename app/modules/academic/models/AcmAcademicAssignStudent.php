<?php
class AcmAcademicAssignStudent extends \Eloquent
{
    protected $fillable = [];
    protected $table = 'acm_academic_assign_student';

    public function relAcmAcademic()
    {
        return $this->belongsTo('AcmAcademic', 'acm_academic_id', 'id');
    }
    public function relUser()
    {
        return $this->belongsTo('User', 'user_id', 'id');
    }
    public static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            $query->created_by = Auth::user()->get()->id;
            $query->updated_by = Auth::user()->get()->id;
        });
        static::updating(function ($query) {
            $query->updated_by = Auth::user()->get()->id;
        });
    }

    //static function to show status

    public static function getAssignStudentStatus($acm_id)
    {
        $datas = AcmAcademicAssignStudent::where('acm_academic_id', '=', $acm_id)->first();
//        if ($datas->status == 'A') {
//           return 'A';
//       } else {
//            return 'N/A';
//       }

}
    //static function ends here

}