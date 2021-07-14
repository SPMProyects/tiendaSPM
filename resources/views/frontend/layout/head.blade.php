<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Ansonika">
<title> @yield('title') </title>

<!-- Favicons-->
<link rel="shortcut icon" href="{{asset("/storage/" . json_decode(App\Configuration::find(1)->general)->fav_icon)}}" type="image/x-icon">
<link rel="apple-touch-icon" type="image/x-icon" href="{{asset("/storage/" . json_decode(App\Configuration::find(1)->general)->fav_icon)}}">
<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset("/storage/" . json_decode(App\Configuration::find(1)->general)->fav_icon)}}">
<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{asset("/storage/" . json_decode(App\Configuration::find(1)->general)->fav_icon)}}">
<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{asset("/storage/" . json_decode(App\Configuration::find(1)->general)->fav_icon)}}">