<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form generator</title>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('generator/style.css') }}">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>

<body>
    <div class="title-back">
        <h2 class="title">crud generator</h2>
    </div>
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->
    <div>
        <form action="{{ route('crud') }}" method="post">
            @csrf
            <div class="section section-1">
                <div class="container">
                    <h4 class="section-title">Controller</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="controller_name">Controller name</label>
                                    <input type="text" class="form-control" name="controller_name" placeholder="enter controller name without 'Controller'">
                                </div>
                                <div class="col-md-6" id="methods">
                                    <label for="" class="control-label">Chose methods</label><br>
                                    <label class="checkbox-inline"><input id="checkall" type="checkbox" value="checkall">All</label>
                                    <label class="checkbox-inline "><input class="method" type="checkbox" name="methods[]" value="index">Index</label>
                                    <label class="checkbox-inline "><input class="method" type="checkbox" name="methods[]" value="create">Create</label>
                                    <label class="checkbox-inline "><input class="method" type="checkbox" name="methods[]" value="store">Store</label>
                                    <label class="checkbox-inline "><input class="method" type="checkbox" name="methods[]" value="edit">Edit</label>
                                    <label class="checkbox-inline "><input class="method" type="checkbox" name="methods[]" value="update">Update</label>
                                    <label class="checkbox-inline "><input class="method" type="checkbox" name="methods[]" value="delete">Delete</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="section_">
                <div class="container">
                    <h4 class="section-title">Model</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Model name</label>
                                    <input type="text" class="form-control" name="model_name" placeholder="enter model name">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Table name</label>
                                    <input type="text" class="form-control" name="table_name" placeholder="enter table name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="relations">
                                <div class="row"></div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label" for="">Relation name</label>
                                        <input type="text" class="form-control" name="relation_name[]" placeholder="relation name">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label" for="">Relation</label>
                                        <select name="relations[]" class="form-control" id="">
                                            <option value=""></option>
                                            <option value="hasOne">hasOne</option>
                                            <option value="belongsTo">belongsTo</option>
                                            <option value="hasMany">hasMany</option>
                                            <option value="belongsToMany">belongsToMany</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label" for="">model</label>
                                        <input type="text" class="form-control" name="relation_model[]" placeholder="model">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label" for="">field</label>
                                        <input type="text" class="form-control" name="relation_field[]" placeholder="field">
                                    </div>
                                    <div class="col-md-2 add">
                                        <label class="control-label" for=""></label>
                                        <button type="button" class="form-control btn btn-success add">+</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="section">
                <div class="container">
                    <h4 class="section-title">Migrations</h4>
                    <div class="row">
                        <div class="fields">
                            <div class="row"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label for="">Field name</label>
                                        <input type="text" class="form-control" name="migration_field[]" placeholder="enter field name">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Field type</label>
                                        <select name="field_type[]" class="form-control fields_type">
                                            <option value=""></option>
                                            <option value="integer">integer</option>
                                            <option value="foreignId">foreignId</option>
                                            <option value="float">float</option>
                                            <option value="boolean">boolean</option>
                                            <option value="string">string</option>
                                            <option value="text">text</option>
                                            <option value="longText">longText</option>
                                            <option value="timestamp">timestamp</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Field size</label>
                                        <input type="text" class="form-control" name="field_size[]" placeholder="enter field size">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Default value</label>
                                        <input type="text" class="form-control" name="default_value[]" placeholder="enter field default value">
                                    </div>
                                    <div class="col-md-3 null checkbox">
                                        <label class="checkbox-inline">
                                            <input class="form-check-input nullable " type="checkbox" name="nullable[]" value="on">
                                            <input class="form-check-input" type="hidden" name="nullable[]" value="off">
                                            nullabel
                                        </label>
                                    </div>
                                    <div class="col-md-3  checkbox">
                                        <label class="checkbox-inline" for="">
                                            <input class="form-check-input" type="hidden" name="in_index[]" value="off">
                                            <input class="form-check-input inindex" type="checkbox" name="in_index[]" value="on">
                                            show in index
                                        </label>
                                    </div>
                                    <div class="col-md-3  checkbox">
                                        <label class="checkbox-inline" for="">
                                            <input class="form-check-input" type="hidden" name="in_form[]" value="off">
                                            <input class="form-check-input inform" type="checkbox" name="in_form[]" value="on">
                                            use in form
                                        </label>
                                    </div>
                                </div>
                                <div class='row foreign'>
                                    <div class='col-md-12'>
                                        <div class='col-md-4 foreign_table'><label>foreign key table</label><input type='text' class='form-control' name='foreign_table[]' placeholder='enter foreign key table'></div>
                                        <div class='col-md-4 checkbox'><label class='checkbox-inline'><input class='form-check-input' type='hidden' name='delete_cascade[]' value='off'><input class='form-check-input delete_cascade' type='checkbox' name='delete_cascade[]' value='on'>delete on cascade</label></div>
                                        <div class='col-md-4 checkbox'><label class='checkbox-inline'><input class='form-check-input' type='hidden' name='update_cascade[]' value='off'><input class='form-check-input update_cascade' type='checkbox' name='update_cascade[]' value='on'>update on cascade</label></div>
                                    </div>
                                </div>
                                <div class="validation">
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <div class="checkbox add-validation-check">
                                                <label><input type="hidden" class="add-validation" name="add_validation[]" value="off">
                                                <input type="checkbox" class="add-validation" name="add_validation[]" value="on">
                                                add validation</label>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Validation Modal -->
                                    <div class="modal validation-modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">add validation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">





                                                    <div class="col-md-12">
                                                        <div class="checkbox  required">
                                                            <div class="required-check">
                                                                <label><input type="hidden" name="required[]" value="off"><input type="checkbox" id="required" name="required[]" value="on">required</label>

                                                            </div>
                                                            <div class="methodevalidation">
                                                                <label class='store'><input type="hidden" name="instore[]" value="off"><input type="checkbox" id="instore" name="instore[]" value="on">use in store validation</label>
                                                                <label class='update'><input type="hidden" name="update[]" value="off"><input type="checkbox" id="update" name="update[]" value="on">use in update validation</label>

                                                            </div>
                                                        </div>
                                                        <div class="checkbox   min-section">
                                                            <div class=" min-check">
                                                                <label><input type="hidden" name="min[]" value="off"><input type="checkbox" id="min" name="min[]" value="on">min</label>
                                                            </div>
                                                            <div class='form-group min'>
                                                                <label>min value</label><input class='form-control' name='min' type='text'>
                                                                <div class="methodevalidation">
                                                                    <label class='store'><input type="hidden" name="instore[]" value="off"><input type="checkbox" id="instore" name="instore[]" value="on">use in store validation</label>
                                                                    <label class='update'><input type="hidden" name="update[]" value="off"><input type="checkbox" id="update" name="update[]" value="on">use in update validation</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="checkbox  max-section">
                                                            <div class=" max-check">
                                                                <label><input type="hidden" name="max[]" value="off"><input type="checkbox" id="max" name="max[]" value="on">max</label>
                                                            </div>
                                                            <div class='form-group max'>
                                                                <label>max value</label><input class='form-control' name='max' type='text'>
                                                                <div class="methodevalidation">
                                                                    <label class='store'><input type="hidden" name="instore[]" value="off"><input type="checkbox" id="instore" name="instore[]" value="on">use in store validation</label>
                                                                    <label class='update'><input type="hidden" name="update[]" value="off"><input type="checkbox" id="update" name="update[]" value="on">use in update validation</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="checkbox   email-check">
                                                            <div class="email-val">
                                                                <label><input type="hidden" name="email[]" value="off"><input type="checkbox" id="email" name="email[]" value="on">email</label>
                                                            </div>
                                                            <div class="methodevalidation">
                                                                <label class='store'><input type="hidden" name="instore[]" value="off"><input type="checkbox" id="instore" name="instore[]" value="on">use in store validation</label>
                                                                <label class='update'><input type="hidden" name="update[]" value="off"><input type="checkbox" id="update" name="update[]" value="on">use in update validation</label>
                                                            </div>
                                                        </div>
                                                        <div class="checkbox   password-check">
                                                            <div class="pass-val">
                                                                <label><input type="hidden" name="password[]" value="off"><input type="checkbox" id="password" name="password[]" value="on">password</label>
                                                            </div>
                                                            <div class="methodevalidation">
                                                                <label class='store'><input type="hidden" name="instore[]" value="off"><input type="checkbox" id="instore" name="instore[]" value="on">use in store validation</label>
                                                                <label class='update'><input type="hidden" name="update[]" value="off"><input type="checkbox" id="update" name="update[]" value="on">use in update validation</label>
                                                            </div>
                                                        </div>
                                                        <div class="checkbox   unique-check">
                                                            <div class="unique-val">
                                                                <label><input type="hidden" name="unique[]" value="off"><input type="checkbox" id="unique" name="unique[]" value="on">unique</label>
                                                            </div>
                                                            <div class="methodevalidation">
                                                                <label class='store'><input type="hidden" name="instore[]" value="off"><input type="checkbox" id="instore" name="instore[]" value="on">use in store validation</label>
                                                                <label class='update'><input type="hidden" name="update[]" value="off"><input type="checkbox" id="update" name="update[]" value="on">use in update validation</label>
                                                            </div>
                                                        </div>
                                                        <div class="checkbox   nullable-check">
                                                            <div class="nullable-val">
                                                                <label><input type="hidden" name="nullable[]" value="off"><input type="checkbox" id="nullable" name="nullable[]" value="on">nullable</label>

                                                            </div>
                                                            <div class="methodevalidation">
                                                                <label class='store'><input type="hidden" name="instore[]" value="off"><input type="checkbox" id="instore" name="instore[]" value="on">use in store validation</label>
                                                                <label class='update'><input type="hidden" name="update[]" value="off"><input type="checkbox" id="update" name="update[]" value="on">use in update validation</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 save-validation">
                                                            <button type="button" class="form-control btn btn-success">save valdation</button>
                                                        </div>
                                                    </div>







                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>






                                    <input type="hidden" class="validation-output" name="rules[]">
                                    <input type="hidden" class="update-validation-output" name="update_rules[]">
                                </div>
                                <div class="col-md-2 add add_remove">
                                    <button type="button" class="form-control btn btn-success add">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="section_">
                <div class="container">
                    <h4 class="section-title">Route</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="col-md-6">
                                <label for="">group name</label>
                                <input type="text" name="group_name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for=""> select route</label><br>
                                <label class="checkbox-inline"><input type="checkbox" id="checkall_route" value="">All</label>
                                <label class="checkbox-inline"><input type="checkbox" name="route_method[]" class="route" value="index">index</label>
                                <label class="checkbox-inline"><input type="checkbox" name="route_method[]" class="route" value="create">create</label>
                                <label class="checkbox-inline"><input type="checkbox" name="route_method[]" class="route" value="store">store</label>
                                <label class="checkbox-inline"><input type="checkbox" name="route_method[]" class="route" value="edit">edit</label>
                                <label class="checkbox-inline"><input type="checkbox" name="route_method[]" class="route" value="update">update</label>
                                <label class="checkbox-inline"><input type="checkbox" name="route_method[]" class="route" value="delete">delete</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="text-center submit">
                <input type="submit" class="btn btn-success generate" name="generate" value="Generate">
            </div>
        </form>

        <!-- Modal -->
        <!-- <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="field_content">

                </div>
            </div>
        </div> -->
        <!-- Modal -->
        <div class="modal validation-modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">add validation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                  
                </div>
            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('generator/script.js') }}"></script>

</body>

</html>


{{-- <div class='modal validation-modal' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLongTitle'>add validation</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            </div>
            <div class='modal-body'></div>
            <div class='modal-footer'><button type='button' class='close btn btn-secondary' data-dismiss='modal'>Close</button><button type='button' class='btn btn-primary'>Save</button></div>
        </div>
    </div>
</div> --}}








