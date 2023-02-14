@extends('layouts.base')

@section('body')
    @yield('header')
       @yield('content')
    @yield('footer')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
