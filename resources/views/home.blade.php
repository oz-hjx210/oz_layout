@extends('layouts.app')
@include('header')
@section('content')
    <article style="background: url('img/illus-page.jpg') repeat center; background-size: 960px auto;">
        <div class="layout-box">
            @foreach($lists as $demotp)
            <div class="layout">
                <span>{{ $demotp->title }}</span>
                <a href="{{url('demos/'.$demotp->id)}}"><img src=" {{config('filesystems.disks.public.url').'/'.$demotp->imgurl}} " class="img-fluid" alt="{{ $demotp->title }}"></a>
            </div>
            @endforeach
        </div>
    </article>
@endsection
@include('footer')