<?php

namespace App\Modules\Hr;

class ServiceProvider extends \App\Modules\ServiceProvider {

    public function register() {
        parent::register("hr");
    }

    public function boot() {
        parent::boot("hr");
    }

}