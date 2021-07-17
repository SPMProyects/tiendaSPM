@extends('frontend.layout.layout')

@section('styles')
    <!-- SPECIFIC CSS -->
    <link href="{{asset("front/css/contact.css")}}" rel="stylesheet">
@endsection

@section('content')
	
<div class="container margin_60">
    <div class="main_title">
        <h2>Contactanos!</h2>
        <p>¿Tenes alguna consulta? ¿Queres despejar una duda? ¿Necesitas algún presupuesto? Estamos para ayudarte!</p>
    </div>
    <div class="row justify-content-center">
        
        <div class="col-lg-6">
            <div class="box_contacts">
                <h3 class="mb-3">Nuestros datos</h3>
                <p><i class="ti-home"></i>Dirección: {{json_decode($configurations->chat_contact_social)->dir}}</p>
                <p><i class="ti-headphone-alt"></i>Telefono fijo: {{json_decode($configurations->chat_contact_social)->phone}}</p>
                <p><i class="ti-mobile"></i>Whatsapp: {{json_decode($configurations->chat_contact_social)->celphone}}</p>
                <p><i class="ti-email"></i>Correo electrónico: {{json_decode($configurations->chat_contact_social)->email}}</p>
                <p><i class="ti-alarm-clock"></i>Horarios de atención: {{json_decode($configurations->chat_contact_social)->schedule}}</p>
            </div>
        </div>
        <div class="col-lg-6">
            <h3 class="pb-3">Escribinos</h3>
            <form action="" method="POST">
                @csrf
                @method("POST")
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" placeholder="Correo electrónico">
                </div>
                <div class="form-group">
                    <textarea class="form-control" style="height: 150px;" placeholder="Mensaje"></textarea>
                </div>
                <div class="form-group">
                    <input class="btn_1 full-width" type="submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>
    <!-- /row -->				

    <div class="bg_white mt-5">
        <div class="row">
            <div class="col-lg-12 add_bottom_25" style="height:500px;">
                <iframe class="map_contact" width="100%" height="100%" src="{{json_decode($configurations->chat_contact_social)->maps}}" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
    <!-- /bg_white -->

</div>

@endsection