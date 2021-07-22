<header class="version_1">
    <div class="layer"></div><!-- Mobile menu overlay mask -->
    <div class="main_header">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                    <div id="logo">
                        <a href="index.html"><img src="{{asset("/storage/" . json_decode($configurations->general)->icon)}}" alt="" width="100" height="35"></a>
                    </div>
                </div>
                <nav class="col-xl-9 col-lg-7 text-center">
                    <a class="open_close" href="javascript:void(0);">
                        <div class="hamburger hamburger--spin">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                    <!-- Mobile menu button -->
                    <div class="main-menu">
                        <div id="header_menu">
                            
                            {{-- Falta que tome el icono de forma automática desde la tabla de config --}}

                            <a href="index.html"><img src="{{asset("front/img/logo_black.svg")}}" alt="" width="100" height="35"></a>
                            <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a href="{{route('home')}}">Inicio</a>
                            </li>
                            <li class="submenu">
                                <a href="{{route('store')}}" class="show-submenu">Tienda</a>
                                <ul>
                                    @forelse ($categories as $category)
                                        <li><a href="#" class="{{isset($category->categories) ? 'submenu' : ''}}">{{$category->name}}</a>
                                            @if ($category->categories->count())
                                                <ul>
                                                @foreach ($category->categories as $childCategory)
                                                    <li><a href="#">{{$childCategory->name}}</a></li>
                                                @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @empty
                                        
                                    @endforelse

                                </ul>
                            </li>
                            <li>
                                <a href="{{route('contact')}}" class="show-submenu">Contacto</a>
                            </li>
                            <li>
                                <a href="{{route('company')}}">Empresa</a>
                            </li>
                        </ul>
                    </div>
                    <!--/main-menu -->
                </nav>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /main_header -->

    <div class="main_nav Sticky">
        <div class="container">
            <div class="row small-gutters">

                <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                    <div class="custom-search-input">
                        <input type="text" placeholder="Search over 10.000 products">
                        <button type="submit"><i class="header-icon_search_custom"></i></button>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-2 col-md-3">
                    <ul class="top_tools">
                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="cart.html" class="cart_bt"><strong id="cart_quantity">{{Auth::check() ? Cart::session(auth()->user()->id)->getTotalQuantity() : 0}}</strong></a>
                                <div class="dropdown-menu">
                                    @if (Auth::check())
                                        <ul>
                                                @forelse (\Cart::session(auth()->user()->id)->getContent() as $product)
                                                <li>
                                                    <a href="product-detail-1.html">
                                                        <figure><img src="/storage/{{$product->associatedModel->images()->first()->path}}" data-src="/storage/{{$product->associatedModel->images()->first()->path}}" alt="" width="50" height="50" class="lazy"></figure>
                                                        <strong><span>{{$product->name}}</span>{{currencyFormat($product->price,$product->sales_price)}} x {{$product->quantity}}</strong>
                                                    </a>
                                                    <a href="{{route('cart.remove',['product' => $product->id])}}" class="action"><i class="ti-trash"></i></a>
                                                </li>
                                                @empty
                                                    <li>Carrito vacio</li>
                                                @endforelse
                                        </ul>
                                        <div class="total_drop">
                                            <div class="clearfix"><strong>Total</strong><span>{{Auth::check() ? currencyFormat(\Cart::session(auth()->user()->id)->getTotal()) : 0}}</span></div>
                                            <a href="{{route('cart.index')}}" class="btn_1 outline">Ver carrito</a><a href="checkout.html" class="btn_1">Confirmar pedido</a>
                                        </div>
                                    @else
                                        <ul>
                                            <li>Debes estar reigstrado para comprar</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            <!-- /dropdown-cart-->
                        </li>
                        <li>
                            <div class="dropdown dropdown-cart">
                            <a href="#0" class="wishlist dropdown"><span>Lista de deseos</span></a>
                                <div class="dropdown-menu">
                                    @if (Auth::check())

                                    @else
                                        <ul>
                                            <li>Debes estar registrado para agregar productos a tu lista de favoritos</li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown dropdown-access">
                                <a href="#" class="access_link"><span>Cuenta de usuario</span></a>
                                <div class="dropdown-menu">
                                    @if (Auth::check())
                                        <ul>
                                            <li>
                                                <a href="{{route('user.orders')}}"><i class="ti-package"></i>Mis pedidos</a>
                                            </li>
                                            <li>
                                                <a href="{{route('user.information')}}"><i class="ti-user"></i>Mis Datos</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                        <i class="ti-lock"></i>Cerrar sesion
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    @else
                                        <a href="account.html" class="btn_1">Ingresar</a>
                                    @endif
                                </div>
                            </div>
                            <!-- /dropdown-access-->
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <div class="search_mob_wp">
            <input type="text" class="form-control" placeholder="Search over 10.000 products">
            <input type="submit" class="btn_1 full-width" value="Search">
        </div>
        <!-- /search_mobile -->
    </div>
    <!-- /main_nav -->
</header>
<!-- /header -->