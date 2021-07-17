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
                                <a href="javascript:void(0);" class="show-submenu">Tienda</a>
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
                                <a href="cart.html" class="cart_bt"><strong>2</strong></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li>
                                            <a href="product-detail-1.html">
                                                <figure><img src="{{asset("front/img/products/product_placeholder_square_small.jpg")}}" data-src="{{asset("front/img/products/shoes/thumb/1.jpg")}}" alt="" width="50" height="50" class="lazy"></figure>
                                                <strong><span>1x Armor Air x Fear</span>$90.00</strong>
                                            </a>
                                            <a href="#0" class="action"><i class="ti-trash"></i></a>
                                        </li>
                                        <li>
                                            <a href="product-detail-1.html">
                                                <figure><img src="{{asset("front/img/products/product_placeholder_square_small.jpg")}}" data-src="{{asset("front/img/products/shoes/thumb/2.jpg")}}" alt="" width="50" height="50" class="lazy"></figure>
                                                <strong><span>1x Armor Okwahn II</span>$110.00</strong>
                                            </a>
                                            <a href="0" class="action"><i class="ti-trash"></i></a>
                                        </li>
                                    </ul>
                                    <div class="total_drop">
                                        <div class="clearfix"><strong>Total</strong><span>$200.00</span></div>
                                        <a href="cart.html" class="btn_1 outline">View Cart</a><a href="checkout.html" class="btn_1">Checkout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /dropdown-cart-->
                        </li>
                        <li>
                            <a href="#0" class="wishlist"><span>Wishlist</span></a>
                        </li>
                        <li>
                            <div class="dropdown dropdown-access">
                                <a href="account.html" class="access_link"><span>Account</span></a>
                                <div class="dropdown-menu">
                                    <a href="account.html" class="btn_1">Sign In or Sign Up</a>
                                    <ul>
                                        <li>
                                            <a href="track-order.html"><i class="ti-truck"></i>Track your Order</a>
                                        </li>
                                        <li>
                                            <a href="account.html"><i class="ti-package"></i>My Orders</a>
                                        </li>
                                        <li>
                                            <a href="account.html"><i class="ti-user"></i>My Profile</a>
                                        </li>
                                        <li>
                                            <a href="help.html"><i class="ti-help-alt"></i>Help and Faq</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /dropdown-access-->
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
                        </li>
                        <li>
                            <a href="#menu" class="btn_cat_mob">
                                <div class="hamburger hamburger--spin" id="hamburger">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                                Categories
                            </a>
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