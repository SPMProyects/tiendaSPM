//Formato moneda
const formatter = new Intl. NumberFormat(
    'en-US',
    {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 2,
    }
)

//Actualizar cantidad
 $(".button_inc").on("click", function () {
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    if ($button.text() == "+") {
        var newVal = parseFloat(oldValue) + 1;
    } else {
        // Don't allow decrementing below zero
        if (oldValue > 1) {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 0;
        }
    }
    var id = $button.siblings('input').attr("product-id");
    var quantity = $button.siblings('input').val();
    var _token = $('input[name=_token]').val();
        
    $.post(
        "/cart/updateQuantity",
        {
            id_product: id,
            quantity_product: quantity,
            _token : _token,
        },
        function(data, status){
            //Poner los valores devueltos (Quantity, Subtotal Product, Subtotal y Total) en donde corresponda
            $button.parent('div').parent('td').siblings('td').find('.subtotal').text(formatter.format(JSON.parse(data).subtotal_product));
            $('#subtotal').text(formatter.format(JSON.parse(data).subtotal_cart));
            $('#total').text(formatter.format(JSON.parse(data).total_cart));
            $('#cart_quantity').text(JSON.parse(data).cart_quantity);
        }
    );
});

//Eliminar un producto del carrito
$('.btn-eliminar').on('click',function(e){
    e.preventDefault();
    var id_product = $(this).attr('product-id');
    var _token = $('input[name=_token]').val();
    $.get(
        "/cart/remove/" + id_product,
        {
            _token : _token,
        },
        function(data, status){
            location.reload();
        }
    );
});