@extends('layouts.app')
@include('header')
@section('title')
{{$webpage->title}}
@endsection
@section('content')
    <article style="background: url('img/illus-page.jpg') repeat center; background-size: 960px auto;">
        <div class="fck-box">
            {!! $webpage->html !!}
            </div>
    </article>
@endsection
@include('footer')