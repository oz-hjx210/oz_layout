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
                <h1 class="text-5xl font-bold">產品介紹</h1>
            </div>
            <div class="breadcrumb mt-6 text-sm text-white/60">
                <a href="/">首頁</a>
                <span class="mx-2"><i class="fas fa-angle-right"></i></span>
                <a href="/prods">產品介紹</a>
                <span class="mx-2"><i class="fas fa-angle-right"></i></span>
                <a href="#">{{$info->prodtp->title}}</a>
                 <span class="mx-2"><i class="fas fa-angle-right"></i></span>
                <a href="#">{{$info->title}}</a>
            </div>
        </div>
    </section>

    <!--Product Detail-->
    <section class="product-top mx-auto">
        <div class="container mx-auto mt-12 mb-6 bg-white border border-gray-300">
            <div class="px-8 py-12">
                <div class="flex flex-col flex-wrap md:flex-row">
                    <div class="w-full lg:flex-1 px-4">
                        <div id="default-carousel" class="relative mb-6 sm:mb-0" data-carousel="static">
                            <div class="overflow-hidden relative h-40 sm:h-80">
                                @foreach($info->imgurl as $img)
                                <div class="hidden duration-700 ease-in-out bg-gradient-to-bl from-indigo-600 to-blue-500" data-carousel-item>
                                    <img src="{{url(config('filesystems.disks.public.url').'/'.$img)}}" class="block w-full h-auto object-cover">
                                </div>

                                @endforeach

                            </div>
                            <div class="flex justify-center mt-3 space-x-3">
                                @foreach($info->imgurl as $img)
                                <button type="button" class="w-24 h-18 overflow-hidden" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0">
                                    <img src="{{url(config('filesystems.disks.public.url').'/'.$img)}}" class="block w-full h-auto">
                                </button>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:flex-1 px-4">
                        <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">
                            {{$info->title}}</h2>




                        <p class="my-8 text-gray-500">
                             {!!  nl2br($info->note) !!}
                         </p>

                        <div class="flex py-4 space-x-4">
                            <div class="hidden relative">
                                <div class="text-center left-0 pt-2 right-0 absolute block text-xs uppercase text-gray-400 tracking-wide font-semibold">數量</div>
                                <select class="cursor-pointer appearance-none rounded-xl border border-gray-200 pl-4 pr-8 h-14 flex items-end pb-1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                <svg class="w-5 h-5 text-gray-400 absolute right-0 bottom-0 mb-2 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>
                            </div>

                            <button type="button" class="hidden h-14 px-6 py-2 font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white">加入詢價車</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-bottom mx-auto">
        <div class="container mx-auto mt-6 mb-12 px-12 py-6 bg-white border border-gray-300">
            <div class="border-b border-gray-200 dark:border-gray-700 mb-4">
                <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#productContent" role="tablist">
                    @if($info->html)
                    <li class="mr-2" role="presentation">
                        <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-2xl font-bold text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="introduction-tab" data-tabs-target="#introduction" type="button" role="tab" aria-controls="introduction" aria-selected="true">商品詳情</button>
                    </li>
                    @endif
                    @if($info->html2)
                    <li class="mr-2" role="presentation">
                        <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-2xl font-bold text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="specification-tab" data-tabs-target="#specification" type="button" role="tab" aria-controls="specification" aria-selected="false">商品規格</button>
                    </li>
                    @endif
                </ul>
            </div>
            <div id="productContent">
                @if($info->html)
                <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800" id="introduction" role="tabpanel" aria-labelledby="introduction-tab">
                     {!! $info->html !!}
                 </div>
                @endif
                @if($info->html2)
                <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="specification" role="tabpanel" aria-labelledby="specification-tab">
                    {!! $info->html2 !!}
                </div>
                @endif
            </div>
        </div>
    </section>
    <!--Product List-->

@endsection
@include('footer')
