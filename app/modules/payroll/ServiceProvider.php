<?php

namespace App\Modules\Payroll;

class ServiceProvider extends \App\Modules\ServiceProvider {

    public function register() {
        parent::register("payroll");
    }

    public function boot() {
        parent::boot("payroll");
    }

}