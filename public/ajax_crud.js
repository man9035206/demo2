$("#add").click(function() {

    var age = $('#age').val();
    alert(age);
    $.ajax({
        type: 'post',
        url: '/addItem',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': $('input[name=name]').val(),
            'age': age
        },
        success: function(data) {
            $('#table').append("<tr class='item"+data.id+"'><td>"+data.id+"</td><td>"+data.name+"</td><td>"+data.age+"</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
        },
    });
    $('#name').val('');
    $('#age').val('');
});


$(document).on('click', '.edit-modal', function() {
    $('#footer_action_button').text(" Update");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#n').val($(this).data('name'));
    $('#myModal').modal('show');
});