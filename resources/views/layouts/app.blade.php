<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="default-style">
    <head>
        @include('layouts.head')
    </head>
    <body id="app">        
        @include('layouts.header')
        
        @yield('content')
        
        @include('layouts.footer')
    </body>
</html>
