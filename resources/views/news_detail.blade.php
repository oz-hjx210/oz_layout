@extends('layouts.app')

    @include('header')

@section('title')
    {{$info->title}}
@endsection
@section('meta')
    <meta name="description" content="@if($info->meta_description) {{$info->meta_description}} @else {{ config('web.config_description')}}@endif">
    <meta name="keyword" content="@if($info->meta_keyword) {{$info->meta_keyword}} @else {{ config('web.config_title')}}@endif">
@endsection
@section('content')


    <section class="page-banner bg-cover bg-center bg-black" style="background-image: url('img/slider.jpg');">
        <div class="inner py-16 flex flex-col justity-center bg-black/60 text-center text-white">
            <div class="banner-heading">
                <h1 class="text-5xl font-bold">最新消息</h1>
            </div>
            <div class="breadcrumb mt-6 text-sm text-white/60">
                <a href="/">首頁</a>
                <span class="mx-2"><i class="fas fa-angle-right"></i></span>
                <a href="/news">最新消息</a>
                <span class="mx-2"><i class="fas fa-angle-right"></i></span>
                <a href="#">{{$info->title}}</a>
            </div>
        </div>
    </section>

    <!--News Detail-->
    <section class="mx-auto">
        <div class="container mx-auto mt-3 mb-6 px-4 py-4 md:px-6 md:py-6">
            <div class="flex flex-col flex-wrap mt-12">
                <h1 class="text-3xl font-extrabold leading-none text-gray-900">{{$info->title}}</h1>
                <div class="py-4 mb-8 border-b border-b-gray-300">
                    <time class="block text-xs text-gray-400"><i class="fa fa-clock mr-2" aria-hidden="true"></i>{{substr($info->created_at,0,10)}}</time>
                </div>
                <div class="flex flex-col">

                    {!! $info->html !!}

                </div>
            </div>
        </div>
    </section>

    <!--Product List-->


@endsection

    @include('footer')

