@extends('layouts.app')
@include('header')
@section('content')



    <article>
        <div class="layout-box">
            @foreach($lists as $val)
            <div class="layout">
                <span>{{$val->title}}</span>
                <a href="{{$val->link}}" target="_blank"><img src="{{config('filesystems.disks.public.url').'/'.$val->imgurl}}" class="img-fluid" alt="{{$val->title}}"></a>
            </div>
            @endforeach
        </div>
    </article>
@endsection
@include('footer')
