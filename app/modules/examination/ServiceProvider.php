<?php

namespace App\Modules\Examination;

class ServiceProvider extends \App\Modules\ServiceProvider {

    public function register() {
        parent::register("examination");
    }

    public function boot() {
        parent::boot("examination");
    }

}