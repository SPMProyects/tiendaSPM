@extends('emails.layout.layout')

@section('content')
   	<!-- Inicio saludo -->
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="p30-15" style="color:#000000; font-family:Arial, sans-serif; font-size:22px; line-height:32px; text-align:center; padding-bottom:25px; padding-top: 25px;">Felicidades {{$data['name']}}, tu pedido ha sido realizado con éxito!</td>
        </tr>
        <tr>
            <td class="text pb15" style="color:#666666; font-family:Arial, sans-serif; font-size:15px; line-height:28px; text-align:center; padding-bottom:35px;">A continuación vas a poder ver el detalle de tu pedido.</td>
        </tr>
        <tr>
            <td height="1" bgcolor="#e5e5e5" class="img" style="font-size:0pt; line-height:0pt; text-align:left;">&nbsp;</td>
        </tr> 
        <tr>
            <td class="pb40" style="padding-bottom:40px;"></td>
        </tr>
        
    </table>
    <!-- Fin saludo -->
    				<!-- Detalle pedido -->
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td class="p0-15-30" style="padding: 0px 0px 40px 0px;">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <th class="column-top" width="650" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
    
                                                        
    
                                                        <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
                                                            
                                                            <tr>
                                                                <td class="h4 pb10" style="color:#000000; font-family:Arial, sans-serif; font-size:16px; line-height:28px; text-align:center; padding-bottom:10px;width:130px;">Nombre</td>
                                                                <td class="h4 pb10" style="color:#000000; font-family:Arial, sans-serif; font-size:16px; line-height:28px; text-align:center; padding-bottom:10px;width:130px;">Imagen</td>
                                                                <td class="h4 pb10" style="color:#000000; font-family:Arial, sans-serif; font-size:16px; line-height:28px; text-align:center; padding-bottom:10px;width:130px;">Precio</td>
                                                                <td class="h4 pb10" style="color:#000000; font-family:Arial, sans-serif; font-size:16px; line-height:28px; text-align:center; padding-bottom:10px;width:130px;">Cantidad</td>
                                                                <td class="h4 pb10" style="color:#000000; font-family:Arial, sans-serif; font-size:16px; line-height:28px; text-align:center; padding-bottom:10px;width:130px;">Subtotal</td>
                                                            </tr>
                                                            
                                                            @if (!\Cart::session(Auth::id())->isEmpty())
                                                                @foreach (\Cart::session(Auth::id())->getContent()->sortKeys() as $cartItem)
                                                                    <tr>
                                                                        <td class="text pb25" style="color:#666666; font-family:Arial, sans-serif; font-size:15px; line-height:28px; text-align:center; padding-bottom:25px; padding-left:3px;
                                                                        padding-right:3px; min-width:50px; max-width:130px; word-break: break-all">{{$cartItem->name}}</td>
                                                                        <td class="text pb25" style="color:#666666; font-family:Arial, sans-serif; font-size:15px; line-height:28px; text-align:center; padding-bottom:25px; padding-left:3px; padding-right:3px; max-width:130px; min-width:50px; word-break: break-all;"><img src="{{asset('/storage/'. $cartItem->associatedModel->images()->first()->path)}}" alt="Image" height="100px"></td>
                                                                        <td class="text pb25" style="color:#666666; font-family:Arial, sans-serif; font-size:15px; line-height:28px; text-align:center; padding-bottom:25px; padding-left:3px;
                                                                        padding-right:3px; max-width:130px; min-width:50px; word-break: break-all">{{currencyFormat($cartItem->price)}}</td>
                                                                        <td class="text pb25" style="color:#666666; font-family:Arial, sans-serif; font-size:15px; line-height:28px; text-align:center; padding-bottom:25px; padding-left:3px; padding-right:3px; max-width:130px; min-width:40px; word-break: break-all">{{$cartItem->quantity}}</td>
                                                                        <td class="text pb25" style="color:#666666; font-family:Arial, sans-serif; font-size:15px; line-height:28px; text-align:center; padding-bottom:25px; padding-left:3px;
                                                                        padding-right:3px; max-width:130px; min-width:50px; word-break: break-all">{{currencyFormat($cartItem->getPriceSum())}}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </table>
                                                        <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
                                                            <tr>
                                                                <td class="h4 pb10" style="color:#000000; font-family:Arial, sans-serif; font-size:16px; line-height:28px; text-align:center; padding-bottom:10px;width:130px;">Total pedido</td>
                                                                <td class="pb10" style="color:#666666; font-family:Arial, sans-serif; font-size:15px; line-height:28px; text-align:center; padding-left:3px;
                                                                padding-right:3px;width:520px; word-break: break-all;">{{currencyFormat(\Cart::session(Auth::id())->getTotal() ?? '')}}</td>
                                                                
                                                            </tr>
                                                        </table>
                                                    </th>
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
                            <td class="pb40" style="padding-bottom:40px;"></td>
                        </tr>  
                    </table>
                    <!-- Detalle pedido -->
@endsection
