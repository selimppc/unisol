<?php

namespace App\Modules\Applicant;

class ServiceProvider extends \App\Modules\ServiceProvider {

    public function register() {
        parent::register("applicant");
    }

    public function boot() {
        parent::boot("applicant");
    }

}