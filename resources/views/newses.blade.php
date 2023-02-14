@extends('layouts.app')

    @include('header')


@section('content')

    <section class="page-banner bg-cover bg-center bg-black" style="background-image: url('img/slider.jpg');">
        <div class="inner py-16 flex flex-col justity-center bg-black/60 text-center text-white">
            <div class="banner-heading">
                <h1 class="text-5xl font-bold">最新消息</h1>
            </div>
            <div class="breadcrumb mt-6 text-sm text-white/60">
                <a href="/">首頁</a>
                <span class="mx-2"><i class="fas fa-angle-right"></i></span>
                <a href="#">最新消息</a>
            </div>
        </div>
    </section>

    <!--Product List-->
    <section class="page-news mx-auto">
        <div class="container mx-auto mt-3 mb-6 px-4 py-4 md:px-6 md:py-6">
            <div class="flex flex-wrap mt-12">
                <aside class="flex flex-col w-1/4 pr-10">
                    <h3 class="text-2xl font-extrabold leading-none text-gray-900">最新消息</h3>
                    <ul class="mt-10 divide divide-y">
                        @foreach($newstps as $newstp)
                        <li><a href="{{url('news/'.$newstp->id)}}" class="block py-3 font-bold @if($newstp->id==$newstp_id)hover:text-indigo-600@elseif text-indigo-600 @endif">{{$newstp->title}}</a></li>
                        @endforeach
                     </ul>
                </aside>
                <div class="grid grid-cols-1 gap-2 w-3/4 divide divide-y -mt-4">
                    @foreach($lists as $val)
                    <div class="flex flex-col items-start justify-start py-4">
                        <div class="flex flex-wrap flex-col">
                            <h3 class="flex-full font-semibold text-xl text-black mb-2"><a href="{{url('news_detail/'.$val->id)}}" class="block leading-loose text-gray-600 hover:text-gray-800">{{$val->title}}</a></h3>
                            <time class="block text-xs text-gray-400"><i class="fa fa-clock mr-2" aria-hidden="true"></i>{{ substr($val->created_at,0,10)}}</time>
                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="flex flex-col items-center w-full mb-8 px-6 mx-auto mt-8">

                    {{ $lists->links() }}

                </div>
            </div>
        </div>
    </section>

@endsection

    @include('footer')

