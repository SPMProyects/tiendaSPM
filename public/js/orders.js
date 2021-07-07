/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/back/orders.js":
/*!*************************************!*\
  !*** ./resources/js/back/orders.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  $('#order_list').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print"]
  }).buttons().container().appendTo('#user_list_wrapper .col-md-6:eq(0)');
  var order_product = $('#order_product').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print"]
  });
  var product_search = $('#product_search').DataTable({
    select: {
      style: 'multi'
    }
  }); //Añade un producto

  var products = [];
  product_search.on('select', function (e, dt, type, indexes) {
    var rowData = product_search.rows(indexes).data().toArray();
    products.unshift(rowData[0][0]);
  }).on('deselect', function (e, dt, type, indexes) {
    var rowData = product_search.rows(indexes).data().toArray();
    var index = products.indexOf(rowData[0][0]);
    products.splice(index, 1);
  });
  $('#btn-agregar').on('click', function () {
    //Enviar por ajax hacia un método del controlador que agregue los productos (Mediante su ID enviado por el array products) a una session que rellene la datatable de productos agregados
    var id_products = JSON.stringify(products);

    var _token = $('input[name=_token]').val();

    $.post("/backend/order/products-add", {
      id_products: id_products,
      _token: _token
    }, function (data, status) {
      sessionStorage.setItem('reloading', JSON.stringify(products));
      location.reload();
    });
  }); //Cuando se añade un producto que también se asigne en 1 su cantidad

  window.onload = oneProduct();

  function oneProduct() {
    var products = JSON.parse(sessionStorage.getItem('reloading'));

    if (products) {
      $.each(products, function (index, value) {
        $('.button_inc.inc[product-id=' + value + ']').siblings('#quantity').val('1');
      });
      sessionStorage.removeItem('reloading');
    }
  } //Eliminar un producto


  $('.btn-eliminar').on('click', function () {
    var id_products = $(this).attr('product-id');

    var _token = $('input[name=_token]').val();

    $.post("/backend/order/products-remove", {
      id_products: id_products,
      _token: _token
    }, function (data, status) {
      location.reload();
    });
  }); //Aumentar-disminuir cantidad de productos

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

    actualizarCantidad(id_product, newVal); //Calcula el subtotal del producto

    var price = $button.parent('div').parent('td').siblings('td').find('.price').text();
    var total = price * newVal;
    $button.parent('div').parent('td').siblings('td').find('.subtotal').text(total);
    $button.parent().find("input").val(newVal);
    $('#total_order').text(calcularTotal());
  }); //Actualiza las cantidades si se pone de forma manual en la input

  $('input[name=quantity]').on('keyup', function () {
    var input = $(this);
    var newVal = $(this).val();
    var id_product = $(this).siblings('div').attr('product-id');
    actualizarCantidad(id_product, newVal);
    var price = input.parent('div').parent('td').siblings('td').find('.price').text();
    var total = price * newVal;
    input.parent('div').parent('td').siblings('td').find('.subtotal').text(total);
    input.parent().find("input").val(newVal);
    $('#total_order').text(calcularTotal());
  }); //Calcular todos los subtotales y totales

  calcularTodosSubtotal();
  $('#total_order').text(calcularTotal());

  function calcularTodosSubtotal() {
    $(".button_inc").each(function () {
      var button = $(this);
      calcularSubtotal(button);
    });
  }

  function calcularSubtotal($button) {
    var price = $button.parent('div').parent('td').siblings('td').find('.price').text();
    var quantity = $button.parent().find("input").val();
    var total = price * quantity;
    $button.parent('div').parent('td').siblings('td').find('.subtotal').text(total);
  } //Calcular total orden de forma automática


  function calcularTotal() {
    var totalOrder = 0;
    $('.subtotal').each(function () {
      var subtotal = $(this);
      totalOrder += parseFloat(subtotal.text());
    });
    return totalOrder;
  } //Actualiza la cantidad del producto en la session


  function actualizarCantidad(id, quantity) {
    var _token = $('input[name=_token]').val(); //Enviar por Ajax hacia OrderController quantityChange la cantidad y el ID por Ajax para añadirlo a la session


    $.post("/backend/order/quantity-change", {
      id_products: id,
      quantity_products: quantity,
      _token: _token
    }, function (data, status) {});
  } //Borra todos los productos y cantidades de las session


  $('#vaciar_orden').on('click', function (e) {
    e.preventDefault();

    var _token = $('input[name=_token]').val();

    $.post("/backend/order/delete-all-products", {
      _token: _token
    }, function (data, status) {
      location.reload();
    });
  });
});

/***/ }),

/***/ 6:
/*!*******************************************!*\
  !*** multi ./resources/js/back/orders.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\xamp\htdocs\tiendaSPM\resources\js\back\orders.js */"./resources/js/back/orders.js");


/***/ })

/******/ });