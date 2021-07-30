<footer class="revealed">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                    <h3 data-target="#collapse_3">Contactanos</h3>
                <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                    <ul>
                        <li><i class="ti-home"></i>{{json_decode($configurations->chat_contact_social)->dir}}</li>
                        <li><i class="ti-headphone-alt"></i>{{json_decode($configurations->chat_contact_social)->phone}}</li>
                        <li><i class="ti-mobile"></i><a href="#0">{{json_decode($configurations->chat_contact_social)->celphone}}</a></li>
                        <li><i class="ti-email"></i><a href="#0">{{json_decode($configurations->chat_contact_social)->email}}</a></li>
                        <li><i class="ti-alarm-clock"></i><a href="#0">{{json_decode($configurations->chat_contact_social)->schedule}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center">
                <h3 data-target="#collapse_3">SEGUINOS EN REDES SOCIALES</h3>
                <div class="follow_us">
                    <ul>
                        <li><a href="{{json_decode($configurations->chat_contact_social)->twitter}}"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset("front/img/twitter_icon.svg")}}" alt="" class="lazy"></a></li>
                        <li><a href="{{json_decode($configurations->chat_contact_social)->facebook}}"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset("front/img/facebook_icon.svg")}}" alt="" class="lazy"></a></li>
                        <li><a href="{{json_decode($configurations->chat_contact_social)->instagram}}"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset("front/img/instagram_icon.svg")}}" alt="" class="lazy"></a></li>
                        <li><a href="{{json_decode($configurations->chat_contact_social)->youtube}}"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{asset("front/img/youtube_icon.svg")}}" alt="" class="lazy"></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center">
                    <h3 data-target="#collapse_4">Suscribite a nuestras novedades</h3>
                <div class="collapse dont-collapse-sm" id="collapse_4">
                    <div id="newsletter">
                        <div class="form-group">
                            <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Correo electrónico">
                            <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row add_bottom_25">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul class="additional_links">
                    <li><a href="#0">Terminos y condiciones</a></li>
                    <li><a href="#0">Politicas de privacidad</a></li>
                    <li><span>© 2021 Tienda SPM</span></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

@if (getConfig('popup','title_1') != '')
    <x-Modal id="modal1" title="{{getConfig('popup','title_1')}}" text="{{getConfig('popup','text_1')}}" buttonText="{{getConfig('popup','button_1')}}" buttonLink="{{getConfig('popup','link_1')}}" image="{{asset('/storage/' . getConfig('popup','image_1'))}}"/>
@endif

@if (getConfig('popup','title_2') != '')
    <x-Modal id="modal2" title="{{getConfig('popup','title_2')}}" text="{{getConfig('popup','text_2')}}" buttonText="{{getConfig('popup','button_2')}}" buttonLink="{{getConfig('popup','link_2')}}" image="{{asset('/storage/' . getConfig('popup','image_2'))}}"/>
@endif

@if (getConfig('popup','title_3') != '')
    <x-Modal id="modal3" title="{{getConfig('popup','title_3')}}" text="{{getConfig('popup','text_3')}}" buttonText="{{getConfig('popup','button_3')}}" buttonLink="{{getConfig('popup','link_3')}}" image="{{asset('/storage/' . getConfig('popup','image_3'))}}"/>
@endif
