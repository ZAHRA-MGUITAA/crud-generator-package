<?php


namespace Crud\Generator\Http\Helpers;


class RulesGenerator
{
    public $model;
    public $fields;
    public $rules;
    public $update_rules;
    public $validation_field;

    function __construct($model, $fields, $rules, $update_rules, $validation_field)
    {
        $this->model = $model;
        $this->fields = $fields;
        $this->rules = $rules;
        $this->update_rules = $update_rules;
        $this->validation_field = $validation_field;
    }

    function generateRequest()
    {
        $request = '
<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ' . $this->model . 'StoreRequest extends FormRequest
  {
        public function rules()
           {
                 return [
        ';

        foreach ($this->fields as $key => $field) {
            if (!empty($this->rules[$key])) {
                if ($this->validation_field[$key] == 'on') {
                    $request .= '\'' . $field . '\' => \'' . $this->rules[$key] . '\',
                ';
                }
            }
            // printf($request);
            // exit;
        }
        $request .= '
    ];
               }
               } ';
        return $request;
    }

    function generateUpdateRequest()
    {
        $request = '
<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ' . $this->model . 'UpdateRequest extends FormRequest
  {
        public function rules()
           {
                 return [
        ';

        foreach ($this->fields as $key => $field) {
            if (!empty($this->update_rules[$key])) {
                if ($this->validation_field[$key] == 'on') {
                    $request .= '\'' . $field . '\' => \'' . $this->update_rules[$key] . '\',
                ';
                }
            }
            // printf($request);
            // exit;
        }
        $request .= '
    ];
               }
               } ';
        return $request;
    }
}
