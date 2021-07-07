$(function () {
    $('#order_list').DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#user_list_wrapper .col-md-6:eq(0)');

    var order_product = $('#order_product').DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
      })

    var product_search = $('#product_search').DataTable({
        select: {
            style: 'multi'
        }
      })
      
    //Añade un producto

    var products = [];
    product_search
        .on('select',function(e, dt, type, indexes){
            var rowData = product_search.rows(indexes).data().toArray();
            products.unshift(rowData[0][0]);
        })
        .on('deselect', function ( e, dt, type, indexes){
            var rowData = product_search.rows(indexes).data().toArray();
            var index = products.indexOf(rowData[0][0]);
            products.splice(index,1);
        });

    $('#btn-agregar').on('click',function(){
        //Enviar por ajax hacia un método del controlador que agregue los productos (Mediante su ID enviado por el array products) a una session que rellene la datatable de productos agregados
        var id_products = JSON.stringify(products);
        var _token = $('input[name=_token]').val();

        $.post(
            "/backend/order/products-add",
            {
                id_products: id_products,
                _token : _token,
            },
            function(data, status){
                sessionStorage.setItem('reloading', JSON.stringify(products));
                location.reload();
            }
        );
    });

    //Cuando se añade un producto que también se asigne en 1 su cantidad
    window.onload = oneProduct();
    function oneProduct(){
        var products = JSON.parse(sessionStorage.getItem('reloading'));
        if(products){
            $.each(products, function(index, value){
                $('.button_inc.inc[product-id='+value+']').siblings('#quantity').val('1');
            });
            sessionStorage.removeItem('reloading');
        }

    }

    //Eliminar un producto
    $('.btn-eliminar').on('click',function(){
        var id_products = $(this).attr('product-id');
        var _token = $('input[name=_token]').val();
        $.post(
            "/backend/order/products-remove",
            {
                id_products: id_products,
                _token : _token,
            },
            function(data, status){
                location.reload();
            }
        );

    });
    
    //Aumentar-disminuir cantidad de productos
	$(".button_inc").on("click", function () {
		var $button = $(this);
        var id_product = $button.attr('product-id');
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

        actualizarCantidad(id_product, newVal);

        //Calcula el subtotal del producto
        var price = $button.parent('div').parent('td').siblings('td').find('.price').text();
        var total = price * newVal;
        $button.parent('div').parent('td').siblings('td').find('.subtotal').text(total);

		$button.parent().find("input").val(newVal);

        $('#total_order').text(calcularTotal());

	});

    //Actualiza las cantidades si se pone de forma manual en la input
    $('input[name=quantity]').on('keyup',function(){
        var input = $(this);
        var newVal = $(this).val();
        var id_product = $(this).siblings('div').attr('product-id');
        actualizarCantidad(id_product, newVal);

        var price = input.parent('div').parent('td').siblings('td').find('.price').text();
        var total = price * newVal;
        input.parent('div').parent('td').siblings('td').find('.subtotal').text(total);

		input.parent().find("input").val(newVal);

        $('#total_order').text(calcularTotal());

    });

    //Calcular todos los subtotales y totales
    calcularTodosSubtotal();
    $('#total_order').text(calcularTotal());

    function calcularTodosSubtotal(){
        $(".button_inc").each(function(){
            var button = $(this);
            calcularSubtotal(button);
        });
    }
    
    function calcularSubtotal($button){
        var price = $button.parent('div').parent('td').siblings('td').find('.price').text();
        var quantity = $button.parent().find("input").val();
        var total = price * quantity;
        $button.parent('div').parent('td').siblings('td').find('.subtotal').text(total);
    }

    //Calcular total orden de forma automática
    function calcularTotal(){
        var totalOrder = 0;
        $('.subtotal').each(function(){
            var subtotal = $(this);
            totalOrder += parseFloat(subtotal.text());
        });
        return totalOrder;
    }

    //Actualiza la cantidad del producto en la session
    function actualizarCantidad(id, quantity){
        var _token = $('input[name=_token]').val();
        //Enviar por Ajax hacia OrderController quantityChange la cantidad y el ID por Ajax para añadirlo a la session
        $.post(
            "/backend/order/quantity-change",
            {
                id_products: id,
                quantity_products: quantity,
                _token : _token,
            },
            function(data, status){
               
            }
        );
    }

    //Borra todos los productos y cantidades de las session
    $('#vaciar_orden').on('click', function(e){
        e.preventDefault();
        var _token = $('input[name=_token]').val();
        $.post(
            "/backend/order/delete-all-products",
            {
                _token : _token,
            },
            function(data, status){
                location.reload();
            }
        );
    });


  });