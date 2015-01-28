<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/28/2015
 * Time: 10:48 AM
 */

class ApplicantController extends \BaseController{

    public function index()
    {

        echo "OK";
        exit;
        return View::make('applicant::applicants.index');
    }

} 