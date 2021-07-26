<!-- Contacto -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="p0-15-30" style="padding: 20px 40px 50px 40px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="h3 center pb15" style="color:#000000; font-family:Arial, sans-serif; font-size:22px; line-height:32px; text-align:center; padding-bottom:15px;">Contactate con nosotros ¡Estamos para ayudarte!</td>
                </tr>
                <tr>
                    <td class="text center pb15" style="color:#666666; font-family:Arial, sans-serif; font-size:15px; line-height:28px; text-align:center; padding-bottom:15px;"><strong>Whatsapp:</strong> {{json_decode($configurations->chat_contact_social)->celphone}}<br><strong>Tel:</strong> {{json_decode($configurations->chat_contact_social)->phone}}<br><strong>Correo:</strong> {{json_decode($configurations->chat_contact_social)->email}}<br><strong>Direccion:</strong> {{json_decode($configurations->chat_contact_social)->dir}}<br></td>
                </tr>
                <tr>
                    <td class="pb40" height="30"></td>
                </tr>
                <tr>
                    <td>
                        <table align="center">
                            <tr>
                                <td class="text-link" style="font-family:Arial, sans-serif; text-align:center; background-color:{{json_decode($configurations->general)->color}}; padding:10px 15px; border-radius: 10px;">
                                    <a style= "color:{{json_decode($configurations->general)->color_2}}; font-size:16px; font-weight: bold; letter-spacing: 0.12em; text-decoration: none;" href="{{route('contact')}}">Contactar
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="1" bgcolor="#e5e5e5" class="img" style="font-size:0pt; line-height:0pt; text-align:left;">&nbsp;</td>
    </tr>
    <tr>
        <td style="padding-top: 40px;"></td>
    </tr>
</table>
<!-- Fin Contacto -->


<!-- Footer -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center" style="padding-bottom: 30px;">
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="img" width="55" style="font-size:0pt; line-height:0pt; text-align:center;"><a href="{{json_decode($configurations->chat_contact_social)->facebook}}" target="_blank"><img src="{{asset('emails/images/facebook.jpg')}}" width="15" height="15" border="0" alt="" /></a></td>
                    <td class="img" width="55" style="font-size:0pt; line-height:0pt; text-align:center;"><a href="{{json_decode($configurations->chat_contact_social)->instagram}}" target="_blank"><img src="{{asset('emails/images/instagram.jpg')}}" width="15" height="15" border="0" alt="" /></a></td>
                    <td class="img" width="55" style="font-size:0pt; line-height:0pt; text-align:center;"><a href="{{route('home')}}" target="_blank"><img src="{{asset('emails/images/site.jpg')}}" width="15" height="15" border="0" alt="" /></a></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="text-footer2 pb20" style="color:#777777; font-family:Arial, sans-serif; font-size:12px; line-height:26px; text-align:center; padding-bottom:20px;">{{json_decode($configurations->chat_contact_social)->dir}}
        </td>
    </tr>
        <tr>
            <td class="text-footer2 pb20" style="color:#777777; font-family:Arial, sans-serif; font-size:12px; line-height:26px; text-align:center; padding-bottom:20px;"><a href="{{route('home')}}" target="_blank">{{json_decode($configurations->general)->store_name}}</a>
            </td>
    </tr>
</table>
<!-- Fin Footer -->