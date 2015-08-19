<?php

namespace App\Modules\Fees;

class ServiceProvider extends \App\Modules\ServiceProvider {

    public function register() {
        parent::register("fees");
    }

    public function boot() {
        parent::boot("fees");
    }

}