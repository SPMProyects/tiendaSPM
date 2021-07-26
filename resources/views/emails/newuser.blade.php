@extends('emails.layout.layout')

@section('content')
    <!-- Presentacion -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="p30-15" style="color:#000000; font-family:Arial, sans-serif; font-size:25px; line-height:32px; text-align:center; padding-bottom:25px; padding-top: 25px;">Hola {{$data['name']}}, Bienvenido la familia de {{json_decode($configurations->general)->store_name}}</td>
        </tr>
        <tr>
            <td class="fluid-img p30-15" style="font-size:0pt; line-height:0pt; text-align:left;"><img src="{{asset('emails/images/newuser/site_front.jpg')}}" width="650" height="650" border="0" alt="" /></td>
        </tr>
        <tr>
            <td class="p30-15" style="padding: 40px 0px 40px 0px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="text pb15" style="color:black; font-family:Arial, sans-serif; font-size:16px; line-height:30px; text-align:center; padding-bottom:35px;">
                        <p>Al recibir este correo significa que estas dado de alta en nuestro sitio online.
                        </p>
                        <p>Vas a poder realizar pedios, ver información de valor y muchas cosas más.
                        </p>
                        De parte de {{json_decode($configurations->general)->store_name}} te felicitamos por pertenecer a esta cominidad</td>
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
            <td class="pb40" style="padding-bottom:10px;"></td>
        </tr>
    </table>
    <!-- Presentacion -->

    <!-- Imagen a la izquierda -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <table>
                    <tr>
                        <th class="column-top" width="300" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="fluid-img" style="font-size:0pt; line-height:0pt; text-align:left;"><img src="{{asset('emails/images/newuser/site_column.jpg')}}" width="315" height="237" border="0" alt="" /></td>
                                </tr>
                            </table>
                        </th>
                        <th class="column-empty" width="45" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                        </th>
                        <th class="column-top" style="font-size:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="h4 pb10" style="color:#000000; font-family:Arial, sans-serif; font-size:20px; line-height:28px; text-align:left; padding-bottom:10px;">Conoce toda nuestra oferta de productos.</td>
                                </tr>
                                <tr>
                                    <td class="text pb25" style="color:#666666; font-family:Arial, sans-serif; font-size:15px; line-height:28px; text-align:left; padding-bottom:25px;">En nuestro sitio vas a encontrar un amplio catálogo de de productos para que realices los pedidos acorde a tus necesidades.</td>
                                </tr>
                                <tr>
                                    <td class="p30t">
                                        <table align="center">
                                            <tr>
                                                <td class="text-link" style="font-family:Arial, sans-serif; text-align:center; background-color:{{json_decode($configurations->general)->color}}; padding:10px 15px; border-radius: 10px;">
                                                    <a style= "color:{{json_decode($configurations->general)->color_2}}; font-size:16px; font-weight: bold; letter-spacing: 0.12em; text-decoration: none;" href="{{route('store')}}">Ir al sitio
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </th>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="pb40" style="padding-bottom:40px;"></td>
        </tr>
        <tr>
            <td height="1" bgcolor="#e5e5e5" class="img" style="font-size:0pt; line-height:0pt; text-align:left;">&nbsp;</td>
        </tr>
        <tr>
            <td class="pb40" style="padding-bottom:40px;"></td>
        </tr>

    </table>
    <!-- Final imagen a la izquierda -->

    <!-- Imagen a la derecha -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <table>
                    <tr>
                        <th class="column-top" style="font-size:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="h4 pb10" style="color:#000000; font-family:Arial, sans-serif; font-size:20px; line-height:28px; text-align:left; padding-bottom:10px;">¿Necesitas asesoramiento?</td>
                                </tr>
                                <tr>
                                    <td class="text pb25" style="color:#666666; font-family:Arial, sans-serif; font-size:15px; line-height:28px; text-align:left; padding-bottom:25px;">Habla con nuestro grupo de ejecutivos de venta para que te asesoren en lo que necesites.</td>
                                </tr>
                                <tr>
                                    <td class="p30t">
                                        <table align="center">
                                            <tr>
                                                <td class="text-link" style="font-family:Arial, sans-serif; text-align:center; background-color:{{json_decode($configurations->general)->color}}; padding:10px 15px; border-radius: 10px;">
                                                    <a style= "color:{{json_decode($configurations->general)->color_2}}; font-size:16px; font-weight: bold; letter-spacing: 0.12em; text-decoration: none;" href="{{route('contact')}}">Consultar
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </th>
                        <th class="column-empty" width="45" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                        </th>
                        <th class="column-top" width="300" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="fluid-img" style="font-size:0pt; line-height:0pt; text-align:left;"><img src="{{asset('emails/images/newuser/asesor.jpg')}}" width="315" height="237" border="0" alt="" /></td>
                                </tr>
                            </table>
                        </th>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="pb40" style="padding-bottom:40px;"></td>
        </tr>
        <tr>
            <td height="1" bgcolor="#e5e5e5" class="img" style="font-size:0pt; line-height:0pt; text-align:left;">&nbsp;</td>
        </tr>
        <tr>
            <td class="pb40" style="padding-bottom:40px;"></td>
        </tr>

    </table>				
    <!-- Final imagen a la derecha -->
@endsection
