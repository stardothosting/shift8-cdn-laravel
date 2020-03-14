<?php
namespace Shift8\Shift8cdn;
use Illuminate\Support\ServiceProvider;

class Shift8CdnServiceProvider extends ServiceProvider {

    public function boot()
    {
    	$this->publishes([
        __DIR__.'/config/shift8cdn.php' => config_path('shift8cdn.php'),
    	]);
    	include __DIR__.'/Shift8CdnHelper.php';
    	//var_dump('test');
    	//exit(0);
    	//die();
    	//dd("testing123");
    	//die();
    	//exit();
    }

    public function register()
    {
    }

}

