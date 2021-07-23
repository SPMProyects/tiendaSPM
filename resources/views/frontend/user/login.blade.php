@extends('frontend.layout.layout')

@section('styles')
    <!-- SPECIFIC CSS -->
<link href="{{asset("front/css/account.css")}}" rel="stylesheet">
@endsection

@section('content')

<div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li>Ingresar</li>
            </ul>
    </div>
    <h1>Ingresa con tus datos</h1>
</div>
<!-- /page_header -->
        <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="client">Datos de usuario</h3>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form_container">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Correo electrónico">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" value="" placeholder="Contraseña">
                        </div>
                        <div class="clearfix add_bottom_15">
                            <div class="checkboxes float-left">
                                <label class="container_check">Recordarme
                                    <input type="checkbox" name="remember" id="remember">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="float-right"><a id="forgot" href="{{route('password.request')}}">Olvidaste la contraseña?</a></div>
                            @endif
                        </div>
                        <div class="text-center"><input type="submit" value="Ingresar" class="btn_1 full-width"></div>
                    </div>
                    <!-- /form_container -->
                </form>
            </div>
            <!-- /box_account -->
            <div class="row">
                <div class="col-md-6 d-none d-lg-block">
                    <ul class="list_ok">
                        <li>Comercio al publico</li>
                        <li>Ubicacion verificada en Google</li>
                        <li>Proteccion de datos</li>
                    </ul>
                </div>
                <div class="col-md-6 d-none d-lg-block">
                    <ul class="list_ok">
                        <li>Pedidos seguros</li>
                        <li>Soporte 24/7</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /row -->
    </div>
    <!-- /container -->
    
@endsection
