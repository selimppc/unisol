<?php

namespace App\Modules\Payment;

class ServiceProvider extends \App\Modules\ServiceProvider {

    public function register() {
        parent::register("payment");
    }

    public function boot() {
        parent::boot("payment");
    }

}