<?php

namespace App\Modules\Admission;

class ServiceProvider extends \App\Modules\ServiceProvider {

    public function register() {
        parent::register("admission");
    }

    public function boot() {
        parent::boot("admission");
    }

}

