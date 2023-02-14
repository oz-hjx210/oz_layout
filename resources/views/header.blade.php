
@section('header')
    <header class="light">
        <div class="logo">
            <a href="index.php"><img src="img/logo-normal.svg"></a>
            <button class="trigger"><i class="fas fa-bars"></i></button>
        </div>
        <nav class="navi">
            <ul>
                <!--<li><a href="https://www.ozchamp.com/">回首頁</a></li>-->
                <!--<li><a href="index.html">方案說明</a></li>-->
                <li class="{{(request()->is('/') || request()->is('about')) ? 'active' : ''}}"><a href="/">功能總覽</a></li>
                <li class="{{ (request()->is('demoes') || Route::currentRouteName()=='demos')? 'active' : ''}}"><a href="/demoes">風格總覽</a></li>
                <li class="{{request()->is('frame') ? 'active' : ''}}"><a href="/frame">區塊總覽</a></li>
                <!--li class="{{request()->is('projects') ? 'active' : ''}}"><a href="/projects"  >實績案例</a></li-->
                <li class="{{request()->is('faq') ? 'active' : ''}}"><a href="/faq">問與答</a></li>
                <!--<li><a href="https://www.ozchamp.com/contact">聯絡我們</a></li>-->
            </ul>
        </nav>
        <div class="hotline">
            <i class="fas fa-phone"></i>
            <p>專業服務</p>
            <a href="tel:886 3 366 1000">+886-3-366-1000</a>
        </div>
    </header>

@endsection
