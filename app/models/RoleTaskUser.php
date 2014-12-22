<?php


class  RoleTaskUser extends Eloquent
{

    protected $table = 'role_task_user';

    private $errors;
    // 1
    private $rules = array(
        'role_task_id' => 'required',
        'user_id'  => 'required',
        'status'  => 'required',
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
        'role_task_id' => 'required',
        'user_id'  => 'required',
        'status'  => 'required',

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