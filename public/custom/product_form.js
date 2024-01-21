

$(document).on('click', '#add_product_details', function () {
    var id = $('.specs').last().data('id');
    if(typeof id === "undefined"){
        id = 1;
    } else {
        id = parseInt(id)+1;
    }

    $.ajax({url: window.base_url+'/add_specs?id='+id, success: function(data){
            $('.product_specs').append(data);
        }});
});

$(document).on('click', '.delete_spces', function () {
    var id = $(this).data('id');
    $('#specs_'+id).remove();
});
