@extends('layouts.app')

    @include('header')


@section('content')

    <!--Page Banner & Breadcrumb-->
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
                <a href="#">{{$now_prodtp->title}}</a>
            </div>
        </div>
    </section>

    <!--Product List-->
    <section class="mx-auto">
        <div class="container relative px-6 py-10 mx-auto">
            <div class="flex flex-col md:flex-row">
                <aside class="w-full md:pr-6 md:w-1/3 lg:w-1/4">
                    <div class="px-6 py-10 bg-white lg:mr-6 border border-gray-300 md:sticky md:top-0">
                        <h3 class="text-2xl font-extrabold leading-none text-gray-900">產品介紹</h3>
                        <ul class="mt-8 divide divide-y">
                             @foreach($prodtps as $prodtp)

                            <li><a href="{{url('prods/'.$prodtp->id)}}" class="py-3 font-bold
                             @if($prodtp->id==$now_prodtp->id)hover:text-indigo-600@elseif text-indigo-600 @endif
                            flex justify-between items-center">{{$prodtp->title}}<i class="fas fa-angle-right text-gray-400"></i></a>
 <!--                               <ul class="list-disc list-outside mb-6 pl-5">
                                    <li><a href="#" class="text-indigo-600">家用音響</a></li>
                                    <li><a href="#">條形音響</a></li>
                                    <li><a href="#">音響</a></li>
                                </ul>
-->                            </li>
                            @endforeach
                          </ul>
                    </div>
                </aside>
                <div class="w-full md:w-2/3 lg:w-3/4 grid md:grid-cols-2 lg:grid-cols-1 gap-6">

                    @foreach($lists as $val)

                        <div class="flex flex-col lg:flex-row items-stretch overflow-hidden shadow-sm bg-white border border-gray-300">
                            <a href="{{url('prod/'.$val->id)}}" class="block p-6 w-full lg:w-1/4 transition duration-200 ease-out transform hover:opacity-50">
                                <img class="w-full shadow-sm h-auto" src="{{$val->thumb}}">
                            </a>
                            <div class="relative flex flex-col lg:w-3/4 justify-between items-stretch p-6">
                                <div class="prod-name">
                                    <h2 class="text-base font-bold sm:text-lg md:text-xl hover:text-indigo-600"><a href="{{url('prod/'.$val->id)}}">{{$val->title}}</a></h2>
                                    <div class="mt-2 text-xs text-gray-400">{{$val->prodtp->title}}</div>
                                </div>
                                <div class="prod-desc text-sm mt-6">
                                    <p>{{$val->note}}</p>
                                </div>
                                <a href="{{url('prod/'.$val->id)}}" class="items-center mt-6 text-indigo-600 hover:text-orange-400">瞭解更多 <i class="fas fa-angle-right ml-2"></i></a>
                            </div>
                        </div>

                    @endforeach


                    <!--Pagination-->
                    <div class="flex flex-col items-center mb-8 px-4 mx-auto mt-8">
                        {{ $lists->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

    @include('footer')

