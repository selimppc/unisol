<?php

class FeesStudentController extends \BaseController
{

    function __construct()
    {
        $this->beforeFilter('feesStudent', array('except' => array('')));
    }





}