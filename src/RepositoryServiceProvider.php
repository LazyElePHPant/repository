<?php

namespace LazyElePHPant\Repository;

use Illuminate\Support\ServiceProvider;
use LazyElePHPant\Repository\Console\Commands\RepositoryMakeCommand;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    	if ($this->app->runningInConsole()) {
	        $this->commands([
	            RepositoryMakeCommand::class,
	        ]);
	    }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }
}
