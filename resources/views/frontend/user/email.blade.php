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
                <li>Restablecer contraseña</li>
            </ul>
    </div>
    <h1>Ingresa tus datos para reestablecer la contraseña</h1>
</div>
<!-- /page_header -->
        <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="client">Datos</h3>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form_container">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Correo electrónico">
                        </div>
                        
                        </div>
                        <div class="text-center"><input type="submit" value="Enviar enlace para reestablecer contraseña" class="btn_1 full-width"></div>
                    </div>
                    <!-- /form_container -->
                </form>
            </div>
            <!-- /box_account -->
            
        </div>
    </div>
    <!-- /row -->
    </div>
    <!-- /container -->
    
@endsection
