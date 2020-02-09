<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    private $entities = ['Category', 'Transaction', 'Tag', 'User'];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        foreach( $this->entities as $entity ) {
            $this->app->bind(
                "App\Contracts\\{$entity}RepositoryInterface",
                "App\Repositories\\{$entity}Repository"
            );
        }
    }

}