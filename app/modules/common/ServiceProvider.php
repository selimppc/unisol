<?php

namespace App\Modules\Common;

class ServiceProvider extends \App\Modules\ServiceProvider {

    public function register() {
        parent::register("common");
    }

    public function boot() {
        parent::boot("common");
    }

}