@extends('frontend.layout.layout')

@section('styles')
    <!-- SPECIFIC CSS -->
    <link href="{{asset("front/css/cart.css")}}" rel="stylesheet">
@endsection

@section('content')
	
<div class="container margin_30">
<div class="page_header">
    <div class="breadcrumbs">
        <ul>
            <li><a href="#">Inicio</a></li>
            <li>Carrito</li>
        </ul>
    </div>
    <h1>Carrito</h1>
</div>
<!-- /page_header -->
<table class="table table-striped cart-list">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (\Cart::session($userId)->getContent()->sortKeys() as $cartItem)
                        @csrf
                            <tr>
                                <td>
                                    <div class="thumb_cart">
                                        <img src="/storage/{{$cartItem->associatedModel->images()->first()->path}}" data-src="/storage/{{$cartItem->associatedModel->images()->first()->path}}" class="lazy" alt="Image">
                                    </div>
                                    <span class="item_cart">{{$cartItem->name}}</span>
                                </td>
                                <td>
                                    <strong>{{currencyFormat($cartItem->price)}}</strong>
                                </td>
                                <td>
                                    <div class="numbers-row">
                                        <input type="text" value="{{$cartItem->quantity}}" id="quantity_1" class="qty2" name="quantity" product-id="{{$cartItem->id}}">
                                        <div class="inc button_inc">+</div><div class="dec button_inc">-</div>
                                    </div>
                                </td>
                                <td>
                                    <strong class="subtotal">{{currencyFormat($cartItem->getPriceSum())}}</strong>
                                </td>
                                <td class="options">
                                    <a href="#" class="btn-eliminar" product-id="{{$cartItem->id}}"><i class="ti-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    No hay productos en el carrito
                                </td>
                            </tr>
                        @endforelse
                       
                    </tbody>
                </table>

                <div class="row add_top_30 flex-sm-row-reverse cart_actions">
                <div class="col-sm-4 text-right">
                </div>
                    <div class="col-sm-8">
                    <div class="apply-coupon">
                        <div class="form-group form-inline">
                            <input type="text" name="coupon-code" value="" placeholder="Codigo de cupon" class="form-control"><button type="button" class="btn_1 outline">Aplicar cupon</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /cart_actions -->

</div>
<!-- /container -->

<div class="box_cart">
    <div class="container">
    <div class="row justify-content-end">
        <div class="col-xl-4 col-lg-4 col-md-6">
    <ul>
        <li>
            <span>Subtotal</span> <p id="subtotal">{{currencyFormat(\Cart::session($userId)->getSubTotal() ?? '')}}</p>
        </li>
        <li>
            <span>Total</span> <p id="total">{{currencyFormat(\Cart::session($userId)->getTotal() ?? '')}}</p>
        </li>
    </ul>
    <a href="cart-2.html" class="btn_1 full-width cart">Confirmar pedido</a>
            </div>
        </div>
    </div>
</div>
<!-- /box_cart -->

@endsection

@section('scripts')
    <script src="{{asset('js/cart.js')}}"></script>
@endsection