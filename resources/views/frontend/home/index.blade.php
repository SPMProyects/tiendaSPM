@extends('frontend.layout.layout')

@section('styles')
    <!-- SPECIFIC CSS -->
    <link href="{{asset("front/css/home_1.css")}}" rel="stylesheet">
@endsection

@section('content')
<div id="carousel-home">
    <div class="owl-carousel owl-theme">
        <div class="owl-slide cover" style="background-image: url({{asset("/storage/" . json_decode($configurations->home)->image_1)}});">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-end">
                        <div class="col-lg-6 static">
                            <div class="slide-text text-right white">
                                <h2 class="owl-slide-animated owl-slide-title">{{json_decode($configurations->home)->title_1}}</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    {{json_decode($configurations->home)->text_1}}
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{json_decode($configurations->home)->link_1}}" role="button">{{json_decode($configurations->home)->button_1}}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/owl-slide-->
        <div class="owl-slide cover" style="background-image: url({{asset("/storage/" . json_decode($configurations->home)->image_2)}});">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-6 static">
                            <div class="slide-text white">
                                <h2 class="owl-slide-animated owl-slide-title">{{json_decode($configurations->home)->title_2}}</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    {{json_decode($configurations->home)->text_2}}
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{json_decode($configurations->home)->link_2}}" role="button">{{json_decode($configurations->home)->button_2}}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/owl-slide-->
        <div class="owl-slide cover" style="background-image: url({{asset("/storage/" . json_decode($configurations->home)->image_3)}});">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-12 static">
                            <div class="slide-text text-center white">
                                <h2 class="owl-slide-animated owl-slide-title">{{json_decode($configurations->home)->title_3}}</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    {{json_decode($configurations->home)->text_3}}
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{json_decode($configurations->home)->link_3}}" role="button">{{json_decode($configurations->home)->button_3}}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
        </div>
    </div>
    <div id="icon_drag_mobile"></div>
</div>
<!--/carousel-->

<ul id="banners_grid" class="clearfix">
    <li>
        <a href="{{json_decode($configurations->home)->icon_link_1}}" class="img_container">
            <img src="{{asset("/storage/" . json_decode($configurations->home)->icon_image_1)}}" data-src="{{asset("/storage/" . json_decode($configurations->home)->icon_image_1)}}" alt="" class="lazy">
            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <h3>{{json_decode($configurations->home)->icon_title_1}}</h3>
            </div>
        </a>
    </li>
    <li>
        <a href="{{json_decode($configurations->home)->icon_link_2}}" class="img_container">
            <img src="{{asset("/storage/" . json_decode($configurations->home)->icon_image_2)}}" data-src="{{asset("/storage/" . json_decode($configurations->home)->icon_image_2)}}" alt="" class="lazy">
            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <h3>{{json_decode($configurations->home)->icon_title_2}}</h3>
            </div>
        </a>
    </li>
    <li>
        <a href="{{json_decode($configurations->home)->icon_link_3}}" class="img_container">
            <img src="{{asset("/storage/" . json_decode($configurations->home)->icon_image_3)}}" data-src="{{asset("/storage/" . json_decode($configurations->home)->icon_image_3)}}" alt="" class="lazy">
            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <h3>{{json_decode($configurations->home)->icon_title_3}}</h3>
            </div>
        </a>
    </li>
</ul>
<!--/banners_grid -->

<div class="container margin_60_35">
    <div class="main_title">
        <h2>Productos destacados</h2>
        <span>DESTACADOS</span>
        <p>Mira un poco acerca de los productos destacados de nuestra tienda</p>
    </div>
    <div class="row small-gutters">

        @forelse (getRandomFeatured(8) as $product)
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <span class="ribbon hot">Destacado</span>
                @if ($product->sales_price)
                    <span class="ribbon off">{{salesFormat($product->sales_price)}}</span>
                @endif
                <figure>
                    <a href="product-detail-1.html">

                        @if ($product->images()->first()->path)
                        <img class="img-fluid lazy" src="/storage/{{$product->images()->first()->path}}" data-src="/storage/{{$product->images()->first()->path}}" alt="">
                        <img class="img-fluid lazy" src="/storage/{{$product->images()->first()->path}}" data-src="/storage/{{$product->images()->first()->path}}" alt="">
                        @endif

                    </a>
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i></div>
                <a href="product-detail-1.html">
                    <h3>{{$product->name}}</h3>
                </a>
                <div class="price_box">
                    <span class="new_price">{{currencyFormat($product->price,$product->sales_price)}}</span>
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->
        @empty
            
        @endforelse
        
    </div>
    <!-- /row -->
</div>
<!-- /container -->

<div class="featured lazy" data-bg="url({{asset("/storage/" . json_decode($configurations->home)->banner_image)}})">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
        <div class="container margin_60">
            <div class="row justify-content-center justify-content-center">
                <div class="col-lg-6 wow text-center" data-wow-offset="150">
                    <p>{{json_decode($configurations->home)->banner_text}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /featured -->

<div class="container margin_60_35">
    <div class="main_title">
        <h2>Productos en oferta</h2>
        <span>OFERTAS</span>
        <p>Aprovecha todas las ofertas disponibles para vos!</p>
    </div>

    {{-- Falta recorrer todos los productos en oferta y traer alguna cantidad de ellos para mostrar.
        Igual que como se realizó para destacados. Ver si crear helper para calcular el precio o no --}}
    <div class="row small-gutters">

        @forelse (getRandomSales(8) as $product)
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <span class="ribbon off">{{salesFormat($product->sales_price)}}</span>
                <figure>
                    <a href="product-detail-1.html">

                        @if ($product->images()->first()->path)
                        <img class="img-fluid lazy" src="/storage/{{$product->images()->first()->path}}" data-src="/storage/{{$product->images()->first()->path}}" alt="">
                        <img class="img-fluid lazy" src="/storage/{{$product->images()->first()->path}}" data-src="/storage/{{$product->images()->first()->path}}" alt="">
                        @endif

                    </a>
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i></div>
                <a href="product-detail-1.html">
                    <h3>{{$product->name}}</h3>
                </a>
                <div class="price_box">
                    <span class="new_price">{{currencyFormat($product->price,$product->sales_price)}}</span>
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->
        @empty
            
        @endforelse
    </div>
</div>
<!-- /container -->

<div class="bg_gray">
    <div class="container margin_30">
        <div id="brands" class="owl-carousel owl-theme">
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_1.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_2.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_3.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_4.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_5.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_6.png" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
        </div><!-- /carousel -->
    </div><!-- /container -->
</div>
<!-- /bg_gray -->

<div class="container margin_60_35">
    <div class="main_title mb-5 pt-3">
        <h2>Fortalezas de nuestra empresa</h2>
        <span>Fortalezas</span>
        <p>En nuestra empesa vas a encontrar los siguientes diferenciales</p>
    </div>
    <div class="row pt-5">
        <div class="col-lg-3">
            <a class="" href="blog.html">
                <div class="card text-center d-flex align-items-center" style="width: 18rem; border:none;">
                    <img src="{{asset('front/img/icons/ahorro.png')}}" class="card-img-top w-50" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Excelentes precios</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3">
            <a class="" href="blog.html">
                <div class="card text-center d-flex align-items-center" style="width: 18rem; border:none;">
                    <img src="{{asset('front/img/icons/servicio_tecnico.png')}}" class="card-img-top w-50" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Asesoramiento especializado</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3">
            <a class="" href="blog.html">
                <div class="card text-center d-flex align-items-center" style="width: 18rem; border:none;">
                    <img src="{{asset('front/img/icons/calidad.png')}}" class="card-img-top w-50" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Calidad superior</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3">
            <a class="" href="blog.html">
                <div class="card text-center d-flex align-items-center" style="width: 18rem; border:none;">
                    <img src="{{asset('front/img/icons/stock.png')}}" class="card-img-top w-50" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Amplio stock disponible</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->
@endsection