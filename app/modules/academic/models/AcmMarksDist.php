<?php


class AcmMarksDist extends Eloquent
{

    protected $table = 'acm_marks_dist_item';

    // ratna code
    public static function AcmMarksDistName($itemId)
    {
        $data = AcmMarksDist::find($itemId);
        return $data->title;
    }



    private $errors;
    // 1 Create data validation
    private $rules = array(
        'title' => 'required|min :3'

    );

    public function validate($data)
    {
        // make a new validator object
        $validate = Validator::make($data, $this->rules);
        // check for failure
        if ($validate->fails()) {
            // set errors and return false
            $this->errors = $validate->errors();
            return false;
        }
        // validation pass
        return true;
    }

    // 2 update data validation

    private $rules2 = array(
        'title' => 'required|min :3'

    );

    public function validate2($data)
    {
        // make a new validator object
        $validate = Validator::make($data, $this->rules2);

        // check for failure
        if ($validate->fails())
        {
            // set errors and return false
            $this->errors = $validate->errors();
            return false;
        }

        // validation pass
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }
}