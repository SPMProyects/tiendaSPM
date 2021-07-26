<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    @include('frontend.layout.head')
    @include('frontend.layout.styles')
    @yield('styles')
</head>

<body class="body">
	
	<table border="0" width="650" cellspacing="0" cellpadding="0" bgcolor="#ffffff" class="mobile-shell" align="center">
		<tr>
			<td class="td" style="max-width: 650px;">
				
				@include('emails.layout.header')

				@yield('content')

                @include('emails.layout.footer')
				
			</td>
		</tr>
	</table>
</body>
</html>
<?php 

?>