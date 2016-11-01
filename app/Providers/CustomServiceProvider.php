<?php
/**
 * Created by PhpStorm.
 * User: Anik Dey
 * Date: 10/18/2016
 * Time: 1:42 PM
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('App\Services\DepartmentService', 'App\Services\DepartmentServiceImpl');
        $this->app->bind('App\Services\JobPostService', 'App\Services\JobPostServiceImpl');
        $this->app->bind('App\Services\ApplicantService', 'App\Services\ApplicantServiceImpl');
    }
} 