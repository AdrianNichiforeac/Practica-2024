/**
 * Open Delete confirm modal and set action attribute
 * @param action
 * @constructor
 */
function DeleteConfirm(action){
    $('form#delete_form').attr('action', action);
    $('#deleteModal').modal('show');
}

function DeleteConfirmAJAX(method){
    $('#modal-delete-btn').attr('type', 'button');
    $('#modal-delete-btn').attr('onclick', method);
    $('#deleteModal').modal('show');
}

