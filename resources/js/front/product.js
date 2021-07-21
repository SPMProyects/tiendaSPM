$(function () {
    
    $('#btn-agregar').on('click',function(e){
        //Enviar por ajax hacia un método del controlador que agregue los productos (Mediante su ID enviado por el array products) a una session que rellene la datatable de productos agregados
        e.preventDefault();
        var id_product = $(this).attr('product-id');
        var quantity_product = $('#quantity_1').val();
        var _token = $('input[name=_token]').val();

        
        $.get(
            "/cart/" + id_product,
            {
                quantity: quantity_product,
                _token : _token,
            },
            function(data, status){
                location.reload();
            }
        );
        
    });

  });