<?php

namespace Crud\Generator\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Crud\Generator\Http\Helpers\ZipGenerator;
use Crud\Generator\Http\Helpers\FileGenerator;
use Illuminate\Support\Str;
use Crud\Generator\Http\Helpers\{
    ViewGenerator,
    ModelGenerator,
    RouteGenerator,
    RulesGenerator,
    MigrationGenerator,
    ControllerGenerator
};
// use Crud\Generator\Http\Helpers\ModelGenerator;
// use Crud\Generator\Http\Helpers\RouteGenerator;
// use Crud\Generator\Http\Helpers\RulesGenerator;
// use Crud\Generator\Http\Helpers\MigrationGenerator;
// use Crud\Generator\Http\Helpers\ControllerGenerator;

class GeneratorController extends Controller
{


    public function index()
    {
        return view('generator::index');
    }

    public function generate(Request $request)
    {
        // Storage::disk('local')->put('example.txt', $request->all());



        $files  = [];
        /**generate controller */
        if (!empty($request->controller_name)) {
            $controller = new ControllerGenerator(Str::ucfirst($request->controller_name).'Controller', $request->methods, $request->model_name, $request->migration_field, $request->in_form, $request->group_name);
            $content_controller = $controller->generateController();

            /**generate file controller */
            $disk = Storage::build([
                'driver' => 'local',
                'root' => base_path('app/Http/Controllers'),
    
            ]);
            $disk->put($request->controller_name."Controller.php", $content_controller);



            // $controller_file = new FileGenerator($request->controller-name . "Controller", $cont);
            // $controller_file->generateFile();

            // /**get controller file name */
            // $controller_fil = $controller_file->getFilename();

            // array_push($files, $controller_fil . ".php");


        }

        /**generate model */
        if (!empty($request->model_name)) {
            $model = new ModelGenerator($request->model_name, $request->table_name, $request->relation_name, $request->relations, $request->relation_model, $request->relation_field,$request->migration_field);
            $content_model = $model->generateModel();

            /**generate file model */

            $disk = Storage::build([
                'driver' => 'local',
                'root' => base_path('app/Models'),
            ]);
            $disk->put($request->model_name . ".php", $content_model);


            // $model_file = new FileGenerator($request->model_name, $mod);
            // $model_file->generateFile();

            // /**get model file name */
            // $model_fil = $model_file->getFilename();
            // array_push($files, $model_fil . ".php");
        }

        /**generate migration */

        if (!empty($request->table_name) && !empty($request->migration_field)) {
            $migration = new MigrationGenerator($request->table_name, $request->migration_field, $request->field_type, $request->field_size, $request->default_value, $request->nullable, $request->foreign_table, $request->update_cascade, $request->delete_cascade);
            $content_migration = $migration->generateMigration();

            /**generate file migration */
            $disk = Storage::build([
                'driver' => 'local',
                'root' => base_path('database/migrations'),
            ]);
            $disk->put(date('Y_m_d_His').'_create'.$request->table_name."_table.php", $content_migration);


            // $migration_file = new FileGenerator($request->table_name . "-migration", $mig);
            // $migration_file->generateFile();

            // $migration_fil = $migration_file->getFilename();

            // array_push($files, $migration_fil . ".php");
        }

        /**generate route */
        if (!empty($request->group_name) && !empty($request->route_method)) {
            $route = new RouteGenerator($request->group_name, $request->route_method, $request->model_name, $request->controller_name);
            $content_route = $route->generateRoute();
            /**generate file route */
            $disk = Storage::build([
                'driver' => 'local',
                'root' => base_path('routes'),
            ]);
            $disk->append('web.php', $content_route);

            // $route_file = new FileGenerator("route", $rout);
            // $route_file->generateFile();
            // $route_fil = $route_file->getFilename();
            // array_push($files, $route_fil . ".php");
        }


        /***generate views */
        $views = new ViewGenerator($request->group_name, $request->model_name, $request->migration_field, $request->in_form, $request->in_index);
        if (in_array('on', $request->in_form)) {
            $content_create = $views->generateCreateForm();

            $disk = Storage::build([
                'driver' => 'local',
                'root' => base_path('resources/views/'.$request->model_name),
            ]);
            $disk->put("create.blade.php", $content_create);
            // $create_file = new FileGenerator("create", $create);
            // $create_file->generateFileInFolder('views');
            // $create_fil = $create_file->getFilename();
            // array_push($files, 'views/' . $create_fil . ".php");

            $content_edit = $views->generateEditForm();

            $disk = Storage::build([
                'driver' => 'local',
                'root' => base_path('resources/views/'.$request->model_name),
            ]);
            $disk->put("edit.blade.php", $content_edit);
            // $edit_file = new FileGenerator("edit", $edit);
            // $edit_file->generateFileInFolder('views');

            // $edit_fil = $edit_file->getFilename();
            // array_push($files, 'views/' . $edit_fil . ".php");
        }

        if (in_array('on', $request->in_index)) {
            $content_index = $views->generateIndex();
            $disk = Storage::build([
                'driver' => 'local',
                'root' => base_path('resources/views/'.$request->model_name),
            ]);
            $disk->put("index.blade.php", $content_index);
            // $index_file = new FileGenerator("index", $index);

            // $index_file->generateFileInFolder('views');
            // $index_fil = $index_file->getFilename();
            // array_push($files, 'views/' . $index_fil . ".php");
        }


        if (!empty($request->add_validation)) {
            // print_r($request->add-validation);
            // exit;
            $rule = new RulesGenerator($request->model_name, $request->migration_field, $request->rules, $request->update_rules, $request->add_validation);
            $content_store_rules = $rule->generateRequest();

            $disk = Storage::build([
                'driver' => 'local',
                'root' => base_path('app/Http/Requests'),
            ]);
            $disk->put($request->model_name . "StoreRequest.php", $content_store_rules);
            // $rules_file = new FileGenerator($request->model_name . "StoreRequest", $rules);
            // $rules_file->generateFileInFolder('validation');
            // $rules_fil = $rules_file->getFilename();
            // array_push($files,  'validation/' . $rules_fil . ".php");


            $content_update_rules = $rule->generateUpdateRequest();
            $disk = Storage::build([
                'driver' => 'local',
                'root' => base_path('app/Http/Requests'),
            ]);
            $disk->put($request->model_name . "UpdateRequest.php", $content_update_rules);
            // $update_rules_file = new FileGenerator($request->model_name . "UpdateRequest", $update_rules);
            // $update_rules_file->generateFileInFolder('validation');
            // $update_rules_fil = $update_rules_file->getFilename();
            // array_push($files, 'validation/' . $update_rules_fil . ".php");
        }
         //app/Http/Requests
        /** generate and download zip file */
        // $zip = new ZipGenerator($request->model_name, $files);
        // $zip->generatrZip();
        // $zip->downloadZip();

        return redirect()->back();

    }
}
