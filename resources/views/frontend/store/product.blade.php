@extends('frontend.layout.layout')

@section('styles')
    <!-- SPECIFIC CSS -->
    <link href="{{asset("front/css/product_page.css")}}" rel="stylesheet">
@endsection

@section('content')

    <div class="container margin_30">
        @if ($product->sales_price)
            <div class="countdown_inner">{{salesFormat($product->sales_price)}} PRODUCTO EN OFERTA - APROVECHA</div>
        @endif
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="all">
                    <div class="slider">
                        <div class="owl-carousel owl-theme main">
                            @forelse ($product->images as $image)
                                <div style="background-image: url(/storage/{{$image->path}});" class="item-box"></div>
                            @empty
                                
                            @endforelse
                        </div>
                        <div class="left nonl"><i class="ti-angle-left"></i></div>
                        <div class="right"><i class="ti-angle-right"></i></div>
                    </div>
                    <div class="slider-two">
                        <div class="owl-carousel owl-theme thumbs">
                            @forelse ($product->images as $image)
                                <div style="background-image: url(/storage/{{$image->path}});" class="item active"></div>
                            @empty
                                
                            @endforelse
                        </div>
                        <div class="left-t nonl-t"></div>
                        <div class="right-t"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Category</a></li>
                        <li>Page active</li>
                    </ul>
                </div>
                <!-- /page_header -->
                <div class="prod_info">
                    <h1>{{$product->name}}</h1>
                    <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i></span>
                    <p><small>SKU: {{$product->id}}</small><br>{{Str::limit($product->description, 100)}}</p>
                    <div class="prod_options">
                        <div class="row">
                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Cantidad</strong></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                <div class="numbers-row">
                                    <input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="price_main"><span class="new_price">{{currencyFormat($product->price,$product->sales_price ?? 0)}}</span>
                                @if ($product->sales_price > 0)
                                    <span class="percentage">{{salesFormat($product->sales_price)}}</span>
                                    <span class="old_price">{{currencyFormat($product->price)}}</span></div>
                                @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="btn_add_to_cart"><a href="#0" class="btn_1">Agregar al carrito</a></div>
                        </div>
                    </div>
                </div>
                <!-- /prod_info -->
                <div class="product_actions">
                    <ul>
                        <li>
                            <a href="#"><i class="ti-heart"></i><span>Añadir a la lista de deseos</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /product_actions -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    
    <div class="tabs_product">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Descripcion</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /tabs_product -->
    <div class="tab_content_wrapper">
        <div class="container">
            <div class="tab-content" role="tablist">
                <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                    <div class="card-header" role="tab" id="heading-A">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
                                Descripcion
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    <h3>Detalles</h3>
                                    <p>{{$product->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /TAB A -->
            </div>
            <!-- /tab-content -->
        </div>
        <!-- /container -->
    </div>
    <!-- /tab_content_wrapper -->

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Productos Relacionados</h2>
            <span>Productos relacionados</span>
            <p>Aprovecha los productos relacionados y las ofertas</p>
        </div>
        <div class="owl-carousel owl-theme products_carousel">
            {{-- Falta acceder a todos los productos de la categoria --}}
            @forelse (getRandomProducts($product->category->products,6) as $rel_product)
            <div class="item">
                <div class="grid_item">
                    @if ($rel_product->featured)
                        <span class="ribbon hot">Destacado</span>
                    @endif
                    
                    @if ($rel_product->sales_price)
                        <span class="ribbon off">{{salesFormat($rel_product->sales_price)}}</span>
                    @endif
                    <figure>
                        <a href="product-detail-1.html">

                            @if ($rel_product->images()->first()->path)
                            <img class="img-fluid lazy" src="/storage/{{$rel_product->images()->first()->path}}" data-src="/storage/{{$rel_product->images()->first()->path}}" alt="">
                            <img class="img-fluid lazy" src="/storage/{{$rel_product->images()->first()->path}}" data-src="/storage/{{$rel_product->images()->first()->path}}" alt="">
                            @endif

                        </a>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i></div>
                    <a href="product-detail-1.html">
                        <h3>{{$rel_product->name}}</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">{{currencyFormat($rel_product->price,$rel_product->sales_price)}}</span>
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
            <!-- /item -->
            @empty
                
            @endforelse
            
           
        </div>
        <!-- /products_carousel -->
    </div>
    <!-- /container -->

    <div class="feat">
        <div class="container">
            <ul>
                <li>
                    <div class="box">
                        <i class="ti-gift"></i>
                        <div class="justify-content-center">
                            <h3>Calidad</h3>
                            <p>Excelente calidad de todos los productos</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box">
                        <i class="ti-wallet"></i>
                        <div class="justify-content-center">
                            <h3>Precios</h3>
                            <p>Vas a encontrar excelentes precios</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box">
                        <i class="ti-headphone-alt"></i>
                        <div class="justify-content-center">
                            <h3>Soporte y asesoramiento</h3>
                            <p>De parte de expertos en el rubro</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--/feat-->
        
</div>
<!-- /container -->

@endsection

@section('scripts')
    <script src="{{asset("front/js/carousel_with_thumbs.js")}}"></script>
@endsection