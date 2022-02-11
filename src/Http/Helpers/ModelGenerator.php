<?php 


namespace Crud\Generator\Http\Helpers;

class ModelGenerator
{
    public $model_name;
    public $table_name;
    public $relation_name;
    public $relations;
    public $relation_model;
    public $relation_field;
    public $migration_fields;

    function __construct($model_name, $table_name, $relation_name, $relations, $relation_model, $relation_field,$migration_fields)
    {
        $this->model_name = $model_name;
        $this->table_name = $table_name;
        $this->relation_name = $relation_name;
        $this->relations = $relations;
        $this->relation_model = $relation_model;
        $this->relation_field = $relation_field;
        $this->migration_fields = $migration_fields;
    }

    function generateModel()
    {
        $model = '<?php
    
        namespace App\Models;
        
        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;
        use Illuminate\Database\Eloquent\SoftDeletes;

        
        class ' . $this->model_name . ' extends Model
        {
            use SoftDeletes;
 
            protected $table = \'' . $this->table_name . '\';
        ';

        $model .= 'protected $fillable = [';
            foreach ($this->migration_fields as $key => $field) {
                $model .='\''.$field.'\',';
            }
            $model .='];';
        // print_r($this->relation_model);
        // exit;
        foreach ($this->relations as $key => $relation) {
            if (!empty($relation)) {
                $model .= '
                public function ' . $this->relation_name[$key] . '(){
                    return $this->' . $relation . '(' . $this->relation_model[$key] . '::class,\'' . $this->relation_field[$key] . ' \');
                }';
            }
        }


        $model .= '
                   }';
        return $model;
    }
}
