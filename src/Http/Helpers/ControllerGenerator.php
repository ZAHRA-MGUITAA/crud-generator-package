<?php

namespace Crud\Generator\Http\Helpers;


class ControllerGenerator
{
    public $controller_name;
    public $methods;
    public $model;
    public $fields;
    public $inform;
    public $group_name;

    function __construct($controller_name, $methods, $model, $fields, $inform, $group_name)
    {
        $this->controller_name = $controller_name;
        $this->methods = $methods;
        $this->model = $model;
        $this->fields = $fields;
        $this->inform = $inform;
        $this->group_name = $group_name;
    }

    function generateController()
    {
        $controller = '<?php
        namespace App\Http\Controllers;
        use Illuminate\Http\Request;
        use App\Models\\' . $this->model . ';
        class ' . $this->controller_name . ' extends Controller
        {
            ';
        foreach ($this->methods as $method) {
            if ($method == 'index') {
                $controller .= '
            public function index(){
                $' . strtolower($this->model).'s'. ' = ' . $this->model . '::get();
                return view(\'' . $this->group_name . '.index\',compact(\'' . strtolower($this->model).'s' . '\'));
            }
             ';
            }

            if ($method == 'create') {
                $controller .= 'public function create(){
                    return view(\'' . $this->group_name . '.create\');
                }
             ';
            }
            if ($method == 'store') {
                $controller .= ' public function store(Request $request){
                       ' . $this->model . '::create([';
                foreach ($this->fields as $key => $field) {
                    if ($this->inform[$key] == 'on') {
                        $controller .= '
                           \'' . $field . '\' => $request->' . $field . ',
                      ';
                    }
                }
                $controller .=  '
                      ]);
                      return redirect()->route(\'' . $this->group_name . '.index\');
                      
                    }
                ';
            }
            if ($method == 'edit') {
                $controller .= 'public function edit($id){
                     $' . $this->model . '=' . $this->model . '::where(\'id\',$id)->first();
                     return view(\'' . $this->group_name . '.edit\',compact(\'' . strtolower($this->model) . '\'));
                }
            ';
            }
            if ($method == 'update') {
                $controller .= 'public function update(Request $request,$id){
                ' . $this->model . '::where(\'id\' , $id)->update([';

                foreach ($this->fields as $key => $field) {
                    if ($this->inform[$key] == 'on') {
                        $controller .= '
               \'' . $field . '\' => $request->' . $field . ', 
               ';
                    }
                }

                $controller .= '
            ]);
            return redirect()->route(\'' . $this->group_name . '.index\');
        }
              ';
            }
            if ($method == 'delete') {
                $controller .= '  public function delete($id){
                ' . $this->model . '::where($id)->delete();
                return redirect()->route(\'' . $this->group_name . '.index\');
            }
            ';
            }
        }
        $controller .= '}';
        return $controller;
    }
}
