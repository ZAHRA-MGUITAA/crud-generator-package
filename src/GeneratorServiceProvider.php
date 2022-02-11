<?php
namespace Crud\Generator;
use Illuminate\Support\ServiceProvider;

class GeneratorServiceProvider extends ServiceProvider
{
    public function boot(){
           $this->loadRoutesFrom(__DIR__.'/routes/web.php');
           $this->loadViewsFrom(__DIR__.'/views','generator');
           $this->publishes([
            __DIR__.'/public' => public_path('generator'),
        ], 'public');
    }

    public function register(){

    }
}