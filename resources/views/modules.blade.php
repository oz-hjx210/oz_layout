@extends('layouts.frame')
@section('content')

    <div class="flex flex-col justify-start mb-6">
        <h3 class="text-2xl font-['Noto Sans TC']">{{$now_moduletp->title}}</h3>
        <p class="text-gray-400">區塊總覽 - {{$now_moduletp->title}}</p>
    </div>

    @foreach($lists as $val)
    <h4 class="mx-auto max-w-7xl">
        <label class="p-3 bg-orange-500 text-white text-lg rounded">
            <i class="fa-solid fa-list"></i>
            {{$val->title}}
        </label>

    </h4>
    <section class="mx-auto max-w-7xl mb-12">
        {!! $val->html !!}
    </section>
     @endforeach
     <div class="mx-auto max-w-7xl" x-data="{ tab: 'prev' }">
        <div class="flex justify-between items-center mb-6">
            <h3 id="{{$val->title}}" class="text-2xl text-[#ff6d34]"><i class="fa-regular fa-hashtag text-base"></i> <b class="font-['Merriweather']">{{$val->title}}</b></h3>
            <div class="p-1 bg-[#fcf1ec] rounded-full">
                <button class="px-4 py-2 rounded-full transition-all duration-300" :class="{ 'active bg-white text-[#ff6d34] shadow-sm': tab == 'prev' }" @click="tab = 'prev'"><i class="fa-solid fa-eye mr-2"></i> 樣式</button>
                <button class="px-4 py-2 rounded-full transition-all duration-300" :class="{ 'active bg-white text-[#ff6d34]': tab == 'code' }" @click="tab = 'code'"><i class="fa-solid fa-code mr-2"></i> 範例</button>
            </div>
        </div>
        
        <div class="h-[60vh] bg-gray-100 border border-gray-200 shadow-2xl">
            <div class="bg-white text-center" x-show="tab == 'prev'">
                <img src="img/view-hd01-pc.png" class="m-auto hidden lg:block">
                <img src="img/view-hd01-tb.png" class="m-auto hidden md:block lg:hidden">
                <img src="img/view-hd01-mb.png" class="m-auto block sm:hidden">
            </div>
            <div class="" x-show="tab == 'code'">
                <header class="header bg-white">
                    <div class="container relative mx-auto flex justify-between items-center px-5 py-5 w-full h-full" x-data="{ showMenu: false }">
                        <div class="logo grow order-2 sm:order-1">
                            <a href="/">
                                <img src="img/logo.svg" class="mx-auto w-16 md:w-20 lg:w-22">
                            </a>
                        </div>
                        <div class="sm:order-2 justify-center items-start md:items-center hidden w-full h-auto p-4 md:p-0 md:relative md:flex" :class="{'flex absolute z-50 left-0 top-20 bg-white shadow-xl shadow-gray-500/20': showMenu, 'hidden': !showMenu }">
                            <nav class="flex flex-col w-full justify-center items-stretch sm:items-center md:flex-row">
                                <a class="p-3 lg:px-5 lg:py-3 font-bold text-gray-600 hover:text-orange-500" href="#">首頁</a>
                                <a class="p-3 lg:px-5 lg:py-3 font-bold text-gray-600 hover:text-orange-500" href="#">網站作品</a>
                                <a class="p-3 lg:px-5 lg:py-3 font-bold text-gray-600 hover:text-orange-500" href="#">專業服務</a>
                                <a class="p-3 lg:px-5 lg:py-3 font-bold text-gray-600 hover:text-orange-500" href="#">資訊分享</a>
                                <a class="p-3 lg:px-5 lg:py-3 font-bold text-gray-600 hover:text-orange-500" href="#">關於我們</a>
                                <a class="p-3 lg:px-5 lg:py-3 font-bold text-gray-600 hover:text-orange-500" href="#">聯絡我們</a>
                            </nav>
                        </div>
                        <div class="relative order-3 sm:order-2" x-data="{ showDropdown: false }">
                            <div class="block mr-0 sm:mr-2" @click="showDropdown = !showDropdown">
                                <span class="flex items-center justify-center w-12 h-12 bg-gray-200 text-gray-900 rounded-full hover:bg-orange-500 hover:text-white cursor-pointer"><i class="fas fa-search" aria-hidden="true"></i></span>
                            </div>
                            <div class="absolute z-50 top-16 right-0 bg-white shadow-xl shadow-gray-500/20 rounded-full overflow-hidden border border-gray-200" x-show="showDropdown" style="display: none;">
                                <form class="flex px-2 py-2">
                                    <input class="px-3 py-1 rounded-full focus:outline-none" type="text">
                                    <button class="flex items-center justify-center w-12 h-12 bg-orange-500 text-white rounded-full" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                        <div @click="showMenu = !showMenu" class="block ml-0 sm:ml-2 bg-gray-200 text-gray-900 rounded-full hover:bg-orange-500 hover:text-white cursor-pointer md:hidden order-1 sm:order-auto">
                            <span class="flex items-center justify-center w-12 h-12"><i class="fas fa-bars" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </header>
            </div>
        </div>
    </div>

@endsection