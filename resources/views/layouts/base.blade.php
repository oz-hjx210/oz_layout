<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <base href="{{ config('app.url') }}">
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">
    <meta name="author" content="www.ozchamp.com">
    <meta class="viewport" name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @hasSection('title')
    <title>@yield('title') - {{ config('web.config_title') }}</title>
    @else
    <title>{{ config('web.config_title') }}</title>
    @endif

    @hasSection('meta')
    @yield('meta')
    @else
    <meta name="description" content="{{ config('web.config_description') }} ">
    <meta name="keyword" content="{{ config('web.config_keywords') }}">
    @endif

    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico" />
    <!--CSS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Marker+Hatch&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <link href="/css/layout.css" rel="stylesheet">
    <style type="text/css">
        :root {
            --swiper-navigation-color: white !important;
            --swiper-theme-color: white !important;
        }
    </style>

    <script src="https://kit.fontawesome.com/9aaa47093c.js" crossorigin="anonymous"></script>

    <!--prettyPhoto-->
	<script src="/js/jquery.min.js"></script>
	<!--script src="js/jquery.lint.js" type="text/javascript" charset="utf-8"></script-->
	<link rel="stylesheet" href="/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
	<script src="/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

    @livewireStyles
    {!! config('web.config_google') !!}

<!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-T0WKB8NY8R"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-T0WKB8NY8R');
    </script>
</head>

<body>
<div class="wrapper">
    @yield('body')
    @livewireScripts
</div>

<script type="text/javascript">
	$("button.trigger").click(function(){
	    $("nav.navi").toggleClass("active");
	});
    $("a[rel^='prettyPhoto']").prettyPhoto({
        social_tools: false,
    });
</script>

</body>
</html>
