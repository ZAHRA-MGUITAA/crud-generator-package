<?php  



namespace Crud\Generator\Http\Helpers;


class ViewGenerator
{
    public $fields;
    public $inform;
    public $inindex;
    public $model;
    public $group_name;

    function __construct($group_name, $model, $fields, $inform, $inindex)
    {
        $this->group_name = $group_name;
        $this->model = $model;
        $this->fields  = $fields;
        $this->inform  = $inform;
        $this->inindex = $inindex;
    }

    function generateCreateForm()
    {
        $create = '
          <!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta http-equiv="X-UA-Compatible" content="ie=edge">
              <title>' . $this->model . '-create</title>
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
          </head>
          <body>
              <div class="container">
                  <h4>Add ' . $this->model . '</h4>
                  <form action="{{ route(\'' . $this->group_name . '.store\') }}" method="post">
                      @csrf
                    ';
        foreach ($this->fields as $key => $field) {
            if ($this->inform[$key] == 'on') {
                $create .= '
                   <div class="form-group">
                      <label for="' . $field . '">' . $field . ':</label>
                      <input type="text" class="form-control" id="' . $field . '" placeholder="Enter ' . $field . '" name="' . $field . '">
                    </div>
                   ';
            }
        }
        $create .= ' 
                    <button type="submit" class="btn btn-primary">Add</button>
                  </form>
                </div>
          </body>
          </html>
          ';
        return $create;
    }

    function generateEditForm()
    {
        $edite = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>' . $this->model . '-edite</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>
        <body>
            <div class="container">
                <h4>Add ' . $this->model . '</h4>
                <form action="{{ route(\'' . $this->group_name . '.update\',[\'id\' => $' . $this->model . '->id]) }}" method="post">
                    @csrf
        ';
        foreach ($this->fields as $key => $field) {
            if ($this->inform[$key] == 'on') {
                $edite .= '
                   <div class="form-group">
                      <label for="' . $field . '">' . $field . ':</label>
                      <input type="text" class="form-control" id="' . $field . '" value ="{{$' . strtolower($this->model) . '->' . $field . '}}"  name="' . $field . '">
                    </div>
                   ';
            }
        }
        $edite .= '
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </body>
    </html>
        ';
        return $edite;
    }

    function generateIndex()
    {
        $index = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>' . $this->model . '-index</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>
        <body>
            <div class="container">
                <h4> index ' . $this->model . '</h4>
                <table class="table">
                <thead>
                    <tr>
        ';
        foreach ($this->fields as $key => $field) {
            if ($this->inindex[$key] == 'on') {
                $index .= '
                <th>' . $field . '</th>
        ';
            }
        }
        $index .= '
            <th collspan="2">action</th>
        ';

        $index .= '
            </tr>
            </thead>
            <tbody>
        ';

        $index .= '
        @foreach($' . $this->model.'s as $' . $this->model . ')
            <tr>
        ';
        foreach ($this->fields as $key => $field) {
            if ($this->inindex[$key] == 'on') {
                $index .= '
                <td>{{$' . $this->model . '->' . $field . '}}</td>
        ';
            }
        }
        $index .= '
            <td> <td><button type="button" class="btn btn-success"> <a href="{{ route(\'' . $this->group_name . '.edit\',[\'id\' => $' . $this->model . '->id]) }}">Edit</a> </button></td> </td>
        <td>
        <form id="delete-form" method="POST" action="{{ route(\'' . $this->group_name . '.delete\',[\'id\' => $' . $this->model . '->id]) }}">
            {{ csrf_field() }}
            {{ method_field(\'DELETE\') }}
    
            <div class="form-group">
              <input type="submit" class="btn btn-danger" value="Delete">
            </div>
          </form>
        </td>
        </tr>
        @endforeach
         </tbody>
       </table>
    </div>
   </body>
   </html>';

        return $index;
    }
}
