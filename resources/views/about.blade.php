@extends('layouts.app')

    @include('header')

@section('title')
    {{$webpage->title}}
@endsection
@section('content')




        <article style="background: url('img/illus-page.jpg') repeat center; background-size: 960px auto;">

        <!--Product List-->

                <div class="fck-box">
                    {!! $webpage->html !!}
                </div>
            <hr class="my-10 md:my-20">
        </article>

@endsection

    @include('footer')

