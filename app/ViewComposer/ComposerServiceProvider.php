<?php
namespace App\ViewComposer;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    public function boot()
    {
        View::composer('frontInc.sidebar', 'App\ViewComposer\DepartmentComposer');
        View::composer(
            [
                'admin.jobPost.create',
                'admin.jobPost.edit',
                'admin.jobPost.search',
                'admin.application.search',
                'admin.jobPost.searchResult',
                'front.home'
            ],
            'App\ViewComposer\DepartmentComposer'
        );
    }

    public function register()
    {

    }
} 