@extends('emails.layout.layout')

@section('content')
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
       
        <tr>
            <td class="p30-15" style="color:#000000; font-family:Arial, sans-serif; font-size:25px; line-height:32px; text-align:center; padding-top: 25px;">Mensaje desde el sito web</td>
        </tr>
        <tr>
            <td class="p30-15" style="padding: 40px 0px 40px 0px;">
                <table width="100%" border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="text pb15" style="color:black; font-family:Arial, sans-serif; font-size:16px; line-height:30px; text-align:center;">
                            Nombre:
                        </td>
                        <td class="text pb15" style="color:black; font-family:Arial, sans-serif; font-size:16px; line-height:30px; text-align:center;">
                            {{$request['name'] ?? ''}}
                        </td>
                    </tr>
                    <tr>
                        <td class="text pb15" style="color:black; font-family:Arial, sans-serif; font-size:16px; line-height:30px; text-align:center;">
                            Correo:
                        </td>
                        <td class="text pb15" style="color:black; font-family:Arial, sans-serif; font-size:16px; line-height:30px; text-align:center;">
                            {{$request['email'] ?? ''}}
                        </td>
                    </tr>
                    <tr>
                        <td class="text pb15" style="color:black; font-family:Arial, sans-serif; font-size:16px; line-height:30px; text-align:center;">
                            Asunto:
                        </td>
                        <td class="text pb15" style="color:black; font-family:Arial, sans-serif; font-size:16px; line-height:30px; text-align:center;">
                            {{$request['subject'] ?? ''}}
                        </td>
                    </tr>
                    <tr>
                        <td class="text pb15" style="color:black; font-family:Arial, sans-serif; font-size:16px; line-height:30px; text-align:center;">
                            Mensaje: 
                        </td>
                        <td class="text pb15" style="color:black; font-family:Arial, sans-serif; font-size:16px; line-height:30px; text-align:center;">
                            {{$request['message'] ?? ''}}
                        </td>
                    </tr>     
                </table>
            </td>
        </tr>
    </table>
@endsection
