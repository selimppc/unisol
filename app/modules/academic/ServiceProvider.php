<?php

namespace App\Modules\Academic;

class ServiceProvider extends \App\Modules\ServiceProvider {

    public function register() {
        parent::register("academic");
    }

    public function boot() {
        parent::boot("academic");
    }

}