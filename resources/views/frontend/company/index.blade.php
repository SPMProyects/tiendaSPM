@extends('frontend.layout.layout')

@section('styles')
    <!-- SPECIFIC CSS -->
    <link href="{{asset("front/css/about.css")}}" rel="stylesheet">
@endsection

@section('content')

    <div class="top_banner general">
        <div class="opacity-mask d-flex align-items-md-center" data-opacity-mask="rgba(0, 0, 0, 0.1)">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-8 col-md-6 text-right">
                        <h1>{{json_decode($configurations->company)->banner_title}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{asset("/storage/" . json_decode($configurations->company)->banner_image)}}" class="img-fluid" alt="">
    </div>
    <!--/top_banner-->
    
    <div class="bg_white">
    <div class="container margin_90_0">
        <div class="row justify-content-between align-items-center flex-lg-row-reverse content_general_row">
            <div class="col-lg-5 text-center">
                <figure><img src="{{asset("/storage/" . json_decode($configurations->company)->image_1)}}" data-src="{{asset("/storage/" . json_decode($configurations->company)->image_1)}}" alt="" class="img-fluid lazy" width="350" height="268"></figure>
            </div>
            <div class="col-lg-6">
                <h2>{{json_decode($configurations->company)->title_1}}</h2>
                <p style="white-space:pre-line;">{{json_decode($configurations->company)->text_1}}</p>
            </div>
        </div>
        <!--/row-->
        <div class="row justify-content-between align-items-center content_general_row">
            <div class="col-lg-5 text-left">
                <figure><img src="{{asset("/storage/" . json_decode($configurations->company)->image_2)}}" data-src="{{asset("/storage/" . json_decode($configurations->company)->image_2)}}" alt="" class="img-fluid lazy" width="350" height="268"></figure>
            </div>
            <div class="col-lg-6">
                <h2>{{json_decode($configurations->company)->title_2}}</h2>
                <p style="white-space:pre-line;">{{json_decode($configurations->company)->text_2}}</p>
            </div>
        </div>
        <!--/row-->
        <div class="row justify-content-between align-items-center flex-lg-row-reverse content_general_row">
            <div class="col-lg-5 text-center">
                <figure><img src="{{asset("/storage/" . json_decode($configurations->company)->image_3)}}" data-src="{{asset("/storage/" . json_decode($configurations->company)->image_3)}}" alt="" class="img-fluid lazy" width="350" height="268"></figure>
            </div>
            <div class="col-lg-6">
                <h2>{{json_decode($configurations->company)->title_3}}</h2>
                <p style="white-space:pre-line;">{{json_decode($configurations->company)->text_3}}</p>
            </div>
        </div>
        <!--/row-->
    </div>
    <!--/container-->
        
    </div>
    <!--/bg_white-->


@endsection