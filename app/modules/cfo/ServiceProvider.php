<?php

namespace App\Modules\Cfo;

class ServiceProvider extends \App\Modules\ServiceProvider {

    public function register() {
        parent::register("cfo");
    }

    public function boot() {
        parent::boot("cfo");
    }

}