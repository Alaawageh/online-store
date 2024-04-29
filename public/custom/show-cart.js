
$(document).on('click', '.show-cart', function () {
    $('#myModal').modal('toggle');
    $.ajax({
        url: window.base_url + '/cart',
        method: 'GET',
        success: function(response) {
            $('#myModal').html(response).show();
        },
        error: function(error) {
            console.error('Error fetching cart:', error);
        }
    });
});