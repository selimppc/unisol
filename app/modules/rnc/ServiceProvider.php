<?php

namespace App\Modules\Rnc;

class ServiceProvider extends \App\Modules\ServiceProvider {

    public function register() {
        parent::register("rnc");
    }

    public function boot() {
        parent::boot("rnc");
    }

}