


$(document).on('click', '.add_to_cart', function () {
    var id = $(this).data('id');
    $('#myModal').modal('toggle');
    // $(this).attr('disable', true);
    $.ajax({url: window.base_url +'/cart/add/'+id, success: function(data){
            $('#myModal').html(data);
        }});
});

$(document).on('click', '.cart_product_minus', function () {
    var id = $(this).data('id');
    var cart_id = $(this).data('cart_id');
    var old_qty = $('.'+id).find('.item_qty').html();
    var new_qty = parseInt(old_qty)-1;
    $('.'+id).find('.item_qty').html(new_qty);

    $.ajax({url: window.base_url+'/cart/descrease_cart_item/'+cart_id, success: function(data){

        }});
});

$(document).on('click', '.cart_product_plus', function () {
    var id = $(this).data('id');
    var cart_id = $(this).data('cart_id');
    var old_qty = $('.'+id).find('.item_qty').html();
    var new_qty = parseInt(old_qty)+1;
    $('.'+id).find('.item_qty').html(new_qty);

    $.ajax({url: window.base_url+'/cart/increase_cart_item/'+cart_id, success: function(data){

        }});
});

$(document).on('click', '.cart_product_remove', function () {
    var id = $(this).data('id');
    var cart_id = $(this).data('cart_id');
    $('.'+id).remove();
    $.ajax({url: window.base_url+'/cart/remove_cart_item/'+cart_id, success: function(data){

        }});
});
