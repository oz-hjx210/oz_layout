@extends('layouts.app')
@include('header')
@section('content')
    <nav class="top-links">
        @if($last)
        <a href="demos/{{$last[0]->id}}"><i class="fas fa-angle-left"></i>{{$last[0]->title}}</a>
        @else
            <a href="#">&nbsp;</a>
        @endif
        <h1>{{$now_demotp->title}}</h1>
        @if($next)
        <a href="demos/{{$next[0]->id}}">{{$next[0]->title}}<i class="fas fa-angle-right"></i></a>
        @else
                <a href="#">&nbsp;</a>

         @endif
    </nav>

    <article style="background: url('img/illus-page.jpg') repeat center; background-size: 960px auto;">
        <div class="gallery-box">
            @foreach($lists as $val)
            <div class="items">
                    <h3>{{$val->title}}</h3>
                <center><a href="{{config('filesystems.disks.public.url').'/'.$val->imgurl}}" rel="prettyPhoto[unusual]"><img src="{{config('filesystems.disks.public.url').'/'.$val->imgurl}}" class="img-fluid" alt="{{$val->title}}"></a></center>
            </div>
            @endforeach
        </div>
    </article>
@endsection
@include('footer')
