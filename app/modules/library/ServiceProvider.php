<?php

namespace App\Modules\Library;

class ServiceProvider extends \App\Modules\ServiceProvider {

    public function register() {
        parent::register("library");
    }

    public function boot() {
        parent::boot("library");
    }

}