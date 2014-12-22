<?php


class DegreeLevel extends Eloquent
{

    protected $table = 'degree_level';

    private $errors;
    // 1
    private $rules = array(
        'title' => 'required|unique:degree_level',
        'description'  => 'required',

    );


    public function validate($data)
    {
        // make a new validator object
        $validate = Validator::make($data, $this->rules);
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

    // 2

    private $rules2 = array(
        'title' => 'required',
        'description'  => 'required',

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

    public static function getDegreeLevelName($degId){
    $data = DegreeLevel::find($degId);
    return $data->title;
}

}