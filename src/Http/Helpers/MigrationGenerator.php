<?php 


namespace Crud\Generator\Http\Helpers;


class MigrationGenerator
{

    public $table_name;
    public $migration_field;
    public $field_type;
    public $field_size;
    public $default_value;
    public $nullable;
    public $foreign_table;
    public $update_cascade;
    public $delete_cascade;
    function __construct($table_name, $migration_field, $field_type, $field_size, $default_value, $nullable, $foreign_table, $update_cascade, $delete_cascade)
    {
        $this->table_name = $table_name;
        $this->migration_field = $migration_field;
        $this->field_type = $field_type;
        $this->field_size = $field_size;
        $this->default_value = $default_value;
        $this->nullable = $nullable;
        $this->foreign_table = $foreign_table;
        $this->update_cascade = $update_cascade;
        $this->delete_cascade = $delete_cascade;
    }

    function generateMigration()
    {
        $migration = '
        <?php
        use Illuminate\Database\Migrations\Migration;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Support\Facades\Schema;
        class Create' . $this->table_name . 'Table extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create(\'' . $this->table_name . '\', function (Blueprint $table) {
                    $table->id();  
        ';
        //   print_r($this->foreign_table);
        //   exit;
        foreach ($this->migration_field as $key => $field) {
            
            // print_r($this->field_type);
            // exit;
            if ($this->field_type[$key] === 'foreignId') {
                //  printf($this->foreign_table[$key]);
                //  exit;
              
                $migration .= '
                      $table->' . $this->field_type[$key] . '(\'' . $field . '\',' . $this->field_size[$key] . ')->constrained(\'' . $this->foreign_table[$key] . '\')';
                if ($this->delete_cascade[$key] == 'on') {
                    $migration .= '->onDelete(\'cascade\')';
                }
                if ($this->update_cascade[$key] == 'on') {
                    $migration .= '->onUpdate(\'cascade\')';
                }
            } else {
                $migration .= '
                   $table->' . $this->field_type[$key] . '(\'' . $field . '\'' ;
                   if($this->field_size[$key]){
                       $migration .= ',' . $this->field_size[$key] ;
                   }
                   $migration .= ')';
            }
            if ($this->nullable[$key] == 'on') {
                $migration .= '->nullable()';
            } else if ($this->default_value[$key] != "") {
                if ($this->field_type[$key] == 'boolean' || $this->field_type[$key] == 'integer' || $this->field_type[$key] == 'float') {
                    $migration .= '->default(' . $this->default_value[$key] . ')';
                } else {
                    $migration .= '->default(\'' . $this->default_value[$key] . '\')';
                }
            }

            $migration .= ';';
        }
        $migration .= '
               $table->softDeletes();
               $table->timestamps();
                });
              }
    
            /**
              * Reverse the migrations.
              *
              * @return void
              */
                public function down()
                    {
                     Schema::dropIfExists(\'' . $this->table_name . '\');
                    }
            }
          ';
        return $migration;
    }
}