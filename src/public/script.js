$(document).on('click', ".fields .row:last-child .col-md-2 button.form-control.btn.btn-success.add", function() {
    add_new_row("fields");
});
$(document).on('click', "body .fields .row .col-md-2 button.form-control.btn.btn-danger.delete", function() {
    remove(this, "fields");
});


$(document).on('click', ".relations .row:last-child .col-md-2 button.form-control.btn.btn-success.add", function() {
    add_new_row("relations");
});
$(document).on('click', "body .relations .row .col-md-2 button.form-control.btn.btn-danger.delete", function() {
    remove(this, "relations");
});



function add_new_row(row_class) {
    var id = Math.floor(Math.random() * 100000000);
    if (row_class == "fields")
        var html = "<div class='row' row_id='" + id + "'><div class='col-md-12'><div class='col-md-2'> <label>Field name</label> <input type='text' class='form-control' name='migration_field[]' placeholder='enter field name'>  </div><div class='col-md-2'> <label for=''>Field type</label><select name='field_type[]' class='form-control fields_type'  id=''><option value='integer'>integer</option><option value='foreignId'>foreignId</option><option value='float'>float</option><option value='boolean'>boolean</option><option value='string'>string</option><option value='text'>text</option><option value='longText'>longText</option><option value='timestamp'>timestamp</option></select></div><div class='col-md-2'><label>Field size</label><input type='text' class='form-control' name='field_size[]' placeholder='enter field size'></div><div class='col-md-3'><label>default value</label><input type='text' class='form-control' name='default_value[]' placeholder='enter field default value'></div><div class='col-md-1 checkbox'><label class='checkbox-inline' for=''><input class='form-check-input' type='hidden' name='nullable[]' value='off'><input class='form-check-input nullable' type='checkbox' name='nullable[]' value='on'>nullabel</label></div><div class='col-md-1 checkbox'><label class='checkbox-inline' for=''><input class='form-check-input' type='hidden' name='in_index[]' value='off' id=''><input class='form-check-input inindex' type='checkbox' name='in_index[]' value='on' id=''>show in index</label></div><div class='col-md-1 checkbox'> <label class='checkbox-inline' for=''><input class='form-check-input' type='hidden' name='in_form[]' value='off' id=''><input class='form-check-input inform' type='checkbox' name='in_form[]' value='on' id=''>use in form</label></div></div><div class='row foreign' row_id='" + id + "' ><div class='col-md-12'><div class='col-md-4 foreign_table'><label >foreign key table</label><input type='text' class='form-control' name='foreign_table[]' placeholder='enter foreign key table'></div> <div class='col-md-4 checkbox'><label class='checkbox-inline' ><input class='form-check-input' type='hidden' name='delete_cascade[]' value='off'><input class='form-check-input delete_cascade' type='checkbox' name='delete_cascade[]' value='on'>delete on cascade</label></div>  <div class='col-md-4 checkbox'><label class='checkbox-inline' ><input class='form-check-input' type='hidden' name='update_cascade[]' value='off'><input class='form-check-input update_cascade' type='checkbox' name='update_cascade[]' value='on'>update on cascade</label></div></div></div>        <div class='validation'><div class='col-md-12'><div class='col-md-2'><div class='checkbox add-validation-check'><label><input type='hidden' class='add-validation' name='add_validation[]' value='off'><input type='checkbox' class='add-validation' name='add_validation[]' value='on'>add validation</label></div></div></div><!-- Validation Modal --><div class='modal validation-modal' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'><div class='modal-dialog modal-dialog-centered' role='document'> <div class='modal-content'><div class='modal-header'><h5 class='modal-title' id='exampleModalLongTitle'>add validation</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div><div class='modal-body'> <div class='col-md-12'><div class='checkbox  required'><div class='required-check'><label><input type='hidden' name='required[]' value='off'><input type='checkbox' id='required' name='required[]' value='on'>required</label></div> <div class='methodevalidation'><label class='store'><input type='hidden' name='instore[]' value='off'><input type='checkbox' id='instore' name='instore[]' value='on'>use in store validation</label><label class='update'><input type='hidden' name='update[]' value='off'><input type='checkbox' id='update' name='update[]' value='on'>use in update validation</label></div></div> <div class='checkbox   min-section'><div class=' min-check'><label><input type='hidden' name='min[]' value='off'><input type='checkbox' id='min' name='min[]' value='on'>min</label></div><div class='form-group min'><label>min value</label><input class='form-control' name='min' type='text'><div class='methodevalidation'><label class='store'><input type='hidden' name='instore[]' value='off'><input type='checkbox' id='instore' name='instore[]' value='on'>use in store validation</label><label class='update'><input type='hidden' name='update[]' value='off'><input type='checkbox' id='update' name='update[]' value='on'>use in update validation</label></div></div></div> <div class='checkbox  max-section'> <div class=' max-check'><label><input type='hidden' name='max[]' value='off'><input type='checkbox' id='max' name='max[]' value='on'>max</label></div><div class='form-group max'><label>max value</label><input class='form-control' name='max' type='text'><div class='methodevalidation'><label class='store'><input type='hidden' name='instore[]' value='off'><input type='checkbox' id='instore' name='instore[]' value='on'>use in store validation</label><label class='update'><input type='hidden' name='update[]' value='off'><input type='checkbox' id='update' name='update[]' value='on'>use in update validation</label></div> </div></div><div class='checkbox   email-check'><div class='email-val'> <label><input type='hidden' name='email[]' value='off'><input type='checkbox' id='email' name='email[]' value='on'>email</label></div> <div class='methodevalidation'><label class='store'><input type='hidden' name='instore[]' value='off'><input type='checkbox' id='instore' name='instore[]' value='on'>use in store validation</label><label class='update'><input type='hidden' name='update[]' value='off'><input type='checkbox' id='update' name='update[]' value='on'>use in update validation</label></div> </div> <div class='checkbox   password-check'><div class='pass-val'><label><input type='hidden' name='password[]' value='off'><input type='checkbox' id='password' name='password[]' value='on'>password</label></div><div class='methodevalidation'><label class='store'><input type='hidden' name='instore[]' value='off'><input type='checkbox' id='instore' name='instore[]' value='on'>use in store validation</label><label class='update'><input type='hidden' name='update[]' value='off'><input type='checkbox' id='update' name='update[]' value='on'>use in update validation</label></div> </div><div class='checkbox   unique-check'><div class='unique-val'><label><input type='hidden' name='unique[]' value='off'><input type='checkbox' id='unique' name='unique[]' value='on'>unique</label></div><div class='methodevalidation'> <label class='store'><input type='hidden' name='instore[]' value='off'><input type='checkbox' id='instore' name='instore[]' value='on'>use in store validation</label><label class='update'><input type='hidden' name='update[]' value='off'><input type='checkbox' id='update' name='update[]' value='on'>use in update validation</label></div></div> <div class='checkbox   nullable-check'><div class='nullable-val'><label><input type='hidden' name='nullable[]' value='off'><input type='checkbox' id='nullable' name='nullable[]' value='on'>nullable</label></div><div class='methodevalidation'><label class='store'><input type='hidden' name='instore[]' value='off'><input type='checkbox' id='instore' name='instore[]' value='on'>use in store validation</label><label class='update'><input type='hidden' name='update[]' value='off'><input type='checkbox' id='update' name='update[]' value='on'>use in update validation</label></div></div><div class='col-md-4 save-validation'><button type='button' class='form-control btn btn-success'>save valdation</button></div></div></div></div></div></div><input type='hidden' class='validation-output' name='rules[]'> <input type='hidden' class='update-validation-output' name='update_rules[]'></div>                 <div class='col-md-2 add_remove'><div class=''> <div class='col-md-6 add'> <label class='form-label'></label> <button row_id='" + id + "' type='button' class='form-control btn btn-success add'>+</button> </div> <div class='col-md-6'> <label class='form-label'></label> <button row_id='" + id + "' type='button' class='form-control btn btn-danger delete'>-</button> </div> </div></div></div>";
    if (row_class == "relations")
        var html = "<div class='row' row_id='" + id + "'><div class='col-md-3'><label for=''>name</label> <input type='text' class='form-control' name='relation_name[]' placeholder='relation name'></div> <div class='col-md-2'><label for=''>relation</label> <select name='relations[]' class='form-control' id=''><option value='hasOne'>hasOne</option><option value='belongsTo'>belongsTo</option><option value='hasMany'>hasMany</option><option value='belongsToMany'>belongsToMany</option> </select></div><div class='col-md-3'><label for=''>medel</label> <input type='text' class='form-control' name='relation_model[]' placeholder='model'></div> <div class='col-md-2'><label for=''>field</label><input type='text' class='form-control' name='relation_field[]' placeholder='field'></div><div class='col-md-2 '><div class='row'> <div class='col-md-6 add'> <label class='form-label'></label> <button row_id='" + id + "' type='button' class='form-control btn btn-success add'>+</button> </div> <div class='col-md-6'> <label class='form-label'></label> <button row_id='" + id + "' type='button' class='form-control btn btn-danger delete'>-</button> </div> </div> </div></div>";

    $('.' + row_class).append(html);
    $('.' + row_class + ' .add').hide();
}

function remove(thiss, row_class) {
    var row_id = $(thiss).attr("row_id");
    $('.row[row_id="' + row_id + '"]').remove();
    var myrows = document.querySelectorAll('.' + row_class + ' > .row');
    if (myrows.length == 2) {
        $('.' + row_class + ' .add').show();
    }
}










/*************************************************************************************************** */

$(document).on('change', 'body .validation .add-validation', function() {
    if ($(this).is(':checked')) {
        // e.preventDefault();
        // e.stopPropagation();
        // var validation_section = $(this).parent().parent().parent().parent().parent().children('.validation-section').html();
        // $('.modal').find('.field_content').append(validation_section);
        // $('.modal').css('display', 'block');
        // var validation_section = $(this).parent().parent().parent().parent().parent().children('.validation-section').html();
        // $(this).parent().parent().parent().parent().parent().children('.validation-modal').find('.modal-body').append(validation_section);

        // $('.validation-modal').find('.modal-body').append(validation_section);
        $(this).parent().parent().parent().parent().parent().children('.validation-modal').show();
        // $(this).parent().parent().parent().parent().parent().children('.validation-section').css('display', 'block');
    } else {
        $(this).parent().parent().parent().parent().parent().children('.validation-section').css('display', 'none');
        // $('.validation-modal').find('.modal-body').empty();
    }
});


$(document).on('click', 'body .validation .validation-modal .modal-dialog .modal-content .modal-body .save-validation', function() {
    console.log('save validation');

    var required;
    var min;
    var max;
    var email;
    var password;
    var unique;
    var nullable;
    var rule = '';
    var ruleupdate = '';
    var id = $(this).parent().parent().parent().attr("row_id");
    // console.log($(this).parent().children('.required').find(':hidden'));
    if ($(this).parent().children('.required').children('.required-check').find(':hidden').is(':disabled')) {
        required = $(this).parent().children('.required').find(':checkbox').val();
        // console.log(required);
        if ($(this).parent().children('.required').children('.methodevalidation').children('.store').find(':hidden').is(':disabled')) {
            rule += 'required';

        }
        if ($(this).parent().children('.required').children('.methodevalidation').children('.update').find(':hidden').is(':disabled')) {
            ruleupdate += 'required';
            // console.log(ruleupdate);
        }
    } else {
        required = $(this).parent().children('.required').find(':hidden').val();
        // console.log(required);
    }
    if ($(this).parent().children('.min-section').children('.min-check').find(':hidden').is(':disabled')) {
        min = $(this).parent().children('.min-section').children('.min-check').find(':checkbox').val();
        var min_value = $(this).parent().children('.min-section').children('.min').children('input').val();
        if ($(this).parent().children('.min-section').children('.min').children('.methodevalidation').children('.store').find(':hidden').is(':disabled')) {
            rule += '|min:' + min_value;
        }
        if ($(this).parent().children('.min-section').children('.min').children('.methodevalidation').children('.update').find(':hidden').is(':disabled')) {
            ruleupdate += '|min:' + min_value;
        }
        // console.log(min);
    } else {
        required = $(this).parent().children('.required').find(':hidden').val();
        // console.log(required);
    }

    if ($(this).parent().children('.max-section').children('.max-check').find(':hidden').is(':disabled')) {
        max = $(this).parent().children('.max-section').children('.max-check').find(':checkbox').val();
        // console.log(max);
        // var max_value = $(this).parent().children('.max input').val();

        var max_value = $(this).parent().children('.max-section').children('.max').children('input').val();
        if ($(this).parent().children('.max-section').children('.max').children('.methodevalidation').children('.store').find(':hidden').is(':disabled')) {
            rule += '|max:' + max_value;
        }
        if ($(this).parent().children('.max-section').children('.max').children('.methodevalidation').children('.update').find(':hidden').is(':disabled')) {
            ruleupdate += '|max:' + max_value;
        }
        // console.log(max_value);
        // rule += '|max:' + max_value;
    } else {
        max = $(this).parent().children('.max-section .max-check').find(':hidden').val();
        // console.log(max);
    }
    if ($(this).parent().children('.email-check').children('.email-val').find(':hidden').is(':disabled')) {
        email = $(this).parent().children('.email-check').find(':checkbox').val();
        // console.log(email);
        if ($(this).parent().children('.email-check').children('.methodevalidation').children('.store').find(':hidden').is(':disabled')) {
            rule += '|email';

        }
        if ($(this).parent().children('.email-check').children('.methodevalidation').children('.update').find(':hidden').is(':disabled')) {
            ruleupdate += '|email';
        }

        // rule += '|email';
        // console.log('email');

    } else {
        email = $('body .email-check').find(':hidden').val();
        // console.log(email);
    }
    if ($(this).parent().children('.password-check').children('.pass-val').find(':hidden').is(':disabled')) {
        password = $(this).parent().children('.password-check').find(':checkbox').val();
        if ($(this).parent().children('.password-check').children('.methodevalidation').children('.store').find(':hidden').is(':disabled')) {
            rule += '|password';

        }
        if ($(this).parent().children('.password-check').children('.methodevalidation').children('.update').find(':hidden').is(':disabled')) {
            ruleupdate += '|password';
        }

    } else {
        password = $('body .password-check').find(':hidden').val();
        // console.log(password);
    }
    if ($(this).parent().children('.unique-check ').children('.unique-val').find(':hidden').is(':disabled')) {
        unique = $(this).parent().children('.unique-check').find(':checkbox').val();
        if ($(this).parent().children('.unique-check').children('.methodevalidation').children('.store').find(':hidden').is(':disabled')) {
            rule += '|unique';

        }
        if ($(this).parent().children('.unique-check').children('.methodevalidation').children('.update').find(':hidden').is(':disabled')) {
            ruleupdate += '|unique';
        }
    } else {
        unique = $('body .unique-check').find(':hidden').val();
        // console.log(unique);
    }
    if ($(this).parent().children('.nullable-check').find(':hidden').is(':disabled')) {
        nullable = $(this).parent().children('.nullable-check').children('.nullable-val').find(':checkbox').val();
        if ($(this).parent().children('.nullable-check').children('.methodevalidation').children('.store').find(':hidden').is(':disabled')) {
            rule += '|nullable';

        }
        if ($(this).parent().children('.nullable-check').children('.methodevalidation').children('.update').find(':hidden').is(':disabled')) {
            ruleupdate += '|nullable';
        }
    } else {
        nullable = $('body .nullable-check').find(':hidden').val();
        // console.log(nullable);
    }
    /************ concat rule  ************/
    var rules = new Array();
    rules.push(rule);
    rule = '';
    $(this).parent().parent().parent().parent().parent().parent().children('.validation-output').val(rules);
    $(this).parent().parent().parent().parent().parent().parent().children('.update-validation-output').val(ruleupdate);
    console.log($(this).parent().parent().parent().parent().parent().parent().children('.validation-output').val());
    // console.log(rules);
    // console.log(ruleupdate);
    // $(this).parent().css('display', 'none');
    $(this).parent().parent().find('.add-validation').prop('checked', false);

    $('.validation-modal').hide();

})

$(document).on('click', '.close', function() {
    $('.validation-modal').hide();

})



$(document).on("click", "body .add-validation-check", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});




$(document).on('change', '.min-check', function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).parent().children('.min').css('display', 'block');
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).parent().children('.min').css('display', 'none');
        $(this).find(':hidden').prop('disabled', false);
    }
});

$(document).on('change', '.max-check', function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).parent().children('.max').css('display', 'block');
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).parent().children('.max').css('display', 'none');
        $(this).find(':hidden').prop('disabled', false);

    }
});

$(document).on("click", "body .min-section .min .methodevalidation .store", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});
$(document).on("click", "body .min-section .min .methodevalidation .update", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});



$(document).on("click", "body .max-section .max .methodevalidation .store", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});
$(document).on("click", "body .max-section .max .methodevalidation .update", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});
/**********  hidden inputs for validation  */
$(document).on("click", "body .required .required-check", function() {
    if ($(this).children('label').find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});

$(document).on("click", "body .required .methodevalidation .store", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});
$(document).on("click", "body .required .methodevalidation .update", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});




$(document).on("click", "body .email-check .email-val", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});
$(document).on("click", "body .email-check .methodevalidation .store", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});
$(document).on("click", "body .email-check .methodevalidation .update", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});





$(document).on("click", "body .password-check .pass-val", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});
$(document).on("click", "body .password-check .methodevalidation .store", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});
$(document).on("click", "body .password-check .methodevalidation .update", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});





$(document).on("click", "body .unique-check .unique-val", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});
$(document).on("click", "body .unique-check .methodevalidation .store", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});
$(document).on("click", "body .unique-check .methodevalidation .update", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});





$(document).on("click", "body .nullable-check .nullable-val", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});
$(document).on("click", "body .nullable-check .methodevalidation .store", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});
$(document).on("click", "body .nullable-check .methodevalidation .update", function() {
    if ($(this).find(':checkbox').is(':checked')) {
        $(this).find(':hidden').prop('disabled', true);
    } else {
        $(this).find(':hidden').prop('disabled', false);
    }
});
/***** add validation to hidden input */
// $(document).on('click', 'body .save-validation', function() {
//     var required;
//     var min;
//     var max;
//     var email;
//     var password;
//     var unique;
//     var nullable;
//     var rule = '';
//     var ruleupdate = '';
//     var id = $(this).parent().parent().parent().attr("row_id");
//     // console.log($(this).parent().children('.required').find(':hidden'));
//     if ($(this).parent().children('.required').children('.required-check').find(':hidden').is(':disabled')) {
//         required = $(this).parent().children('.required').find(':checkbox').val();
//         console.log(required);
//         if ($(this).parent().children('.required').children('.methodevalidation').children('.store').find(':hidden').is(':disabled')) {
//             rule += 'required';

//         }
//         if ($(this).parent().children('.required').children('.methodevalidation').children('.update').find(':hidden').is(':disabled')) {
//             ruleupdate += 'required';
//             console.log(ruleupdate);
//         }
//     } else {
//         required = $(this).parent().children('.required').find(':hidden').val();
//         // console.log(required);
//     }
//     if ($(this).parent().children('.min-section').children('.min-check').find(':hidden').is(':disabled')) {
//         min = $(this).parent().children('.min-section').children('.min-check').find(':checkbox').val();
//         var min_value = $(this).parent().children('.min-section').children('.min').children('input').val();
//         if ($(this).parent().children('.min-section').children('.min').children('.methodevalidation').children('.store').find(':hidden').is(':disabled')) {
//             rule += '|min:' + min_value;
//         }
//         if ($(this).parent().children('.min-section').children('.min').children('.methodevalidation').children('.update').find(':hidden').is(':disabled')) {
//             ruleupdate += '|min:' + min_value;
//         }
//         console.log(min);
//     } else {
//         required = $(this).parent().children('.required').find(':hidden').val();
//         // console.log(required);
//     }

//     if ($(this).parent().children('.max-section').children('.max-check').find(':hidden').is(':disabled')) {
//         max = $(this).parent().children('.max-section').children('.max-check').find(':checkbox').val();
//         // console.log(max);
//         // var max_value = $(this).parent().children('.max input').val();

//         var max_value = $(this).parent().children('.max-section').children('.max').children('input').val();
//         if ($(this).parent().children('.max-section').children('.max').children('.methodevalidation').children('.store').find(':hidden').is(':disabled')) {
//             rule += '|max:' + max_value;
//         }
//         if ($(this).parent().children('.max-section').children('.max').children('.methodevalidation').children('.update').find(':hidden').is(':disabled')) {
//             ruleupdate += '|max:' + max_value;
//         }
//         console.log(max_value);
//         // rule += '|max:' + max_value;
//     } else {
//         max = $(this).parent().children('.max-section .max-check').find(':hidden').val();
//         // console.log(max);
//     }
//     if ($(this).parent().children('.email-check').children('.email-val').find(':hidden').is(':disabled')) {
//         email = $(this).parent().children('.email-check').find(':checkbox').val();
//         // console.log(email);
//         if ($(this).parent().children('.email-check').children('.methodevalidation').children('.store').find(':hidden').is(':disabled')) {
//             rule += '|email';

//         }
//         if ($(this).parent().children('.email-check').children('.methodevalidation').children('.update').find(':hidden').is(':disabled')) {
//             ruleupdate += '|email';
//         }

//         // rule += '|email';
//         // console.log('email');

//     } else {
//         email = $('body .email-check').find(':hidden').val();
//         // console.log(email);
//     }
//     if ($(this).parent().children('.password-check').children('.pass-val').find(':hidden').is(':disabled')) {
//         password = $(this).parent().children('.password-check').find(':checkbox').val();
//         if ($(this).parent().children('.password-check').children('.methodevalidation').children('.store').find(':hidden').is(':disabled')) {
//             rule += '|password';

//         }
//         if ($(this).parent().children('.password-check').children('.methodevalidation').children('.update').find(':hidden').is(':disabled')) {
//             ruleupdate += '|password';
//         }

//     } else {
//         password = $('body .password-check').find(':hidden').val();
//         // console.log(password);
//     }
//     if ($(this).parent().children('.unique-check ').children('.unique-val').find(':hidden').is(':disabled')) {
//         unique = $(this).parent().children('.unique-check').find(':checkbox').val();
//         if ($(this).parent().children('.unique-check').children('.methodevalidation').children('.store').find(':hidden').is(':disabled')) {
//             rule += '|unique';

//         }
//         if ($(this).parent().children('.unique-check').children('.methodevalidation').children('.update').find(':hidden').is(':disabled')) {
//             ruleupdate += '|unique';
//         }
//     } else {
//         unique = $('body .unique-check').find(':hidden').val();
//         // console.log(unique);
//     }
//     if ($(this).parent().children('.nullable-check').find(':hidden').is(':disabled')) {
//         nullable = $(this).parent().children('.nullable-check').children('.nullable-val').find(':checkbox').val();
//         if ($(this).parent().children('.nullable-check').children('.methodevalidation').children('.store').find(':hidden').is(':disabled')) {
//             rule += '|nullable';

//         }
//         if ($(this).parent().children('.nullable-check').children('.methodevalidation').children('.update').find(':hidden').is(':disabled')) {
//             ruleupdate += '|nullable';
//         }
//     } else {
//         nullable = $('body .nullable-check').find(':hidden').val();
//         // console.log(nullable);
//     }
//     /************ concat rule  ************/
//     var rules = new Array();
//     rules.push(rule);
//     rule = '';
//     $(this).parent().parent().children('.validation-output').val(rules);
//     $(this).parent().parent().children('.update-validation-output').val(ruleupdate);
//     console.log($(this).parent().parent().children('.validation-output').val());
//     console.log(rules);
//     $(this).parent().css('display', 'none');
//     $(this).parent().parent().find('.add-validation').prop('checked', false);
// });


// $(document).ready(function() {
//     $('body .fields_type').on('change', function() {
//         var field = $(this).val();
//         if (field != 'foreignId') {
//             var foreign_table = new Array();
//             if (this) {
//                 $.get(
//                     "ajax.php", {
//                         foreign: JSON.stringify(foreign_table)
//                     },
//                     function(data) {
//                         data = JSON.parse(data);
//                         for (var i = 0; i < data.length; i++) {
//                             foreign_table.push(data[i]);
//                         }
//                         console.log(foreign_table);
//                     }
//                 );
//             }
//         }
//     });
// });

$(document).on('change', 'body .fields_type', function() {
    var field = $(this).val();
    var id = $(this).parent().parent().parent().attr("row_id");
    if (id) {
        if (field == 'foreignId') {
            console.log($(this).parent().parent().parent().children('.foreign'));
            $(this).parent().parent().parent().children('.foreign').css('display', 'block');

        } else {
            $(this).parent().parent().parent().children('.foreign').css('display', 'none');

        }
    } else {
        if (field == 'foreignId') {
            $(this).parent().parent().parent().children('.foreign').css('display', 'block');

        } else {
            $(this).parent().parent().parent().children('.foreign').css('display', 'none');

        }
    }
});


$(document).on('click', 'body #checkall', function() {
    $('.method').not(this).prop('checked', this.checked);
});

$(document).on('click', 'body .method', function() {
    if ($('.method:checked').length == $('.method').length)
        $('#checkall').prop('checked', true);
    else
        $('#checkall').prop('checked', false);
});




$(document).on('click', '#checkall_route', function() {
    $('.route').not(this).prop('checked', this.checked);

});
$(document).on('click', '.route', function() {
    if ($('.route:checked').length == $('.route').length)
        $('#checkall_route').prop('checked', true);
    else
        $('#checkall_route').prop('checked', false);
})


$(document).on("click", "body .nullable", function() {

    if ($(this).is(':checked')) {
        $(this).parent().find(':hidden').prop('disabled', true);
    } else {
        $(this).parent().find(':hidden').prop('disabled', false);
    }
});

$(document).on("click", "body .inindex", function() {
    if ($(this).is(':checked')) {
        $(this).parent().find(':hidden').prop('disabled', true);
    } else {
        $(this).parent().find(':hidden').prop('disabled', false);
    }
});

$(document).on("click", "body .inform", function() {
    if ($(this).is(':checked')) {
        $(this).parent().find(':hidden').prop('disabled', true);
    } else {
        $(this).parent().find(':hidden').prop('disabled', false);
    }
});

/***************** add foreign key *************************/

$(document).on("click", "body .delete_cascade", function() {
    if ($(this).is(':checked')) {
        $(this).parent().find(':hidden').prop('disabled', true);
    } else {
        $(this).parent().find(':hidden').prop('disabled', false);
    }
});
$(document).on("click", "body .update_cascade", function() {
    if ($(this).is(':checked')) {
        $(this).parent().find(':hidden').prop('disabled', true);
    } else {
        $(this).parent().find(':hidden').prop('disabled', false);
    }
});