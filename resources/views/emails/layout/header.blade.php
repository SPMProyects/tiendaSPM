<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="p30-15 tbrr" style="padding: 30px 0px 30px 0px; border-radius:12px 12px 0px 0px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <th class="column-top" width="145" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="fluid-img" style="font-size:0pt; line-height:0pt; text-align:left;"><img src="{{asset('/storage/' . json_decode($configurations->general)->icon)}}" width="350" height="60" border="0" alt="" /></td>
                            </tr>
                        </table>
                    </th>
                    <th class="column" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="text-header" style="color:#838586; font-family:Arial, sans-serif; font-size:14px; line-height:18px; text-align:right;"><strong>Telefono:</strong>{{json_decode($configurations->chat_contact_social)->phone}}</td>
                                </tr>
                            <tr>
                                <td class="text-header" style="color:#838586; font-family:Arial, sans-serif; font-size:14px; line-height:18px; text-align:right;"><strong>Wahtsapp:</strong>{{json_decode($configurations->chat_contact_social)->celphone}}</td>
                            </tr>
                            <tr>
                                <td class="text-header" style="color:#838586; font-family:Arial, sans-serif; font-size:14px; line-height:18px; text-align:right;"><strong>Correo:</strong>{{json_decode($configurations->chat_contact_social)->email}}</td>
                            </tr>
                        </table>
                    </th>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="1" bgcolor="#e5e5e5" class="img" style="font-size:0pt; line-height:0pt; text-align:left;">&nbsp;</td>
    </tr> 
</table>