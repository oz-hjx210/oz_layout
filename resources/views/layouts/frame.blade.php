<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keyword" content="">

    <base href="{{ config('app.url') }}">

    <meta name="author" content="www.ozchamp.com">
    <meta class="viewport" name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>區塊總覽-頭部</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
    <!--CSS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;700;900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/9aaa47093c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>

    <!--swiper-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <style type="text/css">
        :root {
            --swiper-navigation-color: white !important;
            --swiper-theme-color: white !important; 
        }
        ::-webkit-scrollbar { width: 6px; height: 6px; border-radius: 3px;}
        ::-webkit-scrollbar-thumb { border-radius: 3px; background: #333; }
        ::-webkit-scrollbar-thumb:hover { background: #ff6d34; }
        #facebook, #twitter, #lineme { width: 32px; height: 32px;}
        #facebook rect { fill: #385997;}
        #facebook path { fill: #ffffff;}
        #twitter rect { fill: #00aade;}
        #twitter path { fill: #ffffff;}
        #lineme rect,
        #lineme .path2 { fill: #00cf2e;}
        #lineme path { fill: #ffffff;}
        section .container { border: 1px solid #e5e5e5; }
        input[type="radio"] { width: 1.2rem; height: 1.2rem; background: white; vertical-align: middle; }
        label { display: inline-block; font-weight: bold; line-height: 1.2rem; cursor: pointer;}
    </style>
</head>

<body class="p-4 md:px-20 md:pt-12 md:pb-20">
    @yield('content')

    <script>
        var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        effect: "fade",
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            },
        });
    </script>
</body>
</html>

