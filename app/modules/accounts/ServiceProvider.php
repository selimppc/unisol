<?php

namespace App\Modules\Accounts;

class ServiceProvider extends \App\Modules\ServiceProvider {

    public function register() {
        parent::register("accounts");
    }

    public function boot() {
        parent::boot("accounts");
    }

}