@extends('frontend.layout.layout')

@section('styles')
    <!-- SPECIFIC CSS -->
    <link href="{{asset("front/css/listing.css")}}" rel="stylesheet">
@endsection

@section('content')

    <div id="stick_here"></div>		
    <div class="toolbox elemento_stick">
        <div class="container">
        <ul class="clearfix">
            <li>
                <div class="sort_select">
                    <select name="sort" id="sort">
                            <option value="date">Ordenar por novedad: Nuevo a antiguo</option>
                            <option value="price">Ordenar por precio: Mayor a menor</option>
                            <option value="price-desc">Ordenar por precio: Menor a mayor</option>
                    </select>
                </div>
            </li>
            <li>
                <a href="#0"><i class="ti-view-grid"></i></a>
                <a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>
            </li>
            <li>
                <a href="#0" class="open_filters">
                    <i class="ti-filter"></i><span>Filters</span>
                </a>
            </li>
        </ul>
        </div>
    </div>
    <!-- /toolbox -->
    
    <div class="container margin_30">
    
    <div class="row">
        <aside class="col-lg-3" id="sidebar_fixed">
            <div class="filter_col">
                <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
                <div class="filter_type version_2">
                    <h4><a href="#filter_1" data-toggle="collapse" class="opened">Categorias</a></h4>
                    <div class="collapse show" id="filter_1">
                        @if ($categories)
                            <ul>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href=""><label class="container_check">{{$category->name}}<small>{{CountAllProudctInCategory($category->id)}}</small></label></a>
                                        @if ($category->categories)
                                            <ul>
                                                @foreach ($category->categories as $subcategory)
                                                    <li><label class="container_check">{{$subcategory->name}}<small>{{$subcategory->products()->count()}}</small></label></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <!-- /filter_type -->
                </div>
                <div class="filter_type version_2">
                    <h4><a href="#filter_2" data-toggle="collapse" class="opened">Productos destacados</a></h4>
                    <div class="collapse show" id="filter_2">
                        @if (getRandomFeatured(3))
                            @foreach (getRandomFeatured(3) as $product)
                                <div class="row">
                                    <div class="col-12">
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
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- /filter_type -->
                </div>
                <div class="filter_type version_2">
                    <h4><a href="#filter_3" data-toggle="collapse" class="opened">Productos en oferta</a></h4>
                    <div class="collapse show" id="filter_3">
                        @if (getRandomSales(3))
                            @foreach (getRandomSales(3) as $product)
                                <div class="row">
                                    <div class="col-12">
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
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- /filter_type -->
                </div>
            </div>
            
        </aside>
        <!-- /col -->
        <div class="col-lg-9">
            <div class="row small-gutters">
                @forelse ($products as $product)
                    <div class="col-6 col-md-4 col-xl-3">
                        <div class="grid_item">
                            @if ($product->featured)
                                <span class="ribbon hot">Destacado</span>
                            @endif
                            
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
                <!-- /col -->
            <div class="pagination__wrapper">
                {{$products->links()}}
            </div>
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->			
        
</div>
<!-- /container -->

@endsection

@section('scripts')
    <script src="{{asset("front/js/sticky_sidebar.min.js")}}"></script>
    <script src="{{asset("front/js/specific_listing.js")}}"></script>
@endsection