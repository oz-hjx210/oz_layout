@extends('layouts.app')

    @include('header')


@section('content')

    <article class="components-wrapper">
        <aside id="switcher">
            <div id="device">
                <ul>
                    <li class="device-monitor">
                        <div class="icon-monitor">
                            <svg height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h48v48h-48z" fill="none"/><path d="M42 4h-36c-2.21 0-4 1.79-4 4v24c0 2.21 1.79 4 4 4h14l-4 6v2h16v-2l-4-6h14c2.21 0 4-1.79 4-4v-24c0-2.21-1.79-4-4-4zm0 24h-36v-20h36v20z"/></svg>
                        </div>
                    </li>
                    <li class="device-mobile">
                        <div class="icon-tablet">
                            <svg height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M37 0h-28c-2.76 0-5 2.24-5 5v38c0 2.76 2.24 5 5 5h28c2.76 0 5-2.24 5-5v-38c0-2.76-2.24-5-5-5zm-14 46c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm15-8h-30v-32h30v32z"/></svg>
                        </div>
                    </li>
                    <li class="device-mobile">
                        <div class="icon-mobile">
                            <svg height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M31 2h-16c-2.76 0-5 2.24-5 5v34c0 2.76 2.24 5 5 5h16c2.76 0 5-2.24 5-5v-34c0-2.76-2.24-5-5-5zm-8 42c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm9-8h-18v-28h18v28z"/><path d="M0 0h48v48h-48z" fill="none"/></svg>
                        </div>
                    </li>
                </ul>
            </div>
            <nav id="navigation">
                <ul>
                    @foreach($moduletps as $moduletp)
                        <li>
                            <a href="/modules/{{$moduletp->id}}" target="iframeEle">{{$moduletp->title}}<small>Header</small></a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </aside>

        <div id="iframe-wrap" class="full-width" style="background: url('img/illus-page.jpg') repeat center; background-size: 960px auto;">
            <iframe id="iframe" name="iframeEle" src="/modules/{{$moduletps[0]->id}}" allowtransparency="true" frameborder="0" width="100%" height="100%" style="background-color: transparent;"></iframe>
        </div>

    </article>


    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        var dqfl = "UI";
        var theme_list_open = false;

        $(document).ready(function () {
            function fixHeight() {
                var headerHeight = $("#switcher").height();
                $("#iframe").attr("height", $(window).height() - 60 + "px");
            }
            $(window).resize(function () {
                fixHeight();
            }).resize();

            $('.icon-monitor').addClass('active');

            $(".icon-mobile").click(function () {
                $("#by").css("overflow-y", "auto");
                $('#iframe-wrap').removeClass().addClass('mobile-width');
                $('.icon-monitor,.icon-tablet').removeClass('active');
                $(this).addClass('active');
                return false;
            });

            $(".icon-tablet").click(function () {
                $("#by").css("overflow-y", "auto");
                $('#iframe-wrap').removeClass().addClass('tablet-width');
                $('.icon-monitor,.icon-mobile').removeClass('active');
                $(this).addClass('active');
                return false;
            });

            $(".icon-monitor").click(function () {
                $("#by").css("overflow-y", "hidden");
                $('#iframe-wrap').removeClass().addClass('full-width');
                $('.icon-tablet,.icon-mobile').removeClass('active');
                $(this).addClass('active');
                return false;
            });
        });
    </script>
    <script type="text/javascript">
        function Responsive($a) {
            if ($a == true) $("#Device").css("opacity", "100");
            if ($a == false) $("#Device").css("opacity", "0");
            $('#iframe-wrap').removeClass().addClass('full-width');
            $('.icon-monitor,.icon-tablet,.icon-mobile').removeClass('active');
            $(this).addClass('active');
            return false;
        };
    </script>
@endsection
@include('footer')