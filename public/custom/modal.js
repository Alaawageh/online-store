
$(document).on('click', '.modal2', function () {
    $('#myModal').modal('toggle');
    var related_action = $(this).data('action');
    $.ajax({url: related_action, success: function(data){
            $('#myModal').html(data);
        }});
});

$(document).on('click', '.modal1', function () {
    $('#myModal').modal('toggle');
    var related_action = $(this).data('action');
    $.ajax({url: related_action, success: function(data){
            $('#myModal').html(data);
        }});
});
