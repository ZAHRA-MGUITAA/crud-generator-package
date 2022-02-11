<?php

namespace Crud\Generator\Http\Helpers;



class RouteGenerator
{
    public $group_name;
    public $route_methods;
    public $model_name;
    public $controller_name;

    function __construct($group_name, $route_methods, $model_name, $controller_name)
    {
        $this->group_name =     $group_name;
        $this->route_methods =     $route_methods;
        $this->model_name =     $model_name;
        $this->controller_name =     $controller_name . 'Controller';
    }

    function generateRoute()
    {

        // $route = '
        // <?php
    
        // use App\Http\Controllers\\' . $this->controller_name . ';
        // use App\Models\\' . $this->model_name . ';
        // use Illuminate\Support\Facades\Route;
    
        // ';

        $route = '
                  Route::group([\'prefix\'=>\'' . $this->group_name . '\',\'as\'=>\'' . $this->group_name . '.\'],function(){
        ';
        foreach ($this->route_methods as $key => $method) {
            if ($method == 'index')
                $route .= '
           Route::get(\'/\', [' . $this->controller_name . '::class,\'' . $method . '\'])->name(\'' . $method . '\');
           ';
            if ($method == 'edit') {
                $route .= '      
                Route::get(\'/' . $method . '/{id}\', [' . $this->controller_name . '::class,\'' . $method . '\'])->name(\'' . $method . '\');
               ';
            }
            if ($method == 'create') {
                $route .= '      
                Route::get(\'/' . $method . '\', [' . $this->controller_name . '::class,\'' . $method . '\'])->name(\'' . $method . '\');
               ';
            }
            if ($method == 'store') {
                $route .= '      
             Route::post(\'/' . $method . '\', [' . $this->controller_name . '::class,\'' . $method . '\'])->name(\'' . $method . '\');
            ';
            }
            if ($method == 'update') {
                $route .= '      
                Route::post(\'/' . $method . '/{id}\', [' . $this->controller_name . '::class,\'' . $method . '\'])->name(\'' . $method . '\');
               ';
            }
            if ($method == 'delete') {
                $route .= '      
             Route::delete(\'/' . $method . '/{id}\', [' . $this->controller_name . '::class,\'' . $method . '\'])->name(\'' . $method . '\');
            ';
            }
        }
        $route .= '
                 });
            ';
        return $route;
    }
}