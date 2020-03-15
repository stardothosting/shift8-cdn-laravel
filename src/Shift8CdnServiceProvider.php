<?php
namespace Shift8Web\Shift8cdn;
use Illuminate\Support\ServiceProvider;

class Shift8CdnServiceProvider extends ServiceProvider {

    public function boot()
    {
    	// Copy config file via vendor publish
    	$this->publishes([
        __DIR__.'/config/shift8cdn.php' => config_path('shift8cdn.php'),
    	]);

    	// Include the helper functions
    	include __DIR__.'/Shift8CdnHelper.php';
    }

    public function register()
    {
    }

}

