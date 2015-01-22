<?php

namespace App\Modules\User;

class ServiceProvider extends \App\Modules\ServiceProvider {

    public function register() {
        parent::register("user");
    }

    public function boot() {
        parent::boot("user");
    }

}